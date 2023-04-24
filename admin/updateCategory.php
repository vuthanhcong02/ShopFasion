<?php
require_once '../connectDB.php';
$name = $_POST['name'];
$id = $_GET['id'];
$created_at = $_POST['created_at'];
$updated_at = $_POST['updated_at'];
$sql = "UPDATE category SET name='$name',created_at='$created_at',updated_at='$updated_at' WHERE category.id=$id";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: categories.php");
}


?>