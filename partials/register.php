<?php

//Sparar all data och sedan går den tillbaka till första sidan
header('Location: /myAdmin');

require_once "database.php";


//Gör så att passworden blir ändrar på phpmyadmin
$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $pdo->prepare(
    "INSERT INTO users
    (username, password)
    VALUES (:username, :password)"
);

$statement->execute([
    ":username" => $_POST["username"],
    ":password" => $hashed
]);


header('location: ../index.php');