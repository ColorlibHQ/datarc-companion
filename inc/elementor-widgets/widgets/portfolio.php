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
 * elementor portfolio section widget.
 *
 * @since 1.0
 */
class Datarc_Portfolio extends Widget_Base {

	public function get_name() {
		return 'datarc-portfolio';
	}

	public function get_title() {
		return __( 'Portfolio', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  portfolio settings ------------------------------
		$this->start_controls_section(
			'portfolio_content',
			[
				'label' => __( 'Portfolio Settings', 'datarc-companion' ),
			]
		);
        $this->add_control(
            'subtitle',
            [
                'label'         => esc_html__( 'Sub Title', 'datarc-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'OUR WORK', 'datarc-companion' )
            ]
        );
        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'datarc-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'See our Online Portfolio', 'datarc-companion' )
            ]
        );
        $this->add_control(
            'limit',
            [
                'label'         => esc_html__( 'Portfolio Limit', 'datarc-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 4
            ]
        );
		$this->end_controls_section(); // End portfolio content


        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .product-area-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .product-area-title h2',
            ]
        );

        $this->end_controls_section();

		//------------------------------ Style Sub Title ------------------------------
		$this->start_controls_section(
			'style_subtitle', [
				'label' => __( 'Style Sub Title', 'datarc-companion' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_subtitle', [
				'label'     => __( 'Text Color', 'datarc-companion' ),
				'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
				'selectors' => [
					'{{WRAPPER}} .product-area-title p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'typography_subtitle',
				'selector' => '{{WRAPPER}} .product-area-title p',
			]
		);

		$this->end_controls_section();


        //------------------------------ Style Image Hover ------------------------------
        $this->start_controls_section(
            'portfolio_imghover', [
                'label' => __( 'Style Portfolio Hover', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'      => 'portfolioimghoverbg',
                'label'     => __( 'Background', 'datarc-companion' ),
                'types'     => [ 'gradient' ],
                'selector'  => '{{WRAPPER}} .single-filter-content .overlay-bg-content',
            ]
        );
        $this->add_control(
            'portfolio_overlaytextcolor', [
                'label'     => __( 'Hover Text Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-filter-content .overlay p'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-filter-content .overlay h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Tab  ------------------------------
        $this->start_controls_section(
            'style_tab', [
                'label' => __( 'Style Tab', 'datarc-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_tab', [
                'label'     => __( 'Tab Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .controls a.filter' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_tabhover', [
                'label'     => __( 'Tab Hover Color', 'datarc-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .controls a.filter.active'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .controls .filter:hover'    => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();


   $title = $subtitle = '';
    // Title

    if( !empty( $settings['title'] ) ){
        $title = $settings['title'];
    }
    // Sub title
    if( !empty( $settings['subtitle'] ) ){
        $subtitle = $settings['subtitle'];
    }

        echo do_shortcode( '[datarcfolio title="'.esc_html( $title ).'" subtitle="'.esc_html( $subtitle ).'" limit="'.esc_attr( $settings['limit'] ).'"]' );

    }
	
}
