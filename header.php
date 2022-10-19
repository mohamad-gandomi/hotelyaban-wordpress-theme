<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- NAVBAR
  ================================================== -->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container py-4 py-md-4">

        <!-- Brand -->
        <a class="navbar-brand ms-3" href="">
            <?php
                if ( has_custom_logo() ) {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    $logo_url = esc_url( $logo[0] );
                    echo '<img src="' . $logo_url . '" alt="' . get_bloginfo( 'name' ) . '">';
                } else {
                    echo '<span>' . get_bloginfo('name') . '</span>';
                }
            ?>
        </a>
  
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          </span>
        </button>
  
        <!-- Collapse -->
        <?php
            wp_nav_menu( array(
                'theme_location'  => 'primary_menu',
                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'bs-example-navbar-collapse-1',
                'menu_class'      => 'navbar-nav pe-2',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ));
        ?>
  
        <!-- Button -->
        <div class="d-none d-lg-inline">
          <a href="tel:05131793" class="btn btn-color-beta shadow-sm text-light d-flex align-items-center">
            <span class="mt-1">۰۵۱۳۱۷۹۳</span> 
            <i class="icon-telephone me-2"></i>
          </a>
        </div>
      </div>
    </nav>

  </header>
