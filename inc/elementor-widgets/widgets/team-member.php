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
 * Datarc elementor Team Member section widget.
 *
 * @since 1.0
 */
class Datarc_Team_Member extends Widget_Base {

	public function get_name() {
		return 'datarc-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => __( 'Team Section Top', 'datarc-companion' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'datarc-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'datarc-companion' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => __( 'Create Team Member', 'datarc-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'datarc-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'fburl',
                        'label' => __( 'Facebook Url', 'datarc-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'twiturl',
                        'label' => __( 'Twitter Url', 'datarc-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'pinturl',
                        'label' => __( 'Pinterest Url', 'datarc-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'driburl',
                        'label' => __( 'Dribbble Url', 'datarc-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content

    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
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
				'selectors' => [
					'{{WRAPPER}} .product-area-title h2.h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_title',
				'selector' => '{{WRAPPER}} .product-area-title h2.h1',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_title',
				'selector' => '{{WRAPPER}} .product-area-title h2.h1',
			]
		);
		$this->end_controls_section();


        //------------------------------ Style Sub Title ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Style Sub Title', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-area-title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'selector' => '{{WRAPPER}} .product-area-title p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_subtitle',
                'selector' => '{{WRAPPER}} .product-area-title p',
            ]
        );
        $this->end_controls_section();


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'datarc-companion' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => __( 'Member Image Hover Color', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'memberimghoverbg',
                'label' => __( 'Background', 'datarc-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-member .thumb .overlay-member',
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-member .desc h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .single-member .desc h5',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-member .desc p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .single-member .desc p',
            ]
        );

        //
        $this->add_control(
            'team_discopt',
            [
                'label' => __( 'Description Style', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_discopt', [
                'label' => __( 'Description Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-member .overlay-member p' => 'color: {{VALUE}};',
                ],
            ]
        );

        //
        $this->add_control(
            'team_iconopt',
            [
                'label' => __( 'Icon Style', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_iconopt', [
                'label' => __( 'Icon Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-member .thumb .overlay-member .social a' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'color_iconhovopt', [
				'label' => __( 'Icon Hover Color', 'datarc-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-member .thumb .overlay-member .social a:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'typography_iconopt',
            [
                'label' => __( 'Icon Font Size', 'datarc-companion' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 14,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-member .thumb .overlay-member .social a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section id="team" class="pb-150">
        <div class="container">
            <?php 
            // Section Heading
            datarc_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row">

                <?php 
                if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ):
                    foreach( $settings['teamslider'] as $team ):
 
                // Member Picture
                $bgUrl = '';
                if( !empty( $team['img']['url'] ) ){
                    $bgUrl = $team['img']['url'];
                }
                            

                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-member">
                        <div class="thumb relative" <?php echo datarc_inline_bg_img( esc_url( $bgUrl ) ); ?>>
                            <div class="overlay overlay-member d-flex flex-column justify-content-end align-items-center">
                                <?php 
                                // Description
                                if( !empty( $team['desc'] ) ){
                                    echo datarc_paragraph_tag(
                                        array(
                                            'text'  => esc_html( $team['desc'] ),
                                        )
                                    );
                                }
                                ?>
                                <div class="line"></div>
                                <?php 
                                if( !empty( $team['pinturl']['url'] ) || $team['fburl']['url'] || $team['twiturl']['url'] || $team['driburl']['url']  ):
                                ?>
                                <div class="social d-flex align-items-center justify-content-center">
                                    <?php 
                                    // Facebook Social Icon
                                    if( !empty( $team['fburl']['url'] ) ){
                                        echo '<a href="'.esc_url( $team['fburl']['url'] ).'"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
                                    }
                                    // Twitter Social Icon
                                    if( !empty( $team['twiturl']['url'] ) ){
                                        echo '<a href="'.esc_url( $team['twiturl']['url'] ).'"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
                                    }
                                    // Pinterest Social Icon
                                    if( !empty( $team['pinturl']['url'] ) ){

                                        echo '<a href="'.esc_url( $team['pinturl']['url'] ).'"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
                                    }
                                    // Dribbble Social Icon
                                    if( !empty( $team['driburl']['url'] ) ){
                                        echo '<a href="'.esc_url( $team['driburl']['url'] ).'"><i class="fa fa-dribbble" aria-hidden="true"></i></a>';
                                    }
                                    ?>
                                    
                                </div>
                                <?php 
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="desc text-center">
                            <?php 
                            // Member Name
                            if( !empty( $team['label'] ) ){
                                echo datarc_heading_tag(
                                    array(
                                        'tag'  => 'h5',
                                        'class' => 'text-uppercase',
                                        'text' => esc_html( $team['label'] )
                                    )
                                );
                            }
                            // Designation
                            if( !empty( $team['desig'] ) ){
                                echo datarc_paragraph_tag(
                                    array(
                                        'text' => esc_html( $team['desig'] )
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
