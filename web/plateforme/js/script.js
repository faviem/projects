/* JQUERY WEB SITE SCRIPTS GOES HERE */

jQuery(document).ready(function() {
	
/*******************************
    ENABLE BACK TO TOP LINK 
********************************/	
	$(window).scroll(function(){
	    if ($(this).scrollTop() > 300) {
	        $('.scrolltotop').fadeIn();
	    } else {
	        $('.scrolltotop').fadeOut();
	    }        
	});

	$('.scrolltotop').click(function(){
	    $("html, body").animate({ scrollTop: 0 }, 700);
	    return false;
	});
   

 /*******************************
    ENABLE BLOG TABS 
********************************/
	$('#blogTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})

/*******************************
    THUMBNAIL OVERLAY 
********************************/
	$(".thumbnail-overlay").css("opacity", 0);
	$(".thumbnail").hover(function () {
		$('.thumbnail-overlay', this).stop().animate({
			opacity: .5

		}, "slow");
	},
	function () {
		$('.thumbnail-overlay', this).stop().animate({
			opacity: 0

		}, "slow");
	});


/*******************************
    KIND OF ISOTOPE EFFECT 
********************************/
	$('#portfolio-filter > li > a').click(function(e) {
		e.preventDefault();

		//filter button highlight
		$('#portfolio-filter > li').each(function() {
			$(this).removeClass('active');
		});
		$(this).parent().addClass('active');

		//sets the filter and makes the animations
		var filter = $(this).attr('data-filter');
		items = $('.item');

		if (filter == '*') {
			items.animate({ height: 'show', opacity: 1 }, 'slow');  
		}
		else if (filter != '*') {
			items.animate({ height: 'hide', opacity: 0 }, 'slow');
			items.filter('.'+filter).animate({ height: 'show', opacity: 1 }, 'slow'); 
		}
	});	
});
