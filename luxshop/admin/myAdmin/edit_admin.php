<?php
include 'include/head.php'; 
if (!empty($_SESSION['admin_login']) && isset($_SESSION['admin_login'])) { 
    ?>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include 'include/header.php' ?>
        <!-- End header header -->
        <?php include 'include/left-sidebar.php' ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <div class="col-lg-12">
                   <?php 
                include 'functions/check_input.php'; //check loi

                if (isset($_GET['editAD'])) {
                    $id_info = $_GET['editAD'];

                    $sql_select = "SELECT * FROM admin WHERE id = '$id_info' ";

                    $query_id = mysqli_query($conn, $sql_select);
                    $assoc_ad = mysqli_fetch_assoc($query_id);


                } 
                if (isset($_POST['tenAD'])) {
                    $errors = [];
                    $name = $_POST['tenAD'];
                    if (empty($name)) {
                        $errors[] = "Cần nhập tên mới muốn thay!";
                    }
                    if (!empty($errors)) {
                        echo display_errors($errors);

                    } else {
                       date_default_timezone_set('Asia/Ho_Chi_Minh');
                       $dateTime = date("Y-m-d H:i:s");
                       $update_info = "UPDATE admin SET name = '$name', updated_at = '$dateTime' WHERE id = '$id_info' ";
                       $rs_info = mysqli_query($conn, $update_info);

                       if ($rs_info) {
                        header("location: index.php?inforAdmin=$id_info");
                    }
                }

            }

            ?>
            <div class="card">
                <div class="card-title">

                    <h4>Sửa thông tin tài khoản Admin </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            
                            <thead>
                                <tr>

                                    <th>Tên</th>             
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>


                                
                               <form method="POST">
                                <tr>

                                    <td> <input class="form-control w-50" value="<?= $assoc_ad['name']; ?>" type="" name="tenAD"></td>


                                    <td><button class="btn btn btn-primary">Lưu</button></td>
                                </tr>
                            </form>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>








    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->


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


<!-- Amchart -->
<script src="js/lib/morris-chart/raphael-min.js"></script>
<script src="js/lib/morris-chart/morris.js"></script>
<script src="js/lib/morris-chart/dashboard1-init.js"></script>


<script src="js/lib/calendar-2/moment.latest.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/semantic.ui.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/prism.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
<!-- scripit init-->
<script src="js/lib/calendar-2/pignose.init.js"></script>

<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
<script src="js/scripts.js"></script>
<!-- scripit init-->

<script src="js/scripts.js"></script>

</body>

</html>
<?php } else { ?>
    <?php header('location: page-error-404.php'); ?>
    <?php } ?>