<?php
$id=$_GET['id'];
require_once '../../connectDB.php';
$selectCategory = "SELECT *FROM category";
$sqlSelect = "SELECT * FROM products JOIN category ON products.id_category=category.id WHERE products.id=$id" ;
$result = mysqli_query($conn, $sqlSelect);
$row=mysqli_fetch_assoc($result);
$resultNameCategory = mysqli_query($conn, $selectCategory);
?>
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
    <h5 class="mt-4 mb-3">Thông tin sản phẩm</h5>
    <form method="post" action="update.php">
                            <div class="mt-4">
                                <label for="exampleInputName" class="form-label text-left">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập tên sản phẩm..." name="title" value="<?php echo $row['title']?>">
                            </div>
                            <div class="mt-2">
                                <label for="exampleInputName" class="form-label text-left">Ảnh</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Chọn ảnh..." name="thumbnail" value="<?php echo $row['thumbnail']?>">
                            </div>
                            <div class="mt-2">
                                <label for="exampleInputName" class="form-label text-left">Giá</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập giá..." name="price" value="<?php echo $row['price']?>">
                            </div>
                            <div class="mt-2">
                                <label for="exampleInputName" class="form-label text-left">Danh mục</label>
                                <select class="form-select form-select" aria-label=".form-select-sm example" name="id_category" value="<?php echo $row['id_category']?>">
                                
                                    <?php while ($categoryName = mysqli_fetch_assoc($resultNameCategory)) : ?>
                                        <?php
                                        if($categoryName['id']==$row['id_category']){
                                             echo '<option selected value="'.$categoryName['id'].'">'.$categoryName['name'].'</option>';
                                        } 
                                        else{
                                            echo '<option value="'.$categoryName['id'].'">'.$categoryName['name'].'.</option>';
                                        }  
                                        ?>
                                       
                                    <?php endwhile; ?>
    
                                </select>
                            </div>
                            <div class="mt-2">
                                <label for="exampleInputName" class="form-label text-left">Mô tả</label>
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập ghi chú..." name="decription" value="<?php echo $row['decription'] ?>">
                            </div>
                            <div class="mt-2 mb-2">
                                <label for="exampleInputDate" class="form-label">Ngày cập nhập</label>
                                <input type="datetime-local" class="form-control" id="exampleInputQue" placeholder="Ngày update..." name="updated_at" value="<?php echo $row['updated_at'] ?>">
                            </div>
    
                            <br>
                            <button type="submit" class="btn btn-success mt-4 mb-3">Thêm danh mục</button>
                        </form>
</div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>