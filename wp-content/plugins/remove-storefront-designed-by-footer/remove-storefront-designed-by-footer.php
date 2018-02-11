<?php
/*
 Plugin Name: Remove "Designed By..." Footer from Storefront
 Plugin URI: http://danielsantoro.com
 Description: Removes "Designed by WooThemes" from your Storefront Theme's footer. You must have Storefront as your active theme for this to work.
 Author: Daniel Santoro
 Author URI: http://danielsantoro.com
 Version: 1.0.0
 License: GPLv2 or later
 */

// Remove "Storefront Designed by WooThemes" from Footer
add_action( 'init', 'custom_remove_footer_credit', 10 );
function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} 
 
function custom_storefront_credit() {
    ?>
    <div class="site-info">
        &copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
    </div><!-- .site-info -->
    <?php
}