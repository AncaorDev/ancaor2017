<!-- method="post" action="panel/pages" -->
<form action="" id="formproyect" method="POST" class="form-horizontal form-label-left" novalidate>
<!-- ITEM -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Usuario: <span class="required">*</span>
  </label>
  <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="user" class="form-control col-md-7 col-xs-12" disabled="" value="<?=$_SESSION['nom_User']?>">
  </div>
</div>
<!-- /ITEM -->

<!-- ITEM -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Nombre de la Proyecto <span class="required">*</span>
  </label>
  <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="nomproyecto" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" name="nomproyecto" placeholder="Ingrese nombre del proyecto" value="<?=isset($detallesproyectobyId[0]['nom_Proyecto']) ? $detallesproyectobyId[0]['nom_Proyecto'] : "" ?>" required="required" type="text">
  </div>
</div>
<!-- /ITEM -->

<!-- ITEM -->
<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Tipo Proyecto: <span class="required">*</span>
  </label>
  <div class="col-md-5 col-sm-5 col-xs-12">
    <select id="tipoproyecto" class="form-control" data-validate-length="1" pattern="numeric" required>
      <option value="">Seleccione una Opción..</option>
    <?php 
       /* foreach ($tiposproyecto as $tiposproyecto) {
          if (isset($detallesproyectobyId)) {
            if ($tipospagina[0] == $detallesproyectobyId[0]['id_TipoPagina']) {
              echo '<option value="'.$tiposproyecto[0].'" selected>'.$tiposproyecto[1].'</option>';
            } else {
              echo '<option value="'.$tiposproyecto[0].'">'.$tiposproyecto[1].'</option>';
            }
          }  else {
            echo '<option value="'.$tiposproyecto[0].'">'.$tiposproyecto[1].'</option>';
          }               
        } */
      ?>          
    </select>
  </div>
</div>
<!-- /ITEM -->
 
<!-- ITEM -->
  <div id="div-enlace" class="item form-group" style="display:none;">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Descripción: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <input type="text" id="descrip" value="<?= isset($detallesproyectobyId) ? $detallesproyectobyId[0]['link_Pagina'] : "" ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,65" name="enlace" required="required" type="text">
    </div>
  </div>
<!-- /ITEM -->

<!-- ITEM -->
  <div id="div-enlace" class="item form-group" style="display:none;">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Enlace: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <input type="text" id="enlace" value="<?= isset($detallesproyectobyId) ? $detallesproyectobyId[0]['link_Pagina'] : "" ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,65" name="enlace" required="required" type="text">
    </div>
  </div>
<!-- /ITEM -->

<!-- USER -->
<input id="iduser" type="hidden" value="<?=$_SESSION['id_User']?>">
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <!-- <button type="reset" class="btn btn-primary">Cancel</button> -->
      <button id="btnenviar" type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Enviar </button>
    </div>
  </div>     
</form>