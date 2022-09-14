$(() => {

	// ------------ Testimonial active
	$('.testimonial-active').owlCarousel({
		loop: true,
		nav: false,
		autoplay: false,
		autoplayTimeout: 5000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
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
	})
	// ------------ Testimonial 2 active
	$('.testimonial-2-active').owlCarousel({
		loop: true,
		margin: 20,
		nav: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		items: 2,
		responsive: {
	    0: {
	      items: 1
	    },
	    600: {
	      items: 1
	    },
	    800: {
	      items: 1
	    },
	    992: {
	      items: 2
	    },
	    1024: {
	      items: 2
	    },
	    1200: {
	      items: 2
	    },
	    1400: {
	      items: 2
	    },
	    1920: {
	      items: 2
	    }
		}
	});
});