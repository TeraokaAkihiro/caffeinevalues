<?php
  
  require_once("./model.php");

  try{
    $dbh = get_db_connect();
  }catch(PDOException $e){
    echo 'Connection Error : ' . $e->getMessage() . '<br>';
  }

  include_once('./view.php');

?>
