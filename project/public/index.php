<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <meta charset=UTF-8>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="http://localhost:8080">phpMyAdmin</a></li>
                    <li><a href="phpinfo.php">phpinfo</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <main>
                <h1>Docker 4 LAMP</h1>
                <p>This is a simple jump start Docker development environment skeleton that provides a current Linux-Apache-MySQL-PHP development environment.</p>
                <p>There are other far more advanced Docker projects that let you pick from a large number of options.  Devilbox is one such project. This is meant to be simple and only does LAMP</p>  
                <p>The way to use this is to git clone this project into a directory of your choosing.  Then find the .git directory in the root of this directory and delete it.  Check with command line git that your project is no longer under git.
                    Add to the composer.json file or use the composer tool to start a symfony or laravel or other project.
                </p>
                <ul>
                    <li>You may need to edit the site.conf file in the docker/server/apache directory.</li>                    
                    <li>You may want to edit the my.cnf in the docker/db/mysql directory.</li> 
                </ul>
            </main>
        </section>
        <footer>Created by David Rolston https://github.com/gizmola  @gizmola</footer>
    </body>
</html>

