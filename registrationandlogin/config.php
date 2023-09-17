<?php
$servern='localhost';
$usern='root';
$password='';
$db='umurangamwizadatabase';

$conn = mysqli_connect($servern,$usern,$password,$db);
if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
}
?>