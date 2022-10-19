<?php

add_filter( 'comment_form_field_comment', 'comment_field' );
function comment_field($field) {
	$field = '<p class="comment-form-comment">'.
		'<label for="comment">دیدگاه <span class="required" aria-hidden="true">*</span></label>'
		.'<textarea id="comment" class="form-control" name="comment" cols="45" rows="3" required></textarea></p>';
	return $field;
}

add_filter('comment_form_default_fields','custom_fields');
function custom_fields($fields) {

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields[ 'email' ] = '<p class="comment-form-email col-12 col-md-4">'.
			'<label for="email" class="form-label">' . __( 'Email' ) . '</label>'.
			( $req ? '<span class="required">*</span>' : '' ).
			'<input id="email" class="form-control" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) . 
			'" size="30"  tabindex="2"' . $aria_req . ' /></p>';

		$fields[ 'author' ] = '<p class="comment-form-author col-12 col-md-4">'.
			'<label for="author" class="form-label">نام و نام خانوادگی</label>'.
			( $req ? '<span class="required">*</span>' : '' ).
			'<input id="author" class="form-control" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) . 
			'" size="30" tabindex="1"' . $aria_req . ' /></p>';
		
					
		unset( $fields['url'] );
		unset( $fields['phone'] );
		unset( $fields['cookies'] );

	return $fields;
}

// Add fields after default fields above the comment box, always visible

add_action( 'comment_form_logged_in_after', 'additional_fields' );
add_action( 'comment_form_after_fields', 'additional_fields' );
function additional_fields () {
	
	echo '<p class="comment-form-triptype col-12 col-md-4">'.
	'<label for="triptype" class="form-label">نوع سفر</label><span class="required">*</span>'.
	'<select id="triptype" name="triptype" class="form-select" aria-label="ُTrip Type">
		<option selected></option>
		<option value="'.__( 'Family Trip' ).'">'.__( 'Family Trip' ).'</option>
		<option value="'.__( 'Business Trip' ).'">'.__( 'Business Trip' ).'</option>
		<option value="'.__( 'Friendly Trip' ).'">'.__( 'Friendly Trip' ).'</option>
	</select>';

	echo '<div class="row p-0 m-0">';

		echo '<p class="comment-form-positive-points col-12 col-md-6">'.
		'<label for="positive-points" class="form-label text-color-omega fw-bold">+ نکات مثبت هتل</label>'.
		'<textarea class="form-control" id="positive-points" rows="3" name="positive-points"></textarea>';

		echo '<p class="comment-form-negative-points col-12 col-md-6">'.
		'<label for="negative-points" class="form-label text-danger fw-bold">- نکات منفی هتل</label>'.
		'<textarea class="form-control" id="negative-points" rows="3" name="negative-points"></textarea>';

	echo '</div>';

	echo '	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-5">

		<div class="mb-4 col">
			<label for="wore_rate_facilities" class="form-label fw-bold d-flex justify-content-between">
				<span class="small">امکانات هتل</span>
				<span class="text-range-slider"></span>
			</label>
			<input type="hidden" name="wore_rate_facilities" id="wore_rate_facilities" class="input-range-slider" readonly>
			<div class="item-range-slider"></div>
		</div>

		<div class="mb-4 col">
		<label for="wore_rate_price_value" class="form-label fw-bold d-flex justify-content-between">
			<span class="small">ارزش نسبت به قیمت</span>
			<span class="text-range-slider"></span>
		</label>
		<input type="hidden" name="wore_rate_price_value" id="wore_rate_price_value" class="input-range-slider" readonly>
		<div class="item-range-slider"></div>
		</div>

		<div class="mb-4 col">
		<label for="wore_rate_rooms_quality" class="form-label fw-bold d-flex justify-content-between">
			<span class="small">کیفیت اتاق‌ها</span>
			<span class="text-range-slider"></span>
		</label>
		<input type="hidden" name="wore_rate_rooms_quality" id="wore_rate_rooms_quality" class="input-range-slider" readonly>
		<div class="item-range-slider"></div>
		</div>

		<div class="mb-4 col">
		<label for="wore_rate_location" class="form-label fw-bold d-flex justify-content-between">
			<span class="small">موقعیت مکانی</span>
			<span class="text-range-slider"></span>
		</label>
		<input type="hidden" name="wore_rate_location" id="wore_rate_location" class="input-range-slider" readonly>
		<div class="item-range-slider"></div>
		</div>

	</div>';
	
}

// Save the comment meta data along with comment

add_action( 'comment_post', 'save_comment_meta_data' );
function save_comment_meta_data( $comment_id ) {

	if ( ( isset( $_POST['triptype'] ) ) && ( $_POST['triptype'] != '') ) {
		$trip_type = wp_filter_nohtml_kses($_POST['triptype']);
		add_comment_meta( $comment_id, 'triptype', $trip_type );
	}

	if ( ( isset( $_POST['positive-points'] ) ) && ( $_POST['positive-points'] != '') ) {
		$positive_points = explode(PHP_EOL, $_POST['positive-points']);
		add_comment_meta( $comment_id, 'positive-points', $positive_points );
	}

	if ( ( isset( $_POST['negative-points'] ) ) && ( $_POST['negative-points'] != '') ) {
		$negative_points = explode(PHP_EOL, $_POST['negative-points']);
		add_comment_meta( $comment_id, 'negative-points', $negative_points );
	}

	if ( ( isset( $_POST['wore_rate_facilities'] ) ) && ( $_POST['wore_rate_facilities'] != '') ) {
		$wore_rate_facilities = $_POST['wore_rate_facilities'];
		add_comment_meta( $comment_id, 'wore_rate_facilities', $wore_rate_facilities );
	}

	if ( ( isset( $_POST['wore_rate_price_value'] ) ) && ( $_POST['wore_rate_price_value'] != '') ) {
		$wore_rate_price_value = $_POST['wore_rate_price_value'];
		add_comment_meta( $comment_id, 'wore_rate_price_value', $wore_rate_price_value );
	}

	if ( ( isset( $_POST['wore_rate_rooms_quality'] ) ) && ( $_POST['wore_rate_rooms_quality'] != '') ) {
		$wore_rate_rooms_quality = $_POST['wore_rate_rooms_quality'];
		add_comment_meta( $comment_id, 'wore_rate_rooms_quality', $wore_rate_rooms_quality );
	}

	if ( ( isset( $_POST['wore_rate_location'] ) ) && ( $_POST['wore_rate_location'] != '') ) {
		$wore_rate_location = $_POST['wore_rate_location'];
		add_comment_meta( $comment_id, 'wore_rate_location', $wore_rate_location );
	}
}

// Add the filter to check if the comment meta data has been filled or not

add_filter( 'preprocess_comment', 'verify_comment_meta_data' );
function verify_comment_meta_data( $commentdata ) {
	if ( ! isset( $_POST['triptype'] ) ||  ( $_POST['triptype'] == '') )
	wp_die( __( 'خطا: لطفا نوع سفر را مشخص کنید.' ), 'خطلا', array( 'back_link'=>true ) );
	return $commentdata;
}

