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
        case 'edit-product':
            include "./page/edit-product.php";
            break;
        case 'order-list':
            include "./page/order-list.html";
            break;
        case 'user':
            include "./page/user.php";
            break;
        case 'add-product':
            include "./page/add-product.php";
            break;
        case 'blog-list':
            include "./page/blog-list.php";
            break;
         case 'add-blog-detail':
            include "./page/add-blog-detail.php";
            break;
        default:
            include './page/home.php';
    }
}else{
    include './page/home.php';
}

include "./include/footer.php"
?>