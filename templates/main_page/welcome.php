<!-- WELCOME
   ================================================== -->
   <section class="py-4 py-md-5">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-12 col-md-4 order-md-2 text-center">
            <!-- Image -->
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/hero_building.webp" class="img-fluid px-5 px-md-1 mb-4 mb-md-1" alt="" width="370">
         </div>
         <div class="col-12 col-md-8 order-md-1 text-center text-md-end">
            <!-- Heading -->
            <h1>رزرو هتل و هتل آپارتمان</h1>
            <!-- Text -->
            <p class="lead text-muted mb-6 mb-lg-8"> سامانه رزرواسیون هتل یابان، دارنده نمایندگی رسمی از هتل های طرف قرارداد. با ما بهترین هتل ها را پیدا کنید، اطلاعات آنها را مشاهده کنید و با بهترین قیمت و با تخفیف ویژه آنها را رزرو کنید. </p>
            <!-- Search -->
            <form id="ajaxSearch" method="post" action="">
               <div class="input-group mb-3 flex-row-reverse">
                  <button onclick="event.preventDefault()" class="btn btn-color-omega text-light d-flex align-items-center shadow-none" aria-label="search"><i class="icon-search"></i></button>
                  <input type="text" id="searchInput" name="search_phrase" class="form-control shadow-none" autocomplete="off" placeholder="نام هتل یا شهر مورد نظر..." aria-label="search" aria-describedby="search city or hotel name">
                </div>
            </form>
            <div id="searchResponse" class="rounded border facilities-list d-none" style="overflow-y: scroll;max-height: 150px">
               <ul class="list-unstyled list-unstyled py-2 px-3 m-0"></ul>
            </div>
         </div>
      </div>
   </div>
</section>