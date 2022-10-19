<!--Filters-->
<aside class="col-12 col-xl-3 ps-4 collapse d-xl-block" id="filterCollapse" >

	<?php dynamic_sidebar('Filter Sidebar'); ?>

	<!--Price Filter-->
	<section class="card mb-4 border-0">
		<div class="card-body shadow-sm p-4">

			<p class="border-bottom pb-3 mb-4">فیلتر قیمت</p>
			<div class="range-slider" data-min="200000" data-max="5000000"></div>
			
			<div class="row text-center pt-4">

			<div class="col-6">
				<div class="mb-2" >تا شبی</div>
				<input type="text" readonly class="mb-2 w-100 border-0 text-center range-to" name="price-range-to">
				<div class="mb-2" >تومان</div>
			</div>

			<div class="col-6 border-end">
				<div class="mb-2" >از شبی</div>
				<input type="text" readonly class="mb-2 w-100 border-0 text-center range-from" name="price-range-from">
				<div class="mb-2" >تومان</div>
			</div>

			</div>

		</div>
	</section>

	<!--Distance Filter-->
	<section class="card mb-4 border-0">
	<div class="card-body shadow-sm p-4">

		<p class="border-bottom pb-3 mb-4">فاصله تا <span>حرم مطهر</span></p>
		<div class="range-slider" data-min="5" data-max="20"></div>
		
		<div class="row text-center pt-4">

		<div class="col-6">
			<div class="mb-2" >تا</div>
			<input type="text" readonly class="mb-2 w-100 border-0 text-center range-to">
			<div class="mb-2" >دقیقه</div>
		</div>

		<div class="col-6 border-end">
			<div class="mb-2" >از</div>
			<input type="text" readonly class="mb-2 w-100 border-0 text-center range-from">
			<div class="mb-2" >دقیقه</div>
		</div>
		
		</div>

	</div>

	</section>

	<!--Star Filter-->
	<section class="card mb-4 border-0">
	<div class="card-body shadow-sm p-4">

		<p class="border-bottom pb-3 mb-4">درجه هتل</p>

		<ul class="list-unstyled">
		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck7">
			<label class="form-check-label" for="defaultCheck7">
			هتل‌های پنج ستاره
			</label>
		</li>
		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck8">
			<label class="form-check-label" for="defaultCheck8">
			هتل‌های چهار ستاره
			</label>
		</li>
		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck9">
			<label class="form-check-label" for="defaultCheck9">
			هتل‌های سه ستاره
			</label>
		</li>
		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck10">
			<label class="form-check-label" for="defaultCheck10">
			هتل‌های دو ستاره
			</label>
		</li>
		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck11">
			<label class="form-check-label" for="defaultCheck11">
			هتل‌های یک ستاره
			</label>
		</li>
		<li class="text-muted d-flex align-items-center fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck12">
			<label class="form-check-label" for="defaultCheck12">
			هتل آپارتمان
			</label>
		</li>
		</ul>

	</div>
	</section>

	<!--Facility Filter-->
	<section class="card mb-4 border-0">
	<div class="card-body shadow-sm p-4">

		<p class="border-bottom pb-3 mb-4">امکانات</p>

		<div class="input-group mb-3 flex-row-reverse">
		<button class="btn btn-color-omega text-light d-flex align-items-center" type="button" id="button-addon2"><i class="icon-search"></i></button>
		<input type="text" class="form-control filter" placeholder="جستجو کنید" aria-label="Recipient's username" aria-describedby="button-addon2">
		</div>

		<div class="row ms-1">
		<div class="col-12 facilities-list" style="height: 200px; overflow-y: scroll;" >

			<ul class="list-unstyled">

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck15">
				<label class="form-check-label" for="defaultCheck15">
				آسانسور
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck16">
				<label class="form-check-label" for="defaultCheck16">
				اتاق بازی
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck17">
				<label class="form-check-label" for="defaultCheck17">
				آبگرم و سنا
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck18">
				<label class="form-check-label" for="defaultCheck18">
				استخر
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck19">
				<label class="form-check-label" for="defaultCheck19">
				خدمات باربری
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck20">
				<label class="form-check-label" for="defaultCheck20">
				آسانسور
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck21">
				<label class="form-check-label" for="defaultCheck21">
				اتاق بازی
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck22">
				<label class="form-check-label" for="defaultCheck22">
				آبگرم و سنا
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck23">
				<label class="form-check-label" for="defaultCheck23">
				استخر
				</label>
			</li>

			<li class="text-muted d-flex align-items-center mb-2 fs-7">
				<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck24">
				<label class="form-check-label" for="defaultCheck24">
				خدمات باربری
				</label>
			</li>

			</ul>

		</div>
		</div>

	</div>

	</section>

	<!--Bed Filter-->
	<section class="card mb-4 border-0">
	<div class="card-body shadow-sm p-4">

		<p class="border-bottom pb-3 mb-4">تعداد تخت</p>

		<ul class="list-unstyled">

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck1">
			<label class="form-check-label" for="defaultCheck1">
			۱ تخته
			</label>
		</li>

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck2">
			<label class="form-check-label" for="defaultCheck2">
			۲ تخته
			</label>
		</li>

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck3">
			<label class="form-check-label" for="defaultCheck3">
			۳ تخته
			</label>
		</li>

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck4">
			<label class="form-check-label" for="defaultCheck4">
			۴ تخته
			</label>
		</li>

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck5">
			<label class="form-check-label" for="defaultCheck5">
			۵ تخته
			</label>
		</li>

		<li class="text-muted d-flex align-items-center fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck6">
			<label class="form-check-label" for="defaultCheck6">
			۶ تخته و بیشتر
			</label>
		</li>

		</ul>

	</div>

	</section>

	<!--Hotel Type Filter-->
	<section class="card mb-4 border-0">
	<div class="card-body shadow-sm p-4">

		<p class="border-bottom pb-3 mb-4">نوع اتاق</p>

		<ul class="list-unstyled">

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck13">
			<label class="form-check-label" for="defaultCheck13">
			اتاق خواب
			</label>
		</li>

		<li class="text-muted d-flex align-items-center mb-2 fs-7">
			<input class="form-check-input mt-0 ms-3" type="checkbox" value="" id="defaultCheck14">
			<label class="form-check-label" for="defaultCheck14">
			سوئیت
			</label>
		</li>

		</ul>

	</div>

	</section>

</aside>