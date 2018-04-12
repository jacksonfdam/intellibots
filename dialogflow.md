
# Dialogflow.com

## Crie uma conta no dialogflow (anteriormente Api.ai)
O dialogflow.com é um plataforma que vai facilitar muito a criação de um Bot que pode responder de maneira fácil perguntas de texto e áudio.  Acesse o Link e crie sua conta: [Criar Conta](https://console.dialogflow.com/api-client/#/login)

![enter image description here](https://dialogflow.com/docs/images/getting-started/basics/001-the-basics.png)

O dialogflow.com é uma plataforma muito bacana aonde você pode configurar rapidamente um Bot que consegue responder frases pré programadas (e até frases similares), ele permite também que você chame um Webhook quando determinada frase for recebida.

Além de ser uma ferramenta possui uma das melhores interfaces para construção de aplicações com NLU, em setembro de 2016, ela foi adquirida pelo Google, o que evidencia o poder da plataforma e o tanto que ela ainda vai evoluir.

No Google I/O de 2017, foi anunciado que os desenvolvedores poderão alcançar usuários do Google Assistant utilizando Actions no dialogflow.com 😮

Uma outra feature anunciada no dia do evento, foi o Analytics da plataforma. A página de análise fornece informações sobre o desempenho do seu agente para que você possa trabalhar em melhorias e focar ainda mais na experiência do usuário

### Introdução
O diagrama abaixo mostra como o dialogflow.com está relacionado a outros componentes e a forma como ele processa os dados:

![enter image description here](https://cdn-images-1.medium.com/max/800/1*GJkOnch_ldkVAAUFPXZnFA.png)

A parte verde é a parte fornecida pela plataforma. Ela está localizada entre sua aplicação que deve fornecer os métodos de entrada e saída, respondendo assim aos dados acionáveis.

Uma opção que pode ser bastante explorada é a implementação de webhook , onde o dialogflow.com permite que sistemas externos recebam notificações de eventos que ocorrem na intenção do usuário, possibilitando que seu serviço execute suas lógicas de negócios ou acesse dados de armazenamento.

Uma opção que pode ser bastante explorada é a implementação de  _webhook ,_ onde o  [dialogflow.com](https://dialogflow.com/)  permite que sistemas externos recebam notificações de eventos que ocorrem na intenção do usuário, possibilitando que seu serviço execute suas lógicas de negócios ou acesse dados de armazenamento.

#### Diálogos

O  [dialogflow.com](https://dialogflow.com/)  recebe uma  _query que_ é texto em linguagem natural ou um nome de evento enviado para plataforma como dados de entrada, que é transformado em seguida em  _actionable data_  e retorna dados de saída.

O processo de transformar a linguagem natural em dados acionáveis ​​como contextos e propriedades de intenções, é chamado  _Natural Language Understanding_  (_NLU_).

#### Conceitos

Tenho uma apresentação com um detalhamento maior [aqui](https://www.slideshare.net/jacksonfdam/desmistificando-o-dialogflow).

[**_Agente_**](https://docs.dialogflow.com/docs/concept-agents): Os agentes podem ser descritos como sendo o módulos  _NLU_. Seu objetivo é transformar o idioma natural do usuário em dados acionáveis.

[**_Entidades_**](https://docs.dialogflow.com/docs/concept-entities): As entidades representam conceitos e servem como uma poderosa ferramenta para extrair valores de parâmetros de entradas de linguagem natural.

[**_Contextos_**](https://docs.dialogflow.com/docs/concept-contexts): Contextos são cadeias de caracteres que representam o contexto atual do pedido de um usuário.

[**_Parâmetros_**](https://docs.dialogflow.com/docs/concept-actions): As ações podem ter parâmetros para extrair informações das entradas de usuários.

[**_Intenções_**](https://docs.dialogflow.com/docs/concept-intents): Uma intenção representa um mapeamento entre o que o usuário diz e quais ações devem ser tomadas pelo seu software.

As interfaces de intenção possuem as seguintes seções:

-   Usuário diz
-   Ação
-   Resposta
-   Contextos

O  [dialogflow.com](https://dialogflow.com/)  disponibiliza um  [**passo a passo**](https://docs.dialogflow.com/docs/get-started)  para tornar o processo de criação e integração de interfaces de conversação, o mais simples possível.

Uma dica legal para você praticar e criar seus agentes, é utilizar o  _Sample Data._

![](https://cdn-images-1.medium.com/max/800/1*7OcP5RAoHUivKuET9rU_TQ.png)

[dialogflow.com](https://dialogflow.com/) — Sample Data

Com ele você consegue carregar dados de amostra, por exemplo, carregar um agente de pizza que utiliza todos os conceitos a serem explorados na plataforma.

![](https://cdn-images-1.medium.com/max/800/1*dRc7chxE6UY7ZthNliw4sg.png)

[dialogflow.com](https://dialogflow.com/)— Intent

Depois de criar e configurar seu agente, você precisa “publica-lo” em algum canal e apesar do  [dialogflow.com](https://dialogflow.com/)  ter várias integrações para isso,

![](https://cdn-images-1.medium.com/max/800/1*kAXIzwOZRt2uichUg9DcRw.png)

[dialogflow.com](https://dialogflow.com/)— Integrations


### AGORA VAMOS CONECTAR O API.AI AO NOSSO APP DO FACEBOOK

 - Acesse sua conta do dialogflow.com: Acessar 

![enter image description here](https://cldup.com/4Ct0vpEFgv.thumb.jpg)

 - Agora clique em “Create Agent”
  - Escolha o nome do seu Bot 
  - Coloque uma descrição se desejar 
  - E clique em Salvar

![enter image description here](https://cldup.com/X0eXQW4gSk-3000x3000.png)


Você deve ter chegado na tela acima. Esse é o menu que vai te ajudar a integrar o seu Bot do dialogflow.com com o seu Aplicativo do Facebook.


- Acesse novamente a página de desenvolvedor do Facebook: [Acessar](https://developers.facebook.com/apps)
 - Escolha seu App
 - Agora dentro da painel de configuração do seu App selecione “+Adicionar Produto”;
 - Selecione a opção ”messenger”. Clique em continuar.

 - Agora no bloco “Geração de token” que apareceu, escolha no dropdown a sua página criada.

![enter image description here](https://cldup.com/QUntbXrFc3.png)

O Facebook vai solicitar algumas permissões, dê as permissões e copie o token que apareceu.
![enter image description here](https://cldup.com/x8FS8Xgs4v.png)
Finalmente, vamos colar esse token na página de configuração do dialogflow.com que deixamos aberta. (Mas não feche a página do Facebook já vamos voltar nela)

![enter image description here](https://cldup.com/-iHWNvmeyo.png)

Antes de colar o token você vai precisar virar a chave que ativa a integração do dialogflow.com com o Messenger do lado direito do Modal.

![enter image description here](https://cldup.com/vFiXBLyLRt.png)
Cole o Token como na imagem no campo “Page Access Token”.

No campo “Verify Token” preencha com uma palavra secreta segura (“gere uma”) e anote para não perder, vamos usá-la agora no menu de desenvolvedor do Facebook no seu App na mesma página que pegamos o Token.

Agora, vamos voltar na página do Facebook e no bloco “WebHook”, clique em configurar;No campo “Verify Token” cole o Token que você gerou na Página do dialogflow.com

![enter image description here](https://cldup.com/6I8RuZbrRV.png)

Vá à Página do dialogflow.com no modal de integração com o Messenger novamente, copie o campo “Callback Url” e cole na página do Messenger no campo “URL de retorno de chamada“.

Para finalizar, nos Radio Buttons selecione apenas a opção “messages”.

Agora clique Primeiro  em “Start” no dialogflow.com  depois em  “Verificar e Salvar” no Facebook.


## CONFIGURANDO MENSAGENS NO DIALOGFLOW

### CUMPRIMENTOS

Vá até a painel do dialogflow.com

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

Fica como exercício para você fazer isso na plataforma do dialogflow.com 

### VAMOS ADICIONAR A URL DO APP AO API.AI

Vamos agora adicionar a Url do nosso aplicativo que subimos para o Heroku ou outro Host ao dialogflow.com para que ele possa chamar nossa função quando ele entender que o User fez uma pergunta.

Dentro do seu painel do dialogflow.com clique em “Fulfillment”.

Vire a chave em “Enable”.

Um campo deve aparecer para você colocar o link do seu aplicativo. 

Pronto agora é só clicar em “Salvar”

### ÚLTIMO PASSO!  FAZER O API.AI CHAMAR NOSSA API

Agora é aonde a mágica finalmente acontece, vamos fazer o dialogflow.com chamar nossa Api para responder a uma pergunta do usuário.

Nós não estamos usando o dialogflow.com atoa, ele é uma plataforma esperta e consegue identificar a pergunta do usuário, separar a “query” da pergunta e passar para a nossa aplicação.

Exemplo, nós vamos configurar nele algumas frases como: “Previsão do Tempo em Porto Alegre”, “Como está o tempo agora em São Paulo”, "Previsão em Curitiba", "Previsão no Rio de Janeiro", e ele vai conseguir identificar que “Porto Alegre”, "Sao Paulo", "Curitiba" e "Rio de Janeiro" são nossos objetos a serem pesquisados e vai enviar essa parte para nossa aplicação, pegar o resultado e devolver para o Messenger.

Primeiro vá ao painel do dialogflow.com.

Clique em Intents e depois em “Create Intent”

Na parte que diz “User Says” insira em linhas diferentes as seguintes frases: “Previsão do Tempo em Porto Alegre”, “Como está o tempo agora em São Paulo”, "Previsão em Curitiba", "Previsão no Rio de Janeiro"

Agora em “Action” escreva “tempo”, queremos que ele passe isso para aplicação.

Agora na parte inferior check a opção “Enable WebHook for this intent”

Agora vem o “Truque principal”, nós temos que mostrar para o dialogflow.com que “Porto Alegre”, "Sao Paulo", "Curitiba" e "Rio de Janeiro" serão nossos objetivos de pesquisa. Para fazer isso:

Vá até “Users Says” na linha que você adicionou “Previsão do Tempo em Porto Alegre”

Selecione com o mouse a palavra “Porto Alegre”


No modal de opções que vai aparecer escolha a opção “@sys.any”
Repita o mesmo processo para “Sao Paulo”, "Rio de Janeiro" e “Curitiba”


\o/ Pronto, agora dê um nome à sua Intent e clique em “Save”!

Agora que você salvou sua Intent no canto direito superior em “Try it Now”, dê o seguinte comando “Previsão Recife”, se tudo correu bem na integração ele deve responder com um preview do conteúdo da previsão de Recife agora.
