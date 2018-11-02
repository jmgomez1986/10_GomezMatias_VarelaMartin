  <div class="form-row mt-3 ml-5">
    <div class="mb-3 mb-sm-3">
      <select class="js-eleccion input-lg ml-5">
        <option name="0" selected>Temporadas...</option>
        {foreach from=$temporadas item=temporada}
          <option value="{$temporada["id_season"]}" name="{$temporada["id_season"]}">Temporada N° {$temporada["id_season"]}</option>
        {/foreach}
      </select>
    </div>

    <div class="px-2">
      <button class="js-filtrarCategoria btn btn-success btn-sm" type="button">Filtrar</button>
    </div>
    <div class="px-2">
      <button class="js_resetFilter btn btn-success btn-sm" type="button">Reset</button>
    </div>

  </div>
