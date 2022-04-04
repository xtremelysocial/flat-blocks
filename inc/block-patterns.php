<?php
/**
 * Block Patterns
 *
 * @package flat-blocks
 */
if ( ! function_exists( 'flat_blocks_register_block_patterns' ) ) :

	function flat_blocks_register_block_patterns() {

		$block_pattern_categories = array(
			'featured' 			=> array( 'label' => __( 'Featured', 'flat-blocks' ) ), // Core
			'header'   			=> array( 'label' => __( 'Headers', 'flat-blocks' ) ), // Core
			'query'    			=> array( 'label' => __( 'Query', 'flat-blocks' ) ), // Core
			'text'    			=> array( 'label' => __( 'Text', 'flat-blocks' ) ), // Core
			'buttons'    		=> array( 'label' => __( 'Buttons', 'flat-blocks' ) ), // Core
			'gallery'    		=> array( 'label' => __( 'Gallery', 'flat-blocks' ) ), // Core
			'columns'    		=> array( 'label' => __( 'Columns', 'flat-blocks' ) ), // Core
			'flat-blocks'   	=> array( 'label' => __( 'Flat Blocks', 'flat-blocks' ) ), // Ours
			'cover'   			=> array( 'label' => __( 'Cover Image', 'flat-blocks' ) ), // Ours
			'image'   			=> array( 'label' => __( 'Images', 'flat-blocks' ) ), // Ours
			'page'    		  	=> array( 'label' => __( 'Pages', 'flat-blocks' ) ), //ours
			'footer'   			=> array( 'label' => __( 'Footers', 'flat-blocks' ) ) // Ours
		);
		
		/**
		 * Filters the theme block pattern categories.
		 *
		 * @since Twenty Twenty-Two 1.0
		 *
		 * @param array[] $block_pattern_categories {
		 *     An associative array of block pattern categories, keyed by category name.
		 *
		 *     @type array[] $properties {
		 *         An array of block category properties.
		 *
		 *         @type string $label A human-readable label for the pattern category.
		 *     }
		 * }
		 */
		$block_pattern_categories = apply_filters( 'flat_blocks_block_pattern_categories', $block_pattern_categories );

		foreach ( $block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}

		// Load patterns
		if ( function_exists( 'register_block_pattern' ) ) {
		
			// Remove the core WordPress block patterns
			remove_theme_support( 'core-block-patterns' );

			$block_patterns = array(
				'buttons-call-to-action' => array( 
					'title' => __( 'Call to Action', 'flat-blocks' ),
					'categories' => array ( 'buttons', 'featured' )
				),
				'buttons-call-to-action-2-columns' => array( 
					'title' => __( 'Call to Action 2 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'buttons', 'columns', 'featured' )
				),
				'columns-features-2-columns' => array( 
					'title' => __( 'Features with 2 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns' )
				),
				'columns-features-3-columns' => array( 
					'title' => __( 'Features with 3 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-features-4-columns' => array( 
					'title' => __( 'Features with 4 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-map-and-address' => array( 
					'title' => __( 'Map and Address', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-pricing-table-3-columns' => array( 
					'title' => __( 'Pricing Table 3 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-pricing-table-4-columns' => array( 
					'title' => __( 'Pricing Table 4 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-recent-posts-3-columns' => array( 
					'title' => __( 'Recent Posts with 3 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns' )
				),
				'columns-social-media-3-columns' => array( 
					'title' => __( 'Social Media Icons with 3 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-social-media-4-columns' => array( 
					'title' => __( 'Social Media Icons with 4 Columns', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-teams-3-people' => array( 
					'title' => __( '3 Team Members', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'columns-teams-4-people' => array( 
					'title' => __( '4 Team Members', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'featured' )
				),
				'cover-with-scroll-to-content' => array( 
					'title' => __( 'Cover Image with Scroll to Content Arrow', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'cover', 'featured' )
				),
				'cover-with-site-title-and-tagline-scroll-to-content' => array( 
					'title' => __( 'Cover Image with Site Title and Tagline and Scroll to Content Arrow', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'cover' )
				),
				'cover-with-title-scroll-to-content' => array( 
					'title' => __( 'Cover Image with Page / Post Title and Scroll to Content Arrow', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'cover' )
				),
				'cover-with-title-and-excerpt-scroll-to-content' => array( 
					'title' => __( 'Cover Image with Page / Post Title, Excerpt, and Scroll to Content Arrow', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'cover' )
				),
				'image-gallery' => array( 
					'title' => __( 'Image Gallery', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'image' )
				),
				'image-with-left-and-right-text' => array( 
					'title' => __( 'Image with Left and Right Text', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'columns', 'image', 'featured' )
				),
				'image-computer-screen-with-title-and-text-above' => array( 
					'title' => __( 'Computer Screen Image with Title and Text Above', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'image', 'text' )
				),
				'page-home' => array( 
					'title' => __( 'Sample Home Page', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'page' )
				),
				'page-about' => array( 
					'title' => __( 'Sample About Us / Team Page', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'page' )
				),
				'page-portfolio' => array( 
					'title' => __( 'Sample Portfolio / Projects / Works Page', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'page' )
				),
				'page-services' => array( 
					'title' => __( 'Sample Services Page', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'page' )
				),
				'text-title-and-subtitle' => array( 
					'title' => __( 'Title and Subtitle', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'text' )
				),
				'text-title-and-subtitle-with-background-image' => array( 
					'title' => __( 'Title and Subtitle with Background Image', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'text', 'image', 'featured' )
				),
				'text-title-and-text' => array( 
					'title' => __( 'Title and Text', 'flat-blocks' ),
					'categories' => array ('flat-blocks', 'text' )
				)
			);

			foreach ( $block_patterns as $name => $properties ) {
			
				// Check if corresponding html file exists
				$file = get_stylesheet_directory() . '/patterns/' . $name . '.html';
				if ( file_exists( $file ) ) {

					//Get the html from the contents of the file
					$content = file_get_contents( $file );					
					if ( $content ) {

						//var_dump( $name );

						// Replace the partial URL's and image SRC's with full URL's
						$content = preg_replace( '/(\"url\":\")(.*?)(\/assets\/images\/)/', '$1' . get_stylesheet_directory_uri() . '$3', $content);
						$content = preg_replace( '/(src=\")(.*?)(\/assets\/images\/)/', '$1' . get_stylesheet_directory_uri() . '$3', $content);

						//var_dump( $properties );
										
						register_block_pattern(
							'flat-blocks/' . $name,
							array(
								'title'      => $properties['title'],
								'categories' => $properties['categories'],
								//'blockTypes' => $block_types,
								'content'    => $content
							)
						);

					} // content
				} // file_exists				
			} // foreach

				/*$pattern_name = str_ireplace( '.html', '', $block_pattern, $count);
				//if ( strpos($block_pattern, '.html') === false ) {
				if ($count < 1 ) {
					continue;
				}
				//var_dump($pattern_name); //TEST
				
				$pattern_title = ucwords( str_ireplace( '-', ' ', $pattern_name ) );
				
				$pattern_prefix = strtok( $pattern_name, '-' );

				$pattern_categories = array ( 'flat-blocks', $pattern_prefix );				
				if ( in_array( $pattern_name, $featured_patterns ) ) {
					$pattern_categories[] = 'featured';
				}
				
				$block_types = array();
				if ( in_array( $pattern_prefix, $core_block_types ) ) {
					$block_types[] = 'core/template-part/' . $pattern_prefix;
				}
								
				//$pattern_categories = explode( '-', $pattern_name );
				//var_dump($pattern_categories); //TEST
				
				// Get the html from the contents of the file
				$content = file_get_contents( get_stylesheet_directory() . '/patterns/' . $block_pattern );

				// Replace the partial URL's and image SRC's with full URL's
				$content = preg_replace( '/(\"url\":\")(.*?)(\/assets\/images\/)/', '$1' . get_stylesheet_directory_uri() . '$3', $content);
				$content = preg_replace( '/(src=\")(.*?)(\/assets\/images\/)/', '$1' . get_stylesheet_directory_uri() . '$3', $content);
										
				register_block_pattern(
					'flat-blocks/' . $pattern_name,
					array(
						'title'      => __( $pattern_title, 'flat-blocks' ),
						'categories' => $pattern_categories,
						'blockTypes' => $block_types,
						'content'    => $content
						//'content'    => file_get_contents (get_stylesheet_directory() . '/patterns/' . $block_pattern )
					)
				);
			}*/
			
			// Load our template parts as patterns too. e.g. headers, footers, etc.
			/**$template_parts = get_block_templates( 
				$query = array(), 
				$template_type = 'wp_template_part'
			);
			
			foreach ( $template_parts as $template_part ) {
				
				$part_category = strtok( $template_part->slug, "-");
				if ( array_key_exists( $part_category, $block_pattern_categories ) ) {

					$part_categories = array( 'flat-blocks', $part_category );
					
					$block_types = array();
					if ( in_array ( $part_category, $core_block_types ) ) {
						$block_types[] = 'core/template-part/' . $part_category;
					}
					
					register_block_pattern(
						'flat-blocks/' . $template_part->slug,
						array(
							'title'      => __( $template_part->title, 'flat-blocks' ),
							'categories' => $part_categories,
							'blockTypes' => $block_types,
							'content'    => $template_part->content
						)
					);

				}
			}**/

			// TEST ONLY	
			//remove_theme_support( 'core-block-patterns' );
			
			/*register_block_pattern(
				'my-plugin/powered-by-wordpress',
				array(
					'title'      => __( 'Powered by WordPress', 'my-plugin' ),
					'blockTypes' => array( 'core/paragraph', 'core/heading' ),
					'content'    => '<!-- wp:group -->
									<div class="wp-block-group">
									<!-- wp:heading {"fontSize":"large"} -->
									<h2 class="has-large-font-size"><span style="color:#ba0c49" class="has-inline-color">Hi everyone</span></h2>
									<!-- /wp:heading -->
									<!-- wp:paragraph {"backgroundColor":"black","textColor":"white"} -->
									<p class="has-white-color has-black-background-color has-text-color has-background">Powered by WordPress</p>
									<!-- /wp:paragraph -->
									</div><!-- /wp:group -->',
				)
			);*/

			// Load header /parts html files also
			/*$header_patterns = array(
				'header',
				'header-centered',
				'header-centered-no-tagline',
				'header-columns-no-tagline',
				'header-left-align',
				'header-compact',
				'header-compact-fixed',
			);

			foreach ( $header_patterns as $header_pattern ) {
				register_block_pattern(
					'flat-blocks/' . $header_pattern,
					array(
						'title'      => __( $header_pattern, 'flat-blocks' ),
						'categories' => array( 'flat-blocks', 'header' ),
						//'blockTypes' => array( 'core/template-part/header' ),
						'content'    => file_get_contents (get_stylesheet_directory() . '/parts/' . $header_pattern . '.html'),
					)
				);
			}

			// Load footer /parts html files also
			$footer_patterns = array(
				'footer',
				'footer-3-blocks-nav-social',
				'footer-3-blocks-nav-tagline',
				'footer-3-blocks-nav-text-social',
				'footer-about-3-navs',
				'footer-about-3-navs-text',
				'footer-blocks-3-columns',
				'footer-contact-info-3-columns',
				'footer-contact-info-map-and-address',
				'footer-menu-and-site-info',
			);

			foreach ( $footer_patterns as $footer_pattern ) {
				register_block_pattern(
					'flat-blocks/' . $footer_pattern,
					array(
						'title'      => __( $footer_pattern, 'flat-blocks' ),
						'categories' => array( 'flat-blocks', 'footer' ),
						//'blockTypes' => array( 'core/template-part/header' ),
						'content'    => file_get_contents (get_stylesheet_directory() . '/parts/' . $footer_pattern . '.html'),
					)
				);
			}*/

		} //endif
	} //endfunction
endif;

//add_action( 'init', 'flat_blocks_register_block_patterns', 10 );
add_action( 'init', 'flat_blocks_register_block_patterns', 100 );
//add_action( 'after_setup_theme', 'flat_blocks_register_block_patterns', 10 );
