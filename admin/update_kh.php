<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">  
<?php
    include 'connect.php';
    $id= $_GET['ma_kh'];
    $sql1 ="SELECT * from khach_hang where ma_kh=$id";
    $recordset= mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($recordset);
    ?>
    <?php
        if (isset($_POST['submit'])) {
            
            $id =$_POST['ma_kh'];
            $trangthai= $_POST['trangthai'];
            $sql ="UPDATE  khach_hang set trang_thai='$trangthai' where ma_kh=$id";
            mysqli_query($con,$sql);
            echo $sql;
            header('Location:qly_khachhang.php');
        }
        ?>
        <form action="update_kh.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td><input type="hidden" name="ma_kh" value="<?php echo $row['ma_kh'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <input type="radio" name="trangthai" value="1" checked ="1">Mở
                    <input type="radio" name="trangthai" value="2">Khóa
                        
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="cập nhập">
                </td>
            </tr>
            </table>
        </form>