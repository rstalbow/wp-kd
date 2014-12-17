$(document).ready(function() {

   /* $('.navbar-toggle').on( "click", function(e) {
        $('#mobile-nav').show();
    });*/
});

function showThumbnails() {
    $('#carousel').hide();
    $('.carousel').carousel('pause');
    $('.thumbnails').show();
    $('#arrow-left').hide();
    $('#arrow-right').hide();
    $('.carousel-thumbnail-icon').hide();
    $('.image-name').hide();
    $('.image-count').hide();
    $('.thumbstxt').show();
    $('.thumbnail-toggle').addClass('current');
    $('.thumbnail-toggle a').addClass('close-thumbnails-link').removeClass('show-thumbnails-link');

    $(document).unbind('touchmove');
    $(document).unbind("touchmove", ".scrollable");
}

function closeThumbnails() {
    $('.carousel').show();
    $('.thumbnails').hide();
    $('#arrow-left').show();
    $('#arrow-right').show();
    $('.image-name').show();
    $('.image-count').show();
    $('.carousel').carousel({
        interval: 5000,
        pause: 'none'
    });
    $('.thumbstxt').hide();
    $('.thumbnail-toggle').removeClass('current');
    $('.thumbnail-toggle a').removeClass('close-thumbnails-link').addClass('show-thumbnails-link');

    $(document).on("touchmove", function(evt) { evt.preventDefault() });
    $(document).on("touchmove", ".scrollable", function(evt) { evt.stopPropagation() });
}

function thumbnailsOpenCarousel(id) {
    $(".item").removeClass("active");
    carouselid = id.split('-');
    carouselid = carouselid[1];
    carouselid = '#carouselid-'+carouselid;
    $(carouselid).parent().addClass("active");
    closeThumbnails();
    imageResize();
}

function imageResize() {
    windowHeight = $(window).height();
    windowWidth = $(window).width();
    headerHeight = $('.navbar-fixed-top').height();
    footerHeight = $('.navbar-fixed-bottom').height();
    if( /iPad/i.test(navigator.userAgent) ) {
        if (windowWidth > windowHeight) {
            imageHeight = windowHeight - headerHeight - footerHeight - 43;
        } else {
            imageHeight = windowHeight - headerHeight - footerHeight - 22;
        }
    }
    else if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        imageHeight = windowHeight - headerHeight - footerHeight - 2;
    } else {
        imageHeight = windowHeight - headerHeight - footerHeight - 22;
    }

    $(".item img").each(function(){
        height = $(this).height();
        width = $(this).width();

        $(".item > img").height(imageHeight);
    });
}

function validatePDFForm(){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    var to = $('#to').val();
    var email = $('#email').val();
    var subject = $('#subject').val();

    var inputVal = new Array(to, email, subject);

    var inputMessage = new Array("to", "email", "subject");
    var errors = false;

    if(inputVal[0] == ""){
        $('#toLabel').after('<span class="error"> Please enter your ' + inputMessage[0] + '</span>');
        errors = true;
    } 

    if(inputVal[1] == ""){
        $('#emailLabel').after('<span class="error"> Please enter your ' + inputMessage[1] + '</span>');
        errors = true;
    } 
    else if(!emailReg.test(email)){
        $('#emailLabel').after('<span class="error"> Please enter a valid email address</span>');
        errors = true;
    }

    if(inputVal[2] == ""){
        $('#subjectLabel').after('<span class="error"> Please enter your ' + inputMessage[2] + '</span>');
        errors = true;
    }      

    if (errors == false){
        formData = $('#pdfForm').serializeArray();
        formURL = $('#pdfForm').attr("action");
        pdfFormSubmit(formData, formURL);
    } 
}

function pdfFormSubmit(formdata, formURL){
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : formData,
        success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
}

function addOrRemove(array, value) {
    var index = array.indexOf(value);

    if (index === -1) {
        array.push(value);
    } else {
        array.splice(index, 1);
    }
}