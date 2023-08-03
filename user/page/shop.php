<main>
      <div class="banner-product">
        <img src="img/bannerproduct.jpg" alt="" width="100%" />
      </div>
      <div class="h1-product">
        <h1>Thời Trang Nam</h1>
      </div>
      <div class="dmuc-product">
        <div class="h3-product">
          <h3>Danh Mục</h3>
        </div>
        <div class="aonam-product"><input type="radio" name="#" /> Áo Nam</div>
        <div class="quannam-product"><input type="radio" name="#" /> Quần Nam</div>
      </div>
      <div class="product-cha-product">
        <div class="product-left-product">
          <div class="menu-row-product">
            <ul>
              <li>
                <a href="#"> Thiết Kế</a>
              </li>
              <li>
                <a href="#"> Giới Tính</a>
              </li>

              <li>
                <a href="#">Nhóm Sản Phẩm</a>
              </li>
              <li>
                <a href="#">Kiểu Tay</a>
              </li>

              <li>
                <a href="#">Màu Sắc</a>
              </li>
              <li>
                <a href="#">Size</a>
              </li>
              <li>
                <a href="#"> Giá Tiền</a>
              </li>
              <li>
                <a href="#">Form</a>
              </li>
              <li>
                <a href="#">Chất Liệu</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="product-right-product">
          
        <div class="prd_list row"> 
                <!-------------- product list ----------------->
                <?php 
                    foreach ($product_list as $product) {
                      $product_id = $product['product_id'];
                      $sql1 = "SELECT * FROM prd_img WHERE product_id = $product_id";
                      $img_url = connect($sql1);

                    ?>
                      <div class="prd-item d-flex flex-column col-3">
                        <div class="prd-img set-bg " data-bg="<?php echo $img_url[0]['image_0'] ?>">
                          <a class="btn-full-w" href="?page=chitiet&id=<?php echo $product_id; ?>"></a>
                        </div>
                        <div class="prd-text">
                          <div class="prd-name">
                            <a class="prd-name-text"><?php echo $product['name'] ?></a>
                            <div class="add-cart"><a href="?page=shop&addToCart=<?php echo $product_id;?>">+ Thêm vào giỏ hàng</a></div>
                            <i class="fa-regular fa-heart"></i>
                          </div>
                          <div class="prd-price">
                            <a><?php echo $product['price'] ?> đ</a>
                          </div>
                        </div>
                      </div>

                    <?php } ?>
                  <!-------------- product list end ----------------->
              </div>
        </div>
      </div>
    </main>