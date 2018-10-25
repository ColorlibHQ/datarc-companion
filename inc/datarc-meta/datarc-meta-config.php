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
    

    // Page footer select option meta
    add_action("add_meta_boxes", "add_custom_meta_box");
    function add_custom_meta_box()
    {

        // page footer background meta box
        add_meta_box("pagefooter-meta-box", "Footer Settings", "datarc_pagefooteropt_meta_box_markup", "page", "side", "high", null);
    }

    // Page footer settings meta field markup
    function datarc_pagefooteropt_meta_box_markup( $object ) {

    wp_nonce_field( basename(__FILE__), "datarc-footeropt-meta-nonce" );

    ?>
        <div class="footer-opt">
            <p class="post-attributes-label-wrapper">
                <label for="pagefooter-dropdown" class="post-attributes-label"><?php esc_html_e( 'Set Page Footer', 'datarc-companion' ); ?></label>
            </p>
            <?php 
            $val = get_post_meta( $object->ID ,'_datarc_footer_opt', true );
            ?>
            <select name="footeropt" class="datarc-admin-selectbox" id="page_header_selectbox">
                <option value="footeryes" <?php echo esc_attr( $val == 'footeryes' ? 'selected' : '' ); ?> ><?php esc_html_e( 'Footer Show', 'datarc-companion' ); ?></option>
                <option value="footerno" <?php echo esc_attr( $val == 'footerno' ? 'selected' : '' ); ?>><?php esc_html_e( 'Footer Hide', 'datarc-companion' ); ?></option>
            </select>

        </div>
    <?php  
    }
   
    // Page footer background settings save
    function datarc_save_page_page_footer_settings_meta( $post_id, $post, $update )
    {
        if (!isset( $_POST["datarc-footeropt-meta-nonce"] ) || !wp_verify_nonce( $_POST["datarc-footeropt-meta-nonce"], basename(__FILE__)))
            return $post_id;

        if(!current_user_can("edit_post", $post_id))
            return $post_id;

        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
            return $post_id;

        $slug = "page";
        if($slug != $post->post_type)
            return $post_id;

        $meta_footeropt   = "";

        if(isset($_POST["footeropt"]))
        {
            $meta_footeropt = $_POST["footeropt"];
        }   
        update_post_meta( $post_id, "_datarc_footer_opt", sanitize_text_field( $meta_footeropt ) );

    }

    add_action("save_post", "datarc_save_page_page_footer_settings_meta", 10, 3);
?>