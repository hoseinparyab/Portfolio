document.addEventListener("DOMContentLoaded", () => {
  const htmlElement = document.documentElement;

  // Load saved theme preference or set default to dark
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark" || !savedTheme) {
    htmlElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
    window.currentTheme = "dark";
  } else {
    htmlElement.classList.remove("dark");
    window.currentTheme = "light";
  }

  // Select all toggle switches
  const toggleSwitches = document.querySelectorAll(".toggle-switch");

  // Function to update all toggle switches UI based on theme
  function updateToggleSwitches(theme) {
    toggleSwitches.forEach((toggleSwitch) => {
      const lightOption = toggleSwitch.querySelector(".light-option");
      const darkOption = toggleSwitch.querySelector(".dark-option");
      const slider = toggleSwitch.querySelector(".toggle-slider");

      if (theme === "dark") {
        darkOption.classList.add("active");
        lightOption.classList.remove("active");
        slider.style.transform = "translateX(0)";
      } else {
        lightOption.classList.add("active");
        darkOption.classList.remove("active");
        slider.style.transform = "translateX(100%)";
      }
    });
  }

  // Initialize toggle switches UI
  updateToggleSwitches(
    htmlElement.classList.contains("dark") ? "dark" : "light"
  );

  // Add click event listener to each toggle switch
  toggleSwitches.forEach((toggleSwitch) => {
    toggleSwitch.addEventListener("click", () => {
      const isDark = htmlElement.classList.contains("dark");
      if (isDark) {
        htmlElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        window.currentTheme = "light";
        updateToggleSwitches("light");
      } else {
        htmlElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
        window.currentTheme = "dark";
        updateToggleSwitches("dark");
      }
    });
  });
});

// Mobile menu overlay toggle
document.addEventListener("DOMContentLoaded", () => {
  const mobileMenuButton = document.querySelector(".mobile-menu-button");
  const mobileMenuOverlay = document.querySelector(".mobile-menu-overlay");
  const mobileMenuClose = document.querySelector(".mobile-menu-close");

  if (mobileMenuButton && mobileMenuOverlay && mobileMenuClose) {
    mobileMenuButton.addEventListener("click", () => {
      mobileMenuOverlay.classList.remove("hide");
      mobileMenuOverlay.classList.add("show");
      mobileMenuOverlay.setAttribute("aria-hidden", "false");
    });

    mobileMenuClose.addEventListener("click", () => {
      mobileMenuOverlay.classList.remove("show");
      mobileMenuOverlay.classList.add("hide");
      mobileMenuOverlay.setAttribute("aria-hidden", "true");
    });
  }
});

// hover effect

document.getElementById("bento-container").onmousemove = (e) => {
  for (const card of document.getElementsByClassName("bento-boxes")) {
    const rect = card.getBoundingClientRect(),
      x = e.clientX - rect.left,
      y = e.clientY - rect.top;

    card.style.setProperty("--mouse-x", `${x}px`);
    card.style.setProperty("--mouse-y", `${y}px`);
  }
};
