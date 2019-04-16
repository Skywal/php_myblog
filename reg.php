<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Site registration';
    require_once 'blocks/head.php';
   ?>
</head>
<body>
  <?php require_once 'blocks/header.php' ?>
  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Registration form</h4>
        <form action="/registration/registration.php" method="post">
          <label for="username">Your name</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="email">Your email</label>
          <input type="text" name="email" id="email" class="form-control">

          <label for="login">Your login</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="password">Your password</label>
          <input type="password" name="password" id="password" class="form-control">

          <button type="submit" class="btn btn-success mt-5">Register</button>
        </form>
      </div>
      <?php require_once 'blocks/aside.php' ?>
    </div>
  </main>
  <?php require_once 'blocks/footer.php' ?>
</body>
</html>
