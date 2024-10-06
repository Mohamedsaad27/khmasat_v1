// Remove Preloader When load page
window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");

    // Fade out the preloader
    preloader.style.opacity = 0;

    // Remove z-index after the fade out
    setTimeout(() => {
        preloader.classList.remove('z-[50000]');
        preloader.style.display = "none"; // Optionally remove from view
    }, 300); // Match the duration of your fade-out animation (500ms)
})

/* =============== ♥_♥ =============== */

// SHOW PASSWORD 

const passwordIcon = document.querySelectorAll('.password__icon');
const authPassword = document.querySelectorAll('.auth__password');

for (let i = 0; i < passwordIcon.length; ++i) {
    passwordIcon[i].addEventListener('click', (event) => {
        const inputField = event.currentTarget.parentElement.querySelector('input');
        if (event.target.classList.contains('fa-eye-slash')) {
            event.target.classList.remove('fa-eye-slash');
            event.target.classList.add('fa-eye');
            inputField.type = 'text';
        } else {
            event.target.classList.add('fa-eye-slash');
            event.target.classList.remove('fa-eye');
            inputField.type = 'password';
        }
    });
}