$(document).ready(function(){
	var a=$("#div-memory"),b=a.find("i")
	c=a.find(".x_content");
	c.slideToggle(200),a.css("height","auto"),b.toggleClass("fa-chevron-up fa-chevron-down");
	console.log(c);
})

