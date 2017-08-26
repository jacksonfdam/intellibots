# Facebook

[Bots for Messenger Platform](https://developers.facebook.com/docs/messenger-platform/product-overview) é fácil o suficiente para criar que os engenheiros do Facebook foram capazes de dar um exemplo de trabalho de bots simples em cerca de 10 minutos durante a conferência de desenvolvedores F8 em abril deste ano.

As etapas gerais que um desenvolvedor precisa seguir para começar a criar um bot incluem:

 - Criar um aplicativo do Facebook e uma página do Facebook
 - Configurar os [webhooks](https://developers.facebook.com/docs/messenger-platform/implementation#setup_webhook)
 - Gere o [token de acesso à página](https://developers.facebook.com/docs/messenger-platform/implementation#page_access_token)
 - Subscrever de volta à página e ao app
 - Receber [mensagens do webhook](https://developers.facebook.com/docs/graph-api/webhooks)
 - Enviar uma mensagem de [texto](https://developers.facebook.com/docs/messenger-platform/send-api-reference)
 - Envie dados ricos e / ou estruturados
 - Manipular interações de postbacks do usuário

## Criar uma Página no Facebook

Todo bot a ser criado para o Messenger deve estar associado a uma página no Facebook. Dessa forma, nosso primeiro passo deve ser a criação da página. Caso você já possua uma página e deseja adicionar o bot a ela, pode pular para a próxima seção. 

Para criar a página acesse: https://www.facebook.com/pages/create/.

Em seguida, escolha a categoria e dê um nome a sua página.

![Facebook Page](https://cldup.com/-iIuo2uZVs.thumb.jpg)

Ao final de todo esse processo, a página irá ficar como a da imagem a seguir:

![Facebook Page](https://cldup.com/wKJijf3ggz.thumb.jpg)

## Criar um App no Facebook

Com a página já criada, a segunda etapa é criar o app no Facebook que será responsável pela ligação entre a página e o código do nosso bot. Para criar um app no Facebook é necessário acessar o link [https://developers.facebook.com/apps](https://developers.facebook.com/apps) e clicar em “Adicionar um novo aplicativo”.

![FacebookApp](https://cldup.com/dy7IL-QcJ7.thumb.jpg)

Ao clicar em “Adicionar um novo aplicativo”, será exibida uma janela igual a da imagem abaixo. 

![FacebookApp](https://cldup.com/jMMvjUgPGc-3000x3000.png)

Feito isso, será exibida uma página com os detalhes do app recém-criado.

![FacebookApp](https://cldup.com/-JiCE_rI2Z.thumb.jpg)

## Obter Access Token e Definir Webhook

Com o app criado, o próximo passo é obter o Access Token e definir o link do Webhook. Para isso, no menu no lado esquerdo da tela do app, clique em “Adicionar Produto”. Quando isso for feito, uma tela semelhante a da imagem abaixo será aberta. 

![FacebookApp](https://cldup.com/06rp33oL0W.thumb.jpg)

No tópico Messenger, clique em “Get Started”.
Na seção “Geração de token”, escolha a página para a qual deseja gerar o token.
Dê acesso às permissões que forem exigidas e, logo em seguida, você irá notar que o token será gerado no campo ao lado.

![FacebookApp](https://cldup.com/YAVuf_MHEu-3000x3000.png)

Após gerar o token, na seção Webhooks, clique em “Setup Webhooks”.

![FacebookApp](https://cldup.com/x8FS8Xgs4v.thumb.jpg)

Ao abrir a janela, digite a URL que será usada como Webhook. É importante ressaltar que essa URL deve suportar HTTPS. Digite também um token para identificar o app e escolha as funcionalidades que você deseja integrar ao seu bot. 

Na parte de Subscription Fields você deve selecionar: *messages*, *message_deliveries*, *messaging_options* e *messaging_postbacks*.

Não clique em “Verificar e Salvar” ainda!

![FacebookApp](https://cldup.com/x8FS8Xgs4v.thumb.jpg)

### Enviando e Recebendo Mensagens
Para entendermos melhor cada uma dessas opções, descrevo abaixo cada uma delas:
- **[messages](https://developers.facebook.com/docs/messenger-platform/webhook-reference/message)**  —  Este é o principal tipo de evento em que estaremos interessados. Este evento é acionado toda vez que alguém envia uma mensagem para sua página.
- **[messages_deliveries ](https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-delivered)**— São os relatórios de entrega das mensagens enviadas.
- **[messaging_postbacks](https://developers.facebook.com/docs/messenger-platform/webhook-reference/postback)**  —  O facebook permite enviar mais que texto, ele disponibiliza modelos com botões que após serem clicados podem enviar uma carga útil especificada para o seu webhook. Um exemplo simples é um modelo com 2 botões para se inscrever ou cancelar a inscrição. Quando o usuário toca qualquer um deles, o evento de postback é acionado e o facebook envia a carga que você definiu para o botão, de volta para você.
- **[messaging_opt-ins](https://developers.facebook.com/docs/messenger-platform/webhook-reference/optins)**— Isso é usado para autenticação e é disparado quando alguém usa o Plugin Enviar para Messenger do Facebook que pode residir em seu site como um ponto de entrada.


> 
O que isso significa? O Webhook quando acessar a URL, ele primeiro vai fazer uma verificação de token antes de fazer qualquer coisa, se não estiver presente ou incorreto, ele dá o erro.

Quando você clica em “Verificar e Salvar”, o Facebook envia uma requisição para a URL inserida. Essa requisição precisa ser respondida pelo seu servidor. Dessa forma, é necessário que você crie um arquivo chamado “index.php” contendo o código abaixo:


	<?php
	$access_token = "AAaki53jQwMBACBQRHpJZARlHXXRXeWxNs8opuBjqnAmNQ94su4HZAFZBj5nxieOJCUJ5GgD2R8LyrZCgjo8q1dhIpTahFDsdYq5Q5zmWtzhr5dooFWdVhgMHUSQr9Kz1sbBmTK3ZC85tuMswHzba80yErddeV8t1Ub9VUvm9fQZDZD";
	$verify_token = "curso_intellibots";
	$hub_verify_token = null;

	if(isset($_REQUEST['hub_challenge'])) {
	    $challenge = $_REQUEST['hub_challenge'];
	    $hub_verify_token = $_REQUEST['hub_verify_token'];
	}


	if ($hub_verify_token === $verify_token) {
	    echo $challenge;
	}


![FacebookApp](https://cldup.com/Lz5RbVA1k1-2000x2000.png)	


O código acima serve para que Facebook valide o seu Webhook. Não vou entrar em detalhes de como essa validação é feita, mas ao acessar a documentação sobre Webhooks na Graph API, você poderá verificar como ocorre o processo e quais parâmetros são requisitados.

Feito isso, agora você pode clicar em “Verificar e Salvar”. Se tudo ocorrer bem, a seção “Webhooks” ficará igual a da foto abaixo:

![FacebookApp](https://cldup.com/D2U6OOpITK-2000x2000.png)

Para finalizar, você deve inscrever o app a uma página do Facebook. Sendo assim, selecione a página a qual o bot será associado.

![FacebookApp](https://cldup.com/S_TjZT47Ak-3000x3000.png)

##Começar a conversar com o seu bot

Vá para a Página do Facebook que você criou e clique no botão "Mensagem", ao lado do botão "Gostar" perto do topo da página. Isso deve abrir um painel de mensagens com sua página.

![FacebookApp](https://cldup.com/hSBltb0FY1.png)

Comece a enviar suas mensagens de página e o bot deve responder!

Para ver o que está acontecendo, verifique os logs de sua aplicação

    heroku logs -t

Você deve ver os dados do POST que o Facebook está enviando para o seu endpoint sempre que uma nova mensagem é enviada para o bot de sua página.

Aqui está um exemplo JSON POST corpo que eu tenho quando eu enviei "Isso funciona?" para o meu bot

	{
	    "object":"page",
	    "entry":[
	        {
	            "messaging":[
	                {
	                    "message":{
	                        "text":"Isso funciona?",
	                        "seq":20,
	                        "mid":"mid.1466015596912:7348aba4de4cfddf91"
	                    },
	                    "timestamp":1466015596919,
	                    "sender":{
	                        "id":"USER_ID"
	                    },
	                    "recipient":{
	                       "id":"PAGE_ID"
	                    }
	                }
	            ],
	            "time":1466015596947,
	            "id":"260317677677806"
	        }
	    ]
	}

No trecho de código acima é necessário dar atenção a três objetos: **sender**, **recipient** e **message**. O **sender** contém o ID do usuário que enviou a mensagem. O **recipient** contém o ID da página que recebeu a mensagem. Por sua vez, o objeto **message** contém o atributo text, o qual compreende o conteúdo da mensagem.

Agora que a estrutura do JSON recebido pelo Webhook já é conhecida, precisamos entender como fazer para responder a mensagem que foi recebida, ou seja, como o bot deve enviar a resposta ao usuário. Basicamente, a resposta também deve ser enviada em JSON para a seguinte URL:

https://graph.facebook.com/v2.6/me/messages?access_token=(SEU_ACCESS_TOKEN)

A estrutura do JSON a ser enviada através da URL acima poder ser vista no trecho de código a seguir:

{
    "recipient":{
        "id":"SENDER_ID"
    },
    "message":{
        "text":"MENSAGEM"
    }
}

Como é possível notar no código acima, o JSON precisa conter apenas o ID do emissor como recipient e o texto da mensagem a ser enviada ao usuário.

Agora que a estrutura dos JSON de recebimento e envio de mensagens já é conhecida, o próximo passo é implementar o bot para receber a mensagem e responder de acordo com o seu conteúdo. 

![FacebookApp](https://cldup.com/Q8OrZjQ7gR.thumb.jpg)


	<?php
	/* 
	https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received 

	*/

	define('BOT_TOKEN', "EAAaki53jQwMBAGgy1sDUkjR0tQOyDFcVbKk1vavact1wiQ1dszOrAPiUuZCzdOL8bZCoVDdO9KpgqRyfVXSUEySUYwBgG6pijLRg0UC5AFG3MIxUMOAJarKPfvbBq58uIWXwdRZAxQeCACfhCCYbKQ2ccAvIPGVZAZAIXlcFJDAZDZD");
	define('VERIFY_TOKEN', "curso_intellibots");
	define('API_URL', 'https://graph.facebook.com/v2.6/me/messages?access_token='.BOT_TOKEN);

	/*
	Teste Tambem:
	curl -X POST "https://graph.facebook.com/v2.6/me/subscribed_apps?access_token=EAAaki53jQwMBAGgy1sDUkjR0tQOyDFcVbKk1vavact1wiQ1dszOrAPiUuZCzdOL8bZCoVDdO9KpgqRyfVXSUEySUYwBgG6pijLRg0UC5AFG3MIxUMOAJarKPfvbBq58uIWXwdRZAxQeCACfhCCYbKQ2ccAvIPGVZAZAIXlcFJDAZDZD"

	*/
	$hub_verify_token = null;

	/*-----VEFICA O WEBHOOK-----*/
	if(isset($_REQUEST['hub_challenge'])) {
		$challenge = $_REQUEST['hub_challenge'];
		$hub_verify_token = $_REQUEST['hub_verify_token'];
	}
	if ($hub_verify_token === VERIFY_TOKEN) {
		echo $challenge;
	}
	/*-----FIM VERIFICAÇÃO-----*/

	$hub_verify_token = null;

	function processMessage($message) {

		$sender = $message['sender']['id'];
		$text = $message['message']['text'];

		if (isset($text)) {

			if(preg_match('[data|hora|agora]', strtolower($text))) {
				ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
				$result = file_get_contents("http://www.timeapi.org/utc/now?format=%25a%20%25b%20%25d%20%25I:%25M:%25S%20%25Y");
				if($result != '') {
					sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => $result)));
				}
			} else {
				sendMessage(array('recipient' => array('id' => $sender), 'message' => array('text' => 'Olá! Eu sou um bot do curso de Intellibots')));
			}
			
		} 
	}
	function sendMessage($parameters) {
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => json_encode($parameters),
				'header'=>  "Content-Type: application/json\r\n" .
				"Accept: application/json\r\n"
				)
			);
		$context  = stream_context_create( $options );
		file_get_contents(API_URL, false, $context );
	}

	$update_response = file_get_contents("php://input");
	$update = json_decode($update_response, true);
	if (isset($update['entry'][0]['messaging'][0])) {
		processMessage($update['entry'][0]['messaging'][0]);
	}

No código do bot existe o método processMessage. Esse método é responsável por manipular as mensagens recebidas pelo bot. Essas mensagens são obtidas por meio do JSON recebido via Webhook. Sendo assim, quando o método processMessage é chamado, ele verifica, a partir da mensagem recebida,o que o usuário deseja saber e envia uma resposta.

As respostas às solicitações recebidas pelo bot são enviadas através do método sendMessage. Esse método recebe como parâmetro um array contendo o ID do emissor e o resultado da loteria escolhida. Antes de enviar a resposta, o método sendMessage converte o array em JSON.

Para conversar com o bot acesse: https://m.me/CursoIntellibots
