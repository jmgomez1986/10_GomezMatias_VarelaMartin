"use strict";

document.addEventListener("DOMContentLoaded", loadPage);

function loadPage() {

  // let contImgMapa = document.querySelector('.contenedorMapa');

  // contImgMapa.addEventListener('click', function(){
  //     contImgMapa.firstElementChild.classList.toggle('mapaZoom');
  //     contImgMapa.classList.toggle('contenedorMapaZoom');
  //   }
  // )

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
    let eleccionTemp = document.querySelector(".js-eleccionTE");
    let indexT       = eleccionTemp.selectedIndex;
    let temporada    = eleccionTemp.value;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    let eleccionEp   = document.querySelector(".js-eleccionE");
    let episodio     = eleccionEp.value;
    let indexE       = eleccionEp.selectedIndex;
    let episodioID   = eleccionEp.options[indexE].getAttribute("name");

    let respuesta = confirm("¿Seguro que desea eliminar el episodio " + episodioID + " de la temporada " + temporadaID + "?????");

    if (respuesta == true) {
        let url       = 'eliminarE/' + temporadaID + "/" + episodioID + "/";
        //let formAdmin = document.querySelector(".formAdminE").action = url;

        // let alertS = document.createElement("span");
        // alertS.setAttribute("class", "closebtn");
        // alertS.setAttribute("onclick","this.parentElement.style.display='none';");
        // alertS.innerHTML ="&times;";
        //
        // let textAlert = document.createTextNode("<strong>Danger!</strong> Indicates a dangerous or potentially negative action.");
        //
        // let divAlert = document.querySelector(".alert");
        // divAlert.appendChild(alertS);
        // divAlert.appendChild(textAlert);

        let dialogAlert = document.createElement("dialog");
        dialogAlert.open = true;
        dialogAlert.innerHTML = "Episodio Eliminado!!!";

        let alertSpan = document.createElement("span");
        alertSpan.setAttribute("class", "closebtn");
        alertSpan.setAttribute("onclick","this.parentElement.style.display='none';");
        alertSpan.innerHTML ="&times;";
        let alertP = document.createElement("p");
        alertP.innerHTML = "Episodio Eliminado!!!";

        let divAlertDialog = document.createElement("div");
        divAlertDialog.setAttribute("class", "alert");
        divAlertDialog.appendChild(alertSpan);
        divAlertDialog.appendChild(alertP);

        let divAlert = document.querySelector(".dialog");
        // divAlert.appendChild(alertSpan);
        divAlert.appendChild(alertP);
        //divAlert.appendChild(divAlertDialog);
        //divAlert.appendChild(dialogAlert);

        //console.log(divAlert);

        // $( function() {
        //   $( ".dialog" ).dialog();
        // } );

        $( ".dialog" ).dialog({
          dialogClass: "no-close",
          buttons: [
            {
              text: "OK",
              click: function() {
                $( this ).dialog( "close" );
              }
            }
          ]
        });

    } else {
        alert("Accion cancelada");
    }

  });

  let btnAgregarEpisodio = document.querySelector(".js-age").addEventListener('click', function(){
    let eleccionTemp = document.querySelector(".js-eleccionTE");
    let temporada    = eleccionTemp.value;
    let indexT       = eleccionTemp.selectedIndex;
    let temporadaID  = eleccionTemp.options[indexT].getAttribute("name");

    // let eleccionEp   = document.querySelector(".js-eleccionE");
    // let episodio     = eleccionEp.value;
    // let indexE       = eleccionEp.selectedIndex;
    // let episodioID   = eleccionEp.options[indexE].getAttribute("name");

    if ( ( temporadaID === "0" ) ){
      alert("Elija una temporada");
    }
    else{
      let url       = 'agregarE/' + temporadaID + "/";

      let formAdmin = document.querySelector(".formAdminE").action = url;
    }

  });

}
