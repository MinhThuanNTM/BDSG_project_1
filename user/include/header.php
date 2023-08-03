<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shop Thời Trang Việt Nam</title>
<link rel="stylesheet" href="css/blog.css">
<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="css/chitiet.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/shopping-cart.css">
<link rel="stylesheet" href="css/blog_detail.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- <link rel="stylesheet" href="icon/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

<!-- ---bootstrap--- -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
</head>

<body>
    <?php
    ob_start();
    session_start();
    ?>
    <header>
        <div class="menu-index">
            <ul>
                <li>
                    <a href="?page=home">
                        <img src="img/logoback.png" alt="" width="118px" height="33px">
                    </a>
                </li>
                <li>
                    <a href="?page=home">TRANG CHỦ</a>
                </li>
                <li>
                    <a href="?page=shop">NAM</a>
                </li>
                <li>
                    <a href="?page=shop">NỮ</a>
                </li>
                <li>
                    <a href="#">NEW</a>
                </li>
                <li>
                    <a href="#">BEST</a>
                </li>
                <li>
                    <a href="#">SALE</a>
                </li>

                <li>
                    <a href="?page=Log-in&form=true">Đăng Nhập</a>
                    <a href="#">|</a>
                    <a href="?page=Log-in&form=false">Đăng Ký</a>
                    <a href="#"><i class="fa-regular fa-user"></i></a>
                    <a href="?page=shopping-cart"><i class="fa-solid fa-cart-shopping"></i></i></a>
                </li>

            </ul>
        </div>
    </header>