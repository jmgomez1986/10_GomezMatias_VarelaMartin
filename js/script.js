"use strict";

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

  let contImgMapa = document.querySelector('.contenedorMapa');
  if (contImgMapa != null){
    contImgMapa.addEventListener('click', function(){
        contImgMapa.firstElementChild.classList.toggle('mapaZoom');
        contImgMapa.classList.toggle('contenedorMapaZoom');
    }
  }
}
