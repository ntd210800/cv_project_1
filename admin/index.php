<?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <header>
        <?php
            include_once "header.php";
        ?>
    </header>
    <nav>
        <?php
            include_once "sidebar.php";
        ?>
    </nav>
        <div class="content">
            <img src="../public/image/product (2).jpg" alt="hihi" width="60%" height="150%">
        </div>
    <footer>
        <?php
            include_once "footer.php";
        ?>
    </footer>
</body>
</html>
