jQuery(function ($) {
    var isotopeParams = typeof genesis_customizer_isotope === 'undefined' ? '' : genesis_customizer_isotope;

    $(window).load(function () {

        // Main function.
        function isotope() {
            var $container = $('.masonry');
            $container.isotope({
                itemSelector: '.entry',
                masonry: {
                    itemSelector: '.entry',
                    columnWidth: ".entry",
                    gutter: parseInt(isotopeParams.gutter)
                },
                percentPosition: true
            });
        }

        isotope();

        // Filter.
        $('.filter a').click(function () {
            var selector = $(this).attr('data-filter');
            $('.portfolio-content').isotope({filter: selector});
            $(this).parent().find('a').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        // Resize.
        var isIE8 = $.browser.msie && +$.browser.version === 8;
        if (isIE8) {
            document.body.onresize = function () {
                isotope();
            };
        } else {
            $(window).resize(function () {
                isotope();
            });
        }

        // Orientation change.
        window.addEventListener("orientationchange", function () {
            isotope();
        });
    });
});
