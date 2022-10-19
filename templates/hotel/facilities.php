<!-- Facilities -->
<section class="mb-5">

	<!--title-->
	<header>
		<h2 class="fs-4 mb-4">

			امکانات <?php echo $hotel->get_name(); ?> 

			<span class="text-color-beta">
				<?php echo has_term('uncategorized', 'product_cat') ? '' : $city->get_data('name') ;  ?>
			</span>

		</h2>
	</header>

	<div class="row row-cols-3 row-cols-md-5 row-cols-lg-6">
		<?php for( $i = 0; $i < count($hotel->get_facilities()) ; $i++ ) { ?>
			<?php if ( $i < 12 ): ?>
				<div class="mb-4 d-flex align-items-center">
					<img src="<?php echo wp_get_attachment_url( $hotel->get_facilities()[$i]->get_data('icon')) ?>" class="img-fluid">
					<span class="me-2"><?php echo $hotel->get_facilities()[$i]->get_data('title'); ?></span>
				</div>
			<?php endif; ?>
		<?php } ?>
	</div>

	<div class="collapse row row-cols-3 row-cols-md-5 row-cols-lg-6" id="facilities">
		<?php for( $i = 0; $i < count($hotel->get_facilities()) ; $i++ ) { ?>
			<?php if ( $i > 11 ): ?>
				<div class="mb-4 d-flex align-items-center">
					<img src="<?php echo wp_get_attachment_url( $hotel->get_facilities()[$i]->get_data('icon')) ?>" class="img-fluid">
					<span class="me-2"><?php echo $hotel->get_facilities()[$i]->get_data('title'); ?></span>
				</div>
			<?php endif; ?>
		<?php } ?>
	</div>

	<button class="btn btn-primary bg-color-eta border-0 py-2 fs-6 d-flex justify-content-center show-more" type="button" data-bs-toggle="collapse" data-bs-target="#facilities" aria-expanded="false" aria-controls="facilities">
	<span class="text-black">نمایش همه</span>
	<i class="icon-arrow-down bg-color-theta p-1 rounded me-2"></i>
	<i class="icon-arrow-up bg-color-theta p-1 rounded me-2"></i>
	</button>

</section>

<hr class="mb-5">