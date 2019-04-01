(function (document, $) {

    /**
     * Admin bar site header spacing.
     */
    $(window).on("load resize", function () {
        if ($('body').hasClass('admin-bar')) {
            var adminBar = $('#wpadminbar').outerHeight();

            $('.has-sticky-header .site-header').css('top', adminBar);
            $('.has-sticky-header-mobile .site-header').css('top', adminBar);
            $('.has-sticky-header-desktop .site-header').css('top', adminBar);
        }
    });

    /**
     * Hide/show mega menu.
     */
    var megaMenuLink = $('.has-mega-menu');
    var megaMenu = $('.mega-menu');

    megaMenuLink.hover(function () {
        megaMenu.fadeIn(300);
    });

    megaMenu.hover(
        function () {
            megaMenu.fadeIn(300);
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
     * Remove ghost button class in sticky header.
     */
    if ($('body').hasClass('has-sticky-header') || $('body').hasClass('has-sticky-header-mobile') || $('body').hasClass('has-sticky-header-desktop')) {
        var stickyGhostButton = $('.site-header .ghost');

        $(window).on("load resize scroll", function () {
            if ($('.site-header').hasClass('shrink')) {
                stickyGhostButton.removeClass('ghost');
            } else {
                stickyGhostButton.addClass('ghost');
            }
        });
    }

})(document, jQuery);


