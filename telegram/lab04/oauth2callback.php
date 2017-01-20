<?php
use Base\DB;
require_once 'vendor/autoload.php';
require_once 'config.php';

$provider = new League\OAuth2\Client\Provider\Google($config['oauth']['google']);

if (!empty($_GET['error'])) {

    // Got an error, probably user denied access
    exit('Got error: ' . $_GET['error']);

} elseif (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    header('Location: ' . $authUrl);
    exit;

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token);

        $instance = DB::getInstance();
        try {
            $sth = $instance->perform('INSERT INTO users (token, md5token) VALUES(:token, :md5token) RETURNING md5token;', [
                'token' => $token->getToken(),
                'md5token' => md5($token->getToken())
            ]);
            $md5token = $sth->fetchColumn();
            header('Location: https://telegram.me/olxbrbot?start='.$md5token);
        } catch(Exception $e) {
            echo $e->getMessage();
        }

        // Use these details to create a new profile
        printf('Hello %s!', $ownerDetails->getFirstName());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Something went wrong: ' . $e->getMessage());

    }

}