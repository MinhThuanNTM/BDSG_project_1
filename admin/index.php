<?php
include "./include/header.php";
include "./include/sidebar.php";
include "./include/function.php";
if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'shop': 
            include "./page/post-list.php";
            break;
        case 'product-list':
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
    include './page/home.php';
}

include "./include/footer.php"
?>