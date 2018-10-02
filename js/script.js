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

  let btnLoginClick = document.querySelector(".js-login").addEventListener('click', function(){
      let btnLogin  = document.querySelector(".js-login")
      let btnLogout = document.querySelector(".js-logout");
      
      hideElement(btnLogin);
      showElement(btnLogout);
    }
  )

  let btnLogoutClick = document.querySelector(".js-logout").addEventListener('click', function(){
      let btnLogin  = document.querySelector(".js-login");
      let btnLogout = document.querySelector(".js-logout")
      hideElement(btnLogout);
      showElement(btnLogin);
    }
  )  

}