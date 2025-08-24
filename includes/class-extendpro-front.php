<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class WP_ExtendPro_Front {

    public function __construct() {
        // Shortcodes
        add_shortcode('extendpro_shortcode', [$this, 'render_shortcode']);
        add_shortcode('extendpro_hotline', [$this, 'get_hotline']);
        add_shortcode('extendpro_email', [$this, 'get_email']);
        add_shortcode('extendpro_banner', [$this, 'get_banner']);
        add_shortcode('extendpro_info', [$this, 'get_all_info']);

        // Footer hook
        add_action('wp_footer', [$this, 'maybe_show_footer_info']);

        // Enqueue frontend CSS
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);

        // Admin settings page
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    // Enqueue CSS
    public function enqueue_styles() {
        wp_enqueue_style(
            'wp-extendpro-frontend', 
            plugin_dir_url(__FILE__) . '../assets/css/frontend-style.css', 
            [], 
            '1.0.0'
        );
    }

    // Demo shortcode
    public function render_shortcode($atts = [], $content = null) {
        return '<div class="extendpro-box">'.__('Hello from WP ExtendPro!', 'wp-extendpro').'</div>';
    }

    // Individual shortcodes
    public function get_hotline() {
        return esc_html(get_option('extendpro_hotline', '+880123456789'));
    }

    public function get_email() {
        return esc_html(get_option('extendpro_email', 'info@example.com'));
    }

    public function get_banner() {
        return esc_html(get_option('extendpro_banner_text', 'Welcome to Our Website!'));
    }

    // Combined info shortcode
    public function get_all_info() {
        $hotline = $this->get_hotline();
        $email   = $this->get_email();
        $banner  = $this->get_banner();

        return '<div class="extendpro-box extendpro-footer">'
            . '<span>Hotline:</span> ' . $hotline . ' | '
            . '<span>Email:</span> ' . $email . ' | '
            . '<span>Banner:</span> ' . $banner
            . '</div>';
    }

    // Show in footer only if Auto Mode selected
    public function maybe_show_footer_info() {
        $mode = get_option('extendpro_display_mode', 'auto');
        if ( $mode === 'auto' ) {
            echo $this->get_all_info();
        }
    }

    /* --------------------------
       ADMIN SETTINGS PAGE
    ---------------------------*/
    public function add_settings_page() {
        add_options_page(
            'ExtendPro Settings',
            'ExtendPro',
            'manage_options',
            'extendpro-settings',
            [$this, 'render_settings_page']
        );
    }

    public function register_settings() {
        register_setting('extendpro_settings_group', 'extendpro_display_mode');

        add_settings_section(
            'extendpro_display_section',
            'Footer Display Options',
            function() {
                echo '<p>Select how ExtendPro info should be displayed in your site footer.</p>';
            },
            'extendpro-settings'
        );

        add_settings_field(
            'extendpro_display_mode',
            'Display Mode',
            [$this, 'display_mode_field'],
            'extendpro-settings',
            'extendpro_display_section'
        );
    }

    public function display_mode_field() {
        $value = get_option('extendpro_display_mode', 'auto');
        ?>
        <label>
            <input type="radio" name="extendpro_display_mode" value="auto" <?php checked($value, 'auto'); ?>>
            <strong>Auto Mode</strong> – Always show in footer automatically.
        </label><br>
        <label>
            <input type="radio" name="extendpro_display_mode" value="shortcode" <?php checked($value, 'shortcode'); ?>>
            <strong>Shortcode Mode</strong> – Use <code>[extendpro_info]</code> or individual shortcodes manually.
        </label><br>
        <label>
            <input type="radio" name="extendpro_display_mode" value="template" <?php checked($value, 'template'); ?>>
            <strong>Theme Template Mode</strong> – Add manually in theme footer: 
            <code>&lt;?php echo do_shortcode('[extendpro_info]'); ?&gt;</code>
        </label>
        <?php
    }

    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1>ExtendPro Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('extendpro_settings_group');
                do_settings_sections('extendpro-settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
