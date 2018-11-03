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
    let route = "api/comentarios/temporada/" +  idTemp + "/episodio/" + idEpis;
    fetch(route)
    .then(response => response.json())
    .then(jsonComentarios => {
        mostrarComentarios(jsonComentarios);
    })
}

function mostrarComentarios(jsonComentarios) {
    let context = { // como el assign de smarty
        comentarios: jsonComentarios,
        otra: "hola"
    }
    let html = templateComentarios(context);
    document.querySelector(".contenedor_comentarios").innerHTML = html;
}
