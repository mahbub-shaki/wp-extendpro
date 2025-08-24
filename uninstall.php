<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

// Delete plugin options
delete_option('extendpro_hotline');
delete_option('extendpro_email');
delete_option('extendpro_banner_text');
