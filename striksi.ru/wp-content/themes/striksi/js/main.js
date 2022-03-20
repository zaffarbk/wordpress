jQuery(function($){
	$(document).ready(function(){

		AOS.init({
			once: true, duration: 900, offset: 250, disable: 'mobile'
		});

		var $header = $('.header');

		$(window).on('scroll', function(){
			if($(window).scrollTop() > 0 && !$header.is('.header_fix'))
			{
				$header.addClass('header_fix');
			}
			else if($(window).scrollTop() <= 0 && $header.is('.header_fix'))
			{
				$header.removeClass('header_fix');
			}
		}).scroll();

		$('.slider__list').slick({
			pauseOnHover: false,
			autoplay: true,
			autoplaySpeed: 4000,
			speed: 400,
			prevArrow: '.slider__arr_l',
			nextArrow: '.slider__arr_r',
			dots: true,
			dotsClass: 'slider__pages',
			appendDots: $('.slider__nav')
		});

		$('.brands__tab ul li a').on('click', function(){
			var $li = $(this).parent();
			if (!$li.is('.active'))
			{
				$('.brands__tab ul li').removeClass('active');
				$li.addClass('active');
				$('.brands__list').addClass('hidden');
				$('.brands__list[data-id='+$li.data('id')+']').removeClass('hidden');
			}
			return false;
		});

		$('.pgal__list.v1').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 400,
			arrows: false,
			variableWidth: true,
			slidesToShow: 10
		});
		$('.pgal__list.v2').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 400,
			arrows: false,
			variableWidth: true,
			slidesToScroll: -1,
			slidesToShow: 10,
			swipeToSlide: true
		});

		$('.waddrs').toShowHide({
			button: '.waddrs__roll',
			box: '> ul',
			effect: 'slide',
			anim_speed: 300,
			close_only_button: true,
			onBefore: function(el){
				el.addClass('show');
			},
			onAfter: function(el){
				el.removeClass('show');
			}
		});
		$('.waddrs > ul > li').toShowHide({
			button: '> a',
			box: '> ul',
			effect: 'slide',
			anim_speed: 300,
			close_only_button: true,
			onBefore: function(el){
				el.addClass('show');
			},
			onAfter: function(el){
				el.removeClass('show');
			}
		});

		var throttleTimeout;
		$(window).bind('resize', function(){
			var $this = $(this);
			var width = $this.width();
			if (!throttleTimeout) {
				throttleTimeout = setTimeout(
					function()
					{
						if ($('.rev__inner').length)
						{
							$('.rev__inner').width(width-$('.rev__box').offset().left);
						}
						if (width > 500)
						{
							if ($('.header__menu .header__mail').length)
							{
								$('.header__mail').insertAfter('.header__menu');
							}
							if ($('.serv__list').is('.slick-initialized'))
							{
								$('.serv__list').slick('unslick');
							}
							if ($('.body__content > .wmenu').length)
							{
								$('.wmenu').prependTo('.body__sidebar');
							}
						}
						else
						{
							if ($('.header__wrapper > .header__mail').length)
							{
								$('.header__mail').appendTo('.header__menu');
							}
							if (!$('.serv__list').is('.slick-initialized'))
							{
								$('.serv__list').slick({
									speed: 700,
									centerMode: true,
									centerPadding: '10%',
									arrows: false,
									dots: true,
									dotsClass: 'serv__pages',
									appendDots: $('.serv .wrapper'),
									responsive: [
									{
										breakpoint: 400,
										settings: {
											centerPadding: '20px'
										}
									}
									]
								});
							}
							if ($('.body__sidebar > .wmenu').length)
							{
								$('.wmenu').insertAfter('.info');
							}
						}
						throttleTimeout = null;
					},
					100
					);
			}
		}).resize();

		$('.header__burger').on('click', function(){
			if (!$('.header').is('.show_menu'))
			{
				$('.header__menu').fadeIn();
				$('.header__menu-layout').fadeIn();
				$('.header').addClass('show_menu');
				$('body').addClass('lock');
			}
			else
			{
				$('.header__menu').fadeOut();
				$('.header__menu-layout').fadeOut();
				$('.header').removeClass('show_menu');
				$('body').removeClass('lock');
			}
		});
		$('.header__menu-layout').on('click', function(){
			$('.header__burger').click();
		});

		$('.open-brand').on('click', function(){
			var $this = $(this);
			$.fancybox.open('<div class="mbrand"><div class="mbrand__content"><div class="mbrand__img"><img src="'+$this.data('img')+'"/></div><div class="mbrand__text">'+$this.data('txt')+'</div></div></div>', {
				autoFocus: false, hideScrollbar: false, closeExisting: true, touch: false
			});
			return false;
		});



	});
});