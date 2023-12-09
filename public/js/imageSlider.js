const slider = document.querySelector(".slider");
const prevButton = document.querySelector(".prev-button");
const nextButton = document.querySelector(".next-button");

let currentIndex = 0;

/* 요소의 너비를 계산하여 슬라이드를 보여주는 함수 showSlide */
const showSlide = (index) => {
    const slideWidth = slider.clientWidth;
    slider.style.transform = `translateX(-${index * slideWidth}px)`;
};

/* 이전 슬라이드를 보여주는 함수 nextSlide */
function prevSlide() {
    currentIndex =
        (currentIndex - 1 + slider.children.length) % slider.children.length;
    showSlide(currentIndex);
    updateCurrentImage();
}

/* 다음 슬라이드를 보여주는 함수 nextSlide */
const nextSlide = () => {
    currentIndex = (currentIndex + 1) % slider.children.length;
    showSlide(currentIndex);
    updateCurrentImage();
};

/* 이미지 슬라이더의 이미지에 따른 팀 이름 변경 */
const teamName = document.querySelector("#teamName");
const images = document.querySelectorAll(".slider img");

/* currentImg와 currentImgUrl 초기화 */
let currentImg = images[currentIndex];
let currentImgUrl = currentImg.getAttribute("src");

/* currentImg와 currentImgUrl 업데이트 */
const updateCurrentImage = () => {
    currentImg = images[currentIndex];
    currentImgUrl = currentImg.getAttribute("src");

    /* 업데이트된 이미지의 인덱스에 따라 팀 이름을 변경함 */
    teamName.innerHTML = currentImg.name;
};

// 화면이 새로고침될 때 updateCurrentImage를 실행하여 첫 번째 팀부터 나타날 수 있도록 함
window.onload = updateCurrentImage;

// 이전 버튼/다음 버튼을 누르면 각각 이전/다음 이미지로 넘어감
prevButton.addEventListener("click", prevSlide);
nextButton.addEventListener("click", nextSlide);

// 자동으로 다음 슬라이드로 전환 (5초마다)
setInterval(nextSlide, 5000);
