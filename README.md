<p align="center" width="100%">
    <h1 align="center">Docker 4 LAMP</h1>
</p>
<p align="center" width="100%">
<img height="276" width="552" src="assets/docker4lamp.png" alt="Docker4LAMP logo">
</p>

**[About](#about-docker-4-lamp)** |
**[Features](#features)** |
**[Quick Start](#quick-start)** |
**[Settings](#settings)** |
**[Development](#development)** |
**[Localhost SSL](#localhost-ssl)** |
**[Composer](#composer)** |
**[MySQL](#mysql)** |
**[Node](#node)** |
**[XDebug](#xdebug)** |
**[Contributing](#contributing)** |
**[License](#license)**

## About

The Docker4LAMP project is intended to be a minimal but effective Docker based LAMP(Linux,Apache,MySQL,PHP) environment  

It is intended to provide everything needed to have a structured development LAMP stack up and running on your workstation with a project layout in place that will allow you to iteratively develop a modern PHP application

## Features

### List of Basic Features

- PHP 8.012
- Apache 2
- xdebug-3.1.1 (and documentation for connecting the Visual Studio Code debugger to the container)
- MySQL8
- PhpMyAdmin running by default on port 8080
- A mkcert container that generates certs for a dev domain
- A Node container for running npm and yarn
- Allowance for customization of mysql, php and apache configuration files
- Composer installed in the Server container
- A simple .env file that handles container naming, allowing for multiple unique container setups and port changes through simple text edits
- A preconfigured place to put project development files, that can support modern front-controller framework based applications
- essential documentation

By default your environment is set to provide PHP 8 and MySQL 8.  It includes the official _phpMyAdmin:latest_ docker environment for quick web interface access to the MySQL server, and is configured with version 3.x of _xdebug_, in a configuration that is tested and known to work with [VSCode](https://code.visualstudio.com/), and should work with other popular editors that support xdebug.

By default your development environment will be available at http://localhost and the phpMyAdmin server will be available at http://localhost:8080.  These host ports are documented and can be easily changed in the top level .env file used by docker.

## Quick start

### clone the project

<div class="highlight highlight-source-shell"><pre># Get Docker4LAMP
git clone https://github.com/gizmola/docker4lamp
</pre></div>

### Edit the .env file in the docker4lamp folder

Most of the default settings should not need to be changed for your development environment. Change the **APP_NAME** variable to reflect the name of your new development project.  This name is used to create the container names.

In most cases you don't need to change any of the defaults, as this is a development environment running on your workstation!

<div class="highlight highlight-source-shell"><pre># /docker4lamp .env file.
APP_NAME=your_project
</pre></div>

**APP_NAME** is the base for container names for your project.  Set it to something meaningful to avoid conflicts if you want to use _docker4Lamp_ on multiple projects.  This setting also helps you see which containers and images are part of your project.

**TLD** is the "Top Level Domain" used for the development certificate.  It defaults to "test". This is the recommended/reserved TLD for local development domains and will not conflict with any production domains or DNS resolution.  Only change this if you are sure you know what you are doing. 

## Settings

- **Keep in mind that the container names, database users and names are all created when the containers are first built. If you do want to change any defaults, be sure to edit the .env file before your first _docker-compose up_**

- If you intend to run multiple _docker4lamp_ projects _simultaneously_, you will have to change the apache and phpmyadmin ports. 

- Switching between projects by using **docker-compose up/down** doesn't require any changes other than different APP_NAME settings.

- Once the database is created, if you make changes to the database settings in the .env file, you will have to remove the database container and it's related volume in order to reinitialize the database container. You will lose any data you created if you remove the volume.  

### Starting the Containers

<div class="highlight highlight-source-shell"><pre># Start the container
docker-compose -d up
</pre></div>

## Development

### Satisfied with your setup?

 - Stop your containers using docker-compose down  
 - Remove the docker4lamp/.git directory.
 - Optionally, rename the docker4lamp directory to a project name of your choosing
 - start adding code, and/or packages with composer/composer.json
 - Add your docker4lamp project to git

## Localhost SSL

docker4compose uses the [mkcert project](https://github.com/FiloSottile/mkcert) to generate valid SSL certificates for your _docker4lamp_ environment.  This relieves you of having to install and run mkcert yourself, or reconfiguring the apache vhost.  

All you need to do is retrieve the root cert from the container and install it in your workstation's local certificate store.

By default, the cert will allow for valid SSL access to *.**APP_NAME**.test

### Installing the cert

- The /cert directory is designed for you to keep a locally accessible copy of the generated certs
- Step #1: Copy the certs from the container

<div class="highlight highlight-source-shell"><pre>
docker cp APP_NAME-mkcert:/root/.local/share/mkcert/ ./cert/
</pre></div>

- Step #2: Install the root cert on your workstation

For __Mac/OSX__:

<div class="highlight highlight-source-shell"><pre>
sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain ./cert/mkcert/rootCA.pem
</pre></div>

For __Windows__:
**NOTE:** You must be in a shell that was Run as Administrator!
<div class="highlight highlight-source-shell"><pre>
certutil.exe -addstore root ./cert/mkcert/rootCA.pem
</pre></div>

- Step #3: Add an entry to your */etc/hosts* file for your dev domain.  Assuming that your **APP_NAME** is "d4lprjct":
_If you are using windows the hosts file is located at **c:\Windows\System32\Drivers\etc\hosts**.  You must open it with an editor that was "Run as Administrator" in order to save it._

<div class="highlight highlight-source-shell"><pre>
127.0.0.1 d4lprjct.test www.d4lprjct.test
</pre></div>

_Your browser should see your development server as valid when you open https://www.d4lprjct.test

#### Note for Firefox users:
By default Firefox does not trust root certs installed in the operating system.  [You can work around this using Mozilla's documentation.](https://support.mozilla.org/en-US/kb/setting-certificate-authorities-firefox)

### Developing your code

Your code goes into the docker4lamp/_project_ directory. Don't change the name of this directory unless you are clear on changes you would need to make to the apache and debug settings

_docker4LAMP_ assumes you will be developing a front controller style app, with the webroot set to the _project/ public_ directory

## Composer

You can verify the names of your containers from your workstation by running

<div class="highlight highlight-source-shell"><pre>
docker ps
</pre></div>

Check the _name_ column of the output.  The Apache/PHP container will have a name like:  **your_project-server**

You will substitute the server container name for your project, shown in the name column from the _docker ps_ command

### docker exec & composer

Access the container using Docker exec:

<div class="highlight highlight-source-shell"><pre># connect as user www-data
docker exec -it -u www-data:www-data -w /var/www/html/project **APP_NAME**-server /bin/bash
</pre></div>

Once you are exec'd in the container you can run composer.  This example will create a project composer.json and install the monolog component library

<div class="highlight highlight-source-shell"><pre>
# Example
composer require monolog/monolog
</pre></div>

## MySQL

### Connecting to the database from PHP

docker4lamp creates a database with the same name as your **APP_NAME** variable.

### mysql default settings:
- hostname: **db**
- database: **APP_NAME**
- username: **admin**
- password: **secret**

These settings are used by phpMyAdmin to connect to your database.  The docker network allows the php/apache server to connect to the database using the hostname **db**

These credentials can be used with mysqli or PDO to configure the database for development use.  docker4LAMP was designed so that you can simply use the database and user created for you. 

### Example PDO settings

    <?php

    try {
        $pdo = new \PDO(
            'mysql:host=db;dbname=your_project;charset=utf8mb4', 'admin', 'secret', 
            array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            )
        );
        Echo "Connected Successfully";
    
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

### MySQL settings

If you want to change the defaults, edit the username, password, database settings in the **.env** file.  

If you want to add additional databases, users etc. use docker to connect to the mysql container with docker exec.  The mysql container will be named **APP_NAME-database**.  The example below assumes **APP_NAME**=_your_project_

<div class="highlight highlight-source-shell"><pre># root password: root_secret
docker exec -it your_project-database mysql -u root -p your_project
</pre></div>

## Node

### Running npm or yarn commands

The node service is already configured to create files and modules inside your project directory.  It provides a way to integrate your react,vue,sass etc. components without having to install node modules and components on your local server.  You can run these tools when you need them.

One excellent way of integrating javascript/scss is to use the symfony [webpack encore](https://symfony.com/doc/current/frontend.html) package. 

The ideal way to use the docker4lamp node service is to execute **docker-compose run --rm node ....** when you need yarn or npm. 

Keep in mind, that the node service is not intended to persist, so make sure you use the **--rm** flag, or you will create new containers filling up your system.  

### To demonstrate use of the Node container, here is a simple howto that installs the node sass compiler.
- under project create an src/scss directory.  Your sass files will go here.
- under the public directory create a css directory.  The sass compiler will place the file here.
- create the file src/scss/main.scss
- Add some simple scss code like this:
<div class="highlight highlight-source-shell"><pre>
    $blue: blue;
    body {
        background: $blue;
    }
</pre></div>

- Install and configure the sass compiler

<div class="highlight highlight-source-shell"><pre># Example: Install Yarn and add the SASS compiler
docker-compose run --rm node yarn install
# This makes your package.json file.  Complete the prompts as you prefer
docker-compose run --rm node yarn init
# Install sass with the -D flag for development dependency
docker-compose run --rm node yarn add sass -D
# Run the sass compiler and watch for changes
docker-compose run --rm node yarn sass -w src/scss:public/css
</pre></div>

_The sass compiler will create /public/css/main.css as well as main.css.map and will continue to watch for changes you make to /src/scss/main.scss_

## XDebug

The base server image includes XDebug, as well as a preconfigured _xdebug.ini_ in the _server/php/conf.d_ directory 

### VSCode

To debug with VSCode, you must install the [PHP Debug Extension](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) by Felix Becker

A verified working VSCode launch.json is included below:

<div class="highlight highlight-source-shell"><pre>
    {
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Xdebug for Docker",
            "type": "php",
            "request": "launch",
            "port": 9003,
            //"stopOnEntry": true,
            //"log": true,
            "pathMappings": {
                "/var/www/html/project": "${workspaceFolder}/project"
            }
        },
        {
            "name": "Launch currently open script",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "port": 9003
        }
    ]
}
</pre></div>

## Contributing

**[Contributing](CONTRIBUTING.md)**

## License

**[MIT License](LICENSE.md)**

Copyright (c) 2021-2022 **[David Rolston](https://github.com/gizmola)**
