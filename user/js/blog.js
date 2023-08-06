
const post = new XMLHttpRequest();
post.onload = function() {
  const myObj = JSON.parse(this.responseText);
//   document.getElementById("demo").innerHTML = myObj.name;
    console.log(myObj)
}
post.open("GET", "./include/blog.php");
post.send();


