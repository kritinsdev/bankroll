
const createBackdrop = () => {
  const body = document.querySelector('body');
  const bdrop = document.createElement('div');
  bdrop.classList.add('backdrop');

  body.appendChild(bdrop);
}

const showLoader = (element) => {
    element.classList.add('relative');
    element.appendChild(createLoaderElement());
}

const createLoaderElement = () => {
  const loaderWrap = document.createElement('div');
  loaderWrap.classList.add('loaderWrap');

  const loader = document.createElement('div');
  loader.classList.add('loader');

  const loaderInner = document.createElement('div');
  loaderInner.classList.add('loaderInner');

  const loaderFirstChild = document.createElement('div');
  const loaderSecondChild = document.createElement('div');
  const loaderThirdChild = document.createElement('div');

  loaderInner.appendChild(loaderFirstChild);
  loaderInner.appendChild(loaderSecondChild);
  loaderInner.appendChild(loaderThirdChild);
  loader.appendChild(loaderInner);
  loaderWrap.appendChild(loader);

  return loaderWrap;
}

const removeChildItems = (element) => {
  while (element.firstChild) {
    element.removeChild(element.firstChild);
  }
}

export {
    showLoader,
    removeChildItems,
}