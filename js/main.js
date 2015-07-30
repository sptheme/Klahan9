
jQuery(document).ready(function($){

	/* 
	 * Toggles search on and off
	 */
    $(".search-toggle").click(function() {
        $("#search-container").slideToggle('slow', function(){
            $('.search-toggle').toggleClass('active');
        });
        // Optional return false to avoid the page "jumping" when clicked
        return false;
    });

    /**
     *  Magnific Popup        
     */
      $('.watch-now, .listen-now').magnificPopup({
          type: 'iframe',
          preloader: false,
          removalDelay: 500,
          mainClass: 'mfp-fade',
          fixedContentPos: false
      });

    /**
    /*  Make all the videos responsive with FitVids - http://fitvidsjs.com/         
    /*/
    $('#content').fitVids();  
     
});