<?php
$d = date('l \t\h\e jS \o\f F, Y \a\t h:i:s A');
function simpleTestString($date) {
    $string = 'Welcome to the Docker4LAMP default page!';
    $string .= " | " . "Today is $date";
    return $string;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset=UTF-8>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script type="text/javascript" src="https://unpkg.com/external-svg-loader@1.0.0/svg-loader.min.js" async></script>
        <style>
            .neonText {
                color: #fff;
                text-shadow:
                    0 0 7px #fff,
                    0 0 10px #fff,
                    0 0 21px #fff,
                    0 0 42px #bc13fe,
                    0 0 82px #bc13fe,
                    0 0 92px #bc13fe,
                    0 0 102px #bc13fe,
                    0 0 151px #bc13fe;
            }
            body {
                background-color: #010a01;
            }
            main {
                width: 70%;
                font-size: 18px;
                color: #F0F0F0;              
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;  
                padding-right: 20px;
                padding-left: 20px;
            }
            h1 {
                margin: 1.2rem;
                text-align: center;
                font-size: 3.5rem;
                font-weight: bold;
                animation: pulsate 1.5s infinite alternate;  
                border: 0.2rem solid #fff;
                border-radius: 2rem;
                padding: 0.5em;
                box-shadow: 0 0 .2rem #fff,
                            0 0 .2rem #fff,
                            0 0 2rem #bc13fe,
                            0 0 0.8rem #bc13fe,
                            0 0 2.8rem #bc13fe,
                            inset 0 0 1.3rem #bc13fe; 
            }
            h2, h3, h4, h5 {
                color: darkorchid;
                text-shadow: -1px 1px 2px white;
            }
            .logos {
                margin: 1.2rem;
                text-align: center;    
            }
            svg {
                margin: 5px 5px;
                width: 64px;
                height: 64px;
            }
            nav {
                margin-bottom: .8rem;
            }
            @keyframes pulsate { 
                100% {           
                    text-shadow:
                        0 0 4px #fff,
                        0 0 11px #fff,
                        0 0 19px #fff,
                        0 0 40px #bc13fe,
                        0 0 80px #bc13fe,
                        0 0 90px #bc13fe,
                        0 0 100px #bc13fe,
                        0 0 150px #bc13fe;                
                }                
                0% {            
                    text-shadow:
                        0 0 2px #fff,
                        0 0 4px #fff,
                        0 0 6px #fff,
                        0 0 10px #bc13fe,
                        0 0 45px #bc13fe,
                        0 0 55px #bc13fe,
                        0 0 70px #bc13fe,
                        0 0 80px #bc13fe;           
                }
            }
            @media screen and (prefers-reduced-motion) { 
                h1 {
                    animation: none;
                }
            }
          </style>    
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8080">phpMyAdmin</a></li>
                        <li class="nav-item"><a class="nav-link" href="phpinfo.php">phpInfo</a></li>                        
                    </ul>
                    <?php echo simpleTestString($d); ?>
                </div>
            </nav>
        </header>
        <main>
            <h1 class="neonText">Docker 4 LAMP</h1>
            <p class="logos">
                <a href="https://www.docker.com/" title="Docker Container orchestration"><svg role="img" xmlns="http://www.w3.org/2000/svg" data-src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/docker.svg" fill="#2496ED"></svg></a>
                <a href="https://www.linuxfoundation.org/" title="Linux Foundation"><svg role="img" xmlns="http://www.w3.org/2000/svg" data-src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/linux.svg" fill="#FCC624"></svg></a>
                <a href="https://httpd.apache.org/" title="Apache HTTP Server project"><svg role="img" xmlns="http://www.w3.org/2000/svg" data-src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/apache.svg" fill="#D22128"></svg></a>
                <a href="https://www.mysql.com/" title="MySQL open source database"><svg role="img" xmlns="http://www.w3.org/2000/svg" data-src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/mysql.svg" fill="#4479A1"></svg></a>
                <a href="https://httpd.apache.org/" title="Apache HTTP Server project"><svg role="img" xmlns="http://www.w3.org/2000/svg" data-src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/php.svg" fill="#777BB4"></svg></a>
            </p>
            <section class="articles">
                <article>
                    <h2>About</h2>
                    <p>This is a simple jump start Docker development environment skeleton that provides a current Linux-Apache-MySQL-PHP environment on your workstation. It is meant to be the basis for your LAMP projects</p>
                </article>
                <article>
                    <h2>Design goal</h2>
                    <p>Docker4LAMP is meant to be simple, fast and easy to use, and only focuses on providing a modern Localhost LAMP Stack with Docker<br>
                        There are other far more sophisticated Docker template projects that let you pick from a large number of service options.<br>Devilbox, and Laradock are two such projects you might want to consider if Docker4Lamp is missing elements you require</p>
                </article>
                <article>
                    <h2>How to use it</h2>
                    <ol>  
                        <li>The way to use docker4LAMP is to <em>git clone</em> this project into a directory of your choosing</lie>
                        <li>edit the .env file, and change the APP_NAME variable to something that fits your project</li>
                        <li>Start the containers up using <em>docker-compose -d up</em></li>  
                        <li>When you are satisfied with your docker containers, remove the .git directory in the root of the docker4lamp project directory <i>Check with command line git that your project is no longer under git</i> 
                        <li>Add to the composer.json file or docker exec into the server container, and use the composer tool to start a symfony or laravel or other project</li>
                        <li>Add your php code and assets inside the <b>/project</b> directory</li>
                        <li>A text editor like Visual Studio Code can debug your code using the Xdebug extension, which is already configured</li>
                        <li>The webroot is the <b>/project/public</b> directory</li>
                        <li>The webroot is the <b>/project/public</b> directory</li>
                        </p>
                    </ol>
                </article>
                <article>
                    <h2>LAMP Customizing</h2>    
                    <ul>
                        <li>You may need to edit the site.conf file in the docker/server/apache directory</li>                    
                        <li>You may want to edit the my.cnf in the docker/db/mysql directory</li>
                        <li>You may want to add files to the docker/server/php/conf.d directory</li>  
                    </ul>
                </article>
            </section>
        </main>
        <footer class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
            <div class="container-fluid">        
                Created by David Rolston 
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/gizmola" title="GitHub"><img height="32" width="32" alt="github logo" src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/github.svg" /></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.twitter.com/gizmola" title="Twitter"><img height="32" width="32" alt="twitter logo" src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/twitter.svg" /></a>
                    </li>
                </ul>
            </div>
        </footer>
    </body>
</html>