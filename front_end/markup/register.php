<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo '<p style="color: red;">Please fill in all fields!</p>';
        }
        elseif($_GET['error'] == 'passwordsmatch'){
            echo '<p style="color: red;">The passwords dont match!</p>';
        }
        elseif($_GET['error'] == 'userexists'){
            echo '<p style="color: red;">The username is already taken!</p>';
        }
    }
    ?>

    <form id="login-form" method="post" action="../../back_end/register-form-handler.inc.php">

        <label for="username">Username</label><br>
        <input type="text" name="username"><br>

        <label for="password">Password</label><br>
        <input type="text" name="password"><br>

        <label for="conf-password">Confirm Password</label><br>
        <input type="text" name="conf-password"><br>

        <input type="submit" value="Register">

    </form>
    
    <p>Already have an account? Go to <a href="login.php">login</a></p>

</body>

</html>