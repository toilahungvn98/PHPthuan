
<?php require_once '../database.php';
session_start();
?>

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
                                <h4>Đăng nhập</h4>
                                <form method="POST">
                                    <?php 
                                    //thong bao loi
                                    include 'myAdmin/functions/check_input.php';
                                    $errors = [];
                                  


                                    if (!empty($_POST['emailAD'])) {
                                        $emailAD = $_POST['emailAD'];
                                        $passwordAD = md5($_POST['passwordAD']);
                                        $sqlcheck = "SELECT id,name, email, created_at FROM admin WHERE email ='$emailAD' AND password = '$passwordAD' ";

                                        $check = mysqli_query($conn, $sqlcheck);


                                        
                                        $admin = mysqli_fetch_assoc($check);
                                        if(mysqli_num_rows($check) == 1) {
                                            $_SESSION['admin_login'] = $admin;

                                            header('location: myAdmin/index.php');

                                        } else {
                                           if($passwordAD != $admin['password']) {
                                            $errors[] = "<p class='text-danger'>Mật khẩu hoặc tài khoản không chính xác !! </p>";
                                        }

                                        if(!empty($errors)) {
                                            echo display_errors($errors);

                                        }              
                                    }

                                }?>




                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="email" class="form-control" name="emailAD" placeholder=". . .">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" name="passwordAD" placeholder=". . .">
                                </div>
                                   <!--  <div class="checkbox">
                                        <label>
        										<input type="checkbox"> Remember Me
        									</label>
                                        <label class="pull-right">
        										<a href="#">Forgotten Password?</a>
        									</label>

                                    </div>
                                -->   <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng nhập</button>
                                    <!-- <div class="register-link m-t-15 text-center">
                                        <p>Bạn chưa có tài khoản ? <a href="#"> Đăng ký tại đây </a></p>
                                    </div>
                                -->   
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