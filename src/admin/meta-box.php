<?php
/**
 * Genesis Customizer.
 *
 * This file adds page settings to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'add_meta_boxes', __NAMESPACE__ . '\add_meta_box' );
/**
 * Adds meta box to singular post types.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_meta_box() {
	$post_types = apply_filters( 'genesis_customizer_meta_box_post_types', [
		'post',
		'page',
		'product',
		'portfolio',
	] );

	\add_meta_box(
		_get_handle(),
		_get_name(),
		__NAMESPACE__ . '\render_meta_box',
		$post_types,
		'side',
		'low'
	);
}

add_action( 'save_post', __NAMESPACE__ . '\save_meta_box' );
/**
 * Save the meta when the post is saved.
 *
 * @since 1.0.0
 *
 * @param int $post_id The ID of the post being saved.
 *
 * @return mixed
 */
function save_meta_box( $post_id ) {
	$handle = _get_handle();

	if ( ! isset( $_POST[ $handle . '_meta_box_nonce' ] ) ) {
		return $post_id;
	}

	if ( ! wp_verify_nonce( $_POST[ $handle . '_meta_box_nonce' ], $handle . '_meta_box_nonce_action' ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'page' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}

	$settings = page_settings_defaults();

	foreach ( $settings as $setting => $post_meta_key ) {
		$value = isset( $_POST[ $post_meta_key ] ) ? 'yes' : '';

		update_post_meta( $post_id, $post_meta_key, $value );
	}

	return null;
}

/**
 * Render Meta Box content.
 *
 * @since 1.0.0
 *
 * @param object $post The post object.
 *
 * @return void
 */
function render_meta_box( $post ) {
	$handle   = _get_handle();
	$counter  = 0;
	$settings = page_settings_defaults();

	foreach ( $settings as $setting => $post_meta_key ) {
		$disabled = get_post_meta( $post->ID, $post_meta_key, true );
		$checked  = 'yes' === $disabled ? $disabled : '';
		echo 0 === $counter ? '' : '<br>';
		$counter ++;

		?><label for="<?php echo esc_attr( $post_meta_key ); ?>">
		<input type="checkbox" name="<?php echo esc_attr( $post_meta_key ); ?>" id="<?php echo esc_attr( $post_meta_key ); ?>" value="" <?php checked( $checked, 'yes' ); ?>><?php echo esc_html( __( 'Disable ', 'genesis-customizer' ) . str_replace( '_', ' ', $setting ) ); ?>
		</label><br>
		<?php
	}

	wp_nonce_field( $handle . '_meta_box_nonce_action', $handle . '_meta_box_nonce' );
}

/**
 * Return page settings. Used in multiple places.
 *
 * @since 1.0.0
 *
 * @return array
 */
function page_settings_defaults() {
	return apply_filters( 'genesis_customizer_page_settings', [
		'site_header' => 'header_disabled',
		'page_title'  => 'title_disabled',
		'site_footer' => 'footer_disabled',
	] );
}
