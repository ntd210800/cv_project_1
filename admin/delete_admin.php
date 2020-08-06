<?php

    include_once "connect.php";
    $ma_admin = $_GET['ma_admin'];
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
      }

    $sql =" DELETE from admin where ma_admin='$ma_admin'";
    if (mysqli_query($con, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($con);
      }
    mysqli_close($con);
    header('Location: qly_admin.php');