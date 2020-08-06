<?php

    include_once "connect.php";
    $ma_kh = $_GET['ma_kh'];
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }

    $sql =" DELETE from khach_hang where ma_kh='$ma_kh'";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($con);
      }
      $sql2="DELETE from.";
    mysqli_close($con);
    header('Location: qly_khachhang.php');