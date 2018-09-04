<?php require_once 'database.php';
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
    <link href="admin/myAdmin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="admin/myAdmin/css/helper.css" rel="stylesheet">
    <link href="admin/myAdmin/css/style.css" rel="stylesheet">
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
                    <div class="col-lg-5">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Đăng ký</h4>
                                <form method="POST">
                                   <?php 
                                    include 'admin/myAdmin/functions/check_input.php';
                                    $userName = "";
                                    $emailName = "";
                                    $numberphone = "";
                                    $gender = "";
                                    $address = "";

                                    $errors = [];

                                    $checkmail = "SELECT email FROM customer";
                                    $query_sl = mysqli_query($conn,$checkmail);
                                    
                                    // echo $gender;

                                    if (isset($_POST['registerUser'])) {
                                       
                                        $userName = $_POST['userName'];
                                        $emailName  = $_POST['emailName'];
                                        $numberphone = $_POST['numberphone'];
                                        $gender = isset($_POST['gender']);
                                        $address = $_POST['address'];
                                        $password1 = $_POST['password1'];
                                        $password2 = $_POST['password2'];

                                        if (empty($userName)) {
                                            $errors[] = "Tên tài khoản không được để trống!";
                                        }

                                        if (empty($emailName)) {
                                            $errors[] = "Tên Email không được để trống!";
                                        }

                                        while ($assocName = mysqli_fetch_assoc($query_sl)) {
                                            if ($emailName == $assocName['email']) {
                                                $errors[] = "Email đã được sử dụng!";
                                            }
                                        }
                                        if (empty($numberphone)) {
                                            $errors[] = "Số điện thoại không được để trống!";
                                        }
                                        if ($gender == "") {
                                            $errors[] = "Bạn phải chọn 1 giới tính !";
                                        }
                                        if (empty($address)) {
                                            $errors[] = "Địa chỉ không được để trống!";
                                        }

                                        if ($password1 != $password2) {
                                            $errors[] = "Mật khẩu không trùng nhau";
                                        }
                                        if (!empty($errors)) {
                                            echo display_errors($errors);

                                        } else {

                                                //thêm vào db

                                            $password = md5($password1);

                                            $insert_sql = "INSERT INTO customer (name, email, phone,address,password,gender) VALUES ('$userName', '$emailName','$numberphone','$address','$password','$gender') ";
                                            $query_sql = mysqli_query($conn, $insert_sql);


                                            if ($query_sql) {

                                            

                                                header('location: page-login.php');
                                            }
                                        }


                                    } ?>
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" name="userName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên email </label>
                                        <input type="email"  name="emailName" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="numberphone" >
                                    </div>
                                    <div class="checkbox">
                                        <label>Giới tính</label>
                                     <div class="radio text-center">
                                         <label>
                                             <input type="radio" name="gender" id="exampleRadios1" value="1" > Nam
                                             
                                         </label>
                                   
                                         <label>
                                             <input type="radio" class="ml-2" name="gender" id="exampleRadios1" value="0"> Nữ
                                        
                                         </label>
                                     </div>
                                     <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password1" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" name="password2" class="form-control" >
                                    </div>
                                    </div>
                                    <button type="submit" name="registerUser" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Bạn đã có tài khoản ? <a href="page-login.php"> Đăng nhập</a></p>
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
    <script src="admin/myAdmin/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="admin/myAdmin/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="admin/myAdmin/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="admin/myAdmin/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="admin/myAdmin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="admin/myAdmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="admin/myAdmin/js/scripts.js"></script>

</body>

</html>