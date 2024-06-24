  <?php
    function displayMessage(){
      if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo '<p style="color: red;" class="message">Please fill in all fields.</p>';
        }
        elseif($_GET['error'] == 'invalidlogin'){
            echo '<p style="color: red;" class="message">Invalid username or password.</p>';
        }
    }
    if(isset($_GET['info'])){
        if($_GET['info'] == 'createdaccount'){
            echo '<p style="color: green;" class="message">Successfully created an account!</p>';
        }
    }  
    } 
    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="../style/style.css">

  </head>

  <body>


      <form method="post" action="../../back_end/login-form-handler.inc.php">

          <?php displayMessage() ?>

          <label for="username">Username</label><br>
          <input type="text" name="username"><br>

          <label for="password">Password</label><br>
          <input type="text" name="password"><br>

          <input type="submit" value="Login">

      </form>

  </body>

  </html>