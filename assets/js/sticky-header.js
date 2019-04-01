(function (document, $) {

    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    /**
     * Add shrink class to header on scroll.
     */
    $(window).on("load resize scroll", function () {
        var body = $('body');
        var aboveHeader = $('.above-header');
        var aboveHeaderHeight = aboveHeader.outerHeight();
        var navSecondary = $('.nav-secondary');
        var navSecondaryHeight = navSecondary.outerHeight();
        var siteHeader = $('.site-header');
        var siteHeaderHeight = siteHeader.outerHeight();
        var scroll = $(window).scrollTop();
        var navSecondaryScroll = scroll - aboveHeaderHeight;
        var headerSearch = $('.header-search');
        var headerSearchScroll = navSecondaryScroll;
        var primaryHeaderHeight = $('.primary-header').outerHeight();
        var windowWidth = $(window).innerWidth();
        var breakpoint = genesisMenuParams.breakpoint;

        if (!aboveHeader.is(':visible')) {
            aboveHeaderHeight = 0;
        }

        if (navSecondaryScroll > siteHeaderHeight) {
            navSecondaryScroll = siteHeaderHeight;
        }

        if (headerSearchScroll > navSecondaryHeight) {
            headerSearchScroll = navSecondaryHeight;
        }

        if (!body.hasClass('has-logo-side')) {

            if (aboveHeader.length) {
                if (!body.hasClass('no-sticky-header') && scroll >= aboveHeaderHeight) {
                    siteHeader.addClass('shrink');
                    siteHeader.removeClass('no-shrink');
                } else {
                    siteHeader.addClass('no-shrink');
                    siteHeader.removeClass('shrink');
                }
            } else {
                if (!body.hasClass('no-sticky-header') && scroll >= primaryHeaderHeight) {
                    siteHeader.addClass('shrink');
                    siteHeader.removeClass('no-shrink');
                } else {
                    siteHeader.addClass('no-shrink');
                    siteHeader.removeClass('shrink');
                }
            }
        }

        // Has sticky nav secondary.
        if (siteHeader.hasClass('shrink') || !aboveHeader.length) {
            navSecondary.css({
                'transform': 'translateY(' + -Math.abs(navSecondaryScroll) + 'px)'
            });
        } else {
            navSecondary.css({
                'transform': 'none'
            });
        }

        if (windowWidth >= breakpoint && siteHeader.hasClass('shrink')) {
            headerSearch.css({
                'transform': 'translateY(' + -Math.abs(headerSearchScroll) + 'px)'
            });
        } else {
            headerSearch.css({
                'transform': 'none'
            });
        }

        // Has sticky above header.
        if (!body.hasClass('no-sticky-header') && !body.hasClass('has-logo-side') && (body.hasClass('has-sticky-header') || body.hasClass('has-sticky-header-desktop') && windowWidth >= breakpoint || body.hasClass('has-sticky-header-mobile') && windowWidth <= breakpoint)) {

            // Default.
            if (scroll >= aboveHeaderHeight && aboveHeader.is(':visible')) {
                siteHeader.css({
                    'margin-top': '-' + aboveHeaderHeight + 'px',
                    'position': 'fixed',
                });

            } else if (scroll >= aboveHeaderHeight) {
                siteHeader.css({
                    'margin-top': '-' + aboveHeaderHeight + 'px',
                    'position': 'fixed',
                });

            } else if (!body.hasClass('no-transparent-header')) {
                siteHeader.css({
                    'margin-top': '0',
                    'position': 'absolute',
                });
            } else {
                siteHeader.css({
                    'margin-top': '0px',
                    'position': 'absolute',
                });
            }
        }
    });

    /*
	 * Fixed header.
	 */
    $(window).on("load resize", function () {
        var body = $('body');
        var siteHeader = $('.site-header');
        var siteInner = $('.site-inner');
        var stickyHeaderHeight = 0;
        var stickyHeader = false;
        var transparentHeader = false;
        var windowWidth = $(window).innerWidth();
        var breakpoint = genesisMenuParams.breakpoint;

        // Sticky Header mobile.
        if (windowWidth <= breakpoint && body.hasClass('has-sticky-header-mobile')) {
            stickyHeader = true;
        }

        // Has transparent header mobile.
        if (windowWidth <= breakpoint && body.hasClass('has-transparent-header-mobile')) {
            transparentHeader = true;
        }

        // Sticky Header desktop.
        if (windowWidth >= breakpoint && body.hasClass('has-sticky-header-desktop')) {
            stickyHeader = true;
        }

        // Has transparent header desktop.
        if (windowWidth >= breakpoint && body.hasClass('has-transparent-header-desktop')) {
            transparentHeader = true;
        }

        // Sticky Header both.
        if (body.hasClass('has-sticky-header')) {
            stickyHeader = true;
        }

        // Has transparent header both
        if (body.hasClass('has-transparent-header')) {
            transparentHeader = true;
        }

        // Remove margin for side logo layout
        if (body.hasClass('has-logo-side')) {
            stickyHeader = false;
        }

        if (stickyHeader === true && transparentHeader === false) {
            stickyHeaderHeight = siteHeader.outerHeight();
        }

        siteInner.css('margin-top', stickyHeaderHeight);
    });

})(document, jQuery);
