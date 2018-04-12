### Google compra startup de reconhecimento de fala natural Api.ai
Leia mais em http://www.bitmag.com.br/2016/09/google-compra-startup-de-reconhecimento-de-fala-natural-api-ai/#7OPClq0GgtkaWMhb.99

O Google comprou mais uma startup. Desta vez, a desenvolvedora de um aplicativo que funciona como assistente conversacional, com ferramentas de reconhecimento de fala e compreensão de linguagem natural Api.ai e mais de 20 milhões de usuários. Os termos do negócio não foram revelados, mas, de acordo com post do vice-presidente de engenharia do Google, Scott Huffman, “API.AI tem uma trajetória comprovada de auxílio aos desenvolvedores a desenhar, construir e melhorar constantemente suas interfaces conversacionais. Mais de 60 mil desenvolvedores estão usando Api.ai para construir experiências conversacionais para ambientes como Slack, Facebook Messenger e Kik, para nomear apenas alguns”. Huffman acredita que a plataforma de interface conversacional ajudará o Google a “empoderar desenvolvedores para que continuem construindo ótimas interfaces de linguagem natural”.

A aquisição reforça a movimentação estratégica do Google em ferramentas de reconhecimento de linguagem com o recente lançamento do Google Assistant e do Google Home.


###Facebook compra startup de reconhecimento de voz Wit.ai
Leia mais em http://idgnow.com.br/internet/2015/01/06/facebook-compra-startup-wit-ai-especializada-em-reconhecimento-de-fala/

O Facebook adquiriu a startup de tecnologia Wit.ai, desenvolvida de um software de reconhecimento de voz. A ideia da rede social, com a compra da empresa, é expandir a atuação na área de inteligência artificial. Os termos do acordo não foram divulgados.

API da empresa já foi usada por mais de 6 mil desenvolvedores para incorporar recursos de voz em apps e dispositivos digitais

A Wit.ai tem menos de dois anos de vida e sua plataforma permite que desenvolvedores incorporem recursos de reconhecimento de fala em seus apps, dispositivos digitais como termostatos e até robôs. Mais de 6 mil desenvolvedores já usaram sua tecnologia para criar apps e dispositivos de IoT, diz a empresa, com sede em Palo Alto, Califórnia.

Em outubro de 2014, um ano depois de ter iniciado a empresa com seus próprios recursos, e usado uma sala nos escritórios da Pebble para trabalhar, o cofundador da Wit.ai, Alex Lebrun, conseguiu US$ 3 milhões em capital-semente (seed money) numa rodada de investimentos liderada por Chris Dixon, da Andreessen Horowitz, com participação da Ignition Partners, NEA, A-Grade, SVAngel, Eric Hahn, Alven Capital e TenOneTen.


### Adicionando Greeting Text

curl -X POST -H "Content-Type: application/json" -d '{
  "setting_type":"greeting",
  "greeting":{
    "text":"OLá {{user_first_name}}, sou um dos Bots do curso de Intellibots."
  }
}' "https://graph.facebook.com/v2.6/me/thread_settings?access_token=PAGE_ACCESS_TOKEN"    


### Removendo 

curl -X DELETE -H "Content-Type: application/json" -d '{
  "setting_type":"greeting"
}' "https://graph.facebook.com/v2.6/me/thread_settings?access_token=PAGE_ACCESS_TOKEN"   


### Send a Structured Message

!(SM)[https://github.com/jw84/messenger-bot-tutorial/raw/master/demo/shot5.jpg]

	{
	"attachment": {
	    "type": "template",
	    "payload": {
	        "template_type": "generic",
	        "elements": [{
	            "title": "First card",
	            "subtitle": "Element #1 of an hscroll",
	            "image_url": "http://messengerdemo.parseapp.com/img/rift.png",
	            "buttons": [{
	                "type": "web_url",
	                "url": "https://www.messenger.com",
	                "title": "web url"
	            }, {
	                "type": "postback",
	                "title": "Postback",
	                "payload": "Payload for first element in a generic bubble",
	            }],
	        }, {
	            "title": "Second card",
	            "subtitle": "Element #2 of an hscroll",
	            "image_url": "http://messengerdemo.parseapp.com/img/gearvr.png",
	            "buttons": [{
	                "type": "postback",
	                "title": "Postback",
	                "payload": "Payload for second element in a generic bubble",
	            }],
	        }]
	    }
	}


 - https://botsociety.io/s/5844923e8874bb16bd9628d9
 
 - https://botsociety.io/conversations/5844923e8874bb16bd9628d9#
 
 - https://botframe.com/editor/NsnXw3Uhpm#

 - https://www.chatbot-academy.com/chatbot-design-resources/

 - https://bots.mockuuups.com/

 - https://chatbottle.co/

 - https://botpublication.com/10-bot-building-platforms-and-why-you-need-to-build-a-bot-for-your-business-b86fd26ba9f9#.t40b24vge

 - https://brasil.uxdesign.cc/o-papel-de-ux-nas-interfaces-conversacionais-d1bcd8b8db26#.2s2qwbwra

#### Adicionar WebHook

	https://api.telegram.org/bot(SEU_TOKEN)/setwebhook?url=https://(SUA_URL)/seubot.php

Após acessar a URL na formatação acima, a resposta da API do Telegram será a seguinte:

	{“ok”:true,”result”:true,”description”:”Webhook was set”}


#### Remover WebHook

	https://api.telegram.org/bot(SEU_TOKEN)/setwebhook?url=

### API
https://core.telegram.org/methods

 - Samples- https://core.telegram.org/bots/samples
- https://github.com/akalongman/php-telegram-bot
- https://github.com/irazasyed/telegram-bot-sdk
- https://github.com/unreal4u/telegram-api

### Links Adicionais Aula 25/03/2017

- http://www.botsfloor.com/botstash/products/?category=Prototyping
- http://www.botsfloor.com/botstash/
- http://botter.co/
- https://botanalytics.co/
- https://www.crunchbase.com/organization/chatmetrics#/entity
- https://www.getbotmetrics.com/
- https://bot-metrics.com/
- https://www.botmetric.com/

Os top 7 casos de messenger bots para marcas (e por que eles são incríveis)
- https://www.sprinklr.com/pt-br/the-way/os-top-7-casos-de-messenger-bots-para-marcas-e-por-que-eles-sao-incriveis/

- https://botmock.com/
- https://botpreview.com/

### Comunidade
- https://medium.com/botsbrasil
- http://chatbotsbrasil.take.net/
- http://www.botsbrasil.com.br/



# DialogFlow PHP sdk
https://github.com/iboldurev/dialogflow
Unofficial php sdk for Dialogflow [https://dialogflow.com/](https://dialogflow.com/)

```php
    <?php
    
    require_once 'vendor/autoload.php'; //autoload das dependências
    include_once 'credentials.php'; //arquivo php com uma variável $apiKey que é a chave da sua API do Dialogflow
    
    use Dialogflow\Client; //use na classe Client
    
    use Dialogflow\Model\Query; //use na classe Query
    use Dialogflow\Method\QueryApi; //use na classe QueryApi
    
    try { //início do bloco de try/catch
        $client = new Client($apiKey); //iniciando um client Dialogflow
        $queryApi = new QueryApi($client);//iniciando uma query do Dialogflow
    
        $meaning = $queryApi->extractMeaning($argv[1], [
            'sessionId' => '1234567890',
            'lang' => 'pt-BR',
        ]); //definindo os dados da chamada ao Dialogflow (seria uma simulação de conversa) passamos o primeiro argumento da chamada PHP, uma sessionId aleatória e a linguagem que iremos utilizar. No caso pt-br
        $response = new Query($meaning); //realizando a chamada de query
        print_r($response); //retornando o objeto de resposta para estudo
    } catch (\Exception $error) { 
        echo $error->getMessage(); //retorna o erro em caso de erro.
    }
````
Então, vamos fazer no terminal:
	
	php dialogflow.php "quero comprar um ingresso"

## Guia completo para criar o seu Messenger Chatbot, usando IBM Watson e API Connect

## Watson Conversation

A API Conversation foi a última a ser lançada no  [Bluemix](https://console.bluemix.net/?cm_sp=dwbrazil-bluemix-_-criando-chat-bots-ibm-watson-pt1-_-article)  em julho. Os devs do Watson resolveram juntar algumas funcionalidades do Natural Language Classifier (NLC), do Dialog e novidades com uma interface bem simples que permite que o cara que não é de TI possa criar conteúdo para o seu Bot.

https://www.ibm.com/developerworks/br/cloud/library/criando-chat-bots-ibm-watson-pt1/index.html
https://pt.linkedin.com/pulse/guia-completo-para-criar-o-seu-messenger-chatbot-usando-davi-cunha
https://drive.google.com/file/d/0B6zJBJLRNCVxRXB6Ukp4a0lpZXc/view

### Construindo Chat Bots com a plataforma Microsoft Bot Framework

LUIS - [Language Understanding Intelligent Service](https://www.microsoft.com/cognitive-services/en-us/language-understanding-intelligent-service-luis) - é uma API de Machine Learning que permite adicionar processamento de linguagem natural em aplicações, entendendo e interpretando linguagens contextualmente. É uma das APIs presentes no [Microsoft Cognitive Services](https://www.microsoft.com/cognitive-services).

https://msdn.microsoft.com/pt-br/communitydocs/visualstudioalm/chat-bots
https://docs.microsoft.com/en-us/azure/bot-service/rest-api/bot-framework-rest-connector-api-reference

### UX Best Practices for Bot applications

This book is a guide for some common best practices for bot interactions and is intended to be applicable on any platform including Skype, Facebook Messenger, Slack, and others that will emerge over time.

https://legacy.gitbook.com/book/fernandobrs/ux-best-practices-for-bot-applications/details
