document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelectorAll(".nav-list li a");

    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.parentNode.classList.add("active");
        }
    });

    const burgerButton = document.querySelector(".burger");
    const sidebar = document.querySelector(".sidebar");

    burgerButton.addEventListener("click", () => {
      sidebar.classList.toggle('minimized')
      document.body.classList.toggle("sidebar-minimized");

    });
});
