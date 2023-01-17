<!-- Description -->
<?php if( $hotel->get_description() ): ?>
<?php $pos = strpos( $hotel->get_description(), ' ', 700 ); ?>
<section class="mb-5">

	<!-- Title -->
	<header>
	<h2 class="fs-4 mb-3">معرفی <?php echo $hotel->get_name(); ?> </h2>
	</header>

	<div class="text-justify hotel-description mb-3"><?php echo substr( $hotel->get_description(), 0, $pos ); ?></div>

	<div id="description" class="text-justify collapse mb-3"><?php echo substr( $hotel->get_description(), $pos ); ?></div>

	<button class="btn btn-primary bg-color-eta border-0 py-2 fs-6 d-flex justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#description" aria-expanded="false" aria-controls="description">
	<span class="text-black">نمایش همه</span>
	<i class="icon-arrow-down bg-color-theta p-1 rounded me-2"></i>
	<i class="icon-arrow-up bg-color-theta p-1 rounded me-2"></i>
	</button>

</section>
<?php endif; ?>
<hr class="mb-5">