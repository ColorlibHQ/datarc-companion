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
 * Datarc elementor about page section widget.
 *
 * @since 1.0
 */
class Datarc_About extends Widget_Base {

	public function get_name() {
		return 'datarc-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  About Heading ------------------------------
        
        $this->start_controls_section(
            'aboutus_heading',
            [
                'label' => __( 'Section Heading', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'aboutus_headingsubtile',
            [
                'label'     => esc_html__( 'Sub Title', 'datarc-companion' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'ABOUT OUR DIGITAL AGENCY',
                'label_block' => true
            ]
        );
        $this->add_control(
            'aboutus_headingshortdesc',
            [
                'label'     => esc_html__( 'Short Description', 'datarc-companion' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => 'Write something'
            ]
        );
        $this->end_controls_section(); // End title

        // ----------------------------------------  About content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'aboutus', [
                'label' => __( 'Create About Content', 'datarc-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'ADDICTION WHIT GAMBLING'
                    ],
                    [
                        'name' => 'iconimg',
                        'label' => __( 'Image Icon', 'datarc-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'btnurl',
                        'label' => __( 'Button Url', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End content

        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .section-title h3'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_titlebold', [
                'label'     => __( 'Bold Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .section-title h3 b' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_content', [
                'label'     => __( 'Sub Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>


    <section class="section-full gray-bg">
        <div class="container">
            <?php 
            if( !empty( $settings['aboutus_headingsubtile'] ) || !empty( $settings['aboutus_headingshortdesc'] ) ):
            ?>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <?php 
                        if( !empty( $settings['aboutus_headingsubtile'] ) ){
                            echo datarc_paragraph_tag(
                                array(
                                    'text' => esc_html( $settings['aboutus_headingsubtile'] ),
                                    'class' => 'text-uppercase'
                                )
                            );
                        }
                        //
                        if( !empty( $settings['aboutus_headingshortdesc'] ) ){
                            echo datarc_get_textareahtml_output( $settings['aboutus_headingshortdesc'] );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            endif;
            ?>
            <div class="row">
                <?php 
                if( is_array( $settings['aboutus'] ) && count( $settings['aboutus'] ) > 0 ):
                    foreach( $settings['aboutus'] as $abcontent ):
                ?>
                <div class="col-md-4">
                    <figure class="signle-service">
                        <?php 
                        if( !empty( $abcontent['iconimg']['url'] ) ){
                            echo '<div class="icon">';
                                if( !empty( $abcontent['iconimg']['url'] ) ){
                                    echo datarc_img_tag(
                                        array(
                                            'url'   =>  esc_url( $abcontent['iconimg']['url'] ),
                                            'class' => 'img-fluid'
                                        )
                                    );
                                }
                            echo '</div>';
                        }
                        ?> 
                        <figcaption class="text-center">
                            <?php 
                            // Title
                            if( !empty( $abcontent['label'] ) ){
                                echo datarc_heading_tag(
                                    array(
                                        'tag'   => 'h5',
                                        'class' => 'text-uppercase',
                                        'text'  => esc_html( $abcontent['label'] ) 
                                    )
                                );
                            }
                            // Description
                            if( !empty( $abcontent['desc'] ) ){
                                echo datarc_paragraph_tag(
                                    array(
                                        'text' => esc_html( $abcontent['desc'] )
                                    )
                                );
                            }
                            // 
                            if( !empty( $abcontent['btnurl'] ) ){
                                echo '<a href="'.esc_url( $abcontent['btnurl'] ).'" class="primary-btn d-inline-flex align-items-center">'.esc_html__( 'Explore', 'datarc-companion' ).'<span class="lnr lnr-arrow-right"></span></a>';
                            }
                            ?>
                        </figcaption>
                    </figure>
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
