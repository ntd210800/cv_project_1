<div class="content-center" style="color: white">
	<!-- Mở kết nối tới csdl -->
	<?php include_once 'connect.php';?>
	
	<div style="width: 60%; float: left; line-height: 100px">
		<h1 style="text-transform: uppercase;"><a href="index.php">Hệ thống laptop shopd&d</a></h1>
	</div>
	<div style="width: 40%; float: left; line-height: 100px">
		<!-- Form tìm kiếm -->
		<form action="#" method="GET" style="width: 100%; float: right; height: 50px; padding: 0px; margin: 0px; line-height: 50px; margin-right: 15px; text-align: right;">
			<input id="search" name="search" type="text" placeholder="Tìm kiếm">
			<input type="submit" name="submit" value="Tìm kiếm">
		</form>

		<!-- Tài khoản đăng nhập / giỏ hàng -->
		<div style="width: 100%;float: right; height: 50px; padding: 0px; margin: 0px; line-height: 50px; text-align: right; vertical-align: middle;">
			<a style="float: right" href="shopping_cart.php"><img src="public/images/ic_cart.png" alt="Giỏ hàng"></a>
			<?php
				session_start();
				if (isset($_SESSION["username"])) {
					echo "<a href='bill.php?page=1'>Xin chào " . $_SESSION["username"] .'</a>' 
					.  "(<a href='public/logout.php'>Đăng xuất</a>)";	
				} else {		
			?>
				<div style="height: 50px; line-height: 50px; float: right;">
					<a href="customer_login.php">Đăng nhập</a> | 
					<a href="customer_register.php">Đăng ký</a>	
				</div>	
			<?php } ?>
		</div>
	</div>
</div>
