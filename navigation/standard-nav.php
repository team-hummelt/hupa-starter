<?php
defined( 'ABSPATH' ) or die();

/**
 * ADMIN OPTIONS HANDLE
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */
$pageSettings = apply_filters('get_page_meta_data', (int) get_the_ID());
$pageSettings->show_menu ? $show = '' : $show = 'd-none';
?>

<nav id="nav-main-starter"
     class="<?=$show?> hupa-box-shadow navbar-root navbar navbar-expand-lg justify-content-center <?= ! get_hupa_option( 'fix_header' ) ?: 'has-sticky' ?>">
	<div class="<?=$pageSettings->menu_container ? 'container' : 'container-fluid'?>">
		<?php if(get_hupa_frontend('nav-img')): ?>
		<a class="navbar-brand d-none d-lg-block" href="<?php echo esc_url( home_url() ); ?>">
			<img src="<?= get_hupa_frontend('nav-img')->url?>"
			     alt="<?=get_bloginfo('name')?>" class="logo md"
			     width="<?= get_hupa_frontend('nav-img')->width?>">
		</a>
		<a class="navbar-brand img-fluid d-md-block d-lg-none" href="<?php echo esc_url( home_url() ); ?>">
			<img src="<?=get_hupa_frontend('nav-img')->url?>"
			     alt="<?=get_bloginfo('name')?>"
			     class="logo sm">
		</a>
        <?php endif; ?>
		<!-- Top Nav Widget -->
		<div class="top-nav order-lg-3 flex-lg-grow-0 d-none d-sm-flex justify-content-end">
			<?php if ( is_active_sidebar( 'top-nav' ) ) : ?>
				<div>
					<?php dynamic_sidebar( 'top-nav' ); ?>
				</div>
			<?php endif; ?>
		</div>
		<button class="navbar-toggler border-0 focus-0 py-2 pe-0 ms-auto ms-lg-2" type="button" data-bs-toggle="offcanvas"
		        data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
			<i class="text-secondary fas fa-bars"></i>
		</button>
		<div class="offcanvas offcanvas-end" tabindex="-1" data-bs-hideresize="true" id="offcanvas-navbar">
			<div class="offcanvas-header hover cursor-pointer bg-light text-primary"
			     data-bs-dismiss="offcanvas">
				<i class="fas fa-chevron-left"></i> <?php esc_html_e( 'Close menu', 'bootscore' ); ?>
			</div>
			<div class="offcanvas-body justify-content-center">
				<!-- Bootstrap 5 Nav Walker Main Menu -->
				<?php
				wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'container'      => false,
					'menu_class'     => '',
					'fallback_cb'    => '__return_false',
					'items_wrap'     => '<ul id="bootscore-navbar" class="navbar-nav %2$s">%3$s</ul>',
					'depth'          => 2,
					'walker'         => new bootstrap_5_wp_nav_menu_walker()
				) );
				?>
				<!-- Bootstrap 5 Nav Walker Main Menu End -->
			</div>
		</div>
	</div><!-- container -->
</nav>