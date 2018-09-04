<?php 


include 'include/head.php'; 
if (!empty($_SESSION['admin_login']) && isset($_SESSION['admin_login'])) { ?>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <?php include 'include/header.php' ?>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <?php include 'include/left-sidebar.php' ?>
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">

                <!-- /# column -->

                <!-- /# column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                         <div class="input-group-btn"><a href="sanpham.php" class="btn btn-success" >Quay lại</a></div>
                         <h4 class="mt-3">Điền thông tin sản phẩm </h4>

                     </div>

                     <div class="card-body">

                        <?php 
                        //hàm check lỗi input
                            include 'functions/check_input.php';

                        // THÊM SẢN PHẨM

                        if (isset($_POST['addPro'])) {
                                        // thoong bao 
                            $errors = array();

                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $sale_price = $_POST['sale_price'];
                            $category_id = $_POST['category_id'];
                            $size = $_POST['size'];
                            $color = $_POST['color'];
                            $featured = $_POST['featured'];
                            $description = $_POST['description'];
                        


                            $image = "";
                            // các type đuôi ảnh
                            $typeImages= array('image/jpg','image/jpe','image/jpeg','image/jfif','image/png','image/bmp','image/dib','image/gif');

                            if (!empty($_FILES['image']['name'])) {
                                $file = $_FILES['image'];
                                // nếu ko phải là định dạng file ảnh thì nghỉ!
                                if (in_array($file['type'],$typeImages) ) {

                                    $image_name = time().$file['name'];
                                    if (move_uploaded_file($file['tmp_name'], '../../save_images/'.$image_name) ) {
                                        $image = 'save_images/'.$image_name;
                                    }
                                }
                            }

                            // nếu user ko nhập :

                            if (empty($name)) {
                                $errors[] = "Bạn <b>chưa điền tên</b> sản phẩm !!";
                            }

                        
                            if (empty($price)) {
                                $errors[] = "Bạn <b>chưa điền giá</b> sản phẩm!!";
                            }

                            if (empty($size)) {
                                $errors[] = "Bạn <b>chưa điền kích thước</b> sản phẩm!!";
                            }

                             if (empty($color)) {
                                $errors[] = "Bạn <b>chưa điền màu sắc</b> sản phẩm!!";
                            }
                            //  if (empty($featured)) {
                            //     $errors[] = "Bạn <b>chưa điền trạng thái</b> sản phẩm!!";
                            // }

                            if (empty($category_id)) {
                                $errors[] = "Bạn <b>chưa điền thể loại</b> sản phẩm!!";
                            }
                              if (empty($image)) {
                                $errors[] = "Bạn <b>chưa thêm ảnh</b> sản phẩm!!";
                            }
                            if (empty($description)) {
                                $errors[] = "Bạn <b>chưa điền thông tin mô tả</b> sản phẩm!!";
                            }

                            if (!empty($errors)) {
                                echo display_errors($errors);

                            } else {
                                $insertPro = "INSERT INTO product(name, price, sale_price, images, description, size, color, featured, category_id) VALUES('$name','$price','$sale_price', '$image', '$description', '$size','$color','$featured','$category_id')";
                                $reusult = mysqli_query($conn, $insertPro);
                                // header('location: themsanpham.php');
                                echo '<div style="color: green;"> Thêm mới <b>'. $name .'</b> thành công! </div>';
                            }

                        }
                        // kieerm tra array $_FILE
                        // echo "<pre>";
                        // print_r($_FILES);
                        // echo "</pre>";
                        ?>

                        <form action="" method="POST" enctype="multipart/form-data">

                          <!-- name -->
                          <div class="form-group">
                           <label for=""><strong>Tên sản phẩm</strong></label>
                           <input type="text" class="form-control " id="" placeholder="" name="name" value="<?= (isset($name)) ? $name : '' ?>">
                       </div>
                       <!-- price -->
                       <div class="form-group">
                           <label for=""><strong>Giá gốc</strong></label>
                           <input type="number" class="form-control" id="" placeholder="" name="price" min="0" value="<?= (isset($price)) ? $price : '' ?>" >
                       </div>
                       <!-- price sale -->
                       <div class="form-group">
                           <label for=""><strong>Giá khuyến mãi</strong></label>
                           <input type="number" class="form-control " id="" placeholder="" name="sale_price" min="0" value="<?= (isset($sale_price)) ? $sale_price : '' ?>">
                       </div>
                       <!-- kich thuoc -->
                       <div class="form-group">
                           <label for=""><strong>Kích thước</strong></label>
                           <input type="text" class="form-control" id="" placeholder="" name="size" value="<?= (isset($size)) ? $size : '' ?>">
                       </div>
                       <!-- color -->
                       <div class="form-group">
                        <label for=""><strong>Màu sắc </strong></label>
                        <input type="text" class="form-control" id="" placeholder="" name="color" value="<?= (isset($color)) ? $color : '' ?>">
                    </div>
                    <!-- featured -->
                    <div class="form-group">
                       <label for=""><strong>Trạng Thái</strong></label>
                       <div class="clearfix"></div>

                       <select name="featured" id="" class="from-group" >
                     
                        <option value="0">Bình thường</option> <!-- bình thường -->
                        <option value="1">HOT</option>
                        <option value="2">KM</option>
                        <option value="3">Còn ít</option>
                        <option value="4">Tạm hết</option>

                    </select>
                </div>
                <!-- category -->
                <div class="form-group">
                   <label for=""><strong>Thể loại</strong></label>
                   <div class="clearfix"></div>

                 <select name="category_id" id="" class="from-group" >
                    <option value=""></option>
                    <!-- category -->
                    <?php 
                        $select_cate = "SELECT id,name FROM category ORDER BY id ASC";
                        $select = mysqli_query($conn, $select_cate);
                        while($cate = mysqli_fetch_array($select)) :
                     ?>
                        <option value="<?= $cate['id']; ?>"> <?= $cate['name']; ?> </option>
                 <?php endwhile; ?>

                </select>
            </div>
            <!-- image -->
            <div class="form-group">
               <label for=""><strong>Ảnh sản phẩm</strong></label>
               <input type="file" class="form-control " id="" multiple="multiple" name="image">
           </div>

           <!-- description -->
           <div class="form-group">
               <label for="" ><strong>Mô tả</strong></label>
               <div class="clearfix"></div>
               <textarea id="" cols="100" rows="10" name="description"> <?= (isset($description)) ? $description : '' ?></textarea>
           </div>








           <span class="input-group-btn"><button class="btn btn-primary" type="submit" name="addPro" style="color: white; border:none;"> Thêm mới</button></span>

       </form>
   </div>
</div>
<!-- /# card -->
</div>
<!-- /# column -->

</div>
<!-- /# row -->
<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<footer class="footer"> © 2018 All rights reserved. </footer>
<!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="js/lib/bootstrap/js/popper.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/scripts.js"></script>

</body>

</html>
<?php  } else { ?>
<?php header('location: page-error-404.php'); ?>
<?php } ?>