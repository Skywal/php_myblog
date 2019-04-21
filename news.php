<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    require_once 'mysql_connect.php';
    $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
    $id = $_GET['id'];

    $query = $pdo->prepare($sql);
    $query->execute(['id'=> $_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php require_once 'blocks/header.php' ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <div class="jumbotron">
          <h1><?=$article->title ?></h1>
          <p><b>Author:</b> <mark><?=$article->author ?></mark></p>
          <?php
            $date = date('d ', $article->date); // day
            $array = ["January", "February", "March", "April", "May", "June", "July",
                      "August", "September", "October", "November", "December"];
            $date .= $array[date('n', $article->date) - 1]; //month
            $date .= date(' H:i', $article->date); //hour and minutes
          ?>
          <p><b>Publucation time:</b> <u><?=$date ?></u></p>
          <p>
            <?=$article->intro ?>
            <br><br>
            <?=$article->text ?>
          </p>
        </div>
        <?php

        ?>
      </div>
      <?php require_once 'blocks/aside.php' ?>
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
</body>
</html>
