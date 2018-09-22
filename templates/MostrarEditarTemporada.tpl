{include file="header.tpl"}

    <h1>{$titulo}</h1>

    <div class="container">
      <h2>Formulario</h2>
      <form method="post" action="{$home}/guardarEditar">
        <input type="hidden" class="form-control" id="idForm" name="idForm" value="{$temporada["id_season"]}">

        <div class="form-group">
          <label for="tituloForm">Titulo</label>
          <input disabled type="text" class="form-control" id="tituloForm" name="tituloForm" value="{$temporada["id_season"]}">
        </div>

        <div class="form-group">
          <label for="cantEpForm">Cantidad de episodios</label>
          <input type="text" class="form-control" id="cantEpForm" name="cantEpForm" value="{$temporada["cant_episodes"]}">
        </div>

        <div class="form-group">
          <label for="comienzoForm">Comienzo de Temporada</label>
          <input type="date" class="form-control" id="comienzoForm" name="comienzoForm" value="{$temporada["season_begin"]}">
        </div>

        <div class="form-group">
          <label for="finForm">Fin de Temporada</label>
          <input type="date" class="form-control" id="finForm" name="finForm" value="{$temporada["season_end"]}">
        </div>

        <button type="submit" class="btn btn-primary">Editar Temporada</button>
      </form>
    </div>

{include file="footer.tpl"}
