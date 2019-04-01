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



(function (document, $) {
    $(function () {
        var button = $('.fl-builder-toggle-header-button');
        var header = $('.site-header');

        button.on('click', function () {
            header.fadeToggle(100);
        });
    });

})(document, jQuery);



/**
 * Add the accessible responsive menu.
 *
 * @version 1.1.3
 *
 * @author StudioPress
 * @link https://github.com/copyblogger/responsive-menus/
 * @license GPL-2.0-or-later
 * @package GenesisSample
 */

(function (document, $, undefined) {

    'use strict';

    var genesisMenuParams = typeof genesis_responsive_menu === 'undefined' ? '' : genesis_responsive_menu,
        genesisMenusUnchecked = genesisMenuParams.menuClasses,
        genesisMenus = {},
        menusToCombine = [];

    /**
     * Validate the menus passed by the theme with what's being loaded on the page,
     * and pass the new and accurate information to our new data.
     *
     * @param {genesisMenusUnchecked} Raw data from the localized script in the theme.
     * @return {array} genesisMenus array gets populated with updated data.
     * @return {array} menusToCombine array gets populated with relevant data.
     */
    $.each(
        genesisMenusUnchecked, function (group) {

            // Mirror our group object to populate.
            genesisMenus[group] = [];

            // Loop through each instance of the specified menu on the page.
            $.each(
                this, function (key, value) {

                    var menuString = value,
                        $menu = $(value);

                    // If there is more than one instance, append the index and update array.
                    if ($menu.length > 1) {

                        $.each(
                            $menu, function (key, value) {

                                var newString = menuString + '-' + key;

                                $(this).addClass(newString.replace('.', ''));

                                genesisMenus[group].push(newString);

                                if ('combine' === group) {
                                    menusToCombine.push(newString);
                                }

                            }
                        );

                    } else if ($menu.length == 1) {

                        genesisMenus[group].push(menuString);

                        if ('combine' === group) {
                            menusToCombine.push(menuString);
                        }

                    }

                }
            );

        }
    );

    // Make sure there is something to use for the 'others' array.
    if (typeof genesisMenus.others == 'undefined') {
        genesisMenus.others = [];
    }

    // If there's only one menu on the page for combining, push it to the 'others' array and nullify our 'combine' variable.
    if (menusToCombine.length == 1) {
        genesisMenus.others.push(menusToCombine[0]);
        genesisMenus.combine = null;
        menusToCombine = null;
    }

    var genesisMenu = {},
        mainMenuButtonClass = 'menu-toggle',
        subMenuButtonClass = 'sub-menu-toggle',
        responsiveMenuClass = 'genesis-responsive-menu';

    // Initialize.
    genesisMenu.init = function () {

        // Exit early if there are no menus to do anything.
        if ($(_getAllMenusArray()).length == 0) {
            return;
        }

        var menuIconClass = typeof genesisMenuParams.menuIconClass !== 'undefined' ? genesisMenuParams.menuIconClass : 'dashicons-before dashicons-menu';
        var subMenuIconClass = typeof genesisMenuParams.subMenuIconClass !== 'undefined' ? genesisMenuParams.subMenuIconClass : 'dashicons-before dashicons-arrow-down-alt2';
        var toggleButtons = {
            menu: $('<button />', {
                    'class': mainMenuButtonClass,
                    'aria-expanded': false,
                    'aria-pressed': false
                }
            ).append(genesisMenuParams.mainMenu),
            submenu: $(
                '<button />', {
                    'class': subMenuButtonClass,
                    'aria-expanded': false,
                    'aria-pressed': false
                }
            ).append($('<span />', {
                    'class': 'sub-menu-toggle-icon sub-menu-toggle-' + genesisMenuParams.subMenuIcon
                })
            ).append($('<span />', {
                    'class': 'screen-reader-text',
                    'text': genesisMenuParams.subMenu
                })
            )
        };

        // Add the responsive menu class to the active menus.
        _addResponsiveMenuClass();

        // Add the main nav button to the primary menu, or exit the plugin.
        _addMenuButtons(toggleButtons);

        // Setup additional classes.
        $('.' + mainMenuButtonClass).addClass(menuIconClass);
        $('.' + subMenuButtonClass).addClass(subMenuIconClass);
        $('.' + mainMenuButtonClass).on('click.genesisMenu-mainbutton', _mainmenuToggle).each(_addClassID);
        $('.' + subMenuButtonClass).on('click.genesisMenu-subbutton', _submenuToggle);
        $(window).on('resize.genesisMenu', _doResize).triggerHandler('resize.genesisMenu');

        _addMenuOverlay();
        var menuOverlay = $('.menu-overlay');
        menuOverlay.on('click', _mainmenuToggle);

    };

    function _addMenuOverlay() {
        $('.nav-primary').after('<div class="menu-overlay"></div>');
    }

    /**
     * Add menu toggle button to appropriate menus.
     *
     * @param {toggleButtons} Object of menu buttons to use for toggles.
     */
    function _addMenuButtons(toggleButtons) {

        // Apply sub menu toggle to each sub-menu found in the menuList.
        $(_getMenuSelectorString(genesisMenus)).find('.sub-menu').before(toggleButtons.submenu);

        if (menusToCombine !== null) {

            var menusToToggle = genesisMenus.others.concat(menusToCombine[0]);

            // Only add menu button the primary menu and navs NOT in the combine variable.
            $(_getMenuSelectorString(menusToToggle)).before(toggleButtons.menu);

        } else {

            // Apply the main menu toggle to all menus in the list.
            $(_getMenuSelectorString(genesisMenus.others)).before(toggleButtons.menu);

        }

    }

    /**
     * Add the responsive menu class.
     */
    function _addResponsiveMenuClass() {
        $(_getMenuSelectorString(genesisMenus)).addClass(responsiveMenuClass);
    }

    /**
     * Execute our responsive menu functions on window resizing.
     */
    function _doResize() {
        var buttons = $('button[id^="genesis-mobile-"]').attr('id');
        if (typeof buttons === 'undefined') {
            return;
        }
        _maybeClose(buttons);
        _superfishToggle(buttons);
        _changeSkipLink(buttons);
        _combineMenus(buttons);
    }

    /**
     * Add the nav- class of the related navigation menu as
     * an ID to associated button (helps target specific buttons outside of context).
     */
    function _addClassID() {
        var $this = $(this),
            nav = $this.next('nav'),
            id = 'class';

        $this.attr('id', 'genesis-mobile-' + $(nav).attr(id).match(/nav-\w*\b/));
    }

    /**
     * Combine our menus if the mobile menu is visible.
     *
     * @params buttons
     */
    function _combineMenus(buttons) {

        // Exit early if there are no menus to combine.
        if (menusToCombine == null) {
            return;
        }

        // Split up the menus to combine based on order of appearance in the array.
        var primaryMenu = menusToCombine[0],
            combinedMenus = $(menusToCombine).filter(
                function (index) {
                    if (index > 0) {
                        return index;
                    }
                }
            );

        // If the responsive menu is active, append items in 'combinedMenus' object to the 'primaryMenu' object.
        if ('none' !== _getDisplayValue(buttons)) {

            $.each(
                combinedMenus, function (key, value) {
                    $(value).find('.menu > li').addClass('moved-item-' + value.replace('.', '')).appendTo(primaryMenu + ' ul.genesis-nav-menu');
                }
            );
            $(_getMenuSelectorString(combinedMenus)).hide();

        } else {

            $(_getMenuSelectorString(combinedMenus)).show();
            $.each(
                combinedMenus, function (key, value) {
                    $('.moved-item-' + value.replace('.', '')).appendTo(value + ' ul.genesis-nav-menu').removeClass('moved-item-' + value.replace('.', ''));
                }
            );

        }

    }

    /**
     * Action to happen when the main menu button is clicked.
     */
    function _mainmenuToggle() {
        var overlay = $('.menu-overlay');
        var button = $('.' + mainMenuButtonClass);

        _toggleAria(button, 'aria-pressed');
        _toggleAria(button, 'aria-expanded');
        button.toggleClass('activated');
        overlay.toggleClass('activated');

        if ($('body').hasClass('has-mobile-menu-top')) {
            // $this.next('nav').slideToggle('fast');
            $('.nav-primary').slideToggle('fast');
        } else {
            // $this.next('nav').toggleClass('visible');
            $('.nav-primary').toggleClass('visible');
        }
    }

    /**
     * Action for submenu toggles.
     */
    function _submenuToggle() {

        var $this = $(this),
            others = $this.closest('.menu-item').siblings();
        _toggleAria($this, 'aria-pressed');
        _toggleAria($this, 'aria-expanded');
        $this.toggleClass('activated');
        $this.next('.sub-menu').slideToggle('fast');

        others.find('.' + subMenuButtonClass).removeClass('activated').attr('aria-pressed', 'false');
        others.find('.sub-menu').slideUp('fast');

    }

    /**
     * Activate/deactivate superfish.
     *
     * @params buttons
     */
    function _superfishToggle(buttons) {
        var _superfish = $('.' + responsiveMenuClass + ' .js-superfish'),
            $args = 'destroy';
        if (typeof _superfish.superfish !== 'function') {
            return;
        }
        if ('none' === _getDisplayValue(buttons)) {
            $args = {
                'delay': 100,
                'animation': {'opacity': 'show', 'height': 'show'},
                'dropShadows': false,
                'speed': 'fast'
            };
        }
        _superfish.superfish($args);
    }

    /**
     * Modify skip link to match mobile buttons.
     *
     * @param buttons
     */
    function _changeSkipLink(buttons) {

        // Start with an empty array.
        var menuToggleList = _getAllMenusArray();

        // Exit out if there are no menu items to update.
        if (!$(menuToggleList).length > 0) {
            return;
        }

        $.each(
            menuToggleList, function (key, value) {

                var newValue = value.replace('.', ''),
                    startLink = 'genesis-' + newValue,
                    endLink = 'genesis-mobile-' + newValue;

                if ('none' == _getDisplayValue(buttons)) {
                    startLink = 'genesis-mobile-' + newValue;
                    endLink = 'genesis-' + newValue;
                }

                var $item = $('.genesis-skip-link a[href="#' + startLink + '"]');

                if (menusToCombine !== null && value !== menusToCombine[0]) {
                    $item.toggleClass('skip-link-hidden');
                }

                if ($item.length > 0) {
                    var link = $item.attr('href');
                    link = link.replace(startLink, endLink);

                    $item.attr('href', link);
                } else {
                    return;
                }

            }
        );

    }

    /**
     * Close all the menu toggles if buttons are hidden.
     *
     * @param buttons
     */
    function _maybeClose(buttons) {
        if ('none' !== _getDisplayValue(buttons)) {
            return true;
        }

        $('.' + mainMenuButtonClass + ', .' + responsiveMenuClass + ' .sub-menu-toggle')
            .removeClass('activated')
            .attr('aria-expanded', false)
            .attr('aria-pressed', false);

        $('.' + responsiveMenuClass + ', .' + responsiveMenuClass + ' .sub-menu')
            .attr('style', '');
    }

    /**
     * Generic function to get the display value of an element.
     *
     * @param  {id} $id ID to check
     * @return {string}     CSS value of display property
     */
    function _getDisplayValue($id) {
        var element = document.getElementById($id),
            style = window.getComputedStyle(element);
        return style.getPropertyValue('display');
    }

    /**
     * Toggle aria attributes.
     *
     * @param  {button} $this     passed through
     * @param  {aria-xx} attribute aria attribute to toggle
     * @return {bool}           from _ariaReturn
     */
    function _toggleAria($this, attribute) {
        $this.attr(
            attribute, function (index, value) {
                return 'false' === value;
            }
        );
    }

    /**
     * Helper function to return a comma separated string of menu selectors.
     *
     * @param {itemArray} Array of menu items to loop through.
     * @param {ignoreSecondary} boolean of whether to ignore the 'secondary' menu item.
     * @return {string} Comma-separated string.
     */
    function _getMenuSelectorString(itemArray) {

        var itemString = $.map(
            itemArray, function (value, key) {
                return value;
            }
        );

        return itemString.join(',');

    }

    /**
     * Helper function to return a group array of all the menus in
     * both the 'others' and 'combine' arrays.
     *
     * @return {array} Array of all menu items as class selectors.
     */
    function _getAllMenusArray() {

        // Start with an empty array.
        var menuList = [];

        // If there are menus in the 'menusToCombine' array, add them to 'menuList'.
        if (menusToCombine !== null) {

            $.each(
                menusToCombine, function (key, value) {
                    menuList.push(value.valueOf());
                }
            );

        }

        // Add menus in the 'others' array to 'menuList'.
        $.each(
            genesisMenus.others, function (key, value) {
                menuList.push(value.valueOf());
            }
        );

        if (menuList.length > 0) {
            return menuList;
        } else {
            return null;
        }

    }

    $(document).ready(
        function () {

            if (_getAllMenusArray() !== null) {

                genesisMenu.init();

            }

        }
    );

})(document, jQuery);

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

