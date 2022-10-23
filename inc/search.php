<?php

function hotelyaban_ajax_search() {

    check_ajax_referer( 'hy_ajax_search_nonce', 'security' );
    $response = array();

    $hotel_search_results = new WP_Query ([
        'post_type' => 'product',
        's' => $_POST['search_phrase']
    ]);

    $city_search_results = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'name__like' => $_POST['search_phrase']
    ]);

    foreach( $city_search_results as $city_search_result ) {
        $response[] = [
            'title' =>  $city_search_result->name,
            'link'  =>  get_term_link( $city_search_result ),
            'type'  => 'city',
        ];
    }

    while ( $hotel_search_results->have_posts() ) : $hotel_search_results->the_post();
        $response[] = [
            'title' => get_the_title(),
            'link'  => get_permalink(),
            'type'  => 'hotel',
        ];
    endwhile;

    wp_send_json($response);

}
add_action( 'wp_ajax_search_site',        'hotelyaban_ajax_search' );
add_action( 'wp_ajax_nopriv_search_site', 'hotelyaban_ajax_search' );