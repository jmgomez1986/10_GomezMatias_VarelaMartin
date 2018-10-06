{include file="header.tpl"}

    <h1>{$titulo}</h1>

    <div class="container">
      <h2>Agregar temporada</h2>
      <form method="post" action="guardarAgregarT" id="confirmationForm">
        <div class="form-group">
          <label for="tituloForm">Temporada Nº</label>
          <input type="number" class="form-control" id="idTemp" name="idTemp" value="{$valoresTemporada[0]}">
          {if $existencia ne ''}
            <p style="color:red;">La temporada ya existe!!!!</p>
          {/if}
        </div>

        <div class="form-group">
          <label for="cantEpForm">Cantidad de episodios</label>
          <input type="text" class="form-control" id="cantEp" name="cantEp" value="{$valoresTemporada[1]}">
        </div>

        <div class="form-group">
          <label for="comienzoForm">Comienzo de Temporada</label>
          <input type="date" class="form-control" id="comienzoTemp" name="comienzoTemp" value="{$valoresTemporada[2]}">
        </div>

        <div class="form-group">
          <label for="finForm">Fin de Temporada</label>
          <input type="date" class="form-control" id="finTemp" name="finTemp" value="{$valoresTemporada[3]}">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Temporada</button>
      </form>
    </div>

{include file="footer.tpl"}
