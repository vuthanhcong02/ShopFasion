<?php
require_once '../../connectDB.php';
$sqlSelect = "SELECT * FROM category ";
$result = mysqli_query($conn, $sqlSelect);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản lí</title>
</head>

<body>
    <div class="container">

        <h5 class="mt-4 mb-3">Thông tin danh mục</h5>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Thêm danh mục
            </button>
            <a class="btn btn-primary text-white" href="../product/productMa.php" id="link-quan-ly-san-pham">Quản lý sản phẩm -></a>
        </div>

        <table class="table border">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">id</th>
                    <th class="text-center" scope="col">Tên hàng</th>
                    <th class="text-center" scope="col">Ngày tạo</th>
                    <th class="text-center" scope="col">Ngày cập nhập</th>
                    <th class="text-center" scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                    <tr>
                        <td class="text-center"><?php echo ($row['id']); ?></td>
                        <td class="text-center"><?php echo ($row['name']); ?></td>
                        <td class="text-center"><?php echo ($row['created_at']); ?></td>
                        <td class="text-center"><?php echo ($row['updated_at']); ?></td>
                        <td class="text-center">
                            <a href="Edit.php?id=<?php echo ($row['id']) ?>" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Ban co muon xoa khong ?');" href="delete.php?id=<?php echo ($row['id']) ?>" class="btn btn-danger">Xóa</a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thông tin sinh viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="insert.php">
                        <div class="mt-4">
                            <label for="exampleInputName" class="form-label text-left">Tên danh mục</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập tên danh mục..." name="name">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputClass" class="form-label">Ngày tạo</label>
                            <input type="datetime-local" class="form-control" id="exampleInputClass" placeholder="Ngày tạo..." name="created_at">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputQue" class="form-label">Ngày cập nhập</label>
                            <input type="datetime-local" class="form-control" id="exampleInputQue" placeholder="Ngày update..." name="updated_at">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success mt-4 mb-3">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>