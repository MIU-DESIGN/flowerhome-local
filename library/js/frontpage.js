jQuery(function() {
	var mySwiper = new Swiper('.property-slide-wrap01 .swiper-container', {
		slidesPerView: 4,
		spaceBetween: 40,
		centeredSlides: true,
		loop: true,
		autoplay: {
		delay: 4000,
		},
		navigation: {
			nextEl: '.next_property',
			prevEl: '.prev_property'
		},
		breakpoints: {
			1200: {
				slidesPerView: 3.5
			},
			1024: {
				slidesPerView: 2.5
			},
			768: {
				slidesPerView: 2
			},
			568: {
				slidesPerView: 1.5
			},
			480: {
				slidesPerView: 1.2
			}
		},
	});
});
