(function ($) {
    $(function () {
        var $table = $('.accordion_table');
        $table.find('.popup').hide();

        $table.find('.popup_parent').click(function () {
            $(this).find('.popup').slideToggle(500);
            $(this).find('.rotate').toggleClass("rotate1 rotate2");
        });
    });
})(jQuery);