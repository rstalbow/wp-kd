<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Kate-Davis
 * @since Kate-Davis 1.0
 */
?><!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">
	<title><?php bloginfo('name'); ?><?php wp_title( '|', true, 'left' ); ?></title>

	<!-- Bootstrap core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/katedavies.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <?php 
        if (wpmd_is_phone() == true or wpmd_is_tablet() == true) { ?>
            <script>
                $(document).bind("mobileinit", function(){
                    $.mobile.ajaxEnabled = false;
                    $.mobile.loadingMessage = false;
                });
            </script>
            <script src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script>
        <?php }
    ?>

	<?php wp_head(); ?>
</head>

<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="left-nav" class="collapse navbar-collapse">
                    <?php wp_nav_menu( array( 'menu' => 'left menu', 'menu_class' => 'nav navbar-nav' ) ); ?>    
                </div>
                <div class="logo">
                    <a class="navbar-brand" href="/">KATE DAVIS</a>
                </div>
                <div id="right-nav" class="collapse navbar-collapse">
                    <?php wp_nav_menu( array( 'menu' => 'right menu', 'menu_class' => 'nav navbar-nav' ) ); ?>    
                </div>
                <div id="pdfcreator">
                    <a href="#"><img style="margin-right: 2px; margin-top: -4px;" src="<?php echo get_template_directory_uri(); ?>/images/pdf-icon.png"/>PDF</a>
                </div> 
            </div>
            <div id="mobile-nav" class="collapse navbar-collapse">
                <?php wp_nav_menu( array( 'menu' => 'mobile menu', 'menu_class' => 'nav navbar-nav' ) ); ?> 
            </div><!--/.nav-collapse -->   
        </div>
    </div>

    <div class="container">