<!DOCTYPE html>
<html>
  <head>

    <base href="//{$smarty.server.SERVER_NAME}{dirname($smarty.server.PHP_SELF)}/" target="_self">

    <title>{$titulo}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="icon" type="./image/x-icon" href="./images/stark.ico" />
    <!-- Others Links -->
    <link rel="icon" type="image/x-icon" href="icons/stark.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <script src='https://www.google.com/recaptcha/api.js'></script>
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
        <form method="post" action="login/" class="px-2">
          <div class="form-group">
            <button class="{$claseLogin} js-login btn btn-success btn-s" type="submit">Login</button>
          </div>
        </form>
        <form method="post" action="logout" class="px-2">
          <div class="form-group">
            <button class="{$claseLogout} js-logout btn btn-success btn-s" type="submit">Logout</button>
          </div>
        </form>
        <form class="px-2" action="registro" method="post">
          <div class="form-group">
            <button class="{$claseReg} js-registrar btn btn-success btn-s" type="submit">Registrarse</button>
          </div>
        </form>
        <form class="px-2" action="Usuarios" method="post">
          <div class="form-group">
            <button class="{$claseAdminUser} js-registrar btn btn-success btn-xs" type="submit">Administrar usuarios</button>
          </div>
        </form>
      </nav>
    </header>

    <div class="container-fluid">
