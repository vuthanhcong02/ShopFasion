<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Khi click vào liên kết "Quản lý danh mục"
            $("#link-quan-ly-danh-muc").click(function(event) {
                event.preventDefault();
                // Gửi yêu cầu AJAX đến file "quan_ly_danh_muc.php" để lấy nội dung trang quản lý danh mục
                $.get("categoryMa.php", function(data) {
                    // Cập nhật lại nội dung của div "content" để hiển thị nội dung được trả về từ server
                    $("#content").html(data);
                });
            });

            // Khi click vào liên kết "Quản lý sản phẩm"
            $("#link-quan-ly-san-pham").click(function(event) {
                event.preventDefault();
                // Gửi yêu cầu AJAX đến file "quan_ly_san_pham.php" để lấy nội dung trang quản lý sản phẩm
                $.get("../product/productMa.php", function(data) {
                    // Cập nhật lại nội dung của div "content" để hiển thị nội dung được trả về từ server
                    $("#content").html(data);
                });
            });
        });
    </script>
</head>

<body>
    <?php
    // Lấy đường dẫn của trang hiện tại
    $current_url = $_SERVER['REQUEST_URI'];
    ?>
    <h5>Admin</h5>
    <!-- Hiển thị các tab -->
    <ul class="nav nav-tabs">
        <li class="nav-item active">
            <!-- <a class="nav-link" href="categoryMa.php">Quản lí danh mục</a> -->
            <a class="nav-link" id="link-quan-ly-danh-muc">Quản lí danh mục</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" id="link-quan-ly-san-pham">Quản lí sản phẩm</a>
        </li>
    </ul>
    <div id="content">
        <!-- Nội dung của trang sẽ được thay đổi sau khi click vào các liên kết -->
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>