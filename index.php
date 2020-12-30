
<html lang = "en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="index.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
   <head>
      <title>Login</title>
<div class="container">
      <h2 class="content">Login Form</h2> 
         <?php
            $msg = '';
            if (isset($_POST['login']) 
                && !empty($_POST['username']) 
                && !empty($_POST['password'])
            ) {   
               if ($_POST['username'] == 'Aurelija' && 
                  $_POST['password'] == '1234'
                ) {
                  $_SESSION['logged_in'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'Aurelija';
                  echo 'You have entered valid use name and password';
               } else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>

 <div class="login_input">
    <?php 
      if($_SESSION['logged_in'] == true){
      print('<h1>You can only see this if you are logged in!</h1>');
      header("location: main.php");
       }
    ?>
     <form action="./index.php" method="post">
            <h4><?php echo $msg; ?></h4>
            <input type="text" name="username" placeholder="username = Aurelija" required autofocus></br>
            <input type="password" name="password" placeholder="password = 1234" required><br>
            <button class = "btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
      </form>
   </div>
 </div>
</body>
</html>