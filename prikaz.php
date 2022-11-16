<?php
include 'dbBroker.php';
if(isset($_POST['poslatiPodaci'])){
    $table='<table id=tabela class="table table-dark">
    <thead>
    <tr class="table-active">
    <th scope="col"> ID</th>
    <th scope="col"> Naziv</th>
    <th scope="col"> Dimenzija</th>
    <th scope="col"> Količina</th>
    <th scope="col"> Vrsta</th>
    <th scope="col"> Cijena</th>
    <th scope="col"> Operacije</th>
  </tr>
    </thead>';
  $sql="Select * from `gume`"; //query
  $result=mysqli_query($conn,$sql);
  $num=1;
  while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $naziv=$row['naziv'];
    $dimenzija=$row['dimenzija'];
    $kolicina=$row['kolicina'];
    $vrsta=$row['vrsta'];
    $cijena=$row['cijena'];
    $table.='<tr>
    <td scope="row">'.$num.'</td>
    <td>'.$naziv.'</td>
    <td>'.$dimenzija.'</td>
    <td>'.$kolicina.'</td>
    <td>'.$vrsta.'</td>
    <td>'.$cijena.'</td>
    <td>
   <button class="button" onclick="otvoriAzuriraj('.$id.')">Izmijeni</button>
   <button class="btn" onclick="izbrisiProizvod('.$id.')">Izbriši</button>
  </td>

  </tr>';
  $num++;
  }
  $table.='</table>'; //zatvaranje tabele
  echo $table;

}

?>
<script> 
th = document.getElementsByTagName('th');

for(let c=0; c < th.length; c++){

    th[c].addEventListener('click',item(c))
}


function item(c){

    return function(){
      console.log(c)
      sortTable(c)
    }
}


function sortTable(c) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tabela");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[c];
      y = rows[i + 1].getElementsByTagName("TD")[c];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

</script>