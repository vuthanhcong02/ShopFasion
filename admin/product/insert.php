<?php
require_once '../../connectDB.php';
$title=$_POST['title'];
$thumbnail=$_POST['thumbnail'];
$price=$_POST['price'];
$category=$_POST['id_category'];
$decription=$_POST['decription'];
$updated_at=$_POST['updated_at'];
$sql="INSERT INTO products (thumbnail, title, price, decription, updated_at,id_category) VALUES ('$thumbnail', '$title',$price, '$decription','$updated_at','$category')";
$result= mysqli_query($conn,$sql);
if($result){
    header("Location: productMa.php");
}


?>