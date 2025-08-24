<?php
/**
 * Plugin Name: WP ExtendPro
 * Description: Auto Mode footer info (Hotline, Email, Banner) with Dashboard settings.
 * Version: 1.0.0
 * Author: ExtendPro Team
 * Text Domain: wp-extendpro
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define plugin path & URL constants only once
if ( ! defined( 'WP_EXTENDPRO_PATH' ) ) {
    define( 'WP_EXTENDPRO_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'WP_EXTENDPRO_URL' ) ) {
    define( 'WP_EXTENDPRO_URL',  plugin_dir_url( __FILE__ ) );
}

// Includes: Admin & Frontend functionality
require_once WP_EXTENDPRO_PATH . 'includes/class-admin.php';
require_once WP_EXTENDPRO_PATH . 'includes/class-front.php';
require_once WP_EXTENDPRO_PATH . 'includes/class-extendpro-front.php';

// Activation Hook: Set default values if not already set
register_activation_hook( __FILE__, function () {
    if ( get_option( 'extendpro_hotline' ) === false ) {
        add_option( 'extendpro_hotline', '+880123456789' );
    }
    if ( get_option( 'extendpro_email' ) === false ) {
        add_option( 'extendpro_email', 'info@example.com' );
    }
    if ( get_option( 'extendpro_banner_text' ) === false ) {
        add_option( 'extendpro_banner_text', 'Welcome to Our Website!' );
    }
});

// Initialize plugin classes
new WP_ExtendPro_Admin();
new WP_ExtendPro_Front();
