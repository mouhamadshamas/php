<?php
$con = new mysqli("localhost", "root", "", "computer");

if(isset($_POST['addtocart'])){
    extract($_POST);
$NAME= $_POST['nameacc'];
$PRICE =$_POST['priceacc'];

$insert="INSERT INTO cart (namecart,pricecart) VALUE ('$NAME','$PRICE');";
mysqli_query($con,$insert);
header('location:viewscart.php');

}

?>