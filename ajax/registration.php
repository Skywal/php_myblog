<?php
    //filtration of POST request (security issue) and trim whitespace
  $username =trim(filter_var($_POST['username'],  FILTER_SANITIZE_STRING));
  $email = trim(filter_var($_POST['email'],  FILTER_SANITIZE_EMAIL));
  $login = trim(filter_var($_POST['login'],  FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['password'],  FILTER_SANITIZE_STRING));

  $error = '';

  //minimal requirements
  if(strlen($username) <= 3)
    $error = 'Enter name';
  elseif (strlen($email) <= 3)
    $error = 'Enter email';
  elseif (strlen($login) <= 3)
    $error = 'Enter login';
  elseif (strlen($pass) <= 3)
    $error = 'Enter password';

  if($error != ''){
    echo $error;
    exit();
  };

  //password encrypting
  $hash = "alk453qehjh8765hfuaih32fgd1874zh9kjhf4456auhe"; // adding to password
  $password = md5($pass . $hash); //crypting password using function md5 and our $hash variable

  // connect_database(); // connect to database
  require_once '../mysql_connect.php';

  $sql = 'INSERT INTO users(name, email, login, password) VALUES (?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$username, $email, $login, $password]);

  echo 'Done';
?>
