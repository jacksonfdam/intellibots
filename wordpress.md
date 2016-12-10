##Downloading

Execute o seguinte a partir do terminal:

    curl -sS http://wordpress.org/latest.zip > wordpress.zip
    unzip wordpress.zip
    rm wordpress.zip
    cd wordpress
    touch Procfile
    touch composer.json
    mv wp-config-sample.php wp-config.php

##Configuração

Copie o seguinte no Procfile:

    web: vendor/bin/heroku-hhvm-nginx

Copie o seguinte no composer.json:

    { "require": { "hhvm": "3.2.0" } }

Localize e substitua o seguinte em wp-config.php:

    // ** MySQL settings - You can get this info from your web host ** //
    $url = parse_url(getenv('DATABASE_URL') ? getenv('DATABASE_URL') : getenv('CLEARDB_DATABASE_URL'));
    
    /** The name of the database for WordPress */
    define('DB_NAME', trim($url['path'], '/'));
    
    /** MySQL database username */
    define('DB_USER', $url['user']);
    
    /** MySQL database password */
    define('DB_PASSWORD', $url['pass']);
    
    /** MySQL hostname */
    define('DB_HOST', $url['host']);
    
    /** Database Charset to use in creating database tables. */
    define('DB_CHARSET', 'utf8');
    
    /** The Database Collate type. Don't change this if in doubt. */
    define('DB_COLLATE', '');
    define('AUTH_KEY',         getenv('AUTH_KEY'));
    define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
    define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
    define('NONCE_KEY',        getenv('NONCE_KEY'));
    define('AUTH_SALT',        getenv('AUTH_SALT'));
    define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
    define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
    define('NONCE_SALT',       getenv('NONCE_SALT'));

## Deployment

Configurar o básico com:

    git init
    git add .
    git commit -m "import"
    heroku create
    heroku addons:add cleardb
    heroku addons:add sendgrid

Em seguida, defina as seguintes variáveis de ambiente com novos valores (eles podem ser gerados [aqui](https://api.wordpress.org/secret-key/1.1/salt/)):

    heroku config:set AUTH_KEY=''
    heroku config:set SECURE_AUTH_KEY=''
    heroku config:set LOGGED_IN_KEY=''
    heroku config:set NONCE_KEY=''
    heroku config:set AUTH_SALT=''
    heroku config:set SECURE_AUTH_SALT=''
    heroku config:set LOGGED_IN_SALT=''
    heroku config:set NONCE_SALT=''

Finalmente implantar a aplicação:

    git push heroku master
    heroku open

###Nota

Heroku suporta um sistema de arquivos efêmero. Isso significa que a instalação de plug-ins ou addons deve ser feita e testada localmente, em seguida, implantada por:

    git add .
    git commit -m "addons and plugins"
    git push heroku master
