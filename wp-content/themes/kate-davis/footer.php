<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Kate-Davis
 * @since Kate-Davis 1.0
 */
?> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

	    <div class="navbar-fixed-bottom navbar navbar-inverse <?php if (is_page_template('media-category.php') or (is_front_page())) { print 'carousel-nav';}?>">
	    <?php if (is_page_template('media-category.php') or (is_front_page())) 
	    	{ print '<div class="line-left"></div>
	    	<div class="line-right"></div>';
			}?>
	    
	    <div class="personal-details">
	        <span style="border:none"><a href="mailto:kate@katedavis.co.uk" style="color:#787878;">kate@katedavis.co.uk</a></span>
	        <span>+44 (0)777 9537 037</span>
	        <span class="copyright"> &copy; <?php echo date("Y"); ?> KATE DAVIS </span> 
	    </div>
	</div>

	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/katedavis.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>    
    
    <?php wp_footer(); ?>
  </body>
</html>