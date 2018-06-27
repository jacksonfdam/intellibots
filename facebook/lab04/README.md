# Intellibots
## Facebook
### Lab 04

**Documentação:**
[https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received](https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received) 
[https://botman.io/2.0/web-widget](https://botman.io/2.0/web-widget)
[Hearing Messages](https://botman.io/2.0/receiving)

**Não Esquecer**
Defina a constante `BOT_TOKEN` com o token obtido pela sua App com a Página.
A constante `FACEBOOK-APP-SECRET` obtido pela sua App.
A constante `VERIFY_TOKEN`deve ser identica na definição do  webhook.

**Acesse:**
http://localhost/intellibots/facebook/lab04/portal.html

Configure no objeto `botmanWidget` as propriedades  `frameEndpoint` e `chatServer` com as respectivas URLs


**Ações do Bot:**
 - ***ola***  responde: Olá usuário.
 - ***Eu quero \$numero itens***  responde: Eu terá `\$numero` itens.