<?php
  //filtration of POST request (security issue) and trim whitespace
  $title =trim(filter_var($_POST['title'],  FILTER_SANITIZE_STRING));
  $intro = trim(filter_var($_POST['intro'],  FILTER_SANITIZE_STRING));
  $text = trim(filter_var($_POST['text'],  FILTER_SANITIZE_STRING));

  $error = '';

  //minimal requirements
  if(strlen($title) <= 3)
  $error = 'Enter title';
  elseif (strlen($intro) <= 15)
  $error = 'Enter intro';
  elseif (strlen($text) <= 20)
  $error = 'Enter text';

  if($error != ''){
    echo $error;
    exit();
  };

  //connect to database
  require_once '../mysql_connect.php';

  $sql = 'INSERT INTO articles(title, intro, text, date, author) VALUES (?, ?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

  echo 'Done';
?>
