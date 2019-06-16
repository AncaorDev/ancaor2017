<!-- method="post" action="panel/pages" -->
<div id="msg-success" class="alert alert-dismissible alert-success" style="display: none">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Actualizado</strong></a>.
</div>
<form action="" id="form-perfil" method="POST" class="form-horizontal form-label-left" novalidate>
  <div id="cont-iconFile" class="col-xs-12 col-sm-12 col-md-12 icon-file">
      <input type="file" name="upload-Cover" id="upload-Cover" data="Cover" accept="image/*" >
  </div>
  <div id="imgCover" class="col-md-12 col-xs-12 rounded" style="background-image: url(<?=IMAGE?>user/cover/<?=$datos['datos'][0]['imgCover_User']?>);">
  </div>
  <div class="col-md-12 col-xs-12">
     <hr>
  </div>
  <div class="col-xs-12 col-sm-3 col-md-3">
    <div id="cont-iconFile" class="col-xs-12 col-sm-12 col-md-12 icon-file">
      <input type="file" name="upload-Profile" id="upload-Profile" data="Profile" accept="image/*" >
    </div>
      <img id="imgProfile" class="image rounded" src="<?=IMAGE?>user/profile/<?=$datos['datos'][0]['imgProfile_User']?>" alt="Profile Image" style="width: 100%;"/>
  </div>
  <div class="col-xs-12 col-sm-9 col-md-9">
    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">
       Nombre de Usuario: <span class="required"></span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="name_user" name="name_user" class="form-control col-md-7 col-xs-12" disabled="" value="<?=$_SESSION['name_User']?>">
      </div>
    </div>
    <!-- /ITEM -->
     <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">
       Tipo de Usuario: <span class="required"></span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name_TypeUser" name="name_TypeUser" class="form-control col-md-7 col-xs-12" disabled="" value="<?= $datos['det'] ? $datos['datos'][0]['name_TypeUser'] : "" ?>">
      </div>
    </div>
    <!-- /ITEM -->
    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">
        Correo Electrónico: <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="mail" id="mail_User" name="mail_User" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,40"  placeholder="Ingrese correo electrónico" value="<?= $datos['det'] ? $datos['datos'][0]['mail_User'] : "" ?>" required="required" type="text">
      </div>
    </div>
    <!-- /ITEM -->
    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">
        Presentación:  <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea id="phrase_User" name="phrase_User" class="form-control col-md-7 col-xs-12" required="required" rows="3"><?= $datos['det'] ? $datos['datos'][0]['phrase_User'] : "" ?>
      </textarea>
      </div>
    </div>
    <!-- /ITEM -->
    <!-- ITEM -->
    <div id="div-web" class="item form-group" >
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">
        Web: <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="web_User" name="web_User" value="<?= $datos['det'] ? $datos['datos'][0]['web_User'] : "" ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,65"  required="required">
      </div>
    </div>
    <!-- /ITEM --> 
    <!-- USER -->
    <input id="iduser" name="id_User" type="hidden" value="<?=$_SESSION['id_User']?>">
    <!-- USER -->
    <!-- ACTION -->
    <input id="action" name="action" type="hidden" value="<?=$datos['det'] ? 'actData' : 'registrar'?>">
    <!-- /ACTION -->
    <!-- <div class="ln_solid"></div> -->
  </div>
  <div class="col-md-12 col-xs-12">
      <hr>
      <h2 class="h2-none" style="width:100%;"><span class="glyphicon glyphicon-user"></span> Datos Personales </h2>
  </div>
  <div class="col-md-12 col-xs-12">
    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="label" style="text-align: left">
       Nombre(s) : <span class="required"></span>
      </label>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <input type="text" id="name_person" name="name_person" class="form-control col-md-7 col-xs-12" value="<?= $datos['det'] ? $datos['datos'][0]['name_Person'] : '' ?>">
      </div>
    </div>
    <!-- /ITEM -->

    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="label" style="text-align: left">
       Apellidos : <span class="required"></span>
      </label>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <input type="text" id="lastName_Person" name="lastName_Person" class="form-control col-md-7 col-xs-12" value="<?= $datos['det'] ? $datos['datos'][0]['lastName_Person'] : '' ?>">
      </div>
    </div>
    <!-- /ITEM -->
    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="label" style="text-align: left">
       Sexo : <span class="required"></span>
      </label>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <select id="sex_Person" name="sex_Person" class="form-control" data-validate-length="1" pattern="numeric" required>
          <option value="0">Seleccione Sexo</option>
          <?php 
            $sexos = [0 => ['id' => 1, 'det' => 'F' , 'name' => 'Femenino'] , 1 => ['id' => 2, 'det' => 'M', 'name' => 'Masculino']];
            print_r($sexos);
            foreach ($sexos as $value) {
              if (isset($datos['det'])) {
                  if ($value['det'] == $datos['datos'][0]['sex_Person']) {
                    echo '<option value="'.$value['det'].'" selected>'.$value['name'].'</option>';
                  } else {
                    echo '<option value="'.$value['det'].'">'.$value['name'].'</option>';
                  }
              } else {
                   echo '<option value="'.$value['det'].'">'.$value['name'].'</option>';
              }
            }            
          ?>
          <?= $datos['det'] ? $datos['datos'][0]['sex_Person'] : '' ?>
            
          <??>
        </select> 
      </div>
    </div>
    <!-- /ITEM -->
    
    <!-- ITEM -->
    <div class="item form-group">
      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="label" style="text-align: left">
       Fecha de Nacimiento : <span class="required"></span>
      </label>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <input type="date" id="dateBirth_Person" name="dateBirth_Person" class="form-control col-md-7 col-xs-12" value="<?= $datos['det'] ? $datos['datos'][0]['dateBirth_Person'] : '' ?>">
      </div>
    </div>
    <!-- /ITEM -->
  </div>
  <div class="item form-group">  
      <div class="col-md-6 col-md-offset-3">
                <!-- <button type="reset" class="btn btn-primary">Cancel</button> -->
      <button id="btnenviar" type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Guardar </button>
      <button id="btncancelar" type="reset" class="btn btn-danger"> Cancelar </button>
      </div>
  </div>
</form>