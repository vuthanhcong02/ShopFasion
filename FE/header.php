<?php
session_start();
require_once '../connectDB.php';
global $conn;
$sql_dropdown = "SELECT * FROM category";
$result_dropdown = mysqli_query($conn, $sql_dropdown);

//count_bag
if(isset($_SESSION['order_id'])){
    $id_order=$_SESSION['order_id'];
    $sql_count = "SELECT * FROM order_details WHERE order_id=$id_order";
    $result_count = mysqli_query($conn, $sql_count);
    $number_cart = mysqli_num_rows($result_count);
}

//active page
$current_page = $_SERVER['REQUEST_URI'];
$home_page = "/ShopFasion/ShopFasion/FE/index.php";
$category_page = "/ShopFasion/ShopFasion/FE/product.php";
$product_page = "/ShopFasion/ShopFasion/FE/product.php";
$contact_page = "/ShopFasion/ShopFasion/FE/contact.php";
// hiển thị theo danh mục;
if (isset($_GET['category'])) {
    $idCategoryActive = $_GET['category'];
}
// $sql_productByCategory = "SELECT * FROM products WHERE products.id_category = $idCategory";
// $result_productByCategory = mysqli_query($conn,$sql_productByCategory);
// if($_POST){
// if(isset($_POST['email'])){
//     $email = $_POST['email'];   
// }
// else{
//     $email="";
// }
// if(isset($_POST['password'])){
//     $password = $_POST['password'];
// }
// else{
//     $password="";
// }
// $sqlAcc = "SELECT* FROM accounts WHERE email='$email' AND password ='$password'";
// $resultAcc = mysqli_query($conn,$sqlAcc);
// $rowAcc = mysqli_fetch_assoc($resultAcc);
// header("Location: header.php");
// }
// include '../FE/index.php'

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        font-size: 18px;
        margin-right: 50px;
    }

    button.fs-6.cart-text.btn-shop {
        color: white;
        background-color: black;
    text-decoration: none;
    font-weight: 600;
    padding: 10px 30px;
    border: 1px solid black;

    }

    button.fs-6.cart-text.btn-shop:hover {
        background-color: white;
        color: black;
    font-weight: 600;

    }

    .position {
        position: sticky;
        top: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        background-color: white;
    }

    .active_page {
        color: red !important;
    }

    .user {
        text-decoration: none;
        padding: 10px 10px;
        margin-left: 5px;
        color: black;
    }

    .user svg {
        background-color: black;
        color: white;
        border-radius: 50%;
    }

    ul.dropdown-menu.account-menu.show {
        margin-left: 16px;
        margin-top: 29px;
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
                            if ($current_page == $home_page) {
                                echo '<a class="nav-link active_page" aria-current="home" href="index.php">Home</a>';
                            } else {
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
                                    <li><a class="dropdown-item" href="product.php?idCategory=<?php echo $row_dropdown['id']; ?>"><?php echo $row_dropdown['name']; ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <?php
                            if ($current_page == $product_page) {
                                echo '<a class="nav-link active_page" aria-current="product" href="product.php">Product</a>';
                            } else {
                                echo '<a class="nav-link" aria-current="product" href="product.php">Product</a>';
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if ($current_page == $contact_page) {
                                echo '<a class="nav-link active_page" aria-current="contact" href="contact.php">Contact</a>';
                            } else {
                                echo '<a class="nav-link" aria-current="contact" href="contact.php">Contact</a>';
                            }
                            ?>
                        </li>
                    </ul>
                    <form class="d-flex" method="post">
                        <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn-shop" type="submit" name="search">Search</button>
                    </form>
                    <div class="d-flex justify-content-center align-content-center">
                       <a class="p-3" href="cart.php" style="text-decoration: none;">
                           <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                           </span>
                            <span style="color:black;">(<?php if(isset($number_cart)){
                                                                echo $number_cart;}
                                                                else{
                                                                echo "0";
                                                                }
                                                            ?>)</span>
                       </a>
                       
                    </div>
                    <div class="dropdown">
                        <?php
                        if (isset($_SESSION['fullname']) && !empty($_SESSION['fullname'])) {
                            // Khai báo biến chứa họ tên
                            $name = $_SESSION['fullname'];
                            // Sử dụng phương thức explode() để tách chuỗi thành mảng các từ
                            $nameArray = explode(" ", $name);
                            // Lấy tên cuối cùng trong mảng
                            $lastName = end($nameArray);
                            echo '<a class="dropdown-toggle user" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hi, '.$lastName. '
                                </a>';
                            echo '<ul class="dropdown-menu account-menu" aria-labelledby="dropdownMenuLink">';
                            echo '<li><a class="dropdown-item" href="">Thông tin tài khoản</a></li>';
                            echo '<li><a class="dropdown-item" href="">Cài đặt</a></li>';
                            echo '<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>';
                        } else {
                        ?>

                            <a class="dropdown-toggle user" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                              
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="register.php">Đăng kí</a></li>
                                <li><a class="dropdown-item" href="">Quên mật khẩu</a></li>
                            <?php } ?>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $('.search').keyup(function(){
            var txt_search = $('.search').val();
            $.post('content.php',{data: txt_search},function(data){
                $('.search-results').html(data);
            });
        })
    </script>
    
</body>

</html>