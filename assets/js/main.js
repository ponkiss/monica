document.addEventListener('DOMContentLoaded', function() {
  const contactBubble = document.getElementById("contact-bubble");
  const contactModal = document.getElementById("contact-modal");
  const logoutModal = document.getElementById("logout-modal");
  const closeButton = document.querySelectorAll(".close-button");
  const logoutLink = document.querySelector('a[href$="logout/logout.php"]');
  const cancelLogoutButton = document.getElementById("cancel-logout");
  const confirmLogoutButton = document.getElementById("confirm-logout");

  const toggleModalDisplay = (modal, display) => {
    modal.style.display = display;
  };

  const checkScroll = () => {
    const isNearBottom = window.scrollY + window.innerHeight >= document.documentElement.scrollHeight;
    contactBubble.classList.toggle('white-bubble', isNearBottom);
  };

  contactBubble.onclick = () => toggleModalDisplay(contactModal, "block");

  closeButton.forEach(button => {
    button.onclick = () => {
      toggleModalDisplay(contactModal, "none");
      if (logoutModal) toggleModalDisplay(logoutModal, "none");
    };
  });

  if (logoutLink) {
    logoutLink.onclick = (event) => {
      event.preventDefault();
      toggleModalDisplay(logoutModal, "block");
    };
  }

  if (confirmLogoutButton) {
    confirmLogoutButton.onclick = () => {
      window.location.href = "logout/logout.php";
    };
  }

  if (cancelLogoutButton) {
    cancelLogoutButton.onclick = () => toggleModalDisplay(logoutModal, "none");
  }

  window.onclick = (event) => {
    if (event.target === contactModal) toggleModalDisplay(contactModal, "none");
    if (event.target === logoutModal) toggleModalDisplay(logoutModal, "none");
  };

  document.addEventListener('scroll', checkScroll);
  checkScroll();
});
