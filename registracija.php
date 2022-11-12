<?php
 include 'funkcija.php';

// if(isset($_POST["submit"])){
//   $ime =$_POST["ime"];
//   $username =$_POST["username"];
//   $email =$_POST["email"];
//   $lozinka =$_POST["lozinka"];
//   $potvrdnalozinka =$_POST["potvrdnalozinka"];
//   $duplikat= mysqli_num_rows($conn, "select * from korisnik where username='$username' OR email='$email'");

//   if(mysqli_num_rows($duplikat)>0){
//     echo "<script> alert('Username ili Email su zauzeti'); </script>";
//   }
//   else{
//     if($lozinka == $potvrdnalozinka){
//       $query="INSERT INTO korisnik values('','$ime','$username','$email','$lozinka')";
//       mysqli_query($conn,$query);
//       echo
//     "<script> alert('Registracija uspjesna!'); </script>";
//     }
//     else{
//       "<script> alert('Lozinke se ne podudaraju'); </script>";

//     }
//   }
// }

$register = new Registrovanje();

if(isset($_POST["submit"])){
  $result = $register->registracija($_POST["ime"], $_POST["username"], $_POST["email"], $_POST["lozinka"], $_POST["potvrdnalozinka"]);

  if($result == 1){
    header("Location: prijavljivanje.php");
    echo
    "<script> alert('Registracija uspjesna!'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Username ili Email su zauzeti'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Lozinke se ne podudaraju'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registracija</title>
    <link rel='stylesheet' type='text/css' href='css/style.php' />
  </head>
  <body>
    <h2>Registracija</h2>
    <div class="container">
    <form class="" action="" method="post" autocomplete="off">
    <div class="row">
    <div class="col-25">  
    <label for="">Ime : </label>
    </div>
    <div class="col-75">
      <input type="text" name="ime" required value=""> <br>
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="">Username : </label>
      </div>
    <div class="col-75">
      <input type="text" name="username" required value=""> <br>
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="">Email : </label>
      </div>
    <div class="col-75">
      <input type="email" name="email" required value=""> <br>
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="">Lozinka : </label>
      </div>
    <div class="col-75">
      <input type="password" name="lozinka" required value=""> <br>
      </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="">Ponovljena lozinka : </label>
      </div>
    <div class="col-75">
      <input type="password" name="potvrdnalozinka" required value="">
      </div>
  </div>
  <br>
  <div class="row">
      <button class="button button-primary" type="submit" name="submit">Registruj se</button>
      </div>
    </form>
</div>
    <br> <br>
    <div class="row"><label>Imaš nalog?</label></div>
    <br>
    <a href="prijavljivanje.php" class="button button-primary" tabindex="-1" role="button">Prijavi se</a>
  </body>
</html>