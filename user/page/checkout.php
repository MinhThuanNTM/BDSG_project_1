<main>
  <div class="container">
      <form class="container-check" action="" method="post">
        <div class="form-dk-check">
          <p>
            A Bạn chưa có tài khoản? Đăng ký tài khoản để lưu thông tin của bạn
            cho các lần mua hàng sau
          </p>
          <div class="h2-check">chi tiết hóa đơn</div>
          <div class="id1-check">
            <label for="username">Họ và Tên<span>*</span></label
            ><br />
            <input class="ip-check" type="text" id="username" name="full-name" value=" "/>
          </div>
          <div class="id2-check">
            <label for="diachi">Địa Chỉ<span>*</span></label
            ><br />
            <input class="ip-check" type="text" id="diachi" name="address" value=" "/>
          </div>
          <div class="id3-check">
            <label for="ma">Mã Bưu Chính <span>*</span></label
            ><br />
            <input class="ip-check" type="text" id="ma" name="zip-code" value=" "/>
          </div>
          <div class="id4-check">
            <div class="email-check">
              <label for="email-check">Email<span>*</span></label
              ><br />
              <input class="ip-check" type="email" id="email" name="email" value=" "/>
            </div>
            <div class="sdt-check">
              <label for="number">Số điện thoại<span>*</span></label
              ><br />
              <input class="ip-check" type="number" id="number" placeholder="+84" name="phone" value=" "/>
            </div>
          </div>
          <div class="chebook-check">
            <input type="checkbox" />
            <spam class="spam-check">Tạo tài khoản</spam>
          </div>
          <div class="p-check">
            Nhập tên đăng nhập và mật khẩu để tạo tài khoản mới
          </div>
          <div class="id5-check">
            <label for="user-check">Tên Người dùng<span>*</span></label
            ><br />
            <input class="ip-check" type="text" id="user" />
          </div>
          <div class="id6-check">
            <label for="password-check">Mật Khẩu<span>*</span></label
            ><br />
            <input class="ip-check" type="password" id="password" />
          </div>
          <div class="chebook-check">
            <input type="checkbox" />
            <spam class="spam-check">Thêm ghi chú</spam>
          </div>
          <div class="id7-check">
            <label for="password">Ghi chú<span>*</span></label
            ><br />
            <textarea name="user-note" value=" " id="" cols="30" rows="12"></textarea>
          </div>
        </div>
      
        <div class="hoadon-check">
          <div class="hd-check">Hóa đơn</div>
          <div class="text-1-check">
            <div class="sp-check">Sản phẩm</div>
            <div class="tt-check">Thành tiền</div>
          </div>
              <?php checkout_cart(); ?>

          <div class="chek-check">
            <div class="chek1-check">
              <input type="checkbox" name="t[]" /> Thanh toán khi nhận hàng
            </div>
            <div class="chek2-check"><input type="checkbox" name="t[]" /> Visa</div>
          </div>
          <input class="a-check" type="submit" name="checkout" value="Đặt Hàng">
        </div>
  </form>
  </div>
    </main>