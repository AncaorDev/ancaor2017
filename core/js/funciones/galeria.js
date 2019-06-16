// 
$(document).ready(function(){
	$(".enlace-image").click(function(){
		console.log($("#textcopy").length)
		if ($("#textcopy").length>0) {
			console.log($("#textcopy").length>0)
			$("#textcopy").remove();
		}
		var contImg = $(this).parents(".image");
		var image = contImg.children(1);
		var data = image.attr("data");
		// console.log();
		$("#modal-image").modal('show');
		$("#enlace-image").val(data);

	});
	$(".mostrar-image").click(function(){
		var contImg = $(this).parents(".image");
		var image = contImg.children(1);
		var data = image.attr("data");	
		// console.log();
		$("#modal-fullscreen").modal('show');
		$("#img-full").attr("src",data);

	});
});

var clipboard = new Clipboard('.btn', );
clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    var tr = $("#icon-copy");
 	tr.attr('style','background-color:rgba(1, 127, 143,.6);color:white;');
	spansucess = $("<span>",{"id":"textcopy", "class":"label label-success"});
	if ($("#textcopy").lenght>0) {
		$(this).remove();
	}
	tr.parent().append(spansucess);
	$("#textcopy").text("Copiado");
    // e.clearSelection();
});
clipboard.on('error', function(e) {
    console.log(e);
});