 <h4 style="font-weight: 500; text-transform: uppercase;" >Các sản phẩm hiện có </h4>

 <form class="form-inline float-right" method="POST" action="sanpham.php">
 	<input type="text" class="form-control"  name="tk_productAD"  placeholder="Tìm kiếm sản phẩm">
 	<div class="input-group-append">
 		<?php if(isset($_POST['tk_productAD'])) : ?>
 			<a href="sanpham.php" class="ml-2 mt-2 mr-2 text-info">Trở về</a>
		<?php endif; ?>
 		<button class="btn btn-primary" type="submit">Tìm</button>
 	</div>
 </form>