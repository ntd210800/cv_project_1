<?php
    require_once "connect.php";
    $id = $_GET['id'];
    $trang_thai = $_GET['trangthai'];
    if ($trang_thai == 1) {
        $trang_thai =0;
    }else{
        $trang_thai =1;
    }
    $sql = "update pt_van_chuyen set trang_thai = $trang_thai where ma_ptvc = $id";
    mysqli_query($con,$sql);
   echo "<script> history.back(); </script>";?>