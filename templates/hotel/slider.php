<!-- Title -->
<header class="row">
	<h1 class="fs-4">
		<?php echo $hotel->get_name(); ?>
		<span class="text-color-beta">
			<?php echo has_term('uncategorized', 'product_cat') ? '' : $city->get_data('name') ;  ?>
		</span>
	</h1>
</header>

<!-- Address -->
<div class="row">

	<address class="col-md-6 d-flex align-items-center mb-0 mb-md-2">
	<i class="icon-location_on ms-1"></i>
	<span><?php echo $hotel->get_meta('address'); ?></span>
	</address>

	<div class="col-md-6 text-md-start">
	<span class="bottom-0 fs-4">

		<!-- Hotel Star Classification -->
		<?php 
			$hotel_categories = $hotel->get_hotel_categories();
			if ($hotel_categories) {
				foreach ( $hotel_categories as $hotel_category ) {
					$category_type = $hotel_category->get_data('type');
					if ( 'degree' == $category_type ) {
						$count = $hotel_category->get_data('degree');
						for ($x = 0; $x < $count; $x++) {
							echo '<i class="icon-star text-color-beta"></i>';
						}
					}
				}
			}
		?>

	</span>
	</div>

</div>

<!-- Slider -->
<?php if ( $hotel->get_gallery_image_ids() ): ?>
<section class="mb-5">

	<!--slider for-->
	<div class="slider-for mb-3">
		<?php 
			foreach ( $hotel->get_gallery_image_ids() as $gallery_image_id ) {

				$image_alt = get_post_meta( $gallery_image_id, '_wp_attachment_image_alt', TRUE );
				$image_url = wp_get_attachment_url($gallery_image_id);

				echo '<div><img class="img-fluid" src="'. $image_url .'" alt="'. $image_alt .'" data-fancybox="gallery" ></div>';
			}; 
		?>
	</div>

	<!--slider nav-->
	<div class="slider-nav">
		<?php 
			foreach ( $hotel->get_gallery_image_ids() as $gallery_image_id ) {

				$image_url = wp_get_attachment_url($gallery_image_id);

				echo '<div><div class="item" style="background-image: url('. $image_url .')"></div></div>';
			}; 
		?>
	</div>

</section>
<?php endif; ?>