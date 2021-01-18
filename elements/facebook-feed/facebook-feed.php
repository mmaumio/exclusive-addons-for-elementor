<?php
namespace ExclusiveAddons\Elements;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Scheme_Typography;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;
use \Elementor\Group_Control_Background;

class Facebook_Feed extends Widget_Base {

    public function get_name() {
		return 'exad-facebook-feed';
	}

	public function get_title() {
		return __('Facebook Feed', 'exclusive-addons-elementor');
	}

	public function get_icon() {
		return 'exad-logo eicon-facebook';
	}

	public function get_keywords() {
		return ['social', 'media', 'sharing'];
    }
    
    public function get_categories() {
		return [ 'exclusive-addons-elementor' ];
	}


	/**
	 * Register content related controls
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'_section_facebook_feed',
			[
				'label' => __( 'Facebook Feed', 'exclusive-addons-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'page_id',
			[
				'label' => esc_html__('Page ID', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => '228776804732213',
				'label_block' => true,
				'description' => '<a href="https://developers.facebook.com/apps/" target="_blank">Get Page ID</a>',
			]
		);

		$this->add_control(
			'access_token',
			[
				'label' => esc_html__('Access Token', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'EAAkn4TitXBIBALh0uMIsK6ZAnQywN62Izkw9nh5G3BRH3uKQJwfVoaZCZA4ZBKcCV00KLrFRZCgGrM4lpHytJGhhcj2jqZChcMbx5KqIL5xarn6EkPiZAwrR5tFtTWw6YZAo35OuzwPtyW5DceYJmAsrwf2v9R3skZCBClIHXjCQ5b42Xa0GV5xMG',
				'label_block' => true,
				'description' => '<a href="https://developers.facebook.com/apps/" target="_blank">Get Access Token.</a>',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_facebook_settings',
			[
				'label' => __('Facebook Feed Settings', 'exclusive-addons-elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sort_by',
			[
				'label' => __( 'Sort By', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'recent-posts',
				'options' => [
					'recent-posts' => __( 'Recent Posts', 'exclusive-addons-elementor' ),
					'old-posts' => __( 'Old Posts', 'exclusive-addons-elementor' ),
					'like_count' => __( 'Like', 'exclusive-addons-elementor' ),
					'comment_count' => __( 'Comment', 'exclusive-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label' => __( 'Number of Posts to show', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 800,
				'step' => 1,
				'default' => 6,
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'remove_cash',
			[
				'label' => __('Remove Cache', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __('Column Number', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SELECT,
				'label_block' => false,
				'desktop_default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => __( '1 Column', 'exclusive-addons-elementor' ),
					'2' => __( '2 Column', 'exclusive-addons-elementor' ),
					'3' => __( '3 Column', 'exclusive-addons-elementor' ),
					'4' => __( '4 Column', 'exclusive-addons-elementor' ),
				],
				'selectors' => [
					'(desktop){{WRAPPER}} .ha-facebook-items' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
					'(tablet){{WRAPPER}} .ha-facebook-items' => 'grid-template-columns: repeat({{columns_tablet.VALUE || 0}}, 1fr);',
					'(mobile){{WRAPPER}} .ha-facebook-items' => 'grid-template-columns: repeat({{columns_mobile.VALUE || 0}}, 1fr);'
				]
			]
		);

		$this->add_control(
			'show_feature_image',
			[
				'label' => __('Show Feature Image', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'show_facebook_logo',
			[
				'label' => __('Show Facebook Logo', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'show_user_image',
			[
				'label' => __('Show Profile image', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_name',
			[
				'label' => __('Show Name', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label' => __('Show Date', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_likes',
			[
				'label' => __('Show Likes Count', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'show_comments',
			[
				'label' => __('Show Comments Count', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'read_more',
			[
				'label' => __('Read More', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'read_more_text',
			[
				'label' => __('Read More Text', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Read More',
				'condition' => [
					'read_more' => 'yes',
				],
			]
		);

		$this->add_control(
			'description_word_count',
			[
				'label' => __( 'Description Word Count', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'step' => 1,
				'max' => 500,
				'default' => 15,
			]
		);

		$this->add_control(
			'load_more',
			[
				'label' => __('Load More Button', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'load_more_text',
			[
				'label' => __('Load More Text', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Load More',
				'condition' => [
					'load_more' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_general_settings',
			[
				'label' => __('General Settings', 'exclusive-addons-elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => false,
				'prefix_class' => 'ha-facebook-',
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'like_comment_position',
			[
				'label' => __( 'Footer Alignment', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'ha-facebook-user-',
				'selectors_dictionary' => [
					'left' => 'justify-content: flex-start',
					'center' => 'justify-content: space-around',
					'right' => 'justify-content: flex-end',
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-meta' => '{{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'button_alignment',
			[
				'label' => __( 'Button Alignment', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'exclusive-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more-wrapper' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'feature_image_position',
			[
				'label' => __( 'Feature Image Position', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => __( 'Top', 'exclusive-addons-elementor' ),
						'icon' => 'eicon-arrow-up',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'exclusive-addons-elementor' ),
						'icon' => 'eicon-arrow-down',
					],
				],
				'default' => 'top',
				'toggle' => false,
				'prefix_class' => 'ha-facebook-user-',
				'selectors_dictionary' => [
					'top' => 'flex-direction: column',
					'bottom' => 'flex-direction: column-reverse',
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-item' => '{{VALUE}};'
				]
			]
		);

		$this->end_controls_section();


	/**
	 * Register styles related controls
	 */
		$this->start_controls_section(
			'_section_facebook_style',
			[
				'label' => __( 'Common', 'exclusive-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'item_spacing',
			[
				'label' => __( 'Space between Posts', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-items' => 'grid-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'item_padding',
			[
				'label' => __( 'Padding', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-inner-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'items_border',
				'selector' => '{{WRAPPER}} .ha-facebook-item',
			]
		);

		$this->add_responsive_control(
			'items_border_radius',
			[
				'label' => __( 'Border Radius', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'items_box_shadow',
				'selector' => '{{WRAPPER}} .ha-facebook-item'
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'item_background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ha-facebook-item',
			]
		);

		$this->add_control(
			'item_background_overlay',
			[
				'label' => __( 'Background Overlay', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'item_background_background' => 'classic'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-item:before' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_glassy_effect',
			[
				'label' => __('Content Glassy Effect', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'item_background_background' => 'classic'
				],
				'prefix_class' => 'ha-facebook-glassy-',
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_facebook_feature_image',
			[
				'label' => __('Feature Image', 'exclusive-addons-elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'feature_image_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'show_feature_image' => '',
				],
				'raw' => __( 'Feature Image is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_responsive_control(
			'feature_image_width',
			[
				'label' => __( 'Image Width', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 400,
					],
				],
				'condition' => [
					'show_feature_image' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-feed-feature-image img' => 'width: {{SIZE}}{{UNIT}}'
				],
			]
		);

		$this->add_responsive_control(
			'feature_image_height',
			[
				'label' => __( 'Image Height', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 400,
					],
				],
				'condition' => [
					'show_feature_image' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-feed-feature-image img' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'feature_image_padding',
			[
				'label' => __( 'Padding', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'condition' => [
					'show_feature_image' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-feed-feature-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'feature_image_border_radius',
			[
				'label' => __( 'Border Radius', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'condition' => [
					'show_feature_image' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-feed-feature-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'feature_image_border',
				'condition' => [
					'show_feature_image' => 'yes'
				],
				'selector' => '{{WRAPPER}} .ha-facebook-feed-feature-image img',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'feature_image_box_shadow',
				'condition' => [
					'show_feature_image' => 'yes'
				],
				'selector' => '{{WRAPPER}} .ha-facebook-feed-feature-image img'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_facebook_user_info',
			[
				'label' => __( 'User Info', 'exclusive-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'user_info_spacing',
			[
				'label' => __( 'User Info Spacing', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'facebook_logo_heading',
			[
				'label' => __( 'Facebook Icon', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'facebook_icon_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'show_facebook_logo' => ''
				],
				'raw' => __( 'Facebook Icon is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_responsive_control(
			'facebook_logo_icon_size',
			[
				'label' => __( 'Size', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'condition' => [
					'show_facebook_logo' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-feed-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'facebook_logo_icon_color',
			[
				'label' => __( 'Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'show_facebook_logo' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-feed-icon i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'profile_image_heading',
			[
				'label' => __( 'Profile Image', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'profile_image_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'show_user_image' => ''
				],
				'raw' => __( 'Profile Image is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_responsive_control(
			'profile_image_size',
			[
				'label' => __( 'Size', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'condition' => [
					'show_user_image' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-avatar' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'profile_image_spacing',
			[
				'label' => __( 'Spacing', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'condition' => [
					'show_user_image' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}}.ha-facebook-left .ha-facebook-avatar' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ha-facebook-center .ha-facebook-avatar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.ha-facebook-right .ha-facebook-avatar' => 'margin-left: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'profile_image_border',
				'selector' => '{{WRAPPER}} .ha-facebook-avatar',
				'condition' => [
					'show_user_image' => 'yes'
				],
			]
		);

		$this->add_control(
			'profile_image_border_radius',
			[
				'label' => __( 'Border Radius', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-avatar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'profile_image_box_shadow',
				'selector' => '{{WRAPPER}} .ha-facebook-avatar',
				'condition' => [
					'show_user_image' => 'yes'
				],
			]
		);

		$this->add_control(
			'name_heading',
			[
				'label' => __( 'Name', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'name_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'show_name' => '',
				],
				'raw' => __( 'Name is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __( 'Name Typography', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .ha-facebook-author-name',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'condition' => [
					'show_name' => 'yes'
				],
			]
		);

		$this->start_controls_tabs(
			'_tabs_name_username',
			[
				'condition' => [ 'show_name' => 'yes' ],
			]
		);
		$this->start_controls_tab(
			'_tab_name_normal',
			[
				'label' => __( 'Normal', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'show_name' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-author-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_control(
			'name_hover_color',
			[
				'label' => __( 'Name Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'show_name' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-author-name:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'date_heading',
			[
				'label' => __( 'Date', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'date_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'show_date' => ''
				],
				'raw' => __( 'Date is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'label' => __( 'Typography', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .ha-facebook-date',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'condition' => [
					'show_date' => 'yes'
				],
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' => __( 'Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'show_date' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_facebook_content',
			[
				'label' => __('Content', 'exclusive-addons-elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'description_heading',
			[
				'label' => __( 'Description', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label' => __( 'Bottom Spacing', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => __( 'Typography', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .ha-facebook-content p',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-content p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'read_more_heading',
			[
				'label' => __( 'Read More', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'read_more_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'read_more' => ''
				],
				'raw' => __( 'Read More is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'read_more_typography',
				'label' => __( 'Typography', 'exclusive-addons-elementor' ),
				'selector' => '{{WRAPPER}} .ha-facebook-content p a',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
				'condition' => [
					'read_more' => 'yes'
				],
			]
		);

		$this->add_control(
			'read_more_color',
			[
				'label' => __( 'Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-content p a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'read_more_hover_color',
			[
				'label' => __( 'Hover Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-content p a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_facebook_footer_button',
			[
				'label' => __( 'Footer & Button', 'exclusive-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'footer_padding',
            [
                'label' => __( 'Padding', 'exclusive-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-facebook-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'footer_meta_border',
                'selector' => '{{WRAPPER}} .ha-facebook-meta',
            ]
        );

		$this->add_control(
			'like_comment_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'show_likes' => ''
				],
				'raw' => __( 'Like & Comment both are hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_control(
			'like_comment_heading',
			[
				'label' => __( 'Like & Comment', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING
			]
		);

		$this->add_responsive_control(
			'like_comment_spacing',
			[
				'label' => __( 'Space Between', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'condition' => [
					'show_likes' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-likes' => 'margin-right: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'like_comment_color',
			[
				'label' => __( 'Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-likes' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ha-facebook-comments' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'like_comment_icon_color',
			[
				'label' => __( 'Icon Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-likes i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ha-facebook-comments i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_heading',
			[
				'label' => __( 'Load More Button', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'button_note',
			[
				'label' => false,
				'type' => Controls_Manager::RAW_HTML,
				'condition' => [
					'load_more' => ''
				],
				'raw' => __( 'Button is hidden from <strong>Facebook Feed Settings</strong> section.', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'condition' => [
					'load_more' => 'yes'
				],
				'selector' => '{{WRAPPER}} .ha-facebook-load-more',
			]
		);

		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'condition' => [
					'load_more' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'condition' => [
					'load_more' => 'yes'
				],
				'selector' => '{{WRAPPER}} .ha-facebook-load-more'
			]
		);

		$this->start_controls_tabs(
			'_tabs_button',
			[
				'condition' => [
					'load_more' => 'yes'
				],
			]
		);
		$this->start_controls_tab(
			'_tab_button_normal',
			[
				'label' => __( 'Normal', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more' => 'background-color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Color', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more' => 'color: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'_tab_button_hover',
			[
				'label' => __( 'Hover', 'exclusive-addons-elementor' ),
			]
		);

		$this->add_control(
			'button_background_color_hover',
			[
				'label' => __('Background Color', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more:hover' => 'background-color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'button_color_hover',
			[
				'label' => __('Color', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more:hover' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'button_border_hover_color',
			[
				'label' => __('Border Color', 'exclusive-addons-elementor'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'button_border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .ha-facebook-load-more:hover' => 'border-color: {{VALUE}};'
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="exad-facebook-feed-container">
			<?php $this->facebook_feed_render($this->get_id(), $settings); ?>
		</div>
		<?php
	}

	protected function facebook_feed_render( $id, $settings ) {
		$page_id = trim($settings['page_id']);
		$access_token = $settings['access_token'];
		if ( empty( $page_id ) || empty( $access_token ) ) {
			return;
		}

		$ha_facebook_feed_cash = '_' . $id . '_facebook_cash';
		$transient_key = $page_id . $ha_facebook_feed_cash;
		$facebook_feed_data = get_transient($transient_key);
		$messages = [];

		if ( false === $facebook_feed_data ) {
			$url_queries = 'fields=status_type,created_time,from,message,story,full_picture,permalink_url,attachments.limit(1){type,media_type,title,description,unshimmed_url},comments.summary(total_count),reactions.summary(total_count)';
			$url = "https://graph.facebook.com/{$page_id}/posts?{$url_queries}&access_token={$access_token}";
			$data = wp_remote_get( $url );
			$facebook_feed_data = json_decode( wp_remote_retrieve_body( $data ), true );
			set_transient( $transient_key, $facebook_feed_data, 0 );
		}
		if ( $settings['remove_cash'] == 'yes' ) {
			delete_transient( $transient_key );
		}


		if ( !empty( $facebook_feed_data ) && array_key_exists( 'error', $facebook_feed_data ) ) {
			$messages['error'] = $facebook_feed_data['error']['message'];
		}

		if ( !empty( $messages ) ) {
			foreach ($messages as $key => $message) {
				printf('<div class="ha-facebook-error-message">%1$s</div>', esc_html( $message ) );
			}
			return;
		}


		$query_settings = [
			'widget_id' 		=> $id,
			'page_id' 			=> $page_id,
			'access_token' 		=> $access_token,
			'remove_cash' 		=> $settings['remove_cash'],
			'sort_by' 			=> $settings['sort_by'],
			'post_limit' 		=> $settings['post_limit'],
			'show_feature_image' => $settings['show_feature_image'],
			'show_facebook_logo' => $settings['show_facebook_logo'],
			'show_user_image' 	=> $settings['show_user_image'],
			'show_name' 				=> $settings['show_name'],
			'show_date' 				=> $settings['show_date'],
			'show_likes' 				=> $settings['show_likes'],
			'show_comments' 			=> $settings['show_comments'],
			'description_word_count'	=> $settings['description_word_count']
		];
		$query_settings = json_encode($query_settings, true);

		switch ($settings['sort_by']) {
			case 'old-posts':
				usort($facebook_feed_data['data'], function ($a,$b) {
					if ( strtotime($a['created_time']) == strtotime($b['created_time']) ) return 0;
					return ( strtotime($a['created_time']) < strtotime($b['created_time']) ? -1 : 1 );
				});
				break;
			case 'like_count':
				usort($facebook_feed_data['data'], function ($a,$b){
					if ($a['reactions']['summary'] == $b['reactions']['summary']) return 0;
					return ($a['reactions']['summary'] > $b['reactions']['summary']) ? -1 : 1 ;
				});
				break;
			case 'comment_count':
				usort($facebook_feed_data['data'], function ($a,$b){
					if ($a['comments']['summary'] == $b['comments']['summary']) return 0;
					return ($a['comments']['summary'] > $b['comments']['summary']) ? -1 : 1 ;
				});
				break;
			default:
				$facebook_feed_data;
		}

		if ( !empty( $settings['post_limit'] ) && count( $facebook_feed_data['data'] ) > $settings['post_limit'] ) {
			$items = array_splice($facebook_feed_data['data'], 0, $settings['post_limit'] );
		}
		if ( empty( $settings['post_limit'] ) ) {
			$items = $facebook_feed_data['data'];
		}

		?>

		<div class="ha-facebook-items">
			<?php foreach ( $items as $item ) :
				$page_url = "https://facebook.com/{$item['from']['id']}";
				$avatar_url = "https://graph.facebook.com/v4.0/{{$item['from']['id']}/picture";

				$description = explode( ' ', $item['message'] );
				if ( !empty( $settings['description_word_count'] ) && count( $description ) > $settings['description_word_count'] ) {
					$description_shorten = array_slice( $description, 0, $settings['description_word_count'] );
					$description = implode( ' ', $description_shorten ) . '...';
				} else {
					$description = $item['message'];
				}
				?>
				<div class="ha-facebook-item">

					<?php if ( $settings['show_feature_image'] == 'yes' && !empty( $item['full_picture'] ) ) : ?>
						<div class="ha-facebook-feed-feature-image">
							<a href="<?php echo esc_url( $item['permalink_url'] ); ?>" target="_blank">
								<img src="<?php echo esc_url( $item['full_picture'] ); ?>" alt="<?php esc_url( $item['from']['name'] ); ?>">
							</a>
						</div>
					<?php endif ?>

					<div class="ha-facebook-inner-wrapper">

						<?php if ( $settings['show_facebook_logo'] == 'yes' ) : ?>
							<div class="ha-facebook-feed-icon">
								<i class="fa fa-facebook-square"></i>
							</div>
						<?php endif; ?>

						<div class="ha-facebook-author">
							<?php if ( $settings['show_user_image'] == 'yes' ) : ?>
								<a href="<?php echo esc_url( $page_url ); ?>">
									<img
										src="<?php echo esc_url( $avatar_url ); ?>"
										alt="<?php echo esc_attr( $item['from']['name'] ); ?>"
										class="ha-facebook-avatar"
									>
								</a>
							<?php endif; ?>

							<div class="ha-facebook-user">
								<?php if ( $settings['show_name'] == 'yes' ) : ?>
									<a href="<?php echo esc_url( $page_url ); ?>" class="ha-facebook-author-name">
										<?php echo esc_html( $item['from']['name'] ); ?>
									</a>
								<?php endif; ?>

								<?php if ( $settings['show_date'] == 'yes' ) : ?>
									<div class="ha-facebook-date">
										<?php echo esc_html( date("M d Y", strtotime( $item['created_time'] ) ) ); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="ha-facebook-content">
							<p>
								<?php
								echo esc_html( $description );
								if ( $settings['read_more'] == 'yes' ) :
								?>
									<a href="<?php echo esc_url( $item['permalink_url'] ); ?>" target="_blank">
										<?php echo esc_html( $settings['read_more_text'] ); ?>
									</a>
								<?php endif; ?>
							</p>
						</div>

					</div>

					<?php if ( $settings['show_likes'] == 'yes' || $settings['show_comments'] == 'yes' ) : ?>
						<div class="ha-facebook-footer-wrapper">
							<div class="ha-facebook-footer">

								<div class="ha-facebook-meta">
									<?php if ( $settings['show_likes'] == 'yes' ) : ?>
										<div class="ha-facebook-likes">
											<?php echo esc_html( $item['reactions']['summary']['total_count'] ); ?>
											<i class="fa fa-thumbs-up"></i>
											<?php _e( 'Like', 'exclusive-addons-elementor' ); ?>
										</div>
									<?php endif; ?>

									<?php if ( $settings['show_comments'] == 'yes' ) : ?>
										<div class="ha-facebook-comments">
											<?php echo esc_html( $item['comments']['summary']['total_count'] ); ?>
											<i class="fa fa-comment"></i>
											<?php _e( 'comment', 'exclusive-addons-elementor' ); ?>
										</div>
									<?php endif; ?>
								</div>

							</div>
						</div>
					<?php endif; ?>

				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $settings['load_more'] == 'yes' ) : ?>
			<div class="ha-facebook-load-more-wrapper">
				<button class="ha-facebook-load-more" data-settings="<?php echo esc_attr( $query_settings ); ?>" data-total="<?php echo esc_attr( count( $facebook_feed_data['data'] ) ); ?>">
					<?php echo esc_html( $settings['load_more_text'] ); ?>
				</button>
			</div>
		<?php endif;

	}

}
