<?php
session_start();
require_once '../connectDB.php';
if ($_POST) {
    $error =[];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT id,email,password,fullname,role from accounts where email='$email' and password='$password'");
    $row = mysqli_fetch_assoc($result);

   
    if ($row) {
        // $_SESSION['login'] = $row['role'];
        // $_SESSION['fullname'] = $row['fullname'];
        // $_SESSION['id'] = $row['id'];
        // $_SESSION['email'] = $row['email'];

        // $id_user  = $_SESSION['id'];
        // $name_user = $_SESSION['fullname'];
        // $email_user = $_SESSION['email'];
    
      

        // if($_SESSION['user_id']==$_SESSION['id']){
        //      header("Location: ../admin/index.php");
        // }
        // else{
        //     $sql_user_order = "INSERT INTO orders(user_id,fullname,email) VALUES($id_user,'$name_user','$email_user')";
        //     mysqli_query($conn,$sql_user_order);
        // }
        
        // $sql_user_show = "SELECT id,user_id FROM orders WHERE user_id=$id_user";
        // $result_show_order = mysqli_query($conn,$sql_user_show);
        // $row_order_id = mysqli_fetch_assoc($result_show_order);
        // $_SESSION['order_id'] = $row_order_id['id'];
        // $_SESSION['user_id'] = $row_order_id['user_id'];
        $_SESSION['login'] = $row['role'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        
        $id_user  = $_SESSION['id'];
        // Kiểm tra xem đã có bản ghi cho user này trong bảng orders hay chưa
        $sql_check = "SELECT COUNT(*) AS count FROM orders WHERE user_id = $id_user";
        $result_check = mysqli_query($conn, $sql_check);
        $count = mysqli_fetch_assoc($result_check)['count'];
        
        // Nếu chưa có bản ghi thì thêm mới vào bảng orders
        if ($count == 0) {
            $name_user = $_SESSION['fullname'];
            $email_user = $_SESSION['email'];
            $sql_user_order = "INSERT INTO orders(user_id, fullname, email) VALUES($id_user, '$name_user', '$email_user')";
            mysqli_query($conn, $sql_user_order);
            header("Location: ../admin/index.php");

        }
        else{
            header("Location: ../admin/index.php");
        }
        
        // Lấy id bản ghi của người dùng từ bảng orders
        $sql_user_show = "SELECT id, user_id FROM orders WHERE user_id = $id_user";
        $result_show_order = mysqli_query($conn, $sql_user_show);
        $row_order_id = mysqli_fetch_assoc($result_show_order);
        
        // Lưu id bản ghi vào session
        $_SESSION['order_id'] = $row_order_id['id'];
        $_SESSION['user_id'] = $row_order_id['user_id'];
        
        
        
        // header("Location: header.php");
    } else {
        $error['invalid']="Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="login.php">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                            <span style="font-size: 14px;color:red;" class="mb-3"><?php echo isset($error['invalid'])?$error['invalid']:""?></span>
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>