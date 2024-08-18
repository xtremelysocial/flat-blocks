/**
 * File:	unregister-variations.js
 * Theme: 	Flat Blocks
 * 
 * Javascript for un-registering block variations
 *
 * @package flat-blocks
 * @since	1.6.3
 * 
 * @link https://developer.wordpress.org/themes/features/block-variations/
 */

/*const { unregisterBlockVariation } = wp.blocks;
const { __ } = wp.i18n;*/

//wp.domReady( function () {
	//wp.blocks.unregisterBlockVariation( 'core/group', 'template-footer' );
    /*wp.blocks.unregisterBlockStyle( 'core/group', 'template-header' );*/
    
    wp.blocks.registerBlockVariation( 'core/template-part', {
    	name: 'site-header',
    	title: 'Site Header'
    	attributes: {
    		align: 'full',
    		className: 'is-style-section-header'
    	},
    	icon: 'format-quote',
	} );

//} );

