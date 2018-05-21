<?php require_once 'partials/header.php'; ?>

<?php if (!isset($_SESSION["loggedIn"])): ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/myAdmin">Journal</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="partials/register-page.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>

<?php if (isset($_SESSION["loggedIn"])): ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/myAdmin">Journal</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="partials/logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>


<?php

if (!isset($_SESSION["loggedIn"])): ?>
<h1>Login</h1>
<form action="partials/signin.php" method="POST" id="login-form">
  <input type="text" name="username" placeholder= "Username">
  <input type="password" name="password" placeholder= "Password">
  <input type="submit" value="Login">
</form>

<?php if(isset($_GET["message"])){
  echo $_GET["message"];
} ?>
<?php endif; ?>

<?php if (isset($_SESSION["loggedIn"])): ?>

<div class="container">
  <form action="partials/entry-post.php" method="POST">
    <div class="form-group">
      <label for="Title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
    <label for="content">Content:</label>
    <textarea class="form-control" rows="3" id="comment" placeholder="enter content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
 </div>  

 <div>
  <?php require_once 'partials/entry-get.php' ?>
 </div>
<?php endif; ?>


<?php require_once 'partials/footer.php'; ?>