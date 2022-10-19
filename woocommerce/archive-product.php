<?php get_header(); ?>

  <!-- MAIN
  ================================================== -->
  <section class="py-5">
    <div class="container">
		<?php include get_template_directory() . '/templates/list/filter_sort_togglers.php'; ?>
      <div class="row">
		<?php include get_template_directory() . '/templates/list/filters.php'; ?>
		<?php include get_template_directory() . '/templates/list/main.php'; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>