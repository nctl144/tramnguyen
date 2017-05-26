;(function($) {
	'use strict'
	var $grid = $('#blog-grid-container').isotope({
	    itemSelector: '.blog-items',
		percentPosition: true,
		masonry: {
		    columnWidth: '.grid-sizer'
		}
	});

	$grid.imagesLoaded().progress( function() {
	    $grid.isotope('layout');
	});

	var mmenuSelector = $('#menu-mobile').find('nav');
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
	$("#menu-button-open").click(function() {
        API.open();
    });

})(jQuery);