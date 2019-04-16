<?php
  //filtration of POST request (security issue) and trim whitespace
  $username =trim(filter_var($_POST['username'],  FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'],  FILTER_SANITIZE_EMAIL));
  $login = trim(filter_var($_POST['login'],  FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['password'],  FILTER_SANITIZE_STRING));

  //minimal requirements
  if(strlen($username) <= 3)
    exit();
  elseif (strlen($email) <= 3)
    exit();
  elseif (strlen($login) <= 3)
    exit();
  elseif (strlen($pass) <= 3)
    exit();

  //password encrypting
  $hash = "alk453qehjh8765hfuaih32fgd1874zh9kjhf4456auhe"; // adding to password
  $password = md5($pass . $hash); //crypting password using function md5 and our $hash variable

  //local database
  $db_user = 'root';
  $db_pasword = 'root';
  $db = 'testing';
  $host = 'localhost';

  $dsn = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
  $pdo = new PDO($dsn, $db_user, $db_pasword);

  $sql = 'INSERT INTO users(name, email, login, password) VALUES (?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$username, $email, $login, $password]);
 ?>
