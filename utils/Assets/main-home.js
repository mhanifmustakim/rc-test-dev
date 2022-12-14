const postContainer = document.querySelector("#post-container");
let currentPosts = 0;

const refreshPosts = () => {
    fetch('./utils/posts-json.php')
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            if (currentPosts == data.length) return;

            postContainer.innerHTML = "";
            data.forEach((obj) => {
                const post = document.createElement("div");
                const postLink = document.createElement("a");
                const postHeader = document.createElement("h2");

                const postInfo = document.createTextNode(`- by @${obj.post_username} (${obj.timeAgo})`);
                postHeader.innerText = `${obj.post_header}`;
                postLink.setAttribute("href", `post.php?id=${obj.post_id}`);

                postLink.appendChild(postHeader);
                post.appendChild(postLink);
                post.appendChild(postInfo);
                if (obj.own_by_user) post.appendChild(createDelPostBtn(obj.post_id));
                postContainer.appendChild(post);
                currentPosts += 1;
            })
        });
}

function createDelPostBtn(postId) {
    const delBtn = document.createElement("form");
    delBtn.setAttribute("action", "./utils/controls/delete-post.php");
    delBtn.setAttribute("method", "POST");

    const data = document.createElement("input");
    data.setAttribute("name", "postId");
    data.setAttribute("value", postId);
    data.setAttribute("type", "hidden");

    const btn = document.createElement("input");
    btn.setAttribute("type", "submit");
    btn.setAttribute("name", "delete");
    btn.setAttribute("value", "Delete");

    delBtn.appendChild(data);
    delBtn.appendChild(btn);
    return delBtn;
}
refreshPosts();
setInterval(refreshPosts, 5000);