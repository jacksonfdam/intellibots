
# Intellibots
## Telegram
### Lab 03

**Documentação:**
[https://core.telegram.org/api](https://core.telegram.org/api) 
[https://core.telegram.org/bots](https://core.telegram.org/bots)


**Não Esquecer**
Defina a constante `BOT_TOKEN_ID` com o token obtido pelo `BotFather`.

Pelo cli do PHP:

    php index.php setWebhook
ou

    php index.php setWebhook delete

Pelo Browser

    https://api.telegram.org/bot{BOT_TOKEN_ID}/setWebhook?url={WEBHOOK_URL}

Para informações:
	
	https://api.telegram.org/bot{BOT_TOKEN_ID}/getWebhookInfo

deve exibir algo como:

```json
{
 "ok":true,
 "result": 
 {
   "url":"https://www.example.com/my-telegram-bot/",
   "has_custom_certificate":false,
   "pending_update_count":0,
   "max_connections":40
 }
}
```


**Ações do Bot:**
 - ***/start***  responde: `Produtos` ou `Pedidos` ou `Carrinho` com um teclado
 - ***/produtos***  responde: Listagem de Produtos
 - ***/pedidos***  responde: Listagem de Pedidos
 - ***/carrinho***  responde: Listagem do Carrinho
 - ***/test***  responde: Chat em Grupo ou Privado
 - ***/site***  responde: Confira nossos produtos em ...
 - ***/foto***  responde: Exibe uma imagem local
 - ***/onde***  responde: Exibe uma localização
 - ***/inlinekeyboard***  responde: Exibe um teclado customizado