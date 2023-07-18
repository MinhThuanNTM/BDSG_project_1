</div>
        </div>
    </div>



<script>
        const bg = document.getElementsByClassName("set-bg");
for (let i = 0; i < bg.length; i++) {
    let data = bg[i].getAttribute("data-bg")
    bg[i].style.backgroundImage = "url(./img/"+ data +")"
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
    </script>
</body>
</html>