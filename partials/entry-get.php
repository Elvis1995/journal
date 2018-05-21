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
        <div class="row text-center">
            <div class="col-xs-4">
              <h3>TITLE</h3>
            </div>
            <div class="col-xs-4">
              <h3>CONTENT</h3>
            </div>
            <div class="col-xs-4">
              <h3>DATE</h3>
            </div>
        <h4 class="col-xs-4 panel-body"><?= $entry["title"] ?></h4>
        <h4 class="col-xs-4 panel-body"><?= $entry["content"] ?></h4>
        <h4 class="col-xs-4 panel-body"><?= $entry["createdAt"] ?></h4>
        <div class="col-xs-6 text-left">
        <form action="partials/formUpdate.php" method="post">
          <input type="hidden" name="entryID" value="<?= $entry["entryID"]?>">
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
        <div class="col-xs-6 text-right">
        <form action="partials/deleteEntry.php" method="post">
          <input type="hidden" name="entryID" value="<?= $entry["entryID"]?>">
          <button class="btn btn-danger text-right" type="submit">Delete</button>
        </form>
      </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  