{include file="header.tpl"}

    <form class="" action="GuardarAdminUsuarios" method="post">

      <div class="contenidoTemporadasEpisodios">

        <table class="tablaTemporadas table">

          <thead>
            <tr>
              <th class="fondoTh align-middle text-center" colspan="2">Usuarios</th>
              <th class="fondoTh align-middle text-center" colspan="2">Rol</th>
              <th class="fondoTh align-middle text-center" rowspan="2">Eliminar</th>
            </tr>
            <tr>
              <th class="fondoTh align-middle text-center">Nombre</th>
              <th class="fondoTh align-middle text-center">E-mail</th>
              <th class="fondoTh align-middle text-center">Administrador</th>
              <th class="fondoTh align-middle text-center">Limitado</th>
            </tr>
          </thead>

          <tbody>
            {foreach from=$usuarios item=usuario}
              <tr class="font-weight-bold">

                <td class="fondoTd colE5 align-middle">{$usuario["name"]}</td>
                <td class="fondoTd colE10 align-middle">{$usuario["email"]}</td>

                {if $usuario["rol"] == "Administrador"}
                <td class="fondoTd colE5">
                  <div class="form-check custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="{$usuario["id_user"]}-1" name="{$usuario["id_user"]}-1" value="Administrador" checked>
                    <label class="custom-control-label mb-3" for="{$usuario["id_user"]}-1"></label>
                  </div>
                </td>

                <td class="fondoTd colE5">
                  <div class="form-check custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$usuario["id_user"]}-2" name="{$usuario["id_user"]}-1" value="Limitado">
                    <label class="custom-control-label mb-3" for="{$usuario["id_user"]}-2"></label>
                  </div>
                </td>
              {else}
                <td class="fondoTd colE5">
                  <div class="form-check custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$usuario["id_user"]}-1" name="{$usuario["id_user"]}-2" value="Administrador">
                    <label class="custom-control-label mb-3" for="{$usuario["id_user"]}-1"></label>
                  </div>
                </td>

                <td class="fondoTd colE5">
                  <div class="form-check custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="{$usuario["id_user"]}-2" name="{$usuario["id_user"]}-2" value="Limitado" checked>
                    <label class="custom-control-label mb-3" for="{$usuario["id_user"]}-2"></label>
                  </div>
                </td>
              {/if}
              <td class="fondoTd colE5">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="{$usuario["id_user"]}" name="{$usuario["id_user"]}" value="{$usuario["id_user"]}">
                  <label class="custom-control-label mb-3" for="{$usuario["id_user"]}"></label>
                </div>
              </td>
            </tr>
            {/foreach}
          </tbody>

        </table>
      </div>

      <div class="form-group text-center">
        <button class="btn btn-success btn-m" type="submit">Guardar modificaciones</button>
      </div>

    </form>

{include file="footer.tpl"}
