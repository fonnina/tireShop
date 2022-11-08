<?php
include 'dbBroker.php';


extract($_POST);
 //za pristup podacima
if(isset($_POST['poslatNaziv']) && 
isset($_POST['poslataDimenzija']) && 
 isset($_POST['poslataKolicina']) && 
  isset($_POST['poslataVrsta']) && 
  isset($_POST['poslataCijena'])){
  $sql="insert into `gume`
  (naziv,dimenzija,kolicina,vrsta,cijena)
  values('$poslatNaziv',
  '$poslataDimenzija','$poslataKolicina','$poslataVrsta','$poslataCijena')";
 $result=mysqli_query($conn,$sql);
}
?>