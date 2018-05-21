<?php
require_once 'session_start.php';
require_once 'database.php';
require_once 'header.php';


$statement = $pdo->prepare(
  "SELECT * FROM entries
  WHERE entryID = :entryID"
);

$statement->execute([
  ":entryID" => $_POST["entryID"]
]);


$entry = $statement->fetch(PDO::FETCH_ASSOC);
?>

<?php
require_once 'session_start.php';

if (isset($_SESSION["loggedIn"])): ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="/myAdmin">Journal</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>

<div class="container">
  <h1 class="text-center">Update Entry</h1>
  <form class="form-horizontal" action="updateEntry.php" method="POST">
  <div class="form-group">
      <label for="Title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
    <label for="content">Content:</label>
    <textarea class="form-control" rows="3" id="comment" placeholder="enter content" name="content"></textarea>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <input type="hidden" name="entryID" value="<?= $entry["entryID"]?>">
        <button type="submit" class="center-block btn btn-success">Update Entry</button>
      </div>
    </div>
  </form>
</div>

<?php require_once 'footer.php';?>