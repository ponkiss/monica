document.getElementById("contact-bubble").onclick = function() {
  document.getElementById("contact-modal").style.display = "block";
}

document.querySelector(".close-button").onclick = function() {
  document.getElementById("contact-modal").style.display = "none";
}

window.onclick = function(event) {
  if (event.target == document.getElementById("contact-modal")) {
    document.getElementById("contact-modal").style.display = "none";
  }
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
