const postContainer = document.querySelector("#post-container");

fetch('./utils/posts-json.php')
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.dir(data);
        data.forEach((obj) => {
            const post = document.createElement("div");
            const postContent = document.createElement("p");
            const postHeader = document.createElement("h2");

            postHeader.innerText = `${obj.post.header}  - by @${obj.post_user.username} (${obj.timeAgo})`;
            postContent.innerText = obj.post.content;

            post.appendChild(postHeader);
            post.appendChild(postContent);
            postContainer.appendChild(post);
        })
    });