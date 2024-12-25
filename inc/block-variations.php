<?php
/**
 * File:	block-variations.php
 * Theme:	Flat Blocks
 * 
 * Adds special Group Variations for our theme's Template Parts
 * 
 * Note that each style's attributes are stored in /styles/template-parts folder as
 * theme.json partials.
 * 
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 * 
 * @package flat-blocks
 * @since	1.6.5
 */

/*
 * Register block variations with javascript
 * 
 * NOTE: This method allows for hiding variations from the inserter, but it does NOT
 * allow the user to change the styles in the Editor.
 */
/* 
if ( ! function_exists( 'flatblocks_register_block_variations' ) ) :

	add_action( 'enqueue_block_editor_assets', 'flatblocks_register_block_variations' );

	function flatblocks_register_block_variations() {
		wp_enqueue_script(
			'flatblocks-block-variations',
			get_theme_file_uri( 'assets/js/block-variations.js' ),
			array( 
				'wp-blocks', 
				'wp-dom-ready',
				'wp-i18n'
			),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

endif;
 */

/* 
 * Register our special Block Variations. Use an array so child themes can alter them.
 * 
 * NOTE: This method actually creates Block Styles, not Block Variations. They appear
 * as custom styles in the Editor. Those styles can be edited by the user. There is no
 * way to suppress them from showing up as a style on the group though. 
 */
/* 
if ( ! function_exists( 'flatblocks_add_block_variations' ) ) :

	add_filter( 'block_type_metadata', 'flatblocks_add_block_variations' ); 

	function flatblocks_add_block_variations( $metadata ) {
	
	    if ( ! isset( $metadata['name'] ) ) {
        	return $metadata;
	    }

		 // Define custom styles and what blocks they apply to. Note that the prefix 
		 // 'is-style-' will automatically be added to the names.
		$block_variations = array(
			'core/group' => array(
				array(
					'name'  => 'template-header', 
					'label' => __('Template Header', 'flat-blocks'),
					'title' => __('Template Header', 'flat-blocks'),
					'attributes' => array(
						'tagName'	=> 'header',
						'align' 	=> 'full',
						'className'	=> 'site-header is-style-template-header'
					),
					"scope" => array( 'block' ), // Don't show in inserter
					"inserter" => false
				),
// 				array(
// 					'name'  => 'page-title', 
// 					'label' => __('Page Title', 'flat-blocks') 
// 				),
// 				array(
// 					'name'  => 'site-aside', 
// 					'label' => __('Site Aside', 'flat-blocks') 
// 				), 
// 				array(
// 					'name'  => 'site-footer', 
// 					'label' => __('Site Footer', 'flat-blocks') 
// 				),
// 				array(
// 					'name'  => 'site-footer-alt', 
// 					'label' => __('Site Footer Alt', 'flat-blocks') 
// 				),
			),
		);
		
		// Apply filter to the custom styles list so child themes can override
		$block_variations = apply_filters( 'flatblocks_block_variations', $block_variations );
		//if ( $_GET['debug'] ) var_dump( $block_variations ); //TEST
		
		// Find the block in our array and register the variations if there are any	
		/////$block_name = $metadata['name'];
		//$key = array_search( $metadata['name'], $block_variations ); 
		//if ( $_GET['debug'] ) var_dump( $metadata['name'], $key ); //TEST
		
		// Loop through each block and register the custom style
		/////if ( isset( $block_variations[$block_name] ) ) {
			/////foreach ( $block_variations[$block_name] as $index => $variation ) {
		if ( isset( $block_variations[$metadata['name']] ) ) {
			foreach ( $block_variations[$metadata['name']] as $index => $variation ) {
				$metadata['styles'][] = $variation;
				//$metadata['variations'][] = $variation;
			}
		}
		
		return $metadata;
	}
endif;
 */

/* 
 * Register our special Block Variations. Use an array so child themes can alter them.
 * 
 * NOTE: This method actually creates Block Variations, not Block Styles. They appear
 * as separate Blocks to be inserted in the Editor. However, they are not able to be 
 * styled by the user in the Editor unfortunately.
 */
/* 
if ( ! function_exists( 'flatblocks_register_block_variations' ) ) :

	add_filter( 'get_block_type_variations', 'flatblocks_block_type_variations', 10, 2 );

	function flatblocks_block_type_variations( $variations, $block_type ) {
	
		if ( 'core/group' === $block_type->name ) {
			$variations[] = array(
				'name'       => 'template-header',
				'title'      => __( 'Template Header', 'flat-blocks' ),
				'icon'		 => 'superhero-alt',
				'isActive'   => array(
					'tagName',
					'align',
					'className'
				),
// 				'attributes' => array(
// 					'mediaPosition' => 'right'
// 				)
				'attributes' 	=> array(
					'tagName'	=> 'header',
					'align' 	=> 'full',
					'className'	=> 'site-header is-style-template-header'
				)
			);
			//var_dump($variations); //TEST		
		}

		return $variations;
	}
endif;
 */
 
/* 
 * NOTE: This method can be used to alter the block supports, such as colors and padding
 * which can then be edited by the user.
 */
// if ( ! function_exists( 'flatblocks_block_variations' ) ) :
// 
// 	add_filter( 'block_type_metadata', 'flatblocks_block_variations', 20 ); 
// 	 
// 	function flatblocks_block_variations( $metadata ) {
// 	
// 		if ( ! isset( $metadata['name'] ) || 'core/group' !== $metadata['name'] ) {
// 		//if ( ! isset( $metadata['name'] ) || 'core/template-part' !== $metadata['name'] ) {
// 				return $metadata;
// 		}
// 
// 		Hide these special variations from insertion into content (but leave them
// 		available for stying)
// 		$metadata['supports']['inserter'] = false;
// 
// 		Allow colors		
// 		$metadata['supports']['color'] = [
// 			'background' => true,
// 			'text' => true,
// 			//'gradients' => true,
// 			'link' => true,
// 			'heading' => true,
// 			'button' => true
// 		];
// 
// 		Allow Spacing		
// 		$metadata['supports']['spacing'] = [
// 			'margin' => true,
// 			'padding' => true,
// 			'blockGap' => true
// 		];
// 
// 		Allow typography
// 		$metadata['supports']['typography'] = true;
// 		$metadata['supports']['typography']['fontSize'] = true;
// 		$metadata['supports']['typography']['lineHeight'] = true;
// 		$metadata['supports']['typography']['textAlign'] = true;
// 
// 		Allow other properties
// 		$metadata['supports']['align'] = true;
// 		$metadata['supports']['postion'] = true;
// 		$metadata['supports']['experimentalBorder'] = true;
// 		$metadata['supports']['border'] = true;
// 		$metadata['supports']['shadow'] = true;
// 		$metadata['supports']['customClassName'] = true;
// 				
// 		return $metadata;
// 	}
// endif;
 
