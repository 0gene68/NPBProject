const createPostButton = document.getElementById("create_post_button");
const isLoggedIn = document.getElementById("isLoggedIn").textContent.trim();

createPostButton.addEventListener("click", (event) => {
    if (isLoggedIn === "false") {
        event.preventDefault();
        alert("로그인이 필요합니다.");
        window.location.href = "/login";
    }
});

const selectTeam = document.getElementById("select");

selectTeam.addEventListener("change", () => {
    let selectedTeam = selectTeam.value;
    let posts = document.getElementsByClassName("post");

    for (let i = 0; i < posts.length; i++) {
        let post = posts[i];
        let team = post.getElementsByClassName("team")[0].textContent;

        if (selectedTeam === "팀을 선택하세요" || selectedTeam === team) {
            post.style.display = "block";
        } else {
            post.style.display = "none";
        }
    }
});

const modalBackground = document.getElementById("modal-background");
const modal = document.getElementById("modal");

const openModal = (title, team, content, writer, created_at) => {
    const titleElement = document.getElementById("title");
    const teamElement = document.getElementById("team");
    const contentElement = document.getElementById("content");
    const writerElement = document.getElementById("writer");
    const createdAtElement = document.getElementById("created_at");

    titleElement.innerHTML = `${title}`;
    teamElement.innerHTML = `${team}`;
    contentElement.innerHTML = `${content}`;
    writerElement.innerHTML = `${writer}`;
    createdAtElement.innerHTML = `${created_at}`;

    modalBackground.style.display = "flex";
    modal.style.display = "block";
};

const closeModal = () => {
    modalBackground.style.display = "none";
    modal.style.display = "none";
};
