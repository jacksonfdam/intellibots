#Facebook

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

##Obter Access Token e Definir Webhook

Com o app criado, o próximo passo é obter o Access Token e definir o link do Webhook. Para isso, no menu no lado esquerdo da tela do app, clique em “Adicionar Produto”. Quando isso for feito, uma tela semelhante a da imagem abaixo será aberta. 

![FacebookApp](https://cldup.com/06rp33oL0W.thumb.jpg)

No tópico Messenger, clique em “Get Started”.
Na seção “Geração de token”, escolha a página para a qual deseja gerar o token.
Dê acesso às permissões que forem exigidas e, logo em seguida, você irá notar que o token será gerado no campo ao lado.

![FacebookApp](https://cldup.com/YAVuf_MHEu-3000x3000.png)

Após gerar o token, na seção Webhooks, clique em “Setup Webhooks”.

![FacebookApp](https://cldup.com/x8FS8Xgs4v.thumb.jpg)

Ao abrir a janela, digite a URL que será usada como Webhook. É importante ressaltar que essa URL deve suportar HTTPS. Digite também um token para identificar o app e escolha as funcionalidades que você deseja integrar ao seu bot. Não clique em “Verificar e Salvar” ainda!

Quando você clica em “Verificar e Salvar”, o Facebook envia uma requisição para a URL inserida. Essa requisição precisa ser respondida pelo seu servidor. Dessa forma, é necessário que você crie um arquivo chamado “index.php” contendo o código abaixo:

