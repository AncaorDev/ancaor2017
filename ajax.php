<?php
  require('core/core.php');
  $core = new Core();
  if ($_POST) {  
    if (isset($_GET['mode']) ? $_GET['mode'] : null) {
      $m = $_GET['mode'];
      if (file_exists('core/php/funciones/' . $m . '.php')) {
        require('core/php/funciones/'. $m .'.php');
      } 
    } 
  } else {
    redirect();
  }


