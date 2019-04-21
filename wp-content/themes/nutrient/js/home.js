/* home screenReaderText */
/**
 * Frontpage functions file.
 *
 */

( function( $ ) {
	var circles = document.getElementById('our_approach-circles'),
			hm = document.getElementById('hm');
			tree = document.getElementById('our_approach-decision_tree');

	//Adjusts the position of the banner element to keep its position consistent
	function realign(event) {
		var banner 			= $('[rel="our_approach"].banner'),
				new_y		 		= 0;

		new_y = $('#primary').outerHeight() - $(banner).outerHeight();
		$(banner).css('top', new_y);
	}

	//Resize Binding
  $(window).on('resize.realign', realign);
	$(window).on( "orientationchange.realign", realign);

	$(document).ready( function(){
		var phm = new Parallax(hm);
		var pcircles = new Parallax(circles);
		var ptree = new Parallax(tree);

		realign();
	});

} )( jQuery );
