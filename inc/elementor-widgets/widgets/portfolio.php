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
            'itemsnumber',
            [
                'label' => esc_html__( 'Items per section', 'datarc-companion' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true
            ]
        );
        $this->add_control(
            'loadbtnswitch',
            [
                'label' => esc_html__( 'Load More Button', 'datarc-companion' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );
		$this->end_controls_section(); // End portfolio content

        // ----------------------------------------  Portfolio Content ------------------------------

        $this->start_controls_section(
            'portfolios',
            [
                'label' => __( 'Portfolio', 'datarc-companion' ),
            ]
        );

        $this->add_control(
            'portfolios_rept', [
                'label'         => __( 'Create Portfolios', 'datarc-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields' => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Tag', 'datarc-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Web Template', 'datarc-companion' )
                    ],
                    [
                        'name'        => 'title',
                        'label'       => __( 'Title', 'datarc-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'DFR Corp. Branding', 'datarc-companion' )
                    ],
                    [
                        'name'        => 'sub-title',
                        'label'       => __( 'Sub Title', 'datarc-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Brand Identity', 'datarc-companion' )
                    ],
                    [
                        'name'        => 'img',
                        'label'       => __( 'Image', 'datarc-companion' ),
                        'type'        => Controls_Manager::MEDIA
                    ]
                ],
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

    $portfoliosItems = $settings['portfolios_rept']; 

    // Total items count
    $totalItems = count( $portfoliosItems );

    // localize
    wp_localize_script(
        'datarc-loadmore-script',
        'portfolioloadajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'postNumber' => esc_html( $settings['itemsnumber'] ),
            'elsettings' => $portfoliosItems,
            'totalitems' => $totalItems
        )
    );

    ?>
    <section id="protfolio" class="section-full">
        <div class="container">
            <?php 

            datarc_section_heading( $title, $subtitle );
          
            
            // Filter
            if( is_array( $portfoliosItems ) && $totalItems > 0 ):
            ?>
            <div class="controls d-flex flex-wrap justify-content-center">
                    <a class="filter active" data-filter="all"><?php esc_html_e( 'All', 'datarc-companion' ); ?></a>


                    <?php 
                    $tags = array_column( $portfoliosItems, 'label' );

                    $getTags = array_unique( $tags );

                    $tabs = '';
                    foreach( $getTags as $tag ) {

                        $tagforfilter = sanitize_title_with_dashes( $tag );

                        $tabs .= '<a class="filter" data-filter=".'.esc_attr( $tagforfilter ).'">'.esc_html( $tag ).'</a>';
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
          
            if( !empty( $portfoliosItems ) ):
                $i = 0;
                foreach( $portfoliosItems as $val ):

                $tagclass = sanitize_title_with_dashes( $val['label'] );
                $i++;
         
                $imgUrl = !empty( $val['img']['url'] ) ? $val['img']['url'] : '';

            ?>
            <div class="mix <?php echo esc_attr( $tagclass ); ?> col-lg-3 col-md-4 col-sm-6 single-filter-content content-1" data-myorder="1" style="background-image: url( <?php echo esc_url( $imgUrl ); ?> )">
                <div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
                    <?php 
                    if( !empty( $val['sub-title'] ) ){
                        echo datarc_paragraph_tag(
                            array(
                                'text' => esc_html( $val['sub-title'] )
                            )
                        );
                    }
                    ?>
                    <div class="line"></div>
                    <?php 
                    if( !empty( $val['title'] ) ){
                        echo datarc_heading_tag(
                            array(
                                'tag'    => 'h5',
                                'class'  => 'text-uppercase',
                                'text'   => esc_html( $val['title'] )
                            )
                        );
                    }
                    ?>
                </div>
            </div>
            <?php
                if( !empty( $settings['itemsnumber'] ) ){

                    if( $i == $settings['itemsnumber'] ){
                        break;
                    }
                }
                    endforeach;
                endif;
            ?>
            <spn class="datarc-portfolio-load"></spn>
        </div>
            <?php 
            if( !empty( $settings['loadbtnswitch'] ) && $totalItems > $settings['itemsnumber']  ):
            ?>
            <div class="col-12 text-center mt-100">
                <a href="#" class="btn loadAjax datarc-btn primary-btn"><?php esc_html_e( 'Load More', 'datarc-companion' ); ?></a>
            </div>
            <?php 
            endif;
            ?>
    </section>
    <?php

    }
	
}
