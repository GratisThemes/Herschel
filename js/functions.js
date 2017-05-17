(function($){

	const $window = $(window)
	const $document = $(document)
	const $htmlAndBody = $document.find('html, body')
	const $html = $document.find('html')
	const $body = $document.find('body')
	const $menuHeaderToggle = $document.find('#menu-toggle')
	const $menuHeaderContainer = $document.find('#header-menu-container')
	const $archiveTitle = $document.find('.archive .content-title')
	const $scrollToTop = $document.find('#scroll-to-top')
	const $videoPosts = $document.find('.single-format-video .post')

	// Adds JS class to header
	$html.removeClass('no-js').addClass('js')

	// Remove prefix from archive titles
	if ($archiveTitle.length) {
		const archiveTitle = $archiveTitle.html().split(': ')
		
		if (archiveTitle.length > 1) {
			archiveTitle.shift()
			$archiveTitle.html(archiveTitle.join(': '))
		}
	}

	// Make sure video embeds are full width and 16:9
	function fullWidthVideoEmbeds() {
		const $videoEmbeds = 
			$videoPosts.find('iframe, video, embed, object, .video-player, .videopress-placeholder')
	
		if ($videoEmbeds.length) {
			for (let x=0; x<$videoEmbeds.length; x++) {
				const $video = $($videoEmbeds[x])
				$video.width('100%')
				$video.height(($video.width()/16) * 9)
			}
		}
	}

	if ($videoPosts.length) fullWidthVideoEmbeds()
	
	$window.resize(() => {
		if ($videoPosts.length) fullWidthVideoEmbeds()
	})

	// Menu and Social bar
	$window.resize(() => {
		const $header = $document.find('#site-header')
		const $socialBar = $document.find('#herschel-social-media-links')
		const mm = window.matchMedia( '(max-width: 960px)' )

		mm.matches ? $menuHeaderContainer.hide() : $menuHeaderContainer.show()

		if( mm.matches ){
			$socialBar.css( 'padding-top', '10px' )
		}else if( !$body.hasClass('no-social-icons') ){
			$socialBar.css( 'padding-top', $header.height() )
		}
	})

	$menuHeaderToggle.on('click', () => $menuHeaderContainer.toggle())

	// Scroll to top button
	$document.on('scroll', () => {
		$document.scrollTop() ? $scrollToTop.fadeIn(500) : $scrollToTop.fadeOut(500)
	})
	
	$scrollToTop.on('click', () => {
		$htmlAndBody.animate({scrollTop:0}, 500)
		return false;
	})

})(jQuery);
