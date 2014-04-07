<?php
/*
Template Name: Home
*/

get_header(); 

$pagetitle = 'Home';

?>

<script type="text/javascript">
    var imagenumber = 0;
    var timeoutid = 0;
    var finished = true;
    var category = '<?php print pagetitle; ?>';
    $(document).ready(function() {         
        $('.carousel').carousel({
            interval: 5000,
            pause: 'none'
        })

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
                    include('carousel-mobile-home.php');
                } else {
                    include('carousel-desktop-home.php');
                } 
            ?>            
        </div>
    </div>

</div><!-- /.container -->

<?php get_footer(); ?>