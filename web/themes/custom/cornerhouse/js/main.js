// Detect if client browser has JavaScript enabled
document.querySelector('html').classList.replace('no-js', 'js');

const button = document.querySelector('#menu-toggle');
const ul = document.querySelector('#primary-menu');

button.addEventListener('click', () => {
  if (ul.classList.contains('menu--open')) {
    ul.classList.remove('menu--open');
    button.setAttribute('aria-expanded', 'false');
  } else {
    ul.classList.add('menu--open');
    button.setAttribute('aria-expanded', 'true');
  }
});
