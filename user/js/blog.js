// let blogEL 
const post = new XMLHttpRequest();
post.onload = function () {
  let blogEL = JSON.parse(this.responseText);

  console.log(blogEL)
  for (let i = 0; i < blogEL.length; i++) {
    document.getElementsByClassName('product-blog')[0].innerHTML += `
            <div class="con-1-blog col-6">
              <a>
                <div style="background-image: url('img/${blogEL[i].post_thumb}'); 
                            height: 262px; background-size: cover;" alt=""   />
                  <a href="?page=blog_detail&post_id=${blogEL[i].post_id}" class="btn-full-w"> </a>
                </div>
              </a>
              <div class="km-blog">
                <a href="#">Khuyến Mãi</a>
              </div>
              <p class="post-title">${blogEL[i].post_title}</p>
              <span>${blogEL[i].posted_time}</span>
              <div>
                 <p class="post-content">${blogEL[i].post_content}</p>
              </div>
            </div>`
          
  }
  

}
post.open("GET", "./include/blog.php");
post.send();



