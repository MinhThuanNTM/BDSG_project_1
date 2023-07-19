<?php
// connect database
function connect($sql){
    $servername = "localhost";
        $username = "root";
        $password = "";
        try {
        $conn = new PDO("mysql:host=$servername;dbname=bdsg", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
}
$product_list = connect("select*from product");
$product_img = connect("select*from prd_img ");


// ------------------------------------- Thịnh ------------------------------------------
function showproduct(){
    foreach ($GLOBALS['product_list'] as $product){
        $product_img = $GLOBALS['product_img'];
        $id = $product['product_id'];
        // print_r($product_img['product_id']);
        echo'<div class="product-block" onclick="expand(this)">
        <div class="prd-row1">
            <div class="sp1">
                <div class="chaaa">
                    <div class="img">
                        <img src="IMG/'.$product_img[$id]['image_0'].'.png" alt=""
                            width="100px" height="120px">
                    </div>
                    <div class="p">
                        <p>'.$product['name'].'</p>
                    </div>
                </div>
                <div class="cha1">
                    <div class="size">Size: L</div>
                    <div class="sl">Số Lượng: '.$product['qty'].'</div>
                </div>
                <div class="cha2">
                    <i class="fa-regular fa-heart"></i>10
                    <div class="down">
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="price">Giá: '.$product['price'].'</div>
                </div>
            </div>
            <div class="chitiet">
                <div class="anh1">
                    <img src="IMG/1.jpg" alt="" width="30px" height="40px">
                    <img src="IMG/2.jpg" alt="" width="30px" height="40px">
                    <img src="IMG/3.jpg" alt="" width="30px" height="40px">
                </div>
                <div class="anh2">
                    <img src="IMG/ao-polo-nam-10s23pol063_evegreen_1__1.jpg" alt="" width="130px"
                        height="150px">
                </div>
                <div class="text">
                    <p>'.$product['decription'].'</p>
                    <div class="nut">
                        <div class="a1"><a href="?page=edit-product ">Cập nhật</a></div>
                        <div class="a2"><a href="">Xóa</a></div>
                        <div class="a3"><a href="">Thống kê</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>';

    }
}
function category_select(){
    $category_list = connect("select*from category");
    foreach($category_list as $category){
        echo'<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
    }
}
// ----------------------------------------------------------------------------------------

// ------------------------------------- Thuận ------------------------------------------








// ----------------------------------------------------------------------------------------

// ------------------------------------- Tín ------------------------------------------








// ----------------------------------------------------------------------------------------

// ------------------------------------- Trầm ------------------------------------------









// ----------------------------------------------------------------------------------------

// ------------------------------------- Nam ------------------------------------------










// ----------------------------------------------------------------------------------------
?>