{include file="header.tpl"}

  {if $logueado}
    {if $rol eq "Limitado"}
      <form class="formComment" method="post" action"">
        <input type="hidden" class="form-control" name="idTemp" value="{$id_temporada}">
        <input type="hidden" class="form-control" name="idEpis" value="{$id_episodio}">
        
        <button type="submit" class="btn btn-primary mb-2 js-addComment">Agregar comentario</button>
      </form>
    {/if}
  {/if}

  <div class="container-fluid mt-5 contenedor_comentarios" data-temp="{$id_temporada}" data-epis="{$id_episodio}" data-logueado="{$logueado}" data-rol="{$rol}">

  </div>

{include file="footer.tpl"}
