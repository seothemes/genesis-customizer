<?php
/**
 * Genesis Customizer.
 *
 * This file adds the mega menu class to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Sample menu item metadata.
 *
 * This class demonstrate the usage of Menu Item Custom Fields in plugins/themes.
 *
 * @since 1.0.0
 */
class Mega_Menu_Admin {

	/**
	 * Holds our custom fields.
	 *
	 * @since  Menu_Item_Custom_Fields_Example 0.2.0
	 *
	 * @var    array
	 * @access protected
	 *
	 * @return void
	 */
	protected static $fields = [];

	/**
	 * Initialize plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'wp_nav_menu_item_custom_fields', [ __CLASS__, '_fields' ], 10, 4 );
		add_action( 'wp_update_nav_menu_item', [ __CLASS__, '_save' ], 10, 3 );
		add_filter( 'manage_nav-menus_columns', [ __CLASS__, '_columns' ], 99 );
		self::$fields = [
			'mega-menu' => __( 'Mega Menu', 'genesis-customizer' ),
		];
	}

	/**
	 * Save custom field value.
	 *
	 * @since   1.0.0
	 *
	 * @wp_hook action wp_update_nav_menu_item
	 *
	 * @param int   $menu_id         Nav menu ID.
	 * @param int   $menu_item_db_id Menu item ID.
	 * @param array $menu_item_args  Menu item data.
	 *
	 * @return void
	 */
	public static function _save( $menu_id, $menu_item_db_id, $menu_item_args ) {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}
		check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );
		foreach ( self::$fields as $_key => $label ) {
			$key = sprintf( 'menu-item-%s', $_key );

			// Sanitize.
			if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
				update_post_meta( $menu_item_db_id, $key, 'has-mega-menu' );
			} else {
				delete_post_meta( $menu_item_db_id, $key );
			}
		}
	}

	/**
	 * Print field.
	 *
	 * @since 1.0.0
	 *
	 * @param int    $id    Nav menu ID.
	 * @param object $item  Menu item data object.
	 * @param int    $depth Depth of menu item. Used for padding.
	 * @param array  $args  Menu item args.
	 *
	 * @return void
	 */
	public static function _fields( $id, $item, $depth, $args ) {
		foreach ( self::$fields as $_key => $label ) {
			$key   = sprintf( 'menu-item-%s', $_key );
			$id    = sprintf( 'edit-%s-%s', $key, $item->ID );
			$name  = sprintf( '%s[%s]', $key, $item->ID );
			$value = get_post_meta( $item->ID, $key, true );
			$class = sprintf( 'field-%s', $_key );
			$check = empty( $value ) ? '' : $value;
			?>
			<style>
				.mega-menu {
					display: none;
					padding: 5px 0;
				}

				.menu-item-depth-0 .mega-menu {
					display: block
				}
			</style>
			<p class="mega-menu description description-wide <?php echo esc_attr( $class ); ?>">
				<label for="<?php echo esc_attr( $id ); ?>">
					<input type="checkbox" id="<?php echo esc_attr( $id ); ?>" class="widefat <?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"
						<?php checked( $check, 'has-mega-menu' ); ?>/>
					<?php echo esc_attr( $label ); ?>
				</label>
			</p>
			<?php
		}
	}

	/**
	 * Add our fields to the screen options toggle.
	 *
	 * @since 1.0.0
	 *
	 * @param array $columns Menu item columns.
	 *
	 * @return array
	 */
	public static function _columns( $columns ) {
		$columns = array_merge( $columns, self::$fields );

		return $columns;
	}
}
