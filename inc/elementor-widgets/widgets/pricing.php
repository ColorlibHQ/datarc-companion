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
 * Datarc elementor pricing table section widget.
 *
 * @since 1.0
 */
class Datarc_Pricing extends Widget_Base {

	public function get_name() {
		return 'datarc-pricing';
	}

	public function get_title() {
		return __( 'Pricing Table', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Pricing table head ------------------------------
        $this->start_controls_section(
            'pricing_tblhead',
            [
                'label' => __( 'Table Heading', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'pricing_title',
            [
                'label' => esc_html__( 'Title', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'pricing_icon',
            [
                'label' => esc_html__( 'Icon', 'datarc-companion' ),
                'type'  => Controls_Manager::ICON,
            ]
        );

        $this->end_controls_section(); // End pricing table head

        // ----------------------------------------  Pricing table price ------------------------------
        $this->start_controls_section(
            'pricing_tblprice',
            [
                'label' => __( 'Price Info', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'pricing_price',
            [
                'label' => esc_html__( 'Price', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'pricing_duration',
            [
                'label' => esc_html__( 'Duration', 'datarc-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section(); // End price

        // ----------------------------------------  Pricing table features ------------------------------
        $this->start_controls_section(
            'pricing_tblfeatures',
            [
                'label' => __( 'Features', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'pricingfeatures', [
                'label' => __( 'Features', 'datarc-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Feature', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '2.5 GB Photos'
                    ]

                ],
            ]
        );

        $this->end_controls_section(); // End features

        // ----------------------------------------  Pricing table Button ------------------------------
        $this->start_controls_section(
            'pricing_tblbutton',
            [
                'label' => __( 'Button', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'pricing_btnlabel',
            [
                'label' => esc_html__( 'Label', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'pricing_btnurl',
            [
                'label' => esc_html__( 'URL', 'datarc-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section(); // End table button



        //------------------------------ Style Table Heading ------------------------------
        $this->start_controls_section(
            'style_tblheading', [
                'label' => __( 'Style Table Heading', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_icon', [
                'label' => __( 'Icon Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .single-pricing-table .top .head span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-pricing-table .top .head h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_pricing', [
                'label' => __( 'Pricing Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .single-pricing-table .top .package .price' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_duration', [
                'label' => __( 'Duration Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-pricing-table .top .package span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_feature', [
                'label' => __( 'Feature Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#777',
                'selectors' => [
                    '{{WRAPPER}} .feature li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_featurebg', [
                'label' => __( 'Feature Background Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-pricing-table .bottom' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

		//------------------------------ Style Button ------------------------------
		$this->start_controls_section(
			'style_button', [
				'label' => __( 'Style Button', 'datarc-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);        
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnborder', [
                'label'     => __( 'Button Border Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovborder', [
                'label'     => __( 'Button Hover Border Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'datarc-companion' ),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .primary-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();

        // ---------------------------------------- Style table heading color ------------------------------
        $this->start_controls_section(
            'style_tblheadingbg',
            [
                'label' => __( 'Heading Background Color', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'styleheadingbgdf',
                'label' => __( 'Background', 'datarc-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-pricing-table .top',
            ]
        );

        $this->end_controls_section(); // End table button

	}

	protected function render() {

    $settings = $this->get_settings();

    $pos = '';
    if( !empty( $settings['featuresvtwo_imgpos'] ) ){
        $pos = 'order-last';
    } 

    ?>
    <div class="single-pricing-table">
        <div class="top">
            <div class="head text-center">
                
                <?php 
                // 
                if( !empty( $settings['pricing_icon'] ) ){
                    echo '<span class="'.esc_attr( $settings['pricing_icon'] ).'"></span><br>';
                }
                // Pricing title
                if( !empty( $settings['pricing_title'] ) ){
                    echo datarc_heading_tag(
                        array(
                            'tag'   => 'h5',
                            'text'  => esc_html( $settings['pricing_title'] ),
                            'class' => 'text-uppercase'
                        )
                    );
                }
                ?>
            </div>
            <div class="package text-center">
                <?php 
                // Price
                if( !empty( $settings['pricing_price'] ) ){
                    echo datarc_other_tag(
                        array(
                            'tag'   => 'div',
                            'text'  => esc_html( $settings['pricing_price'] ),
                            'class' => 'price'
                        )
                    );
                }
                // duration
                if( !empty( $settings['pricing_duration'] ) ){
                    echo datarc_other_tag(
                        array(
                            'tag'   => 'span',
                            'text'  => esc_html( $settings['pricing_duration'] )
                        )
                    );
                }
                ?>

            </div>
        </div>

        <div class="bottom text-center">
            <ul class="feature text-center">
                <?php 
                if( is_array( $settings['pricingfeatures'] ) && count( $settings['pricingfeatures'] ) > 0 ){
                    foreach( $settings['pricingfeatures'] as $feature ){
                        if( !empty( $feature['label'] ) ){
                            echo '<li>'.esc_html( $feature['label'] ).'</li>';
                        }
                    }
                }
                ?>
            </ul>
            <?php 
            if( !empty( $settings['pricing_btnlabel'] ) && !empty( $settings['pricing_btnurl'] ) ){
                echo '<a href="'.esc_url( $settings['pricing_btnurl'] ).'" class="primary-btn text-uppercase d-inline-flex align-items-center">'.esc_html( $settings['pricing_btnlabel'] ).'<span class="lnr lnr-arrow-right"></span></a>';
            }
            ?>
        </div>
    </div>

    <?php

        }
	
}
