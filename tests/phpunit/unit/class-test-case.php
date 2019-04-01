<?php
/**
 * Test Case for the unit tests.
 *
 * @package GenesisCustomizer\Plugin\Tests
 *
 * @since   1.5.0
 */

namespace GenesisCustomizer\Tests;

use Brain\Monkey;
use Brain\Monkey\Functions;
use PHPUnit\Framework\TestCase;

/**
 * Abstract Class Test_Case
 *
 * @package GenesisCustomizer\Plugin\Tests
 */
abstract class Test_Case extends TestCase {

	/**
	 * Prepares the test environment before each test.
	 */
	protected function setUp() {
		parent::setUp();
		Monkey\setUp();

		require_once GENESIS_CUSTOMIZER_THEME_DIR . '/src/bootstrap/helpers.php';
	}

	/**
	 * Cleans up the test environment after each test.
	 */
	protected function tearDown() {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Setup the stubs for the common WordPress escaping and internationalization functions.
	 *
	 * @throws Monkey\Expectation\Exception\InvalidArgumentForStub
	 */
	protected function setup_common_wp_stubs() {

		// Common escaping functions.
		Functions\stubs( [
			'esc_attr',
			'esc_html',
			'esc_textarea',
			'esc_url',
			'hello',
			'wp_kses_post',
		] );

		// Common internationalization functions.
		Functions\stubs( [
			'__',
			'esc_html__',
			'esc_html_x',
			'esc_attr_x',
		] );

		foreach ( [ 'esc_attr_e', 'esc_html_e', '_e' ] as $wp_function ) {
			Functions\when( $wp_function )->echoArg();
		}
	}
}
