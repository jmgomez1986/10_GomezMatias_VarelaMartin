{include file="header.tpl"}

    <h1 class="titulo">{$titulo} a la Temporada {$id_temporada}</h1>

    <div class="container  mt-4">

      <form method="post" action="guardarAgregarE" id="confirmationForm" enctype="multipart/form-data">
        
        <input type="hidden" class="form-control" id="idTemp" name="idTemp" value="{$id_temporada}">

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Episodio Nº</label>
          <input type="number" class="form-control" id="idEp" name="idEp" value="{$valoresEpisodio[1]}">
          {if $existencia ne ''}
            <p class="errorForm">El episodio ya existe!!!!</p>
          {/if}
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="tituloForm">Titulo</label>
          <input type="text" class="form-control" id="tituloE" name="tituloE" value="{$valoresEpisodio[2]}">
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="descForm">Descripción</label>
          <textarea name="descE" class="form-control" rows="5" id="descE" form="confirmationForm">{$valoresEpisodio[3]}</textarea>
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="imagen">Agregar imágenes</label>
          <input type="file" id="imagenes" name="imagenes[]">
        </div>

        <button type="submit" class="btn btn-primary mb-4 mt-2">Agregar Episodio</button>
      </form>
    </div>

{include file="footer.tpl"}
