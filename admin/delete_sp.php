<?php

    include_once "connect.php";
    $ma_sp = $_GET['ma_sp'];
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }

    $sql =" DELETE from san_pham where ma_sp='$ma_sp'";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($con);
      }
    mysqli_close($con);
    header('Location: qly_sanpham.php');