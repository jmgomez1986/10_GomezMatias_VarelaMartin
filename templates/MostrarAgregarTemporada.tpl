{include file="header.tpl"}

    <h1>{$titulo}</h1>

    <div class="container">
      <h2>Agregar temporada</h2>
      <form method="post" action="guardarAgregarT" id="confirmationForm">
        <div class="form-group">
          <label for="tituloForm">Temporada Nº</label>
          <input type="number" class="form-control" id="idTemp" name="idTemp">
        </div>

        <div class="form-group">
          <label for="cantEpForm">Cantidad de episodios</label>
          <input type="text" class="form-control" id="cantEp" name="cantEp">
        </div>

        <div class="form-group">
          <label for="comienzoForm">Comienzo de Temporada</label>
          <input type="date" class="form-control" id="comienzoTemp" name="comienzoTemp">
        </div>

        <div class="form-group">
          <label for="finForm">Fin de Temporada</label>
          <input type="date" class="form-control" id="finTemp" name="finTemp">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Temporada</button>
      </form>
    </div>

{include file="footer.tpl"}