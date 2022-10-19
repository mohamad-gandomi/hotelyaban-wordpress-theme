<section class="mb-5">
	
	<!--title-->
	<h2 class="fs-5 mb-4">نظرات کاربران</h2>

<?php

//Get only the approved comments
$args = array(
    'status' => 'approve'
);

// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

// Comment Loop
if ( $comments ) { foreach ( $comments as $comment ) {

	$comment_meta = get_comment_meta($comment->comment_ID);
	$trip_type = $comment_meta['triptype'][0];
	$rates = [
		$comment_meta['wore_rate_facilities'][0],
		$comment_meta['wore_rate_price_value'][0],
		$comment_meta['wore_rate_rooms_quality'][0],
		$comment_meta['wore_rate_location'][0],
	];
	$score = array_sum($rates) / count($rates);
	$positive_points = unserialize($comment_meta['positive-points'][0]);
	$negative_points = unserialize($comment_meta['negative-points'][0]);
	
	?>
		<div class="card mb-4">

			<div class="card-header bg-white py-2">
				<div class="row align-items-center">
					<div class="col">
						<span><?php echo $comment->comment_author . ' '; ?></span>
						<span class="me-2">(<?php echo $trip_type; ?>)</span>
					</div>

					<div class="col text-start">
						<span class="bg-color-beta text-light py-1 px-3 rounded me-2"> <?php echo $score; ?> از ۱۰ </span>
					</div>
				</div>
			</div>

			<div class="card-body">
				<p class="card-text bg-color-zeta p-3 rounded"><?php echo $comment->comment_content; ?></p>
				
				<ul class="list-group list-group-flush p-0">

					<?php foreach ( $positive_points as $positive_point ): ?>
						<li class="list-group-item border-0">
							<i class="icon-thumbs-up text-light bg-color-omega p-2 rounded ms-2 fs-6"></i>
							<span><?php echo $positive_point; ?></span>
						</li>
					<?php endforeach; ?>

					<?php foreach ( $negative_points as $negative_point ): ?>
						<li class="list-group-item border-0">
							<i class="icon-thumbs-down text-light bg-danger p-1 rounded p-2 rounded ms-2"></i>
							<span><?php echo $negative_point; ?></span>
						</li>
					<?php endforeach; ?>


				</ul>

			</div>

		</div>
	<?php
}
} else {
	echo 'هیچ نظری پیدا نشد.';
}

?>

</section>