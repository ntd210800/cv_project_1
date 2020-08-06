<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<header>
        <?php
            include_once "header.php";
        ?>
    </header>
    <nav>
        <?php
            include_once "sidebar.php";
        ?>
    </nav>
        <div class="content">
            <h1>Quản lý hình ảnh</h1>
			<?php include "connect.php"; ?>
				<?php
			if (isset($_POST['submit'])) {
				$ten_anh= $_POST['ten_anh'];
				$filename=$_FILES['hinhanh']['name'];
				$tempname = $_FILES['hinhanh']['tmp_name'];
				move_uploaded_file($tempname,'../public/images/'.$filename);
				$sql = "INSERT INTO hinh_anh(ten_file,hinh_anh) values('$ten_anh','$filename')";
				mysqli_query($con,$sql);
			
				header('Location:qly_hinhanh.php');
			}
				
			?>
            <form action="qly_hinhanh.php" method="post" enctype="multipart/form-data">
			<table>
			<tr>
			<td>Tên ảnh</td>
                    <td><input type="text" name="ten_anh" ></td>
                </tr>
			<tr>
                    <td>Ảnh minh họa</td>
					<td colspan="5">
                        <img style="width:100px" src='../public/images/<?php echo $row['hinh_anh']; ?>'>
                        <input multiple="multiple" type="file" name="hinhanh[]" id="hinhanh" value="<?php echo $row['hinh_anh']; ?>">
                    </td>
            </tr>
			<td>
                <!-- <input type="file" name="hinhanh" id="hinhanh"> -->
                <input type="submit" value="Tải lên" name="submit">
				</td>
				</table>
            </form>
			<?php
			//mở kết nối
				
				//mở csdl
				$sql="SELECT * from hinh_anh";
				$result = mysqli_query($con,$sql);
				
				?>
			<table border="1" width="50%" cellpadding="6" cellspacing="2">
				<tr>
					<th>Mã ảnh</th>
					<th>Tên ảnh</th>
					<th>Ảnh minh họa</th>
				</tr>
				<?php
					while ($row =mysqli_fetch_assoc($result)) {
						
				?>
				<tr>
					<td><?php echo $row['ma_ha'];?></td>
					<td><?php echo $row['ten_file'];?></td>
					<td style='text-align: center'><img width='50' height='50' src='../public/images/<?php echo $row["hinh_anh"];?>'
					alt='Lỗi hiển thị ảnh'></td>
						
				</tr>
				<?php		
					}
				?>

			</table>
			
        </div>
    <footer>
        <?php
            include_once "footer.php";
        ?>
    </footer>