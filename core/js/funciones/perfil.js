var modified = false;
$("input[type='date'],input[type='mail'],input[type='text'],select,textarea").change(function () {   
  modified = true; 
});
// Dando estilos al File Upload
$("input:file").filestyle({
  buttonText: "",
  buttonName: "btn-primary",
  icon: true,
  iconName: "glyphicon glyphicon-open",
  classButton: "btn btn-primary",
  buttonBefore: true,
  input: false,
  placeholder: "No file"
});
var Xfiles = [{id : "1",upl : "Cover" , txt : "Solo JPG o PNG , Max. 1,5 MB recom(660x212)px", place : "bottom", title : "Seleccionar imagen de portada" },
              {id : "2",upl : "Profile" , txt : "Imagen de Perfil", place : "bottom", title : "Seleccionar imagen de portada"} ];
vars = {};
for (var i = 0; i < Xfiles.length; i++) {
  var varname =  Xfiles[i].upl;
  vars[varname] = $("#img" + Xfiles[i].upl).clone();
  var nxtUpl = $("#upload-" + Xfiles[i].upl).next().children().children().children('span');
  nxtUpl.first().attr("id" , "icon-upl" + Xfiles[i].id);
  var spn = $("<span>",{"id":"textUpload" + Xfiles[i].id});
  $("#upload-" + Xfiles[i].upl).next().append(spn);
  $("#textUpload" + Xfiles[i].id).text(Xfiles[i].txt);
  $("#icon-upl" + Xfiles[i].id).attr("data-toggle" , "tooltip");
  $("#icon-upl" + Xfiles[i].id).attr("data-placement" , Xfiles[i].place);
  $("#icon-upl" + Xfiles[i].id).attr("data-original-title" , Xfiles[i].title);
  $("#textUpload" + Xfiles[i].id).addClass("textUpload");
}
$("#btncancelar").click(function(){
  for (var i = 0; i < Xfiles.length; i++) {
    imgOrginal( Xfiles[i].upl);
  }
});
//Devolvemos las imagene originales
function imgOrginal(i){$("#img" + i).replaceWith(vars[i].clone());}
//Lee el tipo MIME de la cabecera de la imagen
function obtenerTipoMIME(c) {return c.replace(/data:([^;]+).*/, '\$1');}
//Convertimos un Json en bjeto javaScript
function JsonObj(x){return JSON.parse(x);}

$("input:file").change(function(){
  //Para navegadores antiguos
    if (typeof FileReader !== "function") {
        $('#msg-file').text('[Vista previa no disponible]');
        return;
    } else {   
        var idFile = $(this).attr("id") 
        var data = $("#"+idFile).attr("data")
        if (data == "Cover" ) {
          $('#img' + data).attr('style', 'background:url("public/resources/images/svg/reload.svg") no-repeat center center');
        }
        else if (data == "Profile") {
          $('#img' + data).attr('src', 'public/resources/images/svg/reload.svg');
        }
        var labelcont = $("#upload-" + data).next().children(2).children(1);
        labelcont.attr("id","contbtnUpload" + data);
        var btn = $("#contbtnUpload" + data).children().last();
        btn.remove();
        setTimeout(function(){leerInfoFile(idFile, data)},1000); 
    }
});
function leerInfoFile(id,data){
  Archivos = $("#" + id)[0].files;
  if (Archivos.length > 0) {
    console.log(Archivos);
    Lector = new FileReader();
    Lector.onloadend = function(e) {
    var origen, tipo;
    //Envia la imagen a la pantalla
    origen = e.target; //objeto FileReader
    //Prepara la informaciÃ³n sobre la imagen
    tipo = obtenerTipoMIME(origen.result.substring(0, 30));
    //Archivos[0].name
    function taman(total){
      if(total < 1024) return total + " Bytes";
      else if(total < 1048576) return(total / 1024).toFixed(2) + " KB";
      else if(total < 1073741824) return(total / 1048576).toFixed(2) + " MB";
    }  
    //Si el tipo de archivo es válido lo muestra,
    //sino muestra un mensaje
      if (tipo !== 'image/jpeg' && tipo !== 'image/png' && tipo !== 'image/gif') {
        alert('El formato de imagen no es válido: debe seleccionar una imagen JPG, PNG o GIF.');
        imgOrginal(data);
      } else if(e.total>1048576){
        alert('Imagen muy pesada');
        imgOrginal(data);
      } else {
        if (data == "Cover" ) {
          $('#img' + data).attr('style', 'background-image: url("' + origen.result +'")');
        }
        else if (data == "Profile") {
          $('#img' + data).attr('src', origen.result);
        }
      }
    };
    Lector.onerror = function(e) {console.log(e)}
    Lector.readAsDataURL(Archivos[0]);
  } else {
      imgOrginal(data);
  }
}
$('#form-perfil').submit(function(e) {  
    e.preventDefault();
    var submit = false;
    // evaluate the form using generic validaing
    validatorResult = validator.checkAll(this);
    //Verificación de los datos del form
    console.log(validatorResult);
    if (!validatorResult) {
      submit = false;
    } else {
      var Archivos = $('input:file');
      obj = { 0 : {"url":"user/cover/","upl" : "Cover" }, 1 : {"url":"user/profile/","upl" :"Profile"} };
      if (Archivos.length>0) {
        for (var i = 0; i < Archivos.length; i++) {
          if (Archivos[i].files.length>0) {
            var Post = JSON.stringify(obj[i]);
            subirImagenData(Archivos[i].files[0], Post);          
          } 
        }
      }  
      if (modified) {
        var form = $("#form-perfil").serialize(); 
        cudPerfil(form);
      }  
    }
    if (submit)
      this.submit();
      return false;
});
// Subir Imagen 
function subirImagenData(file, post) {
  var objPost = JsonObj(post);  
  var upl = objPost['upl'];
  if(file.type.includes('image')) {
    var name = file.name.split(".");
    name = name[0];  
    var data = new FormData();
    data.append('post', post);
    data.append('file', file);
    $.ajax({
      url: DOMINIO+'core/php/funciones/syncImage.php',
      type: 'POST',
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'JSON',
      data: data,
      async :true,
      success: function (response){
        if(response.is_ok){
          // $("#img"+upl+"_User").val(response.name);
          var img = "img" + upl + "_User";
          var data = {action : "act" + upl}
          data[img] = response.filename;
          cudPerfil(data);
        } else {
          console.log(response.error);
        }
      }
    }).fail(function(e) {
      console.log(e);
    });
  }
  else {
    alert("El tipo de archivo que intentaste subir no es una imagen");
  }
}

// Fin Subir Imagen 
function cudPerfil(info){
  var action = info.action;
  $.ajax({
    url : DOMINIO + 'ajax.php?mode=cudPerfil',
    type: 'POST',
    contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
    cache : false,
    processData : true,
    dataType : 'JSON',
    data : info,
    async : true,
    success : function(response){
       if (response.upd) {
        // alert("Actualizado");
        // setTimeout(function(){window.location=URL;},100);
        // window.scrollTo(0, 0);
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $("#msg-success").show();
        setTimeout(function(){window.location=URL;},1500);
        // console.log(response);
       }
    }
  }).fail(function(e){
    console.log(e)
  });
}


