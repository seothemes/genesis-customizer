<?php
/**
 * Genesis Customizer.
 *
 * This file adds helper utility functions to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Returns all plugin data.
 *
 * @since 1.0.0
 *
 * @param string $header File header meta information to retrieve.
 *
 * @link  https://codex.wordpress.org/File_Header
 *
 * @return array|string|null
 */
function _get_data( $header = '' ) {
	static $data = null;

	if ( is_null( $data ) ) {
		$data = get_file_data( _get_path() . 'genesis-customizer.php', [
			'Name'        => 'Plugin Name',
			'Version'     => 'Version',
			'PluginURI'   => 'Plugin URI',
			'TextDomain'  => 'Text Domain',
			'Description' => 'Description',
			'Author'      => 'Author',
			'AuthorURI'   => 'Author URI',
			'DomainPath'  => 'Domain Path',
			'Network'     => 'Network',
		], 'plugin' );
	}

	if ( array_key_exists( $header, $data ) ) {
		return $data[ $header ];
	}

	return $data;
}

/**
 * Returns the plugin path.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_path() {
	return plugin_dir_path( dirname( __DIR__ ) );
}

/**
 * Returns the plugin url.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_url() {
	return plugin_dir_url( dirname( __DIR__ ) );
}

/**
 * Returns the Pro upgrade link.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_upgrade_link() {
	return esc_url( 'https://genesiscustomizer.com/pro' );
}

/**
 * Returns the plugin name.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_name() {
	return _get_data( 'Name' );
}

/**
 * Returns the plugin handle.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_handle() {
	return _get_data( 'TextDomain' );
}

/**
 * Returns the plugin author.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_author() {
	return _get_data( 'Author' );
}

/**
 * Returns the plugin version.
 *
 * @since 1.0.0
 *
 * @return string
 */
function _get_version() {
	return _get_data( 'Version' );
}

/**
 * Returns the version of a given file.
 *
 * @since 1.0.0
 *
 * @param string $file File to check.
 *
 * @return string
 */
function _get_asset_version( $file ) {
	$cache_busting = _get_value( 'general_performance_cache-busting', false );
	$modified      = filemtime( _get_path() . 'assets' . DIRECTORY_SEPARATOR . $file );

	return _is_debug_mode() || $cache_busting ? $modified : _get_version();
}

/**
 * Returns the default breakpoint.
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function _get_breakpoint() {
	return apply_filters( 'genesis_customizer_breakpoint', 896 );
}

/**
 * Returns a media query.
 *
 * @since 1.0.0
 *
 * @param string $query Defaults to mobile-first.
 *
 * @return string
 */
function _get_media_query( $query = 'min' ) {
	$breakpoint = _get_option( 'breakpoint', _get_breakpoint() );

	return sprintf( '@media (%s-width:%spx)', $query, $breakpoint );
}

/**
 * Wrapper function for get_option.
 *
 * @since 1.0.0
 *
 * @param string $option  Option to retrieve.
 * @param bool   $default Default value.
 *
 * @return mixed
 */
function _get_option( $option = '', $default = false ) {
	$handle = _get_handle();
	$option = $option ? $handle . '-' . $option : $handle;

	return get_option( $option, $default );
}

/**
 * Returns setting value. Can only be called from config files.
 *
 * @since 1.0.0
 *
 * @param string $setting Setting name.
 *
 * @return string
 */
function _get_setting( $setting ) {
	$file    = debug_backtrace()[0]['file'];
	$section = basename( $file, '.php' );
	$panel   = basename( dirname( $file ) );

	return _get_handle() . '[' . $panel . '_' . $section . '_' . $setting . ']';
}

/**
 * Return default value for Customizer option.
 *
 * @since 1.0.0
 *
 * @param string $field Field ID.
 *
 * @return string
 */
function _get_default( $field ) {
	$default = '';
	$field   = _get_handle() . "[$field]";

	if ( isset( \Kirki::$fields[ $field ] ) && isset( \Kirki::$fields[ $field ]['default'] ) ) {
		$default = \Kirki::$fields[ $field ]['default'];
	}

	return $default;
}

/**
 * Return value of Customizer option.
 *
 * @since 1.0.0
 *
 * @param string $field   Setting name. Format `{$panel}_{$section}_{$setting}`.
 * @param string $default Default value to return if empty.
 *
 * @return mixed
 */
function _get_value( $field, $default = null ) {
	if ( null === $default ) {
		$default = _get_default( $field );
	}

	$option = get_option( _get_handle() );
	$value  = isset( $option[ $field ] ) ? $option[ $field ] : $default;

	return apply_filters( 'kirki_values_get_value', $value, $field );
}

/**
 * Returns array of all image sizes.
 *
 * @since 1.0.0
 *
 * @param array $additional Additional image sizes to include (optional).
 *
 * @return array
 */
function _get_image_sizes( $additional = [ 'full' ] ) {
	$image_names  = array_merge( get_intermediate_image_sizes(), $additional );
	$image_labels = array_map(
		function ( $string ) {
			return ucwords( str_replace( '_', ' ', $string ) );
		}, $image_names
	);

	return array_combine( $image_names, $image_labels );
}

/**
 * Returns hex code for a color.
 *
 * @since 1.0.0
 *
 * @param string $color Color to retrieve.
 *
 * @return mixed
 */
function _get_color( $color = 'accent' ) {
	$colors = apply_filters(
		'genesis_customizer_colors', [
			'black'       => '#22292f',
			'heading'     => '#606f7b',
			'text'        => '#8795a1',
			'border'      => '#dae1e7',
			'background'  => '#f5f8fa',
			'white'       => '#ffffff',
			'accent'      => '#3490dc',
			'overlay'     => 'rgba(52,144,220,0.95)',
			'success'     => '#38c172',
			'warning'     => '#ffed4a',
			'error'       => '#e3342f',
			'shadow'      => 'rgba(96,111,123,0.05)',
			'transparent' => 'rgba(0,0,0,0)',
		]
	);

	if ( 'default' === $color ) {
		return array_slice( $colors, 0, 11 );
	}

	foreach ( $colors as $name => $hex ) {
		$option          = _get_handle() . '-color-' . $name;
		$colors[ $name ] = get_option( $option, $hex );
	}

	if ( isset( $colors[ $color ] ) ) {
		return $colors[ $color ];
	}

	return $colors;
}

/**
 * Returns size value.
 *
 * @since 1.0.0
 *
 * @param string $size   Name of size.
 * @param string $suffix Units, leave empty for none.
 *
 * @return mixed
 */
function _get_size( $size = 'm', $suffix = 'px' ) {
	$spacing = apply_filters(
		'genesis_customizer_spacing', [

			// Scale.
			'xxs' => '8',
			'xs'  => '10',
			's'   => '14',
			'm'   => '16',
			'l'   => '18',
			'xl'  => '32',
			'xxl' => '48',

			// Headings.
			'h1'  => '36',
			'h2'  => '28',
			'h3'  => '24',
			'h4'  => '22',
			'h5'  => '20',
			'h6'  => '18',
		]
	);

	return $spacing[ $size ] . $suffix;
}

/**
 * Returns array of similar CSS selectors.
 *
 * @since 1.0.0
 *
 * @param string $element Elements to return (button, input, heading).
 * @param bool   $hover   Append hover and focus states.
 * @param bool   $array   Return array or string.
 *
 * @return array|string
 */
function _get_elements( $element, $hover = false, $array = false ) {
	$elements = apply_filters(
		'genesis_customizer_elements', [
			'button'  => [
				'.button',
				'button',
				'input[type="submit"]',
				'.wp-block-button__link',
			],
			'input'   => [
				'input',
				'select',
				'textarea',
			],
			'heading' => [
				'h1',
				'h2',
				'h3',
				'h4',
				'h5',
				'h6',
				'legend',
			],
		]
	);

	if ( $hover ) {
		$elements_hover = [];

		foreach ( $elements[ $element ] as $selector ) {
			$elements_hover[] = $selector . ':hover';
			$elements_hover[] = $selector . ':focus';
		}

		$elements[ $element ] = $elements_hover;
	}

	if ( $array ) {
		return $elements[ $element ];

	} else {
		return implode( ',', $elements[ $element ] );
	}
}
