<?php

/**
 *
 */
  class TemporadasView
  {

    function __construct()
    {

    }

    function Mostrar(){

?>

      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <link rel="stylesheet" type="text/css" href="css/style.css">
          <link rel="icon" type="image/x-icon" href="stark.ico" />
          <title>Guía de Game Of Thrones</title>
        </head>

        <body>

          <div class="header">
              <div class="logo">
                <a href="index.html"><img src="images/GOT_Logo_Vect_Blanco.svg" alt="Logo Game Of Thrones"></a>
              </div>
              <div class="barraNavegacion">
                <ul>
                  <li><a href="index.html">INICIO</a></li>
                  <li><a href="casas.html">CASAS</a></li>
                  <li><a href="map.html">MAPA</a></li>
                  <li><a href="temporadas.html">TEMPORADAS</a></li>
                </ul>
              </div>  <!-- Fin de "Barra de Navegacion" -->
            </div>

         <div class="contenidoTemporadasEpisodios" name="top">

           <table class="tablaTemporadas">
             <thead>
               <tr>
                 <th class="fondoTd" rowspan="2">Temporada</th>
                 <th class="fondoTd" rowspan="2">Episodios</th>
                 <th class="fondoTd" colspan="2">Emisión original</th>
               </tr>
             </thead>

             <tbody>

             </tbody>
           </table> <!-- FIN TABLA TEMPORADAS -->

           <table class="tablaTemporadas">
             <thead>
               <tr>
                 <th class="fondoTh">N° de Episodio</th>
                 <th class="fondoTh">Titulo</th>
                 <th class="fondoTh"></th>
               </tr>
             </thead>

             <tbody>

             </tbody>
           </table> <!-- FIN TABLA EPISODIOS -->

         </div> <!-- FIN CONTENEDOR TEMPORADAS/EPISODIOS -->

         <div class="pie">
           <div class="textContainerFooter">
             <ul>
               <li><a href="index.html">INICIO</a></li>
               <li><a href="casas.html">CASAS</a></li>
               <li><a href="map.html">MAPA</a></li>
               <li><a href="temporadas.html">TEMPORADAS</a></li>
             </ul>
             <p>Copyright © 2018 GOT Fans. Todos los derechos reservados.</p>
           </div>
           <div class="logoFooter">
             <a href="index.html"><img src="images/GOT_Logo_Vect_Blanco.svg" alt="Logo Game Of Thrones"></a>
           </div>
         </div>

        </body>

      </html>

<?php

    }

  }

 ?>