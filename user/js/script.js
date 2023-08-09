
const userInfox = document.getElementsByClassName('user-infor_details')[0]
const updtBtn = document.getElementsByClassName('updtInfo')[0]


if(userInfox)
userInfox.addEventListener("change", function(){ 
    updtBtn.disabled = false
    console.log(updtBtn)
});


// const userAvatar = document.getElementsByClassName('user-avatar')[0]
// userAvatar.addEventListener("click", function(){
//     alert('yo')
// })


const userSidebarTab = document.getElementsByClassName('sideBarTab')
const userPageContent = document.getElementsByClassName('userPage_content')

for(let i = 0; i< userSidebarTab.length; i++){
    if(userSidebarTab[i].classList.contains('actived')){
        userPageContent[i].style.display = 'flex'
    }else{
        
        userPageContent[i].style.display = 'none'
    }
}
function openTab(x){
    for(let i = 0; i< userSidebarTab.length; i++){
        userSidebarTab[i].classList.remove('actived')
        userPageContent[i].classList.remove('actived')
        userPageContent[i].style.display = 'none';
    }
    x.classList.toggle('actived')
    for(let i = 0; i< userSidebarTab.length; i++){
        if(userSidebarTab[i].classList.contains('actived')){
            userPageContent[i].style.display = 'flex'
    
        }
        // else{
        //     userPageContent[i].style.display = 'none';
        // }
    }
}


const ava = document.getElementsByClassName('set-avatar')
if(ava)
for (let i = 0; i < ava.length; i++) {
    let data = ava[i].getAttribute("data-avatar")
    if(data != '') 
    ava[i].style.backgroundImage = "url(./img/avatar/"+ data +")"
}



const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
  const myObj = JSON.parse(this.responseText);
//   document.getElementById("demo").innerHTML = myObj.name;
    console.log(myObj)
}
xmlhttp.open("GET", "./include/product.php");
xmlhttp.send();



const avaChange = document.getElementById('avatar-change');
const submitAva = document.getElementById('submitAva')
// for (const btn of submitAva) {
//     btn.
// }
if(avaChange)
    avaChange.addEventListener('change', (e) => {
        if (e.target.files.length) {
            let src = URL.createObjectURL(e.target.files[0]);
            console.log(src)
            ava[0].style.backgroundImage = 'url('+src+')'
            submitAva.click()
        }
    });





    const bxtn = document.getElementsByClassName('demofetch')[0]
    console.log(bxtn)
    if(bxtn)
    bxtn.addEventListener("click", function(){
        alert()
        fetch("include/product.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
          },
          body: `addtoCart=1`,
        })
        .then((response) => response.text())
        .then((res) => (alert(res)));
      })