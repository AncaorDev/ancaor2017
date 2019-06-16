//Funcion para agregar una clase al realizar el scroll
if (screen.width > 720) {
	$(window).scroll(function() {    
	var scroll = $(window).scrollTop();
	if (scroll >= 190) {
	    $("#cont-nav").addClass("scroll-mod");
	} else if (scroll < 190) {
	   $("#cont-nav").removeClass("scroll-mod");
	}
});
}