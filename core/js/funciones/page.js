var modified = false;
$("input[type='date'],input[type='mail'],input[type='text'],textarea").change(function () {   
  submitForm()
  modified = true; 
});
$("input[type='text']").focus(function(){
	$(this).keydown(function(){
		if ($(this).val().length >= 2) {
			submitForm()
		}
	})
})
function submitForm(bool = true){
	if (bool) {
		$("#btnenviar").removeAttr("disabled")
	} else {
		$("#btnenviar").attr("disabled" ,"true")
	}
}
//  Funcion que se encargar de buscar la accion en la URL
function showAction(){
	// Declaramos la variable en la que guardaremos nuestra acción
	var action = ""
	// Usamos el metodo match para buscar la accion dentro de la URL
	if (URL.match("edit")) {
		action = "actualizar"
	} else if (URL.match("delete")) {
		action = "eliminar"
	} else {
		action = "registrar"
	}
	// Retornamos la acción
	return action;
}


$(document).ready(function(){
	// Revisamos si hay cambios en la opcion attribute page
	$("#id_AttributePage").change(function(){
		// Obtenemos el valor
		$IdAtrPage = $(this).val();	
		// Verficamos que valor hemos obtenido
		if ($IdAtrPage == 1) {
			// función que muestra el item agrega tecto y coloca placeholder (texto , placeholder)
			showInputSlug("Identificador de Sección: " , "Ingrese un identificador de sección")
		} else if ($IdAtrPage == 2) {
			showInputSlug("Enlace: " , "Ingrese dirección o enlace")
		} else {
			$("#div_slug_page").hide()
		}		
	})
})

$('#form_page').submit(function(e) {  
    e.preventDefault();
    var submit = false;
    // evaluate the form using generic validaing
    validatorResult = validator.checkAll(this);
    //Verificación de los datos del form
    console.log(validatorResult);
    submitForm(false);
    if (!validatorResult) {
      submit = false;
      
    } else {
    	if (modified) {
			var form = $(this).serializeArray(); 
			var object = arrayInObject(form);
        	cudPage(form);
    	}
    }
    if (submit)
      this.submit();
      return false;
});

function showInputSlug(text , placeholder = ""){
	$("#div_slug_page").show()
	$("#text_slug").text(text);
	$("#slug_page").attr("placeholder" , placeholder);
}

function cudPage(data){
	$.ajax({
		url : './ajax.php?mode=cudPage',
		type : 'POST',
		contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
		dataType: 'JSON',
		cache : false,
    	processData : true,
		data : data,
		async : true,
		success : function(reponse){
			console.log(reponse)
		}
	}).fail(function(e){
		console.log(e)
	})
}

function arrayInObject(array){
	var object = {}
	for (var i = 0; i < array.length; i++) {
		object[array[i]['name']] = array[i]['value']
	}
	return object
}