import { toggleDarkTheme, applyInitialTheme } from './theme-toggle.js';

document.addEventListener("DOMContentLoaded", () => {
    // 페이지 로드시 다크 테마 확인
    applyInitialTheme();

    // 다크모드
    const toggleButton = document.querySelector('.star');
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleDarkTheme);
    }

    // 로그인 박스
    const profileToggle = document.querySelector(".member .on");
    const profileBox = document.querySelector(".profile");

    if (profileToggle) {
        profileToggle.addEventListener("click", function (event) {
            event.preventDefault();
            profileBox.classList.toggle("show");
        });
    }
})