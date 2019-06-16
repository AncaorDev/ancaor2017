$("document").ready(function(){	
	var idDepa = $("#depa-select").val();
	if (idDepa != 0) {
		obtenerProvincias(idDepa);
		var idProv = $("#valProv").val();
		console.log(idProv);
		if (idProv != 0) {
			obtenerDistritos(idProv);
		}	
	}
	$("#depa-select").change(function(){
		var sdepa = $("#depa-select").val();
		verificar(sdepa);
		if (sdepa != 0) {
			obtenerProvincias(sdepa);
			$("#dist-select").html('<option value="">Seleccione primero una Provincia...</option>');
		} else {
			$("#prov-select").html('<option value="">Seleccione primero un Departamento...</option>');
		}
		
	});
	$("#prov-select").change(function(){
		var sprov = $("#prov-select").val();
		if (sprov != 0) {
			obtenerDistritos(sprov);
		} else {
			$("#dist-select").html('<option value="">Seleccione primero una Provincia...</option>');
		}
		
	});
});

//obtenerProvincias//
function obtenerProvincias(depa){
	//AJAX//
	datos = {"obt":"departamento","idDepa":depa}
	$.ajax({
		url:DOMINIO+'ajax.php?mode=obtener',
		type:'POST',
		dataType: 'json',
		data:datos,
		success: function(response){
			// console.log(response.ldepa);
			var prov = response.ldepa;
			console.log(prov[0].idDepa);
			$("#prov-select").html("Cargando...");
			$("#prov-select").append('<option value="">Seleccione una Provincia...</option>');
			var idProv = $("#valProv").val();
			// console.log("el valor de la provincia es "+idProv);
			for (var i = 0; i < prov.length; i++) {
				if (idProv != 0) {
					if (prov[i].idProv == idProv) {
						$("#prov-select").append('<option value='+prov[i].idProv+' selected>'+prov[i].provincia+'</option>');
					} else {
						$("#prov-select").append('<option value='+prov[i].idProv+'>'+prov[i].provincia+'</option>');
					}	
				} else {
					$("#prov-select").append('<option value='+prov[i].idProv+'>'+prov[i].provincia+'</option>');
				}
			}			
			// 
		}
	}).fail(function(e) {
	        console.log(e);
	});
	//FIN - AJAX//
}
//FIN - obtenerProvincias//


//obtenerDistritos//
function obtenerDistritos(dist){
	//AJAX//
	datos = {"obt":"provincia","idDist":dist}
	$.ajax({
		url:DOMINIO+'ajax.php?mode=obtener',
		type:'POST',
		dataType: 'json',
		data:datos,
		success: function(response){
			// console.log(response.ldepa);
			var dist = response.ldist;
			var idDist = $("#valDist").val();
			$("#dist-select").html("Cargando...");
			$("#dist-select").append('<option value="">Seleccione un Distrito...</option>');
			for (var i = 0; i < dist.length; i++) {
				if (idDist != 0) {
					if (dist[i].idDist == idDist) {
						$("#dist-select").append('<option selected value='+dist[i].idDist+'>'+dist[i].distrito+'</option>');
					} else {
						$("#dist-select").append('<option value='+dist[i].idDist+'>'+dist[i].distrito+'</option>');
					}
				} else {
					$("#dist-select").append('<option value='+dist[i].idDist+'>'+dist[i].distrito+'</option>');
				}
			}			
			// 
		}
	}).fail(function(e) {
	        console.log(e);
	});
	//FIN - AJAX//
}
//FIN - obtenerDistritos//

//obtenerDistritos//
function verificar(idDepa){
	//AJAX//
	datos = {"obt":"detalle","idDepa":idDepa}
	$.ajax({
		url:DOMINIO+'ajax.php?mode=obtener',
		type:'POST',
		dataType: 'json',
		data:datos,
		success: function(response){
			console.log(response.exist,response.msg);
			if (response.exist != 0) {
				confirmDepa(response.exist[0]);
			} 
		}
	}).fail(function(e) {
	        console.log(e);
	});
	//FIN - AJAX//
}
//FIN - obtenerDistritos//

    function confirmDepa(depa){
      $.confirm({
      title: 'Mensaje!',
      content: 'Se ha detectado que ese departamento ya contiene información, presione aceptar para editar o cancelar para seleccionar otro departamento',
      type: 'dark',
      typeAnimated: true,
      icon: 'fa fa-spinner fa-spin',
      closeIcon: true,
      closeIconClass: 'fa fa-close',
      theme: 'supervan',
      buttons: {
          aceptar: {
            btnClass: 'btn-blue',
            action : function(){
            	setTimeout(function(){window.location=DOMINIO+"panel/proyectos/edit/"+depa;},100)
            }
          },
          cancelar: {
            btnClass: 'btn-red',
            action : function(){
              $("#depa-select").val('');
            }
          }
      }
      }); 
    }
