<?php
include 'dbBroker.php';
if(isset($_POST['poslatiPodaci'])){
    $table='<table class="table table-dark">
    <thead>
    <tr class="table-active">
    <th scope="col"> ID</th>
    <th scope="col"> Naziv</th>
    <th scope="col"> Dimenzija</th>
    <th scope="col"> Količina</th>
    <th scope="col"> Vrsta</th>
    <th scope="col"> Cijena</th>
  </tr>
    </thead>';
  $sql="Select * from `gume`"; //query
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $naziv=$row['naziv'];
    $dimenzija=$row['dimenzija'];
    $kolicina=$row['kolicina'];
    $vrsta=$row['vrsta'];
    $cijena=$row['cijena'];
    $table.='<tr>
    <td scope="row">'.$id.'</td>
    <td>'.$naziv.'</td>
    <td>'.$dimenzija.'</td>
    <td>'.$kolicina.'</td>
    <td>'.$vrsta.'</td>
    <td>'.$cijena.'</td>

  </tr>';

  }
  $table.='</table>'; //zatvaranje tabele
  echo $table;

}

?>