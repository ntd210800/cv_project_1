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
            <h1>Admin</h1>
        
            <?php 
            
                include_once "connect.php";
            ?>
            <?php
                   if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_POST['them'])) {
                    $ho_ten =$_POST['ho_ten'];
                    $tai_khoan =$_POST['tai_khoan'];
                    $mat_khau =$_POST['mat_khau'];
                    //mã hóa pass
                    $mat_khau =md5($_POST['mat_khau']);
                    
                   
                    
                    $sql ="INSERT into admin(ho_ten,tai_khoan,mat_khau,trang_thai) 
                    values('$ho_ten','$tai_khoan','$mat_khau','1') ";
                    mysqli_query($con,$sql);
                }   
            ?>
                <form action="qly_admin.php" method="post" border="1" width="30%">
                <table>
                    
                    <tr>
                        
                        <td>Họ tên</td>
                        <td><input type="text" name="ho_ten"></td>
                    </tr>
                    <tr>
                    
                        <td>Tài khoản</td>
                        <td><input type="text" name="tai_khoan"></td>
                    </tr>
                    <tr>
                    
                        <td>Mật khẩu</td>
                        <td><input type="password" name="mat_khau"></td>
                    </tr>
                    <tr>
                    
                        <td>Nhập lại mật khẩu</td>
                        <td><input type="password" name="matkhau"></td>
                    </tr>
                    
                    <tr>
                        <td><input type="submit" name="them" value="Tạo"></td>
                    </tr>
                </table>
                </form>
            <?php
                $sql ="SELECT * from admin";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
            ?>
                        <table border="1" width="84%" cellpadding="2" cellspacing="2">
                            <tr>
                                <th>Mã AD</th>
                                <th>Họ tên</th>
                                <th>Tài khoản</th>
                                <th>Trạng thái</th>
                                <th>Sửa</th>
        
                            </tr>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
        
                                    <tr>
                                    <td> <?php echo $row['ma_admin']; ?></td>
                                    <td> <?php echo $row['ho_ten']; ?></td>
                                    <td> <?php echo $row['tai_khoan'];?> </td>
                                    <?php
                                    if ($row["trang_thai"] == 0) {
                                    echo "<td>
                                        <img src='../admin/image/Ok-icon.png' alt='mở'>
                                    </td>";
                                    } else {
                                    echo "<td>
                                    <img src='../admin/image/Lock-icon.png' alt='khóa'>
                                    </td>";
                                    } 
                                ?>
                                    
                                    <td><a href="update_admin.php?ma_admin=<?php echo $row['ma_admin'];?>">
                                            <img src="../admin/image/update.png" alt="xóa">
                                        </a>
                                    </td>
                            <?php
                                }
                            ?>
                        </table>
            <?php
                }
                mysqli_close($con);
            ?>
           
        </div>
        
    <footer>
        <?php
            include_once "footer.php";
        ?>
    </footer>