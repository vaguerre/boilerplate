<?php

add_action( 'cmb2_admin_init', 'interntest_hero_metabox' );
/**
 * Define the metabox and field configurations.
 */
function interntest_hero_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_interntest_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'                  => 'hero_metabox',
    'title'               => __( 'Hero Options', 'cmb2' ),
    'object_types'        => array( 'page', ), // Post type
    'context'             => 'advanced',
    'priority'            => 'high',
    'show_names'          => true, // Show field names on the left
  ) );

  // Regular text field
  $cmb->add_field( array(
    'name'                => __( 'Alternate Hero Title', 'cmb2' ),
    'id'                  => $prefix . 'hero_title_alt',
    'type'                => 'text',
    'row_classes'         => 'cmb2-row--group',
  ) );

  $cmb->add_field( array(
    'name'                => __( 'Subtitle', 'cmb2' ),
    'id'                  => $prefix . 'hero_subtitle',
    'type'                => 'textarea_small',
    'row_classes'         => 'cmb2-textarea--double',
  ) );
}


?>
