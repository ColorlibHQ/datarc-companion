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


function datarc_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'limit'     => '3',
        'title'     => '',
        'subtitle'  => '',
    ), $atts );

    ob_start();
    ?>  


    <section id="protfolio" class="section-full">
        <div class="container">
            <?php 
            // Section Heading
            if( !empty( $atts['title'] ) || !empty( $atts['subtitle'] ) ){
                $title = $subtitle = '';
                // Title
                if( !empty( $atts['title'] ) ){
                    $title = $atts['title'];
                }
                // Sub title
                if( !empty( $atts['subtitle'] ) ){
                    $subtitle = $atts['subtitle'];
                }
                datarc_section_heading( $title, $subtitle );
            }
            
            // Filter Tab
            $terms = get_terms( 'datarc-portfolio-categories', array( 'hide_empty' => true ) );

            if( is_array( $terms ) && count( $terms ) > 0 ):
            ?>
            <div class="controls d-flex flex-wrap justify-content-center">
                    <a class="filter active" data-filter="all"><?php esc_html_e( 'All', 'datarc-companion' ); ?></a>
                    <?php 
                    $tabs = '';
                    foreach( $terms as $term ) {

                        $tabs .= '<a class="filter" data-filter=".'.esc_attr( $term->slug ).'">'.esc_html( $term->name ).'</a>';
                    }

                    echo $tabs;
                    ?>
            </div>
            <?php 
            endif;
            ?>
        </div>

        <div id="filter-content" class="row no-gutters mt-70">
                <?php 
                $args = array(
                    'post_type'      => 'datarc-portfolio',
                    'posts_per_page' => esc_html( $atts['limit'] ),
                );
                
                $query = new WP_Query( $args );


                if( $query->have_posts() ):
                    while( $query->have_posts() ):
                        $query->the_post();

                    $terms = get_the_terms( get_the_ID(), 'datarc-portfolio-categories' );

                    $tabClass = '';
                    if( $terms ){
                        foreach( $terms as $term ){
                            $tabClass  .= ' '.$term->slug;
                        }
                    }
                ?>
            <div class="mix <?php echo esc_attr( $tabClass ); ?> col-lg-3 col-md-4 col-sm-6 single-filter-content content-1" data-myorder="1" style="background-image: url( <?php the_post_thumbnail_url(); ?> )">
                <div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
                    <?php the_excerpt() ?>
                    <div class="line"></div>
                    <h5 class="text-uppercase"><?php the_title(); ?></h5>
                </div>
            </div>
            <?php
                endwhile; 
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

    <?php
    $html = ob_get_clean();
    
    return $html;
}
add_shortcode( 'datarcfolio', 'datarc_shortcode' );

?>