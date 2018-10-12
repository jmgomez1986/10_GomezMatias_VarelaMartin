{include file="header.tpl"}

    <div class="casasPrincConteiner container-fluid">

      <hgroup>
        <div class="container-fluid display-1 text-center titFont pt-3 pb-4">
          <h1>{$casa['titulo']}</h1>
        </div>

        <div class="container-fluid">
          <h2 class="text-center titFont">{$casa['subtitulo']}</h2>
        </div>
      </hgroup>

      <article>
        <div class="container px-4 py-4">
          <p class="text-justify">{$casa['descripcion']}</p>
        </div>

        <header>
          <h3 class="display-4 text-center pb-3 listFont">Miembros de la casa:</h3>
        </header>

        <section>
          <div class="row justify-content-center pb-4">
            {for $i=0 to $cantCol-1}
            <div class="col-sm-4">
              <ul class="list-group">
                {foreach from=$miembros[$i] item=miembro}
                <li class="list-group-item transparencia"><span><img src="./images/Cuervo.svg"></span>{$miembro}</li>
                {/foreach}
              </ul>
            </div>
            {/for}
          </div>
        </section>
      </article>

    </div>

{include file="footer.tpl"}
