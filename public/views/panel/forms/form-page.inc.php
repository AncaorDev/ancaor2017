<!-- method="post" action="panel/pages" -->
<form action="" id="form_page" method="POST" class="form-horizontal form-label-left" novalidate>
  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Usuario: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <input id="user" name="name_User" class="form-control col-md-7 col-xs-12" disabled="" value="<?=$_SESSION['name_User']?>">
    </div>
  </div>
  <!-- /ITEM -->

  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Título de la Página <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="title_Page" name="title_Page" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" placeholder="Ingrese el título de la página" value="<?= $datos['det'] ? $datos['datos'][0]['title_Page'] : "" ?>" required="required" type="text">
    </div>
  </div>
  <!-- /ITEM -->
  
  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Atributo de Pagina: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <select id="id_AttributePage" name="id_AttributePage" class="form-control" data-validate-length="1" pattern="numeric" required>
        <option value="">Seleccione una Opción..</option>
        <?php foreach ($datos['attributepage'] as $atrPage) {
          if ($datos['det']) {
            if ($atrPage[0] == $datos['datos'][0]['id_AttributePage']) {
              echo '<option value="'.$atrPage[0].'" selected>'.$atrPage[1].'</option>';
            } else {
              echo '<option value="'.$atrPage[0].'">'.$atrPage[1].'</option>';
            }
          }  else {
            echo '<option value="'.$atrPage[0].'">'.$atrPage[1].'</option>';
          }               
        }
        ?>            
      </select>
    </div>
  </div>
  <!-- /ITEM -->

  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="text">
      Slug o Enlace de la Página <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="title_Page" name="title_Page" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" placeholder="Ingrese el título de la página" value="<?= $datos['det'] ? $datos['datos'][0]['title_Page'] : "" ?>" required="required" type="text">
    </div>
  </div>
  <!-- /ITEM -->

 <div class="radio">

</div>
  <!-- /ITEM -->

  <!-- USER -->
  <input id="id_User" name="id_User" type="hidden" value="<?=$_SESSION['id_User']?>">
  <!-- ACTION -->
  <input id="action" name="action" type="hidden" value="<?=$datos['det'] ? 'actualizar' : 'registrar'?>">
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      
      <button id="btnenviar" type="submit" class="btn btn-success" disabled><i class="fa fa-paper-plane"></i> Guardar </button>
      <button type="reset" class="btn btn-danger">Limpiar</button>
    </div>
  </div>
</form>
<p>Atributo de la Página:
<li> Sección: Dirección interna hacia una sección de la web, esta se creará según una plantilla</li>
<li> Enlace: Dirección URL externa (ejemplo: un blog externo,etc) Tener en cuenta que esta no se creará si no solo será una hipervínculo hacia otra web</li>
</p>