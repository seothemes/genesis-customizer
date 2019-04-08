(function (document, $) {

    if ($('body').hasClass('has-logo-side')) {
        return;
    }

    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu;

    $(window).on("load resize scroll", function () {
        var body = $('body'),
            aboveHeader = $('.above-header'),
            aboveHeaderHeight = aboveHeader.outerHeight(),
            navSecondary = $('.nav-secondary'),
            navSecondaryHeight = navSecondary.outerHeight(),
            siteHeader = $('.site-header'),
            siteHeaderHeight = siteHeader.outerHeight(),
            scrollTop = $(window).scrollTop(),
            navSecondaryScroll = scrollTop - aboveHeaderHeight,
            headerSearch = $('.header-search'),
            headerSearchScroll = navSecondaryScroll,
            noShrinkHeight = $('.no-shrink').outerHeight(),
            windowWidth = $(window).innerWidth(),
            breakpoint = genesisMenuParams.breakpoint,
            stickyEnabled = genesisMenuParams.sticky,
            transparentEnabled = genesisMenuParams.transparent,
            siteInner = $('.site-inner'),
            stickyHeaderHeight = 0,
            transparentHeaderHeight = 0,
            heroSection = $('.hero-section'),
            heroSectionWrap = $('.hero-section > .wrap'),
            adminBar = $('#wpadminbar').outerHeight(),
            stickyGhostButton = $('.site-header .ghost'),
            megaMenu = $('.mega-menu'),
            megaMenuHeight = megaMenu.outerHeight(),
            megaMenuScroll = scrollTop - megaMenuHeight,
            belowHeader = $('.below-header');

        if (stickyEnabled === 'all' || windowWidth <= breakpoint && stickyEnabled === 'mobile' || windowWidth >= breakpoint && stickyEnabled === 'desktop') {
            var hasStickyHeader = true;
            body.addClass('has-sticky-header');

        } else {
            hasStickyHeader = false;
            body.removeClass('has-sticky-header');
        }

        if (transparentEnabled === 'all' || windowWidth <= breakpoint && transparentEnabled === 'mobile' || windowWidth >= breakpoint && transparentEnabled === 'desktop') {
            var hasTransparentHeader = true;
            body.addClass('has-transparent-header');

        } else {
            hasTransparentHeader = false;
            body.removeClass('has-transparent-header');
        }

        /**
         * Site Header Shrink Class.
         */

        if (aboveHeader.length && !aboveHeader.is(':visible')) {
            aboveHeaderHeight = 0;
        }

        if (navSecondaryScroll > siteHeaderHeight) {
            navSecondaryScroll = siteHeaderHeight;
        }

        if (headerSearchScroll > navSecondaryHeight) {
            headerSearchScroll = navSecondaryHeight;
        }

        if (aboveHeader.length) {
            if (hasStickyHeader && scrollTop >= aboveHeaderHeight) {
                siteHeader.addClass('shrink');
                siteHeader.removeClass('no-shrink');
            } else {
                siteHeader.addClass('no-shrink');
                siteHeader.removeClass('shrink');
            }

        } else {
            if (hasStickyHeader && scrollTop > noShrinkHeight) {
                siteHeader.addClass('shrink');
                siteHeader.removeClass('no-shrink');
            } else {
                siteHeader.addClass('no-shrink');
                siteHeader.removeClass('shrink');
            }
        }

        /**
         * Nav Secondary.
         */

        if (hasStickyHeader && (siteHeader.hasClass('shrink') || !aboveHeader.length)) {
            navSecondary.css({
                'transform': 'translateY(' + -Math.abs(navSecondaryScroll) + 'px)'
            });
        } else {
            navSecondary.css({
                'transform': 'none'
            });
        }

        /**
         * Mega menu position.
         */

        if (hasStickyHeader && scrollTop < navSecondaryHeight) {
            megaMenu.css({
                'transform': 'translateY(' + -Math.abs(navSecondaryScroll) + 'px)'
            });

        } else if (hasStickyHeader) {
            megaMenu.css({
                'transform': 'translateY(' + -Math.abs(navSecondaryHeight) + 'px)'
            });

        } else {
            megaMenu.css({
                'transform': 'none'
            });
        }

        /**
         * Header Search
         */

        if (windowWidth >= breakpoint && siteHeader.hasClass('shrink')) {
            headerSearch.css({
                'transform': 'translateY(' + -Math.abs(headerSearchScroll) + 'px)'
            });
        } else {
            headerSearch.css({
                'transform': 'none'
            });
        }

        /**
         * Site Header Position and Margin.
         */

        if (hasStickyHeader && scrollTop >= aboveHeaderHeight) {
            siteHeader.css({
                'position': 'fixed',
            });

        } else if (hasStickyHeader || hasTransparentHeader) {
            siteHeader.css({
                'position': 'absolute',
            });

        } else {
            siteHeader.css({
                'position': 'relative',
            });
        }

        if (hasStickyHeader && scrollTop >= aboveHeaderHeight && aboveHeader.is(':visible')) {
            siteHeader.css({
                'margin-top': '-' + aboveHeaderHeight + 'px',
            });

        } else {
            siteHeader.css({
                'margin-top': '0px',
            });
        }

        /**
         * Site Inner Margin Top.
         */

        if (hasStickyHeader === true && hasTransparentHeader === false) {
            stickyHeaderHeight = siteHeader.outerHeight();
        }

        siteInner.css('margin-top', stickyHeaderHeight);


        /**
         * Hero Margin Top.
         */

        if (hasTransparentHeader === true) {
            transparentHeaderHeight = siteHeader.outerHeight();
            belowHeader.insertBefore(heroSectionWrap);
            heroSection.css('padding-top', transparentHeaderHeight);
        } else {
            belowHeader.insertBefore(heroSection);
            heroSection.css('padding-top', 0);
        }

        /**
         * Admin bar site header spacing.
         */

        if (body.hasClass('admin-bar') && (hasStickyHeader || hasTransparentHeader)) {
            siteHeader.css('top', adminBar);
        } else {
            siteHeader.css('top', 0);
        }

        /**
         * Remove ghost button class.
         */

        if (hasStickyHeader) {
            if (siteHeader.hasClass('shrink')) {
                stickyGhostButton.removeClass('ghost');
            } else {
                stickyGhostButton.addClass('ghost');
            }
        }

    });

})(document, jQuery);
