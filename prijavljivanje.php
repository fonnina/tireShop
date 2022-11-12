<?php
require 'funkcija.php';

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$login = new Prijavljivanje();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernameemail"], $_POST["lozinka"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: home.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Pogresna lozinka'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Korisnik nije registrovan'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prijavljivanje</title>
    <link rel='stylesheet' type='text/css' href='css/style.php' />

  </head>
  <body>
    <h2>Prijavljivanje</h2>
    <div class="container">
    <form class="" action="" method="post" autocomplete="off">
    <div class="row">
    <div class="col-25">    
    <label for="">Username ili email : </label>
    </div>
    <div class="col-75">
      <input type="text" name="usernameemail" required value="">
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="">Lozinka</label>
      </div>
    <div class="col-75">
      <input type="password" name="lozinka" required value="">
     </div>
  </div>
  <br>
  <div class="row">
      <button type="submit" name="submit">Prijavi se</button>
</div>
    </form>
</div>
    <br> <br> 
    <div class="row"><label>Nemaš nalog?</label></div>
    <br>
    <a href="registracija.php" class="button button-primary" tabindex="-1" role="button">Registruj se</a>
  </body>
</html>