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

})(jQuery);