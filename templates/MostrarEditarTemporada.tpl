{include file="header.tpl"}

    <h1 class="titulo mb-3">{$titulo}</h1>

    <div class="container">
      <form method="post" action="guardarEditarT">
        <input type="hidden" class="form-control" id="idForm" name="idForm" value="{$temporada["id_season"]}">

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Titulo</label>
          <input disabled type="text" class="form-control" id="tituloForm" name="tituloForm" value="{$temporada["id_season"]}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="cantEpForm">Cantidad de episodios</label>
          <input type="text" class="form-control" id="cantEpForm" name="cantEpForm" value="{$temporada["cant_episodes"]}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="comienzoForm">Comienzo de Temporada</label>
          <input type="date" class="form-control" id="comienzoForm" name="comienzoForm" value="{$temporada["season_begin"]}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="finForm">Fin de Temporada</label>
          <input type="date" class="form-control" id="finForm" name="finForm" value="{$temporada["season_end"]}">
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-5">Editar Temporada</button>
      </form>
    </div>

{include file="footer.tpl"}
