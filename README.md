<p align="center">
    <h1 align="center">Docker 4 LAMP</h1>
</p>

# About Docker 4 Lamp

This project is intended to be a fast and simple Docker based LAMP(Linux,Apache,MySQL,PHP) environment  

It provides everything needed to have a structured development LAMP stack up and running on your workstation with the structure in place that will allow you to iteratively develop a modern PHP application

## List of Basic Features

- PHP 8.012
- Apache 2
- xdebug-3.1.1 (and documentation for connecting the Visual Studio Code debugger to the container)
- MySQL8
- PhpMyAdmin running by default on port 8080
- Allowance for customization of mysql, php and apache configuration files
- Composer installed in the Server container
- A simple .env file that handles container naming, allowing for multiple unique container setups and port changes through simple text edits
- A preconfigured place to put project development files, that can support modern front-controller framework based applications
- essential documentation

By default your environment is set to provide PHP 8 and MySQL 8.  It includes the official _phpMyAdmin:latest_ docker environment for quick web interface access to the MySQL server, and is configured with version 3.x of _xdebug_, in a configuration that is tested and known to work with [VSCode](https://code.visualstudio.com/), and should work with other popular editors that support xdebug.

By default your development environment will be available at http://localhost and the phpMyAdmin server will be available at http://localhost:8080.  These host ports are documented and can be easily changed in the top level .env file used by docker.

# Quick start

## clone the project

<div class="highlight highlight-source-shell"><pre># Get Docker4LAMP
git clone https://github.com/gizmola/docker4lamp
</pre></div>

## Edit the .env file in the docker4lamp folder

Most of the default settings should not need to be changed for your development environment. Change the **APP_NAME** variable to reflect the name of your new development project.  This name is used to create the container names.

<div class="highlight highlight-source-shell"><pre># /docker4lamp .env file.
APP_NAME=your_project
</pre></div>

**APP_NAME** is the base for container names for your project.  Set it to something meaningful to avoid conflicts if you want to use _docker4Lamp_ on multiple projects.  This setting also helps you see which containers and images are part of your project. 

If you intend to run multiple _docker4lamp_ projects simultaneously, you will have to change the apache and phpmyadmin ports as well. Switching between projects by using **docker-compose up/down** doesn't require any changes other than different APP_NAME settings.

## Start the Containers with docker-compose

<div class="highlight highlight-source-shell"><pre># Start the container
docker-compose -d up
</pre></div>

## Satisfied with your setup?

 - Stop your containers using docker-compose down  
 - Remove the docker4lamp/.git directory.
 - Optionally, rename the docker4lamp directory to a project name of your choosing
 - start adding code, and/or packages with composer/composer.json
 - Add your docker4lamp project to git

## Developing your code

Your code goes into the docker4lamp/_project_ directory. Don't change the name of this directory unless you are clear on changes you would need to make to your apache and debug settings

_docker4LAMP_ assumes you will be developing a front controller style app, with the webroot set to the _project/ public_ directory

## Running Composer inside the Container

You can verify the names of your containers from your workstation by running
<div class="highlight highlight-source-shell"><pre>
docker ps
</pre></div>

Check the _name_ column of the output.  The Apache/PHP container will have a name like:  your_project-server.

You will substitute the server container name for your project, shown in the name column from the docker ps command

## docker exec & composer

Access the container using Docker exec
<div class="highlight highlight-source-shell"><pre># connect as user www-data
docker exec -it -u www-data:www-data -w /var/www/html/project your_project-server /bin/bash
</pre></div>

Once you are exec'd in the container you can run composer.  This example will create a project composer.json and install the monolog component library

<div class="highlight highlight-source-shell"><pre>
composer require monolog/monolog
</pre></div>

## Debugging with XDebug

The base server image includes XDebug, as well as a preconfigured xdebug.ini in the server/php/conf.d directory. 

# VSCode

You must install the [PHP Debug Extension](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) by Felix Becker.

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
