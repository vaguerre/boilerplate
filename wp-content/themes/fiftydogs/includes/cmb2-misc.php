<?php
/**
 * CMB2 Custom styles
 */
function oasisla_cmb2_custom_styles() {
	echo '<style type="text/css">

	#advanced-sortables {
		padding-top: 20px;
	}
	.cmb2-textarea--single textarea {
		height: 31px;
	}
	.cmb2-textarea--double textarea {
		height: 62px;
	}
	.cmb2-text--full input {
		width: 100%;
	}
	.cmb2-row-title--alt h5 {
		font-weight: normal;
		font-style: normal !important;
		color: #aaa;
		font-size: 14px !important;;
	}
	#side-sortables .cmb2-row-title--alt {
		padding: 1em 0 0 !important;
		margin: 0;
		border-bottom: none;
	}
	.cmb2-row--group .cmb-th,
	.cmb2-row--group .cmb-td {
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.cmb2-row--group {
		padding: 0 !important;
		border-bottom: 0 !important;
	}
	.cmb2-row--border-top {
		border-top: 1px solid #e9e9e9 !important;
		margin-top: 1.6em !important;
		padding-top: 1.8em !important;
	}
	.cmb2-row--group.cmb2-row--border-top {

	}
	.cmb-type-custom-attached-posts .attached-posts-section {
		margin-top: 0;
	}
	.cmb2-row--title {
		border-top: 1px solid #e9e9e9;
		margin-top: 1.6em !important;
		padding-top: 0.8em !important;
		padding-bottom: 0 !important;
	}
	.cmb2-row--border-bottom-none {
		border-bottom: none !important;
	}

	.cmb-row.mb0 {
		margin-bottom: 0 !important;
	}
	.cmb2-wrap input.cmb2-text-small, .cmb2-wrap input.cmb2-timepicker {
		width: 175px;
	}
	#ui-datepicker-div {
		z-index: 9999;
	}
 </style>';
}
add_action('admin_head', 'oasisla_cmb2_custom_styles');

