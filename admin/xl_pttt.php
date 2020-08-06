<?php
    require_once "connect.php";
    $id = $_GET['id'];
    $trang_thai = $_GET['trangthai'];
    if ($trang_thai == 1) {
        $trang_thai =0;
    }else{
        $trang_thai =1;
    }
    $sql = "update pt_thanh_toan set trang_thai = $trang_thai where ma_pttt = $id";
    mysqli_query($con,$sql);
   echo "<script> history.back(); </script>";?>