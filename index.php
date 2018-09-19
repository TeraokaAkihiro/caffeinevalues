<?php
  
  require_once("./model.php");

  try{
    $pdo = get_db_connect();
  }catch(PDOException $e){
    echo 'Connection Error : ' . $e->getMessage() . '<br>';
  }
  var_dump(phpversion());
  var_dump($pdo->getAttribute(PDO::ATTR_SERVER_VERSION));

  include_once('./view.php');

?>
