"use strict";

let contImgMapa = document.querySelector('.contenedorMapa');

contImgMapa.addEventListener('click', function(){
    contImgMapa.firstElementChild.classList.toggle('mapaZoom');
    contImgMapa.classList.toggle('contenedorMapaZoom');
  }
)
