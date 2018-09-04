<?php  
if (!empty($_SESSION['admin_login']) && isset($_SESSION['admin_login'])) {
    $admin_login = $_SESSION['admin_login'];
} ?>
<div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b>Xin chào Admin :</b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                       <b><?= !empty($_SESSION['admin_login']) ? $admin_login['name'] : ''; ?></b>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                
                      
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                   
                     
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                     <?php 
                                       $id_AD =  $_SESSION['admin_login']['id'];

                                      ?>
                                    <li><a href="index.php?inforAdmin=<?= $id_AD; ?>">Thông tin</a></li>
                                    <li><a href="../register.php">Đăng ký tài khoản</a></li>
                                    <li><a href="../logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>