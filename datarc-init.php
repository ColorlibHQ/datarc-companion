<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Datarc Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Sidebar widgets include
require_once DATARC_COMPANION_SW_DIR_PATH . 'newsletter-widget.php';
require_once DATARC_COMPANION_SW_DIR_PATH . 'instagram-widget.php';

// Include Files
require_once DATARC_COMPANION_INC_DIR_PATH . 'functions.php';
require_once DATARC_COMPANION_INC_DIR_PATH . 'instagram-api.php';
require_once DATARC_COMPANION_EW_DIR_PATH  . 'elementor-widget.php';
require_once DATARC_COMPANION_INC_DIR_PATH  . 'datarc-meta/datarc-meta-config.php';

// Demo import include
require_once DATARC_COMPANION_DEMO_DIR_PATH . 'demo-import.php';

?>