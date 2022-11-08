<?php

$conn=new mysqli('localhost','root','','andrijasevic');
if(!$conn){
    die(mysqli_error($conn));
}
?>