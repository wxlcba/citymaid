<?php
/**
 * Hook functions of theme.
 *
 * This is the file to include hooks used in theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Era
 */

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'business_era_before_content_action' ) ) :
    
    function business_era_before_content_action() {

    	?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
    	
    }

endif;

add_action( 'business_era_before_content', 'business_era_before_content_action' );


//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'business_era_after_content_action' ) ) :
    
    function business_era_after_content_action() { 

    	?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php 

    }

endif;

add_action( 'business_era_after_content', 'business_era_after_content_action' );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'business_era_credit_info' ) ) :

    function business_era_credit_info(){ ?> 

	    <div class="site-info">
            <?php 
            /* translators: 1: name of theme, 2: Link of theme author */
            printf( esc_html__( '%1$s by %2$s', 'business-era' ), 'Business Era', '<a href="https://maneshpro.com" rel="designer" target="_blank">mProThemes</a>' ); 
            ?>
	    </div><!-- .site-info -->
        
    	<?php
	}

endif;

add_action( 'business_era_credit', 'business_era_credit_info', 10 );