
jQuery(document).ready(function($){

	// Init wow 
	new WOW().init();

    // Active tooltipster
    $('.tooltip').tooltipster({
    	animation: 'grow',
    	touchDevices: false,
   		contentAsHTML: true,
		interactive: true
    });
    $('#online-tooltip').tooltipster({
    	animation: 'grow',
    	contentAsHTML: true,
    	interactive: true,
        content: $('<span><img src="images/bbc-media-action.png" /> <strong><a class="audio-popup" href="https://www.youtube.com/watch?v=G0c0mWO7XgM">This text is in bold case !</a></strong></span>')
    });

    // Setup content a link work with magnificPopup
	$('.audio-popup, .tv').magnificPopup({
		type: 'iframe',
		preloader: false,
		removalDelay: 500,
		mainClass: 'mfp-fade',
		fixedContentPos: false
	});
});