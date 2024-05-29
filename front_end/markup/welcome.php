<?php
    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];      
    }
    else{
        header("Location: index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $username ?>!</h2>
    
</body>
</html>