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
            <h1>Quản lý khách hàng</h1>
            <?php 
                include_once "connect.php";
            ?>
            <?php
                $sql ="SELECT * from khach_hang";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
            ?>
                        <table border="1" width="70%" cellpadding="1" cellspacing="1">
                            <tr>
        
                                <th>Mã kh</th>
                                <th>Họ tên </th>
                                <th>Tài khoản</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Trạng thái</th>
                                <th>Sửa</th>
        
                            </tr>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td> <?php echo $row['ma_kh'];?> </td>
                                    <td> <?php echo $row['ho_ten']; ?></td>
                                    <td> <?php echo $row['tai_khoan'];?></td>
                                    <td> <?php echo $row['dia_chi']; ?></td>
                                    <td> <?php echo $row['sdt'];?></td>
                                    
                                    <?php
                                    if ($row["trang_thai"] == 1) {
                                        echo "<td>
                                    <img src='../admin/image/Lock-on.png' alt='mở'></a>
                                    </td>";
                                    } else {
                                    echo "<td>
                                    <img src='../admin/image/Lock-icon.png' alt='khóa'>
                                    </td>";
                                    } 
                                    ?>
                                
                                 
                                    <td>
                                        <a href="update_kh.php?ma_kh=<?php echo $row['ma_kh'];?>">
                                            <img src="../admin/image/update.png" alt="sua">
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
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