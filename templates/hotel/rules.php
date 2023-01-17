<!-- Rules -->
<section class="mb-5">

	<!-- Title -->
	<header>
	<h2 class="fs-4 mb-3">قوانین <?php echo $hotel->get_name(); ?> </h2>
	</header>

	<div class="row mb-4">
	<div class="col-3"><strong>زمان ورود</strong></div>
	<div class="col-9">عصر ۱۴:۰۰</div>
	</div>

	<div class="row mb-4">
	<div class="col-3"><strong>زمان خروج</strong></div>
	<div class="col-9">ظهر ۱۲:۰۰</div>
	</div>

	<div class="row mb-4">
	<div class="col-3"><strong>سیاست هتل</strong></div>

	<div class="col-9">

		<?php 
		for( $i = 0; $i < count( $hotel->get_rules() ); $i++ ) { 
			if( $i == 0 ) { 
				$rule = explode( ':' , $hotel->get_rules()[$i]->get_data('title') );
				echo '<div class="border-bottom mb-3">';
				echo '<h4 class="fs-6">'. $rule[0] .'</h4>';
				echo '<p>'. $rule[1] .'</p>';
				echo '</div>';
			} 
		}	
		?>

		<div class="collapse" id="rules">
			<?php 
			for( $i = 0; $i < count( $hotel->get_rules() ); $i++ ) { 
				if( $i > 0 ) { 
					$rule = explode( ':' , $hotel->get_rules()[$i]->get_data('title') );
					echo '<div class="border-bottom mb-3">';
					echo '<h4 class="fs-6">'. $rule[0] .'</h4>';
					echo '<p>'. $rule[1] .'</p>';
					echo '</div>';
				} 
			}	
			?>
		</div>

	</div>

	</div>
	
	<button class="btn btn-primary bg-color-eta border-0 py-2 fs-6 d-flex justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#rules" aria-expanded="false" aria-controls="rules">
	<span class="text-black">نمایش همه</span>
	<i class="icon-arrow-down bg-color-theta p-1 rounded me-2"></i>
	<i class="icon-arrow-up bg-color-theta p-1 rounded me-2"></i>
	</button>

</section>

<hr class="mb-5">