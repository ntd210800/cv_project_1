<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laptop D&D</title>
	<link rel="stylesheet" href="css/main_style.css">
</head>
<body>
	<!-- Header -->	
	<header><?php require_once 'public/header.php';?></header>

	<!-- Body -->
	<div class="content-center main-body">
		<!-- Danh mục -->
		<div style="width: 20%; float:left; overflow: hidden; box-sizing: border-box;">
			<?php include_once 'public/catelog.php';?>
		</div>
		<!-- Nội dung -->
		<div style="width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px">
            <div style="width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px">
                <a href="account.php">Tài khoản của tôi</a>
            </div>
            <div style= "width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px">
                <a href="bill.php?page=1">Lịch sử đặt hàng</a>
            </div>
            <div style="width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px">
                <a href="new_pass.php">Đổi mật khẩu</a>
            </div>
		</div>
	</div>
	
	<!-- Footer -->
	<footer>
		<div class="content-center">
			<?php include_once 'public/footer.php';?>
		</div>
	</footer>
</body>
</html>