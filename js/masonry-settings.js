jQuery(document).ready(function($) {
    var $container = $('.widget-area').masonry();

    enquire
    .register("screen and (max-width:1024px)", {
        match: function() {
            $container.masonry({
                columnWidth: 365,
                itemSelector: '.widget',
                isFitWidth: true,
                isAnimated: true,
                gutter: 10
            });
        }/*,
        unmatch: function() {
            $container.masonry('destroy');
            console.log( 'masonry destroied' );
        }*/
    })
    .register("screen and (max-width:768px)", {
        match: function() {
            $container.masonry({
                columnWidth: 310,
                itemSelector: '.widget',
                isFitWidth: true,
                isAnimated: true,
                gutter: 10
            });
        }
    })
    .register("screen and (min-width:1024px)", {
        match: function() {
            $container.masonry('destroy');
            console.log( 'masonry destroied' );
        }
    })
});
