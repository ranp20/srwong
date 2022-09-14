$(() => {
	// ------------ magnificPopup video popup
	$('.video-popup').magnificPopup({
	  type: 'iframe'
	});

	// ------------ blog gallery slider
	$('.blog-gallery-slider').owlCarousel({
		loop: true,
		nav: true,
		autoplay: true,
		autoplayTimeout: 5000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		navText: ['<i class="ion-chevron-left"></i>', '<i class="ion-chevron-right"></i>'],
		item: 1,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});
});