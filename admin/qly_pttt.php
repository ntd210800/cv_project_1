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
            <h1>Thanh toán</h1>
            <?php 
                include_once "connect.php";
            ?>
            <?php
                if (isset($_POST['submit'])) {
                   
                    $ten_pttt =$_POST['ten_pttt'];
                    $trang_thai =$_POST['trang_thai'];
                    
                    $sql ="INSERT into pt_thanh_toan(ten_pttt,trang_thai) 
                    values('$ten_pttt','1') ";
                    mysqli_query($con,$sql);
                }   
            ?>
            <form action="#" method="post" border="1" width="30%">
            <table>
                <tr>
                    <td>Tên phương thức</td>
                    <td><input type="text" name="ten_pttt"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="thêm mới"></td>
                </tr>
            </table>
            </form>
            <?php
                $sql ="SELECT * from pt_thanh_toan";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) > 0 ) {
            ?>
                        <table border="1" width="30%" cellpadding="2" cellspacing="2">
                            <tr>
                                <th>Mã PTTT</th>
                                <th>Tên PTTT</th>
                                <th>Trạng thái</th>
        
                            </tr>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
        
                                    <tr>
                                    <td> <?php echo $row['ma_pttt']; ?></td>
                                    <td> <?php echo $row['ten_pttt'];?> </td>
                                    <?php 
                                if ($row['trang_thai'] == 1) {
                                    echo "<td><a 
                                    href='xl_pttt.php?id=" .$row['ma_pttt'] ."&trangthai=" .$row['trang_thai'] ."' >"
                                       ." <img src='../admin/image/Ok-icon.png' alt='tick'>
                                   </a> </td>";
                                } else {
                                    echo  "<td><a href='xl_pttt.php?id=" .$row['ma_pttt'] ."&trangthai=" .$row['trang_thai'] ."'>"
                                    ."<img src='../admin/image/Lock-icon.png' alt='lock'>
                                   </a></td>";
                            
                                } 

                            ?>
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