<?php

require_once '../../connectDB.php';
$id = $_GET['id'];
$sqlSelect = "SELECT * FROM category WHERE id=$id";
$result = mysqli_query($conn, $sqlSelect);
$row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản lí</title>
</head>

<body>
    <div class="container">

        <h5 class="mt-4 mb-3">Thông tin danh mục</h5>
        <div class="d-flex justify-content-start align-items-center">
            <a class="btn btn-primary text-white m-2" href="../category/categoryMa.php" id="link-quan-ly-san-pham"><-Thông tin danh mục</a>
            <a class="btn btn-primary text-white m-2" href="../product/productMa.php" id="link-quan-ly-san-pham">Quản lí sản phẩm -></a>
        </div>

        <form method="post" action="update.php?id=<?php echo $row['id']?>">
            <div class="mt-4">
                <label for="exampleInputName" class="form-label text-left">Tên hàng</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập tên danh mục..." name="name" value="<?php echo $row['name'] ?>">
            </div>
            <div class="mb-2">
                <label for="exampleInputClass" class="form-label">Ngày tạo </label>
                <input type="datetime-local" class="form-control" id="exampleInputClass" placeholder="Ngày tạo..." name="created_at" value="<?php echo $row['created_at'] ?>">
            </div>
            <div class="mb-2">
                <label for="exampleInputQue" class="form-label">Ngày cập nhập</label>
                <input type="datetime-local" class="form-control" id="exampleInputQue" placeholder="Ngày update..." name="updated_at" value="<?php echo $row['created_at'] ?>">
            </div>

            <br>
            <button type="submit" class="btn btn-success mt-4 mb-3">Lưu</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>