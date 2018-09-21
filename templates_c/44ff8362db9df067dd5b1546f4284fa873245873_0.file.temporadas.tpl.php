<?php
/* Smarty version 3.1.33, created on 2018-09-21 02:20:44
  from 'C:\xampp\htdocs\Proyectos\Facultad\10_GomezMatias_VarelaMartin\templates\temporadas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ba4395cd8d3e1_59976330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44ff8362db9df067dd5b1546f4284fa873245873' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Proyectos\\Facultad\\10_GomezMatias_VarelaMartin\\templates\\temporadas.tpl',
      1 => 1537488505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5ba4395cd8d3e1_59976330 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

   <div class="contenidoTemporadasEpisodios" name="top">

     <table class="tablaTemporadas">
       <thead>
         <tr>
           <th class="fondoTd" rowspan="2">Temporada</th>
           <th class="fondoTd" rowspan="2">Episodios</th>
           <th class="fondoTd" colspan="2">Emisión original</th>
         </tr>
         <tr>
           <th class="fondoTd">Inicio</th>
           <th class="fondoTd">Final</th>
         </tr>
       </thead>

       <tbody>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['temporadas']->value, 'temporada');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['temporada']->value) {
?>
           <tr>
             <td><?php echo $_smarty_tpl->tpl_vars['temporada']->value["id_season"];?>
</td>
             <td><?php echo $_smarty_tpl->tpl_vars['temporada']->value["cant_episodes"];?>
</td>
             <td><?php echo $_smarty_tpl->tpl_vars['temporada']->value["season_begin"];?>
</td>
             <td><?php echo $_smarty_tpl->tpl_vars['temporada']->value["season_end"];?>
</td>
           </tr>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

       </tbody>
     </table>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
