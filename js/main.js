$(window).on('load', function () {
    // Slideshow 3
    $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager'
    });


});
$(document).ready(function () {
    $("#cartProdQ:input").bind('keyup mouseup', function () {
        $('.cartQTotal').html(parseInt($(this).val()) * parseFloat($('#prodPrice').attr("price")));
    });
});