<?php

namespace GenesisCustomizer\Tests;

use Brain\Monkey\Functions;
use Brain\Monkey\Expectation\Exception\NotAllowedMethod;
use function GenesisCustomizer\_get_value;

/**
 * Class Test_GetMediaQuery
 *
 * @package GenesisCustomizer\Tests
 * @group   bootstrap
 */
class Test_GetValue extends Test_Case {

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 * @throws NotAllowedMethod
	 */
	public function test_should_return_prefixed_theme_mod_setting_name() {
		Functions\expect( 'get_theme_mod' )
			->twice()
			->andReturnFirstArg();

		$this->assertSame( 'genesis-customizer_field', _get_value( 'field', 'default' ) );

		Functions\expect( 'GenesisCustomizer\_get_default' )
			->once()
			->andReturnFirstArg();

		$this->assertSame( 'genesis-customizer_field', _get_value( 'field' ) );
	}

}
