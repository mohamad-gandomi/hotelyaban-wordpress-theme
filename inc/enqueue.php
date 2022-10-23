<?php

function wpdocs_theme_name_scripts() {

	wp_enqueue_style( 'style.css', get_template_directory_uri() . '/style.css', array());
	wp_enqueue_style( 'icomoon.css', get_template_directory_uri() . '/assets/fonts/icomoon/icomoon.css', array());

	wp_enqueue_script( 'search', get_template_directory_uri() . '/assets/js/search.js', array('jquery'), true );
	wp_localize_script( 'search', 'global',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'ajaxNonce' => wp_create_nonce( "hy_ajax_search_nonce" )
		)
	);

	if ( is_front_page() ) {
		wp_enqueue_style( 'index.css', get_template_directory_uri() . '/assets/css/index.css', array());
		wp_enqueue_script( 'index.js', get_template_directory_uri() . '/assets//js/index.js', array(), '1.0.0', true );
	}

	if ( is_page_template( 'about-us.php' ) ) {
		wp_enqueue_style( 'about-us.css', get_template_directory_uri() . '/assets/css/about-us.css', array());
		wp_enqueue_script( 'about-us.js', get_template_directory_uri() . '/assets/js/about-us.js', array(), '1.0.0', true );
	}

	if ( is_page_template( 'contact-us.php' ) ) {
		wp_enqueue_style( 'contact-us.css', get_template_directory_uri() . '/assets/css/contact-us.css', array());
		wp_enqueue_script( 'contact-us.js', get_template_directory_uri() . '/assets/js/contact-us.js', array(), '1.0.0', true );
	}

	if ( is_page_template( 'faq.php' ) ) {
		wp_enqueue_style( 'faq.css', get_template_directory_uri() . '/assets/css/faq.css', array());
		wp_enqueue_script( 'faq.js', get_template_directory_uri() . '/assets/js/faq.js', array(), '1.0.0', true );
	}

	if ( is_product() ) {
		wp_enqueue_style( 'single.css', get_template_directory_uri() . '/assets/css/single.css', array());
		wp_enqueue_script( 'single.js', get_template_directory_uri() . '/assets/js/single.js', array(), '1.0.0', true );

		$hotel = wore_get_hotel(get_the_id());
		$coordinate = $hotel->get_coordinate();

		if ( $coordinate ) {
			wp_localize_script( 'single.js', 'mapInfo', [
				'mapCoordinate' => [$coordinate['latitude'],$coordinate['longitude']],
				'iconUrl'  		=> get_template_directory_uri() . '/assets/img/marker-icon.png',
				'iconShadowUrl' => get_template_directory_uri() . '/assets/img/marker-shadow.png',
				'iconSize'		=> [24, 36],
				'shadowSize'	=> [41, 41],
				'iconAnchor'	=> [12, 36],
				'shadowAnchor'	=> [12, 41],
			]);
		}
	}

	if ( is_product_category() ) {
		wp_enqueue_style( 'list.css', get_template_directory_uri() . '/assets/css/list.css', array());
		wp_enqueue_script( 'list.js', get_template_directory_uri() . '/assets/js/list.js', array(), '1.0.0', true );
	}

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts');