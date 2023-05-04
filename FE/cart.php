<?php
include '../FE/header.php';
?>
<?php
require_once '../connectDB.php';
if (isset($_POST['add_to_cart']) && isset($_POST['size']) && isset($_POST['quantity']) && isset($_POST['product_id']) && isset($_POST['price'])) {
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $price * $quantity;
    $sql_productID = "SELECT *FROM order_details WHERE product_id = $product_id AND size=$size";
    $result = mysqli_query($conn,$sql_productID);
    $row_productID = mysqli_num_rows($result);
    if($row_productID>0){
        $row = mysqli_fetch_assoc($result);
        $new_quantity = $row['quantity'] + $quantity;
        $new_total = $price*$new_quantity;
        $sql_addCart ="UPDATE order_details SET quantity = $new_quantity ,total_money=$new_total WHERE product_id= $product_id AND size=$size";
        mysqli_query($conn, $sql_addCart);

    }
    else{
        $sql_addCart = "INSERT INTO order_details(product_id,price,size,quantity,total_money) VALUES ($product_id,$price,$size,$quantity,$total)";  
        mysqli_query($conn, $sql_addCart);

    }
}
else{
    // header("Location: product_Infor.php");
}
$sql_product_order = "SELECT * FROM order_details JOIN products ON order_details.product_id = products.id";
$result_order = mysqli_query($conn, $sql_product_order);
$sql_total = "SELECT SUM(total_money) as total FROM order_details";
$result_total = mysqli_query($conn,$sql_total);
$row_total = mysqli_fetch_assoc($result_total);
?>
<!-- Xây dựng chức năng refresh khi cập nhật số lượng ở phần giỏ hàng -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<style>
    .btn-shop {
        border: 1px solid black;
        padding: 10px 30px;
        background-color: black;
        font-weight: 600;
        color: white;
        text-decoration: none;
        margin-left: 10px;
    }

    .btn-shop:hover {
        background-color: white;
        color: black;
        font-weight: 600;
    }

    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        vertical-align: middle;
    }

    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control {
            width: 20%;
            display: inline !important;
        }

        .actions .btn {
            width: 36%;
            margin: 1.5em 0;
        }

        .actions .btn-info {
            float: left;
        }

        .actions .btn-danger {
            float: right;
        }

        table#cart thead {
            display: none;
        }

        table#cart tbody td {
            display: block;
            padding: .6rem;
            min-width: 320px;
        }

        table#cart tbody tr td:first-child {
            background: #333;
            color: #fff;
        }

        table#cart tbody td:before {
            content: attr(data-th);
            font-weight: bold;
            display: inline-block;
            width: 8rem;
        }



        table#cart tfoot td {
            display: block;
        }

        table#cart tfoot td .btn {
            display: block;
        }
    }
</style>

<body>

    <div class="container mt-5">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:42%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Size</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row_order = mysqli_fetch_assoc($result_order)) :
        ?>
                <tr>
              
                   <form action="updateQuantity_Product.php" method="post">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="../admin/img/<?php echo $row_order['thumbnail'] ?>" alt="..." class="img-responsive" width="100px" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin"><?php echo $row_order['title'] ?></h4>
                                    <p><?php echo $row_order['decription'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price"><?php echo number_format($row_order['price'], 0, ",", ".") . " VND" ?></td>
                        <td><?php echo $row_order['size']?></td>
                        <td data-th="Quantity">
                            <input min="1" type="number" class="form-control text-center" value="<?php echo $row_order['quantity']?>" name="quantity">
                        </td>
                        <td data-th="Subtotal" class="text-center"><?php echo number_format($row_order['total_money'], 0, ",", ".") . " VND" ?></td>
                        <td class="actions" data-th="">
                           <a href=""> <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button></a>
                           <a href=""> <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                        </td>
                        <input type="hidden" name="id" value="<?php echo $row_order['id']?>">
                        <input type="hidden" name="price" value="<?php echo $row_order['price']?>">
                        <input type="hidden" name="size" value="<?php echo $row_order['size']?>">
                        <input type="hidden" name="product_id" value="<?php echo $row_order['product_id']?>">
                   </form>
         
                </tr>
                <?php
          endwhile;?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="../FE/product.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="3" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong><?php echo number_format($row_total['total'], 0, ",", ".") . " VND" ?></strong></td>
                    <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        
            <!-- <tbody>
                <h4>Giỏ hàng rỗng</h4>                    
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="../FE/product.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="4" class="hidden-xs"></td>
                </tr>
            </tfoot> -->
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
    <?php
    include '../FE/footer.php';
    ?>
</body>

</html>