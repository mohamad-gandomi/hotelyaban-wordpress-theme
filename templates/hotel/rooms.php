<!-- Rooms -->
<section class="mb-5">

	<h2 class="fs-5 mb-4">اتاق‌های <?php echo $hotel->get_name(); ?> </h2>

	<div class="row">
		<?php 
			if( $hotel->rooms()->get() ) {
				foreach ( $hotel->rooms()->get() as $room ) { 


					$regular_price = $room->get_regular_price();
					$sale_price = $room->get_sale_price();
					$discount_percent = 100 - (($sale_price/$regular_price) * 100);
					$meals = $room->get_meals();
					$attributes = $room->get_attributes();

					$en_number = new NumberFormatter("en", NumberFormatter::SPELLOUT);
					$fa_number = new NumberFormatter("fa", NumberFormatter::SPELLOUT);
					
					
					// echo '<pre style="direction:ltr;text-align:left">';
					// 	print_r( $attributes );
					// echo '</pre>';

					

					?>
					<div class="col-md-6 col-lg-4 d-flex justify-content-center mb-3">
					
						<div class="card">

							<figure class="position-relative mb-0">
								
								<?php if ( $sale_price ): ?>
								<span class="position-absolute bg-danger text-light py-1 px-2 mt-2 me-2 rounded" role="button" data-bs-toggle="tooltip" data-bs-placement="right" title="<?php echo round($discount_percent); ?>٪ تخفیف">
									<small><?php echo round($discount_percent); ?>٪</small> 
								</span>
								<?php endif; ?>
								
								<span class="position-absolute text-dark mb-2 ms-2 rounded bottom-0 start-0" role="button">
									<i class="icon-Breakfast-<?php echo in_array('breakfast',$meals) ? 'allow' : 'not-allow' ; ?> bg-white p-2 fs-4 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="صبحانه <?php echo in_array('breakfast',$meals) ? 'دارد' : 'ندارد' ; ?>"></i>
									<i class="icon-Lunch-<?php echo ( in_array( 'lunch', $meals) && in_array( 'dinner', $meals) ) ? 'Available' : 'Not-available' ; ?> bg-white p-2 fs-4 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="نهار و شام <?php echo ( in_array( 'lunch', $meals) && in_array( 'dinner', $meals) ) ? 'دارد' : 'ندارد' ; ?>"></i>
									<i class="icon-<?php echo $en_number->format($attributes['capacity']) == 'zero' ? 'one' : $en_number->format($attributes['capacity']) ; ?>_person_capacity bg-white p-2 fs-4 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="ظرفیت <?php echo $fa_number->format( $attributes['capacity'] ); ?> نفر"></i>
								</span>
								
								<img role="button" data-fancybox src="<?php echo wp_get_attachment_url($room->get_meta('featured_image_id')); ?>" class="card-img-top" alt="...">


							</figure>

							<div class="card-body position-relative" style="min-height: 275px;">
								<h5 class="card-title"><?php echo $room->get_room_name(); ?></h5>

								<?php if( !$sale_price ): ?>
									<p class="card-text mb-0 text-color-omega fw-bold">قیمت هر شب: <?php echo number_format($regular_price) .' '. get_woocommerce_currency_symbol(); ?></p>
								<?php else: ?>
									<p class="card-text mb-0 text-decoration-line-through text-danger fw-bold">قیمت هر شب: <?php echo number_format($regular_price) .' '. get_woocommerce_currency_symbol(); ; ?></p>
									<p class="card-text mb-0 fw-bold text-color-omega">قیمت با تخفیف: <?php echo number_format($sale_price) .' '. get_woocommerce_currency_symbol(); ; ?></p>
								<?php endif; ?>
								
								<p class="card-text mb-0">ظرفیت: <span class="fw-bold text-color-omega"><?php echo $fa_number->format( $attributes['capacity'] ); ?> نفر</span></p>
								<p class="card-text mb-0">صبحانه: <?php echo in_array('breakfast',$meals) ? '<span class="fw-bold text-color-omega">دارد</span>' : '<span class="fw-bold text-danger">ندارد</span>' ; ?> </p>
								<p class="card-text mb-0">نهار و شام: <?php echo ( in_array( 'lunch', $meals) && in_array( 'dinner', $meals) ) ? '<span class="fw-bold text-color-omega">دارد</span>' : '<span class="fw-bold text-danger">ندارد</span>' ; ?></p>
								<p class="card-text">قابلیت نفر اضافه: <?php echo $attributes['extra'] ? '<span class="fw-bold text-color-omega">' . $fa_number->format( $attributes['extra'] ) . ' نفر</span>'  : '<span class="fw-bold text-danger">ندارد</span>' ?></p>
								

								<a href="tel:05131793" class="btn btn-color-omega shadow-sm text-light fs-6 position-absolute bottom-0 mb-3">
									<span class="mt-1">رزرو تلفنی</span> 
									<i class="icon-telephone me-2"></i>
								</a>


							</div>

						</div>
					</div>
					<?php
				}
			} 
		?>
	</div>

</section>

<hr class="mb-5">