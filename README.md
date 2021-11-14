<p align="center">
    <h1 align="center">Docker 4 LAMP</h1>
</p>

# About Docker 4 Lamp
This project is intended to be a fast and simple Docker based LAMP environment.  As of the creation of the project, that means by default your environment is set to provide PHP 8 and MySQL 8.  It includes a phpMyAdmin environment for quick web access to the MySQL server.

By default your development environment will be available at http://localhost and phpMyAdmin server will be available at http://localhost:8080.  These host ports can be easily changed in the .env file.

# Quick start

## clone the project
<div class="highlight highlight-source-shell"><pre># Get Docker4LAMP
git clone https://github.com/gizmola/docker4lamp
</pre></div>

## Edit the .env file in the docker4lamp folder
Most of the default settings are fine for your development environment. Change the APP_NAME variable to reflect the name of your new development project.  This name is used to create the container names.
<div class="highlight highlight-source-shell"><pre>
# Docker .env file.
# This is the base for container names for your project.  Set it to something meaningful to avoid conflicts with multiple Docker networks  
APP_NAME=your_project
</pre></div>

## Start the Containers with docker-compose
<div class="highlight highlight-source-shell"><pre># Start the container
docker-compose -d up
</pre></div>

## When you are satisfied with your setup, remove the docker4lamp/.git directory and start developing!

## Developing your code
Your code goes into the docker4lamp/project directory.  docker4LAMP assumes you will be developing a front controller style app, with the webroot set to the project/public directory.  

**[Usage](#usage)** |
**[Features](#feature-overview)** |
**[Contributing](#contributing-)** |
**[License](#license)**