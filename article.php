<?php
  /*redirect to other page if not registered*/
  if($_COOKIE['login'] == ''){
    header('Location: /reg.php');
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Article adding';
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php require_once 'blocks/header.php' ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Article adding</h4>
        <form action="" method="post">
          <label for="title">Article title</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="intro">Intro</label>
          <textarea name="intro" id="intro" class="form-control"></textarea>

          <label for="text">Text</label>
          <textarea name="text" id="text" class="form-control"></textarea>

          <div class="alert alert-danger mt-2" id="error_block"></div>

          <button type="button" id="article_send" class="btn btn-success mt-3">
            Add
          </button>
        </form>
      </div>
      <?php require_once 'blocks/aside.php' ?>
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
  <!-- Asynchronous requesting allow not to reboot page -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#article_send').click(function () {
      var title = $('#title').val();
      var intro = $('#intro').val();
      var text = $('#text').val();

      $.ajax({
        url: '/ajax/add_article.php',
        type: 'POST',
        cache: false,
        data: {'title' : title, 'intro' : intro, 'text' : text},
        dataType: 'html',
        success: function(data) {
          if(data == 'Done'){
            $('#article_send').text('All done');
            $('#error_block').hide();
          } else {
            $('#error_block').show();
            $('#error_block').text(data);
          }
        }
      });
    });
  </script>
</body>
</html>
