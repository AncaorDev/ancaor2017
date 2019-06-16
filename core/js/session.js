$(document).ready(function(){
	var time = $("#tduracion").attr('data');
	// console.log(time);
	if (typeof(time) === "undefined") {

	} else {
		if (time == (60*60*24)) {
		document.getElementById('tduracion').innerHTML = "24 horas";
		} else {
			var timeSet = setInterval(timeRegresiva,1000);
			function timeRegresiva(){
			    if (time < 0) {
					clearInterval(timeSet);
					alert("Inactividad , Por favor vuelve a iniciar la sesión") 
					var datos = {"action" : "logout"}; 
					ajaxlogin(datos);  
				} else {
					var minutes = Math.floor( time / 60 );
					var seconds = time % 60;
					//Anteponiendo un 0 a los minutos si son menos de 10 
					minutes = minutes < 10 ? '0' + minutes : minutes;		 
					//Anteponiendo un 0 a los segundos si son menos de 10 
					seconds = seconds < 10 ? '0' + seconds : seconds;			 
					var result = minutes + ":" + seconds; 
					document.getElementById('tduracion').innerHTML = result;
				        time--;
				} 
			};	
		}
	}
	
	// alert(time);

	$("#logout").click(function(){
		var datos = {"action" : "logout"}; 
		ajaxlogin(datos);
	});
	$("#ingresar,#limpiar").click(function(){
		$("#ajaxlogin").html("");
	});
	$("#formlogin").submit(function(){
	user = $("#user").val();
	pass = $("#pass").val();
	sesion = document.getElementById("sesion").checked ? true : false;;
	datos = {"action" : "login" ,"user" : user, "pass" : pass ,"sesion" : sesion};
		if ((user != '' || user != 0) && (pass != 0 || pass != '')) {
			$("#ajaxlogin").html("<p><i class='fa fa-spinner fa-spin'></i> Logueando...</p>");
			setTimeout(function(){ajaxlogin(datos)},2000);	
		} else {
			if ((user == '' || user == 0) && (pass == 0 || pass == '')) {
				$("#user").animate({ marginLeft: "4px"},100, function(){
					$("#user").animate({ marginLeft: "0px" },100,function(){
						$("#user").animate({ marginLeft: "4px" },100,function(){
							$("#user").animate({ marginLeft: "0px" },100);
						});
					});
				});
				$("#pass").animate({ marginLeft: "-4px" },100, function(){
					$("#pass").animate({ marginLeft: "0px" },100,function(){
						$("#pass").animate({ marginLeft: "-4px" },100,function(){
							$("#pass").animate({ marginLeft: "0px" },100);
						});
					});
				});	
			}else if (user == '' || user == 0) {
				$("#user").animate({ marginLeft: "4px" },100, function(){
					$("#user").animate({ marginLeft: "0px" },100,function(){
						$("#user").animate({ marginLeft: "4px" },100,function(){
							$("#user").animate({ marginLeft: "0px" },100);
						});
					});
				});
			} else if (pass == '' || pass == 0){
				$("#pass").animate({ marginLeft: "4px" },100, function(){
					$("#pass").animate({ marginLeft: "0px" },100,function(){
						$("#pass").animate({ marginLeft: "4px" },100,function(){
							$("#pass").animate({ marginLeft: "0px" },100);
						});
					});
				});
			}
		}
		return false;
	});
});


function ajaxlogin(datos){
	var url = datos.action;
$.ajax({
	url:urlajax+'?mode='+url,
	type:'POST',
	dataType: 'json',
	data:datos,
	success: function(response){
		console.log(datos.sesion,response.msg,response.std,response.estadosql,response.duracion);
		if (url == "login") {
			if (response.std) {
			$("#ajaxlogin").html(response.msg);
			var time = 3;
			var timeSet = setInterval(timeRegresiva,1000);
			function timeRegresiva(){
			    if (time < 0) {
			        clearInterval(timeSet);   
			    } else {
			        document.getElementById('redirectl').innerHTML = time;
			        time--;
			    } 
			};		
			setTimeout(function(){
			console.log("redirect?");	
			var URLactual = window.location.href;
			window.location=URLactual;},3000);
			} else {
				$("#ajaxlogin").html(response.msg);
			}
		} else if (url == "logout"){
			if (response.std) {
				var URLactual = window.location.href;
				window.location=URLactual;
			} else {
				alert("ERROR");
			}
		}
	}
}).fail(function(e) {
		console.log(urlajax+'?mode='+url);                        
        console.log(e);
});
}

