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
                <?php if (isset($_GET['inforAdmin'])) {
                    $id_admin = $_GET['inforAdmin'];
                    
                    $selectAD = "SELECT * FROM admin WHERE id = '$id_admin' ";
                    $query_ad = mysqli_query($conn, $selectAD);


                    if (isset($_GET['delAD']) ) {
                        $id_del = $_GET['delAD'];
                        $del = "DELETE FROM admin WHERE id = '$id_del' ";
                        $query_del =  mysqli_query($conn, $del);

                        if ($query_del) {
                            // xóa tài khoản
                            session_destroy();
                            unset($_SESSION['admin_login']);
                            header('location:  ../index.php');
                        }

                    }

                    ?>


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Thông tin tài khoản Admin </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Ngày tạo</th>
                                                <th>Cập nhật</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php while ($infoAD = mysqli_fetch_assoc($query_ad)) : ?>               

                                                <tr>
                                                   <!--  <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                        </div>
                                                    </td> -->
                                                    <td> <?php echo $infoAD['name']; ?></td>
                                                    <td><span><?php echo $infoAD['email']; ?></span></td>
                                                    <td><span><?php echo $infoAD['created_at']; ?></span></td>
                                                    <td><span><?php echo $infoAD['updated_at']; ?></span></td>
                                                    <td>
                                                        <a href="edit_admin.php?editAD=<?= $infoAD['id']; ?>" class="btn btn-sm btn-warning">Sửa</a>
                                                        <a href="index.php?inforAdmin=<?= $id_AD; ?>&delAD=<?= $infoAD['id']; ?>" class="btn btn-sm btn-danger" onclick="return  confirm('Bạn thật sự muốn xóa tài khoản này?');">Xóa</a>
                                                    </td>
                                                    
                                                </tr>
                                            <?php  endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Thông tin tài khoản Admin khác </h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Ngày tạo</th>
                                                <th>Cập nhật</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $selectADs = "SELECT * FROM admin WHERE id <> '$id_admin' ";
                                            $query_ads = mysqli_query($conn, $selectADs);
                                            while ($infoADs = mysqli_fetch_assoc($query_ads)) : ?>


                                                <tr>
                                                   <!--  <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                                        </div>
                                                    </td> -->
                                                    <td> <?php echo $infoADs['name']; ?> </td>
                                                    <td><span><?php echo $infoADs['email']; ?></span></td>
                                                    <td><span><?php echo $infoADs['created_at']; ?></span></td>
                                                    <td><span><?php echo $infoADs['updated_at']; ?></span></td>
                                                    <td><span class="badge badge-secondary">offline</span></td>
                                                </tr>

                                            <?php endwhile; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  }  else {  ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-30">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">

                                        <h2>568120</h2>
                                        <p class="m-b-0">Total Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-30">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2>1178</h2>
                                        <p class="m-b-0">Sales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-30">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2>25</h2>
                                        <p class="m-b-0">Stores</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-30">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2>847</h2>
                                        <p class="m-b-0">Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                        <!-- column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Extra Area Chart</h4>
                                    <div id="extra-area-chart"></div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->

                        <!-- column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body browser">
                                    <p class="f-w-600">iMacs <span class="pull-right">85%</span></p>
                                    <div class="progress ">
                                        <div role="progressbar" style="width: 85%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                    </div>

                                    <p class="m-t-30 f-w-600">iBooks<span class="pull-right">90%</span></p>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 90%; height:8px;" class="progress-bar bg-info wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                    </div>

                                    <p class="m-t-30 f-w-600">iPhone<span class="pull-right">65%</span></p>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                    </div>

                                    <p class="m-t-30 f-w-600">Samsung<span class="pull-right">65%</span></p>
                                    <div class="progress">
                                        <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                    </div>

                                    <p class="m-t-30 f-w-600">android<span class="pull-right">65%</span></p>
                                    <div class="progress m-b-30">
                                        <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Recent Orders </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Product</th>
                                                    <th>quantity</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td>John Abraham</td>
                                                    <td><span>iBook</span></td>
                                                    <td><span>456 pcs</span></td>
                                                    <td><span class="badge badge-success">Done</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="images/avatar/2.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td>John Abraham</td>
                                                    <td><span>iPhone</span></td>
                                                    <td><span>456 pcs</span></td>
                                                    <td><span class="badge badge-success">Done</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="images/avatar/3.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td>John Abraham</td>
                                                    <td><span>iMac</span></td>
                                                    <td><span>456 pcs</span></td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="round-img">
                                                            <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td>John Abraham</td>
                                                    <td><span>iBook</span></td>
                                                    <td><span>456 pcs</span></td>
                                                    <td><span class="badge badge-success">Done</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- End PAge Content -->
                </div>
                <!-- End Container fluid  -->
                <!-- footer -->
                <footer class="footer text-center">Coppyright © 2018 by group 9 </footer>
            <?php } ?>
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