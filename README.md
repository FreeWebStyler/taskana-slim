## Taskana - tasks manager on PHP framework "Slim"

### Install

`git clone git@github.com:FreeWebber/taskana.git`

`apt install php-pdo-sqlite`

`cd taskana; php vendor/robmorgan/phinx/bin/phinx migrate -c config-phinx.php` - create SQLite DB in /db/

And maybe `php composer.phar update`

### Launch

 In Docker:

 `php -S 0.0.0.0:80 -t /var/www/taskana/public`

 On local in public directory:

  `#php -S 127.0.0.1:80`



//My github project (not finished yet) based on this lessons - https://github.com/FreeWebber/taskana