$(document).ready(function(){
    $('#publications_slider').slick({
        autoplay: true
    });
});

function showBurgerMenu(value) {
    if (value) {
        $('#burger_menu').addClass('show');
    } else {
        $('#burger_menu').removeClass('show');
    }
}