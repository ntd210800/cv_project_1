<?php 

if (!isset($_SESSION['Trang_thai']) || $_SESSION['Trang_thai']!=0) {
	session_destroy();
	header("location:login.php?error=Tài Khoản Của Bạn Bị Khóa ");
	exit();
}