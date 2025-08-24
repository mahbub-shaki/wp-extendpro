<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class WP_ExtendPro_Front {

    public function __construct() {
        // CSS (optional file if you add one later)
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);

        // Auto Mode → inject footer info on every page
        add_action('wp_footer', [$this, 'render_auto_footer'], 99);
    }

    public function enqueue_styles() {
        // If you create a CSS file at assets/css/frontend-style.css, uncomment below:
        // wp_enqueue_style('wp-extendpro-frontend', WP_EXTENDPRO_URL . 'assets/css/frontend-style.css', [], '1.0.0');
    }

    private function get_hotline() {
        return esc_html( get_option('extendpro_hotline', '+880123456789') );
    }

    private function get_email() {
        return esc_html( get_option('extendpro_email', 'info@example.com') );
    }

    private function get_banner() {
        return esc_html( get_option('extendpro_banner_text', 'Welcome to Our Website!') );
    }

    // Reusable HTML for info rows
    private function render_info_rows() {
        echo '<div class="extendpro-item"><span class="label">Hotline:</span> ' . $this->get_hotline() . '</div>';
        echo '<div class="extendpro-item"><span class="label">Email:</span> '   . $this->get_email()   . '</div>';
        echo '<div class="extendpro-item"><span class="label">Banner:</span> '  . $this->get_banner()  . '</div>';
    }

    public function render_auto_footer() {
        // Container with dark background
        echo '<div class="footer-extendpro" style="background:#111; color:#eee; padding:20px; text-align:center;">';

        echo '<div class="extendpro-wrap" style="display:flex; gap:16px; flex-wrap:wrap; justify-content:center; align-items:center;">';
        $this->render_info_rows();
        echo '</div>';

        // Copyright block with background (as you asked)
        echo '<div class="site-info" style="margin-top:15px; padding:10px 16px; background:#111; color:#aaa; font-size:13px;">';
        echo '&copy; ' . date('Y') . ' <span class="site-name">' . esc_html( get_bloginfo('name') ) . '</span>. All Rights Reserved.';
        echo '</div>';

        echo '</div>';

        // Minimal inline styles for labels (gold look)
       echo '<style>
    .footer-extendpro .extendpro-item { 
        display:inline-flex; 
        gap:6px; 
        align-items:center; 
        transition: color 0.3s ease, transform 0.3s ease;
        cursor:pointer;
    }
    .footer-extendpro .label { 
        font-weight:600; 
        color:#ffd700; 
        transition: color 0.3s ease; 
    }

    /* Hover Effect */
    .footer-extendpro .extendpro-item:hover {
        color:#fff;              /* টেক্সট সাদা হয়ে যাবে */
        transform: scale(1.05);  /* হালকা বড় হবে */
    }
    .footer-extendpro .extendpro-item:hover .label {
        color:#ff4500;           /* label (Hotline/Email/Banner) কমলা হয়ে যাবে */
    }
</style>';

    }
}
