<?php
/*
 * Plugin Name:       Datarc Companion
 * Plugin URI:        https://colorlib.com/wp/themes/datarc/
 * Description:       Datarc Companion is a companion for Datarc theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       datarc-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'DATARC_COMPANION_VERSION' ) ){
    define( 'DATARC_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( !defined( 'DATARC_COMPANION_DIR_PATH' ) ){
    define( 'DATARC_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'DATARC_COMPANION_INC_DIR_PATH' ) ){
    define( 'DATARC_COMPANION_INC_DIR_PATH', DATARC_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'DATARC_COMPANION_SW_DIR_PATH' ) ){
    define( 'DATARC_COMPANION_SW_DIR_PATH', DATARC_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'DATARC_COMPANION_EW_DIR_PATH' ) ){
    define( 'DATARC_COMPANION_EW_DIR_PATH', DATARC_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'DATARC_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'DATARC_COMPANION_DEMO_DIR_PATH', DATARC_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();


if( ( 'Datarc' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Datarc' == $is_parent->get( 'Name' ) ) ){
    require_once DATARC_COMPANION_DIR_PATH . 'datarc-init.php';
}else{

    add_action( 'admin_notices', 'datarc_companion_admin_notice', 99 );
    function datarc_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/datarc/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Datarc Companion</strong> plugin you have to also install the %1$sDatarc Theme%2$s', 'datarc-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>