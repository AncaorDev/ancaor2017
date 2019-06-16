
<!-- BS FilesType -->
<script src="<?=DIR_LIBS?>bootstrap-filestyle-1.2.1/src/bootstrap-filestyle.min.js"></script>
<script src="<?=HOME?>core/js/funciones/funciones.js?<?=sha1(rand(200,500))?>"></script>
<script src="<?=HOME?>core/js/app/pruebas.js?<?=sha1(rand(200,500))?>"></script>
<!-- NProgress -->
<script src="<?=DIR_LIBS?>nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="<?=DIR_LIBS?>iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="<?=DIR_LIBS?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?=DIR_LIBS?>datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!-- Bootstrap -->
<script src="<?=DIR_LIBS?>bootstrap/js/bootstrap.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?=DIR_RS?>panel/js/custom.min.js"></script>
<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
<link href="<?=DIR_LIBS?>codemirror/codemirror.css" rel="stylesheet" type="text/css">
<link href="<?=DIR_LIBS?>codemirror/monokai.css" rel="stylesheet" type="text/css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?=DIR_LIBS?>codemirror/codemirror.js"></script>
<script type="text/javascript" src="<?=DIR_LIBS?>codemirror/xml.js"></script>
<script type="text/javascript" src="<?=DIR_LIBS?>codemirror/formatting.js"></script>
<!-- include summernote css/js-->
<link href="<?=DIR_LIBS?>summernote/summernote.css" rel="stylesheet">
<script src="<?=DIR_LIBS?>summernote/summernote.js"></script>
<script src="<?=DIR_LIBS?>summernote/lang/summernote-es-ES.js"></script>
<script src="<?=DIR_LIBS?>summernote/plugin/img/summernote-image-attributes.js"></script>
<script src="<?=DIR_LIBS?>validator/validator.js"></script>
<!-- ECharts -->
<script src="<?=DIR_LIBS?>echarts/dist/echarts.min.js"></script>
<script src="<?=HOME?>core/js/funciones/summernoteconf.js"></script>
<script src="<?=HOME?>core/js/funciones/auth.js"></script>
<?php 
if (isset($_GET['subpage'])) {
$ruta_js = 'core/js/funciones/'.strtolower($_GET['subpage']).'.js';
if (file_exists($ruta_js)) {
print('<script src="' . $ruta_js . '?' . md5(rand(2,100)) .'"></script>');
} 
} 
?>

<!-- <script src="<?=HOME?>core/js/funciones/galeria.js"></script>
<script src="<?=HOME?>core/js/funciones/perfil.js"></script> -->
<!-- validator -->
<script>
// initialize the validator function
validator.message.date = 'not a real date';
// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
$('form')
  .on('blur', 'input[required], input.optional, select.required', validator.checkField)
  .on('change', 'select.required', validator.checkField)
  .on('keypress', 'input[required][pattern]', validator.keypress);
  $('.multi.required').on('keyup blur', 'input', function() {
    validator.checkField.apply($(this).siblings().last()[0]);
  });
 </script>
<!-- /validator -->




