<?php

namespace GenesisCustomizer;

class Box_Shadow_Control extends \WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-box-shadow';

	/**
	 * Used to automatically generate all CSS output.
	 *
	 * @access public
	 * @var array
	 */
	public $output = [];

	/**
	 * Data type
	 *
	 * @access public
	 * @var string
	 */
	public $option_type = 'theme_mod';

	/**
	 * Option name (if using options).
	 *
	 * @access public
	 * @var string
	 */
	public $option_name = false;

	/**
	 * The kirki_config we're using for this control
	 *
	 * @access public
	 * @var string
	 */
	public $kirki_config = 'global';

	/**
	 * Whitelisting the "required" argument.
	 *
	 * @since  3.0.17
	 * @access public
	 * @var array
	 */
	public $required = [];

	/**
	 * Whitelisting the "css_vars" argument.
	 *
	 * @since  3.0.28
	 * @access public
	 * @var string
	 */
	public $css_vars = '';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		// Enqueue the script and style.
		wp_enqueue_script( 'kirki_box_shadow_control', apply_filters( 'kirki_box_shadow_control_url', _get_url() . 'assets/js/box-shadow.js', [
			'jquery',
			'customize-base',
			'customize-controls',
			'jquery-ui-draggable',
		], '1.0', false ) );

		wp_enqueue_style( 'kirki_box_shadow_control', apply_filters( 'kirki_box_shadow_control_url', _get_url() . 'assets/css/box-shadow.css', [], '1.0' ) );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		// Get the basics from the parent class.
		parent::to_json();

		// Default value.
		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		// Required.
		$this->json['required'] = $this->required;

		// Output.
		$this->json['output'] = $this->output;

		// Value.
		$this->json['value'] = $this->value();

		// Choices.
		$this->json['choices'] = $this->choices;

		// The link.
		$this->json['link'] = $this->get_link();

		// The ID.
		$this->json['id'] = $this->id;

		// The kirki-config.
		$this->json['kirkiConfig'] = $this->kirki_config;

		// The option-type.
		$this->json['kirkiOptionType'] = $this->option_type;

		// The option-name.
		$this->json['kirkiOptionName'] = $this->option_name;

		// The CSS-Variables.
		$this->json['css-var'] = $this->css_vars;
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see    WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
        <!-- Label. -->
        <# if ( data.label ) { #>
        <label><span class="customize-control-title">{{{ data.label }}}</span></label>
        <# } #>
        <!-- Description. -->
        <# if ( data.description ) { #>
        <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <div class="kirki-input-container">
            <div class="preview-wrapper">
                <div class="preview-object">
                    <span class="dashicons dashicons-move"></span>
                    <span class="screen-reader-text"><?php esc_html_e( 'Click and drag to adjust horizontal & vertical length', 'kirki-pro' ); ?></span>
                    <span class="coordinates"></span>
                </div>
            </div>
        </div>

        <div class="kirki-input-container">
            <div class="customize-control-kirki-multicolor">
                <input id="{{ data.id }}-color" type="text" data-default-color="{{ data.default }}"
                       value="{{ data.value.color }}" class="kirki-color-control" data-id="{{ data.id }}"
                       data-alpha="true"/>
            </div>
        </div>

        <div class="customize-control-kirki-slider">
            <div class="kirki-input-container">
                <label for="{{ data.id }}-blur-radius"><?php esc_html_e( 'Blur Radius', 'kirki-pro' ); ?></label>
                <div class="wrapper">
                    <input class="blur-radius" type="range" min="0" max="50" step="1" value="0"
                           id="{{ data.id }}-blur-radius"
                           data-context="blur-radius"/>
                </div>
            </div>
            <div class="kirki-input-container">
                <label for="{{ data.id }}-spread-radius"><?php esc_html_e( 'Spread Radius', 'kirki-pro' ); ?></label>
                <div class="wrapper">
                    <input class="spread-radius" type="range" min="0" max="50" step="1" value="0"
                           id="{{ data.id }}-spread-radius" data-context="spread-radius"/>
                </div>
            </div>
        </div>

        <input class="hidden-value" type="hidden" {{{ data.link }}}/>

		<?php
	}

	/**
	 * Adding an empty function here prevents PHP errors from to_json() in the parent class.
	 *
	 * @access protected
	 * @since  1.0
	 * @return void
	 */
	protected function render_content() {
	}

}
