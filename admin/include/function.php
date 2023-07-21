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

// --------------------uploadimg-----------------
function uploadimg(){
    $target_dir = "../user/img/product/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    //   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //   if($check !== false) {
    //     // echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    //   } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    //   }
    

// Allow certain file formats
    if($imageFileType != "webp" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only WEBP, JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    // echo "Sorry, there was an error uploading your file.";
  }
}


    return basename($_FILES["fileToUpload"]["name"]);
}

// ----------------------------------------------------------------------




$product_list = connect("select*from product");
$product_img = connect("select*from prd_img ");


// ------------------------------------- Thịnh ------------------------------------------


function added_img(){
    if(!isset($_SESSION['add-image']) || $_SESSION['add-image'] == ''){
        return;
    }else {
        return($_SESSION['add-image']);
    }
}

if(isset ($_POST['loadUploadedFile']) && ($_POST['loadUploadedFile'])){
    if(uploadimg() != '' && uploadimg() != null){
        $_SESSION['add-image'] = uploadimg();
    }
    // echo $_SESSION['add-image'];
}

function new_id(){

    if(!isset($GLOBALS['product_list']) || $GLOBALS['product_list'] == null){
        $lasted_id = 0;
    }else{
        $lasted_id = Array_pop($GLOBALS['product_list'])['product_id'];
    }
    return($lasted_id+1);
    
}

function showproduct(){
    foreach ($GLOBALS['product_list'] as $product){
        $id = $product['product_id'];
        $product_img = connect("SELECT* FROM prd_img WHERE product_id='$id'");  //$GLOBALS['product_img'];
        
        // print_r($product_img['product_id']);
        echo'<div class="product-block" onclick="expand(this)">
        <div class="prd-row1">
            <div class="sp1">
                <div class="chaaa">
                    <div class="img">

                        <div class="prd_img_bg set-bg" data-bg="'.$product_img[0]['image_0'].'" alt=""
                            width="100px" height="120px">
                        </div>
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
                    <img src="../user/IMG/product/'.$product_img[0]['image_0'].'" alt="" width="30px" height="40px">
                    <img src="../user/IMG/product/'.$product_img[0]['image_1'].'" alt="" width="30px" height="40px">
                    <img src="../user/IMG/product/'.$product_img[0]['image_2'].'" alt="" width="30px" height="40px">
                </div>
                <div class="anh2">
                    <img src="IMG/ao-polo-nam-10s23pol063_evegreen_1__1.jpg" alt="" width="130px"
                        height="150px">
                </div>
                <div class="text">
                    <p>'.$product['decription'].'</p>
                    <div class="nut">
                        <div class="a1"><a href="?page=edit-product ">Cập nhật</a></div>
                        <div class="a2"><a href="?delete='.$id.'">Xóa</a></div>
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
function add_product(){
    $dec = $_POST['decription'];
    $qty = $_POST['qty'];
    $id = new_id();
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $category_id = $_POST['category'];
    $image = $_SESSION['add-image'];
    // echo $image;
        connect("INSERT INTO product (product_id ,category_id ,name	,price	,decription,qty,sale) VALUES ('$id','$category_id','$name', '$price','$dec','$qty', '$sale')" );
        connect("INSERT INTO prd_img (product_id,image_0,image_1,image_2)VALUE ('$id','$image','$image','$image')");
        // session_destroy();
        header('Location: index.php');
}
if(isset ($_GET['delete'])){
    $id = $_GET['delete'];
    connect("DELETE FROM prd_img WHERE product_id='$id'"); 

        connect("DELETE FROM product WHERE product_id='$id'"); 
        
        header('Location: index.php?page=product-list');
  }
?>