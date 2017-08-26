# Telegram

![Telegram](http://www.escolaandroid.com/wp-content/uploads/2015/10/tele1.jpg)

## Sobre Telegram

Com este aplicativo, você pode enviar milhares de mensagem com muita velocidade e segurança, sendo possível utilizá-lo em computadores, tablets e telefones. É possível enviar um número ilimitado de mensagens, fotos, vídeos e arquivos de qualquer tipo (.doc, .zip, .pdf, etc.). Você pode ainda criar grupos de até 200 pessoas no Telegram e você pode enviar transmissões para até 100 contatos de cada vez.


## Vantagens do Telegram

Estas são algumas vantagens do Telegram:

 - Rapidez: é o aplicativo de mensagens mais rápido do mercado, pois usa uma infraestrutura distribuída em todo o mundo para conectar os usuários ao servidor mais próximo possível.
 
 - Segurança: o recurso criptografa todos os seus dados com algoritmos exaustivamente testados.
 
 - Armazenamento na nuvem: o aplicativo sincroniza automaticamente em todos os seus dispositivos, assim você pode acessar seus dados de onde estiver.
 
 - Gratuidade: Além de ser gratuito, não possui aquelas propagandas chatas.
 
 - Suporte: possui suporte em tempo real, seja pela tela de Configurações e ou por e-mail: support@telegram.org.


## Como criar o bot no Telegram


![BotList](https://cdn-images-1.medium.com/max/600/1*xrtoeblZ8oLBNkMnluU1dg.png)

### The Botfather

O Telegram facilita muito a criação de bots para seu sistema. Além de uma documentação muito boa e uma API muito simples de usar, ele possui o BotFather, um bot que ajuda qualquer um a criar seu próprio bot.

Segundo a documentação do Telegram:

> BotFather is the one bot to rule them all. It will help you create new bots and change settings for existing ones

Então vamos lá. Para começar é preciso acessar o @BotFather e fazer o registro do seu novo chatbot.

Para qualquer criação ou configuração de bot é preciso acessá-lo. E como vamos criar um novo bot, acessamos o link @BotFather.

Lá você terá acesso a diversos comandos, dentre eles o /start, que irá apresentar a lista desses comandos e o /newbot, que serve para a criação de um novo bot.

Quando executarmos o /newbot ele pede algumas configurações, como o nome e o username que serão utilizados pelo bot. Nada complicado.

Seu bot será como um usuário comum do Telegram, com um “nome para exibição” e um “nome de usuário” (username) para controle.

Assim que forem preenchidos os dados necessários ele irá gerar um token para ser utilizado no seu script. Esse token é único e serve como uma “senha” para seu bot, portanto deve ser mantido em sigilo.

Para saber mais sobre o @BotFather, acesse a documentação do Telegram que fala sobre bots para desenvolvedores.


![BotList](http://www.escolaandroid.com/wp-content/uploads/2015/10/tele21.jpg)

> DICA 1: Proteja esta URL em seu site, crie um diretório ‘secreto’ em seu servidor, com o valor da chave do bot por exemplo: https://intense-island-34719.herokuapp.com/bots/[CHAVE]/index.php


> DICA 2: A URL do Webhook tem que ser obrigatoriamente uma url segura (https), seu o seu domínio não possui uma conexão segura configurada, você pode tentar usar a do seu servidor, caso for uma conta compartilhada.
