<?php

$conn=new mysqli('localhost','root','','andrijasevic');

// if($conn->connect_errno){
//     exit("Konekcija neuspjesna: " . $conn->connect_errno);
// }
if(!$conn){
    die(mysqli_error($conn));
}
?>