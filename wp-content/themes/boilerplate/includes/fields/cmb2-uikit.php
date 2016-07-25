<?php

add_action( 'cmb2_admin_init', 'fiftyboilerplate_hero_metabox' );
/**
 * Define the metabox and field configurations.
 */
function fiftyboilerplate_uikit_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_fiftyboilerplate_uikit_';

  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'                  => 'uikit_metabox',
    'title'               => __( '01 - Sample', 'cmb2' ),
    'object_types'        => array( 'page', ), // Post type
    'show_on'             => array( 'key' => 'page-template', 'value' => 'templates/uikit.php' ), 
    'context'             => 'advanced',
    'priority'            => 'high',
    'show_names'          => true, // Show field names on the left
  ) );

  // Regular text field
  $cmb->add_field( array(
    'name'                => __( 'Sample Field', 'cmb2' ),
    'id'                  => $prefix . 'sample',
    'type'                => 'text',
    'row_classes'         => 'cmb2-row--group',
  ) );

}


?>
