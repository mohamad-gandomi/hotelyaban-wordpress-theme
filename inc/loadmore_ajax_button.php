<?php


function load_more_callback() {

	ini_set('display_errors',true);
	error_reporting(E_ALL);
    $term_id = $_POST['term_id'];
    $page_number = $_POST['page_number'] + 1;
	$args = array(
		'post_type'	=>	'product',
		'posts_per_page' => 6,
		'paged' => $page_number,
		'tax_query'  => array(
			array(
				'taxonomy'      => 'product_cat',
				'field' 		=> 	'term_id',
				'terms'         => 	$term_id,
				'operator'      => 'IN'
			)
    	)
	);

	$query = new WP_Query( $args );
	apply_filters('weqf_query_filter_request',$query);
	//$query = weqf_query_filter_request($query);

	while ( $query->have_posts() ) {
		$query->the_post();
		$hotel = wore_get_hotel(get_the_id());
		?>
        <!-- Card -->
        <div class="p-3">
            <div class="card shadow-sm">

                <!-- Card Header -->
                <div class="position-relative card__header">

                    <!-- Discount Badge -->
                    <?php if($hotel->get_meta('discount_percent')): ?>
                    <span class="position-absolute bg-danger text-light py-1 px-2 mt-2 me-2 rounded">
                    <small><?php echo $hotel->get_meta('discount_percent'); ?>٪ تخفیف</small>
                    </span>
                    <?php endif; ?>

                    <!-- Hotel Picture -->
                    <?php if($hotel->get_image_id()): ?>
                        <img src="<?php echo wp_get_attachment_url($hotel->get_image_id()); ?>" class="card-img-top" alt="">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri()  ?>/assets/img/hotel_picture.jpg" class="card-img-top" alt="">
                    <?php endif; ?>

					<?php
					$hotel_category_degrees = wore_get_hotel_degree_categories($hotel);
					if(!empty($hotel_category_degrees)): 
						foreach($hotel_category_degrees as $hotel_category_degree):
						?>  
						<span class="hotel-category-degree position-absolute bottom-0 end-0 me-2 lead fs-4">
							<?php
								$count = (int)$hotel_category_degree['degree'];
								for ($x = 0; $x < $count; $x++) {
									echo '<i class="icon-star text-color-beta"></i>';
								}   
							?>  
						</span>
						<?php
						endforeach;
					endif; 
					?>  
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-center card__button">
                    <a href="<?php echo  get_the_permalink($hotel->get_id()); ?>" class="btn btn-color-beta text-light">مشاهده</a>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">

                    <!-- Hotel Title -->
                    <h5 class="card-title"><?php echo $hotel->get_name() ? $hotel->get_name() : ''; ?></h5>

                    <!-- Hotel Address -->
                    <p class="card-text mb-0 text-truncate" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;" ><i class="icon-location_on ms-1"></i><small><?php echo $hotel->get_meta('address') ? $hotel->get_meta('address') : '' ; ?></small></p>

                    <!-- Hotel Price -->
                    <?php if($hotel->get_meta('price_start')): ?>
                    <p class="card-text text-color-beta">
                        <i class="icon-bolt ms-1"></i>
                        <small> شروع قیمت از <?php echo number_format($hotel->get_meta('price_start')); ?> تومان / شب</small>
                    </p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
        <?php
	}
 	wp_reset_postdata();
	wp_die();
}
add_action( 'wp_ajax_load_more',        'load_more_callback' );
add_action( 'wp_ajax_nopriv_load_more', 'load_more_callback' );


/**
 * Limit displayed products on Woocommerce product category archives
 */
function product_pagination_by_category() {
	if( is_product_category() ){
		$per_page = get_option('posts_per_page');
		return $per_page;
	} 
}
add_filter( 'loop_shop_per_page', 'product_pagination_by_category');
