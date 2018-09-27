"use strict";

// let contImgMapa = document.querySelector('.contenedorMapa');
//
// contImgMapa.addEventListener('click', function(){
//     contImgMapa.firstElementChild.classList.toggle('mapaZoom');
//     contImgMapa.classList.toggle('contenedorMapaZoom');
//   }
// )

//Opcion elegida de la lista desplegable de Temporadas
let eleccionDropdownTemp = document.querySelector(".js-eleccionT");

eleccionDropdownTemp.addEventListener('click', function(){
  // console.log(eleccionDropdownTemp.value);
  //Lista despplegable de Episodios
  let dropdownEp = document.querySelectorAll(".js-eleccionE");

  // for (let i = 0; i < dropdownEp.options.length; i++) {
    // console.log(dropdownEp[i].value);
    // if ( dropdownEp[i].value === eleccionDropdownTemp.value ){
      // console.log(dropdownEp);
      // hideElement(dropdownEp[i]);
    // }
  // }

  dropdownEp.forEach(function(ep){
     console.log(ep.options);
     for (let i = 0; i < ep.options.length; i++) {
       // console.log(ep.options[i].value);
    if ( ep.value != eleccionDropdownTemp.value ){
      console.log(ep.value);
      // ep.option.disabled = "disabled";
      // ep.options.display = "dnone";
      hideElement(ep);
    }
  }
  });

});



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
