(function($) {
$(function() {
    var $table = $('.accordion_table');
    $table.find("tr").not('.accordion').hide();
    $table.find("tr").eq(0).show();

    $table.find(".accordion").click(function(){
        $table.find('.accordion').not(this).siblings().fadeOut(500);
        $(this).siblings().fadeToggle(500);
    }).eq(0).trigger('click');
});
})(jQuery);