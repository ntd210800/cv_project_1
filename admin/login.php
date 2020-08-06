<link rel="stylesheet" href="./css/login.css">
<link rel="stylesheet" href="css.css">

<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include_once "connect.php";
    if(isset ($_POST['dangnhap'])){
   
    $tai_khoan =$_POST['tai_khoan'];
    $mat_khau =md5  ($_POST['mat_khau']);
    //mã hóa pass
    // $mat_khau =md5($_POST('mat_khau'));
    //kiểm tra đã điền đúng tk,mk chưa
   
    if (!$tai_khoan || !$mat_khau) {
        echo "vui lòng điền tài khoản mật khẩu.<a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //ktra tên đăng nhập
       $query = mysqli_query($con," SELECT * FROM admin WHERE tai_khoan = '$tai_khoan'  and mat_khau = '$mat_khau'");
       if (mysqli_num_rows($query) == 0) {
        $sql="SELECT * from admin";
           echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại"
           ?>
           <a href='javascript: history.go(-1)'>Trở lại</a>;
           <?php

        }else {
            $trangthai= mysqli_fetch_assoc($query);
            if($trangthai['quyen']==0){
                $_SESSION['admin']=$trangthai['quyen'] ;
                $_SESSION['id_admin']=$trangthai['ma_admin'];
             }else{
                 $_SESSION['nhanvien']=$trangthai['quyen'] ;
             }
            if ($trangthai['trang_thai'] == 0) {

            $_SESSION['tai_khoan'] = $tai_khoan;
            echo " xin chao" .$tai_khoan;
            header('Location: index.php');
            }else{
                $_SESSION['canhbao'] = $trangthai['trang_thai'];
                echo " Bạn không đủ quyền hạn để vào trang này";
            }
        }
       
       
       //Lấy mật khẩu trong database ra
       $row = mysqli_fetch_array($query);
    
}
?>
<?php
    
    $sql ="SELECT * from admin";
?>

    <form action="login.php" method="Post">
    <table id="login">
        <h2>Đăng Nhập</h2>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="tai_khoan" ></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="mat_khau"></td>
        </tr>
        <tr>
            
            <td><input type="checkbox" name="chkRemember" id="chkRemember" checked="checked">Nhớ tài khoản</td>
        </tr>
        <tr >
            <td>
            <input type="submit" name="dangnhap" value="Đăng nhập">
            </td>       
        </tr>
    </table>
    </form>
