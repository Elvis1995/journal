<?php 

require_once 'session_start.php';
require_once 'database.php';

$statement = $pdo->prepare(
    "DELETE FROM entries
    WHERE entryID = :entryID"
);

$statement->execute([
    ":entryID" => $_POST["entryID"]
]);

header("Location: ../index.php");

?>