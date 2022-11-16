<?php
include 'funkcija.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: prijavljivanje.php");
}
?>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <h1>Dobrodošli! </h1>
    <a href="logout.php">Logout</a>
  </body>
</html> -->


