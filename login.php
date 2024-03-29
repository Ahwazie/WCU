<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="login-container">
    <div class="logo-container">
        <img class="logo" src="unissalogo.png" alt="Logo">
    </div>
    <form method="post" action="login.php">
      <div class="form-header">
          <div class="login-text">Login</div>
      </div>
      <?php include('errors.php'); ?>
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
      </div>
      <p>
        Not yet a member? <a href="register.php">Sign up</a>
      </p>
    </form>
  </div>
</body>
</html>


