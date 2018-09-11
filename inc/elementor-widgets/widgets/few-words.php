<?php
namespace Datarcelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Datarc elementor few words section widget.
 *
 * @since 1.0
 */
class Datarc_Few_Words extends Widget_Base {

	public function get_name() {
		return 'datarc-few-words';
	}

	public function get_title() {
		return __( 'Few Words', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-post-excerpt';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Few Words content ------------------------------
        $this->start_controls_section(
            'fewwords_content',
            [
                'label' => __( 'Few Words', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'fewwords_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'fewwords_title',
            [
                'label' => esc_html__( 'Title', 'datarc-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'fewwords_desc',
            [
                'label' => esc_html__( 'Descriptions', 'datarc-companion' ),
                'type'  => Controls_Manager::WYSIWYG,
            ]
        );
        $this->end_controls_section(); // End few words content

        // ----------------------------------------  Few Words Button ------------------------------
        $this->start_controls_section(
            'fewwords_button',
            [
                'label' => __( 'Button', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'fewwords_btnlabel',
            [
                'label'       => esc_html__( 'Label', 'datarc-companion' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->add_control(
            'fewwords_btnurl',
            [
                'label' => esc_html__( 'Button Url', 'datarc-companion' ),
                'type'  => Controls_Manager::URL,
                'show_external' => false,
            ]
        );
        $this->end_controls_section(); // End speaker info

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .studio-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .studio-content h2',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style sub title ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Style Sub Title', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Sub Title Color', 'datarc-companion' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .studio-content p.subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'     => 'typography_subtitle',
                'selector' => '{{WRAPPER}} .studio-content p.subtitle',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Description ------------------------------
        $this->start_controls_section(
            'style_desc', [
                'label' => __( 'Style Description', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_text', [
                'label'     => __( 'Text Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .studio-content .desc p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_desc',
                'selector'  => '{{WRAPPER}} .studio-content .desc p',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Left side Background ------------------------------
        $this->start_controls_section(
            'style_lsbg', [
                'label' => __( 'Style Left Side Background', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'lsbg',
                'label' => __( 'Background', 'datarc-companion' ),
                'types' => [ 'gradient', 'classic' ],
                'selector' => '{{WRAPPER}} .studio-area:before',
            ]
        );


        $this->end_controls_section();

		//------------------------------ Style Right Side Background ------------------------------
		$this->start_controls_section(
			'style_rsbg', [
				'label' => __( 'Style Right Side Background', 'datarc-companion' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'rsbg',
                'label' => __( 'Background', 'datarc-companion' ),
                'types' => [ 'gradient', 'classic' ],
                'selector' => '{{WRAPPER}} .studio-area:after',
            ]
        );

		$this->end_controls_section();


        //------------------------------ Style Button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btntext', [
                'label' => __( 'Button Text Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .studio-content .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovtext', [
                'label' => __( 'Button Hover Text Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .studio-content .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label' => __( 'Button background Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .studio-content .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label' => __( 'Button Hover background Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .studio-content .primary-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbord', [
                'label' => __( 'Button border Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .studio-content .primary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbord', [
                'label' => __( 'Button Hover border Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .studio-content .primary-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_btn',
                'selector' => '{{WRAPPER}} .studio-content .primary-btn',
            ]
        );

        $this->end_controls_section();



	}

	protected function render() {

    $settings = $this->get_settings();
    // Content Position
    $pos = 'order-1';
    if( !empty( $settings['fewwords_contentpos'] ) ){
        $pos = '';
    } 
    // Background Image
    $bg = '';
    if( !empty( $settings['image_bg']['url'] )){
        $bg = $settings['image_bg']['url'];
    } 

    ?>

    <section class="section-full studio-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="studio-content">
                        <?php 
                        // Sub title
                        if( !empty( $settings['fewwords_subtitle'] ) ){
                            echo datarc_paragraph_tag(
                                array(
                                    'text'  => esc_html( $settings['fewwords_subtitle'] ),
                                    'class' => 'subtitle'
                                )
                            );
                        } 
                        // Title
                        if( !empty( $settings['fewwords_title'] ) ){
                            echo datarc_heading_tag(
                                array(
                                    'tag'   => 'h2',
                                    'class' => 'h1 mb-20',
                                    'text'  => esc_html( $settings['fewwords_title'] )
                                )
                            );
                        }
                        ?>
                        <div class="desc mb-30">
                            <?php
                            if( !empty( $settings['fewwords_desc'] ) ){
                                echo datarc_get_textareahtml_output( $settings['fewwords_desc'] );
                            }
                            ?>
                        </div>
                        <?php 
                        if( !empty( $settings['fewwords_btnlabel'] ) && !empty( $settings['fewwords_btnurl']['url'] ) ){
                            echo '<a href="'.esc_url( $settings['fewwords_btnurl']['url'] ).'" class="primary-btn d-inline-flex align-items-center">'.esc_html( $settings['fewwords_btnlabel'] ).'<span class="lnr lnr-arrow-right"></span></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

        }
	
}
