<?php

/**

 * Plugin Name: Smo Elementor Addon

 * Description: Simple widgets for Elementor.

 * Version:     1.0.0

 * Author:      Elementor Developer

 * Author URI:  https://developers.elementor.com/

 * Text Domain: elementor-addon

 */



function smo_register_widget( $widgets_manager ) {



	require_once( __DIR__ . '/widgets/smo_sliders.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_three_images.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_background_text.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_thumbnail.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_two_images.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_partners.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_testsieger.php' );

	require_once( __DIR__ . '/widgets/smo_sliders_news.php' );



	$widgets_manager->register( new \Elementor_Sliders() );

	$widgets_manager->register( new \Elementor_Sliders_Images() );

	$widgets_manager->register( new \Elementor_Sliders_Background() );

	$widgets_manager->register( new \Elementor_Sliders_Thumbnail() );
	
	$widgets_manager->register( new \Elementor_Sliders_Two() );
	
	$widgets_manager->register( new \Elementor_Sliders_Partners() );
	
	$widgets_manager->register( new \Elementor_Sliders_testsieger() );
	
	$widgets_manager->register( new \Elementor_Sliders_News() );



}

add_action( 'elementor/widgets/register', 'smo_register_widget' );

