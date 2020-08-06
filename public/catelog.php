<h3 style="text-transform: uppercase; padding: 5px">Nhãn Hiệu Laptop</h3>
<ul class="no-list-style catelog">	
	<?php
		$sql = "SELECT * FROM `nhan_hieu`";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href='index.php?idcat=". $row["ma_nh"] ."'><li>".$row["ten_nhan_hieu"]."</li></a>";
			}
		} else {
			echo "-----";
		}		
	?>
</ul>