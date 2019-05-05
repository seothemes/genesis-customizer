<?php
/**
 * Genesis Customizer.
 *
 * This file adds the select Customizer control to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Class Select_Control
 *
 * @package GenesisCustomizer
 */
class Select_Control extends \WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @var string
	 */
	public $type = 'core_select';

	/**
	 * Renders control content.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render_content() {
		$input_id         = '_customize-input-' . $this->id;
		$description_id   = '_customize-description-' . $this->id;
		$describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';

		?>
		<?php if ( ! empty( $this->label ) ) : ?>
			<label for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
			<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
		<?php endif; ?>

		<select id="<?php echo esc_attr( $input_id ); ?>" <?php echo esc_html( $describedby_attr ); ?> <?php $this->link(); ?>>
			<?php
			foreach ( $this->choices as $value => $label ) {
				echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
			}
			?>
		</select>
		<?php
	}

}
