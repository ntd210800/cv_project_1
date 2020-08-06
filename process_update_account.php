<?php 
$ma_khach_hang  = $_SESSION["Ma_kh"];
$ten_khach_hang = $_SESSION["Ten_kh"];
$email 			= $_SESSION["email"];
$so_dien_thoai 	= $_SESSION["Dien_thoai"];
$dia_chi		= $_SESSION["Dia_chi"];



require_once 'public/connect.php';

$sql = "UPDATE khach_hang SET ho_ten = '$ten_khach_hang', email = '$email',sdt= '$so_dien_thoai', dia_chi= '$dia_chi' WHERE ma_kh = '$ma_khach_hang'";
mysqli_query($conn,$sql);
// print_r($sql);
// die();
mysqli_close($conn);

header("Location:account.php");
?>	