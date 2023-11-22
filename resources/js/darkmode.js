//  // app.js
//  function darkExpected() {
//   return localStorage.theme === 'dark' || (!('theme' in localStorage) &&
//       window.matchMedia('(prefers-color-scheme: dark)').matches);
// }

// function initDarkMode() {
//   // On page load or when changing themes, best to add inline in `head` to avoid FOUC
//   if (darkExpected()) document.documentElement.classList.add('dark');
//   else document.documentElement.classList.remove('dark');
// }

// function showContent() {
//   document.body.style.visibility = 'visible';
//   document.body.style.opacity = 1;
// }

// document.addEventListener("DOMContentLoaded", function() {
//   // Agregar evento de clic al botón
//   const darkModeButton = document.getElementById('darkModeButton');
//   darkModeButton.addEventListener("click", function() {
//       if (darkExpected()) localStorage.theme = 'light';
//       else localStorage.theme = 'dark';
//       initDarkMode();

//       // Desencadenar el evento personalizado "toggle-darkmode"
//       const event = new Event("toggle-darkmode");
//       window.dispatchEvent(event);
//   });

//   // Inicializar el modo oscuro
//   initDarkMode();
//   showContent();
// });