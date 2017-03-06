<?php
session_start();
if (isset($_SESSION['user'])){
?>
<script>document.location.href="../"</script>
<?php
}else{
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href='css/css.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="form">   
          <h1>Welcome Back Admin!</h1>
          
          <form action="login.php" method="post">
          
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input style="background-color:#FFF" name="username" type="text"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input style="background-color:#FFF" name="password" type="password"required autocomplete="off"/>
          </div>
          
          
          <input type="submit" name="login" value="login" class="button button-block"/></th>
          </form>
<h2>Copyright 2015</h2>
        </div>
      
</div> <!-- /form -->
    <script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
<?php
}
?>