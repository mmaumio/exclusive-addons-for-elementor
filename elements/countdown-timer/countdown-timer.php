<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Exad_Countdown_Timer extends Widget_Base {

	public function get_name() {
		return 'exad-countdown-timer';
	}

	public function get_title() {
		return esc_html__( 'Countdown Timer', 'exclusive-addons-elementor' );
	}

	public function get_icon() {
		return 'exad-element-icon eicon-countdown';
	}

	public function get_keywords() {
        return [ 'down', 'decrease', 'counter down', 'count down' ];
    }

	public function get_categories() {
		return [ 'exclusive-addons-elementor' ];
	}

	public function get_script_depends() {
		return [ 'exad-countdown' ];
	}

	protected function _register_controls() {

		/**
		 * Countdown Timer Settings
		 */
		$this->start_controls_section(
  			'exad_section_countdown_settings_general',
  			[
  				'label' => esc_html__( 'Timer Settings', 'exclusive-addons-elementor' )
  			]
  		);
		
		$this->add_control(
			'exad_countdown_time',
			[
				'label'       => esc_html__( 'Countdown Date', 'exclusive-addons-elementor' ),
				'type'        => Controls_Manager::DATE_TIME,
				'default'     => date("Y/m/d", strtotime("+ 1 week")),
				'description' => esc_html__( 'Set the date and time here', 'exclusive-addons-elementor' )
			]
		);

		$this->end_controls_section();

		$this->end_controls_section();

		$this->start_controls_section(
			'exad_section_countdown_container_style',
			[
				'label' => esc_html__( 'Container', 'exclusive-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'exad_countdown_container_bg_color',
			[
				'label'     => __( 'Background Color', 'exclusive-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#7a56ff',
				'selectors' => [
					'{{WRAPPER}} .exad-countdown' => 'background: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'exad_countdown_border',
				'label'    => __( 'Border', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .exad-countdown'
			]
		);

		$this->add_responsive_control(
			'exad_countdown_container_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'exclusive-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => [
					'top'    => 0,
					'right'  => 0,
					'bottom' => 0,
					'left'   => 0,
					'unit'   => 'px'
				],
				'selectors'  => [
					'{{WRAPPER}} .exad-countdown' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'exad_section_countdown_box_style',
			[
				'label' => esc_html__( 'Counter Box', 'exclusive-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'exad_countdown_background',
				'label'    => __( 'Background', 'exclusive-addons-elementor' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .exad-countdown .exad-countdown-container'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => __( 'Box Shadow', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .exad-countdown-container'
			]
		);

		$this->add_control(
			'exad_before_border',
			[
				'type'  => Controls_Manager::DIVIDER,
				'style' => 'thin'
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'label'    => __( 'Border', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .exad-countdown .exad-countdown-container'
			]
		);

		$this->add_responsive_control(
			'exad_countdown_box_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'exclusive-addons-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'default'    => [
					'top'    => 4,
					'right'  => 4,
					'bottom' => 4,
					'left'   => 4,
					'unit'   => 'px'
				],
				'selectors'  => [
					'{{WRAPPER}} .exad-countdown .exad-countdown-container' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'exad_section_countdown_divider_style',
			[
				'label' => esc_html__( 'Divider', 'exclusive-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'exad_countdown_divider_enable',
			[
				'label'        => __( 'Enable Divider', 'plugin-domain' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'On', 'exclusive-addons-elementor' ),
				'label_off'    => __( 'Off', 'exclusive-addons-elementor' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_control(
			'exad_countdown_divider_color',
			[
				'label'     => __( 'Divider Color', 'exclusive-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .exad-countdown .exad-countdown-count::after' => 'color: {{VALUE}};'
				],
				'condition' => [
					'exad_countdown_divider_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'exad_countdown_divider_size',
			[
				'label'      => __( 'Size', 'plugin-domain' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px'       => [
						'min'  => 50,
						'max'  => 150,
						'step' => 5
					],
					'%'        => [
						'min'  => 0,
						'max'  => 100
					]
				],
				'default'    => [
					'unit'   => 'px',
					'size'   => 80
				],
				'selectors'  => [
					'{{WRAPPER}} .exad-countdown.exad-countdown-divider .exad-countdown-count::after' => 'font-size: {{SIZE}}{{UNIT}};'
				],
				'condition'  => [
					'exad_countdown_divider_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();
		
		// Counter Styles
		$this->start_controls_section(
			'exad_section_countdown_styles_counter',
			[
				'label' => esc_html__( 'Counter', 'exclusive-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'counter_typography',
				'selector' => '{{WRAPPER}} .exad-countdown-count'
			]
		);

		$this->add_control(
			'exad_countdown_number_color',
			[
				'label'     => __( 'Color', 'exclusive-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .exad-countdown-count' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
            'exad_countdown_number_margin',
            [
                'label'      => esc_html__( 'Margin', 'exclusive-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],                
                'selectors'  => [
                    '{{WRAPPER}} .exad-countdown-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
		
		$this->end_controls_section();
		
		// Title Styles
		$this->start_controls_section(
			'exad_countdown_styles_title',
			[
				'label' => esc_html__( 'Title', 'exclusive-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'exad_countdown_title_typography',
					'selector' => '{{WRAPPER}} .exad-countdown-title'
				]
		);

		$this->add_control(
			'exad_countdown_title_color',
			[
				'label'     => __( 'Color', 'exclusive-addons-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .exad-countdown-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
            'exad_countdown_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'exclusive-addons-elementor' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],                
                'selectors'  => [
                    '{{WRAPPER}} .exad-countdown-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
		
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute(
			'exad-countdown-timer-attribute',
			[
				'class'          => [ 'exad-countdown' ],
				'data-day'       => esc_attr__( 'Days', 'exclusive-addons-elementor' ),
				'data-minutes'   => esc_attr__( 'Minutes', 'exclusive-addons-elementor' ),
				'data-hours'     => esc_attr__( 'Hours', 'exclusive-addons-elementor' ),
				'data-seconds'   => esc_attr__( 'Seconds', 'exclusive-addons-elementor' ),
				'data-countdown' => esc_attr( $settings['exad_countdown_time'] )
			]
		);
		
		if ( 'yes' === $settings['exad_countdown_divider_enable'] ) {
			$this->add_render_attribute(
				'exad-countdown-timer-attribute',
				[
					'class' => [ 'exad-countdown-divider' ]
				]
			);
		}

		?>

		<div class="exad-countdown-content-container">
			<div <?php echo $this->get_render_attribute_string('exad-countdown-timer-attribute') ?>></div>
		</div>
		<?php
	}

	protected function _content_template() {
	?>
		<#
		view.addRenderAttribute( 'exad_countdown_timer_attribute', 'class', 'exad-countdown' );
		if ( 'yes' === settings.exad_countdown_divider_enable ) {
			view.addRenderAttribute( 'exad_countdown_timer_attribute', 'class', 'exad-countdown-divider' );
		}
		#>
		<div class="exad-countdown-content-container">
			<div {{{ view.getRenderAttributeString( 'exad_countdown_timer_attribute' ) }}} data-day="Days" data-minutes="Minutes" data-hours="Hours" data-seconds="Seconds" data-countdown="{{ settings.exad_countdown_time }}"></div>
		</div>
	<?php
	}

}
