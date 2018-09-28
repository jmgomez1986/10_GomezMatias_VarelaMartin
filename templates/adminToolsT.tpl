<form class="formAdmin" method="post">
  <div class="form-row mt-3">
    <div class="mb-3 mb-sm-3">
      <select class="js-eleccionT input-lg ml-4">
        <option value="0" selected>Temporadas...</option>
        {foreach from=$temporadasID item=temporada}
          <option value="{$temporada["id_season"]}">Temporada N° {$temporada["id_season"]}</option>
        {/foreach}
      </select>
    </div>


    <div class="px-2">
      <button class="js-eds btn btn-success btn-sm" type="submit">Editar</button>
    </div>
    <div class="px-2">
      <button class="js-ele btn btn-success btn-sm" type="submit">Eliminar</button>
    </div>
    <div class="px-2">
      <button class="js-age btn btn-success btn-sm" type="submit">Agregar</button>
    </div>

  </div>
</form>
