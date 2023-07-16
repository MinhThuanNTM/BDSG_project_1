const bg = document.getElementsByClassName("set-bg");
for (let i = 0; i < bg.length; i++) {
    let data = bg[i].getAttribute("data-bg")
    bg[i].style.backgroundImage = "url(./asset/img/product/"+ data +")"
}

