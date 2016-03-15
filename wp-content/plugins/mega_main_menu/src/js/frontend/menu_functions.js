;;;
/* 
 * Function for Mega Main Menu.
 */
;jQuery(document).ready(function(){

	/* 
	 * Unbinded all previous JS actions with menu.
	 */
	;jQuery( '#mega_main_menu, #mega_main_menu *' ).unbind();

	/* 
	 * Mobile toggle menu
	 */
	;jQuery( '.mobile_toggle' ).click(function() {
		jQuery( this ).parent().toggleClass( 'mobile_menu_active' );
		jQuery( '#mega_main_menu .mobile_active_parent' ).removeClass('mobile_active_parent');
	});



	/* 
	 * Mobile Double tap to go
	 */
	;(function( $, window, document, undefined )
	{
		$.fn.doubleTapToGo = function( params )
		{
			if( !( 'ontouchstart' in window ) &&
	/*
				!navigator.msMaxTouchPoints &&
				!/Android|webOS|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
				!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
	*/
				!/Android|webOS|iPhone|iPad|iPod|BlackBerry|Opera Mini/i.test(navigator.userAgent)
			) { return false; }
			this.each( function()
			{
				var curItem = false;

				$( this ).on( 'click', function( e )
				{
					jQuery( '#mega_main_menu .mobile_active_parent' ).removeClass( 'mobile_active_parent' );
					jQuery( this ).addClass('mobile_active_parent');
					if( /iPhone|iPad|iPod/i.test(navigator.userAgent) ) { 
						return false; 
					}
					var item = $( this );
					if( item[ 0 ] != curItem[ 0 ] )
					{
						e.preventDefault();
						curItem = item;
					}
				});

				$( document ).on( 'click touchstart MSPointerDown', function( e )
				{
					var resetItem = true,
						parents	  = $( e.target ).parents();

					for( var i = 0; i < parents.length; i++ )
						if( parents[ i ] == curItem[ 0 ] )
							resetItem = false;

					if( resetItem )
						curItem = false;
				});
			});
			return this;
		};
	})( jQuery, window, document );
	;jQuery( '#mega_main_menu li:has(ul)' ).doubleTapToGo();

	/* 
	 * Sticky menu
	 */
	;jQuery( '#mega_main_menu > .menu_holder' ).each(function(index,element){

		var stickyoffset = [];
		var menu_inner_width = [];
		var menu_inner = [];
		var style_attr = [];
		menu_inner[ index ] = jQuery( element ).find( '.menu_inner' );
		stickyoffset[ index ] = jQuery( element ).data( 'stickyoffset' ) * 1;

		if ( jQuery( element ).attr( 'data-sticky' ) == '1' && stickyoffset[ index ] == 0 ) {
			menu_inner_width[ index ] = menu_inner[ index ].width();
			menu_inner[ index ].attr( 'style' , 'width:' + menu_inner_width[ index ] + 'px;' );
			jQuery( element ).addClass( 'sticky_container' );
		} else {
			;jQuery(window).on('scroll', function(){
				if ( jQuery( element ).attr( 'data-sticky' ) == '1' ) {
					scrollpath = jQuery(window).scrollTop();
					if ( scrollpath > stickyoffset[ index ] ) {
						if ( !jQuery( element ).hasClass( 'sticky_container' ) ) {
							menu_inner_width[ index ] = menu_inner[ index ].width();
							jQuery( element ).find( '.menu_inner' ).attr( 'style' , 'width:' + menu_inner_width[ index ] + 'px;' );
							jQuery( element ).addClass( 'sticky_container' );
						}
					} else {
						jQuery( element ).removeClass( 'sticky_container' );
						style_attr[ index ] = jQuery( menu_inner[ index ] ).attr( 'style' );
						if ( typeof style_attr[ index ] !== 'undefined' && style_attr[ index ] !== false ) {
							menu_inner[ index ].removeAttr( 'style' );
						}
					}
				} else {
					jQuery( element ).removeClass( 'sticky_container' );
				}
			});
		}
	});

	/* 
	 * Smooth scroll to anchor link
	 */
	jQuery(function() {
		jQuery('#mega_main_menu a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = jQuery(this.hash);
				target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					jQuery('html,body').animate({
						scrollTop: target.offset().top - 90
					}, 600);
					return false;
				}
			}
		});
	});


});
