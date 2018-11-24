'use strict';

document.addEventListener('DOMContentLoaded', loadPage);

function showElement(objectDom)
{
  //Cambio la clase del formulario para que se muestre
  objectDom.classList.add('visible');
  objectDom.classList.remove('oculto');
}

function hideElement(objectDom)
{
  //Cambio la clase del formulario para que se muestre
  objectDom.classList.add('oculto');
  objectDom.classList.remove('visible');
}

function loadPage()
{
  let btnFilter = document.querySelector('.js-filtrarCategoria');
  btnFilter.addEventListener('click', function () {
    let eleccionTemp = document.querySelector('.js-eleccion');
    let temporada    = eleccionTemp.value;

    let elems = document.querySelectorAll('.js-ocultar');
    for (let r = 0; r < elems.length; r++) {
      let temp = elems[r].innerHTML;
      if (temp !== temporada) {
        hideElement(elems[r].parentNode);
      } else {
        showElement(elems[r].parentNode);
      }
    }
  }
);

  let btnReset = document.querySelector('.js_resetFilter');
  btnReset.addEventListener('click', function () {
    let elems = document.querySelectorAll('.js-ocultar');
    for (let r = 0; r < elems.length; r++) {
      showElement(elems[r].parentNode);
    }
  });
}
