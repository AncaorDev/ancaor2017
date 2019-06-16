<div class="col-xs-12">
	<h5>{{ TimeRun(TIME_INICIO) }}</h5>
	<h5>{{ memory() }}</h5>
	<h5>{{ MEMORIA_SERVER }} </h5>
	<span id="memUso" style="display: none;" data="{{PORCENTAJE_MEMORIA}}"></span>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
	<div id="div-memory" class="x_panel">
		<div class="x_title">
			<h2>Memoria del Servidor</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li>
				<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    	<i class="fa fa-wrench"></i>
                    </a>
				</li>
                <li>
                	<a class="close-link"><i class="fa fa-close"></i></a>
                </li>
			</ul>
			<div class="clearfix"></div>
        </div>
        <div class="x_content">
			<div id="echart_gauge" style="height:370px;"></div>
        </div>
	</div>
</div>
<div class="clearfix"></div>