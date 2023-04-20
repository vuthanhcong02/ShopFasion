<?php
require_once '../../connectDB.php';
$selectCategory = "SELECT *FROM category";
$sqlSelect = "SELECT products.id,title,thumbnail,price,decription,products.created_at,products.updated_at,category.name categoryname FROM products JOIN category ON products.id_category=category.id";
$result = mysqli_query($conn, $sqlSelect);
$resultNameCategory = mysqli_query($conn, $selectCategory);
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

        <h5 class="mt-4 mb-3">Thông tin Sản phẩm</h5>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Thêm sản phẩm
            </button>
            <a class="btn btn-primary text-white" href="../category/categoryMa.php" id="link-quan-ly-san-pham"><-Quản lí danh mục</a>
        </div>

        <table class="table border">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">id</th>
                    <th class="text-center" scope="col">Tên sản phẩm</th>
                    <th class="text-center" scope="col">Ảnh</th>
                    <th class="text-center" scope="col">Giá</th>
                    <th class="text-center" scope="col">Danh mục</th>
                    <th class="text-center" scope="col">Mô tả</th>
                    <th class="text-center" scope="col">Ngày cập nhập</th>
                    <th class="text-center" scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                    <tr>
                        <td class="text-center"><?php echo ($row['id']); ?></td>
                        <td class="text-center"><?php echo ($row['title']); ?></td>
                        <td class="text-center"><img src="img/<?php echo ($row['thumbnail']); ?>" width="100px" /></td>
                        <td class="text-center"><?php echo ($row['price']); ?></td>
                        <td class="text-center"><?php echo ($row['categoryname']); ?></td>
                        <td class="text-center"><?php echo ($row['decription']); ?></td>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Thông tin sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="insert.php" enctype="multipart/form-data">
                        <div class="mt-4">
                            <label for="exampleInputName" class="form-label text-left">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập tên sản phẩm..." name="title">
                        </div>
                        <div class="mt-2">
                                <label for="thumbnail" class="form-label text-left">Ảnh</label>
                                <input type="file" class="form-control" id="thumbnail" placeholder="Chọn ảnh..." name="thumbnail" value="<?php echo $row['thumbnail']?>">
                                <img class="mt-2" src="<?php echo $row['thumbnail']?>" width="250px" id="img_thumbnail"/>
                            </div>
                        <div class="mt-2">
                            <label for="exampleInputName" class="form-label text-left">Giá</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập giá..." name="price">
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputName" class="form-label text-left">Danh mục</label>
                            <select class="form-select form-select" aria-label=".form-select-sm example" name="id_category">
                                <option value="default" checked>Chọn danh mục...</option>
                                <?php while ($categoryName = mysqli_fetch_assoc($resultNameCategory)) : ?>
                                    <option value="<?php echo $categoryName['id'] ?>"><?php echo $categoryName['name'] ?></option>
                                <?php endwhile; ?>

                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputName" class="form-label text-left">Mô tả</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập ghi chú..." name="decription">
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputDate" class="form-label">Ngày cập nhập</label>
                            <input type="datetime-local" class="form-control" id="exampleInputQue" placeholder="Ngày update..." name="updated_at">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success mt-4 mb-3">Thêm Sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const input = document.querySelector('input[type="file"]');
        input.addEventListener('change', function() {
            // Đọc file hình ảnh được chọn
            const file = this.files[0];
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                // Hiển thị hình ảnh được chọn
                const img = document.getElementById('img_thumbnail');
                img.src = reader.result;
            });
            reader.readAsDataURL(file);
        });
    </script>
</body>