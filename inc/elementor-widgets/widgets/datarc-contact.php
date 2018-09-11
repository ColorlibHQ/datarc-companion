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
class Datarc_Contact extends Widget_Base {

    public function get_name() {
        return 'datarc-contact';
    }

    public function get_title() {
        return __( 'Contact', 'datarc-companion' );
    }

    public function get_icon() {
        return 'eicon-tel-field';
    }

    public function get_categories() {
        return [ 'datarc-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  Contact Section Heading ------------------------------
        $this->start_controls_section(
            'contact_sectheading',
            [
                'label' => __( 'Section Heading', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'contact_sectiontitle',
            [
                'label'       => esc_html__( 'Section Title', 'datarc-companion' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'contact_sectionsubtitle',
            [
                'label'       => esc_html__( 'Section Sub Title', 'datarc-companion' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section(); // End Contact Section Heading

        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Contact Info', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'contact_shortinfo',
            [
                'label'     => esc_html__( 'Short Info', 'datarc-companion' ),
                'type'      => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'contact_addressonetitle_sepa',
            [
                'label'     => __( 'Address Box #1 Info', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'contact_addressonetitle',
            [
                'label'     => esc_html__( 'Address Box #1 Title', 'datarc-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->add_control(
            'contact_addressone',
            [
                'label'     => esc_html__( 'Address Box #1', 'datarc-companion' ),
                'type'      => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'contact_addresstwotitle_sepa',
            [
                'label'     => __( 'Address Box #2 Info', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'contact_addresstwotitle',
            [
                'label'     => esc_html__( 'Address Box #2 Title', 'datarc-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->add_control(
            'contact_addresstwo',
            [
                'label'     => esc_html__( 'Address Box #2', 'datarc-companion' ),
                'type'      => Controls_Manager::WYSIWYG,
            ]
        );
        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'datarc-companion' ),
                'type'      => Controls_Manager::WYSIWYG,
            ]
        );
        $this->end_controls_section(); // End Contact Form



        /**
         * Style Tab
         * ------------------------------ Style Section Heading ------------------------------
         *
         */
        $this->start_controls_section(
            'style_sh_color', [
                'label' => __( 'Style Section Heading', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title h2.h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label'     => __( 'Sub title color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_btntext', [
                'label'     => __( 'Text color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .section-full' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_border', [
                'label'     => __( 'Heading color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .address h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}}  .contact-form .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovlc', [
                'label'     => __( 'Form Button Hover Label color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .contact-form .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


    }

    protected function render() {

    $settings = $this->get_settings();


    ?>
    <section id="contact" class="section-full">
        <div class="container">
            <?php 
            // Section Heading
            datarc_section_heading( $settings['contact_sectiontitle'], $settings['contact_sectionsubtitle'] );
            ?>
            <div class="row">
                <div class="col-lg-6 mt-30">
                    <?php 
                    if( !empty( $settings['contact_shortinfo'] ) ){
                        echo datarc_get_textareahtml_output( $settings['contact_shortinfo'] );
                    }
                    ?>
                    <div class="row">
                    <?php 
                    if( !empty( $settings['contact_addressone'] ) || !empty( $settings['contact_addressonetitle'] ) ){
                        echo '<div class="col-sm-6">';
                            echo '<div class="address mt-20">';
                                if( !empty( $settings['contact_addressonetitle'] ) ){
                                    echo datarc_heading_tag(
                                        array(
                                            'tag'   => 'h6',
                                            'class' => 'text-uppercase mb-15',
                                            'text'  => esc_html( $settings['contact_addressonetitle'] )
                                        )
                                    );
                                }
                                echo datarc_get_textareahtml_output( $settings['contact_addressone'] );
                            echo '</div>';
                        echo '</div>';
                        
                    }
                    if( !empty( $settings['contact_addresstwo'] ) || !empty( $settings['contact_addresstwotitle'] ) ){
                        echo '<div class="col-sm-6">';
                            echo '<div class="address mt-20">';
                                if( !empty( $settings['contact_addresstwotitle'] ) ){
                                    echo datarc_heading_tag(
                                        array(
                                            'tag'   => 'h6',
                                            'class' => 'text-uppercase mb-15',
                                            'text'  => esc_html( $settings['contact_addresstwotitle'] )
                                        )
                                    );
                                }
                                echo datarc_get_textareahtml_output( $settings['contact_addresstwo'] );
                            echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    </div>
                </div>
                <div class="col-lg-6 mt-30">
                    <?php 
                    if( !empty( $settings['contact_formshortcode'] ) ){
                        echo do_shortcode( $settings['contact_formshortcode'] );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php

        }
    
}
