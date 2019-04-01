<?php

namespace GenesisCustomizer;

add_action( 'add_meta_boxes', __NAMESPACE__ . '\add_hero_meta_box' );
/**
 * Adds meta box.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_hero_meta_box() {
	add_meta_box(
		'hero-section',
		'Hero Section',
		__NAMESPACE__ . '\render_hero_meta_box',
		[ 'post', 'page', 'product', 'portfolio' ],
		'side',
		'low'
	);
}

add_action( 'save_post', __NAMESPACE__ . '\save_hero_meta_box' );
/**
 * Save the meta when the post is saved.
 *
 * @since 1.0.0
 *
 * @param int $post_id The ID of the post being saved.
 *
 * @return mixed
 */
function save_hero_meta_box( $post_id ) {
	if ( ! isset( $_POST['hero_section_nonce'] ) ) {
		return $post_id;
	}

	if ( ! wp_verify_nonce( $_POST['hero_section_nonce'], 'hero_section_nonce_action' ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}

	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}

	if ( array_key_exists( 'hero_section', $_POST ) ) {
		update_post_meta( $post_id, '_hero_section', $_POST['hero_section'] );
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
function render_hero_meta_box( $post ) {
	$value   = get_post_meta( $post->ID, '_hero_section', true );
	$value   = '' === $value ? 'site_default' : $value;
	$choices = [
		'site_default',
		'featured_image',
		'no_image',
		'none',
	];

	echo '<p>' . esc_html__( 'Overrides the default hero section value set in the Customizer.', 'genesis-customizer' ) . '</p>';

	foreach ( $choices as $choice ) {
		?>
        <label for="hero_section_<?php echo $choice; ?>">
            <input type="radio" name="hero_section"
                   id="hero_section_<?php echo $choice; ?>"
                   value="<?php echo $choice; ?>" <?php checked( $value, $choice ); ?> >
			<?php echo ucwords( str_replace( '_', ' ', $choice ) ); ?>
        </label>
        <br>
		<?php
	}

	wp_nonce_field( 'hero_section_nonce_action', 'hero_section_nonce' );
}
