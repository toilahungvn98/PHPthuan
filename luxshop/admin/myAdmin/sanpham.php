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
        <!-- Bread crumb -->

        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">

              <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <a href="themsanpham.php" class="btn btn-success btn-block" style="padding: 15px 5px; font-size: 25px;">Thêm sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9"></div>

            <div class="col-lg-12">
                <div class="card">

                    <div class="card-title">
                        <!-- tìm sản phẩm -->
                        <?php include 'include/searchProduct_ad.php'; ?>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr style="font-size: 15px;">
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Danh mục </th>
                                        <th>Kích thước,<br> màu sắc, <br>mô tả</th>
                                        <th>Trạng thái </th>
                                        <th>Ngày đăng</th>
                                        <th>Giá gốc</th>
                                        <th>Giá KM</th>
                                        <th>Chỉnh sửa <br> sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 


                                     //lấy thoogn tin sản phẩm & pagination 

                                    $sqlPro = "SELECT COUNT(id) as total FROM product";

                                    $queryP = mysqli_query($conn, $sqlPro);

                                    $queryPro = mysqli_fetch_assoc($queryP);


                                        // tổng số record trong db
                                    $total_records = $queryPro['total'];

                                        //trang hiện tại
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                                        //số record muốn hiển thị mỗi trang
                                    $limit = 5 ;

                                       
                                    $total_page = ceil($total_records / $limit);
                                        // nếu user nhập trang lớn hơn trang hiện tại thì trả về trang đầu
                                    if ($current_page > $total_page) {

                                        $current_page = $total_page;

                                    } else if ($current_page < 1) {
                                        $current_page = 1;
                                    }

                                        //bắt đầu từ 0 - 10 record mỗi trang
                                    $start = ($current_page - 1 ) * $limit;

                                    $ress = "SELECT * FROM product LIMIT $start, $limit";

                                    



                                    // ẨN HIỆN SẢN PHẨM
                                    if (isset($_GET['an_hien'])) {
                                        $an_hien = $_GET['an_hien'];

                                        $id = $_GET['id'];

                                        $status_update = "UPDATE product SET status = '$an_hien' WHERE id = '$id' ";
                                        $status_res = mysqli_query($conn, $status_update);
                                        $status_res ? header('location: sanpham.php') : '';
                                    }






                                    //DELETE SẢN PHẨM
                                    
                                    if (isset($_GET['delete'])) {
                                        $id_del = $_GET['delete'];

                                        $delete = "DELETE FROM product WHERE id = '$id_del' ";

                                        $queryDel = mysqli_query($conn, $delete);

                                        $queryDel ? header('location: sanpham.php') : '';
                                    }
                                    
                                    //TÌM KIẾM SẢN PHẨM
                                    //
                                    if( isset($_POST['tk_productAD']) ) {

                                        if (empty($_POST['tk_productAD'])) {
                                            $errSearch = '<p class="text-danger text-left">Bạn cần nhập sản phẩm muốn tìm !!</p>';
                                        } else {

                                            $namePro = $_POST['tk_productAD'];
                                            $ress = "SELECT * FROM product WHERE name LIKE '%$namePro%'";
                                        }


                                    }


                                    $resPro = mysqli_query($conn, $ress);

                                    if (!empty($errSearch)) {
                                        echo $errSearch;
                                    } else {


                                        while ($viewPro = mysqli_fetch_assoc($resPro)) :
                                            if ($viewPro['featured'] == 0) {
                                                $featured = '<span class="badge badge-default"></span>';
                                            }
                                            if ($viewPro['featured'] == 1) {
                                                $featured = '<span class="badge badge-danger"> HOT </span>';
                                            }

                                            if ($viewPro['featured'] == 2) {
                                                $featured = '<span class="badge badge-primary"> KM</span>';
                                            }
                                            if ($viewPro['featured'] == 3) {
                                                $featured = '<span class="badge badge-warning"> Còn ít</span>';
                                            }
                                            if ($viewPro['featured'] == 4) {
                                                $featured = '<span class="badge badge-secondary"> Tạm hết</span>';
                                            }


                                            ?>
                                            <tr >
                                                <td>
                                                    <img src="../../<?= $viewPro['images']; ?>" alt="image" class="img-responsive" style="width: 75px; height: 80px;">
                                                </td>
                                                <td><span><?= $viewPro['name']; ?></span></td>
                                                <td>
                                                    <?php 

                                                    $cateId = "SELECT id, name FROM category";
                                                    $cateName = mysqli_query($conn, $cateId);
                                                    while($cate_name = mysqli_fetch_assoc($cateName)): ?>

                                                        <?php if ($viewPro['category_id'] == $cate_name['id']) : ?>  <span><?= $cate_name['name']; ?></span>
                                                    <?php endif; ?>  

                                                <?php endwhile; ?>

                                            </td>
                                            <td> 
                                                <!-- <input type="submit" name="viewp" class="btn btn-info btn-sm viewpro" id=""  value="Xem"> -->
                                                <button type="button" name="viewProduct" id="<?= $viewPro['id']; ?>" class="btn btn-sm btn-dark viewPro" data-toggle="modal" data-target="#exampleModalCenter">
                                                 Xem
                                             </button>
                                         </td>
                                         <td>
                                          <!-- <span class="badge badge-warning">Hot</span> -->
                                          <?= $featured; ?>
                                      </td>
                                      <td>
                                        <span><?= $viewPro['created'] ?></span>
                                    </td>
                                    <td>
                                      <?php if ($viewPro['sale_price'] == 0) { ?>
                                        <span> <?= number_format($viewPro['price'],0,',','.') ?> VNĐ</span>
                                    <?php } else { ?>
                                       <strike><?= number_format($viewPro['price'],0,',','.') ?> VNĐ</strike>
                                   <?php } ?>
                               </td>
                               <td>
                                 <span><?= number_format($viewPro['sale_price'],0,',','.') ?> VNĐ</span>
                             </td>
                             <td>
                                <a href="sanpham.php?an_hien=<?= (($viewPro['status'] == 1) ? '0' : '1');  ?>&id=<?= $viewPro['id']; ?>" class="btn btn-sm btn-info"><?= (($viewPro['status'] == 0) ? 'Hiện SP' : 'Ẩn SP');  ?></a>
                                <a href="editsanpham.php?edit=<?= $viewPro['id']; ?>" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="sanpham.php?delete=<?= $viewPro['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn thật sự muốn xóa sản phẩm này?');">Xóa</a>

                            </td>
                        </tr>

                    <?php endwhile;   } ?>

                </tbody>
            </table>
            <!-- PAGINATION -->
            <?php if (isset($_POST['tk_productAD'])) { ?>
                <?php echo ''; ?>

            <?php } else { ?>

                <nav aria-label="Page navigation example"> 
                  <ul class="pagination justify-content-end" style="">

                     <?php if ($current_page > 1 && $total_page > 1) : ?>
                      <li class="page-item"><a class="page-link" href="sanpham.php?page=<?= ($current_page) - 1; ?>"> &lArr; </a></li>
                  <?php endif; ?>

                  <?php for ($i = 1; $i <= $total_page; $i++) :  ?>       
                    <?= ($i == $current_page ) ? "<li class='page-item disabled'><span class='page-link'  style='color: red;'>".$i."</span></li>" : '<li class="page-item"><a  class="page-link" href="sanpham.php?page='.$i.'"> '. $i.' </a></li>'; ?>

                <?php endfor; ?>

                <?php if ($current_page < $total_page && $total_page > 1) : ?>
                  <li class="page-item"><a class="page-link" href="sanpham.php?page=<?= ($current_page) +  1; ?>"> &rArr;</a></li>
              <?php endif; ?>
          </ul>

      </nav>
  <?php } ?>

</div>
</div>
</div>
</div>

</div>
<!-- /# row -->
<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- Modal -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Kích thước, màu sắc & mô tả</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body " id="detail_pro">
    ...
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

</div>
</div>
</div>
</div>
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

<!-- AJAX lấy dữ liệu kích thước, màu sắc, mô tả, trong database -->
<script>
    $(document).ready(function() {
        $('.viewPro').click(function() {
            var pro_id = $(this).attr('id');

            $.ajax({
                url : "getdataProduct.php",
                method: "POST",
                data : {proID : pro_id},
                success: function(data) {
                    $('#detail_pro').html(data);

                }

            });
        });
    });
</script>


</body>

</html>
<?php } else { ?>
    <?php header('location: page-error-404.php') ?>
<?php } ?>