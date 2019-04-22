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
        <h3 class="mt-5">Comments</h3>
        <form action="/news.php?id=<?=$_GET['id']?>" method="post">
          <label for="username">Your name</label>
          <input type="text" name="username" id="username" value="<?=echo_login(); ?>"class="form-control">

          <label for="message">Your message</label>
          <textarea name="message" id="message" class="form-control" rows="3"></textarea>

          <div class="alert alert-danger mt-2" id="error_block"></div>

          <button type="submit" id="mess_send" class="btn btn-success mt-3">
            Add comment
          </button>
        </form>
        <?php
          if(!empty($_POST['username']) && !empty($_POST['message'])){
            $username =trim(filter_var($_POST['username'],  FILTER_SANITIZE_STRING));
            $message = filter_var($_POST['message'],  FILTER_SANITIZE_STRING);

            $sql = 'INSERT INTO comments(name, message, article_id) VALUES (?,?,?)';
            $query = $pdo->prepare($sql);
            $query->execute([$username, $message, $_GET['id']]);
          }

          // commnets output
          $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
          $query = $pdo->prepare($sql);
          $query->execute(['id' => $_GET['id']]);
          $comments = $query->fetchAll(PDO::FETCH_OBJ);

          foreach ($comments as $comment) {
            echo "<div class='alert alert-info mb-2'>
              <h4>$comment->name</h4>
              <p>$comment->message</p>
            </div>";
          }

          // print login into text input if logged
          function echo_login(){
            if(!empty($_COOKIE['login']))
              return  $_COOKIE['login'];
            return '';
          }
         ?>
      </div>
      <?php require_once 'blocks/aside.php' ?>
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
</body>
</html>
