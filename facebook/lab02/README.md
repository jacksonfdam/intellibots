
# Intellibots
## Facebook
### Lab 02

**Documentação:**
[https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received](https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received) 
[https://developers.facebook.com/docs/messenger-platform/send-messages/templates](https://developers.facebook.com/docs/messenger-platform/send-messages/templates#button)
[https://developers.facebook.com/docs/messenger-platform/reference/buttons/postback](https://developers.facebook.com/docs/messenger-platform/reference/buttons/postback)


                     [SKYPE             ]       [ CHATBOT ] <--> [SERVICE API 01]
    [ Usuário ] <--> [FACEBOOK MESSENGER] <-->  [ SERVICE ] <--> [SERVICE API 02]
                     [TELEGRAM          ]       [  LOADER ] <--> [SERVICE API 03]
                     [SLACK             ]
                     [KIK               ]

**Não Esquecer**
Defina a constante `BOT_TOKEN` com o token obtido pela sua App com a Página.
A constante `VERIFY_TOKEN`deve ser identica na definição do  webhook.

### Componentes de conversa disponíveis

-   [Mensagens de texto](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#text_messages)
    
-   [Ativos e anexos](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#attachments)
    
-   [Modelos de mensagem](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#templates)
    
    -   [Botões](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#buttons)
        
    
-   [Respostas rápidas](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#quick_replies)
    
-   [Ações do remetente](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#sender_actions)
    
-   [Tela de boas-vindas](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#welcome_screen)
    
-   [Menu persistente](https://developers.facebook.com/docs/messenger-platform/introduction/conversation-components#persistent_menu)

**Ações do Bot:**
 - ***location***  responde:  Olá `$first_name` você está na `$attachment['title']` ?
- ***hi***  responde:  Olá `$first_name`
- ***phpconference***  responde: Um Template `Genérico` com dois botões um de `web_url` e um de `postback`
- - ***Tirar Dúvidas***  responde: Olá `$first_name` que dúvidas você tem?
- ***cursos***  responde: Um Template `List` com dois botões um de `web_url` e um de `postback`
- ***sobre***  responde: Um Template `Button` com dois botões um de `web_url` e um de `postback`