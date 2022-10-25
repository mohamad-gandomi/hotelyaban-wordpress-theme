<?php

add_action( 'after_setup_theme', function(){

	require_once get_template_directory() . '/inc/helpers/class-wp-bootstrap-navwalker.php';
	
	load_theme_textdomain( 'hotelyaban', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support('woocommerce');

	register_nav_menus(
		array(
			'primary_menu' => esc_html__( 'Primary', 'hotelyaban' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true,
			'unlink-homepage-logo' => true,
		)
	);
});

/* Use namespaced data attribute for Bootstrap's dropdown toggles */
add_filter( 'nav_menu_link_attributes', function( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}, 20, 3 );

/* Register widget area (filter sidebar) */	
add_action( 'widgets_init', function() {

	/**List's Sidebars */

    register_sidebar( array(
        'name'          => __( 'Filter Sidebar', 'hotelyaban' ),
        'id'            => 'filterSidebar',
    ) );

	register_sidebar( array(
        'name'          => __( 'Wore Sort', 'hotelyaban' ),
        'id'            => 'woreSort',
    ) );

	/**Footer's Sidebars */

	register_sidebar( array(
		'name'          => 'Footer area one',
		'id'            => 'footer_area_one',
		'description'   => 'This widget area discription',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	));

	register_sidebar( array(
		'name'          => 'Footer area two',
		'id'            => 'footer_area_two',
		'description'   => 'This widget area discription',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	));
	
	register_sidebar( array(
		'name'          => 'Footer area three',
		'id'            => 'footer_area_three',
		'description'   => 'This widget area discription',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	));
	
	register_sidebar( array(
		'name'          => 'Footer area four',
		'id'            => 'footer_area_four',
		'description'   => 'This widget area discription',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	));

	register_sidebar( array(
		'name'          => 'Footer area five',
		'id'            => 'footer_area_five',
		'description'   => 'This widget area discription',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	));

});