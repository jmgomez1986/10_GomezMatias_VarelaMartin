'use strict'
let templateComentarios;

fetch('js/templates/comentarios.handlebars')
.then(response => response.text())
.then(template => {
    templateComentarios = Handlebars.compile(template); // compila y prepara el template

    getComentarios();
});


function getComentarios() {
    let obj = document.querySelector('.contenedor_comentarios');
    let idTemp = obj.dataset.temp;
    let idEpis = obj.dataset.epis;
    let logueado = obj.dataset.logueado;
    let rol = obj.dataset.rol;
    let limitado = false;
    let admin = false;
    if (rol == "Limitado"){
      limitado = true;
    }else{
      if(rol == "Administrador"){
        admin = true;
      }
    }

    let route = "api/comentarios/temporada/" +  idTemp + "/episodio/" + idEpis;
    fetch(route)
    .then(response => response.json())
    .then(jsonComentarios => {
        mostrarComentarios(jsonComentarios,logueado,limitado,admin);
    })
}

function mostrarComentarios(jsonComentarios,logueado,limitado,admin) {
    let context = { // como el assign de smarty
        comentarios: jsonComentarios,
        logueado: logueado,
        limitado: limitado,
        admin: admin
    }
    let html = templateComentarios(context);
    document.querySelector(".contenedor_comentarios").innerHTML = html;
}
