{include file="header.tpl"}

    <h1 class="titulo">{$titulo}</h1>

    <div class="container mt-4">
      <form method="post" action="guardarAgregarT" id="confirmationForm">
        <div class="form-group">
          <label class=" text-white font-weight-bold" for="tituloForm">Temporada Nº</label>
          <input type="number" class="form-control" id="idTemp" name="idTemp" value="{$valoresTemporada[0]}">
          {if $existencia ne ''}
            <p class="errorForm">La temporada ya existe!!!!</p>
          {/if}
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="cantEpForm">Cantidad de episodios</label>
          <input type="text" class="form-control" id="cantEp" name="cantEp" value="{$valoresTemporada[1]}">
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="comienzoForm">Comienzo de Temporada</label>
          <input type="date" class="form-control" id="comienzoTemp" name="comienzoTemp" value="{$valoresTemporada[2]}">
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="finForm">Fin de Temporada</label>
          <input type="date" class="form-control " id="finTemp" name="finTemp" value="{$valoresTemporada[3]}">
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-5">Agregar Temporada</button>
      </form>
    </div>

{include file="footer.tpl"}
