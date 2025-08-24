<?php
/**
 * Plugin Name: WP ExtendPro
 * Description: Auto Mode footer info (Hotline, Email, Banner) with Dashboard settings.
 * Version: 1.0.0
 * Author: ExtendPro Team
 * Text Domain: wp-extendpro
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Path constants
define( 'WP_EXTENDPRO_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_EXTENDPRO_URL',  plugin_dir_url( __FILE__ ) );

// Includes
require_once WP_EXTENDPRO_PATH . 'includes/class-admin.php';
require_once WP_EXTENDPRO_PATH . 'includes/class-front.php';

// Activation: set defaults only if not already set
register_activation_hook( __FILE__, function () {
    if ( get_option('extendpro_hotline') === false ) {
        add_option('extendpro_hotline', '+880123456789');
    }
    if ( get_option('extendpro_email') === false ) {
        add_option('extendpro_email', 'info@example.com');
    }
    if ( get_option('extendpro_banner_text') === false ) {
        add_option('extendpro_banner_text', 'Welcome to Our Website!');
    }
});

// Bootstrap
new WP_ExtendPro_Admin();
new WP_ExtendPro_Front();
