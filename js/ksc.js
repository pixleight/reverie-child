jQuery(document).ready(function($){
	$(window).bind("load resize scroll",function(e) {
	    var y = $(window).scrollTop();

	    $("#content.front-page article").filter(function() {
	        return $(this).offset().top < (y + $(window).height()) &&
	               $(this).offset().top + $(this).height() > y;
	    }).css('background-position', '50% ' + parseInt(-y / 6) + 'px');
	});
});
