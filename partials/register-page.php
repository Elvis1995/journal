<?php require_once 'header.php'; ?>

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
<h1 class="text-center">Register</h1>
<?php
if(isset($_GET["message"])){
  echo $_GET["message"];
}

if (!isset($_SESSION["loggedIn"])): ?>
<form action="register.php" method="POST" class="text-center">
  <input type="text" name="username" placeholder= "Username">
  <input type="password" name="password" placeholder= "Password">
  <input type="submit" value="Register">
</form>
<?php endif; ?>

<?php require_once 'footer.php'; ?>


</body>
</html>