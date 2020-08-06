<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">  
    <?php
        include 'connect.php';
        if (isset($_GET['ma_hd'])) {
            $ma = $_GET['ma_hd'];
        } else {
            $ma = "";
        }
        $sql1 ="SELECT * from hoa_don where ma_hd=$ma";
        $recordset= mysqli_query($con,$sql1);
        $row = mysqli_fetch_assoc($recordset);
        ?>
    <?php
        if (isset($_POST['button'])) {
            
            $id =$_POST['ma_hd'];
            $trangthai= $_POST['trangthai'];
            $sql ="UPDATE  hoa_don set trang_thai='$trangthai' where ma_hd=$id";
            mysqli_query($con,$sql);
             header('Location:qly_hoadon.php');
        }
        ?>
        <form action="xuly_hoadon.php?ma=<?php echo $ma;?>" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td><input type="hidden" name="ma_hd" value="<?php echo $row['ma_hd'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <input type="radio" name="trangthai" value="1" checked ="1">Đang xử lý
                    <input type="radio" name="trangthai" value="2">Đang giao hàng
                    <input type="radio" name="trangthai" value="3">Hoàn thành
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="button" value="cập nhập">
                </td>
            </tr>
            </table>
        </form>