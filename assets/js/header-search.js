(function (document, $) {
    if ($('.header-search').hasClass('full-screen')) {

        $('.header-search-toggle').on('click', function () {
            $('.header-search').toggleClass('visible');
        });

        $('.header-search-close').on('click', function () {
            $('.header-search').removeClass('visible');
        });

    } else {
        $('.header-search-toggle').on('click', function () {
            $('.header-search').slideToggle('fast');
        });
    }

    $(window).on("load resize", function () {
        var searchToggle = $('.header-search-toggle.hide-desktop');
        var searchToggleHeight = searchToggle.outerHeight();
        var halfHeight = searchToggleHeight / 2;
        var titleAreaHeight = $('.title-area').outerHeight( true ) / 2;
        var menuToggleBarHeight = $('.menu-toggle-bar').outerHeight();

        if ($('body').hasClass('has-logo-above-mobile')) {
            searchToggle.css('top', titleAreaHeight - halfHeight + 'px');
        }

        if ($('body').hasClass('has-logo-below-mobile')) {
            console.log(menuToggleBarHeight);
            console.log(titleAreaHeight);
            console.log(halfHeight);
            searchToggle.css('top', menuToggleBarHeight + (titleAreaHeight - halfHeight));
        }
    });

})(document, jQuery);

