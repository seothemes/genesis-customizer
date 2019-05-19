(function (document, $) {

    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    /**
     * Hide/show mega menu.
     */
    var megaMenuLink = $('.has-mega-menu'),
        notMegaMenuLink = $('nav .menu-item:not(.has-mega-menu)'),
        megaMenu = $('.mega-menu'),
        siteHeader = $('.site-header'),
        navSecondary = $('.nav-secondary');

    megaMenu.removeClass('hide');
    megaMenu.fadeOut(0);

    if (navSecondary.length) {
        megaMenu.insertAfter(navSecondary);
    }

    megaMenuLink.hover(function () {
        megaMenu.fadeIn(300);
    });

    notMegaMenuLink.hover(function () {
        megaMenu.fadeOut(300);
    });

    megaMenu.hover(
        function () {
            megaMenu.fadeIn(300);
        },
        function () {
            megaMenu.fadeOut(300);
        }
    );

    siteHeader.hover(
        function () {
        },
        function () {
            megaMenu.fadeOut(300);
        }
    );

    /*
     * Add button class to menu item spans.
     */
    var menuItem = $('.menu-item.button');

    menuItem.removeClass('button');
    menuItem.find('span').addClass('button');

    if (menuItem.hasClass('small')) {
        menuItem.removeClass('small');
        menuItem.find('span').addClass('small');
    }

    if (menuItem.hasClass('ghost')) {
        menuItem.removeClass('ghost');
        menuItem.find('span').addClass('ghost');
    }


    /**
     * Logo above header widgets alignment.
     */
    if ($('body').hasClass('has-logo-above')) {
        $(window).on("load resize", function () {
            var windowWidth = $(window).innerWidth(),
                breakpoint = genesisMenuParams.breakpoint,
                primaryHeaderHeight = $('.primary-header').outerHeight(),
                navPrimaryHeight = $('.nav-primary').outerHeight(true),
                headerLeft = $('.header-left'),
                headerRight = $('.header-right');

            if (windowWidth > breakpoint) {
                headerLeft.css({
                    'position': 'absolute',
                    'left': '0',
                    'bottom': ((primaryHeaderHeight - navPrimaryHeight) - (headerLeft.outerHeight() / 2)) + 'px',
                });
                headerRight.css({
                    'position': 'absolute',
                    'right': '0',
                    'bottom': ((primaryHeaderHeight - navPrimaryHeight) - (headerRight.outerHeight() / 2)) + 'px',
                });
            } else {
                headerLeft.css({
                    'position': 'relative',
                    'left': 'auto',
                    'bottom': 'auto',
                });
                headerRight.css({
                    'position': 'relative',
                    'right': 'auto',
                    'bottom': 'auto',
                });
            }
        });
    }
})(document, jQuery);


