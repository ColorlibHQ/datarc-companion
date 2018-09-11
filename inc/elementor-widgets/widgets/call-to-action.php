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
 * Datarc elementor call to action widget.
 *
 * @since 1.0
 */
class Datarc_Cat extends Widget_Base {

	public function get_name() {
		return 'datarc-cta';
	}

	public function get_title() {
		return __( 'Call to action', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'Call to action content', 'datarc-companion' ),
			]
		);
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Are you Ready to have a Talk?', 'datarc-companion' )
            ]
        );
		$this->end_controls_section(); // End service content

    // ----------------------------------------  Button ------------------------------
        $this->start_controls_section(
            'ctc_btn',
            [
                'label' => __( 'Button', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'btnlabel', [
                'label' => __( 'Button Label', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'btnurl', [
                'label' => __( 'Button Url', 'datarc-companion' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $this->end_controls_section(); // End button content



        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-area h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .cta-area h5',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .cta-area h5',
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
                    '{{WRAPPER}} .cta-area .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovtext', [
                'label' => __( 'Button Hover Text Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-area .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label' => __( 'Button background Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-area .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label' => __( 'Button Hover background Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-area .primary-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbord', [
                'label' => __( 'Button border Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-area .primary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'color_btnhovbord', [
				'label' => __( 'Button Hover border Color', 'datarc-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-area .primary-btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_btn',
				'selector' => '{{WRAPPER}} .cta-area .primary-btn',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    // Overlay
    $overlay = '';
    if( !empty( $settings['cta_bgoverlay'] ) ){
        $overlay = 'bg-overlay';
    }
    // Background Image
    $bgUrl = '';
    if( !empty( $settings['cta_bg_image']['url'] ) ){
        $bgUrl = $settings['cta_bg_image']['url']; 
    }

    // Background style
    $bgstyle = '';
    if( !empty( $settings['style_bg'] ) && 'style_01' != $settings['style_bg'] ){
        $bgstyle = ' bg-fixed';
    }

    ?>

    <section class="cta-area" <?php echo datarc_inline_bg_img( esc_url( $bgUrl ) ); ?>>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 d-flex no-flex-xs justify-content-between align-items-center">
                    <?php 
                    // Title
                    if( !empty( $settings['title'] )){
                        echo datarc_heading_tag(
                            array(
                                'tag'   => 'h5',
                                'class' => 'text-uppercase',
                                'text'  => esc_html( $settings['title'] )
                            )
                        );
                    } 
                    // Button
                    if( !empty( $settings['btnlabel'] ) && !empty( $settings['btnurl']['url'] ) ){
                        $target = '';
                        if( !empty( $settings['btnurl']['is_external'] ) ){
                            $target = '_blank';
                        }
                        echo datarc_anchor_tag(
                            array(
                                'url'           => esc_url( $settings['btnurl']['url'] ),
                                'text'          => esc_html( $settings['btnlabel'] ).'<span class="lnr lnr-arrow-right"></span>',
                                'class'         => 'primary-btn d-inline-flex text-uppercase align-items-center',
                                'target'        => esc_attr( $target ),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php

        }
	
}
