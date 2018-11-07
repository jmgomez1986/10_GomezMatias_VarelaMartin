'use strict';

let templateComentarios;

fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
    templateComentarios = Handlebars.compile(template); // compila y prepara el template

    getComentarios();
});

let btnAddCom = document.querySelector(".js-addComment").addEventListener('click', function(){
  let url       = "agregarComentario/";
  let formAdmin = document.querySelector(".formAddComment").action = url;
});

function getComentarios() {

    let obj      = document.querySelector('.contenedor_comentarios');
    let idTemp   = obj.dataset.temp;
    let idEpis   = obj.dataset.epis;
    let logueado = obj.dataset.logueado;
    let rol      = obj.dataset.rol;

    let route = "api/comentarios/temporada/" +  idTemp + "/episodio/" + idEpis;

    fetch(route)
    .then(response => response.json())
    .then(jsonComentarios => {
        mostrarComentarios(jsonComentarios,logueado,rol,idEpis,idTemp);
    })
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
