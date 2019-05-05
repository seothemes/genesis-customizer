<?php
/**
 * Genesis Customizer.
 *
 * This file adds image utility functions to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Returns an SVG image in a string.
 *
 * @since 1.0.0
 *
 * @param string $icon SVG icon to retrieve.
 *
 * @return bool|string
 */
function _get_svg( $icon = '' ) {
	$icons['alignleft'] = '<?xml version="1.0" encoding="utf-8"?><svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 1344v128q0 26-19 45t-45 19h-1664q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1664q26 0 45 19t19 45zm-384-384v128q0 26-19 45t-45 19h-1280q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1280q26 0 45 19t19 45zm256-384v128q0 26-19 45t-45 19h-1536q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1536q26 0 45 19t19 45zm-384-384v128q0 26-19 45t-45 19h-1152q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1152q26 0 45 19t19 45z"/></svg>';

	$icons['aligncenter'] = '<?xml version="1.0" encoding="utf-8"?><svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 1344v128q0 26-19 45t-45 19h-1664q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1664q26 0 45 19t19 45zm-384-384v128q0 26-19 45t-45 19h-896q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h896q26 0 45 19t19 45zm256-384v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm-384-384v128q0 26-19 45t-45 19h-640q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h640q26 0 45 19t19 45z"/></svg>';

	$icons['alignright'] = '<?xml version="1.0" encoding="utf-8"?><svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 1344v128q0 26-19 45t-45 19h-1664q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1664q26 0 45 19t19 45zm0-384v128q0 26-19 45t-45 19h-1280q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1280q26 0 45 19t19 45zm0-384v128q0 26-19 45t-45 19h-1536q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1536q26 0 45 19t19 45zm0-384v128q0 26-19 45t-45 19h-1152q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1152q26 0 45 19t19 45z"/></svg>';

	$icons['arrow'] = '<svg class="components-panel__arrow" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><g><path fill="none" d="M0,0h24v24H0V0z"></path></g><g><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"></path></g></svg>';

	$icons['search'] = '<svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 1006 1010"><path fill="#30353f" d="M978 880L740 641a400 400 0 1 0-98 98l239 238c27 27 70 27 97 0s27-70 0-97zM200 624a300 300 0 1 1 425 0 300 300 0 0 1-425 0z"/></svg>
';

	$icons['arrow-up'] = '<svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><g><path fill="none" d="M0,0h24v24H0V0z"></path></g><g><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"></path></g></svg>';

	$icons['search-button'] = '<svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 1006 1010"><path d="M978 880L740 641a400 400 0 1 0-98 98l239 238c27 27 70 27 97 0s27-70 0-97zM200 624a300 300 0 1 1 425 0 300 300 0 0 1-425 0z"/></svg>';

	$icons['close-button'] = '<svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 1006 1010"><path d="M603 504l362-362a69 69 0 1 0-98-98L505 406 143 44a69 69 0 1 0-98 98l362 362L45 866a69 69 0 1 0 98 98l362-362 362 362a69 69 0 1 0 98-98L603 504z"/></svg>';

	return $icons[ $icon ];
}


