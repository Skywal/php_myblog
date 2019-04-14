<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP blog</title>
  <!-- Bootstrap style -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="/css/main.css">
  <link rel="icon" href="/img/favicon.ico">
</head>
<body>
  <?php require_once 'blocks/header.php' ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        main part of the website
      </div>
      <?php require_once 'blocks/aside.php' ?>
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
</body>
</html>
