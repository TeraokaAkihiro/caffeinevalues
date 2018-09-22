<?php
  
  require_once("./model.php");

  $drinks = array();

  try{
    $dbh = get_db_connect();
    $drinks = fetch_drinks_data($dbh);
  }catch(PDOException $e){
    echo 'Connection Error : ' . $e->getMessage() . '<br>';
  }

  include_once('./view.php');

?>
