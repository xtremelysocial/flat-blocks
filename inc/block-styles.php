<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package Flat_Blocks
 * @since 0.1
 */

//add_filter( 'should_load_separate_core_block_assets', '__return_true' );

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 0.1
	 *
	 * @return void
	 */
	function flat_blocks_register_block_styles() {

		//wp_register_style('flat-blocks-custom-styles', get_stylesheet_directory_uri() . '/assets/css/custom-styles.css', array(), wp_get_theme()->get( 'Version' ) );
		//wp_register_style('flat-blocks-custom-sticky', get_stylesheet_directory_uri() . '/assets/css/custom-sticky.css', array(), wp_get_theme()->get( 'Version' ) );

		//wp_register_style('flat-blocks-custom-styles', get_stylesheet_directory_uri() . '/assets/css/custom-styles.css' );
		/*wp_register_style('flat-blocks-custom-styles', get_template_directory_uri() . '/assets/css/custom-styles.css' );
		wp_enqueue_style( 'flat-blocks-custom-styles' ); //TEST

		wp_register_style('flat-blocks-custom-sticky', get_stylesheet_directory_uri() . '/assets/css/custom-sticky.css' );
		wp_enqueue_style( 'flat-blocks-custom-sticky' ); //TEST*/
		
		/*--------------------------------------------------------------
		# Sticky Header and Menu
		--------------------------------------------------------------*/
		 
		// Sticky Header
		register_block_style(
			'core/template',
			array(
				'name'  => 'sticky-header',
				'label' => esc_html__( 'Sticky Header', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-sticky'
			)
		);
				 
		// Sticky Header
		/*register_block_style(
			'core/group',
			array(
				'name'  => 'sticky-header',
				'label' => esc_html__( 'Sticky Header', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-sticky'
			)
		);*/

		// Sticky Menu
		register_block_style(
			'core/navigation',
			array(
				'name'  => 'sticky-menu',
				'label' => esc_html__( 'Sticky Menu', 'flat-blocks' ),
				'style_handle' => 'flat-blocks-custom-sticky'
				/*'inline_style' => '.wp-site-blocks .site-header { position: fixed; top: 0; left: var(--wp--custom--gap--horizontal); right: var(--wp--custom--gap--horizontal); width: 100%; z-index: 10; }'
								  . '.wp-site-blocks { padding-top: 63px; }'*/
			)
		);

		/*--------------------------------------------------------------
		# Cover styles
		--------------------------------------------------------------*/
		 
		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'cover-border',
				'label' => esc_html__( 'Borders', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*--------------------------------------------------------------
		# Media and Text styles
		--------------------------------------------------------------*/
		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'media-text-border',
				'label' => esc_html__( 'Borders', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*--------------------------------------------------------------
		# Image styles
		--------------------------------------------------------------*/
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'image-border',
				'label' => esc_html__( 'Borders', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Image: Frame.
		/*register_block_style(
			'core/image',
			array(
				'name'  => 'image-frame',
				'label' => esc_html__( 'Frame', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/

		/*--------------------------------------------------------------
		# Featured Images (post / page "Thumbnails")
		--------------------------------------------------------------*/
		// Featured Image: No Borders.
		register_block_style(
			'core/featured-image',
			array(
				'name'  => 'image-no-border',
				'label' => esc_html__( 'No Borders', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*--------------------------------------------------------------
		# Latest Posts and Latest Comments styles
		--------------------------------------------------------------*/
		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'latest-posts-borders',
				'label' => esc_html__( 'Borders', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Latest Posts: Plain.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'latest-posts-plain',
				'label' => esc_html__( 'Plain', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Latest Comments: Plain.
		register_block_style(
			'core/latest-comments',
			array(
				'name'  => 'latest-comments-plain',
				'label' => esc_html__( 'Plain', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// List: Plain.
		/*register_block_style(
			'core/list',
			array(
				'name'  => 'list-plain',
				'label' => esc_html__( 'Plain', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/

		/*--------------------------------------------------------------
		# Group styles
		--------------------------------------------------------------*/
		// Group: Padding.
		/*register_block_style(
			'core/group',
			array(
				'name'  => 'padding',
				'label' => esc_html__( 'Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/

		// Group: Thick Padding.
		register_block_style(
			'core/group',
			array(
				'name'  => 'thick-padding',
				'label' => esc_html__( 'Thick Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: Thin Padding.
		register_block_style(
			'core/group',
			array(
				'name'  => 'thin-padding',
				'label' => esc_html__( 'Thin Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: No Padding.
		register_block_style(
			'core/group',
			array(
				'name'  => 'no-padding',
				'label' => esc_html__( 'No Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'group-border',
				'label' => esc_html__( 'Borders', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: Thick top border.
		register_block_style(
			'core/group',
			array(
				'name'  => 'thick-top-border',
				'label' => esc_html__( 'Thick Top Border', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: Thin top border.
		register_block_style(
			'core/group',
			array(
				'name'  => 'thin-top-border',
				'label' => esc_html__( 'Thin Top Border', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);
		
		// Group: Thick bottom border.
		register_block_style(
			'core/group',
			array(
				'name'  => 'thick-bottom-border',
				'label' => esc_html__( 'Thick Bottom Border', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: Thin bottom border.
		register_block_style(
			'core/group',
			array(
				'name'  => 'thin-bottom-border',
				'label' => esc_html__( 'Thin Bottom Border', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Group: No Margins (well, no top or bottom margins. Need to leave left and right for wide group handling.).
		register_block_style(
			'core/group',
			array(
				'name'  => 'no-margin',
				'label' => esc_html__( 'No Margin', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*--------------------------------------------------------------
		# Columns styles
		--------------------------------------------------------------*/
		// Columns: Center on Mobile.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'center-on-mobile',
				'label' => esc_html__( 'Center on Mobile', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Columns: Thick Padding.
		/*register_block_style(
			'core/columns',
			array(
				'name'  => 'thick-padding',
				'label' => esc_html__( 'Thin Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Columns: Thin Padding.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'thin-padding',
				'label' => esc_html__( 'Thin Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Columns: No Padding.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'no-padding',
				'label' => esc_html__( 'No Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/

		// Columns: No Margin.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'no-margin',
				'label' => esc_html__( 'No Margin', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*--------------------------------------------------------------
		# Column styles
		--------------------------------------------------------------*/
		// Column: Thick Padding.
		register_block_style(
			'core/column',
			array(
				'name'  => 'thick-padding',
				'label' => esc_html__( 'Thick Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Column: Regular Padding.
		register_block_style(
			'core/column',
			array(
				'name'  => 'regular-padding',
				'label' => esc_html__( 'Regular Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Column: Thin Padding.
		register_block_style(
			'core/column',
			array(
				'name'  => 'thin-padding',
				'label' => esc_html__( 'Thin Padding', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		// Column: No margin.
		/*register_block_style(
			'core/column',
			array(
				'name'  => 'no-margin',
				'label' => esc_html__( 'No Margin', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/
		
		// Columns: Overlap.
		/*register_block_style(
			'core/columns',
			array(
				'name'  => 'columns-overlap',
				'label' => esc_html__( 'Overlap', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/

		/*--------------------------------------------------------------
		# Separator styles
		--------------------------------------------------------------*/
		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'separator-thick',
				'label' => esc_html__( 'Thick', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);
		
		/*--------------------------------------------------------------
		# Post Meta styles
		--------------------------------------------------------------*/
		register_block_style(
			'core/post-author',
			array(
				'name'			=> 'no-icon',
				'label'			=> __( 'No Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		register_block_style(
			'core/post-date',
			array(
				'name'			=> 'no-icon',
				'label'			=> __( 'No Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		register_block_style(
			'core/post-terms',
			array(
				'name'			=> 'no-icon',
				'label'			=> __( 'No Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*register_block_style(
			'core/post-terms',
			array(
				'name'			=> 'no-icon-cats',
				'label'			=> __( 'With Category Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/
		
		register_block_style(
			'core/post-comment-count',
			array(
				'name'			=> 'no-icon',
				'label'			=> __( 'No Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

		/*--------------------------------------------------------------
		# Elements styles
		--------------------------------------------------------------*/
		/*register_block_style(
			'core/paragraph',
			array(
				'name'			=> 'down-arrow-icon',
				'label'			=> __( 'Down Arrow Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);*/

		register_block_style(
			'core/link',
			array(
				'name'			=> 'down-arrow-icon',
				'label'			=> __( 'Down Arrow Icon', 'flat-blocks' ),
				'style_handle'	=> 'flat-blocks-custom-styles'
			)
		);

	}
	add_action( 'init', 'flat_blocks_register_block_styles' );
}
