"use strict";

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

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

/****************************************/
/*********** ABM de Temporadas **********/
/****************************************/

  let btnEditarTemporada = document.querySelector(".js-edt").addEventListener('click', function(){
    let eleccionTemp = document.querySelector(".js-eleccionT");
    let temporada    = eleccionTemp.value;

    let indexT       = eleccionTemp.selectedIndex;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    if ( temporadaID === "0" ){
      alert("Elija una temporada");
    }
    else{
      let url       = 'editarT/' + temporadaID + "/";
      let formAdmin = document.querySelector(".formAdmin").action = url;
    }

  });

  let btnAgregarTemp = document.querySelector(".js-agt").addEventListener('click',function(){
    let url = 'agregarT' + "/";
    let formAdmin = document.querySelector(".formAdmin").action = url;
  })

  let btnEliminarTemp = document.querySelector(".js-elt").addEventListener('click',function(){
    let eleccionTemp = document.querySelector(".js-eleccionT");
    let temporada    = eleccionTemp.value;

    let indexT       = eleccionTemp.selectedIndex;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    if ( temporadaID === "0" ){
      alert("Elija una temporada");
    }
    else{

      let respuesta = confirm("¿Seguro que desea eliminar la temporada " + temporadaID + "?????");
      if (respuesta == true) {
        let url       = 'eliminarT/' + temporadaID + "/";
        let formAdmin = document.querySelector(".formAdmin").action = url;
        alert("Temporada Eliminada!!!");
      }
      else{
        let url       = "temporadasAdmin/";
        let formAdmin = document.querySelector(".formAdmin").action = url;
        alert("Accion cancelada");
      }
    }
  })

/**************************************/
/********** ABM de Episodios **********/
/**************************************/

  //Opcion elegida de la lista desplegable de Temporadas para filtrar la lista desplegable de episodios
  let eleccionDropdownTemp = document.querySelector(".js-eleccionTE");

  eleccionDropdownTemp.addEventListener('click', function(){
    //Lista desplegable de Episodios
    let dropdownEp = document.querySelectorAll(".js-eleccionE");

    dropdownEp.forEach(function(ep){

       for (let i = 0; i < ep.options.length; i++) {
         if ( eleccionDropdownTemp.value == '0' ){
           showElement(ep.options[i]);
        }
        else if (ep.options[i].value != eleccionDropdownTemp.value ) {
          hideElement(ep.options[i]);
        }
        else {
          showElement(ep.options[i]);
        }
      }
    });

  });

  let btnEditarEpisodio = document.querySelector(".js-ede").addEventListener('click', function(){
    let eleccionTemp = document.querySelector(".js-eleccionTE");
    let temporada    = eleccionTemp.value;
    let indexT       = eleccionTemp.selectedIndex;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    let eleccionEp   = document.querySelector(".js-eleccionE");
    let episodio     = eleccionEp.value;
    let indexE       = eleccionEp.selectedIndex;
    let episodioID   = eleccionEp.options[indexE].getAttribute("name");

    if ( ( temporadaID === "0" ) || ( episodioID === "0" ) ){
      alert("Elija una temporada y un episodio");
    }
    else{
      let url       = 'editarE/' + temporadaID + "/" + episodioID + "/";

      let formAdmin = document.querySelector(".formAdminE").action = url;
    }

  });

  let btnEliminarEpisodio = document.querySelector(".js-ele").addEventListener('click', function(){
    let answer;
    let eleccionTemp = document.querySelector(".js-eleccionTE");
    let indexT       = eleccionTemp.selectedIndex;
    let temporada    = eleccionTemp.value;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    let eleccionEp   = document.querySelector(".js-eleccionE");
    let episodio     = eleccionEp.value;
    let indexE       = eleccionEp.selectedIndex;
    let episodioID   = eleccionEp.options[indexE].getAttribute("name");

    if ( ( temporadaID === "0" ) || ( episodioID === "0" ) ){
        alert("Elija una temporada y un episodio");
    }
    else{

      let respuesta = confirm("¿Seguro que desea eliminar el episodio " + episodioID + " de la temporada " + temporadaID + "?????");
      if (respuesta == true) {
        let url       = 'eliminarE/' + temporadaID + "/" + episodioID + "/";
        let formAdmin = document.querySelector(".formAdminE").action = url;
        alert("Episodio Eliminado!!!");
      }else {
        let url       = "temporadasAdmin/";
        let formAdmin = document.querySelector(".formAdminE").action = url;
        alert("Accion cancelada");
      }
    }

  });

  let btnAgregarEpisodio = document.querySelector(".js-age").addEventListener('click', function(){
    let eleccionTemp = document.querySelector(".js-eleccionTE");
    let temporada    = eleccionTemp.value;
    let indexT       = eleccionTemp.selectedIndex;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    if ( ( temporadaID === "0" ) ){
      alert("Elija una temporada");
    }
    else{
      let url       = 'agregarE/' + temporadaID + "/";

      let formAdmin = document.querySelector(".formAdminE").action = url;
    }

  });

}
