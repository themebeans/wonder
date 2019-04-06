/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 
( function( $ ) {

	//LIVE HTML
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.logo_text' ).html( newval );
		} );
	} );
		
	wp.customize( 'header_tagline', function( value ) {
		value.bind( function( newval ) {
			$( '.header-tagline' ).html( newval );
		} );
	} );
	
	wp.customize( 'footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '.copyright' ).html( newval );
		} );
	} );
	
	wp.customize( 'related_portfolio_title', function( value ) {
		value.bind( function( newval ) {
			$( '.related-title h1' ).html( newval );
		} );
	} );
	
	//LIVE CSS
	wp.customize( 'overlay_color', function( value ) {
		value.bind( function( newval ) {
			$('#isotope-container div.overlay').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'overlay_text_color', function( value ) {
		value.bind( function( newval ) {
			$('#isotope-container li a div.overlay h4, #isotope-container li a div.overlay h4 span').css('color', newval );
		} );
	} );
	
} )( jQuery );