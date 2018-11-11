{include file="header.tpl"}

  {if $logueado}
    {if $rol eq "Limitado"}

      <div class="errorForm"></div>
      <form class="formComment" method="post" action="">

        <div class="form-group">
          <input type="hidden" class="form-control" name="idTemp" value="{$id_temporada}">
          <input type="hidden" class="form-control" name="idEpis" value="{$id_episodio}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary m-2 js-addComment">Agregar comentario</button>
        </div>

        <div class="form-group form-check">

          <div class="formRadio">
            <!-- Default checked -->
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radSortAsc" id="radSortAsc" name="radSort" checked="checked">
              <label class="custom-control-label text-white" for="radSortAsc">Orden Ascendente</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radSortDes" id="radSortDes" name="radSort">
              <label class="custom-control-label text-white" for="radSortDes">Orden Descendente</label>
            </div>
            <button type="button" class="btn btn-primary m-2 js-sortComment">Aplicar Orden</button>
          </div>

        </div>

      </form>
    {/if}
  {/if}

  <div class="container-fluid mt-5 contenedor_comentarios" data-temp="{$id_temporada}" data-epis="{$id_episodio}" data-logueado="{$logueado}" data-rol="{$rol}">

  </div>

{include file="footer.tpl"}
