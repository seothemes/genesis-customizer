(function (document, $) {
    $(function () {
        var button = $('.fl-builder-toggle-header-button');
        var header = $('.site-header');

        button.on('click', function () {
            header.fadeToggle(100);
        });
    });

})(document, jQuery);


