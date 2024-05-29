<?php

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username) || empty($password)){
        header("Location: ../front_end/markup/index.php?error=emptyfields");
        echo "Invalid username or password.";
        die();

    }
    
    try{
        require_once "database-handler.inc.php";

        $sqlSelect = "SELECT * FROM Users WHERE user_name = :username;";

        $stmt = $pdo->prepare($sqlSelect);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($password == $user['user_password']){
                $_SESSION['username'] = $user['user_name'];
                header("Location: ../front_end/markup/welcome.php");
                die();
            }
            else{
                header("Location: ../front_end/markup/index.php?error=invalidlogin");
                die();
            }
        }
        else{
            header("Location: ../front_end/markup/index.php?error=invalidlogin");
            die();
        }

    }
    catch (PDOException $e){
        die("Query failed:" . $e->getMessage());
    }

    header("Location: ../front_end/markup/index.php");
}
else{
    header("Location: ../front_end/markup/index.php");
}