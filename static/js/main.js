;(function($) {
	'use strict'
	function isotopeBlog() {
		var $grid = $('#blog-grid-container').fadeIn(500).isotope({
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
			"navbars": [
            {
               "position": "bottom",
               "content": [
                  "<a class='fa fa-linkedin' href='http://https://www.linkedin.com/in/ntngoctram/'></a>",
                  "<a class='fa fa-facebook' href='https://www.facebook.com/tram.bi.luv'></a>"
               ]
            }
	        ],
	        extensions: ["theme-dark", "pagedim-black"],
	        offCanvas: {
	        	pageSelector: "#page",
	            "position": "right"
	        },
		    navbar: {
				title: ""
			},
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


	mmenuActivate();

	$(window).load(function() {
		isotopeBlog();
		blogGridHover();
	});

})(jQuery);