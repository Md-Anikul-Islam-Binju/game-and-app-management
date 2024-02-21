(function ($) { 
	"use strict"
  
	// ! Sticky and Scroll Up
	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 400) {
			$(".header_sticky").removeClass("sticky_bar");
			$('#back_top').fadeOut(500);
		} else {
			$(".header_sticky").addClass("sticky_bar");
			$('#back_top').fadeIn(500);
		}
	});

	// ! Scroll Up Back to Top
	$('#back_top a').on("click", function () {
		$('body,html').animate({
		  	scrollTop: 0
		}, 800);
		return false;
	});

	// ! Training Card Slider
   $('.trainings_active').slick({
		dots: false,
		infinite: true,
		autoplay: true,
		speed: 400,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: false,
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					dots: false,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false
				}
			},
		]
	});

	// ! Showcase Slider
	$('.showcase_active').slick({
		dots: true,
		infinite: true,
		autoplay: true,
		speed: 400,
		arrows: false,
		slidesToShow: 1,
		slidesToScroll: 1,
	});

	// ! Hero Slider
	function mainSlider() {
		var BasicSlider = $('.slider-active');
		BasicSlider.on('init', function (e, slick) {
			var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
			doAnimations($firstAnimatingElements);
		});
		BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
			var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
			doAnimations($animatingElements);
		});
		BasicSlider.slick({
			autoplay: true,
			autoplaySpeed: 8000,
			dots: true,
			fade: true,
			arrows: false, 
			prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
			nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
			responsive: [{
				breakpoint: 1024,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				}
			},
			{
				breakpoint: 991,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false
				}
			},
			{
				breakpoint: 767,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				dots:false
				}
			}
			]
		});

		function doAnimations(elements) {
			var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
			elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
			});
		}
	}
	mainSlider();

	// ! Counter Up
	$('.number').counterUp({
		delay: 10,
		time: 2000
	});

	  
	

})(jQuery);
