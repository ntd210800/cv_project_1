<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">  
<?php
    SESSION_START();
    include 'connect.php';
    $id= $_GET['ma_admin'];
    $sql1 ="SELECT * from admin where ma_admin=$id";
    $recordset= mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($recordset);
    ?>
    <?php
        if (isset($_POST['submit'])) {
            
            $id =$_POST['ma_admin'];
            $trangthai= $_POST['trangthai'];
            $sql ="UPDATE  admin set trang_thai='$trangthai' where ma_admin=$id AND ma_admin != ". $_SESSION['id_admin'];
            mysqli_query($con,$sql);
            echo $sql;
            header('Location:qly_admin.php');
        }
        ?>
        <form action="update_admin.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
        <table class ="update">
        <tr>
                <td><input type="number" name="ma_admin" value="<?php echo $row['ma_admin'] ?>" readonly></td>
        </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <input type="radio" name="trangthai" value="0" checked ="0">Mở
                    <input type="radio" name="trangthai" value="1">Khóa
                        
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="cập nhập">
                </td>
            </tr>
            </table>
        </form>