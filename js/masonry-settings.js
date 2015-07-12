jQuery(document).ready(function($) {
    var $container = $('.widget-area').masonry();
    enquire.register("screen and (min-width:600px)", {
        match: function() {
            $container.masonry({
                columnWidth: 310,
                itemSelector: '.widget',
                isFitWidth: true,
                isAnimated: true,
                gutter: 10
            });
        },
        unmatch: function() {
            $container.masonry('destroy');
        }
    });
});
