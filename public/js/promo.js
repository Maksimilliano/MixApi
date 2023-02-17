document.addEventListener("DOMContentLoaded", () => {

    const addTitleAnimation = () => {
        const titleAnimBlock = document.getElementById('title_anim');
        titleAnimBlock.classList.add('title__animated');
    }

    setTimeout(() => addTitleAnimation(), 700);
});
