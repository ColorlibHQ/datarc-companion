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
 * Datarc elementor about us section widget.
 *
 * @since 1.0
 */
class Datarc_Banner extends Widget_Base {

	public function get_name() {
		return 'datarc-banner';
	}

	public function get_title() {
		return __( 'Banner', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-youtube';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_content',
            [
                'label' => __( 'Banner Section Content', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'banner_titleone',
            [
                'label'         => esc_html__( 'Title #1', 'datarc-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_titletwo',
            [
                'label'         => esc_html__( 'Title #2', 'datarc-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'datarc-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Explore Us', 'datarc-companion' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'datarc-companion' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content


        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_textcolor', [
                'label' => __( 'Style Content', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titleone', [
                'label'     => __( 'Title #1 Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_titleone',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
                'selector'  => '{{WRAPPER}} .banner-content p',
            ]
        );
        $this->add_control(
            'color_titletwo', [
                'label'     => __( 'Title #2 Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner-content h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_titletwo',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
                'selector'  => '{{WRAPPER}} .banner-content h1',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'          => 'banneroverlay',
                'label'         => __( 'Overlay Background', 'datarc-companion' ),
                'separator'     => 'before',
                'description'   => esc_html__( 'Set banner overlay background color.', 'datarc-companion' ),
                'types'         => [ 'gradient' ],
                'selector'      => '{{WRAPPER}} .banner-area .overlay-bg',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.banner-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.banner-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnborder', [
                'label'     => __( 'Button Border Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.banner-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovborder', [
                'label'     => __( 'Button Hover Border Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.banner-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'datarc-companion' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '#fff',
                'selectors'   => [
                    '{{WRAPPER}} .primary-btn.banner-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn.banner-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen justify-content-center align-items-center">
                <div class="col-lg-8">
                    <div class="banner-content text-center">
                        <?php 
                        // Text one
                        if( !empty( $settings['banner_titleone'] ) ){
                            echo datarc_paragraph_tag(
                                array(
                                    'text'  => esc_html( $settings['banner_titleone'] )
                                )
                            );
                        }
                        // Text two
                        if( !empty( $settings['banner_titletwo'] ) ){
                            echo datarc_heading_tag(
                                array(
                                    'tag'  => 'h1',
                                    'text' => esc_html( $settings['banner_titletwo'] ),

                                )
                            );
                        }
                        //
                        if( !empty( $settings['banner_btnlabel'] ) && !empty( $settings['banner_btnurl']['url'] ) ){
                            echo datarc_anchor_tag(
                                array(
                                    'text'  => esc_html( $settings['banner_btnlabel'] ),
                                    'url'   => esc_url( $settings['banner_btnurl']['url'] ),
                                    'class' => 'primary-btn banner-btn'
                                )
                            );
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
