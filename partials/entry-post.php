<?php

require_once 'session_start.php';
require_once 'database.php';
var_dump($_SESSION['userID']);

date_default_timezone_set("Europe/Stockholm");
$date = date("Y/m/d h:i:");


$statement = $pdo->prepare(
  "INSERT INTO entries
  (title, content, createdAt, userID)
  VALUES (:title, :content, :createdAt, :userID)"
);

$statement->execute([
  ":title" => $_POST["title"],
  ":content" => $_POST["content"],
  ":createdAt" => $date,
  ":userID" => $_SESSION["userID"]
]);


header('Location: ../index.php');