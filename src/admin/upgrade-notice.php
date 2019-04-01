<?php

namespace GenesisCustomizer;

add_action( 'admin_notices', __NAMESPACE__ . '\upgrade_notice' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function upgrade_notice() {
	if ( _is_pro_active() ) {
		return;
	}

	printf(
		'<div class="notice notice-info is-dismissible">
					<p>%s <strong>%s</strong> %s <a href="%s" target="_blank">%s</a></p>
					<button type="button" class="notice-dismiss">
						<span class="screen-reader-text">%s</span>
					</button>
				</div>',
		esc_html__( 'Thank you for using Genesis Customizer! Upgrade to', 'genesis-customizer' ),
		esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
		esc_html__( 'to access even more features!', 'genesis-customizer' ),
		esc_attr__( 'https://genesiscustomizer.com/pro', 'genesis-customizer' ),
		esc_html__( 'Go Pro →', 'genesis-customizer' ),
		esc_html__( 'Dismiss this notice.', 'genesis-customizer' )
	);
}
