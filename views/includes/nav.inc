 <?php $url = $_SERVER["REQUEST_URI"];
 $aurl = explode("/", $url);
 ?>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
	<?php
		foreach ($detallespage as $pages) { 
			if (strtolower($aurl[2]) == strtolower($pages['nom_Pagina'])) {?>
		<li class="active"><a href="<?=$pages['link_Pagina']?>">  <?=$pages['nom_Pagina']?> </a></li>	
	<?php } else {?>
		<li><a href="<?=$pages['link_Pagina']?>">  <?=$pages['nom_Pagina']?> </a></li>	
	<?php	} } ?>
    </ul>    
</div>