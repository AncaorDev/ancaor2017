$(document).ready(function(){
	$('a[href*=#]').click(function() {
     	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
            if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body').animate({scrollTop: targetOffset}, 400);
                return false;
            }
       }
   });
	// animacion();
});
if (screen.width > 720) {
	window.onscroll =  function(){
		var normal = document.getElementsByClassName("normal");
		var tlb = document.getElementById("text-logo-body");	
		var tf = document.getElementById("text-frase");	
		var tg = document.getElementById("t-galeria");	
		var x = document.getElementsByTagName("section");
		var scroll = document.documentElement.scrollTop || document.body.scrollTop;
		tam = 0;
		var rr = "";
		tar = [];
		for (i = 0; i < x.length ; i++) {
		    tam = tam + x[i].offsetHeight;
		    tar[i] = tam;
		}
		for(i = 0; i < tar.length ; i++) {
			// console.log(parseInt(scroll+3)+"-"+tar[i]);			
			if (parseInt(scroll+3) >= tar[i]) {
				tlb.classList.remove("animate-left");
				tf.classList.remove("animate-right")
				normal[i].classList.remove("fonty");	
				normal[i+1].classList.add("fonty");
				// tg.classList.add("animate-left");
				if (parseInt(i+2) < tar.length) {
					normal[i+2].classList.remove("fonty");
				}
			} else if (parseInt(scroll+3) < tar[0]){
				for (var i = 0; i < tar.length; i++) {
					// tg.classList.remove("animate-left");
					normal[i].classList.remove("fonty");
					tlb.classList.add("animate-left");
					tf.classList.add("animate-right")
				}
			}
		}
		var nav = document.getElementById("ncab");
		if (scroll >= 80) {		
			nav.classList.add("fixed");
			// console.log(nav.classList); 
		} else {
			nav.classList.remove("fixed");
		}
	}
} else {
	window.onscroll =  function(){
		var normal = document.getElementsByClassName("normal");
		var tlb = document.getElementById("text-logo-body");	
		var tf = document.getElementById("text-frase");	
		var tg = document.getElementById("t-galeria");	
		var x = document.getElementsByTagName("section");
		var scroll = document.documentElement.scrollTop || document.body.scrollTop;
		tam = 0;
		var rr = "";
		tar = [];
		for (i = 0; i < x.length ; i++) {
		    tam = tam + x[i].offsetHeight;
		    tar[i] = tam;
		}
		for(i = 0; i < tar.length ; i++) {
			// console.log(parseInt(scroll+3)+"-"+tar[i]);			
			if (parseInt(scroll+14) >= tar[i]) {
				tlb.classList.remove("animate-left");
				tf.classList.remove("animate-right")
				normal[i].classList.remove("fonty");	
				normal[i+1].classList.add("fonty");
				// tg.classList.add("animate-left");
				if (parseInt(i+2) < tar.length) {
					normal[i+2].classList.remove("fonty");
				}
			} else if (parseInt(scroll+14) < tar[0]){
				for (var i = 0; i < tar.length; i++) {
					// tg.classList.remove("animate-left");
					normal[i].classList.remove("fonty");
					tlb.classList.add("animate-left");
					tf.classList.add("animate-right")
				}
			}
		}
		var nav = document.getElementById("ncab");
		if (scroll >= 80) {		
			nav.classList.add("fixed");
			// console.log(nav.classList); 
		} else {
			nav.classList.remove("fixed");
		}
	}
}

function animacion(){
	$("#text-logo-body").show(function(){
	$("#text-logo-body").animate({});
	});
}