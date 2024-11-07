const checkbox = document.getElementById("theme-checkbox-admin");

// Load theme from localStorage and set the initial state
document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem("theme") || "light";
  applyTheme(savedTheme);
  checkbox.checked = savedTheme === "dark";
});

// Update localStorage and apply theme when checkbox is toggled
checkbox.addEventListener("change", () => {
  const theme = checkbox.checked ? "dark" : "light";
  setTheme(theme);
});

// Function to update theme in localStorage and apply it to the page
function setTheme(theme) {
  localStorage.setItem("theme", theme);
  applyTheme(theme);
  checkbox.checked = theme === "dark";
}

// Function to apply theme to the body element by adding/removing a class
function applyTheme(theme) {
  document.body.className = ""; // Clear previous theme classes
  document.body.classList.add(theme); // Apply new theme class
}