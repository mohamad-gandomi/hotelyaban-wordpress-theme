    <footer class="bg-color-gamma fs-8 text-light">
        <div class="container">
            <div class="py-5 row">

                <section class="col-12 col-md-4 mb-4 mb-md-0 text-center text-md-end">
                    <?php dynamic_sidebar( 'footer_area_one' ); ?>
                </section>

                <section class="col-12 col-md-2 mb-4 mb-md-0 text-center text-md-end">
                    <?php dynamic_sidebar( 'footer_area_two' ); ?>
                </section>

                <section class="col-12 col-md-2 mb-4 mb-md-0 text-center text-md-end">
                    <?php dynamic_sidebar( 'footer_area_three' ); ?>
                </section>

                <section class="col-12 col-md-2 text-center text-md-end">
                    <?php dynamic_sidebar( 'footer_area_four' ); ?>
                </section>

                <section class="col-12 col-md-2 text-center text-md-end">
                    <?php dynamic_sidebar( 'footer_area_five' ); ?>
                </section>
                
            </div>
        </div>
    </footer>
    <div class="bg-color-psi fs-8 mb-4 mb-md-0 sub-footer text-light">
        <div class="container">
            <div class="py-3 row">
                <div class="align-items-center col-12 col-md-6 d-flex my-2 my-md-0 text-center text-md-end"> <span class="copy-right">تمامی حقوق مادی و معنوی محفوظ و متعلق به هتل یابان می باشد.</span> </div>
                <div class="col-12 col-md-6 my-2 my-md-0 text-center text-md-start">
                    <?php dynamic_sidebar( 'copy_right_social_icons' ); ?>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-light border-4 border-primary border-top bottom-0 d-md-none end-0 position-fixed start-0">
        <div class="container py-2">
            <div class="row text-center">
                <div class="com-12 mb-2"> <span>جهت رزرو با ما تماس بگیرید</span> </div>
                <div class="com-12"> <a href="tel:05131793">05131793</a> </div>
            </div>
        </div>
    </section>
<?php wp_footer(); ?>

</body>
</html>
