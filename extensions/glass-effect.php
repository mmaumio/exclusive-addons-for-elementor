<?php

namespace ExclusiveAddons\Elementor;

use Elementor\Controls_Manager;
use Elementor\Utils;

class GlassEffect {

    public static function init() {
        
        add_action( 'elementor/element/section/section_background/before_section_end', array( __CLASS__, 'register_controls' ), 10 );
        add_action( 'elementor/element/column/section_style/before_section_end', array( __CLASS__, 'register_controls' ), 10 );
        add_action( 'elementor/element/common/_section_background/before_section_end', array( __CLASS__, 'register_controls' ), 10 );
    }

    public static function register_controls( $section ) {

        $section->add_control(
            'exad_enable_glass_effect',
            [
				'label'        => __( 'Enable Glass Effect', 'exclusive-addons-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
                'return_value' => 'yes',
                'render_type'  => 'template',
				'label_on'     => __( 'Enable', 'exclusive-addons-elementor' ),
                'label_off'    => __( 'Disable', 'exclusive-addons-elementor' ),
                'prefix_class' => 'exad-glass-effect-',
            ]
        );

        $section->add_control(
			'exad_glass_effect_blur_value',
			[
				'label' => __( 'Blur Value', 'exclusive-addons-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
                'default' => 20,
                'selectors' => [
					'{{WRAPPER}}.exad-glass-effect-yes' => 'backdrop-filter: blur({{SIZE}}px);',
				],
                'condition' => [
                    'exad_enable_glass_effect' => 'yes'
                ],
            ]
        );
    }

}

GlassEffect::init();