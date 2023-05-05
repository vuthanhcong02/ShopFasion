<?php
include 'header.php';
?>


<?php
require_once '../connectDB.php';
$sql = "SELECT order_details.id,order_details.size,order_details.quantity,products.* FROM order_details JOIN products ON order_details.product_id = products.id ";
$result = mysqli_query($conn,$sql);
$number_cart = mysqli_num_rows($result);
$sql_total = "SELECT SUM(total_money) as total FROM order_details";
$result_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($result_total);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Checkout</title>
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
    .formcheckout{
        background: #E8F0F9;
    }
</style>

<body>
    <div class="container col-10 my-5 br-2 rounded formcheckout">
        <div class="row g-3">
            <div class="col-5 order-md-last mt-3">
                <h4 class="d-flex justify-content-between align-item-center">
                    <span class="text-muted">Your Cart</span>
                    <span class="badge bg-secondary rounded-pill"><?php echo "$number_cart";?></span>
                </h4>
                <ul class="list-group">
                <?php while ($row = mysqli_fetch_assoc($result)) :
                ?>  
                    <li class="list-group-item d-flex justify-content-around">
                        <img class=" mt-2" src="../admin/img/<?php echo $row['thumbnail']?>" width="100"/>
                        <div class="mt-2">
                            <h6><?php echo $row['title']?></h6>
                            <span class="text-muted">Size: <?php echo $row['size']?></span><br>
                        </div>
                        <span class="text-muted mt-2">Đơn giá: <?php echo number_format($row['price'], 0, ",", ".") . " VND" ?></span>
                        <span class="text-muted mt-2">x <?php echo $row['quantity']?></span>
                    </li>
                    <?php
                endwhile; ?>    
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 class="mt-2">Total (Rs)</h6>
                        </div>
                        <span class="text-muted p-2"><?php echo number_format($row_total['total'], 0, ",", ".") . " VND" ?></span>
                    </li>
                </ul>

            </div>
            <div class="col-7">
                <h4>Billing Address</h4>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="firstname">Full Name</label>
                            <input type="text" id="firstname" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="lastname">Phone</label>
                            <input type="text" id="lastname" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Email
                                <span class="text-muted"> (Optional)</span>
                            </label>
                            <input type="text" id="email" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="address">Address </label>
                            <input type="text" id="address" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Shipping address is the same as my billing address</label>
                    </div>
                    <hr>
                    <h4>Payment</h4>
                    <div class="form-check">
                        <input type="radio" class="form-check-input">
                        <label class="form-check-label">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input">
                        <label class="form-check-label">Debit Card</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="cardname">Name on Card </label>
                            <input type="text" id="cardname" class="form-control">
                            <small class="text-muted">Full name as displayed on card</small>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="creditcard">Credit Card Number </label>
                            <input type="text" id="creditcard" class="form-control">
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="expiration">Expiration </label>
                            <input type="text" id="expiration" class="form-control">
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="cvv">CVV </label>
                            <input type="text" id="cvv" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Continue To Checkout</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

<script>
</script>

</html>
<?php
include 'footer.php';
?>