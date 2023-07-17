<?php
include "./include/header.php";
include "./include/side-bar.php";
include "./include/function.php";
if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'shop': 
            include "./page/post-list.php";
            break;
        case 'shopping-cart':
            include "./page/product-list.php";
            break;
        case 'sign-in':
            include "./page/sign-in.php";
            break;
        case 'user':
            include "./page/user.php";
            break;
        default:
            include './page/home.php';
    }
}else{
    include './page/home.php'
}

include "./include/footer.php"
?>