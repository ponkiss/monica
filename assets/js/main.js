
function showModal(modalId) {
  document.getElementById(modalId).style.display = "block";
}


function hideModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}
document.getElementById("contact-bubble").onclick = function() {
  showModal("contact-modal");
}
document.getElementById("logout-button").onclick = function(event) {
  event.preventDefault(); 
  showModal("logout-modal");
}
document.querySelectorAll(".close-button").forEach(button => {
  button.onclick = function() {
      hideModal(button.parentElement.parentElement.id);
  };
});

window.onclick = function(event) {
  if (event.target.classList.contains("contact-modal")) {
      hideModal(event.target.id);
  }
}

document.getElementById("confirm-logout").onclick = function() {
  window.location.href = "/monica/pages/admin/logout/logout.php";
}

document.getElementById("cancel-logout").onclick = function() {
  hideModal("logout-modal");
}

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

document.addEventListener('scroll', checkScroll);

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
