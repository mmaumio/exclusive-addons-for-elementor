<?php
/**
 * Admin Settings Page
 */

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

class Exad_Admin_Settings {

	/**
	 * Contains Default Component keys
	 * @var array
	 * @since 2.3.0
	 */
	public $exad_default_keys = [ 'exclusive-card', 'contact-form-7', 'countdown-timer', 'exclusive-accordion', 'exclusive-tabs', 'exclusive-button', 'post-grid', 'post-timeline', 'team-member', 'team-carousel', 'testimonial-carousel', 'flipbox', 'infobox', 'pricing-table', 'progress-bar' ];

	/**
	 * Will Contain All Components Default Values
	 * @var array
	 * @since 2.3.0
	 */
	private $exad_default_settings;

	/**
	 * Will Contain User End Settings Value
	 * @var array
	 * @since 2.3.0
	 */
	private $exad_settings;

	/**
	 * Will Contains Settings Values Fetched From DB
	 * @var array
	 * @since 2.3.0
	 */
	private $exad_get_settings;

	/**
	 * Initializing all default hooks and functions
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'create_exad_admin_menu' ), 550 );
		add_action( 'init', array( $this, 'enqueue_exad_admin_scripts' ) );
		add_action( 'wp_ajax_exad_ajax_save_elements_setting', array( $this, 'exad_ajax_save_elements_setting_function' ) );

	}

	/**
	 * Loading all essential scripts
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function enqueue_exad_admin_scripts() {

		wp_enqueue_style( 'exad-notice-css', plugins_url( '/', __FILE__ ).'assets/css/exad-notice.css' );
		if( isset( $_GET['page'] ) && $_GET['page'] == 'exad-settings' ) {
			wp_enqueue_style( 'exad-admin-css', plugins_url( '/', __FILE__ ).'assets/css/admin.css' );
			wp_enqueue_script( 'exad-admin-js', plugins_url( '/', __FILE__ ).'assets/js/admin.js', array( 'jquery'), '1.0', true );
		}

	}

	/**
	 * Create an admin menu.
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function create_exad_admin_menu() {

		add_submenu_page(
			'elementor',
			'Exclusive Addons',
			'Exclusive Addons',
			'manage_options',
			'exad-settings',
			array( $this, 'exad_admin_settings_page' )
		);

	}

	/**
	 * Create settings page.
	 * @param
	 * @return void
	 * @since 1.1.2
	 */
	public function exad_admin_settings_page() {

		$js_info = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'exad_settings_nonce_action' )
		);
		wp_localize_script( 'exad-admin-js', 'js_exad_settings', $js_info );

	   /**
	    * This section will handle the "exad_save_settings" array. If any new settings options is added
	    * then it will matches with the older array and then if it founds anything new then it will update the entire array.
	    */
	   $this->exad_default_settings = array_fill_keys( $this->exad_default_keys, true );
	   $this->exad_get_settings = get_option( 'exad_save_settings', $this->exad_default_settings );
	   $exad_new_settings = array_diff_key( $this->exad_default_settings, $this->exad_get_settings );

	   if( ! empty( $exad_new_settings ) ) {
			$exad_updated_settings = array_merge( $this->exad_get_settings, $exad_new_settings );
			update_option( 'exad_save_settings', $exad_updated_settings );
	   }
	   $this->exad_get_settings = get_option( 'exad_save_settings', $this->exad_default_settings );
	?>
    <div class="exad-elements-settings-wrap">
        <form action="" method="POST" id="exad-elements-settings" name="exad-elements-settings">
            <?php wp_nonce_field( 'exad_settings_nonce_action' ); ?>
            <div class="exad-header-bar">
                <div class="exad-header-left">
                    <div class="exad-admin-logo-inline">
                        <img src="<?php echo plugins_url( '/', __FILE__ ).'assets/img/dc-logo.png'; ?>">
                    </div>
                    <h2 class="title">
                        <?php _e( 'Exclusive Addons Settings', 'exclusive-addons-elementor' ); ?>
                    </h2>
                </div>
                <div class="exad-header-right">
                    <button type="submit" class="button exad-btn exad-js-element-save-setting">
                        <?php _e('Save settings', 'exclusive-addons-elementor'); ?></button>

                </div>
                
            </div>
            <div class="exad-settings-tabs">
                <ul class="exad-tabs">
                    <li><a href="#general" class="active"><img src="<?php echo plugins_url( '/', __FILE__ ).'assets/img/Setting, Preferences, User, Interface, Ui, Gear.png'; ?>"><span>General</span></a></li>
                    <li><a href="#elements"><img src="<?php echo plugins_url( '/', __FILE__ ).'assets/img/Layer, Stack, Data, Layers, Tool.png'; ?>"><span>Elements</span></a></li>
                </ul>
                <div id="general" class="exad-settings-tab active">
                    <div class="row exad-admin-general-wrapper">
                        <div class="row exad-admin-banner">
                            <a class="exad-admin-block-banner-full" href="https://devscred.com/" target="_blank">
                                <img class="exad-preview-img" src="<?php echo plugins_url( '/', __FILE__ ).'assets/img/settings-banner-bg.png'; ?>">
                                <div class="exad-admin-block-banner-content">
                                    <h1>Exclusive Addons<br> for Elementor</h1>
                                </div>
                            </a>
                        </div>
                        <!--preview image end-->
                        <div class="exad-admin-general-inner">
                            <div class="exad-admin-block-wrapper">

                                <div class="exad-admin-block exad-admin-block-banner">
                                    <div class="exad-admin-block-header-icon">
                                        <svg width="13px" height="14px" viewBox="0 0 13 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Setting-main-Page-" transform="translate(-331.000000, -451.000000)" fill="#FFFFFF">
                                                    <g id="Group-10" transform="translate(307.000000, 428.000000)">
                                                        <g id="Plus,-Add,-Inset,-Append,-Circle,-Attach" transform="translate(11.000000, 10.000000)">
                                                            <g id="svg3771">
                                                                <g id="layer1" transform="translate(0.000000, 0.637800)">
                                                                    <g id="g4069">
                                                                        <path d="M18.5022403,14.0198542 L18.5062403,18.5120542 L14.0121003,18.5120542 C13.6514882,18.5077268 13.3164756,18.6978847 13.1353244,19.0097245 C12.9541732,19.3215643 12.9549437,19.7067822 13.1373408,20.0178949 C13.3197379,20.3290077 13.6555084,20.5178239 14.0161003,20.5120542 L18.5102403,20.5120542 L18.5142403,25.0062542 C18.5112745,25.3666961 18.7024992,25.7008476 19.0147681,25.8808903 C19.3270369,26.060933 19.7120309,26.059008 20.0224838,25.8758517 C20.3329366,25.6926954 20.5208104,25.3566485 20.5142403,24.9962542 L20.5102403,20.5059542 L25.0024303,20.5059542 C25.3630629,20.510681 25.6983054,20.3208671 25.8797923,20.009193 C26.0612791,19.697519 26.0608939,19.3122701 25.878784,19.0009596 C25.6966742,18.6896492 25.3610527,18.5005062 25.0004303,18.5059542 L20.5062903,18.5059542 L20.5022903,14.0118542 C20.5054674,13.7415488 20.3990858,13.4814699 20.2073848,13.2908766 C20.0156838,13.1002833 19.7549927,12.9954107 19.4847103,13.0001542 C18.9331486,13.0139379 18.4936064,13.468325 18.5022403,14.0198542 Z" id="path5702-9"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                    </div>
                                    <div class="exad-admin-block-header">
                                        <h4 class="exad-admin-title">Contribute to Exclusive Addons</h4>
                                        <p>You can contribute to make Essential Addons
                                            better reporting bugs, creating issues,
                                            pull requests at <a href="https://github.com/rupok/essential-addons-elementor-lite/" target="_blank">Github.</a></p>
                                        <a href="https://github.com/rupok/essential-addons-elementor-lite/issues/new" class="exad-admin-block-header-button" target="_blank">Report a bug</a>
                                    </div>


                                </div>
                                <!--preview image end-->
                                <div class="exad-admin-block exad-admin-block-docs">

                                    <div class="exad-admin-block-header-icon">

                                        <svg width="9px" height="15px" viewBox="0 0 9 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Setting-main-Page-" transform="translate(-877.000000, -452.000000)" fill="#FFFFFF">
                                                    <g id="Group-11" transform="translate(861.000000, 439.000000)">
                                                        <g id="Group-9">
                                                            <path d="M16,16.9622642 C16.0904018,14.7080437 17.6473214,13 20.5602679,13 C23.2120536,13 25,14.5590864 25,16.6842105 C25,18.2234359 24.2165179,19.305859 22.890625,20.0903674 C21.5948661,20.8450844 21.2232143,21.3714002 21.2232143,22.3942403 L21.2232143,23 L19.1439732,23 L19.1339286,22.2055611 C19.0837054,20.8053625 19.6964286,19.9116187 21.0725446,19.0973188 C22.2879464,18.3723932 22.7198661,17.796425 22.7198661,16.7735849 C22.7198661,15.6514399 21.8258929,14.8272095 20.4497768,14.8272095 C19.0636161,14.8272095 18.1696429,15.6514399 18.0792411,16.9622642 L16,16.9622642 Z M19.4942966,28 C18.661597,28 18,27.3488372 18,26.5 C18,25.6511628 18.661597,25 19.4942966,25 C20.3498099,25 21,25.6511628 21,26.5 C21,27.3488372 20.3498099,28 19.4942966,28 Z" id="?"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="exad-admin-block-header">
                                        <h4 class="exad-admin-title">Documentation</h4>
                                        <p>Get started by spending some time with the documentation to get familiar with Exclusive Addons.</p>
                                        <a href="https://essential-addons.com/elementor/docs/" class="exad-admin-block-docs-button" target="_blank">Get Support</a>
                                    </div>
                                </div>
                                <div class="exad-admin-block exad-admin-block-contribution">
                                    <div class="exad-admin-block-header-icon">

                                        <svg width="21px" height="13px" viewBox="0 0 21 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Setting-main-Page-" transform="translate(-325.000000, -676.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g id="Group-10-Copy" transform="translate(318.000000, 662.000000)">
                                                        <path d="M8,14 L27,14 C27.5522847,14 28,14.4477153 28,15 C28,15.5522847 27.5522847,16 27,16 L8,16 C7.44771525,16 7,15.5522847 7,15 C7,14.4477153 7.44771525,14 8,14 Z M8,20 L23,20 C23.5522847,20 24,20.4477153 24,21 C24,21.5522847 23.5522847,22 23,22 L8,22 C7.44771525,22 7,21.5522847 7,21 C7,20.4477153 7.44771525,20 8,20 Z M8,25 L18,25 C18.5522847,25 19,25.4477153 19,26 C19,26.5522847 18.5522847,27 18,27 L8,27 C7.44771525,27 7,26.5522847 7,26 C7,25.4477153 7.44771525,25 8,25 Z" id="Combined-Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="exad-admin-block-header">
                                        <h4 class="exad-admin-title">Contribute to Exclusive Addons</h4>
                                        <p>You can contribute to make Exclusive Addons better reporting bugs, creating issues, pull requests at <a href="https://github.com/rupok/essential-addons-elementor-lite/" target="_blank">Github.</a></p>
                                        <a href="https://github.com/rupok/essential-addons-elementor-lite/issues/new" class="exad-admin-block-contribution-button" target="_blank">View Documentation</a>
                                    </div>
                                </div>
                                <div class="exad-admin-block exad-admin-block-support">
                                    <div class="exad-admin-block-header-icon">

                                        <svg width="17px" height="16px" viewBox="0 0 17 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Setting-main-Page-" transform="translate(-872.000000, -675.000000)" fill="#FFFFFF">
                                                    <g id="Heart,-Love,-Like,-Favorite,-Romance,-Gift" transform="translate(860.000000, 663.000000)">
                                                        <g id="svg5442" transform="translate(0.500000, 0.000000)">
                                                            <g id="layer1" transform="translate(0.000000, 0.373723)">
                                                                <path d="M17.087759,12 C15.785359,12 14.4833458,12.528524 13.4853725,13.5893979 C11.6382392,15.5523049 11.5212792,18.6130683 13.0929991,20.741334 C14.3758524,22.426518 17.8974656,25.7718058 19.3547856,27.1346327 C19.7096923,27.4666251 20.2878522,27.4650664 20.6417322,27.1346327 C22.0740922,25.7845584 25.512359,22.4962321 26.905479,20.744593 C28.4776789,18.6163273 28.3632656,15.5557056 26.515959,13.5926569 C24.7348524,11.6997473 21.9890922,11.5090253 19.9992389,12.994277 C19.1243723,12.3413443 18.1097056,12.003259 17.087759,12.003259 L17.087759,12 Z" id="rect3411-7"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="exad-admin-block-header">
                                        <h4 class="exad-admin-title">Need Help?</h4>
                                        <p>Stuck with something? Get help from the community on <a href="https://community.wpdeveloper.net/" target="_blank">WPDeveloper Forum</a> or <a href="https://www.facebook.com/groups/essentialaddons/" target="_blank">Facebook Community.</a> In case of emergency, initiate a live chat at <a href="https://essential-addons.com/elementor/" target="_blank">Exclusive Addons website.</a></p>
                                        <a href="https://community.wpdeveloper.net/support-forum/forum/essential-addons-for-elementor/" class="exad-admin-block-support-button" target="_blank">leave a Review</a>
                                    </div>
                                </div>
                            </div>
                            <!--admin block-wrapper end-->
                        </div>

                    </div>
                    <!--Row end-->
                </div>
                <div id="elements" class="exad-settings-tab">
                    <div class="row">
                        <div class="col-full">
                            <p class="exad-elements-control-notice">You can disable the elements you are not using on your site. That will disable all associated assets of those widgets to improve your site loading.</p>
                            <div class="premium-elements-title">
                                <img src="<?php echo plugins_url( '/', __FILE__ ).'assets/img/raw/Plus, Add, Inset, Append, Circle, Attach.svg'; ?>">
                                <h4 class="section-title">Deactivate elements for better performance</h4>
                                <p class="section-title-p-tag">You can deactivate those elements that you do not intend to use to avoid loading scripts and files related to those elements.</p>
                            </div>
                            <div class="exad-checkbox-container">
                                <div class="exad-checkbox">
                                    <!--changed-->
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Contact Form 7', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Contact Form 7', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="contact-form-7" name="contact-form-7" <?php checked( 1, $this->exad_get_settings['contact-form-7'], true ); ?> >
                                        <label for="contact-form-7"></label>
                                    </div>

                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'CountDown Timer', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'CountDown Timer', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="count-down" name="countdown-timer" <?php checked( 1, $this->exad_get_settings['countdown-timer'], true ); ?> >
                                        <label for="count-down"></label>
                                    </div>
                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Exclusive Button', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Exclusive Button', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="exclusive-button" name="exclusive-button" <?php checked( 1, $this->exad_get_settings['exclusive-button'], true ); ?> >
                                        <label for="exclusive-button"></label>
                                    </div>
                                </div>
                                <div class="exad-checkbox">

                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Exclusive Card', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Exclusive Card', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="exclusive-card" name="exclusive-card" <?php checked( 1, $this->exad_get_settings['exclusive-card'], true ); ?> >
                                        <label for="exclusive-card"></label>
                                    </div>

                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Post Grid', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Post Grid', 'exclusive-addons-elementor' ); ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="post-grid" name="post-grid" <?php checked( 1, $this->exad_get_settings['post-grid'], true ); ?> >
                                        <label for="post-grid"></label>
                                    </div>

                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Post Timeline', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Post Timeline', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="post-timeline" name="post-timeline" <?php checked( 1, $this->exad_get_settings['post-timeline'], true ); ?> >
                                        <label for="post-timeline"></label>
                                    </div>

                                </div>


                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Team Carousel', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Team Carousel', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="team-carousel" name="team-carousel" <?php checked( 1, $this->exad_get_settings['team-carousel'], true ); ?> >
                                        <label for="team-carousel"></label>
                                    </div>

                                </div>



                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Team Member', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Team Member', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="team-members" name="team-member" <?php checked( 1, $this->exad_get_settings['team-member'], true ); ?> >
                                        <label for="team-members"></label>
                                    </div>

                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Testimonials', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Testimonials', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="testimonials" name="testimonial-carousel" <?php checked( 1, $this->exad_get_settings['testimonial-carousel'], true ); ?> >
                                        <label for="testimonials"></label>
                                    </div>

                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Exclusive Tabs', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Exclusive Tabs', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="exclusive-tabs" name="exclusive-tabs" <?php checked( 1, $this->exad_get_settings['exclusive-tabs'], true ); ?> >
                                        <label for="exclusive-tabs"></label>
                                    </div>

                                </div>
                                
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Flip Box', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Flip Box', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="flip-box" name="flipbox" <?php checked( 1, $this->exad_get_settings['flipbox'], true ); ?> >
                                        <label for="flip-box"></label>
                                    </div>


                                </div>
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Info Box', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Info Box', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="info-box" name="infobox" <?php checked( 1, $this->exad_get_settings['infobox'], true ); ?> >
                                        <label for="info-box"></label>
                                    </div>


                                </div>
                                
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Pricing Table', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Pricing Table', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="price-table" name="pricing-table" <?php checked( 1, $this->exad_get_settings['pricing-table'], true ); ?> >
                                        <label for="price-table"></label>
                                    </div>

                                </div>
                                
                                
                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Exclusive Accordion', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Exclusive Accordion', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="exclusive-accordion" name="exclusive-accordion" <?php checked( 1, $this->exad_get_settings['exclusive-accordion'], true ); ?> >
                                        <label for="exclusive-accordion"></label>
                                    </div>
                                </div>

                                <div class="exad-checkbox">
                                    <div class="exad-checkbox-text">
                                        <p class="exad-el-title">
                                            <?php _e( 'Progress Bar', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                        <p class="exad-el-title-small">
                                            <?php _e( 'Progress Bar', 'exclusive-addons-elementor' ) ?>
                                        </p>
                                    </div>
                                    <div class="exad-checkbox-label">
                                        <input type="checkbox" id="progress-bar" name="progress-bar" <?php checked( 1, $this->exad_get_settings['progress-bar'], true ); ?> >
                                        <label for="progress-bar"></label>
                                    </div>


                                </div>
                            </div>
                            <!--./checkbox-container-->
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php

	}

	/**
	 * Saving data with ajax request
	 * @param
	 * @return  array
	 * @since 1.1.2
	 */
	public function exad_ajax_save_elements_setting_function() {

		check_ajax_referer( 'exad_settings_nonce_action', 'security' );

		if( isset( $_POST['fields'] ) ) {
			parse_str( $_POST['fields'], $settings );
		} else {
			return;
		}

		$this->exad_settings = [];

		foreach( $this->exad_default_keys as $key ){
			if( isset( $settings[ $key ] ) ) {
				$this->exad_settings[ $key ] = 1;
			} else {
				$this->exad_settings[ $key ] = 0;
			}
		}
		update_option( 'exad_save_settings', $this->exad_settings );
		return true;
		die();
			
			
	}

}

new Exad_Admin_Settings();
