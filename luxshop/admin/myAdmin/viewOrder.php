<?php
include 'include/head.php'; 

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
        <!-- Bread crumb -->
        
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h4>Các đơn hàng hiện có </h4>
                            <?php 

                            // $assoc_dh = mysqli_fetch_assoc($query_dh);
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_cus = "SELECT * FROM customer";

                                        $my_cus = mysqli_query($conn, $sql_cus);


                                        while( $cus = mysqli_fetch_assoc($my_cus)) { ?> 

                                            <tr>
                                                <th scope="row"><?= $cus['id'] ?></th>
                                                <td>Tên: <?= $cus['name'] ?>,SĐT: <?= $cus['phone'] ?>,ĐC: <?= $cus['address'] ?></td>
                                                <!-- <td><?= $cus['phone'] ?></td> -->
                                                <!-- <td><span class="badge badge-primary">Sale</span></td>
                                                <td>January 22</td>
                                                <td class="color-primary">$21.56</td> -->
                                            </tr>
                                        <?php     }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /# row -->
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
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