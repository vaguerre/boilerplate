<?php

// Include CMB2 globally for this site.
require WPMU_PLUGIN_DIR . '/cmb2/init.php';


// Attached Posts
if ( ! function_exists( 'cmb2_attached_posts_fields_render' ) ) {
	require_once WPMU_PLUGIN_DIR . '/cmb2-attached-posts/cmb2-attached-posts-field.php';
}


// Include Simple Page Builder globally for this site.
require WPMU_PLUGIN_DIR . '/wds-simple-page-builder/wds-simple-page-builder.php';