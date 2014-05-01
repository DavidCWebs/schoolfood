//Slider Control

jQuery(document).ready(function(){
    $(".carousel-inner .item:first").addClass("active");
    $(".carousel-indicators li:first").addClass("active");
    $(".carousel").carousel({
      interval: 7000
    });
    
//smooth scrolling

    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash,
            $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top -150
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
    
// Back to Top
    // Show or hide the sticky footer button
    
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
	
    // Animate the scroll to top
    
			$('.go-top').click(function(event) {
				event.preventDefault();
				$('html, body').animate({scrollTop: 0}, 900);
			});
    
    // Make the class .sq-overlay-container clickable

		$(".sq-overlay-container").click(function(){
            window.location=$(this).find("a").attr("href");
            return false;
		});
    
});