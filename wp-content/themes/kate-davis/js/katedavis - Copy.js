$(document).ready(function() {

});

function imageCarousel(category, imagenumber){
    if (!$(this).hasClass('disabled')) {
        $.ajax({
            url: 'http://localhost/wp-katedavis/carousel-api?category='+ category + '&imagenumber=' + imagenumber,
            dataType: 'json',
            beforeSend: function() {  
            	finished = false;
            },
            success: function(data){
                if(data.imagecount == 2) {
                	htmlStr = '<img class="'+ data.orientation +'"style="display: inline-block;" src="'+ data.filepath1 + '"/>';
                	htmlStr = htmlStr + '<img class="'+ data.orientation +'"style="display: inline-block;" src="'+ data.filepath2 + '"/>';
                	$(".carousel").fadeOut('slow',function(){                    
    				    $(this).html(htmlStr);
                        finished = true;
    				}).fadeIn("slow");
                } else {
                	htmlStr = '<img class="'+ data.orientation +'" src="'+ data.filepath1 + '"/>';
                	$(".carousel").fadeOut('slow',function(){
    				    $(this).html(htmlStr);
                        finished = true;
    				}).fadeIn("slow");
                }
                setTimeout(function() {
                    $('.arrow-left-btn').removeClass('disabled');
                    $('.arrow-right-btn').removeClass('disabled');
                }, 2000);
            },
            error: function(){ 
                
            }
        }); 
    }
}

function showThumbnails() {
    $('.carousel').hide();
    $('.thumbnails').show();
    $('.arrow-left').hide();
    $('.arrow-right').hide();
    $('.carousel-thumbnail-icon').hide();
    $('.image-name').hide();
    $('.image-count').hide();
}

function closeThumbnails() {
    $('.carousel').show();
    $('.thumbnails').hide();
    $('.arrow-left').show();
    $('.arrow-right').show();
    //$('#carousel-thumbnail-icon-desktop').show();
    $('.image-name').show();
    $('.image-count').show();
}

function imageThumbnail(category){
    $.ajax({
        url: 'http://localhost/wp-katedavis/carousel-api?category='+ category,
        cache: false,   
        dataType: 'json',
        success: function(data){
            //console.log(data);
            htmlStr = "";
            $.each(data, function(i) {
                if(data[i].imagecount == 2) {
                    htmlStr = htmlStr + '<div id="images-'+ data[i].imageid +'" class="image"><img src="'+ data[i].imagethumbname1 +'"></div>';
                    htmlStr = htmlStr + '<div id="images-'+ data[i].imageid +'" class="image"><img src="'+ data[i].imagethumbname2 +'"></div>';
                    
                } else {
                    htmlStr = htmlStr +'<div id="images-'+ data[i].imageid +'" class="image"><img src="'+ data[i].imagethumbname1 +'"></div>';
                    $('#thumbnail-images').html(htmlStr);
                }
            });
            $('#thumbnail-images').html(htmlStr);
        },
        error: function(){ 
            
        }
    }); 
}