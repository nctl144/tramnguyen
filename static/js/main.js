;(function($) {
	'use strict'
	function isotopeBlog() {
		var $grid = $('#blog-grid-container').isotope({
		    itemSelector: '.blog-items',
			percentPosition: true,
			layoutMode: 'masonry',
			masonry: {
			    columnWidth: '.grid-sizer'
			}
		});

		$grid.imagesLoaded().progress( function() {
		    $grid.isotope('layout');
		});
	}

	function mmenuActivate() {
		var mmenuSelector = $('#menu-mobile').find('nav');
		var $icon = $("#menu-button-open");

		mmenuSelector.mmenu({
			"extensions": [
	            "pagedim-black",
	            "border-offset"
		    ],
			offCanvas: {
				pageSelector: '#page',
				position: 'right'
			}
		});

		var API = mmenuSelector.data("mmenu");

		$icon.on( "click", function() {
		    API.open();
		});
		API.bind( "open:finish", function() {
		    setTimeout(function() {
		        $icon.addClass( "is-active" );
		    }, 100);
		});
		API.bind( "close:finish", function() {
		    setTimeout(function() {
		        $icon.removeClass( "is-active" );
		    }, 100);
		});
	}

	function blogGridHover() {
		$('.blog-items').hover(function() {
			$(this).toggleClass('blog-items-hovered');
		});
	}

	$(document).ready(function() {
		isotopeBlog();
		mmenuActivate();
		blogGridHover();
	});

})(jQuery);