<?php
$con = new mysqli("localhost", "root", "", "computer");

if(isset($_POST['addtocart'])){
    extract($_POST);
$NAME= $_POST['namemb'];
$PRICE =$_POST['pricemb'];

$insert="INSERT INTO cart (namecart,pricecart) VALUE ('$NAME','$PRICE');";
mysqli_query($con,$insert);
header('location:viewscart.php');

}

?>