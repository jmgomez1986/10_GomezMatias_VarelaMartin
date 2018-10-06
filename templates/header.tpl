<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    {php}
      echo '<base href="http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]).'/" target="_self">';
    {/php}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" type="./image/x-icon" href="./images/stark.ico" />
    <!-- Others Links -->
    <link rel="icon" type="image/x-icon" href="icons/stark.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">

    <title>Guía de Game Of Thrones</title>
  </head>

  <body>

    <header>
      <nav class="navbar navbar-expand-sm navbar-light bg-dark text-white">
        <a class="navbar-brand" href="home"><img class="logoNav" src="./images/GOT_Logo_Vect_Blanco.svg" alt="Logo Game Of Thrones"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-nav mr-auto ml-auto text-center navFont">
            <div class="barNavlink mr-3">
              <a class="nav-item nav-link text-white pr-3" href="home"     target= "_self">INICIO</a>
            </div>
            <div class="barNavlink mr-3">
              <a class="nav-item nav-link text-white pr-3" href="casasGOT" target= "_self">CASAS</a>
            </div>
            <div class="barNavlink mr-3">
              <a class="nav-item nav-link text-white pr-3"  href="map"     target= "_self">MAPA</a>
            </div>
            <div class="barNavlink mr-3">
              <a class="nav-item nav-link text-white pr-3" href="{$link}"  target= "_self">TEMPORADAS</a>
            </div>
          </div>
        </div>
        <form method="post" action="login" class="px-2">
          <button class="{$claseLogin} js-login btn btn-success btn-xs" type="submit">Login</button>
        </form>
        <form method="post" action="logout" class="px-2">
          <button class="{$claseLogout} js-logout btn btn-success btn-xs" type="submit">Logout</button>
        </form>
      </nav>
    </header>
