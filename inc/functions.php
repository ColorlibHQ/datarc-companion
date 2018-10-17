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

    // Enqueue scripts
    add_action( 'wp_enqueue_scripts', 'datarc_companion_frontend_scripts', 99 );
    function datarc_companion_frontend_scripts() {

        wp_enqueue_script( 'datarc-loadmore-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );

    }

    // 
    add_action( 'wp_ajax_datarc_portfolio_ajax', 'datarc_portfolio_ajax' );
    add_action( 'wp_ajax_nopriv_datarc_portfolio_ajax', 'datarc_portfolio_ajax' );

    function datarc_portfolio_ajax( ){

        ob_start();

        if( !empty( $_POST['elsettings'] ) ):


            $items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

            $i = 0;

            foreach( $items as $val ):

            $tagclass = sanitize_title_with_dashes( $val['label'] );
            $i++;

            $imgUrl = !empty( $val['img']['url'] ) ? $val['img']['url'] : '';
        ?>
        <div class="mix <?php echo esc_attr( $tagclass ); ?> item-removable col-lg-3 col-md-4 col-sm-6 single-filter-content content-1" data-myorder="1" style="background-image: url( <?php echo esc_url( $imgUrl ); ?> )">
            <div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
                <?php 
                if( !empty( $val['sub-title'] ) ){

                    echo datarc_paragraph_tag(
                        array(
                            'text' => esc_html( $val['sub-title'] )
                        )
                    );
                }
                ?>
                <div class="line"></div>
                <?php 
                if( !empty( $val['title'] ) ){
                    echo datarc_heading_tag(
                        array(
                            'tag'    => 'h5',
                            'class'  => 'text-uppercase',
                            'text'   => esc_html( $val['title'] )
                        )
                    );
                }
                ?>
            </div>
        </div>

        <?php 

        if( !empty( $_POST['postIncrNumber'] ) ){

            if( $i == $_POST['postIncrNumber'] ){
                break;
            }
        }
            endforeach;
        endif;
        echo ob_get_clean();
        die();
    }

?>