# Taskana - tasks manager

# Install

`git clone git@github.com:FreeWebber/taskana.git`
`apt install php-pdo-sqlite`
`cd taskana; php vendor/robmorgan/phinx/bin/phinx migrate -c config-phinx.php`

# Launch

 In Docker:
 
 `php -S 0.0.0.0:80 -t /var/www/taskana/public`

 On local:
 
  `php -S 127.0.0.1:80`
 