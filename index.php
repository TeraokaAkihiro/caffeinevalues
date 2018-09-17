<?php

  require_once("./conf/conf.php");
  
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
