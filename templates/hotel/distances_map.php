<!-- Distances & Map -->
<section class="mb-5">

	<div class="row mx-1">

		<!-- Distances -->
		<div class="col-12 col-xl-6 mb-5 mb-xl-0">

			<!--title-->
			<h2 class="fs-5 mb-4">فاصله‌ها</h2>

			<?php 
				if( $hotel->hotel_distances()->get() ) {
					foreach ( $hotel->hotel_distances()->get() as $distance ) { ?>
						<div class="row bg-color-zeta py-3 border-0 border-start border-color-omega border-5 mb-3">
							<div class="col-auto">
								<span><?php echo $distance->get_data('title'); ?></span>
							</div>
							<div class="col p-0"><hr class="border-top-1"></div>
							<div class="col-auto d-flex align-items-center">
								<span>
									<?php echo $distance->get_data('distance'); ?> دقیقه 
								</span>
								<?php
									foreach ( $distance->get_data('type') as $key => $title ){
										$map = [
											'car'     => 'icon-car',
											'walking' => 'icon-walk'
										];
										$icon = $map[$key];
										echo '<i class="'. $icon .' fs-4 text-color-omega me-1"></i>';
									}
								?>
							</div>
						</div>
					<?php }
				};
			?>
			

			
		</div>

		<!-- Map -->
		<div class="col-12 col-xl-6 overflow-hidden">

			<!--title-->
			<h2 class="fs-5 mb-4">مکان هتل <span class="text-color-omega"><?php echo $hotel->get_name(); ?> بر روی نقشه</span></h2>

			<div id="map" class="map-embed z-depth-1-half map-container h-100" style="min-height:400px"></div>

		</div>

	</div>
	
</section>

<hr class="mb-5">