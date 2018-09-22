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
      $dbh = new PDO(DSN, DB_USER, DB_PASSWD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(PDOException $e){
      throw $e;
    }

    return $dbh;
  }

  function fetch_as_array($dbh, $sql){

    try{
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $rows = $stmt->fetchAll();
    }catch(PDOException $e){
      throw $e;
    }
    return $rows;
  }

  function fetch_drinks_data($dbh){

    $sql ='
    select
      id
      , drink_name
      , drink_ml
      , caffeine_mg
      , info_source
      , info_source_url
      , create_date
      , update_date
    from
      drinks
    ;';
    return fetch_as_array($dbh, $sql);
  }

?>
