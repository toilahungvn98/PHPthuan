<?php require_once '../database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="myAdmin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="myAdmin/css/helper.css" rel="stylesheet">
    <link href="myAdmin/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
         <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
     </div>
     <!-- Main wrapper  -->
     <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4> Đăng ký  </h4>
                                <form method="POST">
                                    <?php 
                                    include 'myAdmin/functions/check_input.php';
                                    $nameAD = "";
                                    $emailAD = "";
                                    $assocName = "";
                                    $errors = [];

                                    $select_sql = "SELECT email FROM admin";
                                    $query_sl = mysqli_query($conn,$select_sql);
                                    


                                    if (isset($_POST['registerAD'])) {
                                        $nameAD = $_POST['nameAD'];
                                        $emailAD  = $_POST['emailAD'];
                                        $passwordAD1 = $_POST['passwordAD1'];
                                        $passwordAD2 = $_POST['passwordAD2'];

                                        if (empty($nameAD)) {
                                            $errors[] = "Tên tài khoản không được để trống!";
                                        }

                                        if (empty($emailAD)) {
                                            $errors[] = "Email không được để trống!";
                                        }
                                        while ($assocName = mysqli_fetch_assoc($query_sl)) {
                                            if ($emailAD == $assocName['email']) {
                                                $errors[] = "Email đã được sử dụng!";
                                            }
                                        }

                                        if (empty($passwordAD1)) {
                                            $errors[] = "Mật khẩu không được để trống!";
                                        }

                                        if ($passwordAD1 != $passwordAD2) {
                                            $errors[] = "Mật khẩu không trùng nhau";
                                        }
                                        if (!empty($errors)) {
                                            echo display_errors($errors);

                                        } else {

                                                //thêm vào db

                                            $password = md5($passwordAD1);

                                            $insert_sql = "INSERT INTO admin (name, email, password) VALUES ('$nameAD', '$emailAD','$password') ";
                                            $query_sql = mysqli_query($conn, $insert_sql);


                                            if ($query_sql) {

                                            

                                                header('location: index.php');
                                            }
                                        }


                                    }

                                    ?>

                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input type="text" class="form-control" name="nameAD" value="<?= (isset($nameAD)) ? $nameAD : '';  ?>" placeholder=". . .">
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" class="form-control" name="emailAD" value="<?= (isset($emailAD)) ? $emailAD : '';  ?>" placeholder=". . .">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu </label>
                                        <input type="password" class="form-control" name="passwordAD1" value="<?= (isset($passwordAD1)) ? $passwordAD1 : '';  ?>" placeholder=". . .">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu </label>
                                        <input type="password" class="form-control" name="passwordAD2" value="<?= (isset($passwordAD2)) ? $passwordAD2 : '';  ?>" placeholder=". . .">
                                    </div>
                                  <!--   <div class="checkbox">
                                        <label>
										<input type="checkbox"> Agree the terms and policy
									</label>
                                    </div>
                                -->                                    <button type="submit" name="registerAD" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                                <div class="register-link m-t-15 text-center">
                                    <p>Đã có tài khoản ? <a href="#"> Đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="myAdmin/js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="myAdmin/js/lib/bootstrap/js/popper.min.js"></script>
<script src="myAdmin/js/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="myAdmin/js/jquery.slimscroll.js"></script>
<!--Menu sidebar -->
<script src="myAdmin/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="myAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="myAdmin/js/scripts.js"></script>

</body>

</html>