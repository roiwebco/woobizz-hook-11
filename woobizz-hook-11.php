<?php
/*
Plugin Name: Woobizz Hook 11 
Plugin URI: http://woobizz.com
Description: Hide add to cart message on cart page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
Text Domain: woobizzhook11
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook11_load_textdomain' );
function woobizzhook11_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook1', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	//echo "woocommerce is active";
	//Hook 11
	add_filter( 'wc_add_to_cart_message', '__return_false', 1);
	
}else{
	//Show message on admin
	//echo "woocommerce is not active";
	add_action( 'admin_notices', 'woobizzhook11_admin_notice' );
}

//Hook11 Notice
function woobizzhook11_admin_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'Woobizz Hook 11 needs WooCommerce to work properly, If you do not use this plugin you can disable it!', 'woobizzhook11' ); ?></p>
    </div>
    <?php
}