<?php

require_once '../connectDB.php';
$errors = [];
if(isset($_POST['register'])){
        $username=$_POST['username'];
         if(isset( $username)){
            if(!preg_match("/^[a-zA-Z0-9]*$/",  $username)){
                $errors['username'] = "Tên đăng nhập không chứ kí tự đặc biệt";
             }
         }
        $fullname=$_POST['fullname'];
         if(!preg_match("/^[a-zA-Z \p{L}]+$/u", $fullname)){
             $errors['fullname'] = "Tên đầy đủ không hợp lệ";
         }
        $email =  $_POST['email'];
        if(isset($email)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "Email không hợp lệ";
             }
        }
        $password = $_POST['password'];
        if(isset($password)){
            if(strlen($password) < 6 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)){
                $errors['password'] = "Mật khẩu không hợp lệ"; 
             }
        }
        $rePassword=$_POST['rePassword'];
        if(isset($rePassword)){
            if($rePassword!==$password){
                $errors['rePassword'] = "Mật khẩu nhập lại không trùng khớp";
             }
    }
    if(isset($errors) && !empty($errors)){
    
    }
    else{
        $sql ="INSERT INTO accounts(username,fullname,email,password) VALUES('$username','$fullname','$email','$password')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: login.php");
        }
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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .error{
        color:red;
        font-size: 12px;
    }
</style>
<body class="bg-gradient-infor">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="username" required name="username">
                                        <span class="error"><?php echo isset($errors['username'])?$errors['username']:""; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Full Name" required name="fullname">
                                            <span class="error"><?php echo isset($errors['fullname'])?$errors['fullname']:""; ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" required name="email">
                                        <span class="error"><?php echo isset($errors['email'])?$errors['email']:""; ?></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required name="password">
                                            <span class="error"><?php echo isset($errors['password'])?$errors['password']:""; ?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required name="rePassword">
                                            <span class="error"><?php echo isset($errors['rePassword'])?$errors['rePassword']:""; ?></span>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block" name="register">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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