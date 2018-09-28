"use strict";

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

  // let contImgMapa = document.querySelector('.contenedorMapa');

  // contImgMapa.addEventListener('click', function(){
  //     contImgMapa.firstElementChild.classList.toggle('mapaZoom');
  //     contImgMapa.classList.toggle('contenedorMapaZoom');
  //   }
  // )

  //Opcion elegida de la lista desplegable de Temporadas
  let eleccionDropdownTemp = document.querySelector(".js-eleccionT");

  eleccionDropdownTemp.addEventListener('click', function(){
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

  let btnEditarTemporada = document.querySelector(".js-edt").addEventListener('click', function(){
    let eleccionTemp = document.querySelector(".js-eleccionT");
    let temporada    = eleccionTemp.value;

    let url       = 'editarT/' + temporada + "/";
    let formAdmin = document.querySelector(".formAdmin").action = url;

  });

  let btnEditarEpisodio = document.querySelector(".js-eds").addEventListener('click', function(){
    let eleccionTemp = document.querySelector(".js-eleccionT");
    let temporada    = eleccionTemp.value;
    let eleccionEp   = document.querySelector(".js-eleccionE");
    let episodio     = eleccionEp.value;

    let url       = 'editarE/' + temporada + "/" + episodio + "/";
    let formAdmin = document.querySelector(".formAdmin").action = url;

  });
  

}
