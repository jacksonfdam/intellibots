#Heroku

## O que é o heroku?

O heroku é uma das opções mais populares de plataforma como serviço (PaaS), com ele é possivel publicar aplicativos escritos em diversas linguagens, inclusive PHP, sem se preocupar com a infra-estrutura necessária para que seu programa seja executado, e tudo isso é feito de uma maneira muito transparente.

A ideia é que depois de tudo configurado (o que não é lá muita coisa) você só precisa executar um comando para ter sua aplicação no ar, nada de usar ftp, nem de se preocupar caso você suba alguma coisa com bug e principalmente em passar horas instalando dependências e configurando o servidor.

Para começar você só precisa de três coisas: a primeira é se cadastrar lá no heroku, obvio, o [link de cadastro é esse](http://heroku.com) eles possuem um plano free com limitações, mas é o suficiente para o que vamos fazer, a segunda é ter o [git](https://git-scm.com/downloads) instalado e configurado no seu computador e por último instalar esse cara aqui que é o cinto de utilidades do heroku, esse programa possibilita toda a comunicação entre sua máquina e a plataforma de deploy.

Para seguir em frente, aconselho que você tenha o minimo de conhecimento sobre o git ([esse artigo é um bom lugar para começar](http://rogerdudler.github.io/git-guide/index.pt_BR.html)) e não tenha medo de usar o terminal :p já que praticamente todo o processo vai ser feito com ele.

Para saber se o Heroku está funcionando Ok, abra um terminal e digite:

	C:\Users\jackson>heroku --version
	heroku/toolbelt/3.43.14 (i386-mingw32) ruby/2.1.7
	heroku-cli/5.5.5-789c5b7 (windows-386) go1.7.4
	You have no installed plugins.

Geralmente, é uma boa idéia fazer login e adicionar sua chave pública imediatamente após a instalação do Heroku CLI para que você possa usar o git para empurrar ou clonar repositórios de aplicativos Heroku:

	C:\Users\jackson>heroku login
	Enter your Heroku credentials.
	Email: adam@example.com
	Password (typing will be hidden):
	Authentication successful.

Verifique as versões:

PHP

	C:\Users\jackson>php -v
	PHP 7.0.5 (cli) (built: Apr 26 2016 04:39:48) ( NTS )
	Copyright (c) 1997-2016 The PHP Group
	Zend Engine v3.0.0, Copyright (c) 1998-2016 Zend Technologies

Composer

	C:\Users\jackson>composer -V
	Composer version 1.1-dev (135783299af0281db918c103cceb2b202ae154f2) 2016-04-27 13:04:01

GIT

	C:\Users\jackson>git --version
	git version 2.2.1

###Preparar a aplicação

Nesta etapa, você preparará um aplicativo simples que pode ser implantado.
Para clonar o aplicativo de exemplo para que você tenha uma versão local do código que você pode então implantar no Heroku, execute os seguintes comandos em seu shell de comando local ou no terminal:

	C:\xampp\htdocs>git clone https://github.com/heroku/php-getting-started.git LucidaBot
	C:\xampp\htdocs>cd LucidaBot

###Implantar o aplicativo

Nesta etapa, você implantará o aplicativo no Heroku.

Crie um aplicativo no Heroku, que prepara o Heroku para receber seu código-fonte:
	
	C:\xampp\htdocs\LucidaBot>heroku create
	Heroku CLI submits usage information back to Heroku. If you would like to disable this, set `skip_analytics: true` in C:\Users\Larissa\AppData\Local/heroku/config.json
	Creating app... done, mighty-falls-63787
	https://mighty-falls-63787.herokuapp.com/ | https://git.heroku.com/mighty-falls-63787.git

Agora implante seu código:
	
	C:\xampp\htdocs\LucidaBot>git push heroku master
	Counting objects: 174, done.
	Delta compression using up to 2 threads.
	Compressing objects: 100% (92/92), done.
	Writing objects: 100% (174/174), 44.38 KiB | 0 bytes/s, done.
	Total 174 (delta 68), reused 174 (delta 68)
	remote: Compressing source files... done.
	remote: Building source:
	remote:
	remote: -----> PHP app detected
	remote: -----> Bootstrapping...
	remote: -----> Installing platform packages...
	remote:        NOTICE: No runtime required in composer.json; requirements
	remote:        from dependencies in composer.lock will be used for selection
	remote:        - php (7.1.0)
	remote:        - apache (2.4.20)
	remote:        - nginx (1.8.1)
	remote: -----> Installing dependencies...
	remote:        Composer version 1.2.2 2016-11-03 17:43:15
	remote:        Loading composer repositories with package information
	remote:        Installing dependencies from lock file
	remote:          - Installing psr/log (1.0.1)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing monolog/monolog (1.21.0)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/routing (v3.0.9)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/polyfill-mbstring (v1.2.0)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/http-foundation (v3.0.9)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/event-dispatcher (v3.0.9)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/debug (v3.1.4)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/http-kernel (v3.0.9)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing pimple/pimple (v1.1.1)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing silex/silex (v1.3.5)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing twig/twig (v1.25.0)
	remote:            Downloading: 100%
	remote:
	remote:          - Installing symfony/twig-bridge (v2.8.11)
	remote:            Downloading: 100%
	remote:
	remote:        Generating optimized autoload files
	remote: -----> Preparing runtime environment...
	remote: -----> Checking for additional extensions to install...
	remote: -----> Discovering process types
	remote:        Procfile declares types -> web
	remote:
	remote: -----> Compressing...
	remote:        Done: 14.7M
	remote: -----> Launching...
	remote:        Released v3
	remote:        https://mighty-falls-63787.herokuapp.com/ deployed to Heroku
	remote:
	remote: Verifying deploy... done.
	To https://git.heroku.com/mighty-falls-63787.git
	 * [new branch]      master -> master


O aplicativo agora é implantado. Certifique-se de que pelo menos uma instância da aplicação esteja em execução:

	C:\xampp\htdocs\LucidaBot>heroku ps:scale web=1
	Scaling dynos... done, now running web at 1:Free

Agora, visite o aplicativo no URL gerado pelo nome do aplicativo. Como um atalho acessível, você pode abrir o site da seguinte forma:

	C:\xampp\htdocs\LucidaBot>heroku open

### Ver Logs

	C:\xampp\htdocs\LucidaBot>heroku logs --tail	

### Definir um Procfile	

Use um arquivo de texto, Procfile, no diretório raiz do seu aplicativo, para declarar explicitamente qual comando deve ser executado para iniciar seu aplicativo.

O Procfile no aplicativo de exemplo implantado é semelhante a este:
	
	web: vendor/bin/heroku-php-apache2 web/

Isso declara um único tipo de processo, web e o comando necessário para executá-lo. O nome web: é importante aqui. Ele declara que esse tipo de processo será anexado à pilha de roteamento HTTP do Heroku e receberá tráfego da Web quando implantado.

Os procfiles podem conter tipos de processo adicionais. Por exemplo, você pode declarar um para um processo de trabalho em segundo plano que processa itens fora de uma fila.

### Complementos de provisão

Os complementos são serviços em nuvem de terceiros que oferecem serviços adicionais prontos para a sua aplicação, desde a persistência até o monitoramento e muito mais.

O complemento agora é implantado e configurado para seu aplicativo. Você pode listar complementos para seu aplicativo da seguinte forma:
		
	C:\xampp\htdocs\LucidaBot>heroku addons

### Disponibilizar uma base de dados

O mercado de add-on tem um grande número de lojas de dados, de provedores Redis e MongoDB, para Postgres e MySQL. 
Nesta etapa, você adicionará um banco de dados gratuito de Heroku Postgres Starter Tier para seu aplicativo.


	C:\xampp\htdocs\LucidaBot>heroku addons:create cleardb:ignite

Isso fornecerá automaticamente seu novo banco de dados ClearDB para você e retornará o URL do banco de dados para acessá-lo.

Você pode recuperar seu novo URL de banco de dados ClearDB emitindo o seguinte comando:	

	C:\xampp\htdocs\LucidaBot>heroku config
	=== mighty-falls-63787 Config Vars
	CLEARDB_DATABASE_URL: mysql://b81ca915a5bd69:f02a984f@us-cdbr-iron-east-04.cleardb.net/heroku_b8fbf5b72523be0?reconnect=true

Depois de obter o url de banco de dados cleardb, podemos importar as tabelas seguindo o comando:

	mysql -u bda37eff166954 -h us-cdbr-iron-east-04.cleardb.net -p heroku_3c94174e0cc6cd8

### Declarar dependências de app

Uma vez que adicionamos o banco de dados mysql, precisamos adicionar as dependências também.	

	{
	  "require": {
	    "ext-mysql": "*"
	  },
	   "require": {
	      "ext-gettext": "*"
	    },
	   "require-dev": {
	      "heroku/heroku-buildpack-php": "*"
	   }
	}

O arquivo composer.json especifica as dependências que devem ser instaladas com o aplicativo. Quando um aplicativo é implantado, o Heroku lê este arquivo e instala as dependências apropriadas no diretório do fornecedor.

Execute o seguinte comando para instalar as dependências, preparando seu sistema para executar o aplicativo localmente:	

	composer update

Você deve sempre verificar composer.json e composer.lock em seu repositório git. O diretório do fornecedor deve ser incluído no seu arquivo .gitignore.

### Usando ClearDB com PHP

A conexão com o ClearDB do PHP requer apenas a análise da variável de ambiente CLEARDB_DATABASE_URL e passar as informações de conexão extraídas à sua biblioteca MySQL de escolha, p. MySQLi:

Precisamos modificá-lo no arquivo web / index.php

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$config = array(
	    'host' => $server ,
	    'user' => $username ,
	    'pw' => $password,
	    'db' => $db 
	);

