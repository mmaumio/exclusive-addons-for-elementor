<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Exad_Exclusive_Button extends Widget_Base {
	

	public function get_name() {
		return 'exad-exclusive-button';
	}

	public function get_title() {
		return esc_html__( 'DC Exclusive Button', 'exclusive-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

   public function get_categories() {
		return [ 'exclusive-addons-elementor' ];
	}


	protected function _register_controls() {

		// Content Controls
		$this->start_controls_section(
			'exad_section_exclusive_button_content',
			[
				'label' => esc_html__( 'Button Content', 'exclusive-addons-elementor' )
			]
		);

			$this->start_controls_tabs( 'exad_exclusive_button_content_separation' );

				$this->start_controls_tab(
					'button_primary_settings',
					[
						'label'	=> __( 'Primary', 'exclusive-addons-elementor' ),
					]
				);

				$this->add_control(
					'exclusive_button_text',
					[
						'label' => __( 'Button Text', 'exclusive-addons-elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Click Me!',
						'placeholder' => __( 'Enter button text', 'exclusive-addons-elementor' ),
						'title' => __( 'Enter button text here', 'exclusive-addons-elementor' ),
					]
				);

				$this->add_control(
					'exad_exclusive_button_icon',
					[
						'label' => esc_html__( 'Icon', 'exclusive-addons-elementor' ),
						'type' => Controls_Manager::ICON,
						'default' => 'fa fa-download'
					]
				);
		
				$this->add_control(
					'exad_exclusive_button_icon_alignment',
					[
						'label' => esc_html__( 'Icon Position', 'exclusive-addons-elementor' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'left',
						'options' => [
							'left' => esc_html__( 'Before', 'exclusive-addons-elementor' ),
							'right' => esc_html__( 'After', 'exclusive-addons-elementor' ),
						],
						'condition' => [
							'exad_exclusive_button_icon!' => '',
						],
					]
				);
				
		
				$this->add_control(
					'exad_exclusive_button_icon_indent',
					[
						'label' => esc_html__( 'Icon Spacing', 'exclusive-addons-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'max' => 60,
							],
						],
						'condition' => [
							'exad_exclusive_button_icon!' => '',
						],
						'selectors' => [
							'{{WRAPPER}} .exad-exclusive-button-icon-right' => 'margin-left: {{SIZE}}px;',
							'{{WRAPPER}} .exad-exclusive-button-icon-left' => 'margin-right: {{SIZE}}px;',
							'{{WRAPPER}} .exad-exclusive-button--shikoba i' => 'left: -{{SIZE}}px;',
						],
					]
				);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'button_secondary_settings',
					[
						'label'	=> __( 'Secondary', 'exclusive-addons-elementor' ),
					]
				);

				$this->add_control(
					'exclusive_button_secondary_text',
					[
						'label' => __( 'Button Secondary Text', 'exclusive-addons-elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Go!',
						'placeholder' => __( 'Enter button secondary text', 'exclusive-addons-elementor' ),
						'title' => __( 'Enter button secondary text here', 'exclusive-addons-elementor' ),
					]
				);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->add_control(
			'exclusive_button_link_url',
			[
				'label' => esc_html__( 'Link URL', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => '#',
        			'is_external' => '',
     			],
     			'show_external' => true,
			]
		);

		$this->end_controls_section();
		


  		// Style Controls
		$this->start_controls_section(
			'exad_section_exclusive_button_settings',
			[
				'label' => esc_html__( 'Button Effects &amp; Styles', 'exclusive-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'exclusive_button_effect',
			[
				'label' => esc_html__( 'Set Button Effect', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'exad-exclusive-button--default',
				'options' => [
					'exad-exclusive-button--default' 	=> esc_html__( 'Default', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--winona' 		=> esc_html__( 'Winona', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--ujarak' 		=> esc_html__( 'Ujarak', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--wayra' 		=> esc_html__( 'Wayra', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--tamaya' 		=> esc_html__( 'Tamaya', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--rayen' 		=> esc_html__( 'Rayen', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--pipaluk' 	=> esc_html__( 'Pipaluk', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--moema' 		=> esc_html__( 'Moema', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--wave' 		=> esc_html__( 'Wave', 		'exclusive-addons-elementor' ),
					'exad-exclusive-button--aylen' 		=> esc_html__( 'Aylen', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--saqui' 		=> esc_html__( 'Saqui', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--wapasha' 	=> esc_html__( 'Wapasha', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--nuka' 		=> esc_html__( 'Nuka', 		'exclusive-addons-elementor' ),
					'exad-exclusive-button--antiman' 	=> esc_html__( 'Antiman', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--quidel' 		=> esc_html__( 'Quidel', 	'exclusive-addons-elementor' ),
					'exad-exclusive-button--shikoba' 	=> esc_html__( 'Shikoba', 	'exclusive-addons-elementor' ),
				],
			]
		);

		$this->start_controls_tabs('exad_exclusive_button_typography_separation');

			$this->start_controls_tab('button_primary_typography', [
				'label'	=> __( 'Primary', 'exclusive-addons-elementor')
			]);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
				'name' => 'exad_exclusive_button_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .exad-exclusive-button',
				]
			);

			$this->end_controls_tab();

			$this->start_controls_tab('button_secondary_typography', [
				'label'	=> __( 'Secondary', 'exclusive-addons-elementor')
			]);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
				'name' => 'exad_exclusive_button_secondary_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .exad-exclusive-button--rayen::before',
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'exad_exclusive_button_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button-wrapper' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'exad_exclusive_button_width',
			[
				'label' => esc_html__( 'Width', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'exad_exclusive_button_padding',
			[
				'label' => esc_html__( 'Button Padding', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--winona::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--winona > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--tamaya::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--rayen::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--rayen > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--saqui::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->start_controls_tabs( 'exad_exclusive_button_tabs' );

		$this->start_controls_tab( 'normal', [ 'label' => esc_html__( 'Normal', 'exclusive-addons-elementor' ) ] );

		$this->add_control(
			'exad_exclusive_button_text_color',
			[
				'label'		=> esc_html__( 'Text Color', 'exclusive-addons-elementor' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '#ffffff',
				'selectors'	=> [
					'{{WRAPPER}} .exad-exclusive-button' => 'color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--tamaya::before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--tamaya::after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'exad_exclusive_button_background_color',
			[
				'label'		=> esc_html__( 'Background Color', 'exclusive-addons-elementor' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '#333333',
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--ujarak:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--wayra:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--tamaya::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--tamaya::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--rayen:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--pipaluk::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--wave:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--aylen::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--nuka::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--nuka::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--antiman::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--quidel::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'		=> 'exad_exclusive_button_border',
				'selector'	=> '{{WRAPPER}} .exad-exclusive-button',
			]
		);
		
		$this->add_control(
			'exad_exclusive_button_border_radius',
			[
				'label'		=> esc_html__( 'Border Radius', 'exclusive-addons-elementor' ),
				'type'		=> Controls_Manager::SLIDER,
				'range'	=> [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button' => 'border-radius: {{SIZE}}px;',
					'{{WRAPPER}} .exad-exclusive-button::before' => 'border-radius: {{SIZE}}px;',
					'{{WRAPPER}} .exad-exclusive-button::after' => 'border-radius: {{SIZE}}px;',
				],
			]
		);
		
		$this->end_controls_tab();
		

		$this->start_controls_tab( 'exad_exclusive_button_hover', [ 'label' => esc_html__( 'Hover', 'exclusive-addons-elementor' ) ] );

		$this->add_control(
			'exad_exclusive_button_hover_text_color',
			[
				'label' => esc_html__( 'Text Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--winona::after' => 'color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--saqui::after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'exad_exclusive_button_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f54',
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--ujarak::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--wayra:hover::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--tamaya:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--rayen::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--wave::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--wave:hover::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--aylen::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--saqui:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--nuka:hover::after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--quidel:hover::after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'exad_exclusive_button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .exad-exclusive-button:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--wapasha::before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--antiman::before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--pipaluk::before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .exad-exclusive-button.exad-exclusive-button--quidel::before'  => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .exad-exclusive-button',
			]
		);		
		
		$this->end_controls_section();


		
		
	}

	protected function render() {
		$settings = $this->get_settings();
		
		$this->add_render_attribute( 'exad_exclusive_button', [
			'class'	=> [ 'exad-button-action', esc_attr($settings['exclusive_button_effect'] ) ],
			'href'	=> esc_attr($settings['exclusive_button_link_url']['url'] ),
		]);

		if( $settings['exclusive_button_link_url']['is_external'] ) {
			$this->add_render_attribute( 'exad_exclusive_button', 'target', '_blank' );
		}
		
		if( $settings['exclusive_button_link_url']['nofollow'] ) {
			$this->add_render_attribute( 'exad_exclusive_button', 'rel', 'nofollow' );
		}

		$this->add_render_attribute( 'exad_exclusive_button', 'data-text', esc_attr($settings['exclusive_button_secondary_text'] ));
	?>
	<div class="exad-button-one">
		<a <?php echo $this->get_render_attribute_string( 'exad_exclusive_button' ); ?>>
			<?php if ( ! empty( $settings['exad_exclusive_button_icon'] ) ) : ?>
				<i class="<?php echo esc_attr($settings['exad_exclusive_button_icon'] ); ?>" aria-hidden="true"></i> 
			<?php endif; ?>

			<?php echo  $settings['exclusive_button_text'];?>
		</a>
	</div>
	<?php
	
	}

	protected function content_template() {}
}


Plugin::instance()->widgets_manager->register_widget_type( new Exad_Exclusive_Button() );