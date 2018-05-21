<?php

require_once 'session_start.php';
require_once 'database.php';

$statement = $pdo->prepare(
    "SELECT * FROM users
    WHERE username = :username"
 );


 $statement->execute([
     "username" => $_POST["username"]
 ]);

 //fetch och inte fetchall
 $user = $statement->fetch();
 

 //Om passet du postar är lika med passet som usern har så kommer du in
 if(password_verify($_POST["password"], $user["password"])) {
     header('Location: /myAdmin');
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $user["username"];
    $_SESSION["userID"] = $user["userID"];
 }
else{
    header('Location: /myAdmin?message=login failed');
}