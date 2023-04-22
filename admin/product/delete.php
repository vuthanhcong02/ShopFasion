<?php
$id=$_GET['id'];
require_once '../../connectDB.php';


$sql="DELETE FROM products WHERE id=$id";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: productMa.php");
}
mysqli_close($conn);
?> 