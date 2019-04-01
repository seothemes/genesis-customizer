<?php

namespace GenesisCustomizer;

class Typekit_Fonts {
	private $_typekit_id;
	public $typekit_enable;
	public $typekit_fonts;

	public function __construct() {

		$theme_info          = wp_get_theme();
		$this->theme_version = $theme_info['Version'];

		$this->_typekit_id    = _get_value( 'general_typekit_id' );
		$this->typekit_fonts  = _get_value( 'general_typekit_fonts' );
		$this->typekit_enable = _get_value( 'general_typekit_enable' );

		if ( ! empty( $this->_typekit_id ) && $this->typekit_enable ) {
			add_action( 'wp_enqueue_scripts', [ $this, 'load_typekit' ] );
		}

		add_filter( 'kirki/fonts/google_fonts', [ $this, 'add_typekit_fonts' ] );
	}

	public function load_typekit() {
		wp_enqueue_style( _get_handle() . '-typekit', 'https://use.typekit.net/' . esc_attr( $this->sanitize_typekit_id( $this->_typekit_id ) ) . '.css', [], $this->theme_version );
	}

	public function sanitize_typekit_id( $id ) {
		return preg_replace( '/[^0-9a-z]+/', '', $id );
	}

	public function add_typekit_fonts( $google_fonts ) {
		$my_custom_fonts = [];
		if ( $this->typekit_enable && ! empty( $this->_typekit_id ) && ! empty( $this->typekit_fonts ) ) {
			foreach ( $this->typekit_fonts as $key => $typekit_font ) {
				$my_custom_fonts[ $typekit_font['font_css_name'] ] = [
					'label'    => $typekit_font['font_name'],
					'variants' => $typekit_font['font_variants'],
					'subsets'  => $typekit_font['font_subsets'],
					'category' => $typekit_font['font_fallback'],
				];
			}
		}

		return array_merge_recursive( $my_custom_fonts, $google_fonts );
	}
}
