<?php


session_start();
class Registrovanje{
  public function registracija($ime, $username, $email, $lozinka, $potvrdnalozinka){
    include 'dbBroker.php';
    $duplicate = mysqli_query($conn, "SELECT * FROM `korisnik` WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username ili email su vec zauzeti
    }
    else{
      if($lozinka == $potvrdnalozinka){
        $query = "INSERT INTO `korisnik` VALUES('', '$ime', '$username', '$email', '$lozinka')";
        mysqli_query($conn, $query);
        return 1;
        // Registracija uspjesna
      }
      else{
        return 100;
        // Lozinke se ne podudaraju
      }
    }
  }
}

class Prijavljivanje{
  public $id;
  public function login($usernameemail, $lozinka){
    include 'dbBroker.php';
    $result = mysqli_query($conn, "SELECT * FROM korisnik WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($lozinka == $row["lozinka"]){
        $this->id = $row["id"];
        setcookie("KorisnikCookie",$usernameemail,time() + 3600);

        return 1;
        // Prijava uspjesna
      }
      else{
        return 10;
        // Pogresna lozinka
      }
    }
    else{
      return 100;
      // Korisnik nije registrovan
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select{
  public function selectUserById($id){
    include 'dbBroker.php';
    $result = mysqli_query($conn, "SELECT * FROM korisnik WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}