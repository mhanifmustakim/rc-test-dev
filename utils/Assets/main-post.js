const addCommentBtn = document.querySelector("#add-comment-btn");
const postCommentForm = document.querySelector("#post-comment-form");
const cancelCommentBtn = document.querySelector("#cancel-comment-btn");
const commentSection = document.querySelector("#comment-section");

// Add toggle display event listeners
function toggleForms() {
    addCommentBtn.classList.toggle("display-none");
    postCommentForm.classList.toggle("display-none");
}

[addCommentBtn, cancelCommentBtn].forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        toggleForms();
    });
})
// Handle comment requests
let currentComments = 0;
const refreshComments = () => {
    const postId = postCommentForm.getAttribute("data-postId");
    fetch(`./utils/comments-json.php?id=${postId}`)
        .then(function (response) {
            responseClone = response.clone();
            return response.json();
        })
        .then(function (data) {
            if (currentComments == data.length) return;

            commentSection.innerHTML = "";
            data = data.sort((obj1, obj2) => obj2.comment_id - obj1.comment_id);
            data.forEach((obj) => {
                const comment = document.createElement("div");
                comment.setAttribute("data-id", obj.comment_id);
                const commentContent = document.createElement("p");

                commentContent.innerText = obj.comment_content;
                const commentInfo = document.createTextNode(`\nby @${obj.comment_username} (${obj.timeAgo})`);

                comment.appendChild(commentContent);
                if (obj.own_by_user) comment.appendChild(createDelCommentBtn(obj.comment_id));
                comment.appendChild(commentInfo);
                commentSection.appendChild(comment);
                currentComments += 1;
            })
        })
}


function createDelCommentBtn(commentId) {
    const delBtn = document.createElement("form");
    delBtn.setAttribute("action", "./utils/controls/delete-comment.php");
    delBtn.setAttribute("method", "POST");

    const data = document.createElement("input");
    data.setAttribute("name", "commentId");
    data.setAttribute("value", commentId);
    data.setAttribute("type", "hidden");

    const btn = document.createElement("input");
    btn.setAttribute("type", "submit");
    btn.setAttribute("name", "delete");
    btn.setAttribute("value", "Delete");

    delBtn.appendChild(data);
    delBtn.appendChild(btn);
    return delBtn;
}

refreshComments();
setInterval(refreshComments, 5000);