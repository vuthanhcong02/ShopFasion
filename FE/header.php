<?php
require_once '../connectDB.php';
global $conn;
$sql_dropdown = "SELECT * FROM category";
$result_dropdown = mysqli_query($conn, $sql_dropdown);
$row_dropdown = mysqli_fetch_assoc($result_dropdown);

//active page
$current_page = $_SERVER['REQUEST_URI'];
$home_page = "/ShopFasion/ShopFasion/FE/index.php";
$category_page = "/ShopFasion/ShopFasion/FE/product.php";
$product_page = "/ShopFasion/ShopFasion/FE/product.php";
$contact_page = "/ShopFasion/ShopFasion/FE/contact.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Fashion</title>
</head>
<style>
    .container-fluid {
        padding: 10px 100px !important;
    }

    ul.navbar-nav.me-auto.mb-2.mb-lg-0 {

        margin-left: 100px;
    }

    li.nav-item {
        font-size: 20px;
        margin-right: 50px;
    }

    button.fs-6.cart-text.btn-shop {
        color: white;
        background-color: black;
    }

    button.fs-6.cart-text.btn-shop:hover {
        background-color: white;
        color: black;
    }
    .position{
        position: sticky;
        top:0;
        left: 0;
        z-index: 1;
        width: 100%;
        background-color: white;
    }
    .active_page{
        color: red!important;
    }
</style>

<body>
    <div class="position">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="https://cdn.ayroui.com/1.0/images/footer/logo.svg" alt="Logo" />
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <?php
                            if($current_page==$home_page){
                                echo '<a class="nav-link active_page" aria-current="home" href="index.php">Home</a>';
                            }
                            else{
                                echo '<a class="nav-link" aria-current="home" href="index.php">Home</a>';
                            }   
                            ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu category-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $first = true;
                                while ($row_dropdown = mysqli_fetch_assoc($result_dropdown)) :
                                    if (!$first) {
                                        echo '<li><hr class="dropdown-divider"></li>';
                                    } else {
                                        $first = false;
                                    }
                                ?>
                                    <li><a class="dropdown-item" href="product.php"><?php echo $row_dropdown['name']; ?></a></li>
                                <?php endwhile;?>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <?php
                            if($current_page==$product_page){
                                echo '<a class="nav-link active_page" aria-current="product" href="product.php">Product</a>';
                            }
                            else{
                                echo '<a class="nav-link" aria-current="product" href="product.php">Product</a>';
                            }   
                            ?>
                        </li>
                        <li class="nav-item">
                        <?php
                            if($current_page==$contact_page){
                                echo '<a class="nav-link active_page" aria-current="contact" href="contact.php">Contact</a>';
                            }
                            else{
                                echo '<a class="nav-link" aria-current="contact" href="contact.php">Contact</a>';
                            }   
                            ?>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn-shop" type="submit">Search</button>
                    </form>
                    <div class="d-flex justify-content-center align-content-center">
                        <button class="fs-6 cart-text btn-shop">Cart</button>
                    </div>
    
                </div>
            </div>
        </nav>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>