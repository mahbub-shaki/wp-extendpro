<?php
/**
 * Admin Settings Class for WP ExtendPro
 *
 * @package WP_ExtendPro
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class WP_ExtendPro_Admin {

    /**
     * Constructor: Hooks
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    /**
     * Add Admin Menu Page
     */
    public function add_admin_menu() {
        add_menu_page(
            __( 'ExtendPro Settings', 'wp-extendpro' ),
            __( 'ExtendPro', 'wp-extendpro' ),
            'manage_options',
            'wp-extendpro',
            [ $this, 'settings_page' ],
            'dashicons-admin-generic',
            61
        );
    }

    /**
     * Register Plugin Settings
     */
    public function register_settings() {
        register_setting( 'wp_extendpro_settings_group', 'extendpro_hotline', [
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        register_setting( 'wp_extendpro_settings_group', 'extendpro_email', [
            'sanitize_callback' => 'sanitize_email',
        ] );
        register_setting( 'wp_extendpro_settings_group', 'extendpro_banner_text', [
            'sanitize_callback' => 'sanitize_text_field',
        ] );
    }

    /**
     * Render Settings Page
     */
    public function settings_page() {
        $hotline = get_option( 'extendpro_hotline', '+880123456789' );
        $email   = get_option( 'extendpro_email', 'info@example.com' );
        $banner  = get_option( 'extendpro_banner_text', 'Welcome to Our Website!' );
        ?>
        <div class="wrap wp-extendpro-admin">
            <h1><?php esc_html_e( 'ExtendPro Settings (Auto Mode)', 'wp-extendpro' ); ?></h1>
            <p style="max-width:720px;color:#555;">
                <?php esc_html_e( 'This plugin runs in Auto Mode. Update the fields below and the footer info will update site-wide automatically.', 'wp-extendpro' ); ?>
            </p>

            <form method="post" action="options.php">
                <?php settings_fields( 'wp_extendpro_settings_group' ); ?>
                <?php do_settings_sections( 'wp_extendpro_settings_group' ); ?>

                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row">
                            <label for="extendpro_hotline"><?php esc_html_e( 'Hotline', 'wp-extendpro' ); ?></label>
                        </th>
                        <td>
                            <input id="extendpro_hotline" type="text" name="extendpro_hotline"
                                value="<?php echo esc_attr( $hotline ); ?>" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="extendpro_email"><?php esc_html_e( 'Email', 'wp-extendpro' ); ?></label>
                        </th>
                        <td>
                            <input id="extendpro_email" type="email" name="extendpro_email"
                                value="<?php echo esc_attr( $email ); ?>" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="extendpro_banner_text"><?php esc_html_e( 'Banner Text', 'wp-extendpro' ); ?></label>
                        </th>
                        <td>
                            <input id="extendpro_banner_text" type="text" name="extendpro_banner_text"
                                value="<?php echo esc_attr( $banner ); ?>" class="regular-text" />
                        </td>
                    </tr>
                </table>

                <?php submit_button( __( 'Save Settings', 'wp-extendpro' ) ); ?>
            </form>

            <hr style="margin:24px 0;">
            <p style="color:#777;">
                <strong><?php esc_html_e( 'Note:', 'wp-extendpro' ); ?></strong>
                <?php esc_html_e( 'No template or shortcode needed. Output is injected automatically into the site footer.', 'wp-extendpro' ); ?>
            </p>
        </div>
        <?php
    }
}
