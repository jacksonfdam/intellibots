<?php
/*
Plugin Name: Bot For WP
Description: Messenger bot for WordPress
Plugin URI: http://snypd.com/
Author: Sunny Luthra
Author URI: http://#
Version: 1.0
License: GPL2
 */
if (!defined('ABSPATH')) {
	exit;
}
class Bot_For_WP {
	function __construct() {
		// Namespace of our plugin
		$this->namespace = 'bot-for-wp';
		// Verify Token
		$this->verify_token = 'SOME_RANDOM_STRING';
		// FB URL for posting
		$this->graph_api_url = 'https://graph.facebook.com/v2.6/me/messages?access_token=';
		// Page access token
		$this->access_token = 'TOKEN';
		// Add route for facebook to post/get requests
		add_action('rest_api_init', array($this, 'register_routes'));
	}
	function register_routes() {
		register_rest_route($this->namespace, '/bot', array(
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => array($this, 'get'),
				'permission_callback' => array($this, 'verify_request'),
			),
			array(
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => array($this, 'post'),
			),
		));
	}
	function verify_request($request) {
		$params = $request->get_query_params();
		if ($params && isset($params['hub_challenge']) && $params['hub_verify_token'] == $this->verify_token) {
			return true;
		}
		return false;
	}
	function get($request) {
		$params = $request->get_query_params();
		echo $params['hub_challenge'];
		die();
	}
	function post($request) {
		$params = $request->get_params();
		if ($params && $params['entry']) {
			foreach ((array) $params['entry'] as $entry) {
				if ($entry && $entry['messaging']) {
					foreach ((array) $entry['messaging'] as $message) {
						$this->send_message($message);
					}
				}
			}
		}
		die();
	}
	function send_message($message) {
		// Facebook alos sends delivevery messages
		// so its better to check for text.
		if (!isset($message['message']['text'])) {
			return;
		}
		$sender_id = $message['sender']['id'];
		$text = strtolower($message['message']['text']);
		// Graph URL With Token
		$graph = $this->graph_api_url . $this->access_token;
		if ($text == 'posts') {
			$template = array(
				'attachment' => array(
					'type' => 'template',
					'payload' => array(
						'template_type' => 'generic',
						'elements' => $this->get_posts_elements(),
					),
				),
			);
		} else {
			// Text Template
			$template = array('text' => 'hi');
		}
		$data = array(
			'body' => array(
				'recipient' => array('id' => $sender_id),
				'message' => $template,
			),
		);
		$response = wp_remote_post($graph, $data);
	}
	function get_posts_elements() {
		$args = array(
			'posts_per_page' => 10,
			'post_type' => 'post',
		);
		$posts = get_posts($args);
		$elements = [];
		if ($posts) {
			foreach ($posts as $post) {
				$data = array(
					'title' => $this->truncate($post->post_title, 45),
					'image_url' => 'http://thecatapi.com/api/images/get?format=src&type=png',
					'subtitle' => $this->truncate($post->post_content, 80),
					'buttons' => array(
						array(
							'type' => 'web_url',
							'url' => get_permalink($post),
							'title' => 'View Story',
						),
					),
				);
				$elements[] = $data;
			}
		}
		return $elements;
	}
	function truncate($text, $length) {
		// This is for truncating title and subtitles
		$length = abs((int) $length);
		$text = trim(preg_replace("/&#?[a-z0-9]{2,8};/i", "", $text));
		if (strlen($text) > $length) {
			$text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
		}
		return ($text);
	}
}
new Bot_For_WP;