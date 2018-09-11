<?php
namespace Datarcelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Datarc elementor testimonial section widget.
 *
 * @since 1.0
 */
class Datarc_Testimonial extends Widget_Base {

	public function get_name() {
		return 'datarc-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial content', 'datarc-companion' ),
			]
		);
		$this->add_control(
            'datarctestimonial', [
                'label'         => __( 'Create Quote', 'datarc-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Quote Author Name', 'datarc-companion' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Jim Morison', 'datarc-companion' )
                    ],
                    [
                        'name'    => 'designation',
                        'label'   => __( 'Author Designation', 'datarc-companion' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Company CEO', 'datarc-companion' )
                    ],
                    [
                        'name'      => 'quotetext',
                        'label'     => __( 'Quote Text', 'datarc-companion' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => esc_html__( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Pellentesque sit amet tellus blandit.', 'datarc-companion' )
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Quote Author image', 'datarc-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]

                ],
            ]
		);
		$this->end_controls_section(); // End testimonial content

        //------------------------------ Style Content ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Content Color', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_boxbg', [
                'label' => __( 'Box background color.', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial'   => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_authname', [
                'label' => __( 'Color for author name.', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .author h6'   => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_authdesignation', [
                'label' => __( 'Color for designation.', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial .author span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_authcontent', [
                'label' => __( 'Color for content.', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="section-full">
        <div class="container">
            <div class="active-testimonial-carousel">

                <?php
                //  Single Testimonial Area
                if( is_array( $settings['datarctestimonial'] ) && count( $settings['datarctestimonial'] ) > 0 ):
                    foreach( $settings['datarctestimonial'] as $quote ):
                ?>
                <div class="single-testimonial">

                    <?php 
                    // Image
                    if( !empty( $quote['img']['url'] ) ){

                        echo datarc_img_tag(
                            array(
                                'url'   =>  esc_url( $quote['img']['url'] ),
                                'class' => 'img-circle'

                            )
                        );
                    }
                    //
                    if( !empty( $quote['quotetext'] ) ){
                        echo datarc_paragraph_tag(
                            array(
                                'text' => esc_html( $quote['quotetext'] )
                            )
                        );
                    }
                            
                    // 
                    echo '<div class="author text-center">';
                    if( !empty( $quote['label'] ) ){
                        echo datarc_heading_tag(
                            array(
                                'tag'  => 'h6',
                                'class' => 'text-uppercase',
                                'text' => esc_html( $quote['label'] )
                            )
                        );
                    }
                    //
                    if( !empty( $quote['designation'] ) ){
                        echo datarc_other_tag(
                            array(
                                'tag'   => 'span',
                                'text'  => esc_html( $quote['designation'] )
                            )
                        );
                    }
                    echo '</div>';
                    ?>
                </div>
                <?php 
                    endforeach;
                endif;
                ?>

            </div>
        </div>
    </section>

    <?php

        }
	
}
