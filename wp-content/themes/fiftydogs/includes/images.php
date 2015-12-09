<?php
/*
 * Image Functions
 */



function fiftydogs_the_featured_image( $size )
{
  global $post;
  $size    = isset( $size ) ? $size : 'full';
  
  if( has_post_thumbnail() ) {
      $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
      $background = $background[0];    
  } 
  // else {
  //   $background = '/wp-content/themes/unitedwaydallas/assets/img/sample1.jpg';
  // }
  echo $background;
}


/**
 * Hero Images
 * Standard hero/slide images on various pages, retina and normal dpi
 * 
 * hero-image-2x        - @2x - 1920x1056
 * hero-image-1x        - @1x - 1400x770
 *
 * grid-fourth-2x       - @2x - 700x500
 * grid-fourth-1x       - @1x - 350x250
 */
add_image_size( 'hero-image-2x', 1900, 9999 );
add_image_size( 'hero-image-1x', 1400, 9999 );

add_image_size( 'grid-fourth-2x', 700, 9999 );
add_image_size( 'grid-fourth-1x', 350, 9999 );