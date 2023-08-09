var users = []

const userID = document.getElementsByClassName('user-id')[0].innerHTML;

console.log(userID)
// fetch("include/user.php?q=" + userID )
//   .then(res => res.json())
//   .then(data => {
//     console.log(data)
//   })


const menu = document.querySelector('[data-header-menu]')
if (userID == 0) {
  menu.innerHTML +=
    `
                    <a href="?page=Log-in&form=true">Đăng Nhập</a>
                    <a href="#">|</a>
                    <a href="?page=Log-in&form=false">Đăng Ký</a>
                    <a  href = "?page=user-setting" > <i class="fa-regular fa-user"></i></a >`

} else if (userID >= 1) {
  let xxx = `<?php echo $user_info['user_nickname']; ?>`
  menu.innerHTML +=
    `<div class="btn-group">
  <div type="button" class="buton-userid" data-toggle="dropdown" aria-expanded="false">
    <img src="./img/1.jpg" alt="">
  </div>
  <div class="dropdown-menu">
    
    <a class="dropdown-item" href="#">${xxx}</a>
    <a class="dropdown-item" href="?page=user-setting">Thông tin cá nhân</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Đăng Xuất</a>
  </div>
</div>`
}

menu.innerHTML += `<a href="?page=shopping-cart"><i class="fa-solid fa-cart-shopping"></i></i></a>`