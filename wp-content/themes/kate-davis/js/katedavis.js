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
    $('.thumbstxt').show();
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
    });
    $('.thumbstxt').hide();
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
    headerHeight = $('.navbar-fixed-top').height();
    footerHeight = $('.navbar-fixed-bottom').height();
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        imageHeight = windowHeight - headerHeight - footerHeight;
    } else {
        imageHeight = windowHeight - headerHeight - footerHeight - 22;
    }
    
    $(".item img").each(function(){
        $(".item > img").height(imageHeight);
    });
}