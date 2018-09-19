<?php

  function get_db_connect(){

    if(getenv('DATABASE_URL') === false){
      // local database config
      require_once("./conf/db_conf.php");
    }else{
      $heroku_postgresql_url = parse_url(getenv('DATABASE_URL'));
      define('DB_USER', $heroku_postgresql_url['user']);
      define('DB_PASSWD', $heroku_postgresql_url['pass']);
      define('DSN', sprintf('pgsql:host=%s;dbname=%s',
        $heroku_postgresql_url['host'],
        substr($heroku_postgresql_url['path'], 1)
      ));
    }

    try{
      $pdo = new PDO(DSN, DB_USER, DB_PASSWD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(PDOException $e){
      throw $e;
    }

    return $pdo;
  }

?>
