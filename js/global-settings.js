// Remember - there are THREE external javascript files included in this demo. If you don't use them, you'll get an error on the console.

// Set a resize timer for efficiency
var delay = (function(){
	var timer = 0;
	return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	};
})();

jQuery(function($){ //create closure so we can safely use $ as alias for jQuery
	
	$('#site-navigation>ul').supersubs({ // Initialize Superfish Menu
		minWidth:	12,	 // minimum width of submenus in em units
		maxWidth:	27,	 // maximum width of submenus in em units
		extraWidth:	1	 // extra width can ensure lines don't sometimes turn over
	}).superfish();

	$('#navigation-toggle').click(function () { // Capture responsive menu button click
    	// Show/hide menu
    	$('#site-navigation>ul').toggle();
    });
	
		$(window).load(function() {		
		// fixFlexsliderHeight();
		$('.featured-slider-preloader').hide();		
		$('#flexslider-home').flexslider({			
			slideshow : true,
			controlsContainer: ".flex-container",
			animation : 'fade',
			pauseOnHover: true,
			animationSpeed : 400,
			smoothHeight : false,
			directionNav: false,
			prevText : '<span class="fa fa-angle-left"></span>',
			nextText : '<span class="fa fa-angle-right"></span>',
			randomize : true,
		});
	});
	
  // Check if our window has been resized
  $(window).resize(function() {
    // set a timeout using the delay function so this doesn't fire evey millesecond
    delay(function(){
		
      // If we're not in responsive mode
		if( $(document).width() > 768 ) {
			// Always show the main menu, in case it was toggled off.
			$('#site-navigation>ul').css('display', 'block');
			$('ul.slides').css({'height' : 'auto !important'});
			$('ul.slides > li').css({'height' : 'auto !important'});
		}
		else if($(document).width() < 768 ){
			$('ul.slides').css({'height' : 'auto !important'}); 
			$('ul.slides > li').css({'height' : 'auto !important'});
		}
}, 300);
});
});