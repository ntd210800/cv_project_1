<link rel="stylesheet" href="header.css">
<?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
    if(!isset($_SESSION['tai_khoan'])){
        header ("location:login.php");
    }
?>
<div id="header">
    <a href="index.php"><h2>Shop Laptop</h2></a>
    <div class="login">
    <?php 
            if(isset($_SESSION['tai_khoan'])){
                echo"<div class='username'>";
                echo "Xin chào: ". $_SESSION['tai_khoan'];
                echo"</div>";
            }
        
        ?>
        </div>
        <div>
        <a href="logout.php">
        <img src="../admin/image/off.png" alt="logout">
        </a>
        </div>
</div>
        