function showGalleryModal(value, image_index) {
    if (value) {
        $('#media_slider').slick('slickGoTo', image_index);
        $('#gallery_modal').addClass('show');
    } else {
        $('#gallery_modal').removeClass('show');
    }
}

$(document).ready(function(){
    $('#media_slider').slick();
});