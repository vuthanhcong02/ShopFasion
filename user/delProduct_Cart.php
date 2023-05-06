<?php
require_once '../connectDB.php';
if(isset($_GET['id_order'])){
    $id = $_GET['id_order'];
    $sql_del = "DELETE FROM order_details WHERE order_details.id = $id";
    $result = mysqli_query($conn,$sql_del);
    if($result){
        header("Location: cart.php");
    }
}

?>