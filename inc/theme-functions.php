<?php
/**
 * Theme Functions
 *
 * @package Flat_Blocks
 * @since 0.1
 */

/* Since there is no full-site template tag for edit page or post, add one here */
if ( ! function_exists( 'flat_blocks_add_edit_link' ) ) :
	function flat_blocks_add_edit_link ( $content ) {
		$post_id = get_the_ID();
		if( is_singular() and current_user_can( 'edit_post', $post_id ) ) {
			$content = $content . '<p class="edit-post-link has-small-font-size"><a href="' 
				. get_edit_post_link( $post_id ) 
				. '">' . __("Edit", "flat-blocks-") 
				. '</a></p>';
		}
		return $content;	
	}
	add_filter('the_content', 'flat_blocks_add_edit_link');
endif; // end ! function_exists

/**
 * Remove the [...] from the excerpt (will replace it next)
 */
if ( ! function_exists( 'flat_blocks_excerpt_more' ) ) :
	function flat_blocks_excerpt_more( $more ) {
		return '';
	}
	add_filter( 'excerpt_more', 'flat_blocks_excerpt_more' );
endif; // end ! function_exists

/**
 * Add the read more link to excerpts, except for image attachment pages
 */
if ( ! function_exists( 'flat_blocks_get_the_excerpt' ) ) :
	function flat_blocks_get_the_excerpt( $excerpt ) {

		if ( ! is_attachment() ) {
			if ( $excerpt ) {
				$excerpt .= '&hellip; ';
			}
			$excerpt .= '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'flat-blocks' ) . '</a>';
		}
		return $excerpt;
	}
	add_filter( 'get_the_excerpt', 'flat_blocks_get_the_excerpt' );
endif; // end ! function_exists

/**
 * Allow pages to have tags and categories as well as excerpts
 */
/*if ( ! function_exists( 'flat_blocks_add_page_features' ) ) :
  function flat_blocks_add_page_features() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      register_taxonomy_for_object_type( 'category', 'page' );
      
      add_post_type_support( 'page', 'excerpt' );
      
  }
	//add_action( 'init', array( $this, 'flat_blocks_add_page_features' ) );
	add_action( 'init', 'flat_blocks_add_page_features' );
endif;*/

/**
 * Adds custom color palettes to wp.color picker.
 * Note the picker only shows up to 12 colors
 * TO-DO: THIS STOPPED WORKING
 */
if ( ! function_exists( 'flat_blocks_custom_color_palettes' ) ) :
function flat_blocks_custom_color_palettes() {
	$color_palettes = json_encode(
		array(
			//'#ffffff', //white
			//'#f2f2f2', //offwhite
			//'#ebebeb', //lightgray
			//'#e7e7e7', //gray
			//'#e0e0e0', //darkgray
			//'#95a5a6', //darkergray
			'#1abc9c', //lightgreen
			'#16a085', //darkgreen
			//'#2ecc71', //brightgreen
			//'#27ae60', //darkbrightgreen
			//'#f1c40f', //yellow
			'#f39c12', //lightorange
			'#e67e22', //orange
			'#d35400', //darkorange
			'#3498db', //blue
			'#2980b9', //darkblue
			'#34495e', //midnightblue
			'#2c3e50', //darkmidnightblue
			//'#9b59b6', //purple
			//'#8e44ad', //darkpurple
			'#ff7878', //lightred
			'#e74c3c', //red 
			'#c0392b', //darkred
			//'#2f2f2f', //almostblack
			//'#222222', //notquiteblack
			//'#000000', //black
		)
	);
	add_action( 'customize_controls_enqueue_scripts', 'flat_blocks_custom_color_palettes' );
	wp_add_inline_script( 'wp-color-picker', 'jQuery.wp.wpColorPicker.prototype.options.palettes = ' . $color_palettes . ';' );
}
endif;