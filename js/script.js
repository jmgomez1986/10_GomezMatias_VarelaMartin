"use strict";

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

  let contImgMapa = document.querySelector('.contenedorMapa');

  contImgMapa.addEventListener('click', function(){
      contImgMapa.firstElementChild.classList.toggle('mapaZoom');
      contImgMapa.classList.toggle('contenedorMapaZoom');
    }
  )

  //Opcion elegida de la lista desplegable de Temporadas
  let eleccionDropdownTemp = document.querySelector(".js-eleccionT");

  eleccionDropdownTemp.addEventListener('click', function(){
    // console.log(eleccionDropdownTemp.value);
    //Lista despplegable de Episodios
    let dropdownEp = document.querySelectorAll(".js-eleccionE");

    dropdownEp.forEach(function(ep){
       // console.log(ep.options);
       for (let i = 0; i < ep.options.length; i++) {
         // console.log(ep.options[i].value);
         if ( eleccionDropdownTemp.value == '0' ){
           showElement(ep.options[i]);
        }
        else if (ep.options[i].value != eleccionDropdownTemp.value ) {
          hideElement(ep.options[i]);
          // console.log(ep.options[i]);
        }
        else {
          showElement(ep.options[i]);
        }
      }
    });

  });

}

function showElement(objectDom){
  //Cambio la clase del formulario para que se muestre
  objectDom.classList.add("visible");
  objectDom.classList.remove("oculto");
}

function hideElement(objectDom){
  //Cambio la clase del formulario para que se muestre
  objectDom.classList.add("oculto");
  objectDom.classList.remove("visible");
}
