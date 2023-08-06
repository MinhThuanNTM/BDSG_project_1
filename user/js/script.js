
const userInfo = document.getElementsByClassName('user-infor_details')[0]
const updtBtn = document.getElementsByClassName('updtInfo')[0]

userInfo.addEventListener("change", function(){ 
    updtBtn.disabled = false
    console.log(updtBtn)
});


const userAvatar = document.getElementsByClassName('user-avatar')[0]
userAvatar.addEventListener("click", function(){
    alert('yo')
})


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



const input = document.getElementsByClassName('btn-fullW');

for(let i = 0; i < imgBtn.length; i++){

    input[i].addEventListener('change', (e) => {
        if (e.target.files.length) {
            let src = URL.createObjectURL(e.target.files[0]);
            image[i].style.backgroundImage = 'url('+src+')'
            imgBtn[i].style.backgroundImage = 'url('+src+')'
        }
    });
}