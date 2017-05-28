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
			"navbars": [
            {
               "position": "bottom",
               "content": [
                  "<a class='fa fa-envelope' href='#/'></a>",
                  "<a class='fa fa-twitter' href='#/'></a>",
                  "<a class='fa fa-facebook' href='#/'></a>"
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