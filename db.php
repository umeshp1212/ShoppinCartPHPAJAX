<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "ShoppingCart";

$con = mysqli_connect($servername, $username, $password, $db);

if(!$con){
    die("Connection failed:" . mysql_connect_error());
}
?>