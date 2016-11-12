//jQuery(document).ready(function($) {

(function($,window,undefined) {

	// Bootstrap JS
	function bootstrapJS() {
		$('[data-toggle="tooltip"]').tooltip()
		.filter('[data-trigger*="click"]')
		.on('click', function(e) {
			e.preventDefault();
		});
	}
	
	// mCustomScrollbar JS
	function detectMobile() {
		$.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

		if( $.browser.device === false ) {
			$(".main-navigation").mCustomScrollbar();
		} else {
			$(".main-navigation").mCustomScrollbar("destroy");
		}
	}

	// Target your .container, .wrapper, .post, etc.
	function fitVidsInit() {
		$(".post, .hentry, .entry-content, .mejs-video").fitVids();
	}

	// Add Dropdown Effect & Slide
	function subMenuDropDown() {
		$("<div class='menu-btn-sub-menu'></div>").prependTo('.menu-item-has-children');

		$(".menu-item-has-children .menu-btn-sub-menu").click(function() {
			if ($(this).hasClass('sub-menu-expanded')) {
				$(this).removeClass('sub-menu-expanded');
				$(this).next().next().slideUp();
			} else {
				$(this).addClass('sub-menu-expanded');
				$(this).next().next().slideDown();
			}
		});
	}

	// Add Dropdown Effect & Slide to Widgets
	function widgetDropdown() {
		var $widget = $('.site-header .widget:has(ul), .site-header .widget:has(#calendar_wrap), .site-header .widget:has(.tagcloud)');
		var $widgetClass = "widget-dropdown-expand";

		$($widget).addClass('widget-has-dropdown');
		$(".widget-has-dropdown").click(function() {
			if ($(this).hasClass($widgetClass)) {
				$(this).removeClass($widgetClass);
			} else {
				$(this).addClass($widgetClass);
			}
		});
	}

	function wrapperPosition(){
		var $headerHeight = $('#masthead').height();
		$('#wrapper').css('padding-top', $headerHeight + 'px');
		$('#site-navigation').css('top', $headerHeight + 'px');
	}

	function sliderHeight(){
		var $headerHeight = $('#masthead').height(),
			windowHeight = $(window).height(),
			hentry = $('.page-template-templatestemplate-home-php .flexslider-sticky-post .hentry');
		$(hentry).css('padding-top','0px');
		$(hentry).css('height', windowHeight - $headerHeight + 'px');
	}

	// Mobile Nav Button JS
	function mobileNavBtn(){
		$(".mobile-nav-btn").click(function() {
			if ($('.main-navigation').hasClass('nav-expand')) {
				$('#wrapper, .main-navigation').removeClass("nav-expand");
				$('.site-header').removeClass("widget-expand");
			} else {
				$('#wrapper, .main-navigation').addClass("nav-expand",function(){
					wrapperPosition();
				});
				$('.site-header').removeClass("widget-expand");
			}
		});
	}

	// Mobile Widget Button JS
	function mobileWidgetBtn(){
		$(".mobile-widget-btn").click(function() {
			if ($('.site-header').hasClass('widget-expand')) {
				$('.site-header').removeClass("widget-expand");
			} else {
				window.scrollTo(0, 0);
				$('.site-header').addClass("widget-expand");
			}
		});
	}

	function stickyHeader() {
		var $stickyClass = "site-header-sticky",
			header = $('#masthead'),
			headerHeight = header.height(),
			sticky = header.offset();

		$(window).scroll(function() {
			if ( $(window).scrollTop() > sticky.top + headerHeight ) {
				if (!$('body').hasClass($stickyClass)) {
					$('body').addClass($stickyClass);
					wrapperPosition();
				}
			} else {
				$('body').removeClass($stickyClass);
				wrapperPosition();
			}
		});
	}

	function mobileNavInit() {
		var windowWidth = $(window).width();

		if( windowWidth < 1000 ) {
			$(".main-navigation .widget").click(function() {
				if ($('body').hasClass('nav-expand')) {
					return;
				} else {
					$('body, .main-navigation').addClass('nav-expand');
				}
			});
		}
	}

	// global masonry variables
	var $masonry_container = $('.blog-grid');

	// masonry Init
	function masonryInit() {
		if ( $masonry_container.length ) {
			masonryRun();

			//tell infinite scroll to wait once content is loaded
			$masonry_container.imagesLoaded(function(){
				masonryInfiniteScrollingInit();
			});
		}
	}

	// masonry Update
	function masonryUpdateLayout() {
		if ( $masonry_container.length ) {
			$masonry_container.packery();
		}
	}

	// Layout Refresh
	function layoutRefresh() {
		masonryUpdateLayout();
	}

	// masonry Run
	function masonryRun() {
		if ( $masonry_container.length ) {
			// masonry init
			$masonry_container.packery({
				itemSelector: '.blog-item',
			});
		}
	}

	// masonry Infinite Scrolling Initialization
	function masonryInfiniteScrollingInit() {

		$masonry_container.infinitescroll({
			navSelector : '#load-more:last',
			nextSelector : 'a#load-more:last',
			itemSelector : '.blog-item',
			debug: false,
			prefill: true,
			errorCallback: function(){}
		},
		// trigger masonry as a callback
		function( newElements ) {

			newElements.forEach(function(e){
				$(e).css('opacity', 0);
			});

			var $newElems = $( newElements );
			infiniteScrollingRefreshComponents();

			// load images before masonry
			$newElems.imagesLoaded(function(){

				$masonry_container.packery('appended', $newElems);

				//refresh all there is to refresh
				layoutRefresh();
			});
		});

		infiniteScrollingOnClick($masonry_container);
	}

	function infiniteScrollingOnClick($container) {
		// unbind normal behavior. needs to occur after normal infinite scroll setup.
		$(window).unbind('.infscr');

		$('a#load-more').click(function(){
			$(this).addClass('loading');
			$container.infinitescroll('retrieve');
			return false;
		});
	}

	function infiniteScrollingRefreshComponents() {
		//var $mediacontainer = $('video, audio');

		//if ( $mediacontainer.length ){
		//	$mediacontainer.mediaelementplayer();
		//}
	}

	function loadInit() {
		bootstrapJS();
		detectMobile();
		fitVidsInit();
		mobileNavInit();
		widgetDropdown();
		subMenuDropDown();
		mobileNavBtn();
		mobileWidgetBtn();
		wrapperPosition();
		sliderHeight();
		stickyHeader();
		masonryInit();
	}

	$(document).ready(function(){
		loadInit();
	});

	// Fire once loaded
	$(window).load(function(){
		masonryUpdateLayout();
	});

	// Fire resizing
	$(window).resize(function() {
		wrapperPosition();
		sliderHeight();
    });

})(jQuery, window);

//});