<?php

  if ($_POST) {
    require('core/core.php');
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'registrarPage':
          require('core/php/insertardata.php');
      break;
      case 'modificarPage':
          require('core/php/modificardata.php');
      break;
      case 'eliminarPage':
          require('core/php/eliminardata.php');
      break;
      case 'setAI':
          require('core/php/tblpage.php');
      break;
      case 'login':
          require('core/php/login.php');
      break;
      case 'logout':
          require('core/php/logout.php');
      break;
      default:
          header ('Location:index.php');
        break;
    }
  } else {
        header ('Location:index.php');
  }

 ?>