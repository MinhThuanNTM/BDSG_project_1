



// --------------------------------------- Thuận ----------------------------------------
// Hàm thiết lập Cookie
// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays*24*60*60*1000));
//     var expires = "expires="+d.toUTCString();
//     document.cookie = cname + "=" + cvalue + "; " + expires;
//     alert('setCookie ok')
// }
 
// // Hàm lấy Cookie
// function getCookie(cname) {
//     var name = cname + "=";
//     var ca = document.cookie.split(';');
//     for(var i=0; i<ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0)==' ') c = c.substring(1);
//         if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
//     }
//     return "";
// }

// const bg = document.getElementsByClassName("set-bg");
// for (let i = 0; i < bg.length; i++) {
//     let data = bg[i].getAttribute("data-bg")
//     bg[i].style.backgroundImage = "url(./asset/img/product/"+ data +")"
// }


// window.onload = autoCookies()


// var cartList = new Array()
// cartList.push('avs')
// console.log(cartList)
// function autoCookies(){
//     for(let i = 0; i < 15; i++){
//         console.log('ok')
//         addToCart(i)
//     }
    
//     setCookie('cartList', cartList, 1)
// }
// function addToCart(x) {
//     console.log(cartList)
//     // let prdElement = x.parentElement.children
//     let id = x
//     let img = '00038-3896515113.png'
//     let name = 'product '
//     let price = 1000000
//     let count = 1
//     let item = { id, img, name, count, price }
//     let flag = true;
//     // for (let i = 0; i < cartList.length; i++) {
//     //     if (cartList[i].name == name) {
//     //         cartList[i].count += 1
//     //         flag = false
//     //     }
//     // }
//     // if (flag) {
//         cartList.push(item)
//     // }
// }
