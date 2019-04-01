<?php

namespace GenesisCustomizer;

add_action( 'customize_controls_print_styles', __NAMESPACE__ . '\kirki_styles', 99 );
/**
 * Adds custom inline styles to Customizer screen.
 *
 * @since  1.0.0
 *
 * @return void
 */
function kirki_styles() {
	echo '
		<style id="genesis-customizer-inline-css">
		.kirki-host-font-locally{
			display:none;
		}
		.wp-color-result .color-alpha {
			height: 22px !important;
		}
		.wp-picker-active .iris-picker {
			margin-bottom: 12px;
		}
		.customize-control-kirki-dimensions .wrapper .control > div h5 {
			margin-top: 0;
		}
		.customize-control-kirki-typography .wrapper {
            padding-top: 0;
		}
		.customize-control-kirki-box-shadow .kirki-input-container {
		  	margin-bottom: 12px; 
		}
		.customize-control-kirki-box-shadow .preview-wrapper {
			height: 150px;
		    border: 1px solid #ddd;
		}
		.customize-control-kirki-box-shadow .preview-object {
			background: #f2f2f2;
			color: #333;
			padding: 10px;
			width: 50px;
			height: 50px;
			position: absolute;
			top: calc(50% - 25px);
			left: calc(50% - 25px);
			-webkit-box-sizing: border-box;
			box-sizing: border-box; 
		}
		.customize-control-kirki-box-shadow .preview-object .dashicons {
		    font-size: 30px;
		    width: 30px;
		    height: 30px; 
		}
		.customize-control-kirki-box-shadow input[type="range"] {
			width: 100%; 
		}
		.customize-control-kirki-box-shadow .coordinates {
			font-size: 9px;
			margin-left: -5px;
			margin-right: -5px;
			margin-top: -5px;
			display: block;
			text-align: center; 
		}  
		.background-wrapper .background-color {
		  	display:none;
		}
		.customize-control-kirki-radio-image label {
    		padding: 0 8px 8px 0;
		}
		.customize-control-kirki-radio-image input:checked + label img {
		    box-shadow: none;
		    border: 0;
		}
		.customize-control-kirki-radio-image input:not(:checked) + label img {
    		background: #bdc3c7;
		}
		.customize-control-kirki-sortable ul.ui-sortable li {
 		   border-color: #ddd;
		}
		.customize-control-kirki-dimensions .wrapper,
		.customize-control-kirki-typography .wrapper {
			border: 0;
			padding: 0;		
		}
		.customize-control-kirki-dimensions .wrapper .control > div h5 {
    		margin-bottom: 1px;
		}
		.customize-control hr {
			margin-bottom: 0;
		}
		.customize-control-code_editor .CodeMirror {
    		height: calc(100vh - 320px);
		}
		.CodeMirror-sizer {
		    margin-left: 46px !important;
		    margin-bottom: 0px !important;
		    border-right-width: 30px !important;
		    min-height: 62px !important;
		    padding-right: 0px !important;
		    padding-bottom: 0px !important;
		}
		.CodeMirror-gutter.CodeMirror-linenumbers {
			width: 29px !important;
		}
		#customize-control-genesis-customizer_footer_footer-widgets_columns img,
		#customize-control-genesis-customizer_header_above-header_layout img,
		#customize-control-genesis-customizer_footer_above-footer_layout img,
		#customize-control-genesis-customizer_header_primary_layout img {
			width: 76px;
		}
		#customize-control-genesis-customizer_header_primary_mobile-layout img {
			width: 60px;
		}
		.customize-control[style="display: none;"] + .customize-control-kirki-custom hr {
    		opacity: 0;
		}
		#accordion-section-genesis-customizer_pro h3 {
			cursor: pointer;
			border: 0;
			margin: 0;
    		padding: 1px 0;
    		position: relative;
		}
		#accordion-section-genesis-customizer_pro a {
			text-decoration:none;
			display:block;
			background:#fff;
			padding:11px 10px 12px 14px;
			border-left: 4px solid #fff;
		}
		#accordion-section-genesis-customizer_pro a:after {
	    	content: "\\f345";
	    	display: block;
		    position: absolute;
		    top: 11px;
		    right: 10px;
		    z-index: 1;
		    float: right;
		    border: none;
		    background: 0 0;
		    font: normal 20px/1 dashicons;
		    speak: none;
		    padding: 0;
		    text-indent: 0;
		    text-align: center;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		</style>
		';
}
