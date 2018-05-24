<?php

require_once 'session_start.php';
require_once 'database.php';

$statement = $pdo->prepare(
    "SELECT * FROM entries
    WHERE userID =:userID"
);

$statement->execute([
    ":userID" => $_SESSION["userID"]
  ]);
  $entries = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach ($entries as $entry):
  ?>
  <div class="container">
      <div class="panel panel-default">
        <div class="info-wrapper">

          <div class="col-xs-4">
              <h3>Title</h3>
              <h4 class="title"><?= $entry["title"] ?></h4>
            </div>
            <div class="col-xs-4">
              <h3>Content</h3>
              <h4 class="content"><?= $entry["content"] ?></h4>
            </div>
            <div class="col-xs-4">
              <h3>Date</h3>
              <h4 class="date"><?= $entry["createdAt"] ?></h4>
            </div>
          </div>
      
        <div class="col-lg-6">
        <form action="partials/formUpdate.php" method="post">
          <input type="hidden" name="entryID" value="<?= $entry["entryID"]?>">
          <button class="btn-primary update-knapp" type="submit">Update</button>
        </form>

        <form action="partials/deleteEntry.php" method="post">
          <input type="hidden" name="entryID" value="<?= $entry["entryID"]?>">
          <button class="btn-danger del-knapp" type="submit">Delete</button>
        </form>
      </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  