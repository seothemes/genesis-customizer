<?php
/**
 * Genesis Customizer.
 *
 * This file contains the admin settings class for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Plugin settings class.
 */
class Admin_Settings {

	/**
	 * The single instance of WordPress_Plugin_Template_Settings.
	 *
	 * @var    object
	 * @access private
	 * @since  1.0.0
	 */
	private static $_instance = null;

	/**
	 * Available settings for plugin.
	 *
	 * @var    array
	 * @access public
	 * @since  1.0.0
	 */
	public $settings = [];

	/**
	 * Admin_Settings constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'init_settings' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		add_action( 'admin_menu', [ $this, 'add_submenu_page' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'settings_assets' ] );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_settings() {
		$this->settings = $this->settings_fields();

		uasort( $this->settings, function ( $a, $b ) {
			return $a['priority'] - $b['priority'];
		} );
	}

	/**
	 * Add settings page to admin menu.
	 *
	 * @return void
	 */
	public function add_submenu_page() {
		add_submenu_page(
			'genesis',
			_get_name(),
			_get_name(),
			'manage_options',
			_get_handle(),
			[
				$this,
				'settings_page',
			]
		);
	}

	/**
	 * Load settings JS & CSS.
	 *
	 * @return void
	 */
	public function settings_assets() {
		$page = get_current_screen();

		if ( 'genesis_page_genesis-customizer' !== $page->id ) {
			return;
		}

		// Image uploader JS & CSS.
		wp_enqueue_media();

		// Color picker CSS.
		wp_enqueue_style(
			'alpha-color-picker',
			_get_url() . 'assets/css/alpha-color-picker.css',
			[ 'wp-color-picker' ]
		);

		// Color picker JS.
		wp_register_script(
			_get_handle() . '-alpha',
			_get_url() . 'assets/js/alpha-color-picker.js',
			[
				'wp-color-picker',
				'jquery',
			],
			_get_version()
		);
		wp_enqueue_script( _get_handle() . '-alpha' );

		// Admin JS.
		wp_register_script(
			_get_handle() . '-admin-settings',
			_get_url() . 'assets/js/admin-settings.js',
			[
				_get_handle() . '-alpha',
			],
			_get_version()
		);
		wp_enqueue_script( _get_handle() . '-admin-settings' );
	}

	/**
	 * Build settings fields.
	 *
	 * @return array Fields to be displayed on settings page
	 */
	private function settings_fields() {
		$settings['general'] = [
			'title'       => __( 'General', 'genesis-customizer' ),
			'description' => __( 'Change the default settings for Genesis Customizer.', 'genesis-customizer' ),
			'priority'    => 1,
			'fields'      => [
				[
					'id'          => 'breakpoint',
					'label'       => __( 'Global Breakpoint', 'genesis-customizer' ),
					'description' => __( 'Select the screen size at which the global media query should change.', 'genesis-customizer' ),
					'type'        => 'number',
					'default'     => '896',
				],
				[
					'id'          => 'child-theme-css',
					'label'       => __( 'Load child theme CSS', 'genesis-customizer' ),
					'description' => __( 'Load the child theme style.css file on the front end of the site.', 'genesis-customizer' ),
					'type'        => 'radio',
					'options'     => [
						'enable'  => __( 'Enable &nbsp;', 'genesis-customizer' ),
						'disable' => __( 'Disable', 'genesis-customizer' ),
					],
					'default'     => 'enable',
				],
				[
					'id'          => 'style-trump',
					'label'       => __( 'Genesis style trump', 'genesis-customizer' ),
					'description' => __( 'Load the child theme stylesheet at a later priority to override plugin styles.', 'genesis-customizer' ),
					'type'        => 'radio',
					'options'     => [
						'enable'  => __( 'Enable &nbsp;', 'genesis-customizer' ),
						'disable' => __( 'Disable', 'genesis-customizer' ),
					],
					'default'     => 'enable',
				],
				[
					'id'          => 'font-awesome',
					'label'       => __( 'Load FontAwesome', 'genesis-customizer' ),
					'description' => __( 'Load FontAwesome CSS for use throughout your site. Visit ', 'genesis-customizer' ) . sprintf( '<a href="%s" target="_blank">%s</a>', 'https://fontawesome.com/how-to-use/on-the-web/referencing-icons/basic-use', 'FontAwesome' ) . __( ' for basic usage instructions.', 'genesis-customizer' ),
					'type'        => 'radio',
					'options'     => [
						'enable'  => __( 'Enable &nbsp;', 'genesis-customizer' ),
						'disable' => __( 'Disable', 'genesis-customizer' ),
					],
					'default'     => 'disable',
				],
			],
		];

		/*
		 * Colors
		 */

		$default = _get_color( 'default' );
		$colors  = [];

		foreach ( $default as $name => $hex ) {
			$colors[] = [
				'id'      => 'color-' . $name,
				'label'   => ucwords( $name ),
				'type'    => 'color',
				'default' => $hex,
			];
		}

		$settings['colors'] = [
			'title'       => __( 'Colors', 'genesis-customizer' ),
			'description' => __( 'Sets the color palette defaults for Customizer color settings.', 'genesis-customizer' ),
			'priority'    => 5,
			'fields'      => $colors,
		];

		return apply_filters( 'genesis_customizer_settings_fields', $settings );
	}

	/**
	 * Register plugin settings.
	 *
	 * @return void
	 */
	public function register_settings() {
		if ( is_array( $this->settings ) ) {
			$current_section = '';

			if ( isset( $_POST['tab'] ) && $_POST['tab'] ) {
				$current_section = $_POST['tab'];

			} else {
				if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
					$current_section = $_GET['tab'];
				}
			}

			foreach ( $this->settings as $section => $data ) {
				if ( $current_section && $current_section !== $section ) {
					continue;
				}

				// Add section to page.
				add_settings_section( $section,
					$data['title'], [
						$this,
						'settings_section',
					], _get_handle()
				);

				foreach ( $data['fields'] as $field ) {
					$validation = '';

					// Validation callback for field.
					if ( isset( $field['callback'] ) ) {
						$validation = $field['callback'];
					}

					// Register field.
					$option_name = _get_handle() . '-' . $field['id'];
					register_setting( _get_handle(), $option_name, $validation );

					// Add field to page.
					add_settings_field(
						$field['id'],
						$field['label'],
						[
							__NAMESPACE__ . '\Admin_API',
							'display_field',
						],
						_get_handle(),
						$section,
						[
							'field'  => $field,
							'prefix' => _get_handle(),
						]
					);
				}

				if ( ! $current_section ) {
					break;
				}
			}
		}
	}

	/**
	 * Settings section.
	 *
	 * @param  array $section Array of settings.
	 *
	 * @return void
	 */
	public function settings_section( $section ) {
		echo '<p> ' . esc_html( $this->settings[ $section['id'] ]['description'] ) . '</p>' . "\n";
	}

	/**
	 * Load settings page content.
	 *
	 * @return void
	 */
	public function settings_page() {
		$html = '<div class="wrap" id="' . _get_handle() . '-settings">' . "\n";
		$html .= '<h2>' . __( 'Genesis Customizer Settings', 'genesis-customizer' ) . '</h2>' . "\n";

		$tab = '';

		if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
			$tab .= $_GET['tab'];
		}

		// Show page tabs.
		if ( is_array( $this->settings ) && 1 < count( $this->settings ) ) {
			$html .= '<h2 class="nav-tab-wrapper">' . "\n";
			$c    = 0;

			foreach ( $this->settings as $section => $data ) {
				$class = 'nav-tab';

				if ( ! isset( $_GET['tab'] ) ) {
					if ( 0 === $c ) {
						$class .= ' nav-tab-active';
					}
				} else {
					if ( isset( $_GET['tab'] ) && $section === $_GET['tab'] ) {
						$class .= ' nav-tab-active';
					}
				}

				// Set tab link.
				$tab_link = add_query_arg(
					[
						'tab' => $section,
					]
				);

				if ( isset( $_GET['settings-updated'] ) ) {
					$tab_link = remove_query_arg( 'settings-updated', $tab_link );
				}

				$html .= '<a href="' . $tab_link . '" class="' . esc_attr( $class ) . '">' . esc_html( $data['title'] ) . '</a>' . "\n";

				++$c;
			}

			$html .= '</h2>' . "\n";
		}

		$html .= '<form method="post" action="options.php" enctype="multipart/form-data">' . "\n";

		// Get settings fields.
		ob_start();
		settings_fields( _get_handle() );
		do_settings_sections( _get_handle() );
		$html .= ob_get_clean();

		$html .= '<p class="submit">' . "\n";
		$html .= '<input type="hidden" name="tab" value="' . esc_attr( $tab ) . '" />' . "\n";
		$html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr( __( 'Save Settings', 'genesis-customizer' ) ) . '" />' . "\n";
		$html .= '</p>' . "\n";
		$html .= '</form>' . "\n";
		$html .= '</div>' . "\n";

		echo $html;
	}

	/**
	 * Main WordPress_Plugin_Template_Settings Instance
	 *
	 * Ensures only one instance of WordPress_Plugin_Template_Settings is loaded or can be loaded.
	 *
	 * @since  1.0.0
	 * @static
	 * @see    WordPress_Plugin_Template().
	 *
	 * @return  Admin_Settings instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'genesis-customizer' ), esc_html( _get_version() ) );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'genesis-customizer' ), esc_html( _get_version() ) );
	}
}
