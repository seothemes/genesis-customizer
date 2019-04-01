<?php

namespace GenesisCustomizer\Tests;

use function GenesisCustomizer\_get_setting;

/**
 * Class Test_GetSetting
 *
 * @package GenesisCustomizer\Tests
 * @group   bootstrap
 */
class Test_GetSetting extends Test_Case {

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function test_should_return_formatted_string() {
		$this->assertSame( 'genesis-customizer_bootstrap_getSetting_setting', _get_setting( 'setting' ) );
	}

}
