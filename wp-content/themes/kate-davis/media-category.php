<?php
/*
Template Name: Media Category
*/

get_header(); 

$pagetitle = get_the_title();
?>

<script type="text/javascript">
    var imagenumber = 0;
    var timeoutid = 0;
    var finished = true;
    var category = '<?php print $pagetitle; ?>';
    $(document).ready(function() {         
        $('.carousel').carousel({
            interval: 500000,
            pause: 'none'
        })

        $(".thumbnail-toggle a").on( "click", function(e) {
            $(this).removeClass('ui-link');
            var myClass = $(this).attr("class");
            if(myClass == "close-thumbnails-link"){
                closeThumbnails();
            } else if (myClass == "show-thumbnails-link" || myClass == "show-thumbnails-link ui-link"){
                showThumbnails();
            }
        });

        $(".close-thumbnails a").on( "click", function(e) {
            var myClass = $(this).attr("class");
            if(myClass == "close-thumbnails-link" || myClass == "close-thumbnails-link ui-link"){
                closeThumbnails();
            } else if (myClass == "show-thumbnails-link"){
                showThumbnails();
            }
        });

        $(".thumbnail").click(function() {
            id = $(this).attr('id');
            thumbnailsOpenCarousel(id);
        });  

        <?php if (wpmd_is_phone() == true or wpmd_is_tablet() == true): ?>
            $('#carousel').swiperight(function() {  
                $(this).carousel('prev');  
            }); 

            $('#carousel').swipeleft(function() {  
                $(this).carousel('next');  
            }); 

            $(document).on("touchmove", function(evt) { evt.preventDefault() });
            $(document).on("touchmove", ".scrollable", function(evt) { evt.stopPropagation() });
        <?php endif; ?>

            imageResize();

            $(window).resize(function() {
                imageResize();  
            });   
    });
        
</script>

	<div id="carousel" class="carousel carousel-fade slide">    
        <div class="carousel-inner"> 
            <?php 
                if (wpmd_is_phone() == true or wpmd_is_tablet() == true) {
                    include('carousel-mobile.php');
                } else {
                    include('carousel-desktop.php');
                } 
            ?>            
        </div>
        <div class="arrow-left">
            <a href="#carousel" class="arrow-left-btn left carousel-control" data-slide="prev"></a>
        </div>
        <div class="arrow-right">
            <a href="#carousel" class="arrow-right-btn right carousel-control" data-slide="next"></a>
        </div>   
    </div>
    <div class="thumbnails" style="display:none;">
        <div class="close-thumbnails">
            <a href="#" class="close-thumbnails-link">
                <span> CLOSE THUMBS </span>
                <img src="<?php echo get_template_directory_uri(); ?>/images/close-btn.png" />
            </a>    
        </div>
        <?php
            if (wpmd_is_phone() == true) {
                include('thumbnail-desktop.php');
            } else {
                include('thumbnail-desktop.php');
            } 
        ?>
    </div>

</div><!-- /.container -->

<div class="thumbnail-toggle">
    <a href="#" class="show-thumbnails-link"></a>
</div>

<?php get_footer(); ?>