<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confPassword = $_POST["conf-password"];

    if(empty($username) || empty($password) || empty($confPassword)) {
        header("Location: ../front_end/markup/register.php?error=emptyfields");
        die();
    }
    if($password != $confPassword){
        header("Location: ../front_end/markup/register.php?error=passwordsmatch");
        die();
    }
    try {
        require_once "database-handler.inc.php";

        $sqlSelect = "SELECT * FROM users WHERE user_name = :username;";

        $stmt = $pdo->prepare($sqlSelect);

        $stmt->bindParam(":username", $username, PDO::PARAM_STR);

        $stmt->execute();

        if($stmt->rowCount() == 0) {
            $sqlInsert = "INSERT INTO users (user_name, user_password) 
                          VALUES(:username, :password);";

            $stmt2 = $pdo->prepare($sqlInsert);
            
            $stmt2->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt2->bindParam(":password", $password, PDO::PARAM_STR);

            $stmt2->execute();
            header("Location: ../front_end/markup/login.php?info=createdaccount");
            die();
        }
        else{
            header("Location: ../front_end/markup/register.php?error=userexists");
            die();
        }
    }
    catch(PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }

}
else{
    header("Location: ../front_end/markup/register.php");
}