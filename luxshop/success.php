<?php 
require 'database.php';
ob_start();
session_start();
$sl = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$id_sp = "";


// cap nhat gio 

// if (isset($_POST['uploadCart'])) {
// 	foreach ($_POST['quantity'] as $key => $value) {
// 		$qty = $_POST['quantity'][$key];
// 		$_SESSION['quantity'][$key] = $qty;
// 		$cart[$id_c]['soluong'] = $_SESSION['quantity'][$key];
// 	}
// }
if (isset($_POST['uploadCart'])) {
	foreach ($_POST['num-product'] as $k => $v) {
		foreach ($sl as $ke => $va) { 
			$id_sp = $va['id'];
		}
		
		
		$qty = $_POST['num-product'][$k];

		

		if ( ($v < 0) && (is_numeric($v))) {
			
			unset($_SESSION['upQty'][$k]);

			

		} elseif ( ($v > 0 ) && (is_numeric($v))) {

			$_SESSION['upQty'][$k] = $v;
			
		}	
		
		// // $sl[$id_sp]['soluong'] = $_SESSION['upQty'][$k];
		// echo '<pre>';
		//  print_r($sl[$id_sp]);

	}


	header('location: shoping-cart.php');
	


	
}
// xoa sp trong gio


if (isset($_GET['del'])) {
	$idC = $_GET['del'];
	unset($_SESSION['cart'][$idC]);
	header('location: shoping-cart.php');
}
//xoa tat ca gio

if (isset($_POST['clearCart'])) {
	if (isset($_SESSION['cart'])) {
		unset($_SESSION['cart']);
	}
	header('location: shoping-cart.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Font_L.svg/2000px-Font_L.svg.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Giao hàng miễn phí cho đơn hàng trên 500K VNĐ!
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Câu hỏi thường gặp
						</a>

						<?php if (isset($_SESSION['user'])) {  ?>
							<p class="flex-c-m trans-04 p-lr-25 text-white"><?= $_SESSION['user']['name']; ?> </p>
							<a href="logoutUser.php?idUser=<?= $_SESSION['user']['id']; ?>" class="flex-c-m trans-04 ">Đăng xuất</a>
						<?php } else { ?>
							<a href="page-login.php" class="flex-c-m trans-04 p-lr-25">
								Đăng nhập
							</a>

						<?php	} ?>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<h3 class="namelogo">Lux</h3>
					</a>
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Trang chủ</a>

							</li>

							<li>
								<a href="product.php">Shop</a>
							</li>


							<li>
								<a href="contact.php">Liên hệ</a>
							</li>

							<li>
								<a href="about.php">Về chúng tôi</a>
							</li>


						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= count($sl); ?>">
							<a href="shoping-cart.php" style="color: black;"><i class="zmdi zmdi-shopping-cart"></i></a>
						</div>

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		

			<a href="index.html" class="logo">
				<h3 class="namelogo">Lux</h3>
			</a>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Giao hàng miễn phí cho đơn hàng trên 500K VNĐ!
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Câu hỏi thường gặp
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Đăng nhập
						</a>


					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Trang chủ </a>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>
				
				<li>
					<a href="contact.html">Liên hệ</a>
				</li>

				<li>
					<a href="about.html">Về chúng tôi</a>
				</li>

			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Giỏ hàng của bạn
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
		</div>
	</div>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Trang chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Giỏ hàng
			</span>
		</div>
	</div>


			<div class="jumbotron">
				<h1 class="display-3">Đặt hàng thành công</h1>
				<p> <a href="product.php">Tiếp tục mua hàng</a> </p>
			</div>


<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Thể loại
				</h4>

				<ul>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Nữ giới
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Nam giới
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Giày 
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Đồng hồ
						</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Trợ giúp
				</h4>

				<ul>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Cách đặt hàng
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Đổi trả
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Đặt hàng gửi hàng
						</a>
					</li>

					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Câu hỏi thường gặp
						</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Liên lạc
				</h4>

				<p class="stext-107 cl7 size-201">
					ĐC : 263B- Hoàng Quốc Việt- Hà Nội
				</p>
				<p class="stext-107 cl7 size-201">
					Hotline : 012321392
				</p>
				<div class="p-t-27">
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-instagram"></i>
					</a>

					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-pinterest-p"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Nhận tin tức
				</h4>

				<form>
					<div class="wrap-input1 w-full p-b-4">
						<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email....">
						<div class="focus-input1 trans-04"></div>
					</div>

					<div class="p-t-18">
						<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
							Đăng ký
						</button>
					</div>
				</form>
			</div>
		</div>

		<div class="p-t-40">
			<div class="flex-c-m flex-w p-b-18">
				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
				</a>
			</div>

			<p class="stext-107 cl6 txt-center">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</p>
		</div>
	</div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<script>
	$(".js-select2").each(function(){
		$(this).select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(this).next('.dropDownSelect2')
		});
	})
</script>
<!--===============================================================================================-->
<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
	$('.js-pscroll').each(function(){
		$(this).css('position','relative');
		$(this).css('overflow','hidden');
		var ps = new PerfectScrollbar(this, {
			wheelSpeed: 1,
			scrollingThreshold: 1000,
			wheelPropagation: false,
		});

		$(window).on('resize', function(){
			ps.update();
		})
	});
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>