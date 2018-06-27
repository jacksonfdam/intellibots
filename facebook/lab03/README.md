

# Intellibots
## Facebook
### Lab 03

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
Aqui estão localizados no arquivo `config.php`.

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
 - ***text***  responde:  Esta é uma mensagem de texto simples.
 - ***image***  responde:  Exibindo uma imagem remota
 - ***local image***  responde:   Exibindo uma imagem local.
 - ***profile***  responde:  Com um template `generico` com Foto e nome do usuário.
 - ***button***  responde:  Com um template `button`
 - ***generic***  responde:   Com um template `generic`
 - ***receipt***  responde:  Com um template `receipt`
 - ***set menu***  responde:  Define o menu persistente.
 - ***delete menu***  responde:  Remove o menu persistente.
