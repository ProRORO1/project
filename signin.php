<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signin.css">
   
</head>
<body>
<div class="signin-form">
    <form action="" method="post">
       <div class="form-header">
          <h2>Sign in</h2>
          <p>login to mychat</p>
       </div>
        <div class="form-group">
           <label>Email</label>
           <input type="email" class="form-control" nam="email" autocomplete="off" required>
        </div>
        <div class="form-group">
           <label>password</label>
           <input type="password" class="form-control" nam="pass" autocomplete="off" required>
        </div>
        <div class="small">Forgot password <a href="forgot_pass.php">clic here</a></div><br>
        <div class="form-group">
           <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign-in">sign in</button>
        </div>
      <?php include("signin_user.php");?>
    </form>
      <div class="text-center small" style="color:#674288;">Dont have account? <a href="signup.php">create one</a></div>
</div> 
</body>
</html>