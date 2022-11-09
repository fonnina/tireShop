<?php
include 'dbBroker.php';

if(isset($_POST['brisanjeposalji'])){
    $jedinstvenId = $_POST['brisanjeposalji'];

    $sql="delete from `gume` where id=$jedinstvenId";
    $result=mysqli_query($conn,$sql);

}

?>