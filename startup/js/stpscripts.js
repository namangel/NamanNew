jQuery(function ($) {

    'use strict';

    // --------------------------------------------------------------------
    // PreLoader
    // --------------------------------------------------------------------

    (function () {
        $('#preloader').delay(200).fadeOut('slow');
    }());


    // --------------------------------------------------------------------
    // Owl Carousal
    // --------------------------------------------------------------------

    (function () {
        $("#review").owlCarousel({
            autoPlay: 10000, //Set AutoPlay to 10 seconds
            items: 2,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });
    }());


}); // JQuery end
