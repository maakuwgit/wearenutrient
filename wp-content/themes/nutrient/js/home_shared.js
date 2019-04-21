/* home screenReaderText */
/**
 * Homepage shared functions file.
 *
 */

( function( $ ) {
	/*Dev Note: adjust to use the global var*/
	var header_offset 	= $('body > header').height();

	$(document).ready( function(){

		var circles = document.getElementById('our_approach-circles'),
				hm 			= document.getElementById('hm'),
				tree 		= document.getElementById('our_approach-decision_tree');

		var dot3 		= $('#hm_dots3');
		var dot12 	= $('#hm_dots12');

		var phm 		= new Parallax(hm);
		var pcircles = new Parallax(circles);
		var ptree 	= new Parallax(tree);

		var dot1Duration;
		var dot3Duration;

		function setDotDuration(add_time) {
			if(!add_time) add_time = 0;
			return ( ww > breakpoint.small ? ww : wh ) + add_time;
		}

		function resetDotDuration() {
			dot1Duration = setDotDuration();
			dot3Duration = setDotDuration();
		}

		resetDotDuration();
		$(window).on('resize.setDotDuration', resetDotDuration);

		// init controller
		var controller = new ScrollMagic.Controller();

		function rotatePrepare (element) {
			element.css({ 'transform':'rotate(0)',
										'-webkit-transform':'rotate(0)',
										'-moz-transform':'rotate(0)',
										'-o-transform':'rotate(0)'});
		}

		// prep fade-able elements
		rotatePrepare(dot12);
		rotatePrepare(dot3);

		// build tweens
		var tweenRevolution12 = new TimelineMax()
			.add(TweenMax.to(dot12, 0.1, {rotation: -180, ease:Linear.easeNone}));
		var tweenRevolution3 = new TimelineMax()
			.add(TweenMax.to(dot3, 0.1, {rotation: 180, ease:Linear.easeNone}));

		// build scene
		// add indicators (requires plugin)
		var d3_scene = new ScrollMagic.Scene({triggerElement: '[rel="our_approach"][role="post-content"]', offset: header_offset, duration: dot3Duration, tweenChanges: true, reverse:true})
				.setTween(tweenRevolution3)
				.addTo(controller);

		var d12_scene = new ScrollMagic.Scene({triggerElement: '[rel="our_approach"][role="post-content"]', offset: header_offset, duration: dot1Duration, tweenChanges: true, reverse:true})
				.setTween(tweenRevolution12)
				.addTo(controller);
	});


} )( jQuery );
