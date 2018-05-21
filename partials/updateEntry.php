<?php

require_once 'session_start.php';
require_once 'database.php';

date_default_timezone_set("Europe/Stockholm");
$date = date("Y/m/d h:i:");

$statement = $pdo->prepare(
  "UPDATE entries
  SET title = :title, content = :content, createdAt = :createdAt
  WHERE entryID = :entryID"
);

$statement->execute([
  ":title" => $_POST["title"],
  ":content" => $_POST["content"],
  ":createdAt" => $date,
  ":entryID" => $_POST["entryID"]
]);

header("Location: ../index.php");
 ?>