const postContainer = document.querySelector("#post-container");
const xmlhttp = new XMLHttpRequest();

xmlhttp.onload = function () {
    const resObj = JSON.parse(this.responseText);
    console.log(resObj);
}

xmlhttp.open("GET", "../posts-json.php");
xmlhttp.send();