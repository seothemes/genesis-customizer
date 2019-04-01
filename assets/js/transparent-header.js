(function (document, $) {

    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    /*
	 * Fixed header.
	 */
    $(window).on("load resize", function () {
        var transparentHeaderHeight = 0;
        var transparentHeader = false;
        var windowWidth = $(window).innerWidth();
        var breakpoint = genesisMenuParams.headerBreakpoint;

        // Transparent Header mobile.
        if (windowWidth <= breakpoint && $('body').hasClass('has-transparent-header-mobile')) {
            transparentHeader = true;
        }

        // Transparent Header desktop.
        if (windowWidth >= breakpoint && $('body').hasClass('has-transparent-header-desktop')) {
            transparentHeader = true;
        }

        // Transparent Header both.
        if ($('body').hasClass('has-transparent-header')) {
            transparentHeader = true;
        }

        if (transparentHeader === true) {
            transparentHeaderHeight = $('.site-header').outerHeight();
            $('.hero-section > .wrap').css('margin-top', transparentHeaderHeight);
        } else {
            $('.hero-section > .wrap').css('margin-top', 0);
        }

    });

})(document, jQuery);
