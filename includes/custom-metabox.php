<?php
use \ExclusiveAddons\Elementor\Helper;

class WC_Settings_Tab_Demo {

    /* Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_tab_demo', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_tab_demo', __CLASS__ . '::update_settings' );
    }
    
    
    /* Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_demo'] = __( 'Exclusive Woo Builder', 'woocommerce-settings-tab-demo' );
        return $settings_tabs;
    }


    /* Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }


    /* Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }


    /* Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_settings() {

        /*
        * Elementor Templates List
        * return array
        */
        function get_woo_saved_template() {
            $templates = '';
            if( class_exists('\Elementor\Plugin') ){
                $templates = \Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
            }
            $types = array();
            if ( empty( $templates ) ) {
                $template_lists = [ '0' => __( 'Do not Saved Templates.', 'woolentor' ) ];
            } else {
                $template_lists = [ '0' => __( 'Select Template', 'woolentor' ) ];
                foreach ( $templates as $template ) {
                    $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
                }
            }
            return $template_lists;
        }

        $settings = array(

            // 'woolentor_general_tabs' => array(),

            // 'woolentor_woo_template_tabs' => array(

            array(
                'name'    => 'singleproductpage',
                'label'   => __( 'Single Product Template', 'woolentor' ),
                'desc'    => __( 'You can select a custom template for the product details page layout', 'woolentor' ),
                'type'    => 'select',
                'default' => '0',
                'options' => get_woo_saved_template()
            )

            // )
            // 'section_title' => array(
            //     'name'     => __( 'Section Title', 'woocommerce-settings-tab-demo' ),
            //     'type'     => 'title',
            //     'desc'     => '',
            //     'id'       => 'wc_settings_tab_demo_section_title'
            // ),
            // 'title' => array(
            //     'name' => __( 'Title', 'woocommerce-settings-tab-demo' ),
            //     'type' => 'text',
            //     'desc' => __( 'This is some helper text', 'woocommerce-settings-tab-demo' ),
            //     'id'   => 'wc_settings_tab_demo_title'
            // ),
            // 'description' => array(
            //     'name' => __( 'Description', 'woocommerce-settings-tab-demo' ),
            //     'type' => 'textarea',
            //     'desc' => __( 'This is a paragraph describing the setting. Lorem ipsum yadda yadda yadda. Lorem ipsum yadda yadda yadda. Lorem ipsum yadda yadda yadda. Lorem ipsum yadda yadda yadda.', 'woocommerce-settings-tab-demo' ),
            //     'id'   => 'wc_settings_tab_demo_description'
            // ),
            // array(
            //     'name' => __( 'Pricing Options', 'woocommerce' ),
            //     'type' => 'title',
            //     'desc' => __('The following options affect how prices are displayed on the frontend.', 'woocommerce'),
            //     'id'   => 'pricing_options'
            // ),
            
            // array(
            //     'name'    => __( 'Currency Position', 'woocommerce' ),
            //     'desc'    => __( 'This controls the position of the currency symbol.', 'woocommerce' ),
            //     'id'      => 'woocommerce_currency_pos',
            //     // 'css'     => 'min-width:150px;',
            //     // 'std'     => 'left', // WooCommerce < 2.0
            //     // 'default' => 'left', // WooCommerce >= 2.0
            //     'type'    => 'select',
            //     'options' => get_woo_saved_template()
            // ),
            // array(
            //     'name'    => 'singleproductpage',
            //     'label'   => __( 'Single Product Template', 'woolentor' ),
            //     'desc'    => __( 'You can select a custom template for the product details page layout', 'woolentor' ),
            //     'type'    => 'select',
            //     'default' => '0',
            //     'options' => get_woo_saved_template()
            // ),
            // 'section_end' => array(
            //     'type' => 'sectionend',
            //     'id' => 'wc_settings_tab_demo_section_end'
            // )
            
        );

        return apply_filters( 'wc_settings_tab_demo_settings', $settings );
    }

    // /**
	//  *  Get Saved page
	//  *
	//  *  @param string $type Type.
	//  *  @since 0.0.1
	//  *  @return string
	//  */
	// public static function get_woo_saved_template( $type = 'page' ) {

	// 	$saved_template = $this->get_woo_post_template( $type );
	// 	$options[-1]   = __( 'Select', 'exclusive-addons-elementor' );
	// 	if ( count( $saved_template ) ) :
	// 		foreach ( $saved_template as $saved_row ) :
	// 			$options[ $saved_row['id'] ] = $saved_row['name'];
	// 		endforeach;
	// 	else :
	// 		$options['no_template'] = __( 'No section template is added.', 'exclusive-addons-elementor' );
	// 	endif;
	// 	return $options;
	// }

    // /**
	//  *  Get Templates based on category
	//  *
	//  *  @param string $type Type.
	//  *  @since 0.0.1
	//  *  @return string
	//  */
	// public static function get_woo_post_template( $type = 'page' ) {
	// 	$posts = get_posts(
	// 		array(
	// 			'post_type'        => 'elementor_library',
	// 			'orderby'          => 'title',
	// 			'order'            => 'ASC',
	// 			'posts_per_page'   => '-1',
	// 			'tax_query'        => array(
	// 				array(
	// 					'taxonomy' => 'elementor_library_type',
	// 					'field'    => 'slug',
	// 					'terms'    => $type
	// 				)
	// 			)
	// 		)
	// 	);

	// 	$templates = array();

	// 	foreach ( $posts as $post ) :
	// 		$templates[] = array(
	// 			'id'   => $post->ID,
	// 			'name' => $post->post_title
	// 		);
	// 	endforeach;

	// 	return $templates;
	// }

    

}

WC_Settings_Tab_Demo::init();