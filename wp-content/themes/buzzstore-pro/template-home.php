<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buzzstore Pro
 */

get_header(); 

	/**
	 * Header Services Area
	*/ 
	$buzz_header_services_options  = get_theme_mod( 'buzzstorepro_services_area_settings', 'enable' );
	if($buzz_header_services_options  == 'enable'){
		do_action( 'buzzstorepro_header_services' );
	}

	/**
	 * Main Widget Area
	*/ 
	if( is_active_sidebar('buzzstorehomearea')){ 
		dynamic_sidebar( 'buzzstorehomearea' );  
	} 

	/**
	 * Footer Services Area
	*/ 
	$buzz_footer_services_options  = get_theme_mod( 'buzzstorepro_services_footer_area_settings', 'enable' );
	if($buzz_footer_services_options  == 'enable'){
		do_action( 'buzzstorepro_footer_services' );
	}

get_footer();