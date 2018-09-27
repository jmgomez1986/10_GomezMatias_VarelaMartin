{include file="header.tpl"}

  <form>
    <div class="form-row mt-3">
      <div class="col-md-2 mb-3 mb-sm-3">
        <select class="js-eleccionT custom-select ">
          <option value="0" selected>Temporadas...</option>
          {foreach from=$temporadas item=temporada}
            <option value="{$temporada["id_season"]}">Temporada N° {$temporada["id_season"]}</option>
          {/foreach}
        </select>
      </div>

      <div class="col-md-4">
        <select class="js-eleccionE custom-select ">
          <option selected>Episodios...</option>
            {foreach from=$episodios item=episodio}
              <option value="{$episodio["id_season"]}">{$episodio["id_season"]}Episodio N° {$episodio["id_episode"]} - {$episodio["episode_title"]}</option>
            {/foreach}
        </select>
      </div>
      <div class="px-3">
        <button class="btn btn-success" type="button">Editar</button>
      </div>
      <div class="px-3">
        <button class="btn btn-success" type="button">Eliminar</button>
      </div>
      <div class="px-3">
        <button class="btn btn-success" type="button">Agregar Temporada</button>
      </div>
      <div class="px-3">
        <button class="btn btn-success" type="button">Agregar Episodio</button>
      </div>

    </div>
  </form>

{include file="footer.tpl"}
