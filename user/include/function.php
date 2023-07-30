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


//-----------------------------------------------------------------------------Thuận---------------------------------------------------------------------------------------//

//-------- session -----------

if(!isset($_SESSION['data-cart'])){
    $_SESSION['data-cart'] = array();
}

foreach ($_SESSION['data-cart'] as $index => $item){
    if($item['quantity'] <= 0){
        unset($_SESSION['data-cart'][$index]);
        header('Location: index.php?page=shopping-cart');
    }
}
// session_destroy();



//-------- cookies -----------


//-------- thêm vào giỏ hàng -----------
if(isset($_GET['addToCart'])){
    $id = $_GET['addToCart'];
        $item = array(
            'id' => $id,
            'quantity' => 1,
        );
        $flag = 0;
        if(count($_SESSION['data-cart']) > 0){
            foreach($_SESSION['data-cart'] as $x=>$product){
                if(in_array($item['id'], $product)){
                    $_SESSION['data-cart'][$x]['quantity'] +=1;
                    $flag = 1;
                }
            }
        }
        if ($flag ==0){
            array_push($_SESSION['data-cart'],$item);
        }
        
    header('Location: index.php?page=shop');
}
//-------- thêm vào giỏ hàng end -----------//

//-------- show giỏ hàng -----------//
// session_destroy();
function shoppingCart(){
    $subTotal = 0;
        print_r($_SESSION['data-cart']);
        // print_r( $_SESSION['data-cart']);
        foreach($_SESSION['data-cart'] as $index => $item){
            $id = $item['id'];
            $product = connect("select*from product WHERE product_id = $id");
            $prd_img = connect("select*from prd_img WHERE product_id = $id");
            print_r($prd_img);
            if($item['quantity'] > 0){
            echo '
            <tr>
              <td>
                  <div class="cart-item d-flex ">
                      <div class="cart-prd-img-pd">
                          <div class="cart-prd-img set-bg" data-bg="'.$prd_img[0]['image_0'].'" >
                          </div>
                      </div>
                      <div class="cart-text content-box d-flex flex-column justify-content-center">
                          <a class="cart-prd-name">'.$product[0]['name'].'</a>
                          <a class="cart-prd-price">'.$product[0]['price'].'</a>
                      </div> 
                  </div>
              </td>
              <td>
                  <div class="quantity content-box d-flex justify-content-between align-items-center">
                        <a href="?page=shopping-cart&decrease='.$index.'"><i class="fa-solid fa-angle-left"></i></a>
                        <input type="text" value="'.$item['quantity'].'">
                        <a href="?page=shopping-cart&increase='.$index.'"><i class="fa-solid fa-angle-right"></i></a>
                  </div>
              </td>
              <td>
                  <div class="cart-prd-total content-box d-flex align-items-center">
                      <a>'.$product[0]['price'] * $item['quantity'].'</a>
                  </div>
              </td>
              <td>
                  <div class="cart-prd-del content-box d-flex justify-content-center align-items-center">
                      <a href="?page=shopping-cart&del='.$index.'"><i class="fa-solid fa-xmark"></i></a>
                  </div>
              </td>
            </tr>';
                }
    }
        echo'
        </tbody>
      </table>
      <button class="continue-btn">
        <a href="?page=home">
            Tiếp tục mua hàng
        </a>
      </button>
    </div>
    <div class="col-1" style="width: calc(25% / 3);"></div>
        
            <div class="col-3">
                <div class="cart-calc d-flex flex-column">
                    <div class="coupon-use d-flex flex-column">
                        <a>mã giảm giá</a>
                        <div class="coupon-code d-flex justify-content-between">
                            <input type="text">
                            <button class="coupon-apply-btn">dùng</button>
                        </div>
                    </div>
                    <div class="price-total">
                        <a class="calc-title">Tổng giá</a>
                        <div class="cart-calc-text d-flex justify-content-between">
                            <a>Tạm tính</a>
                            <a>'.$subTotal.'đ</a>
                        </div>
                        <div class="cart-calc-text  d-flex justify-content-between">
                            <a >Giảm giá</a>
                            <a>xxx</a>
                        </div>
                        <div class="cart-calc-text d-flex justify-content-between">
                            <a>Tổng cộng</a>
                            <a >'.$subTotal.' đ</a>
                        </div>
                        <button  class="to-checkout-btn"><a href="?page=checkout">đặt hàng</a></button>
                    </div>
                </div>
            </div>
        ';
    }
    


//-------- --------------- -----------//


//-------- xóa khỏi giỏ hàng -----------//
if(isset($_GET['del'])){
    $id = $_GET['del'];
    foreach ($_SESSION['data-cart'] as $index => $item){
        if($index == $id){
            unset($_SESSION['data-cart'][$index]);
            header('Location: index.php?page=shopping-cart');
        }
    }
}
//-------- -------------- -----------


//-------- sl tăng giỏ hàng -----------//

if(isset($_GET['increase'])){
    $id = $_GET['increase'];
    $_SESSION['data-cart'][$id]['quantity'] +=1;
    header('Location: index.php?page=shopping-cart');
}

//-------- sl giảm giỏ hàng -----------//
if(isset($_GET['decrease'])){
    $id = $_GET['decrease'];
    $_SESSION['data-cart'][$id]['quantity'] -=1;
    header('Location: index.php?page=shopping-cart');
}

// -------------checkout---------------

function checkout_cart(){
    if($_SESSION['data-cart']){
        $subTotal = 0;
        foreach($_SESSION['data-cart'] as $index => $item){
            $id = $item['id'];
            $product = connect("select*from product WHERE product_id = $id");

            echo '<div class="text-2-check">
            <div class="sp-check">'.$product[0]['name'].'</div>
            <div class="tt-check">'.$product[0]['price'] * $item['quantity'].' k</div>
          </div>
          <div class="x2-check">x'.$item['quantity'].'</div>';

          $subTotal += $product[0]['price'] * $item['quantity'];
        }
        $tax = $subTotal *10/100;
        $totalCost = $subTotal + $tax;
        echo '
        <div class="text-4-check">
          <div class="sp-check">Tổng Giá</div>
          <div class="tt-check">'.$subTotal.'k</div>
        </div>
        <div class="text-4-check">
          <div class="sp-check">Giảm Giá</div>
          <div class="tt-check">0</div>
        </div>
        <div class="text-4-check">
          <div class="sp-check">VAT(10%)</div>
          <div class="tt-check">'.$tax.'k</div>
        </div>
        <div class="text-5-check">
          <div class="sp-check">Tổng Cộng</div>
          <div class="tt-check">'.$totalCost.'k</div>
        </div>';
    }
}


// $x=  connect("select*from order_sold");
// $itemName  = Array_pop($x)['order_id'] +1;
// print_r($itemName);

if(isset($_POST['checkout'])&& $_POST['checkout']){
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNum = $_POST['phone'];
    
    $note;
    if(isset($_POST['note']) &&  $_POST['note'] != ''){
        $note = $_POST['note'];
    }

    $id;
    $x = connect("select*from order_sold");
    if(!isset($x) || $x == null){
        $id = 0;
    }else{
        $id = Array_pop($x)['order_id'] + 1;
    }

    connect("INSERT INTO order_sold (order_id , client_name, client_phone, client_email, user_note ) VALUES ('$id', '$fullName', '$phoneNum', '$email', '$note')" );
    connect("INSERT INTO delivery (order_id , address ) VALUES ('$id', '$address')" );
    connect("INSERT INTO order_status (order_id) VALUES ('$id')" );
    
    // print_r($_SESSION['data-cart']);
    
    foreach($_SESSION['data-cart'] as $index => $item){
        $itemID = $item['id'];
        $itemName = connect("SELECT name from product WHERE product_id = '$itemID' ")[0]['name'];
        $itemImg = connect("SELECT image_0 from prd_img WHERE product_id = '$itemID' ")[0]['image_0'];
        $itemQty = $item['quantity'];
        $itemPrice = connect("SELECT price from product WHERE product_id = '$itemID' ")[0]['price'];
        connect("INSERT INTO sold_item (order_id , product_name, prd_img, price, qty ) VALUES ('$id', '$itemName', '$itemImg' ,  '$itemPrice', '$itemQty')");
    }
    session_destroy();
    
    // header('Location: index.php?page=shopping-cart');
}
// session_destroy();
//-------- -------------- -----------

//-------- -------------- -----------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

//-----------------------------------------------------------------------------Tín----------------------------------------------------------------------------------------//




//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------Nam----------------------------------------------------------------------------------------//





//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------Trầm---------------------------------------------------------------------------------------//




//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------Thịnh---------------------------------------------------------------------------------------//






//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
