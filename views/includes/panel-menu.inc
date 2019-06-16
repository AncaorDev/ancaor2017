<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<!-- class="current-page"  -->
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="<?=URL_PANEL?>" class="site_title"><span>Admin Page</span></a>
      </div>
  <div class="clearfix"></div>
  <!-- menu profile quick info -->
  <div class="profile">
    <div class="profile_pic">
      <img src="<?=DIR_RS?>images/wolf.png" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Bienvenido,</span>
      <h2><?=$_SESSION['nom_User']?></h2>
    </div>
  </div>
  <!-- /menu profile quick info -->
  <br />
<div class="menu_section">
<h3>General</h3>
  <ul class="nav side-menu">
    <li class="current-page"><a href="<?=URL_PANEL?>"><i class="fa fa-home"></i> Inicio </a></li>
    <li><a><i class="fa fa-edit"></i> Páginas <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    <?php 
      foreach ($detallespage as $pagina) {?>
        <li><a href="<?=URL_PANEL?>pages/edit/<?=strtolower($pagina['nom_Pagina'])?>"> <?=$pagina['nom_Pagina']?> </a></li>  
    <?php } ?> 
      <li><a href="<?=URL_PANEL?>pages">Configuración</a></li>
    </ul>
    </li>
    <li class="active-none"><a><i class="fa fa-desktop"></i> Datos  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
         <?php 
      foreach ($datos as $dato) {?>
        <li><a href="<?=URL_PANEL?>datos/<?=strtolower($dato['nom_Dato'])?>"> <?=$dato['nom_Dato']?> </a></li>  
    <?php } ?> 
        <li><a href="<?=URL_PANEL?>datos">Configuración</a></li>
    </ul>
    </li>
    <li><a><i class="fa fa-desktop"></i> Includes  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?=URL_PANEL?>">Head</a></li>
      <li><a href="<?=URL_PANEL?>">Footer</a></li>
      <li><a href="<?=URL_PANEL?>">Configuración</a></li>
    </ul>
    </li>
    <li><a><i class="fa fa-desktop"></i> Depuración  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?=URL_PANEL?>">Programación</a></li>
    </ul>
    </li>
    <li><a><i class="fa fa-desktop"></i> Resources  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?=URL_PANEL?>">Tema</a></li>
	    <li><a href="<?=URL_PANEL?>">css</a></li>
	    <li><a href="<?=URL_PANEL?>">js</a></li>
    </ul>
    </li>
    <li><a><i class="fa fa-desktop"></i> Plugins  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
      <li><a href="<?=URL_PANEL?>">Twitter Share</a></li>
    </ul>
    </li>
    </ul>
  </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Configuración">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
<!--  <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">         
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a> -->
</div>
<!-- /menu footer buttons --> 
</div>
</div>          