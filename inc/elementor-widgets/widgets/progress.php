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
 * Datarc elementor Team Member section widget.
 *
 * @since 1.0
 */
class Datarc_Progress extends Widget_Base {

	public function get_name() {
		return 'datarc-progress';
	}

	public function get_title() {
		return __( 'Progress', 'datarc-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'datarc-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Progress bar content ------------------------------
		$this->start_controls_section(
			'progress_memcontent',
			[
				'label' => __( 'Progress Bar', 'datarc-companion' ),
			]
		);
		$this->add_control(
            'progressbar', [
                'label' => __( 'Create Progress Bar', 'datarc-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'WEB DESIGN'
                    ],
                    [
                        'name' => 'percentage',
                        'label' => __( 'Percentage', 'datarc-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End progress bar content

 
        //------------------------------ Style progress Content ------------------------------
        $this->start_controls_section(
            'style_progress', [
                'label' => __( 'Style Progress Bar Info', 'datarc-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'progressbar_border',
            [
                'label' => __( 'Progress Bar Border Color', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_pbborder', [
                'label' => __( 'Border Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progressBar-background' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'progressbar_pbactborder',
            [
                'label' => __( 'Progress Bar Active Border Color', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'color_activeborder', [
                'label' => __( 'Active Border Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progressBar-circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'progressbar_percentage',
            [
                'label' => __( 'Percentage Style', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_percentage', [
                'label' => __( 'Percentage Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .progressBar-percentage' => 'color: {{VALUE}};',
                ],
            ]
        );

        //
        $this->add_control(
            'progressbar_title',
            [
                'label' => __( 'Title Style', 'datarc-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'datarc-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .list p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <div class="container">
        <div class="row">

            <?php 
            if( is_array( $settings['progressbar'] ) && count( $settings['progressbar'] ) > 0 ):
                foreach( $settings['progressbar'] as $progressbar ):                       

            ?>
            <div class="col-lg-3 col-sm-6 d-flex justify-content-center">
                <div class="list text-center">
                    <div class="list-item">
                        <div class="progressBar progressBar--animateNone" data-progress="<?php echo ( !empty( $progressbar['percentage'] ) ) ? esc_attr( $progressbar['percentage'] ) : '';  ?>">
                            <svg class="progressBar-contentCircle"  viewBox="0 0 200 200">
                                <circle transform="rotate(-90, 100, 100)" class="progressBar-background" cx="100" cy="100" r="95" />
                                <circle transform="rotate(-90, 100, 100)" class="progressBar-circle" cx="100" cy="100" r="95" />
                            </svg>
                            <span class="progressBar-percentage progressBar-percentage-count"></span>
                        </div>
                    </div>
                    <?php 
                    if( !empty( $progressbar['label'] ) ){
                        echo datarc_paragraph_tag(
                            array(
                                'text'  => esc_html( $progressbar['label'] ),
                                'class' => 'text-uppercase'
                            )
                        );
                    }
                    ?>
                </div>
            </div>
            <?php
                endforeach; 
            endif;
            ?>

        </div>
    </div>

    <?php

    }
	
}
