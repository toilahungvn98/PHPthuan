<?php 
require_once 'database.php';
session_start();
$sl = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

	//query category
//query category
$query_category = "SELECT * FROM category WHERE status = 1";
$categorys = mysqli_query($conn, $query_category);

//query product
$query_product = "SELECT * FROM product WHERE status = 1";
$products = mysqli_query($conn, $query_product);


?>
<!doctype html>
<html lang="en">
<head>
	<title>product</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/font_l.svg/2000px-font_l.svg.png"/>
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
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/magnificpopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- header -->
	<header class="header-v4">
		<!-- header desktop -->
		<div class="container-menu-desktop">
			<!-- topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Giao hàng miễn phí cho đơn hàng trên 500k vnđ!
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
					
					<!-- logo desktop -->		
					<a href="index.php" class="logo">
						<h3 class="namelogo">Lux</h3>
					</a>

					<!-- menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li >
								<a href="index.php">Trang chủ</a>							
							</li>

							<li class="active-menu">
								<a href="product.php">Cửa hàng</a>
							</li>

							<li>
								<a href="contact.php">Liên hệ<i></i></a>
							</li>

							<li>
								<a href="about.php">Về chúng tôi</a>
							</li>


						</ul>
					</div>	

					<!-- icon header -->
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

		<!-- header mobile -->
		<div class="wrap-header-mobile">
			<!-- logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="img-logo"></a>
			</div>

			<!-- icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- menu mobile -->
		<!-- menu mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Giao hàng miễn phí cho đơn hàng trên 500k vnđ!
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
					<a href="index.php">Trang chủ</a>
					
				</li>

				<li>
					<a href="product.php">Cửa hàng</a>
				</li>

				<li>
					<a href="contact.php">Liên hệ</a>
				</li>

				<li>
					<a href="about.php">Về chúng tôi</a>
				</li>

				
			</ul>
		</div>


		<!-- modal search -->
		<?php include 'include/search.php' ?>
	</header>

	<?php 


	
	?>
	
	<!-- product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Tất cả
					</button>

					<?php while($cate = mysqli_fetch_assoc($categorys)) : ?>

						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".cat-<?= $cate['id']; ?>">
							<?= $cate['name']; ?>
						</button>


					<?php endwhile; ?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">


					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Tìm kiếm
					</div>
				</div>

				<!-- search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">

					<form method="post" class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" name="click-search">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="search">
					</form>
				</div>


			</div>

			<div class="row isotope-grid">
				<?php while($pros = mysqli_fetch_assoc($products)) :

					if ($pros['featured'] == 0) {
						$featured = '<span class="badge badge-default"> </span>';
					}
					if ($pros['featured'] == 1) {
						$featured = '<span class="badge badge-danger"> HOT </span>';
					}

					if ($pros['featured'] == 2) {
						$featured = '<span class="badge badge-primary"> KM </span>';
					}
					if ($pros['featured'] == 3) {
						$featured = '<span class="badge badge-warning"> Còn ít</span>';
					}
					if ($pros['featured'] == 4) {
						$featured = '<span class="badge badge-secondary"> Tạm hết</span>';
					}
					?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item cat-<?= $pros['category_id'] ?>">
						<!-- block2 -->
						
						<div class="block2">

							<!-- badge -->
							<span><?= $featured; ?></span>

							<div class="block2-pic hov-img0">
								<img src="<?= $pros['images']; ?>" alt="img-product">

								<a href="product-detail.php?idPro=<?= $pros['id']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
									Xem ngay
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.php?idPro=<?= $pros['id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $pros['name'] ?>
									</a>

									<span class="stext-105 cl3">
										<?php if ($pros['sale_price'] > 0) { ?>

											<strike class="mr-2"><?= number_format($pros['price'],0,',','.'); ?></strike>
											<span><?= number_format($pros['sale_price'],0,',','.'); ?></span> VNĐ

										<?php } else { ?>

											<?= number_format($pros['price'],0,',','.'); ?> VNĐ

										<?php } ?>
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="icon">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="icon">
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				
			</div>

			<!-- load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Xem thêm
				</a>
			</div>
		</div>
	</div>

	<!-- footer -->
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
								Phụ kiện
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
						263B- Hoàng Quốc Việt- Hà Nội
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
						<img src="images/icons/icon-pay-01.png" alt="icon-pay">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="icon-pay">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="icon-pay">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="icon-pay">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="icon-pay">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- link back to colorlib can't be removed. template is licensed under cc by 3.0. -->
					copyright &copy;<script>document.write(new date().getfullyear());</script>
					<!-- link back to colorlib can't be removed. template is licensed under cc by 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- back to top -->
	<div class="btn-back-to-top" id="mybtn">
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
				minimumresultsforsearch: 20,
				dropdownparent: $(this).next('.dropdownselect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/magnificpopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificpopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainclass: 'mfp-fade'
		    });
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventdefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameproduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameproduct, "được thêm vào danh sách yêu thích!", "success");

				$(this).addclass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameproduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameproduct, "is added to wishlist !", "success");

				$(this).addclass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameproduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameproduct, "Được thêm vào giỏ !", "success");
			});
		});

	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new perfectscrollbar(this, {
				wheelspeed: 1,
				scrollingthreshold: 1000,
				wheelpropagation: false,
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