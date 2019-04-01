(function (document, $) {
    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    $(function () {
        if ($('body').hasClass('has-logo-above-mobile') || $('body').hasClass('has-logo-below-mobile')) {
            $('.menu-toggle').wrap('<div class="menu-toggle-bar"></div>');
        }
    });

    if ($('body').hasClass('has-logo-center')) {
        $(window).on("load resize", function () {
            var logo = $('.has-logo-center .title-area');
            var menu = $('.has-logo-center .menu-primary > .menu-item');
            var items = menu.length / 2 - 1;
            var windowWidth = $(window).innerWidth();
            var breakpoint = genesisMenuParams.breakpoint;
            var menuToggle = $('.menu-toggle');
            var menuToggleBar = $('.menu-toggle-bar');

            if (windowWidth <= breakpoint && menuToggleBar.length) {
                logo.insertBefore(menuToggleBar);
            } else if (windowWidth <= breakpoint) {
                logo.insertBefore(menuToggle);
            } else {
                menu.eq(Math.floor(items)).after(logo);
            }
        });
    }

})(document, jQuery);


