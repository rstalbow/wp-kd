$(document).ready(function() {

   /* $('.navbar-toggle').on( "click", function(e) {
        $('#mobile-nav').show();
    });*/
});

function showThumbnails() {
    $('#carousel').hide();
    $('.carousel').carousel('pause');
    $('.thumbnails').show();
    $('.arrow-left').hide();
    $('.arrow-right').hide();
    $('.carousel-thumbnail-icon').hide();
    $('.image-name').hide();
    $('.image-count').hide();
    $('.thumbnail-toggle').addClass('current');
    $('.thumbnail-toggle a').addClass('close-thumbnails-link').removeClass('show-thumbnails-link');
}

function closeThumbnails() {
    $('.carousel').show();
    $('.thumbnails').hide();
    $('.arrow-left').show();
    $('.arrow-right').show();
    $('.image-name').show();
    $('.image-count').show();
    $('.carousel').carousel({
        interval: 5000,
        pause: 'none'
    })
    $('.thumbnail-toggle').removeClass('current');
    $('.thumbnail-toggle a').removeClass('close-thumbnails-link').addClass('show-thumbnails-link');
}

function thumbnailsOpenCarousel(id) {
    $(".item").removeClass("active");
    carouselid = id.split('-');
    carouselid = carouselid[1];
    carouselid = '#carouselid-'+carouselid;
    $(carouselid).parent().addClass("active");
    closeThumbnails();
}

function imageResize() {
    windowHeight = $(window).height();
    imageHeight = windowHeight - 110;

    $(".item img").each(function(){
        $(".item > img").height(imageHeight);
    });
}