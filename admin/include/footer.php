</div>
        </div>
    </div>



<script>
        const bg = document.getElementsByClassName("set-bg");
for (let i = 0; i < bg.length; i++) {
    let data = bg[i].getAttribute("data-bg")
    bg[i].style.backgroundImage = "url(../user/img/product/"+ data +")"
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
    </script>
</body>
</html>