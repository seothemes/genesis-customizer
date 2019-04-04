(function (document, $) {

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

    if ( navSecondary.length) {
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

})(document, jQuery);


