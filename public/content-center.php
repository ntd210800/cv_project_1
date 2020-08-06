<div class="box-search">
	<h1>TÌM KIẾM SẢN PHẨM</h1>
	<form action="#" method="GET" style="float: left;">
		Mô tả sản phẩm:
		<input id="search_infor" name="search_infor" type="text" placeholder="Tìm kiếm" value="<?php echo isset($_GET["search_infor"])?$_GET["search_infor"]:"" ?>">
		<!-- Giá tối thiểu:
		<input id="search_price_min" name="search_price_min" type="text" value="<?php echo isset($_GET["search_price_min"])?$_GET["search_price_min"]:5000 ?>">
		Giá tối đa:
		<input id="search_price_max" name="search_price_max" type="text" value="<?php echo isset($_GET["search_price_max"])?$_GET["search_price_max"]:15000 ?>"> -->
		<input type="submit" name="submit" value="Tìm kiếm">
	</form>
</div>
<?php
	$condition = "";
	if (isset($_GET["idcat"])) {
		$condition = " WHERE ma_nh = ". $_GET["idcat"];
	}

	// Tìm kiếm cơ bản
	if (isset($_GET["search"])) {
		$condition = " WHERE ten_sp LIKE '%". $_GET["search"] ."%' 
			OR mo_ta LIKE '%". $_GET["search"] ."%' 
			OR ma_nh LIKE '%". $_GET["search"] ."%'";
	}

	// Tìm kiếm nâng cao
	if(isset($_GET["search_infor"]) || isset($_GET["search_price_min"]) || isset($_GET["search_price_max"])){
		$condition = " WHERE 1=1 ";
		if (isset($_GET["search_infor"])) {
			$condition .= " AND ten_sp LIKE '%". $_GET["search_infor"] ."%' 
			OR mo_ta LIKE '%". $_GET["search_infor"] ."%' 
			OR ma_nh LIKE '%". $_GET["search_infor"] ."%'";
		}
		// if (isset($_GET["search_price_min"])) {
		// 	$condition .= " AND gia >= " . $_GET["search_price_min"];
		// }
		// if (isset($_GET["search_price_max"])) {
		// 	$condition .= " AND gia <= " . $_GET["search_price_max"];
		// }
		}

	// 1. Lệnh truy vấn 
	$sql = "SELECT * FROM `san_pham`" . $condition;
	// 2. Truy vấn
	$result = mysqli_query($conn, $sql);

	// 3. Duyệt
	if (mysqli_num_rows($result)) {
		while ($row = mysqli_fetch_assoc($result)) {
			// Sản phẩm
			echo "<div class='product-title'>";
			echo "<a href='product_detail.php?prodId=".$row["ma_sp"]."'><img width='290px' height='290px' src='public/images/".$row["hinh_anh"]."' alt='hp123'></a> <br>";
			echo "<h3>".$row["ten_sp"]."</h3>";
			echo "<div class='box-desc'>".$row["mo_ta"]."</div>";			
			echo "<a href='product_detail.php?prodId=".$row["ma_sp"]."'> <div class='box-price'>".formatCurrency($row["gia"])."</div></a>";
			echo "</div>";
		}
	}
	

?>