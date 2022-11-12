<?php

include('dbBroker.php');


if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * from `gume` where naziv LIKE '{$input}%' OR dimenzija LIKE '{$input}%' ";
$result = mysqli_query($conn,$query);
$num=1;
if(mysqli_num_rows($result)>0){ ?>
<table class="table table-bordered">
    <thead>
        <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Dimenzija</th>
        <th>Količina</th>
        <th>Vrsta</th>
        <th>Cijena</th>
    </tr>
</thead>

<tbody>
    <?php
    while($row=mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $naziv = $row['naziv'];
        $dimenzija = $row['dimenzija'];
        $kolicina = $row['kolicina'];
        $vrsta = $row['vrsta'];
        $cijena = $row['cijena'];
    ?>
    <tr>
        <td> <?php echo $num;?></td>
        <td> <?php echo $naziv;?></td>
        <td> <?php echo $dimenzija;?></td>
        <td> <?php echo $kolicina;?></td>
        <td> <?php echo $vrsta;?></td>
        <td> <?php echo $cijena;?></td>
    </tr>
    <?php
    $num++;
    }
    ?>
</tbody>
</table>
<?php
}else{
  echo "<h6 class='text-danger'> Nisu pronađeni podaci</h6>";
} 
}
?>