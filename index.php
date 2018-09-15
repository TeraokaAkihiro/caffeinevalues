<?php

  $url = parse_url(getenv('DATABASE_URL'));

  $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));

  $pdo = new PDO($dsn, $url['user'], $url['pass']);
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