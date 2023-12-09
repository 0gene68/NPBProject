const toggle = document.querySelectorAll(".toggle-button");

let isToggleButtonActive = false;

toggle.forEach((div) => {
    div.addEventListener("click", function () {
        const toggleContent = this.nextElementSibling.nextElementSibling;

        if (!isToggleButtonActive) {
            this.classList.add("active");
            toggleContent.classList.add("active");
            toggleContent.style.display = "flex";
            isToggleButtonActive = true;
        } else {
            this.classList.remove("active");
            toggleContent.classList.remove("active");
            toggleContent.style.display = "none";
            isToggleButtonActive = false;
        }
        this.disabled = true; // 클릭 이벤트 후 버튼을 비활성화
    });
});

const modalBackground = document.getElementById("modal-background");
const modal = document.getElementById("modal");
const teamIdElement = document.getElementById("teamLogo");
const teamId = teamIdElement
    ? teamIdElement.getAttribute("data-team-id")
    : null;

const openModal = (
    backNumber,
    nameKr,
    nameJp,
    birthDate,
    position,
    throwBat
) => {
    const nameKrElement = document.getElementById("name_kr");
    const nameJpElement = document.getElementById("name_jp");
    const birthDateElement = document.getElementById("birthDate");
    const positionElement = document.getElementById("position");
    const throwBatElement = document.getElementById("throw_bat");

    nameKrElement.innerHTML = `${backNumber} ${nameKr}`;
    nameJpElement.innerHTML = `${nameJp}`;
    birthDateElement.innerHTML = `생년월일 | ${birthDate}`;
    throwBatElement.innerHTML = `투/타 | ${throwBat}`;
    positionElement.innerHTML = `포지션 | ${position}`;

    const playerImageElement = document.querySelector(".modal-content > img");

    playerImageElement.src = `storage/images/${teamId}/${teamId}${backNumber}.jpg`;

    modalBackground.style.display = "flex";
    modal.style.display = "block";
};

const closeModal = () => {
    modalBackground.style.display = "none";
    modal.style.display = "none";
};
