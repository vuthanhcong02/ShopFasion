<?php
$name=$_POST['name'];
$created_at=$_POST['created_at'];
$updated_at=$_POST['updated_at'];

require_once '../connectDB.php';

$sql = "INSERT INTO category(name,created_at,updated_at) VALUES('$name','$created_at','$updated_at')";
$result = mysqli_query($conn,$sql);
if($result){
    
    header("Location: categories.php");
}

?>
