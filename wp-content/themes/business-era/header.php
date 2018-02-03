<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Era
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-era' ); ?></a>
	
	<header id="masthead" class="site-header" role="banner">
	
		<?php get_template_part( 'template-parts/top-header' ); ?>
		
		<div class="main-header">
			<div class="container">
				<div class="site-branding">
					<?php business_era_the_custom_logo(); ?>

					<?php $show_title = business_era_get_option( 'show_title' ); ?>

					<?php if ( true === $show_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php
					$description  = get_bloginfo( 'description', 'display' );
					$show_tagline = business_era_get_option( 'show_tagline' );
					?>
					<?php if ( true === $show_tagline ) : ?>
						<?php if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- .site-branding -->
				
			    <div id="main-nav" class="main-navigation clear-fix">
			        <nav id="site-navigation" role="navigation">
						<?php
						wp_nav_menu(
							array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'fallback_cb'    => 'business_era_primary_navigation_fallback',
							)
						);
						?>
			        </nav><!-- #site-navigation -->
			    </div> <!-- #main-nav -->
			</div><!-- .container -->
			<div id="responsive-nav" class="responsive-navigation clear-fix"></div>
		</div><!-- .main-header -->
	</header><!-- #masthead -->

    <?php get_template_part( 'template-parts/slider' ); ?>

    <?php get_template_part( 'template-parts/custom-header' ); ?>

    <?php get_template_part( 'template-parts/breadcrumbs' ); ?>

    <?php get_template_part( 'template-parts/home-widgets' ); ?>

	<?php
	/**
	 * Hook - business_era_before_content.
	 *
	 * @hooked business_era_before_content_action - 10
	 */
	do_action( 'business_era_before_content' );
	?>
