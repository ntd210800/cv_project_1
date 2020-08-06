<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Laptop D&D</title>
    <style>
                .right{
            background-color: white;
            height: 480px;
            width: 70%;
            float: left;
            margin-left: 50px;
        }
        .top ul{
            display: inline-block;
            background-color: #ffba75;
            height: 60px;
            width: 210px;
            text-align: center;
            border: 1px solid white;
        }
        .top ul:hover{
            background-color: yellowgreen;
            color: black;
        }
        .top ul:focus{
            background-color: yellowgreen;
            color: black;
        }
        .top ul a{
             display: block;
            padding: 10px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
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
          <div class="profile">
            
                            <?php
                                $page=   $_GET['page'];
                                // Lấy items trong trang
                                $sql = "SELECT * FROM `hoa_don` where trang_thai = $page and ma_kh = $_SESSION[Ma_kh] order by ngay_dat_hang desc  ";
                                   //echo $sql;
                                $result = mysqli_query($conn, $sql);
                            ?>
                    
                    <div class="right">
                            <div class="top">
                                <ul><a href="?page=1">Đang xử lý</a></ul>
                                <ul><a href="?page=2">Đang giao hàng</a></ul>
                                <ul><a href="?page=3">Thành công</a></ul>
                            </div>
                <div class="mid">
                            
                    <table style="text-align: center; color: green;">
                    <tr>
                        
                    </tr>
                    <tr>
                        <td style="width: 80px;">Mã hóa đơn</td>
                        <td style="width: 120px;">Ngày tạo đơn</td> 
                        <td style="width: 150px;">Họ tên người nhận</td>
                        <td style="width: 150px;">Địa chỉ người nhận</td>
                        <td style="width: 145px;">Số điện thoại </td>
                        <td style="width: 150px;">Tổng tiền</td>
                        
                    </tr>
                    <?php
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>"  ;
                        echo "<td>" ;
                            echo '<a href="show_hdct.php?id='  .$row['ma_hd'].'">'.$row['ma_hd'].'</a>';  
                        echo "</td>";
                        echo "<td>" .$row['ngay_dat_hang'] ."</td>";
                        echo "<td>" .$row['ho_ten'] ."</td>";
                        echo "<td>" .$row['diachi_kh'] ."</td>";    
                        echo "<td>" .$row['sdt_kh'] ."</td>";
                        echo "<td>" .$row['tong_tien'] ."</td>";
                        
                        echo "</tr>";
                        
                        }
                        ?>
                    </table>
                
                            </div>
                            
                    
                    </div>
                    
                </div>
                
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