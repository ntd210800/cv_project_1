<?php
include_once "public/connect.php";
    $ten = $_POST['txtname'];
    $dt = $_POST['txtdt'];
    $dc = $_POST['txtdc'];
    $MaKH = $_SESSION['Ma_kh'];
    $sql = "UPDATE khach_hang SET ho_ten = '$ten', dia_chi = '$dc', sdt = '$dt' where ma_kh = $MaKH ";
    $re = mysqli_query($conn,$sql);
    echo $sql;
    if (isset($re)) {
        echo '<script> alert("Thay đổi thông tin thành công"); location.href="profile_kh.php"; </script>';
    }
?>