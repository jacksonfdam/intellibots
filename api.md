#Api.ai

## Crie uma conta no Api.ai
O Api.ai é um plataforma que vai facilitar muito a criação de um Bot que pode responder de maneira fácil perguntas de texto e áudio.  Acesse o Link e crie sua conta: [Criar Conta](https://console.api.ai/api-client/#/signup)

![enter image description here](http://i2.wp.com/onebitcode.com/wp-content/uploads/2016/09/apiai.jpg?resize=768,298)

O Api.ai é uma plataforma muito bacana aonde você pode configurar rapidamente um Bot que consegue responder frases pré programadas (e até frases similares), ele permite também que você chame um Webhook quando determinada frase for recebida.

O Api.ai é gratuito até 6000 chamadas mensais, claro que isso é pouco para uma aplicação profissional, porém para nossos propósitos é suficiente.

###AGORA VAMOS CONECTAR O API.AI AO NOSSO APP DO FACEBOOK

 - Acesse sua conta do Api.ai: Acessar 

![enter image description here](https://cldup.com/4Ct0vpEFgv.thumb.jpg)

 - Agora clique em “Create Agent”
  - Escolha o nome do seu Bot 
  - Coloque uma descrição se desejar 
  - E clique em Salvar

![enter image description here](https://cldup.com/X0eXQW4gSk-3000x3000.png)


Você deve ter chegado na tela acima. Esse é o menu que vai te ajudar a integrar o seu Bot do Api.ai com o seu Aplicativo do Facebook.

Acesse novamente a página de desenvolvedor do Facebook: Acessar

Escolha seu App no menu superior

Agora dentro da painel de configuração do seu App selecione “+Adicionar Produto”;Você deve ter chegado a uma tela igual a esta, selecione a opção ”messenger”. Clique em continuar.

Agora no bloco “Geração de token” que apareceu, escolha no dropdown a sua página criada.

O Facebook vai solicitar algumas permissões, dê as permissões e copie o token que apareceu.

Finalmente, vamos colar esse token na página de configuração do Api.ai que deixamos aberta. (Mas não feche a página do Facebook já vamos voltar nela)

Antes de colar o token você vai precisar virar a chave que ativa a integração do Api.ai com o Messenger do lado direito do Modal.

Cole o Token como na imagem no campo “Page Access Token”.

No campo “Verify Token” preencha com uma palavra secreta segura (“gere uma”) e anote para não perder, vamos usá-la agora no menu de desenvolvedor do Facebook no seu App na mesma página que pegamos o Token.

Agora, vamos voltar na página do Facebook e no bloco “WebHook”, clique em configurar;No campo “Verify Token” cole o Token que você gerou na Página do Api.ai

Vá à Página do Api.ai no modal de integração com o Messenger novamente, copie o campo “Callback Url” e cole na página do Messenger no campo “URL de retorno de chamada“.

Para finalizar, nos Radio Buttons selecione apenas a opção “messages”.

Agora clique Primeiro  em “Start” no Api.ai  depois em  “Verificar e Salvar” no Facebook.


## CONFIGURANDO MENSAGENS NO API.AI

### CUMPRIMENTOS

Vá até a painel do Api.ai

Escolha o Menu “Intent”

Agora vamos adicionar a expressão “Olá” no campo “User Says”

Vamos adicionar alguns palavras correspondentes  extras também como “Oi”, “Hi”, “Hello”, “Eai”

Agora no campo “Speech Response” adicione a seguinte resposta “Olá, como você está?”.

No campo “Intent Name” dê um nome para sua Intent e clique em Salvar.

Agora você pode ver no canto superior direito um campo escrito “Try Now”, lá você pode enviar mensagens pro seu Bot e ver as respostas programadas dele.