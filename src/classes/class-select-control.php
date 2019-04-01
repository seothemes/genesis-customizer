<?php

namespace GenesisCustomizer;

class Select_Control extends \WP_Customize_Control {

	public $type = 'core_select';

	public function render_content() {
		$input_id         = '_customize-input-' . $this->id;
		$description_id   = '_customize-description-' . $this->id;
		$describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';

		?>
		<?php if ( ! empty( $this->label ) ) : ?>
            <label for="<?php echo esc_attr( $input_id ); ?>"
                   class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
            <span id="<?php echo esc_attr( $description_id ); ?>"
                  class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>

        <select id="<?php echo esc_attr( $input_id ); ?>" <?php echo $describedby_attr; ?> <?php $this->link(); ?>>
			<?php
			foreach ( $this->choices as $value => $label ) {
				echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
			}
			?>
        </select>
		<?php
	}

}
