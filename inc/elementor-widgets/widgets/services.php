<?php
namespace Datarcelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



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
class Datarc_Services extends Widget_Base {

	public function get_name() {
		return 'datarc-services';
	}

	public function get_title() {
		return __( 'Services', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'featuresvtwo_content',
            [
                'label' => __( 'Services', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'services_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->add_control(
            'services_title',
            [
                'label' => esc_html__( 'Title', 'datarc-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->add_control(
            'services', [
                'label' => __( 'Create Services', 'datarc-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '01.'
                    ],
                    [
                        'name' => 'icontype',
                        'label' => __( 'Icon Type', 'datarc-companion' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'img',
                        'options' => [
                            'img'  => __( 'Image Icon', 'datarc-companion' ),
                            'icon' => __( 'Font Icon', 'datarc-companion' ),
                        ],
                    ],
                    [
                        'name' => 'fonticon',
                        'label' => __( 'Font Icon', 'datarc-companion' ),
                        'type' => Controls_Manager::ICON,
                        'condition' => [
                            'icontype' => 'icon'
                        ]
                    ],
                    [
                        'name' => 'iconimg',
                        'label' => __( 'Image Icon', 'datarc-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'condition' => [
                            'icontype' => 'img'
                        ]
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End content



        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title h2.h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .product-area-title h2.h1',
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
                'label'     => __( 'Sub Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_subtitle',
                'selector'  => '{{WRAPPER}} .product-area-title p',
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Services ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Services', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Service Title ', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-product .desc h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        //
        $this->add_control(
            'features_fonticon_heading',
            [
                'label'     => __( 'Style Font Icon', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_fonticon', [
                'label'     => __( 'Font Icon Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-product .icon .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fontsize',
            [
                'label' => __( 'Icon Font Size', 'datarc-companion' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'  => [
                    'unit' => 'px',
                    'size' => 48,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-product .icon .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'      => 'text_shadow_fonticon',
                'selector'  => '{{WRAPPER}} .single-product .icon .fa',
            ]
        );

        //
        $this->add_control(
            'features_desc_heading',
            [
                'label'     => __( 'Style Descriptions', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-product .desc p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //------------------------------ Style Hover Services ------------------------------
        $this->start_controls_section(
            'style_hovservices', [
                'label' => __( 'Style Hover Services', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hovservices_title_heading',
            [
                'label'     => __( 'Style Hover Service Title ', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_hovservicestitle', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-product:hover .desc h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        //
        $this->add_control(
            'hovservices_fonticon_heading',
            [
                'label'     => __( 'Style Hover Font Icon', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_hovservicesfonticon', [
                'label'     => __( 'Font Icon Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-product:hover .icon .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'hovservices_desc_heading',
            [
                'label'     => __( 'Style Hover Descriptions', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_hovservicesdesc', [
                'label'     => __( 'Descriptions Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-product:hover .desc p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

		//------------------------------ Style Services Box ------------------------------
		$this->start_controls_section(
			'style_servicesbox', [
				'label' => __( 'Style Services Box', 'datarc-companion' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'servicesbox_bgcolor',
            [
                'label'     => __( 'Style Service Box Background Color', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'servicesboxbgclor',
                'label' => __( 'Background', 'datarc-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-product',
            ]
        );
        $this->add_control(
            'servicesbox_bghovercolor',
            [
                'label'     => __( 'Style Hover Service Box Background Color ', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'servicesboxhovbgclor',
                'label' => __( 'Background', 'datarc-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-product:hover',
            ]
        );

        $this->add_control(
            'servicesbox_bordercolor',
            [
                'label'     => __( 'Style Service Box Border Color ', 'datarc-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'servicesboxborder',
                'label' => __( 'Border', 'datarc-companion' ),
                'selector' => '{{WRAPPER}} .single-product',
            ]
        );
		$this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    $pos = '';
    if( !empty( $settings['featuresvtwo_imgpos'] ) ){
        $pos = 'order-last';
    } 



    ?>
    <section id="services" class="section-full">
        <div class="container">
            <?php 
            // Section Heading
            datarc_section_heading( $settings['services_title'], $settings['services_subtitle'] );
            ?>
            <div class="row">
                <?php 
                if( is_array( $settings['services'] ) && count( $settings['services'] ) > 0 ):
                    foreach( $settings['services'] as $services ):
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-product">
                        <?php 
                        if( !empty( $services['icontype'] ) ){
                            echo '<div class="icon">';
                            if( $services['icontype'] != 'img' && !empty( $services['fonticon'] ) ){
                                //<span class="lnr lnr-star"></span>
                                echo '<i class="'.esc_attr( $services['fonticon'] ).'"></i>';
                            }else{
                                if( !empty( $services['iconimg']['url'] ) ){
                                    echo datarc_img_tag(
                                        array(
                                            'url' =>  esc_url( $services['iconimg']['url'] )
                                        )
                                    );
                                }
                            } 
                            echo '</div>';
                        }
                        ?>                        
                        <div class="desc">
                            <?php 
                            // Title
                            if( !empty( $services['label'] ) ){
                                echo datarc_heading_tag(
                                    array(
                                        'tag' => 'h4',
                                        'text' => esc_html( $services['label'] ) 
                                    )
                                );
                            }
                            // Description
                            if( !empty( $services['desc'] ) ){
                                echo datarc_paragraph_tag(
                                    array(
                                        'text' => esc_html( $services['desc'] )
                                    )
                                );
                            }
                            ?>
                        </div>
                    </div>
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
