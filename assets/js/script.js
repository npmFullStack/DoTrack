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

  const mobileLinks = document.querySelectorAll(".mobile-nav-list a");
  mobileLinks.forEach(link => {
    link.addEventListener("click", () => {
      mobileMenu.classList.remove("active");
      const icon = burger.querySelector("i");
      icon.classList.remove("fa-times");
      icon.classList.add("fa-bars");
    });
  });

  const passwordInput = document.getElementById("password");
  const passwordToggle = document.querySelector(".password-toggle");

  if (passwordToggle && passwordInput) {
    passwordToggle.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);
      const icon = passwordToggle.querySelector("i");
      icon.classList.toggle("fa-eye");
      icon.classList.toggle("fa-eye-slash");
    });
  }

  // ✅ Support multiple dropdowns
  const toggles = document.querySelectorAll(".dropdown-toggle");

  toggles.forEach(toggle => {
    toggle.addEventListener("click", (e) => {
      e.stopPropagation(); // Prevent outside click from closing it immediately
      const menu = toggle.nextElementSibling;

      // Close other dropdowns
      document.querySelectorAll(".dropdown-menu").forEach(m => {
        if (m !== menu) m.style.display = "none";
      });

      // Toggle current
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    });
  });

  // Close all dropdowns when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".card-head")) {
      document.querySelectorAll(".dropdown-menu").forEach(menu => {
        menu.style.display = "none";
      });
    }
  });
});
