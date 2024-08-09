document.addEventListener('DOMContentLoaded', function() {
  const contactBubble = document.getElementById("contact-bubble");
  const contactModal = document.getElementById("contact-modal");
  const closeButton = document.querySelector(".close-button");

  const toggleModalDisplay = (display) => {
    contactModal.style.display = display;
  };

  const checkScroll = () => {
    const isNearBottom = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight;
    contactBubble.classList.toggle('white-bubble', isNearBottom);
  };

  contactBubble.onclick = () => toggleModalDisplay("block");
  closeButton.onclick = () => toggleModalDisplay("none");

  window.onclick = (event) => {
    if (event.target === contactModal) toggleModalDisplay("none");
  };

  document.addEventListener('scroll', checkScroll);
  checkScroll();
});
