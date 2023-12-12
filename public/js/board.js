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

const modalInfoBackground = document.getElementById("modal-info-background");
const modalInfo = document.getElementsByClassName("modal")[0];

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

    modalInfoBackground.style.display = "flex";
    modalInfo.style.display = "block";
};

const closeModal = () => {
    modalInfoBackground.style.display = "none";
    modalModifyBackground.style.display = "none";
    modalInfo.style.display = "none";
    modalModify.style.display = "none";
};

modalInfoBackground.addEventListener("click", closeModal);
modalInfo.addEventListener("click", (event) => {
    event.stopPropagation();
});

const modalModifyBackground = document.getElementById(
    "modal-modify-background"
);
const modalModify = document.getElementsByClassName("modal")[1];

modalModifyBackground.addEventListener("click", closeModal);
modalModify.addEventListener("click", (event) => {
    event.stopPropagation();
});

const openModalModify = (id, title, team, content) => {
    console.log(id, title, team, content);
    const modifyForm = document.getElementById("modify-form");
    modifyForm.action = `/posts/${id}`;

    const titleElement = document.getElementById("modify-title");
    const selectElement = document.getElementById("modify-select");
    const contentElement = document.getElementById("modify-content");

    titleElement.value = title;
    selectElement.value = team;
    contentElement.innerText = content;

    modalModifyBackground.style.display = "flex";
    modalModify.style.display = "block";
};
