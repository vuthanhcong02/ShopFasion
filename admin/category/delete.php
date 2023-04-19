
<?php
$id=$_GET['id'];
require_once '../../connectDB.php';


$sql="DELETE FROM category WHERE id=$id";
$result = mysqli_query($conn,$sql);
echo "Xoa thanh cong";
if($result){
    header("Location: categoryMa.php");
}
?> 