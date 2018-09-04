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
    <?php 


       if (isset($_GET['update'])) {
        $edit_id = $_GET['update'];
        $update_set = "SELECT * FROM category WHERE id = '$edit_id'";
        $edit_rs = mysqli_query($conn, $update_set );
        //biến chứa các mảng có key được trả về :
        $cate_rs = mysqli_fetch_assoc($edit_rs);

    }

     // Them danh muc 

    if (isset($_POST['addCate'])) {

        $nameCate = $_POST['nameCate'];

        if (empty($nameCate) ) {
            $error = "<font color='red'>Bạn cần điền tên danh mục cần thêm vào ô trống!!</font></br>";
        } 
        else {
            $insertCate = "INSERT INTO category(name) VALUES ('$nameCate') ";
            $queryCate = mysqli_query($conn, $insertCate);

           if ($queryCate) {
             header('location: edit_category.php');
           }


        }
    };

    //An hien danh muc
    
    if (isset($_GET['showorhide'])) {
        $showorhide = $_GET['showorhide'];

        $id = $_GET['id'];

        $status_sql = "UPDATE category SET status = '$showorhide' WHERE id = '$id' ";

        $status_rs = mysqli_query($conn, $status_sql);

        if ($status_rs) {
            header('location: edit_category.php');
        }
    }

    //sửa danh mục
    


    if (isset($_POST['editCate'])) {

        $editCate = $_POST['nameCate'];


        if (empty($editCate) ) {
            $error = "<font color='red'>Bạn cần điền tên danh mục mới vào ô trống!!</font></br>";
        } else {
            $update = "UPDATE category SET name = '$editCate' WHERE id = '$edit_id' ";
            $result = mysqli_query($conn, $update);

            if ($result) {
                header('location: edit_category.php');
            }
        }

    }

      // delete category
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $del = "DELETE FROM category WHERE id = '$id' ";
        $queryDel = mysqli_query($conn, $del);

        if ($queryDel ) {
            header('location: edit_category.php');
        }

    }



    ?>

    <div class="page-wrapper">
        <!-- Bread crumb -->

        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title">

                            <!-- test -->


                            <h4>Thêm danh mục </h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">

                                    <!-- thoong bao  -->

                                    <?php 
                                    if (!empty($error)) {
                                        echo $error;
                                    } 
                                    // if (!empty( $success)) {
                                    //     echo  $success;
                                    // }
                                    $cat_value = "";
                                    if (isset($_GET['update'])) {
                                        $cat_value = $cate_rs['name'];
                                    }
                                    //  else {
                                    //     if (isset($_POST['nameCate'])) {
                                    //         $cat_value = $_POST['nameCate'];
                                    //     }
                                    // }


                                    ?>

                                    <form method="POST">

                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control <?= (!empty($error)) ? ' is-invalid' : ''  ?>" placeholder="Điền danh mục muốn thêm" name="nameCate" value="<?=  $cat_value; ?>">
                                          <div class="input-group-append">
                                            <?php if (isset($_GET['update'])): ?>
                                                <a href="edit_category.php" class="btn btn-default" style="color: red;"> Hủy</a>

                                            <?php endif; ?>
                                            <button class="btn btn-primary" type="submit" name="<?= isset($_GET['update']) ? 'editCate' : 'addCate'; ?>" ><?= isset($_GET['update']) ? 'Lưu' : 'Thêm'; ?></button>
                                        </div>
                                    </div>
                                </form>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Danh mục hiện có </h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <tbody>
                                  <?php
                                  $qCat = "SELECT * FROM category";
                                  $queryCat = mysqli_query($conn, $qCat);
                                  while( $cat = mysqli_fetch_assoc($queryCat)) :
                                   ?>

                                   <tr>

                                    <td class=""><?= $cat['name']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td >
                                        <a href="edit_category.php?showorhide=<?= $cat['status'] == 1 ? '0' : '1' ?>&id=<?= $cat['id']; ?>" class="btn btn-info btn-sm " ><?= (($cat['status'] == 0) ? 'Hiện SP': 'Ẩn SP'); ?></a>

                                        <a href="edit_category.php?update=<?= $cat['id']; ?>" class="btn btn-warning btn-sm " >Sửa</a>


                                        <a href="edit_category.php?delete=<?= $cat['id']; ?>" class="btn btn-danger btn-sm " onclick="return  confirm('Bạn thật sự muốn xóa danh mục này?');">Xóa</a>
                                    </td>


                                </tr>

                            <?php endwhile; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->

</div>
<!-- /# row -->
<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

<!-- footer -->


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
<?php }else { ?>
<?php header('location: page-error-404.php'); ?>
<?php } ?>