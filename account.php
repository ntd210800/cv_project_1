<?php
    include_once "public/connect.php";
    if (isset( $_SESSION['loggedin'])==true) {
         $MaKH = $_SESSION['Ma_kh'] ;
       $sql = "select * from khach_hang where ma_kh = $MaKH";
     
       $re = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        .product-show a:hover{
        color: red;
        }
        .profile {
           
            height: 500px;
            width: 1110px;
            float: left;
            margin-top: 20px;
        }
        .content{
            height: 600px;
        }
        
        .left{
            background-color: wheat;
            width: 20%;
            height: auto;
            float: left;
        }
        .account{
            text-align: center;
          
        }
        .account img{
            border-radius: 50%;    
        }
        .list {
            margin-left: 40px;
            font-size: 25px;
            padding-bottom: 10px;
        }
        .list a{
            font-size: 15px;
        }
        .right{
            background-color: wheat;
            height: 500px;
            width: 70%;
            float: left;
            margin-left: 50px;
        }
        table{
            margin-top: 10px;
        }
        table th{
            width: 200px;
            padding-right: 20px;
            height: 50px;
            text-align: right;
        }
        h1 {
            font-size: 25px;
            margin: 15px;
        }
        p {
            font-size: 15px;
            margin: 15px;
        }
        table td{
            width: 10000px;
            text-align: center;
        }
        table td input{
            height: 30px;
            width: 300px;
            border-radius: 10px;
            border: 1px solid black;
            margin-left: 20px;
        }
        table th{
            width: 200px;
        }
    </style>
            <link rel="stylesheet" href="icon/css/all.css">
</head>
<script type="text/javascript">
 
    function testConfirmDialog()  {
    
    var result = confirm("Bạn muốn thực hiện thay đổi thông tin?");

    if(result)  {
        window.location.href="profile_kh_insert.php";
    } else {
        window.location.reload();
    }
    }
 

</script>
<body>
    <header>
        <?php
            include_once 'public/header.php';
        ?>
    </header>
        <!--Main content-->
        <div class="content">
           
            <div>
                <div style="margin-top: -5px;">
                    <?php
                        include_once 'public/catelog.php';
                    ?>
                </div>
            </div>

           <div class="profile">
                <div class="left">
                    <?php
                    
                   
                        echo ' <div class="account">';
                       
                        echo   ' <img src="img/khach_hang/' .$_SESSION['hinh_anh']  .'" alt="" width="70px" height="70px">';
                        echo '<p>'.$_SESSION['Tai_khoan'] .'</p>' .'<hr><br>';
                        echo ' </div>';
                        echo ' <div class="list">';
                        echo '<a href="profile_kh.php">'.'<i class="far fa-user-circle"></i> Tài khoản của tôi </a><br>';
                        echo '<a href="don_hang.php?page=0"><i class="fas fa-receipt "></i> Đơn hàng</a><br>';
                        // echo '<a href="repassword.php"> Đổi mật khẩu</a>';
                        // echo   ' <a href="#"><i class="far fa-address-card"></i> Đổi địa chỉ</a><br>';
                        echo    '<a href="repassword.php"><i class="fas fa-key"></i> Đổi mật khẩu</a>';
                        echo ' </div>';
                    ?>
                    
                </div>
                <div class="right">
                        <h1>Hồ sơ của tôi</h1>
                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                        <hr>
                        <form action="profile_kh_insert.php" method="post">
                    <table  > 
                        <?php
                          if ($row = mysqli_fetch_array($re)) {
                       ?>
                        <tr>
                                <th>Tài khoản</th>
                                <td><?php echo $_SESSION['username']  ?></td>
                        </tr>
                        <tr>
                                <th>Tên</th>
                                <td><input type="text" name="txtname" id="" value="<?php echo $row['ho_ten']  ?>"></td>
                        </tr>
                        <tr>
                                <th>Email </th>
                                <td><?php echo $_SESSION['email']  ?></td>
                        </tr>   
                        <tr>
                                <th>Điện thoại</th>
                                <td><input type="text" maxlength="11" value="<?php echo $_SESSION['Dien_thoai']   ?>" name="txtdt"></td>
                        </tr>
                        <tr>
                                <th>Địa chỉ </th>
                                <td><input type="text" name="txtdc" id="" value="<?php echo $_SESSION['Dia_chi']  ?>" ></td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td> <button onclick="testConfirmDialog()">   Thay đổi thông tin </button> </td>
                        </tr>
                        <?php   } ?>
                    </table>
                   
                    </form>
                </div>
                           
           </div>
            
       </div>
       <!--Chân trang`-->
       
            <div style="margin-top: 10px;">
                <?php
                    include_once 'public/footer.php';
                ?>
            </div>
       <?php
    }else{
        echo '<script> alert("Bạn chưa đăng nhập"); location.href="login_form.php"</script>';
    }
       ?>
      
</body>
</html>