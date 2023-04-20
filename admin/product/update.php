<?php
require_once '../../connectDB.php';
$title = $_POST['title'];
$thumbnail = $_POST['thumbnail'];
$price = $_POST['price'];
$id_category = $_POST['id_category'];
$id = $_GET['id'];
$decription = $_POST['decription'];
$updated_at = $_POST['updated_at'];
$sql = "UPDATE products SET title='$title',thumbnail='$thumbnail',price=$price,decription='$decription',updated_at='$updated_at',id_category='$id_category' WHERE products.id=$id";
$result = mysqli_query($conn,$sql);
echo var_dump($result);
if($result){
    header("Location: productMa.php");
}


?>