(function (document, $) {

    $(window).on("load resize scroll", function () {
        var header = $('.site-header');
        var height = header.outerHeight();
        var scroll = $(window).scrollTop();

        // TODO: move function.
        if (scroll >= height) {
            $('.scroll-to-top-icon').css({
                'opacity': '1',
            })
        } else {
            $('.scroll-to-top-icon').css({
                'opacity': '0',
            })
        }
    });

    /**
     * Smooth scrolling.
     */
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        // Remove WooCommerce tabs
        .not('[href*="#tab-"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });

})(document, jQuery);
