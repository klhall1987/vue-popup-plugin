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

    /**
     * VPUP Init
     * Builds out everything needed for our app to run. 
     * 
     * @return void
     */
    public function vpup_init() 
    {
        // Build our shortcode.
        add_shortcode( 'vpup', [ $this, 'vpup_shortcode' ] );

        // Register our vue scripts.
        wp_register_script( 'vpup-dist', VPUP_URL . 'wp-vue/dist/js/app.js', [ 'jquery' ] );
        wp_register_script( 'vpup-dist-chunks', VPUP_URL . 'wp-vue/dist/js/chunk-vendors.js' );
        
        // Enqueues our styles. 
        add_action( 'wp_enqueue_scripts', [ $this, 'vpup_load_styles' ], 10 );
    }

    /**
     * VPUP Load Styles
     * Loads styling needed or the project
     * 
     * @return void
     */
    public function vpup_load_styles() 
    {
        // Enqueue our styles.
        wp_enqueue_style( 'vpup-main-styles', VPUP_URL . 'wp-vue/src/assets/css/main.css' );
        wp_enqueue_style( 'vpup-font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    }

    /**
     * VPUP Shortcode
     * Sets our short code for our app. 
     * 
     * @param Array $atts  - list of attributes. 
     * @return String - Outputs the div that Vue mounts to. 
     */
    public function vpup_shortcode( $atts )
    {
        // enqueue our vue scripts.
        wp_enqueue_script( 'vpup-dist' );
        wp_enqueue_script( 'vpup-dist-chunks' );

        // Check our cart.
        $should_redirect = $this->vpup_set_cart();

        // Redirect to cart if needed. 
        $this->vpup_redirect_to_cart( $should_redirect );

        // Pass data to vue.
        $vue_atts = esc_attr( json_encode( [
            'siteURL' => VPUP_URL,
            'url'     => get_site_url()
            ] ) );

        // Output our mountable div and pass in our $vue_atts
        return "<div id='vpup-app' data-vpup-atts='{$vue_atts}'></div>";
    }

    /**
     * VPUP Set Cart
     * Checks our URL for quantities, then adds items to cart
     * 
     * @return Bool - Used to decide if we need to redirect.
     */
    public function vpup_set_cart() 
    {
        // Used to decide if we need to redirect to the cart. 
        $should_redirect = false;

        // TODO: Refactor this to be dynamic. 
        // Check our Product Quantity then add a cart item, if we have any items. 
        if( $_GET[ 'vetCertQuantity' ] > 0 ) {
            WC()->cart->add_to_cart( 147, $_GET[ 'vetCertQuantity'] );
            $should_redirect = true;
        }

        // Check our Product Quantity then add a cart item, if we have any items. 
        if( $_GET[ 'vetCertAvianQuantity' ] > 0 ) {
            WC()->cart->add_to_cart( 149, $_GET[ 'vetCertAvianQuantity'] );
            $should_redirect = true;
        }

        // Check our Product Quantity then add a cart item, if we have any items. 
        if( $_GET[ 'groomerQuantity' ] > 0 ) {
            WC()->cart->add_to_cart( 150, $_GET[ 'groomerQuantity'] );
            $should_redirect = true;
        }

        // Check our Product Quantity then add a cart item, if we have any items. 
        if( $_GET[ 'trainerQuantity' ] > 0 ) {
            WC()->cart->add_to_cart( 151, $_GET[ 'trainerQuantity'] );
            $should_redirect = true;
        }

        // Return our cart redirect value
        return $should_redirect;
    }

    /**
     * VPUP Redirect To Cart
     * Checks for quantities then redirects to our cart if products are set. 
     * 
     * @param Bool $should_redirect - Lets us know if we need to redirect to the cart. 
     * @return void
     */
    public function vpup_redirect_to_cart( $should_redirect ) 
    {
        //  Check our quantities and redirect if any products are set. 
        if( $should_redirect ) {
            $cart_redirect_url =  get_site_url() . '/?page_id=7';
            echo "<script>window.location.replace('" . $cart_redirect_url . "')</script>";
        }
    }
}

new vue_popup();