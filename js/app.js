window.onload = function () {
	setTimeout(function () {
		// Home slider
		var swiper = new Swiper('.hero', {
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '.hero-next',
				prevEl: '.hero-prev',
			},
		});
		// Three column
		var swiper = new Swiper('.three-column-carousel', {
			slidesPerView: 3,
			spaceBetween: 30,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			pagination: {
				el: '.three-column-carousel-pagination',
				clickable: true,
			},
		});
		// Testimonials
		var swiper = new Swiper('.testimonial-slider', {
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: '.testimonial-next',
				prevEl: '.testimonial-prev',
			},
		});
		// tabby.js
		if (document.querySelector('.tabbed-content')) {
			var myTabs = new Tabby('[data-tabs]');
		}
		// code here

		// code above this line
	}, 200);
};
// let coursePricing = document.querySelectorAll('.course-pricing input[name="amount"]');
// coursePricing.forEach((element) => {
// 	element.setAttribute('type', 'button');
// 	element.classList.add('pricing-value');
// 	element.value = `$${element.value}`;
// });
