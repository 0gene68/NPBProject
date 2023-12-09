const toggleContainer = document.getElementById("toggle-container");
const commentContainer = document.getElementById("comment-container");
const test3 = document.getElementById("test3");

const playerInfo = document.getElementById("player_info");
const comments = document.getElementById("comments");
const wait = document.getElementById("wait");

playerInfo.addEventListener("click", () => {
    toggleContainer.style.display = "block";
    commentContainer.style.display = "none";
    test3.style.display = "none";
});

comments.addEventListener("click", () => {
    toggleContainer.style.display = "none";
    commentContainer.style.display = "block";
    test3.style.display = "none";
});

wait.addEventListener("click", () => {
    toggleContainer.style.display = "none";
    commentContainer.style.display = "none";
    test3.style.display = "block";
});
