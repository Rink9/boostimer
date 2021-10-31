<?php

namespace WooAvailability\Frontend;

use WooAvailability\Abstracts\Assets;

/**
 * Scripts and Styles Class.
 */
class FrontendAssets extends Assets {

    /**
     * Frontend Assets constructor.
     */
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 20 );
    }

    /**
     * Register frontend scripts and styles.
     *
     * @return void
     */
    public function enqueue_scripts() {
        $this->register();
        $this->load_scripts();
    }

    /**
     * Gets frontend scripts.
     *
     * @return array
     */
    protected function get_scripts() {
        return [
            'woo-availability-frontend-script' => [
                'src'       => WOO_AVAILABILITY_ASSET . '/js/frontend' . $this->get_suffix() . '.js',
                'deps'      => [ 'jquery' ],
                'version'   => $this->get_version(),
                'in_footer' => true,
            ],
        ];
    }

    /**
     * Gets frontend styles.
     *
     * @return array
     */
    protected function get_styles() {
        return [
            'woo-availability-frontend-style' => [
                'src'     => WOO_AVAILABILITY_ASSET . '/css/frontend.css',
                'version' => $this->get_version(),
            ],
        ];
    }

    /**
     * Loads scripts.
     *
     * @return void
     */
    public function load_scripts() {
        if ( is_product() ) {
            wp_enqueue_script( 'woo-availability-frontend-script' );
            wp_enqueue_style( 'woo-availability-frontend-style' );
        }
    }
}
