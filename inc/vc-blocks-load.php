<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Class started
class ppmVCExtendAddonClass {

    function __construct() {
        add_action( 'init', array( $this, 'ppmIntegrateWithVC' ) );
    }
 
    public function ppmIntegrateWithVC() {
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'ppmShowVcVersionNotice' ));
            return;
        }

        include_once('vc-blocks.php');

    }

    public function ppmShowVcVersionNotice() {
        $theme_data = wp_get_theme();
        echo '
        <div class="notice notice-warning">
          <p>'.sprintf(__('<strong>%s</strong> recommends <strong>Visual Composer</strong> plugin to be installed and activated on your site.', 'ppm-toolkit'), $theme_data->get('Name')).'</p>
        </div>';
    }
}

new ppmVCExtendAddonClass();