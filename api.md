# Api.ai

## Crie uma conta no Api.ai
O Api.ai é um plataforma que vai facilitar muito a criação de um Bot que pode responder de maneira fácil perguntas de texto e áudio.  Acesse o Link e crie sua conta: [Criar Conta](https://console.api.ai/api-client/#/signup)

![enter image description here](http://i2.wp.com/onebitcode.com/wp-content/uploads/2016/09/apiai.jpg?resize=768,298)

O Api.ai é uma plataforma muito bacana aonde você pode configurar rapidamente um Bot que consegue responder frases pré programadas (e até frases similares), ele permite também que você chame um Webhook quando determinada frase for recebida.

O Api.ai é gratuito até 6000 chamadas mensais, claro que isso é pouco para uma aplicação profissional, porém para nossos propósitos é suficiente.

### AGORA VAMOS CONECTAR O API.AI AO NOSSO APP DO FACEBOOK

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

![enter image description here](http://i1.wp.com/onebitcode.com/wp-content/uploads/2016/09/Captura-de-tela-de-2016-09-13-20-44-11.png?w=621)

Vamos adicionar alguns palavras correspondentes  extras também como “Oi”, “Hi”, “Hello”, “Eai”

![enter image description here](http://i1.wp.com/onebitcode.com/wp-content/uploads/2016/09/Captura-de-tela-de-2016-09-13-20-53-47.png?w=767)

Agora no campo “Speech Response” adicione a seguinte resposta “Olá, como você está?”.

No campo “Intent Name” dê um nome para sua Intent e clique em Salvar.

Agora você pode ver no canto superior direito um campo escrito “Try Now”, lá você pode enviar mensagens pro seu Bot e ver as respostas programadas dele.

Mande um “Hello” e veja se ele responde corretamente.

No menu à esquerda  clique em adicionar mais uma Intent.

Dê um nome para sua nova Intent e no campo “User Says” coloque essas opções “Estou bem”, “Tudo bem”, “Estou Ok”, “Bem” e outras expressões que se encaixem em uma reposta a pergunta “como você está?”

![captura-de-tela-de-2016-09-13-20-53-47](http://i1.wp.com/onebitcode.com/wp-content/uploads/2016/09/Captura-de-tela-de-2016-09-13-20-53-47.png?w=767)

No campo “Speech Response” coloque as seguintes opções “Fico feliz que você está bem”, “Que bom que você está bem”.

Salve novamente e faça o teste no chat no canto superior direito.

Primeiro você diz “Olá”, depois quando o bot perguntar se você está bem, você responde dizendo “Estou bem” e você vai receber uma das respostas que colocou no “Speech Response”

Pronto o Bot já sabe um cumprimento. 

### PROGRAMANDO O BOT PARA DIZER QUAIS SÃO SUAS HABILIDADES ATUAIS

Para fazer isso basta você criar um “Intent” que responde qual a habilidade atual do seu “Bot”. Algo como: “Quais são suas habilidades Bot?”, “Quais habilidades você tem?” ou até mesmo “O que você sabe fazer?” e o Bot pode responder algo como “Eu sei somar dois números”.

Fica como exercício para você fazer isso na plataforma do Api.ai 

### VAMOS ADICIONAR A URL DO APP AO API.AI

Vamos agora adicionar a Url do nosso aplicativo que subimos para o Heroku ou outro Host ao Api.ai para que ele possa chamar nossa função quando ele entender que o User fez uma pergunta.

Dentro do seu painel do Api.ai clique em “Fulfillment”.

Vire a chave em “Enable”.

Um campo deve aparecer para você colocar o link do seu aplicativo. 

Pronto agora é só clicar em “Salvar”

### ÚLTIMO PASSO!  FAZER O API.AI CHAMAR NOSSA API

Agora é aonde a mágica finalmente acontece, vamos fazer o Api.ai chamar nossa Api para responder a uma pergunta do usuário.

Nós não estamos usando o Api.ai atoa, ele é uma plataforma esperta e consegue identificar a pergunta do usuário, separar a “query” da pergunta e passar para a nossa aplicação.

Exemplo, nós vamos configurar nele algumas frases como: “Previsão do Tempo em Porto Alegre”, “Como está o tempo agora em São Paulo”, "Previsão em Curitiba", "Previsão no Rio de Janeiro", e ele vai conseguir identificar que “Porto Alegre”, "Sao Paulo", "Curitiba" e "Rio de Janeiro" são nossos objetos a serem pesquisados e vai enviar essa parte para nossa aplicação, pegar o resultado e devolver para o Messenger.

Primeiro vá ao painel do Api.ai.

Clique em Intents e depois em “Create Intent”

Na parte que diz “User Says” insira em linhas diferentes as seguintes frases: “Previsão do Tempo em Porto Alegre”, “Como está o tempo agora em São Paulo”, "Previsão em Curitiba", "Previsão no Rio de Janeiro"

Agora em “Action” escreva “tempo”, queremos que ele passe isso para aplicação.

Agora na parte inferior check a opção “Enable WebHook for this intent”

Agora vem o “Truque principal”, nós temos que mostrar para o Api.ai que “Porto Alegre”, "Sao Paulo", "Curitiba" e "Rio de Janeiro" serão nossos objetivos de pesquisa. Para fazer isso:

Vá até “Users Says” na linha que você adicionou “Previsão do Tempo em Porto Alegre”

Selecione com o mouse a palavra “Porto Alegre”


No modal de opções que vai aparecer escolha a opção “@sys.any”
Repita o mesmo processo para “Sao Paulo”, "Rio de Janeiro" e “Curitiba”


\o/ Pronto, agora dê um nome à sua Intent e clique em “Save”!

Agora que você salvou sua Intent no canto direito superior em “Try it Now”, dê o seguinte comando “Previsão Recife”, se tudo correu bem na integração ele deve responder com um preview do conteúdo da previsão de Recife agora.
