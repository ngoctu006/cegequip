<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="description" content="">
        <meta name="robots" content="index, follow">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/libs.css">
	<?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/responsive.css">
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css"><![endif]-->
</head>

<body <?php body_class(); ?>>
    <div class="container">
      <header class="header">
        <div class="top">
            <?php if ( get_header_image() ) : ?>
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            <?php endif; ?>
          <p class="text-header"><?php echo  bloginfo('description'); ?></p>
          <?php get_search_form(); ?>
        </div>
        <nav class="main-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'primary','menu' => 'main','container' => FALSE, 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
          <button aria-expanded="false" aria-controls="secondary" class="menu-button visible-xs"><i class="fa fa-bars"></i></button>
        </nav>
      </header>

	<main>
