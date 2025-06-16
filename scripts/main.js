window.addEventListener('scroll', () => {
  const nav = document.querySelector('.nav-bar');
  nav.classList.toggle('scrolled', window.scrollY > 50);
});
