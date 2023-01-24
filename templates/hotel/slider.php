
<header class="row">

	
<!-- Title -->
<div class="col-12 col-md-6">
	<h1 class="fs-4">
		<?php echo $hotel->get_name(); ?>
	</h1>
</div>

<!-- Operator Info Button -->
<?php if( current_user_can('manage_options') ): ?>
<div class="col-12 col-md-6 text-md-start">
	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#operatorInfo" aria-expanded="true" aria-controls="operatorInfo">
		<span>اطلاعات اپراتور</span>
	</button>
</div>
<?php endif; ?>

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

<!-- Operator Info -->
<?php if( current_user_can('manage_options') ): ?>
<div id="operatorInfo" class="row collapse">
<div class="col-12 my-5">

<?php if($hotel->get_operator_notes()['list_phone']): ?>
<section class="mb-5">
	<h5>لیست شماره تماس ها</h5>
	<table class="table table-hover">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">نام متصدی</th>
			<th scope="col">شماره تماس</th>
			<th scope="col">تماس</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for ($x = 0; $x < count($hotel->get_operator_notes()['list_phone']['keys']); $x++) {

					$row_number = $x + 1;

					echo '<tr>';
						echo '<th>' . $row_number . '</th>';
						echo '<td>' . $hotel->get_operator_notes()['list_phone']['keys'][$x] . '</td>';
						echo '<td>' . $hotel->get_operator_notes()['list_phone']['values'][$x] . '</td>';
						echo '<td> <a href="tel:'.$hotel->get_operator_notes()['list_phone']['values'][$x].'" class="btn btn-primary"><i class="icon-telephone"></i></a> </td>';
					echo '</tr>';
				} 
			?>
		</tbody>
	</table>
</section>
<?php endif; ?>

<?php if($hotel->get_operator_notes()['list_text']): ?>
<section class="mb-5">
	<h5>لیست متنی</h5>
	<table class="table table-hover">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">عنوان</th>
			<th scope="col">متن</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for ($x = 0; $x < count($hotel->get_operator_notes()['list_text']['keys']); $x++) {

					$row_number = $x + 1;

					echo '<tr>';
						echo '<th>' . $row_number . '</th>';
						echo '<td>' . $hotel->get_operator_notes()['list_text']['keys'][$x] . '</td>';
						echo '<td>' . $hotel->get_operator_notes()['list_text']['values'][$x] . '</td>';
					echo '</tr>';
				} 
			?>
		</tbody>
	</table>
</section>
<?php endif; ?>

<?php if($hotel->get_operator_notes()['list_file']): ?>
<section class="mb-5">
	<h5>لیست فایلی</h5>
			<table class="table table-hover">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">عنوان</th>
			<th scope="col">فایل</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for ($x = 0; $x < count($hotel->get_operator_notes()['list_file']['keys']); $x++) {

					$row_number = $x + 1;

					echo '<tr>';
						echo '<th>' . $row_number . '</th>';
						echo '<td>' . $hotel->get_operator_notes()['list_file']['keys'][$x] . '</td>';
						echo '<td><a href="'.$hotel->get_operator_notes()['list_file']['values'][$x]['url'].'" class="btn btn-primary" download>دانلود فایل</a></td>';
					echo '</tr>';
				} 
			?>
		</tbody>
	</table>
</section>
<?php endif; ?>


</div>
</div>
<?php endif; ?>

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
