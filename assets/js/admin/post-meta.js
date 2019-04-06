jQuery( document ).ready( function($) {

	//COLORPICKER
	$('.colorpicker').each(function(){
	  $(this).wpColorPicker();
	});

	//POST FORMAT METABOX SWITCH
	var	$linkSettings  = $('#bean-meta-box-link').hide(),
		$videoSettings = $('#bean-meta-box-video').hide(),
		$audioSettings = $('#bean-meta-box-audio').hide(),
		$gallerySettings = $('#bean-meta-box-gallery').hide(),
		$quoteSettings = $('#bean-meta-box-quote').hide(),
		$postFormat    = $('#post-formats-select input[name="post_format"]');
	$postFormat.each(function() {
		var $this = $(this);
		if( $this.is(':checked') )
			changePostFormat( $this.val() );
	});

	$postFormat.change(function() {
		changePostFormat( $(this).val() );
	});

	function changePostFormat( val ) {
		$linkSettings.hide();
		$videoSettings.hide();
		$audioSettings.hide();
		$gallerySettings.hide();
		$quoteSettings.hide();

		if( val === 'link' ) {
			$linkSettings.show();
		} else if( val === 'video' ) {
			$videoSettings.show();
		} else if( val === 'audio' ) {
			$audioSettings.show();
		} else if( val === 'gallery' ) {
			$gallerySettings.show();
		} else if( val === 'quote' ) {
			$quoteSettings.show();
		}
	}

	//PORTFOIO POST METABOX SWITCH
	var portfolioTypeTrigger = jQuery('#_bean_portfolio_type'),
	        portfolioImage = jQuery('#bean-meta-box-portfolio-images'),
	        portfolioVideo = jQuery('#bean-meta-box-portfolio-video'),
	        portfolioAudio = jQuery('#bean-meta-box-portfolio-audio');
	        currentType = portfolioTypeTrigger.val();

    BeanSwitchPortfolio(currentType);

    portfolioTypeTrigger.change( function() {
       currentType = jQuery(this).val();
       BeanSwitchPortfolio(currentType);

    });

    function BeanSwitchPortfolio(currentType) {
        if( currentType === 'audio' ) {
            BeanHideAllPortfolio(portfolioAudio);
        } else if( currentType === 'video' ) {
            BeanHideAllPortfolio(portfolioVideo);
        } else {
            BeanHideAllPortfolio(portfolioImage);
        }
    }

    function BeanHideAllPortfolio(notThisOne) {
		portfolioImage.css('display', 'none');
		portfolioVideo.css('display', 'none');
		portfolioAudio.css('display', 'none');
		notThisOne.css('display', 'block');
	}
});