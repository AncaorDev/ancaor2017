$(document).ready(function(){
  $('#summer_page').on('summernote.focus', function() {
    $("#btnGuardarCambios").removeClass("disabled");
    $("#msg").html("");
    // $( "#btnenlace" ).attr( "href", "" );
  });
//Summernote
$('#prov').summernote();
$('#summer_page').summernote({
  lang: 'es-ES',
  fontNames: ['Asap','Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
              'Helvetica Neue', 'Impact', 'Lucida Grande',
              'Tahoma', 'Times New Roman', 'Verdana', 'Futura-Medium','Ubuntu','Arima Madurai',
              'Hammersmith One','Barrio'],

  minHeight: 200, 
  prettifyHtml: true,
  toolbar: [
  //https://searchcode.com/codesearch/view/95928611/
    ['btnguardar', ['guardar']],
    ['style',['style']],
    ['style', ['fontname','bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['style','ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['insert', ['link', 'picture', 'hr','video']],
    ['table', ['table']],
    ['view', ['codeview']] // 'fullscreen'
  ], 
  buttons: {
    guardar: btnSave
  },
  codemirror: { // codemirror options
    theme: 'blackboard',
    mode: 'text/html',
    lineWrapping: true, // Tam
    lineNumbers: true,
    textWrapping: false,
    tabMode: 'indent',
    styleActiveLine: true,
    matchBrackets: true
  },
  callbacks: {
    onImageUpload: function(files) {
      for(var i = 0; i < files.length; i++){
        SubirImagen(files[i]);
      }     
    }
  },
  popover: {
    image: [
      ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['custom', ['imageAttributes', 'imageShape']],
      ['remove', ['removeMedia']]
    ],
    link: [
      ['link', ['linkDialogShow', 'unlink']]
    ],
    air: [
      ['color', ['color']],
      ['font', ['bold', 'underline', 'clear']],
      ['para', ['ul', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture']]
    ]
  },
});
// Fin - Summernote
});

// Powered https://github.com/summernote/summernote/issues/72
function SubirImagen(file) {
  if(file.type.includes('image')) {
      var name = file.name.split(".");
      name = name[0];  
      var data = new FormData();
      data.append('file', file);
      $.ajax({
        url: DOMINIO+'core/php/funciones/sync.php',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        data: data,
        success: function (response){
          if(response.is_ok)
          {
            $('#summer_page').summernote('insertImage', DOMINIO+response.url, name);
          }
          else
          {
            console.log(response.error);
          }
        }
      })
      .fail(function(e) {
        console.log(e);
      });
    }
    else
    {
      alert("El tipo de archivo que intentaste subir no es una imagen");
    }
}
function EnviarData(html,nompage) {
  var data = {"phtml" : html, "nompage": nompage};
    $.ajax({
        url: urlphp + 'creardata.php',
        type: 'POST',
        // contentType: false,
        // cache: false,
        // processData: false,
        dataType: 'JSON',
        data: data,
      success: function (response){
        if(response.std) {
           console.log(response.expage,response.ex,'estado pagina:',response.stdpage);
           $("#msg").html(response.stdpage);
        } else {
            console.log(response.error);
        }
     }
    }).fail(function(e) {
      console.log(e);
    });
}
var btnSave = function (context) {
  var ui = $.summernote.ui; 
  // create button
  var button = ui.button({
    contents: '<i class="fa fa-save"/> Guardar Cambios',
    tooltip: 'Guardar los Cambios',
    click: function () {
      // invoke insertText method with 'hello' on editor module.
      // context.invoke('editor.insertText', 'hello');
      alert("Guardando...");
    }
  });
  return button.render();   // return button as jquery object 
}

