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
   sortComentario();

}

function getComentarios(){

  let url = "api/comentarios/temporada/" +  "{idTemp}" + "/episodio/" + "{idEpis}";

  fetchGetComentario(url);
}

function fetchGetComentario(url){

  let obj = document.querySelector('.contenedor_comentarios');
  let route;

  if (obj != null ){
    let idTemp   = obj.dataset.temp;
    let idEpis   = obj.dataset.epis;
    let logueado = obj.dataset.logueado;
    let rol      = obj.dataset.rol;

    if ( idTemp && idEpis && logueado && rol ){
      route = url.replace("{idTemp}", idTemp);
      route = route.replace("{idEpis}", idEpis);
    }else{
      route = "api/comentarios";
    }

    if ( logueado && rol == "Limitado" ){
      let btnAddCom = document.querySelector(".js-addComment").addEventListener('click', function(){
        let url       = "agregarComentario/";
        let formAdmin = document.querySelector(".formComment").action = url;
      });
    }

    fetch(route)
    .then(response => response.json())
    .then(jsonComentarios => {
      mostrarComentarios(jsonComentarios, logueado, rol, idEpis, idTemp);
      eliminarComentario();
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
          let captchaResult;

          $(".formAddComment").on("submit", function(event) {

              event.preventDefault();
              let serializedData = $(this).serialize();
              $.post('controller/verifyCaptcha.php', serializedData,
                            function(response) {
                              captchaResult = response;
                              postComment(captchaResult, idTemp, idEpis, idUser, comment, score);
                        }
                      );
              }
          );

        });
      }
    }

function postComment(captchaResult, idTemp, idEpis, idUser, comment, score){

  if ( captchaResult === 'OK'){

    if ( score <= 5 ){

      let data = {
        "id_season" : idTemp,
        "id_episode": idEpis,
        "id_user"   : idUser,
        "comment"   : comment,
        "score"     : score
      };

      let url = 'api/comentarios';

      fetch(url, {
        "method" : "POST",
        "mode"   : "cors", //Con esto se hace menos estricta la politica de seguridad de algunos navegadores
        "headers": {
          "Content-Type": "application/json"
        },
        "body"   : JSON.stringify(data) //se debe serializar (stringify) la informacion (el "data:" de ida es de tipo string)
      }).then( function(response) {
        console.log(response);
        if (!response.ok) {

        }else{
          let urlComments = 'comentarios/temporada/' + idTemp + '/episodio/' + idEpis;
          let form = document.querySelector(".formAddComment");
          form.action = urlComments;
          form.submit();

          return response.json();
        }
      }).then(function(json) {
          // console.log(json.information);

      }).catch(function(e){
        let error = document.querySelector(".errorForm");
        error.innerHTML = "Error de Conexión";
        console.log(e)
      });
    }else{
      let error = document.querySelector(".errorForm");
      error.innerHTML = "El valor para el puntaje debe ser etre 0 y 5";
    }
  }else{
    let error = document.querySelector(".errorForm");
    error.innerHTML = "Valide la CAPTCHA para continuar";
  }
}

function sortComentario(){

  let btnSortComment = document.querySelector('.js-sortComment');
  let criterio;

  if ( btnSortComment != null ){

    btnSortComment.addEventListener("click", function(){

        let obj = document.querySelector('.contenedor_comentarios');
        let idTemp   = obj.dataset.temp;
        let idEpis   = obj.dataset.epis;

        let criterioAsc = document.querySelector(".radSortAsc");
        let criterioDes = document.querySelector(".radSortDes");

        if ( criterioAsc.checked ){
            criterio = 'ASC';
        }else if ( criterioDes.checked ){
            criterio = 'DESC';
        }

        let urlSortComments = 'api/comentarios/temporada/' + "{idTemp}" + '/episodio/' + "{idEpis}" + '?Sort=' + criterio;

        fetchGetComentario(urlSortComments);
    });
  }
}

function eliminarComentario(){
let btnEliminar = document.querySelectorAll('.js-eliminar').forEach(btn => btn.addEventListener('click',function(){
  // console.log('jorge');
    let row = (btn.parentNode).parentNode;
    let id = row.dataset.id;
    let url = 'api/comentarios/' + id;

    fetch(url, {
        "method" : "DELETE",
        "mode"   : "cors", //Con esto se hace menos estricta la politica de seguridad de algunos navegadores
        "headers": {
            "Content-Type": "application/json"
          }
    }).then(function(response) {
          // console.log(response);
          if (!response.ok) {
              //showElement(elem);
              let elem = document.querySelector(".errorForm");
              elem.innerHTML =  "Error " + response.status;
          } else {

              row.remove();
          }
        }).catch (function(e) {
            let elem = document.querySelector(".errorForm");
            //showElement(elem);
            elem.innerHTML = "Error de Conexión";
            console.log(e);
          })

  }));


}
