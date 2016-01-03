//jQuery to collapse the navbar on scroll
$(".navbar").hide();
$(window).scroll(function() {
    if ($(".navbar").offset().top > 450) {
         $(".navbar").slideDown();
        
    } else {
       if( $(".navbar-fixed-top").is(":hidden")){
            
        }else{
            $(".navbar").slideUp();
        }
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
