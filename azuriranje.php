<?php
include 'dbBroker.php';
if(isset($_POST['azuriranjeid'])){
    $proizvod_id=$_POST['azuriranjeid'];

    $sql="Select * from `gume` where id=$proizvod_id";
    $result=mysqli_query($conn,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    
    echo json_encode($response);
 }else{
    $response['status']=200; //OK
    $response['message']= "Podaci nisu pronadjeni.";
}

//onclick
if(isset($_POST['hiddendata'])){
    $jedinstvenid=$_POST['hiddendata'];
    $naziv=$_POST['updateNaziv'];
    $dimenzija=$_POST['updateDimenzija'];
    $kolicina=$_POST['updateKolicina'];
    $vrsta=$_POST['updateVrsta'];
    $cijena=$_POST['updateCijena'];

    $sql="update `gume` set naziv='$naziv',dimenzija='$dimenzija', kolicina='$kolicina',
    vrsta='$vrsta',cijena='$cijena' where id=$jedinstvenid";
    $result=mysqli_query($conn,$sql);
}
?>