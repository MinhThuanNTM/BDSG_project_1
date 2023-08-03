<?php
// connect database../
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

function uploadimg_1($n){
    $target_dir = "../user/img/product/";
    $target_file = $target_dir . basename($_FILES[$n]["name"]);
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
  if (move_uploaded_file($_FILES[$n]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    // echo "Sorry, there was an error uploading your file.";
  }
}


    return basename($_FILES[$n]["name"]);
}



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
}

function new_id(){

    if(!isset($GLOBALS['product_list']) || $GLOBALS['product_list'] == null){
        $lasted_id = 0;
    }else{
        $lasted_id = Array_pop($GLOBALS['product_list'])['product_id'];
    }
    return($lasted_id+1);
    
}

// function detail_id(){

//     if(!isset($GLOBALS['product_list']) || $GLOBALS['product_list'] == null){
//         $lasted_id = 0;
//     }else{
//         $lasted_id = Array_pop($GLOBALS['product_list'])['product_id'];
//     }
//     return($lasted_id+1);
    
// }

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
                    <img src="../user/img/product/'.$product_img[0]['image_0'].'" alt="" width="30px" height="40px">
                    <img src="../user/img/product/'.$product_img[0]['image_1'].'" alt="" width="30px" height="40px">
                    <img src="../user/img/product/'.$product_img[0]['image_2'].'" alt="" width="30px" height="40px">
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
    if(uploadimg_1('upImg_1') != '' && uploadimg_1('upImg_1') != null){
        $_SESSION['add-image_1'] = uploadimg_1('upImg_1');
    }
    if(uploadimg_1('upImg_2') != '' && uploadimg_1('upImg_2') != null){
        $_SESSION['add-image_2'] = uploadimg_1('upImg_2');
    }
    if(uploadimg_1('upImg_3') != '' && uploadimg_1('upImg_3') != null){
        $_SESSION['add-image_3'] = uploadimg_1('upImg_3');
    }
    $dec = $_POST['decription'];
    $qty = $_POST['qty'];
    $id = new_id();
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $category_id = $_POST['category'];
    $image1 = $_SESSION['add-image_1'];
    $image2 = $_SESSION['add-image_2'];
    $image3 = $_SESSION['add-image_3'];
    // echo $image;
        connect("INSERT INTO product (product_id ,category_id ,name	,price	,decription,qty,sale) VALUES ('$id','$category_id','$name', '$price','$dec','$qty', '$sale')" );
        connect("INSERT INTO prd_img (product_id,image_0,image_1,image_2)VALUE ('$id','$image1','$image2','$image3')");
        session_destroy();
        header('Location: index.php?page=product-list');
}

function add_blog_detail(){
   
    $title = $_POST['title'];
    $image = $_SESSION['add-image'];
    $conten = $_POST['textarea'];
    // echo $image;
        connect("INSERT INTO post ( post_title ,post_thumb,post_content,post_by) VALUES ('$title','$image', '$conten','post_by')");
        // session_destroy();
        // header('Location: index.php');
}

// connect("DELETE FROM sold_item WHERE order_id='0'"); 
// connect("DELETE FROM delivery WHERE order_id='0'"); 
// connect("DELETE FROM order_status WHERE order_id='0'"); 
// connect("DELETE FROM order_sold WHERE order_id='0'"); 




if(isset ($_GET['delete'])){
    $id = $_GET['delete'];
    connect("DELETE FROM prd_img WHERE product_id='$id'"); 

        connect("DELETE FROM product WHERE product_id='$id'"); 
        
        header('Location: index.php?page=product-list');
  }
  function show_blog_list(){
    $blog_list = connect("select*from post");
    foreach($blog_list as $index=>$item){
        
         echo '<div class="img-show-blog">
            <img src="../user/img/'.$item['post_thumb'].'" alt="" width="393px" height="262px">
            <div class="icon-blog"><a href="#"><i class="fa-solid fa-trash" style="color: #000000;"></i></div></a>
            <div class="icon-fix-blog"><a href="#"><i class="fa-solid fa-wrench" style="color: #000000;"></i></a></div>
            <div class="a-show-blog">
                <a href="#">Khám Phá</a>
                <a href="#">Chất Liệu</a>
            </div>
            <div class="p-show-blog">
             '.$item['post_title'].'
            </div>
            <div class="span-show-blog">
                12.07.2023
            </div>
            <div class="tack-show-blog">
              '.$item['post_content'].'..
            </div>
        </div>';
    
    }
   

  }

  function edit_product($id){
    
    $product_img = connect("SELECT* FROM prd_img WHERE product_id='$id'")[0];
    
    if(uploadimg_1('upImg_1') != '' && uploadimg_1('upImg_1') != null){
      $_SESSION['add-image_1'] = uploadimg_1('upImg_1');
    }else{
        $_SESSION['add-image_1'] = $product_img['image_0'];
    }
    if(uploadimg_1('upImg_2') != '' && uploadimg_1('upImg_2') != null){
        $_SESSION['add-image_2'] = uploadimg_1('upImg_2');
    }else{
        $_SESSION['add-image_2'] = $product_img['image_1'];
    }
    if(uploadimg_1('upImg_3') != '' && uploadimg_1('upImg_3') != null){
        $_SESSION['add-image_3'] = uploadimg_1('upImg_3');
    }else{
        $_SESSION['add-image_3'] = $product_img['image_2'];
    }
  
      $dec = $_POST['decription'];
      $qty = $_POST['qty'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $sale = $_POST['sale'];
      $category_id = $_POST['category'];
      $image1 = $_SESSION['add-image_1'];
      $image2 = $_SESSION['add-image_2'];
      $image3 = $_SESSION['add-image_3'];
      echo $image1;
          // connect("INSERT INTO product (product_id ,category_id ,name	,price	,decription,qty,sale) VALUES ('$id','$category_id','$name', '$price','$dec','$qty', '$sale')" );
          connect("UPDATE product SET name='$name', category_id='$category_id', price='$price', sale='$sale', qty='$qty', decription='$dec' WHERE product_id='$id'");
          connect("UPDATE prd_img SET image_0 = '$image1', image_1 = '$image2',  image_2 = '$image3'  WHERE product_id='$id'");
          session_destroy();
          header('Location: index.php?page=product-list');
}

// ------------
?>
