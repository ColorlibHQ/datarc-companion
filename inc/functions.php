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
    
    
    // Instagram object Instance
    function datarc_instagram_instance(){
        
        $api = Wpzoom_Instagram_Widget_API::getInstance();

        return $api;
    }

    // Blog Section
    function datarc_blog_section( $postnumber ){
        
        ?>
            <div class="row">
                <?php   
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => esc_html( $postnumber ),
                );
                
                $query = new WP_Query( $args );
                
                if( $query->have_posts() ):
                while( $query->have_posts() ):
                    $query->the_post();
                ?>
                <div class="col-lg-3 col-md-6">
                    <!-- Block3 -->
                    <div class="single-publish">
                        <?php 
                        the_post_thumbnail( 'datarc_widget_post_thumb', array( 'class' => 'img-fluid' ) );
                        ?>
                        <div class="top">
                            <div class="mb-15 d-flex">
                                <a href="<?php echo esc_url( datarc_blog_date_permalink() ); ?>"><?php  echo esc_html( get_the_date() ); ?></a>
                                <span class="line"><?php esc_html_e( '|', 'datarc-companion' ); ?></span>
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><?php esc_html_e( 'By ', 'datarc' ); the_author(); ?></a>
                            </div>
                            <h6 class="text-uppercase"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                        </div>
                        <div class="mb-30"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink() ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details"><?php esc_html_e( 'Details', 'datarc-companion' );?></span><span class="lnr lnr-arrow-right"></span></a>

                    </div>
                </div>
                <?php 
                endwhile;
                wp_reset_postdata();
                endif;
                ?>
            </div>
        <?php
    }

    // 
    function datarc_section_heading( $title = '', $subtitle = '' ){
        if( $title || $subtitle ):
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="product-area-title text-center">
                    <?php 
                    // Sub Title
                    if( $subtitle ){
                        echo datarc_paragraph_tag(
                            array(
                                'class'       => 'text-uppercase',
                                'text'        => esc_html( $subtitle ),
                            )
                        );
                    }
                    // Title
                    if( $title ){
                        echo datarc_heading_tag(
                            array(
                                'tag'         => 'h2',
                                'class'       => 'h1',
                                'text'        => esc_html( $title ),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        endif;
    }

    // Set contact form 7 default form template
    function datarc_contact7_form_content( $template, $prop ) {
      if ( 'form' == $prop ) {

            $template =
                '<div id="myForm" class="contact-form">
                <div class="single-input color-2 mb-10">
                [text* datarc-name placeholder "Full Name"]
                </div>
                <div class="single-input color-2 mb-10">
                [email* datarc-email placeholder "Email Address"]
                </div>
                <div class="single-input color-2 mb-10">
                [text* datarc-subject placeholder "Subject"]
                </div>

                <div class="single-input color-2 mb-10">
                [textarea datarc-message placeholder "Type your message here..."]
                </div>
                <div class="d-flex justify-content-end"><button class="mt-10 primary-btn submit-btn d-inline-flex text-uppercase align-items-center">Send Message<span class="lnr lnr-arrow-right"></span></button></div>
                <div class="alert"></div>
                </div>';

            return $template;

      } else {
        return $template;
      } 
    }
    add_filter( 'wpcf7_default_template', 'datarc_contact7_form_content', 10, 2 );



/**
 * Register a portfolio post type.
 *
 */
add_action( 'init', 'datarc_componion_posttype_init' );
function datarc_componion_posttype_init() {
    $labels = array(
        'name'               => __( 'Portfolios', 'datarc-companion' ),
        'singular_name'      => __( 'Portfolio', 'datarc-companion' ),
        'menu_name'          => __( 'Portfolios', 'datarc-companion' ),
        'name_admin_bar'     => __( 'Portfolio', 'datarc-companion' ),
        'add_new'            => __( 'Add New', 'datarc-companion' ),
        'add_new_item'       => __( 'Add New Portfolio', 'datarc-companion' ),
        'new_item'           => __( 'New Portfolio', 'datarc-companion' ),
        'edit_item'          => __( 'Edit Portfolio', 'datarc-companion' ),
        'view_item'          => __( 'View Portfolio', 'datarc-companion' ),
        'all_items'          => __( 'All Portfolios', 'datarc-companion' ),
        'search_items'       => __( 'Search Portfolios', 'datarc-companion' ),
        'parent_item_colon'  => __( 'Parent Portfolios:', 'datarc-companion' ),
        'not_found'          => __( 'No books found.', 'datarc-companion' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'datarc-companion' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'datarc-companion' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'excerpt'  )
    );

    register_post_type( 'datarc-portfolio', $args );


    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'datarc-companion' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'datarc-companion' ),
        'search_items'      => __( 'Search Genres', 'datarc-companion' ),
        'all_items'         => __( 'All Portfolio Categories', 'datarc-companion' ),
        'parent_item'       => __( 'Parent Category', 'datarc-companion' ),
        'parent_item_colon' => __( 'Parent Category:', 'datarc-companion' ),
        'edit_item'         => __( 'Edit Category', 'datarc-companion' ),
        'update_item'       => __( 'Update Category', 'datarc-companion' ),
        'add_new_item'      => __( 'Add New Category', 'datarc-companion' ),
        'new_item_name'     => __( 'New Category Name', 'datarc-companion' ),
        'menu_name'         => __( 'Portfolio Categories', 'datarc-companion' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-categories' ),
    );

    register_taxonomy( 'datarc-portfolio-categories', array( 'datarc-portfolio' ), $args );


}

?>