{include file="header.tpl"}

  <div class="container-fluid mt-8">
    <form class="form-horizontal" role="form" method="POST" action="registro">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h2 class="text-white">Registro de nuevo usuario</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group text-white">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="col-md-3 field-label-responsive font-weight-bold">
                <label for="name">Nombre</label>
              </div>
              <div class="input-group-addon pr-4">
                <i class="fa fa-user"></i>
              </div>
              <input type="text" name="name" class="form-control" id="name"
                      placeholder="Nombre" required autofocus>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-control-feedback">
            <span class="text-danger align-middle">
              <!-- Put name validation error messages here -->
            </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 text-white">
          <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="col-md-3 field-label-responsive font-weight-bold">
                <label for="email">E-Mail</label>
              </div>
              <div class="input-group-addon pr-4">
                <i class="fa fa-at"></i>
              </div>
              <input type="text" name="email" class="form-control" id="email"
                      placeholder="you@example.com" required autofocus>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-control-feedback">
            <span class="text-danger align-middle">
              <!-- <i class="fa fa-close"> Error en formato de E-mail</i> -->
            </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 text-white">
          <div class="form-group has-danger">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="col-md-3 field-label-responsive font-weight-bold">
                <label for="password">Contraseña</label>
              </div>
              <div class="input-group-addon pr-4">
                <i class="fa fa-key"></i>
              </div>
              <input type="password" name="password" class="form-control" id="password"
                      placeholder="Password" required>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-control-feedback">
            <span class="text-danger align-middle">
              <!-- <i class="fa fa-close"></i> -->
            </span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 text-white">
          <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="col-md-3 field-label-responsive font-weight-bold">
                <label for="password">Confirmar Contraseña</label>
              </div>
              <div class="input-group-addon pr-4">
                <i class="fa fa-repeat"></i>
              </div>
              <input type="password" name="password-confirmation" class="form-control"
              id="password-confirm" placeholder="Password" required>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Registrarse</button>
        </div>
      </div>
    </form>
  </div>

{include file="footer.tpl"}
