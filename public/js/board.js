const createPostButton = document.getElementById("create_post_button");
const isLoggedIn = document.getElementById("isLoggedIn").textContent.trim();

createPostButton.addEventListener("click", (event) => {
    if (isLoggedIn === "false") {
        event.preventDefault();
        alert("로그인이 필요합니다.");
        window.location.href = "/login";
    }
});
