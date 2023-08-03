const bg = document.getElementsByClassName("set-bg");
for (let i = 0; i < bg.length; i++) {
    let data = bg[i].getAttribute("data-bg")
    bg[i].style.backgroundImage = "url(../img/product/"+ data +")"
}

function controlDropdown(n){
    if(n.classList.contains('card-active')){
        n.classList.remove('card-active')
        if(n.parentElement.children[1] != undefined){
            n.parentElement.children[1].style.height = '0'
        }
    }else{
        n.classList.toggle('card-active')
        if(n.parentElement.children[1] != undefined){
            let childCount = n.parentElement.children[1].childElementCount
            n.parentElement.children[1].style.height = 'calc(24px * '+childCount+' + 12px * '+(childCount - 1 )+' + 20px)'
        }
        
    }
}

                                
function expand(n){
    if(n.classList.contains('block-active')){
        n.classList.remove('block-active')
        n.style.height ='160px';
    }else{
        n.classList.toggle('block-active')
        n.style.height ='500px';
    }
    console.log(n.classList)
}

const imgBtn = document.getElementsByClassName("mini-img_block")
const imgShow = document.getElementsByClassName("large-img")

function showImage(n){
    if(n.classList.contains('actived')){

    }else{
        for(let i = 0; i < imgBtn.length; i++){
            imgBtn[i].classList.remove('actived')
            imgShow[i].classList.remove('actived')
        }
        n.classList.toggle('actived')
        for(let i = 0; i < imgBtn.length; i++){
            if(imgBtn[i].classList.contains('actived')){
                imgShow[i].classList.toggle('actived')
            }
        }
    }
}


const input = document.getElementsByClassName('btn-fullW');
const image = document.getElementsByClassName('large-img');

for(let i = 0; i < imgBtn.length; i++){

    input[i].addEventListener('change', (e) => {
        if (e.target.files.length) {
            let src = URL.createObjectURL(e.target.files[0]);
            image[i].style.backgroundImage = 'url('+src+')'
            imgBtn[i].style.backgroundImage = 'url('+src+')'
        }
    });
}

// const navItem = document.getElementsByClassName('nav-item')
// const tabShow = document.getElementsByClassName('tab-show')
// function openTab(n){
//     if(n.classList.contains('active')){

//     }else{
//         for(let i = 0; i < navItem.length; i++){
//             navItem[i].classList.remove('active')
//             tabShow[i].classList.remove('active')
//         }
//         n.classList.toggle('active')
//         for(let i = 0; i < imgBtn.length; i++){
//             if(navItem[i].classList.contains('active')){
//                 tabShow[i].classList.toggle('active')
//             }
//         }
//     }
// }
