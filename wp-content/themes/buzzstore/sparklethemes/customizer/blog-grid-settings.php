<?php

$wp_customize->add_section( 'buzz_blog_view_mode', array(
	'capability' => 'edit_theme_options',
	'theme_supports' => '',
	'title' => __( 'Blog View Mode', 'buzzstore' ),
	'description' => __( 'Settings and Controls for Blog View Mode', 'buzzstore' ),
	'panel' => 'buzzstore_general_settings',
));

$wp_customize->add_setting( 'buzz_blog_view_mode', array(
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control( 'buzz_blog_view_mode', array(
	'type' => 'select',
	'section' => 'buzz_blog_view_mode',
	'label' => __( 'View Mode', 'buzzstore' ),
	'choices' => array(
		'list-view' => __( 'List View', 'buzzstore' ),
		'grid-view' => __( 'Grid View', 'buzzstore' ),
)));

?>