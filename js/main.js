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
    console.log(obj.dataset);
    /*fetch("api/comentarios/temporada/:ID1/episodio/:ID2")
    .then(response => response.json())
    .then(jsonComentarios => {
        mostrarComentarios(jsonComentarios);
    })*/
}

function mostrarComentarios(jsonComentarios) {
    let context = { // como el assign de smarty
        comentarios: jsonComentarios,
        otra: "hola"
    }
    let html = templateComentarios(context);
    document.querySelector(".contenedor_comentarios").innerHTML = html;
}
