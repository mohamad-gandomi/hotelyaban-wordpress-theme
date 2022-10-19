<!--main-->
<main class="col-12 col-xl-9 shadow-sm">

	<!--Sort-->
	<section class="row border-bottom m-4 collapse d-xl-flex" id="sortingCollapse" >

		<div class="col-12 col-xl-6">
			<p>مرتب سازی براساس: </p>
		</div>

		<?php dynamic_sidebar('Wore Sort'); ?>

		<div class="col-12 col-xl-6 text-xl-start">
			<ul class="list-unstyled">
			<li class="mb-2 d-xl-inline me-2"><a href="#" class="text-reset text-decoration-none">جدیدترین</a></li>
			<li class="mb-2 d-xl-inline me-2"><a href="#" class="text-reset text-decoration-none">کم به زیاد</a></li>
			<li class="mb-2 d-xl-inline me-2"><a href="#" class="text-reset text-decoration-none">زیاد به کم</a></li>
			<li class="mb-2 d-xl-inline me-2"><a href="#" class="text-reset text-decoration-none">پربازدید ترین</a></li>
			</ul>             
		</div>

	</section>

	<!--List-->
	<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 justify-content-center p-4">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php $hotel = wore_get_hotel(get_the_id()); ?>
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

						<!-- Hotel Star Classification -->
						<?php if($hotel->get_hotel_category_stars()): ?>
						<span class="position-absolute bottom-0 end-0 me-2 lead fs-4">
							<?php
								$count = (int)$hotel->get_hotel_category_stars()[0]->description;
								for ($x = 0; $x < $count; $x++) {
									echo '<i class="icon-star text-color-beta"></i>';
								}
							?>
						</span>
						<?php endif; ?>

					</div>

					<!-- Button -->
					<div class="d-flex justify-content-center card__button">
						<a href="<?php echo get_home_url() . '/product/' . $hotel->get_slug(); ?>" class="btn btn-color-beta text-light">مشاهده</a>
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
						<?php endif; ?>

					</div>

					</div>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.', 'hotelyaban' ); ?>
		<?php endif; ?>
	</div>
</main>