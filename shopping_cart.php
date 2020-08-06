<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laptop D&D</title>
	<link rel="stylesheet" href="css/main_style.css">
	<script type="text/javascript" src="js/main_script.js"></script>
	<style type="text/css">
		table{
			text-align: center;
		}
		table input{
			text-align: right;
		}
	</style>
</head>
<body> 
	<!-- Header -->	
	<header><?php require_once 'public/header.php';?></header>

	<!-- Body -->
	<div class="content-center main-body">
		<!-- Giỏ hàng -->
		<h1>Giỏ Hàng</h1>		
		<?php
		if (!empty($_SESSION["cart"])) {
			echo "<hr>Số sản phẩm trong giỏ hàng là: " . count($_SESSION["cart"]);
			$arrCart = $_SESSION["cart"]; // Biến mảng (từ session) chứa các sản phẩm trong giỏ hàng
			
			$item = array(); // Mảng chứa ID sản phẩm có trong giỏ hàng
			foreach ($arrCart as $key => $value) {
				$item[] = $key;
			}

			$paramIN = implode(",", $item);
			$sql = "SELECT * FROM `san_pham` WHERE ma_sp IN (".$paramIN.")"; // Lấy thông tin các sản phẩm trong giỏ hàng
			$result = mysqli_query($conn, $sql);
			echo "<br>";
		?>
			<form action="shopping_update.php" method="post">
			<!-- In bảng dữ liệu -->
			<table border="1" width="100%">
				<tr>
					<th>Mã</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
					<th>Xóa</th>
				</tr>
		<?php
			// Duyệt in dòng dữ liệu
			$totalBill = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td width='15'>".$row["ma_sp"]."</td>";
				echo "<td>".$row["ten_sp"]."</td>";
				echo "<td style='text-align: center'><img width='50' height='50' src='public/images/".$row["hinh_anh"]."' alt='Lỗi hiển thị ảnh'></td>";
				// Cài đặt số lượng sản phẩm tối thiểu là 1
				echo "<td class='box-num-count'><input type='number' name='soluong[".$row["ma_sp"]."]' min='1' max='10' value=".$arrCart[$row["ma_sp"]]."></td>";
				echo "<td>".formatCurrency($row["gia"])."</td>";
				$totalBill += ($arrCart[$row["ma_sp"]] * $row["gia"]);
				echo "<td>".formatCurrency($arrCart[$row["ma_sp"]] * $row["gia"])."</td>";
				echo "<td style='width: 50px; text-align: center;'><a href='shopping_remove.php?prodId=".$row["ma_sp"]."'><img src='public/images/ic_delete.png' alt='Xóa'></a></td>";
				echo "</tr>";
			}

			$_SESSION["totalBill"] = $totalBill; // Lưu dữ liệu tổng tiền
		?>
			<tr>
				<td colspan="7" class="box-num-count">
					<span style="font-weight: bold;">Tổng giá trị đơn hàng: <?php echo formatCurrency($totalBill);?></span>
					<input type="submit" name="submit" value="Cập nhật giỏ hàng">					
				</td>
			</tr>			
			</table>
			</form>
		<?php
			// Kiểm tra nếu đã đăng nhập thì hiển thị nút THANH TOÁN >< hiển thị nút yêu cầu ĐĂNG NHẬP
			if (isset($_SESSION["username"])) {
		?>
			<a href="shopping_payment.php" style="float: right; margin-top: 5px;"><button>Thanh toán</button></a>
		<?php
			} else {			
		?>
			<a href="customer_login.php" style="float: right; margin-top: 5px"><button>Đăng nhập để mua hàng</button></a>
		<?php
			}
		?>	
		<?php
			} else {
				echo' <script> alert("Giỏ hàng rỗng "); </script>';
				echo "Không có sản phẩm trong GIỎ HÀNG!";
			}
		?>		
	</div>
	
	<!-- Footer -->
	<footer>
		<div class="content-center">
			<?php include_once 'public/footer.php';?>
		</div>
	</footer>
</body>
</html>