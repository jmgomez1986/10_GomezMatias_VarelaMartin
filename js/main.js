'use strict';

document.addEventListener("DOMContentLoaded", loadPage);

let templateComentarios;

function loadPage() {

    fetch('js/templates/comentarios.handlebars')
    .then(response => response.text())
    .then(template => {
        templateComentarios = Handlebars.compile(template); // compila y prepara el template

        getComentarios();
    });

   saveComentarios(); 
}

function getComentarios() {

    let obj      = document.querySelector('.contenedor_comentarios');

    if (obj != null ){
        let idTemp   = obj.dataset.temp;
        let idEpis   = obj.dataset.epis;
        let logueado = obj.dataset.logueado;
        let rol      = obj.dataset.rol;

        let route = "api/comentarios/temporada/" +  idTemp + "/episodio/" + idEpis;

        if ( logueado && rol == "Limitado" ){
            let btnAddCom = document.querySelector(".js-addComment").addEventListener('click', function(){
              let url       = "agregarComentario/";
              let formAdmin = document.querySelector(".formComment").action = url;
            });
        }

        fetch(route)
        .then(response => response.json())
        .then(jsonComentarios => {
            mostrarComentarios(jsonComentarios,logueado,rol,idEpis,idTemp);
        })
    }    
}

function mostrarComentarios(jsonComentarios,logueado,rol,idEpis,idTemp) {
    let context = { // como el assign de smarty
        comentarios: jsonComentarios,
        logueado   : logueado,
        rol        : rol,
        idEpis     : idEpis,
        idTemp     : idTemp
    }

    console.log(jsonComentarios);

    Handlebars.registerHelper('if_eq', function(a, b, opts) {
        if(a == b) // Or === depending on your needs
            return opts.fn(this);
        else
            return opts.inverse(this);
    });

    let html = templateComentarios(context);

    document.querySelector(".contenedor_comentarios").innerHTML = html;
}

function saveComentarios(){

    let btnAddComment = document.querySelector('.js-submitAddComment');

    if ( btnAddComment != null ){

        btnAddComment.addEventListener("click", function(){
            let idUser  = document.querySelector('.idUser').value;
            let idTemp  = document.querySelector('.idTemp').value;
            let idEpis  = document.querySelector('.idEpis').value; 
            let comment = document.querySelector('.comment').value; 
            let score   = document.querySelector('.score').value;   

            // console.log(idUser); 
            // console.log(idTemp); 
            // console.log(idEpis);
            // console.log(comment); 

            let data = {
                        "id_season" : idTemp,
                        "id_episode": idEpis,
                        "id_user"   : idUser,
                        "comment"   : comment,
                        "score"     : score
                       };

            console.log(data);
let url = 'api/comentarios';

  fetch(url, {
        "method" : "POST",
        "mode"   : "cors", //Con esto se hace menos estricta la politica de seguridad de algunos navegadores
        "headers": {
            "Content-Type": "application/json"
        },
        "body"   : JSON.stringify(data) //se debe serializar (stringify) la informacion (el "data:" de ida es de tipo string)
    })//.then( function(response) {
  //       // console.log(response);
  //       if (!response.ok) {

  //       } else
  //           return response.json()
  //     }).then(function(json) {


  //     }).catch(function(e){
  //           let cartelError = container.querySelector(".js-displayError");
  //           showElement(cartelError);
  //           cartelError.innerHTML = "Error de Conexión";
  //           console.log(e)
  //         }
  //       );            
        });
    }

}
