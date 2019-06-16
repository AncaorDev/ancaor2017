<?php 
$message_success = '<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Ejecutado Correctamente , Redireccionando en : <span id="aiset"></span></p>
</div>';
$message_danger = '<div class="alert alert-dismissible alert-danger">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Error , Redireccionando en : <span id="aiset"></span></p>
</div>';
$message_warning = '<div class="alert alert-dismissible alert-warning">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<p>Algo salio mal</p>
</div>';
$pageModel = new pageModel();
$data = $_POST['num'];
$msg['std'] = true;
$result = $pageModel -> setAutoincrement($data);
if ($result['sql']) {
	$msg['msg'] = $message_success;
} else {
	$msg['msg'] = $message_danger;
}
echo  json_encode($msg);
?>