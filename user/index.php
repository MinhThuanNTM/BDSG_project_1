<?php
include "./include/header.php";
include "./include/function.php";
if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'shop': 
            include "./page/shop.php";
            break;
        case 'shopping-cart':
            include "./page/shopping-cart.php";
            break;
        case 'sign-in':
            include "./page/checkout.php";
            break;
        case 'user-setting':
            include "./page/user-setting.php";
            break;
        default:
            include './page/home.php';
    }
}else{
    include './page/home.php'
}

include "./include/footer.php"
?>