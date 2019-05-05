<?php
/**
 * Genesis Customizer.
 *
 * This file contains the settings API for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Plugin admin API class.
 */
class Admin_API {

	/**
	 * Constructor function
	 */
	public function __construct() {
		add_action( 'save_post', [ $this, 'save_meta_boxes' ], 10, 1 );
	}

	/**
	 * Generate HTML for displaying fields.
	 *
	 * @param  array $data Field data.
	 *
	 * @return void
	 */
	public static function display_field( $data = [] ) {
		$field       = isset( $data['field'] ) ? $data['field'] : $data;
		$description = isset( $field['description'] ) ? $field['description'] : '';
		$placeholder = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
		$option_name = '';

		if ( isset( $data['prefix'] ) ) {
			$option_name = $data['prefix'];
		}

		// Get saved data.
		$data = '';

		// Get saved option.
		$option_name .= '-' . $field['id'];
		$option      = get_option( $option_name );

		// Get data to display in field.
		if ( isset( $option ) ) {
			$data = $option;
		}

		// Show default data if no option saved and default is supplied.
		if ( false === $data && isset( $field['default'] ) ) {
			$data = $field['default'];

		} elseif ( false === $data ) {
			$data = '';
		}

		$html = '';

		switch ( $field['type'] ) {

			case 'text':
			case 'url':
			case 'email':
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="text" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $placeholder ) . '" value="' . esc_attr( $data ) . '" size="40" />' . "\n";
				break;

			case 'password':
			case 'number':
			case 'hidden':
				$min = '';
				if ( isset( $field['min'] ) ) {
					$min = ' min="' . esc_attr( $field['min'] ) . '"';
				}

				$max = '';
				if ( isset( $field['max'] ) ) {
					$max = ' max="' . esc_attr( $field['max'] ) . '"';
				}
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . esc_attr( $field['type'] ) . '" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $placeholder ) . '" value="' . esc_attr( $data ) . '"' . $min . '' . $max . ' size="40" />' . "\n";
				break;

			case 'license':
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . esc_attr( $field['type'] ) . '" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $placeholder ) . '" value="' . esc_attr( $data ) . '" size="40" />' . "\n";

				$handle = _get_handle();
				$status = _get_license( 'status' );

				if ( 'valid' === $status ) {
					$html .= sprintf(
						'<b style="display:inline-block;padding:6px 6px 6px 0;color:green;">%s</b><br>',
						__( 'active', 'genesis-customizer' )
					);
					$html .= wp_nonce_field( $handle, $handle );
					$html .= sprintf(
						'<br><input type="submit" class="button-secondary" name="%s_license_deactivate" value="%s"/>',
						$handle,
						__( 'Deactivate License', 'genesis-customizer' )
					);

				} else {
					$html .= wp_nonce_field( $handle, $handle );
					$html .= sprintf(
						'<br><br><input type="submit" class="button-secondary" name="%s_license_activate" value="%s"/>',
						$handle,
						__( 'Activate License', 'genesis-customizer' )
					);
				}

				break;

			case 'text_secret':
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="text" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $placeholder ) . '" value="" />' . "\n";
				break;

			case 'textarea':
				$html .= '<textarea id="' . esc_attr( $field['id'] ) . '" rows="5" cols="50" name="' . esc_attr( $option_name ) . '" placeholder="' . esc_attr( $placeholder ) . '">' . $data . '</textarea><br/>' . "\n";
				break;

			case 'checkbox':
				$checked = '';
				if ( $data && 'on' === $data ) {
					$checked = 'checked="checked"';
				}
				$html .= '<input id="' . esc_attr( $field['id'] ) . '" type="' . esc_attr( $field['type'] ) . '" name="' . esc_attr( $option_name ) . '" ' . $checked . '/>' . "\n";
				break;

			case 'checkbox_multi':
				$html .= '<input type="button" class="button primary" name="select-all" id="select-all" value="Select All"/> &nbsp; <input type="button" class="button primary" name="deselect-all" id="deselect-all" value="Deselect All"/><br><br>';

				foreach ( $field['options'] as $k => $v ) {
					$checked = false;
					if ( in_array( $k, (array) $data, true ) ) {
						$checked = true;
					}

					$html .= '<p><label for="' . esc_attr( $field['id'] . '_' . $k ) . '" class="checkbox_multi"><input type="checkbox" ' . checked( $checked, true, false ) . ' name="' . esc_attr( $option_name ) . '[]" value="' . esc_attr( $k ) . '" id="' . esc_attr( $field['id'] . '_' . $k ) . '" /> ' . $v . '</label></p>';
				}
				break;

			case 'radio':
				foreach ( $field['options'] as $k => $v ) {
					$checked = false;
					if ( $k === $data ) {
						$checked = true;
					}
					$html .= '<label for="' . esc_attr( $field['id'] . '_' . $k ) . '"><input type="radio" ' . checked( $checked, true, false ) . ' name="' . esc_attr( $option_name ) . '" value="' . esc_attr( $k ) . '" id="' . esc_attr( $field['id'] . '_' . $k ) . '" /> ' . $v . '</label> ';
				}
				break;

			case 'select':
				$html .= '<select name="' . esc_attr( $option_name ) . '" id="' . esc_attr( $field['id'] ) . '">';
				foreach ( $field['options'] as $k => $v ) {
					$selected = false;
					if ( $k === $data ) {
						$selected = true;
					}
					$html .= '<option ' . selected( $selected, true, false ) . ' value="' . esc_attr( $k ) . '">' . $v . '</option>';
				}
				$html .= '</select> ';
				break;

			case 'select_multi':
				$html .= '<select name="' . esc_attr( $option_name ) . '[]" id="' . esc_attr( $field['id'] ) . '" multiple="multiple">';
				foreach ( $field['options'] as $k => $v ) {
					$selected = false;
					if ( in_array( $k, (array) $data, true ) ) {
						$selected = true;
					}
					$html .= '<option ' . selected( $selected, true, false ) . ' value="' . esc_attr( $k ) . '">' . $v . '</option>';
				}
				$html .= '</select> ';
				break;

			case 'image':
				$image_thumb = '';
				if ( $data ) {
					$image_thumb = wp_get_attachment_thumb_url( $data );
				}
				$html .= '<img id="' . esc_attr( $option_name ) . '_preview" class="image_preview" src="' . $image_thumb . '" /><br/>' . "\n";
				$html .= '<input id="' . esc_attr( $option_name ) . '_button" type="button" data-uploader_title="' . __( 'Upload an image', 'wordpress-plugin-template' ) . '" data-uploader_button_text="' . __( 'Use image', 'wordpress-plugin-template' ) . '" class="image_upload_button button" value="' . __( 'Upload new image', 'wordpress-plugin-template' ) . '" />' . "\n";
				$html .= '<input id="' . esc_attr( $option_name ) . '_delete" type="button" class="image_delete_button button" value="' . __( 'Remove image', 'wordpress-plugin-template' ) . '" />' . "\n";
				$html .= '<input id="' . esc_attr( $option_name ) . '" class="image_data_field" type="hidden" name="' . esc_attr( $option_name ) . '" value="' . esc_attr( $data ) . '"/><br/>' . "\n";
				break;

			case 'color':
				?>
				<input type="text" name="<?php echo esc_attr( $option_name ); ?>" class="color-picker" title="<?php echo esc_attr( $field['label'] ); ?>" value="<?php echo esc_attr( $data ); ?>" data-show-opacity="true" data-default-color="<?php echo esc_attr( $field['default'] ); ?>"/>
				<?php
				break;

		}

		switch ( $field['type'] ) {
			case 'color':
				break;

			default:
				if ( isset( $field['description'] ) ) {
					$html .= '<a href="#" class="button small tooltip-toggle">?</a> <br><span class="tooltip description">' . $description . '</span>' . "\n";
				}
				break;
		}

		echo $html;
	}

	/**
	 * Validate form field.
	 *
	 * @param  string $data Submitted value.
	 * @param  string $type Type of field to validate.
	 *
	 * @return string       Validated value
	 */
	public function validate_field( $data = '', $type = 'text' ) {

		switch ( $type ) {
			case 'number':
			case 'password':
			case 'license':
			case 'color':
			case 'text':
				$data = esc_attr( $data );
				break;

			case 'url':
				$data = esc_url( $data );
				break;

			case 'email':
				$data = is_email( $data );
				break;

		}

		return $data;
	}
}
