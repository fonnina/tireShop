<?php
include 'dbBroker.php';

$sqll = "SELECT * FROM `sezona`";
$sve_sezone = mysqli_query($conn,$sqll);
extract($_POST);



 //za pristup podacima
if(isset($_POST['poslatNaziv']) && 
isset($_POST['poslataDimenzija']) && 
 isset($_POST['poslataKolicina']) && 
  isset($_POST['poslataVrsta']) && 
  isset($_POST['poslataCijena'])){

    $idKat = mysqli_real_escape_string($conn,$_POST['poslataVrsta']);
  $sql="insert into `gume`
  (naziv,dimenzija,kolicina, vrsta,cijena)
  values('$poslatNaziv',
  '$poslataDimenzija','$poslataKolicina','$idKat','$poslataCijena')";
 $result=mysqli_query($conn,$sql);
}
?>