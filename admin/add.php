<?php
   include_once "connect.php";
   
        $tai_khoan=$_POST['tai_khoan'];
        $mat_khau=$_POST['mat_khau'];
  
    $sql = "INSERT INTO admin (tai_khoan,mat_khau)
    VALUES ('$tai_khoan','$mat_khau')";
 
    mysqli_query($con, $sql);
    header('location:qly_admin.php');
    ?>
    