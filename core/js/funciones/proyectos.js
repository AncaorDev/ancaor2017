$('#form-proyectos').submit(function(e) {
    e.preventDefault();
    var submit = false;
    // evaluate the form using generic validaing
    validatorResult = validator.checkAll(this);
    //Verificación de los datos del form
    console.log(validatorResult);
    if (!validatorResult) {
      submit = false;
    } else {
      registrarProyecto();
    }
    if (submit)
      this.submit();
      return false;
});



function registrarProyecto(){
  var data = {
    "action" : __("action").value,
    "nomProy": __("nomProy").value, 
    "descripProy": __("descripProy").value,
    "idDepa": __("depa-select").value,
    "idProv" :  __("prov-select").value,
    "idDist":__("dist-select").value,
    "idProy" : __("idProy").value
  }
  cudProyecto(data);
}

function cudProyecto(data){
  // console.log('dentro a cud');
  //AJAX//
  $.ajax({
    url:DOMINIO+'ajax.php?mode=cudProyecto',
    type:'POST',
    dataType: 'json',
    data:data,
    success: function(response){
    // SUCCESS
      console.log(response.msg, response.sql,response.msg_html,response.std_html)
      if (response.std_html && response.sql) {
        alert("Acción ejecutada correctamente");
        if (data.action == "actualizar") {
        setTimeout(function(){window.location=DOMINIO+"panel/proyectos";},100)
        } else {
        setTimeout(function(){window.location=URLactual;},100);
        }
        // console.log(URLactual);
      }
    // FIN - SUCCESS
    }
  }).fail(function(e) {
    console.log(e);
  });
  //FIN - AJAX//
}

$(document).ready(function(){
    $("#btncancelar").click(function(){
      setTimeout(function(){window.location=DOMINIO+"panel/proyectos";},100);
    });
    $(".eliminar").click(function(){
    var parent = $(this).parent().attr('id');
    var name = $("#"+parent).attr('data');
    data_delete = {"action" : "eliminar", "idProy" : name}
    cudProyecto(data_delete);
    });
    
    $("#btn_ai1").click(function(){
      var ai = $("#ai_number").val();
      confirm(ai, "manual");
    });
    $("#btn_ai2").click(function(){
      var ai = $("#ai_number").val();
      confirm(ai, "auto");
    });

    function confirm(num , modo){
      $.confirm({
      title: 'Mensaje!',
      content: 'Por favor confirme su selección </br> Modo : '+modo,
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
              var data_ai =  {"action" : "set_ai" , "mode" : modo , "num" : num };
              cudProyecto(data_ai);
            }
          },
          cancelar: {
              btnClass: 'btn-red',
            action : function(){
              
            }
          }
      }
      }); 
    }
});

