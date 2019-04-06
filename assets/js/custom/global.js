// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

( function( a ) {
	"use strict";

/* Portfolio Isotope */
function isotope() {

	var container = a('#isotope-container');

	container.imagesLoaded( function() {

		container.isotope({
			transitionDuration: '0.2s',
			itemSelector: '.isotope-item',
			resizesContainer: true,
			isResizeBound: true,
			stagger: 0,
			percentPosition: true,
			masonry: {
				columnWidth: '.grid-sizer',
				gutter: '.gutter-sizer',
			},
			hiddenStyle: {
				opacity: 0
			},
			visibleStyle: {
				opacity: 1
			}
		});
	});
}

a(window).load(function() {
	isotope();
});

} )( jQuery );

jQuery(document).ready(function($) {

	//DROPDOWNS - SUPERFISH
	$('#primary-nav > ul')
		.superfish({
			delay:0,
			speed: 1,
			speedOut:1,
			disableHI: true,
			cssArrows: false,
		});

	//FITVID
	 $("body").fitVids();

  	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); }

	//BACK TO TOP
	jQuery().UItoTop({
		text: '',
	});

	//BACKSTRETCH
	if( $().backstretch ) {
		$customBG = $('.backstretch');
		$.each($customBG, function() {
			var $this = $(this),
				url = $this.data('url');
			if( url ) {
				$(this).backstretch(url);
			}
		});
	}

	//RESPONSIVE MENU TOGGLE
	$('.js #menu-toggle').click(function (e) {
	  $('body').toggleClass('active');
	  e.preventDefault();
	});

	// HEADER OVERLAY
	var overlay = $('#overlay'),
		overContainer = $('.overlay-container'),
	    overTrigger = $('.header-controls a.trigger'),
	    overicon = $('.header-controls .trigger');

	overTrigger.toggle(function(){
	    overContainer.slideDown(parseInt(400));
	    overicon.addClass('open');
	    overicon.removeClass('closed');

	}, function(){
	    overContainer.slideUp(parseInt(400));
	    overicon.addClass('closed');
	    overicon.removeClass('open');
	});

	// IE8
	var $browserMSIE = $.browser.msie;
	var $browserVersion = parseInt($.browser.version, 10);

	if ($browserMSIE && $browserVersion === 8) {
		$('body').addClass('ie-8');
	} else {}
});