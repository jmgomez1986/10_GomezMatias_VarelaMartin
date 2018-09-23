<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

      {php}
        echo '<base href="http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/" target="_blank">';
      {/php}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" type="./image/x-icon" href="./images/stark.ico" />
    <title>Guía de Game Of Thrones</title>
  </head>

  <body>

    <div class="header">
        <div class="logo">
          <a href="home"><img src="./images/GOT_Logo_Vect_Blanco.svg" alt="Logo Game Of Thrones"></a>
        </div>
        <div class="barraNavegacion">
          <ul>
            <li><a href="home"       target= "_self">INICIO</a></li>
            <li><a href="casasGOT"     target= "_self">CASAS</a></li>
            <li><a href="map"        target= "_self">MAPA</a></li>
            <li><a href="temporadas" target= "_self">TEMPORADAS</a></li>
          </ul>
        </div>  <!-- Fin de "Barra de Navegacion" -->
      </div>
