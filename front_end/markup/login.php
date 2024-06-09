<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo '<p style="color: red;">Please fill in all fields.</p>';
        }
        elseif($_GET['error'] == 'invalidlogin'){
            echo '<p style="color: red;">Invalid username or password.</p>';
        }
    }
    ?>

    <form id="login-form" method="post" action="../../back_end/login-form-handler.inc.php">

        <label for="username">Username</label><br>
        <input type="text" name="username"><br>

        <label for="password">Password</label><br>
        <input type="text" name="password"><br>

        <input type="submit" value="Login">

    </form>

</body>

</html>