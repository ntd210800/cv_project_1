<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'shopd&d';

// Mở kết nối
$con = mysqli_connect($server, $username, $password, $database);

// Kiểm tra lỗi
if (!$con) {
	die("Kết nối thất bại: " . mysqli_connect_error());
}