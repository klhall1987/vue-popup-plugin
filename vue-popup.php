<?php
/**
* Plugin Name: Vue Popup
* Description: Add a popup to for your WordPress site!
* Version: 1.0.0
* Author: Kenny Hall
* Author URI: https://woocommerce.com
* Text Domain: v-pup
*
*/

class vue_popup
{
    public function __construct() 
    {
        define( 'VPUP_DIR',        plugin_dir_path( __FILE__ ) );
        define( 'VPUP_URL',        plugins_url( '/', __FILE__ ) );

        
        add_action( 'init', [ $this, 'vpup_init' ] );
    }

    public function vpup_init() 
    {
        add_shortcode( 'vpup', [ $this, 'vpup_shortcode' ] );
        wp_register_script( 'vpup-dist', VPUP_URL . 'wp-vue/dist/js/app.js', [ 'jquery' ] );
        wp_register_script( 'vpup-dist-chunks', VPUP_URL . 'wp-vue/dist/js/chunk-vendors.js' );
        

        add_action( 'wp_enqueue_scripts', [ $this, 'vpup_load_styles' ], 10 );
    }

    public function vpup_load_styles() 
    {
        wp_enqueue_style( 'vpup-main-styles', VPUP_URL . 'wp-vue/src/assets/css/main.css' );
        wp_enqueue_style( 'vpup-font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    }

    public function vpup_shortcode( $atts )
    {
        wp_enqueue_script( 'vpup-dist' );
        wp_enqueue_script( 'vpup-dist-chunks' );

        $vue_atts = esc_attr( json_encode( [
            'siteURL' => VPUP_URL,
            'url'     => get_site_url()
            ] ) );

        return "<div id='vpup-app' data-vpup-atts='{$vue_atts}'></div>";
    }
}

new vue_popup();