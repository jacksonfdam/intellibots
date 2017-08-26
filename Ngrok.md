# Ngrok – Vá além do localhost

![ngrok](http://www.dicastech.net/wp-content/uploads/2016/12/ngrok-logo.png)
É comum os desenvolvedores web utilizarem um ambiente local para desenvolverem suas aplicações e mais comum ainda terem que apresentar previews para os contratantes.

Em um cenário ideal seria publicar a aplicação em um ambiente na internet com as mesmas características do de produção, mas isso nem sempre é uma tarefa simples.

![ngrok_00](https://pplware.sapo.pt/wp-content/uploads/2017/04/ngrok_00.jpg)

O ngrok é um proxy simplificado que redireciona uma porta de um domínio publicado para outra porta em seu computador.

Para ser mais especifico o ngrok utiliza o dominio http://<subdominio>.ngrok.io e redireciona para qual porta você deseja em sua maquina. O subdomínio é gerado randomicamente no plano gratuito. Na versão paga você pode escolher seu subdomínio. Um exemplo de endereço que estou utilizando no momento:


> https://c9afca08.ngrok.io


Algumas características importantes: Inspetor de requisições, Replay de requisições, Proteção com usuário e senha, websocket e o principal é multiplataforma sem dependências.

 
![ngrok_02](https://pplware.sapo.pt/wp-content/uploads/2017/04/ngrok_02-720x383.jpg)

### Mas, o que é um túnel?

Um túnel é um simples proxy, ou redirecionamento, de um outro computador para o seu. 

Imagine que você, na máquina A, tem um servidor escutando na porta *8080*. Se você criar um túnel reverso para a máquina B na porta *9090*, será possível que alguém, na máquina B, ao acessar *http://127.0.0.1:9090* no navegador, veja o que na verdade está na sua máquina, e não na máquina B, pois todos os dados que foram para tal porta na verdade foram redirecionados para o seu computador e atendidos pelo seu servidor escutando na porta 8080.

### E é isso que o ngrok faz? CONEXÃO ENTRE DUAS MÁQUINAS?

Mais ou menos. O que o Ngrok faz, em termos exatos, é criar um túnel de algum servidor executando na sua máquina para os servidores do Ngrok. Assim, se você tem algum serviço escutando na porta 8080, e executa o Ngrok para criar um túnel para a porta 8080 do seu computador, o Ngrok te fornecerá um endereço no estilo *http://<hash>.ngrok.io* que, ao ser acessado, implicará em acesso ao servidor rodando na sua máquina.

O Ngrok possui algumas características bem interessantes que chamam a atenção:



- **Inspetor de requisições:** Você consegue literalmente ver o que o usuário do outro lado está acessando na sua máquina, incluindo cabeçalhos de requisição e resposta;
- **Replay de requisições:** Se alguma requisição causou alguma exceção na sua aplicação, é possível dar replay nela, de forma que o mesmo conteúdo seja enviado novamente ao seu servidor para verificar se o problema foi corrigido;
- **Proteção com usuário e senha:** Por ser público, a URL do Ngrok pode ser acessada por qualquer um. Para maior proteção, é possível protegê-la definindo um usuário e senha para acesso à URL.
Suporte a websocket: Útil para aplicações em tempo real.
- **Criação de túneis TCP:** Em aplicações que não usam só HTTP, essa feature é útil para permitir o acesso de um servidor TCP qualquer na sua máquina por outras pessoas.
- **Código aberto:** Você pode instalar o servidor do Ngrok em algum VPS que você possua e ter um servidor só seu para criação de túneis para a sua máquina.
- **Multiplataforma:** Pode ser usado em qualquer sistema operacional facilmente pois não possui dependências;

### Como funciona?

Site oficial Ngrok: *[https://ngrok.com](https://ngrok.com)*

Faça o registro no site do ngrok,  sendo que você poderá utilizar sua conta google ou do github.

Copie o arquivo do ngrok para a pasta da sua aplicação.

Execute o ngrok com a sua token gerada no registro exemplo:

    ./ngrok authtoken 8nN9G7RbhVzfsJ1iKy1q_3nPhPtF4326r9wdDg3Vrw


Considerando que o servidor web está no porto 80, só necessita de executar o seguinte comando:

    ngrok http 80

![enter image description here](https://pplware.sapo.pt/wp-content/uploads/2017/04/ngrok_01.jpg)

Depois basta usar o endereço que é gerado para acesso ao servidor local a partir de qualquer parte do mundo.

> **Nota** :  Se quiser autenticação no link basta que use o comando: 

> *ngrok http -auth=”username:password” 8080*

![enter image description here](https://pplware.sapo.pt/wp-content/uploads/2017/04/ngrok_03.jpg)

Como referido é ainda possível “inspecionar” o tráfego dos links gerados. Para isso basta aceder ao endereço *http://localhost:4040/*

![enter image description here](https://pplware.sapo.pt/wp-content/uploads/2017/04/ngrok_04-720x324.jpg)

Mas há mais, pode ver [aqui](https://ngrok.com) todas as funcionalidades desta fantástica e pequena ferramenta.
