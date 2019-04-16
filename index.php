<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'PHP blog';
    require_once 'blocks/head.php';
   ?>
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
