document.addEventListener("DOMContentLoaded", function () {
  const userMenu = document.querySelector(".user-menu");

  if (userMenu) {
    const toggleBtn = userMenu.querySelector(".dropdown-toggle");
    const dropdown = userMenu.querySelector(".dropdown-menu");

    toggleBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      userMenu.classList.toggle("open");

      if (userMenu.classList.contains("open")) {
        const rect = dropdown.getBoundingClientRect();
        const windowWidth = window.innerWidth;

        if (rect.right > windowWidth) {
          dropdown.style.insetInlineEnd = "auto";
          dropdown.style.insetInlineStart = "0";
        } else {
          dropdown.style.insetInlineEnd = "0";
          dropdown.style.insetInlineStart = "auto";
        }
      }
    });

    document.addEventListener("click", function () {
      userMenu.classList.remove("open");
    });
  }
});

function toggleSidebar() {
  document.getElementById("mobileSidebar").classList.toggle("active");
}

// Dropdown toggle عام للهيدر (يشمل اللغات والحساب لو حبيت)
document.addEventListener("click", function (e) {
  // أغلق أي Dropdown مفتوح إن الكليك خارج
  document
    .querySelectorAll(".app-header .dropdown.open")
    .forEach(function (dd) {
      if (!dd.contains(e.target)) dd.classList.remove("open");
    });

  // افتح/أغلق الحالي
  const toggle = e.target.closest(".app-header .dropdown .dropdown-toggle");
  if (toggle) {
    const dd = toggle.closest(".dropdown");
    dd.classList.toggle("open");
    e.preventDefault();
  }
});
