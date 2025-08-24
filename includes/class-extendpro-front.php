<?php 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Frontend handler for WP ExtendPro Lite
 * - Enqueues optional styles
 * - Injects auto footer (Lite Version)
 */
class WP_ExtendPro_LiteFront {

    public function __construct() {
        // Hook CSS (optional)
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);

        // Hook Auto Mode → inject footer info
        add_action('wp_footer', [$this, 'render_auto_footer'], 99);
    }

    /**
     * Enqueue frontend stylesheet
     * NOTE: Uncomment if you add a CSS file under assets/css/frontend-style.css
     */
    public function enqueue_styles() {
        // wp_enqueue_style(
        //     'wp-extendpro-lite',
        //     WP_EXTENDPRO_URL . 'assets/css/frontend-style.css',
        //     [],
        //     '1.0.0'
        // );
    }

    /**
     * Get hotline from options (fallback: default)
     */
    private function get_hotline() {
        return esc_html( get_option('extendpro_hotline', '+880123456789') );
    }

    /**
     * Get email from options (fallback: default)
     */
    private function get_email() {
        return esc_html( get_option('extendpro_email', 'info@example.com') );
    }

    /**
     * Get banner text from options (fallback: default)
     */
    private function get_banner() {
        return esc_html( get_option('extendpro_banner_text', 'Welcome to Our Website!') );
    }

    /**
     * Render reusable info rows (Hotline, Email, Banner)
     */
    private function render_info_rows() {
        echo '<div class="extendpro-lite-item"><span class="label">Hotline:</span> ' . $this->get_hotline() . '</div>';
        echo '<div class="extendpro-lite-item"><span class="label">Email:</span> '   . $this->get_email()   . '</div>';
        echo '<div class="extendpro-lite-item"><span class="label">Banner:</span> '  . $this->get_banner()  . '</div>';
    }

    /**
     * Auto Mode → Render footer block in frontend
     */
    public function render_auto_footer() {
        // Outer container
        echo '<div class="footer-extendpro-lite" style="background:#222; color:#eee; padding:20px; text-align:center;">';

        // Info rows wrapper
        echo '<div class="extendpro-lite-wrap" style="display:flex; gap:16px; flex-wrap:wrap; justify-content:center; align-items:center;">';
        $this->render_info_rows();
        echo '</div>';

        // Copyright
        echo '<div class="site-info-lite" style="margin-top:15px; padding:10px 16px; background:#111; color:#aaa; font-size:13px;">';
        echo '&copy; ' . date('Y') . ' <span class="site-name">' . esc_html( get_bloginfo('name') ) . '</span>. All Rights Reserved (Lite).';
        echo '</div>';

        echo '</div>';

        // Inline styles for hover effects
        echo '<style>
            .footer-extendpro-lite .extendpro-lite-item { 
                display:inline-flex; 
                gap:6px; 
                align-items:center; 
                transition: color 0.3s ease, transform 0.3s ease;
                cursor:pointer;
            }
            .footer-extendpro-lite .label { 
                font-weight:600; 
                color:#32cd32; /* Lite version: green accent */
                transition: color 0.3s ease; 
            }
            .footer-extendpro-lite .extendpro-lite-item:hover {
                color:#fff;
                transform: scale(1.05);
            }
            .footer-extendpro-lite .extendpro-lite-item:hover .label {
                color:#00ced1; /* cyan hover */
            }
        </style>';
    }
}
