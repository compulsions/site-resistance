//jQuery to collapse the navbar on scroll
$(window).on('scroll', function(){
	if( $(window).scrollTop()>890 ){
		$('.navbar').removeClass('navbar-sectionInicial');
		$('.navbar').addClass('navbar-fixed-top');
	} else {
		$('.navbar').removeClass('navbar-fixed-top');
		$('.navbar').addClass('navbar-sectionInicial');
    }
}); 



//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
