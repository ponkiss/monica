// Función para mostrar el modal
function showModal(modalId) {
  document.getElementById(modalId).style.display = "block";
}

// Función para ocultar el modal
function hideModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}

// Evento para mostrar el modal de contacto cuando se haga clic en la burbuja de contacto
document.getElementById("contact-bubble").onclick = function() {
  showModal("contact-modal");
}

// Evento para mostrar el modal de confirmación de logout cuando se haga clic en LOG OUT
document.getElementById("logout-button").onclick = function(event) {
  event.preventDefault(); // Previene la acción por defecto del enlace
  showModal("logout-modal");
}

// Evento para cerrar el modal cuando se haga clic en el botón de cerrar (x)
document.querySelectorAll(".close-button").forEach(button => {
  button.onclick = function() {
      hideModal(button.parentElement.parentElement.id);
  };
});

// Evento para cerrar el modal cuando se haga clic fuera del contenido del modal
window.onclick = function(event) {
  if (event.target.classList.contains("contact-modal")) {
      hideModal(event.target.id);
  }
}

// Eventos para los botones de confirmación de logout
document.getElementById("confirm-logout").onclick = function() {
  window.location.href = "/monica/pages/admin/logout/logout.php";
}

document.getElementById("cancel-logout").onclick = function() {
  hideModal("logout-modal");
}

// Función para verificar el desplazamiento y cambiar el estilo de la burbuja de contacto
function checkScroll() {
  const scrollTop = window.scrollY;
  const windowHeight = window.innerHeight;
  const documentHeight = document.documentElement.scrollHeight;
  const contactBubble = document.getElementById("contact-bubble");

  if (scrollTop + windowHeight >= documentHeight) {
      contactBubble.classList.add('white-bubble');
  } else {
      contactBubble.classList.remove('white-bubble');
  }
}

// Agregar evento de scroll para la burbuja de contacto
document.addEventListener('scroll', checkScroll);

// Verificar el estado inicial al cargar la página
window.addEventListener('load', function() {
  checkScroll();

  const windowHeight = window.innerHeight;
  const documentHeight = document.documentElement.scrollHeight;
  const contactBubble = document.getElementById("contact-bubble");

  if (windowHeight >= documentHeight) {
      contactBubble.classList.add('white-bubble');
  } else {
      contactBubble.classList.remove('white-bubble');
  }
});
