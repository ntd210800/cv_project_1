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
            <h1>Quản lý hóa đơn</h1>
            <?php 
                include_once "connect.php";
                if (isset($_POST['submit'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $diachi_kh =$_POST['diachi_kh'];
                    $sdt_kh = $_POST['sdt_kh'];
                    $ngay_dat = $_POST['ngay_dat'];
                    $tong_tien =$_POST['tong_tien'];
                    $ma_kh =$_POST['ma_kh'];
                    $ma_ptvc =$_POST['ma_ptvc'];
                    $ma_pttt =$_POST['ma_pttt'];
                    $trang_thai =$_POST['trang_thai'];
                    
                    $sql ="INSERT into hoa_don(ho_ten,diachi_kh,sdt_kh,tong_tien,trang_thai) 
                    values('$ho_ten','$diachi_kh','$sdt_kh','$ngay_dat',0) ";
                    mysqli_query($con,$sql);
                }   
            ?>
            <?php
                include_once "timkiem.php";
                
                $sql ="SELECT hoa_don.ma_hd, hoa_don.ho_ten, hoa_don.diachi_kh, hoa_don.sdt_kh,hoa_don.ngay_dat_hang,
                hoa_don.tong_tien, khach_hang.ma_kh, pt_thanh_toan.ten_pttt, pt_van_chuyen.ten_ptvc, hoa_don.trang_thai 
                from ((hoa_don INNER JOIN pt_van_chuyen ON hoa_don.ma_ptvc = pt_van_chuyen.ma_ptvc)
                INNER JOIN pt_thanh_toan ON hoa_don.ma_pttt = pt_thanh_toan.ma_pttt)
                INNER JOIN khach_hang ON hoa_don.ma_kh = khach_hang.ma_kh";
              
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
            ?>
                        <table border="1" width="84%" cellpadding="2" cellspacing="1">
                            <tr>
        
                                <th>Mã hóa đơn</th>
                                <th>Mã kh</th>
                                <th>Họ tên </th>
                                <th>Địa chỉ kh</th>
                                <th>SĐT khách</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức thanh toán</th>
                                <th>Phương thức vận chuyển</th>
                                <th>Trạng thái</th>
                                <th>Sửa</th>
        
                            </tr>
                            <?php
                            if (isset($_GET['search'])) {
                                $output ='';
                                $search = $_GET['search'];
                                $search = preg_replace("#[^0-9a-z]i#","", $search);
                                $query = mysqli_query($con,"SELECT * from hoa_don where ngay_dat_hang LIKE '%$search%'
                    or trang_thai like '%$search%' or ho_ten like '%$search%' order by ma_hd DESC,trang_thai desc");
                                $count = mysqli_num_rows($query);
                                if($count == 0){
                                    $search = "There was no search results!";
                                
                                  }else{
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                    <td> <?php echo $row['ma_hd'];?> </td>
                                    <td> <?php echo $row['ma_kh']; ?></td>
                                    <td> <?php echo $row['ho_ten']; ?></td>
                                    <td> <?php echo $row['diachi_kh'];?></td>
                                    <td> <?php echo $row['sdt_kh']; ?></td>
                                    <td> <?php echo $row['ngay_dat_hang']; ?></td>
                                    <td> <?php echo $row['tong_tien']; ?></td>
                                    <td> <?php echo $row['ten_pttt']; ?></td>
                                    <td> <?php echo $row['ten_ptvc']; ?></td>
                                    <?php
                                        if ($row["trang_thai"] == 0) 
                                            echo "<td>
                                        <img src='../admin/image/loading-icon.png' alt='đang xử lý'></a>
                                        </td>";
                                        else if ($row["trang_thai"]== 1)
                                        echo "<td>
                                        <img src='../admin/image/shipping.png' alt='đang giao hàng'>
                                        </td>";
                                         else 
                                            echo "<td>
                                            <img src='../admin/image/file-complete-icon.png' alt='hoàn thành'>
                                            </td>";
                                        
                                    ?>
                                    
                                    <td>
                                        <a href="xuly_hoadon.php?ma_hd=<?php echo $row['ma_hd']?>">
                                            <img src="../admin/image/update.png" alt="sửa">
                                        </a>
                                    </td>
                                <?php
                                    }}}else{
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                            <td> <?php echo $row['ma_hd'];?> </td>
                                            <td> <?php echo $row['ma_kh']; ?></td>
                                            <td> <?php echo $row['ho_ten']; ?></td>
                                            <td> <?php echo $row['diachi_kh'];?></td>
                                            <td> <?php echo $row['sdt_kh']; ?></td>
                                            <td> <?php echo $row['ngay_dat_hang']; ?></td>
                                            <td> <?php echo $row['tong_tien']; ?></td>
                                            <td> <?php echo $row['ten_pttt']; ?></td>
                                            <td> <?php echo $row['ten_ptvc']; ?></td>
                                            <?php
                                                if ($row["trang_thai"] == 1) 
                                                    echo "<td>
                                                <img src='../admin/image/loading-icon.png' alt='đang xử lý'></a>
                                                </td>";
                                                else if ($row["trang_thai"]== 2)
                                                echo "<td>
                                                <img src='../admin/image/shipping.png' alt='đang giao hàng'>
                                                </td>";
                                                 else 
                                                    echo "<td>
                                                    <img src='../admin/image/file-complete-icon.png' alt='hoàn thành'>
                                                    </td>";
                                                
                                            ?>
                                            
                                            <td>
                                                <a href="xuly_hoadon.php?ma_hd=<?php echo $row['ma_hd']?>">
                                                    <img src="../admin/image/update.png" alt="sửa">
                                                </a>
                                            </td>
                                        <?php
                                            }}
                                ?>
                            
                        </table>
            <?php
                }
            ?>
        
        </div>
    <footer>
        <?php
            include_once "footer.php";
        ?>
    </footer>