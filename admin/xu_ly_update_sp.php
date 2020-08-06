<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/content.css">  
<?php
        include_once "connect.php";
        $id=$_POST['txtid'];
        $ten=$_POST['txtten'];
        $gia=$_POST['txtgia'];
        $mo_ta=$_POST['txtmota'];
        $filename=$_FILES['hinhanh']['name'];
        $tempname = $_FILES['hinhanh']['tmp_name'];
        move_uploaded_file($tempname,'../public/image'.$filename);
        $trang_thai =$_POST['txttrangthai'];
        $loai=$_POST['txtloaisp'];
        $thuonghieu=$_POST['txtthuonghieu'];
        $sql= "UPDATE san_pham set 
        ten_sp='$ten',gia='$gia',mo_ta='$mo_ta',hinh_anh ='$filename',trang_thai='$trang_thai',ma_lsp='$loai',ma_nh='$thuonghieu'
        where ma_sp=$id";
        mysqli_query($con,$sql);
        mysqli_close($con);
        header('Location:qly_sanpham.php');
    ?>