<?php
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 8,
		'orderby'        => 'rand',
	);
	$recommended_hotels = new WP_Query( $args );
?>
  
  <!-- RANDOM/CHOSEN HOTELS
  ================================================== -->
  <section class="py-4 py-md-5">
    <div class="container">
      <div class="row">

        <!-- Title -->
        <div class="col mb-4 text-center text-md-end">
          <h2>پرفروش ترین <span class="text-color-beta">هتل‌ها</span></h2>
        </div>

        <!-- Carousel Navigation Buttons -->
        <div class="col-auto d-none d-md-block">
          <a href="#" class="btn btn-outline-secondary shadow-sm next_caro">
            <i class="icon-chevron-right fs-4 d-block py-1"></i>
          </a>
          <a href="#" class="btn btn-outline-secondary shadow-sm previous_caro me-2">
            <i class="icon-chevron-left fs-4 d-block py-1"></i>
          </a>
        </div>

        <!-- Carousel -->
        <div class="col-12 slider">

			<?php 
				if ( $recommended_hotels->have_posts() ) {
					while ( $recommended_hotels->have_posts() ) : $recommended_hotels->the_post();
						$hotel = wore_get_hotel(get_the_id());
						$hotel_categories = $hotel->get_hotel_categories();
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
									<img src="<?php echo wp_get_attachment_url($hotel->get_image_id()); ?>" class="card-img-top" alt="<?php echo get_post_meta($hotel->get_image_id(), '_wp_attachment_image_alt', TRUE); ?>">
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri()  ?>/assets/img/hotel_picture.jpg" class="card-img-top" alt="تصویر هتل">
								<?php endif; ?>

								<!-- Hotel Star Classification -->
								<?php 
								if ($hotel_categories) {
									echo '<span class="position-absolute bottom-0 me-2 lead fs-4">';
										foreach ( $hotel_categories as $hotel_category ) {
											$category_type = $hotel_category->get_data('type');
											if ( 'degree' == $category_type ) {
												$count = $hotel_category->get_data('degree');
												for ($x = 0; $x < $count; $x++) {
													echo '<i class="icon-star text-color-beta"></i>';
												}
											}
										}
									echo '<span>';
								}
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
								<p class="card-text mb-0 text-truncate"><i class="icon-location_on ms-1"></i><small><?php echo $hotel->get_meta('address') ? $hotel->get_meta('address') : '' ; ?></small></p>

								<!-- Hotel Price -->
								<?php if($hotel->get_meta('price_start')): ?>
								<p class="card-text text-color-beta">
									<i class="icon-bolt ms-1"></i>
									<small> شروع قیمت از <?php echo number_format($hotel->get_meta('price_start')); ?> تومان / شب</small>
								</p>
								<?php else: ?>
								<p class="card-text text-color-beta">
									<i class="icon-bolt ms-1"></i>
									<small> شروع قیمت از - تومان / شب</small>
								</p>
								<?php endif; ?>

							</div>

							</div>
						</div>
						<?php
					endwhile;
				} else {
					echo __( 'No products found', 'hotelyaban' );
				}
				wp_reset_postdata();
			?>

        </div>
      </div> 
    </div>
  </section>