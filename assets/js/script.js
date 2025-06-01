document.addEventListener("DOMContentLoaded", () => {
    const burger = document.querySelector(".burger");
    const mobileMenu = document.querySelector(".mobile-menu");

    burger.addEventListener("click", () => {
        mobileMenu.classList.toggle("active");

        const icon = burger.querySelector("i");

        if (mobileMenu.classList.contains("active")) {
            icon.classList.remove("fa-bars");
            icon.classList.add("fa-times");
        } else {
            icon.classList.remove("fa-times");
            icon.classList.add("fa-bars");
        }
    });

    // Close mobile menu when clicking nav links
    const mobileLinks = document.querySelectorAll(".mobile-nav-list a");
    mobileLinks.forEach(link => {
        link.addEventListener("click", () => {
            mobileMenu.classList.remove("active");
            const icon = burger.querySelector("i");
            icon.classList.remove("fa-times");
            icon.classList.add("fa-bars");
        });
    });

    const passwordInput = document.getElementById("password"); // ✅ fixed here
    const passwordToggle = document.querySelector(".password-toggle");

    passwordToggle.addEventListener("click", () => {
        const type =
            passwordInput.getAttribute("type") === "password"
                ? "text"
                : "password";
        passwordInput.setAttribute("type", type);

        const icon = passwordToggle.querySelector("i");
        icon.classList.toggle("fa-eye");
        icon.classList.toggle("fa-eye-slash");
    });
});
