<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
<div class="signup-form">
    <form action="" method="post">
        <div class="form-header">
          <h2>Sign up</h2>
          <p>login to al</p>
        </div>
        <div class="form-group">
          <label>username</label>
          <input type="text" class="form-control" nam="user-name" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label>password</label>
          <input type="password" class="form-control" nam="user-pass" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label>email add</label>
          <input type="email" class="form-control" nam="user-email" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>country</label>
          <select class="form-control" name="user-country" required>
              <option disabled="">select a country</option>
              <option>pakistanUnited states of america</option>
              <option>India</option>
              <option>UK</option>
              <option>Bangadesh</option>
              <option>france</option>
            </select>
        </div>
        <div class="form-group">
           <label>Gender</label>
           <select class="form-control" name="user-gender" required>
               <option disabled="">select a gender</option>
               <option>male</option>
               <option>female</option>
               <option>others</option>
            </select>
        </div>
        <div class="form-group">
            <label class="checkbox"><input type="checkbox" name="" required>accept the <a href="#">Terms of user</a>$amp; <a href="#">privacy policy</a></label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign-up">sign in</button>
        </div>
        <?php include("signup_user.php");?>
    </form>
    <div class="text-center small" style="color:#674288;">Dont have account? <a href="signup.php">already</a></div>
</div>

</body>
</html>