document.addEventListener('DOMContentLoaded', () => {
  // Mobile nav toggle
  const toggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');
  if (toggle) toggle.addEventListener('click', () => navLinks.classList.toggle('open'));

  // Active nav link
  const path = window.location.pathname;
  document.querySelectorAll('.nav-links a').forEach(a => {
    if (path.includes(a.getAttribute('href'))) a.classList.add('active');
  });

  // Lightbox
  const lightbox = document.getElementById('lightbox');
  if (lightbox) {
    document.querySelectorAll('.galeri-item').forEach(item => {
      item.addEventListener('click', () => {
        const src = item.querySelector('img')?.src;
        if (src) { lightbox.querySelector('img').src = src; lightbox.classList.add('active'); }
      });
    });
    document.querySelector('.lightbox-close')?.addEventListener('click', () => lightbox.classList.remove('active'));
    lightbox.addEventListener('click', e => { if (e.target === lightbox) lightbox.classList.remove('active'); });
  }

  // Scroll reveal
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.style.opacity = 1; e.target.style.transform = 'translateY(0)'; } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.berita-card, .bidang-card, .pengurus-card, .galeri-item').forEach(el => {
    el.style.opacity = 0; el.style.transform = 'translateY(24px)'; el.style.transition = '.5s ease';
    observer.observe(el);
  });
});
