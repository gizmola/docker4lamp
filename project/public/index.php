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
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <meta charset=UTF-8>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            main {
                padding-right: 20px;
                padding-left: 20px;
            }
            h1 {
                font-weight: bold;
                color: darkorchid;
                text-shadow: 2px 2px 4px gray;
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
        <section>
            <main>
                <h1>Docker 4 LAMP</h1>
                <h5>About</h5>
                <p>This is a simple jump start Docker development environment skeleton that provides a current Linux-Apache-MySQL-PHP development environment you can adapt for your projects.</p>
                <h5>Design goal</h5>
                <p>Docker4LAMP is meant to be simple, fast and easy to use, and only focuses on providing a modern Localhost LAMP Stack with Docker.
                    There are other far more sophisticated Docker template projects that let you pick from a large number of service options.  Devilbox, and Laradock are two such projects you might want to consider if Docker4Lamp is missing elements you require.</p>
                <h5>How to use it</h5>  
                <p>The way to use docker4LAMP is to <em>git clone</em> this project into a directory of your choosing.</p>
                <p>Start the containers up using <em>docker-compose -d up</em></p>  
                <p>When you are satisfied with your docker containers, remove the .git directory in the root of the docker4lamp project directory.  Check with command line git that your project is no longer under git.
                    Add to the composer.json file or use the composer tool to start a symfony or laravel or other project.
                </p>
                <ul>
                    <li>You may need to edit the site.conf file in the docker/server/apache directory.</li>                    
                    <li>You may want to edit the my.cnf in the docker/db/mysql directory.</li>
                    <li>You may want to add files to the docker/server/php/conf.d directory.</li>  
                </ul>
            </main>
        </section>
        <footer class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
            <div class="container-fluid">        
                Created by David Rolston 
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/gizmola" title="GitHub"><img height="32" width="32" src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/github.svg" /></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.twitter.com/gizmola" title="Twitter"><img height="32" width="32" src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/twitter.svg" /></a>
                    </li>
                </ul>
            </div>
        </footer>
    </body>
</html>