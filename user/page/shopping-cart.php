
    <div class="cart-page container">
        <div class="row justify-content-between">
            <div class="cart d-flex flex-column col-8">
                <table class="table">
                    <thead>
                      <tr class="content-box">
                        <th scope="col">
                            <div class="cart-tile cart-item-width">
                                Sản phẩm
                            </div>
                        </th>
                        <th scope="col">
                            <div class="cart-tile">
                                số lượng
                            </div>
                        </th>
                        <th scope="col">
                            <div class="cart-tile">
                                Tổng
                            </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            shoppingCart('cart-list');
                        ?>
                      <!-- <tr>
                        <td>
                            <div class="cart-item d-flex ">
                                <div class="cart-prd-img-pd">
                                    <div class="cart-prd-img set-bg" data-bg="00038-3896515113.png" >
                                    </div>
                                </div>
                                <div class="cart-text content-box d-flex flex-column justify-content-center">
                                    <a class="cart-prd-name">Đầm voan trắng</a>
                                    <a class="cart-prd-price">1.240.000</a>
                                </div> 
                            </div>
                        </td>
                        <td>
                            <div class="quantity content-box d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-angle-left"></i>
                                <input type="text" value="0">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </td>
                        <td>
                            <div class="cart-prd-total content-box d-flex align-items-center">
                                <a>1.240.000</a>
                            </div>
                        </td>
                        <td>
                            <div class="cart-prd-del content-box d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <div class="cart-item d-flex ">
                                <div class="cart-prd-img-pd">
                                    <div class="cart-prd-img set-bg" data-bg="00038-3896515113.png" >
                                    </div>
                                </div>
                                <div class="cart-text content-box d-flex flex-column justify-content-center">
                                    <a class="cart-prd-name">Đầm voan trắng</a>
                                    <a class="cart-prd-price">1.240.000</a>
                                </div> 
                            </div>
                        </td>
                        <td>
                            <div class="quantity content-box d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-angle-left"></i>
                                <input type="text" value="0">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </td>
                        <td>
                            <div class="cart-prd-total content-box d-flex align-items-center">
                                <a>1.240.000</a>
                            </div>
                        </td>
                        <td>
                            <div class="cart-prd-del content-box d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <div class="cart-item d-flex ">
                                <div class="cart-prd-img-pd">
                                    <div class="cart-prd-img set-bg" data-bg="00038-3896515113.png" >
                                    </div>
                                </div>
                                <div class="cart-text content-box d-flex flex-column justify-content-center">
                                    <a class="cart-prd-name">Đầm voan trắng</a>
                                    <a class="cart-prd-price">1.240.000</a>
                                </div> 
                            </div>
                        </td>
                        <td>
                            <div class="quantity content-box d-flex justify-content-between align-items-center">
                                <i class="fa-solid fa-angle-left"></i>
                                <input type="text" value="0">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </td>
                        <td>
                            <div class="cart-prd-total content-box d-flex align-items-center">
                                <a>1.240.000</a>
                            </div>
                        </td>
                        <td>
                            <div class="cart-prd-del content-box d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </td>
                      </tr> -->
                    </tbody>
                  </table>
                  <button class="continue-btn">
                    <a href="?page=home">
                        Tiếp tục mua hàng
                    </a>
                  </button>
            </div>
            <div class="col-1" style="width: calc(25% / 3);"></div>
            <?php
            shoppingCart('cart-calc');
            ?>
        </div>

    </div>
    
    <script src="./js/script.js"></script>