jQuery( document ).ready( function( $ ) {

	function screenResize() {
		if ( $( '.wp-block-group.is-style-fixed-header' ).length ) {
			var adminbarHeight = parseInt( $( '#wpadminbar' ).outerHeight() );
			if ( adminbarHeight > 0 ) {
				$( '.wp-block-group.is-style-fixed-header' ).css( { 'top' : adminbarHeight + 'px' } );
			}
			var fixedHeaderHeight = parseInt( $( '.wp-block-group.is-style-fixed-header' ).outerHeight() );
			if ( fixedHeaderHeight > 0 ) {
				/*$( 'body' ).css( { 'padding-top' : fixedHeaderHeight + 'px' } );*/
				$( '.wp-site-blocks' ).css( { 'padding-top' : fixedHeaderHeight + 'px' } );
			}
		}
	}
  
	screenResize();

	jQuery( window ).resize( function() {
		screenResize();
	} );

} );
