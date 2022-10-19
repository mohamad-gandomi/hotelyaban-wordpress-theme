<?php get_header(); ?>
<?php $product = $hotel = wore_get_hotel(get_the_id()); ?>
<?php $city = $hotel->city(); ?>
<div class="container">
	<div class="row mb-5">

		 <!-- Main -->
		<main class="col-12 col-xl-9 shadow-sm bg-white py-5 px-3 px-xl-5">
			<?php require_once get_template_directory() . '/templates/hotel/slider.php'; ?>
			<?php require_once get_template_directory() . '/templates/hotel/description.php'; ?>
			<?php require_once get_template_directory() . '/templates/hotel/facilities.php'; ?>
			<?php require_once get_template_directory() . '/templates/hotel/rules.php'; ?>
			<?php require_once get_template_directory() . '/templates/hotel/distances_map.php'; ?>
			<?php require_once get_template_directory() . '/templates/hotel/rooms.php'; ?>
			<?php require_once get_template_directory() . '/templates/hotel/add_comment.php'; ?>
			<?php echo comments_template(); ?>
		</main>

		<!-- Aside -->
		<aside class="col-12 col-xl-3 ps-4 collapse d-xl-block" id="filterCollapse" >
			<?php require_once get_template_directory() . '/templates/hotel/product_aside.php'; ?>
		</aside>

	</div>
</div>
<?php get_footer(); ?>