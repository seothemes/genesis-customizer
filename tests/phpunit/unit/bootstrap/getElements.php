<?php

namespace GenesisCustomizer\Tests;

use Brain\Monkey\Functions;
use function GenesisCustomizer\_get_elements;

/**
 * Class Test_GetElements
 *
 * @package GenesisCustomizer\Tests
 * @group   bootstrap
 */
class Test_GetElements extends Test_Case {

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function test_should_append_hover_and_focus_state_to_element() {
		$this->assertStringEndsWith( ':focus', _get_elements( 'button', true ) );
		$this->assertStringEndsWith( ':focus', _get_elements( 'input', true ) );
		$this->assertStringEndsWith( ':focus', _get_elements( 'heading', true ) );
	}

}
