const body = document.querySelector('body');

body.addEventListener('click', (e) => {
  if(e.target.classList.contains('backdrop')) {
    document.querySelector('.backdrop').remove();
  }
});
