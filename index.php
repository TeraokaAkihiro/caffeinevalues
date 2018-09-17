<?php
  
  if(defined('DATABASE_URL')){
    $heroku_postgresql_url = parse_url(getenv('DATABASE_URL'));
    define('DB_USER', $heroku_postgresql_url['user']);
    define('DB_PASSWD', $heroku_postgresql_url['pass']);
    define('DB_NAME', substr($heroku_postgresql_url['path'], 1));
    define('DSN', sprintf('pgsql:host=%s;dbname=%s', $heroku_postgresql_url['host'], DB_NAME));
  }else{
    // local database config
    require_once("./conf/db_conf.php");
  }
  try{
    $pdo = new PDO(DSN, DB_USER, DB_PASSWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }catch(PDOException $e){
    echo 'Connection Error : ' . $e->getMessage() . '<br>';
  }
  var_dump(phpversion());
  var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));
?>
<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <title>Caffeine Values</title>
</head>
<body>
  
</body>
</html>
