(function($) {
	/*=======[ Vars ]==========*/
	var header_offset 	= $('body > header').height(),
			decisionTreeTopMin,
			tree = $('#tree');
			scene = document.getElementById('decision-tree'),
			tree_pos = 0;

	function alignTree(event){
		tree_pos = $('#decision-tree').position().left;
	}

	function initiateTree(event){
		alignTree(event);
		if( ww > breakpoint.large ) {
			function unfixTree(){
				/*Dev Note: return here to fade the tree BEFORE returning it to default state so you don't see the jump*/
				$(this.target).removeClass('locked').css({'margin-top':'auto'});
			}

		  function triggerWaypointing(){
		  	function resetTree(){
			    $('#decision-tree').removeClass('locked').css('left','initial');
		  	}

				if (ww >= breakpoint.medium) {

			  	$('#customers').waypoint({
			      handler: function(direction) {
			        if (direction === 'down') {
			        	$('#decision-tree').addClass('locked');
			        	if(ww > breakpoint.max){ 
			        		$('#decision-tree').css('left', Math.ceil(tree_pos) + 12);
			        	}else{
			        		$('#decision-tree').css('left','initial')
			        	}
			        }else{
			        	resetTree();
			        }
			      }
			    });

				}else{
					resetTree();
				}
		  }

			$(document).ready( function(){
				var reverse = false;
				var parallax = new Parallax(scene);
				triggerWaypointing();

				function fadePrepare (element) {
					element.css({'opacity':0});
				}

				function pathPrepare (element) {
					var lineLength = element[0].getTotalLength();
					element.css({'stroke-dasharray':lineLength,
											 'stroke-dashoffset':lineLength});
				}

				function scalePrepare (circle,scale) {
					if(!scale) scale = 0;
					TweenMax.set(circle, {
						scale: scale
					});
				}

				function rootPrepare(){
					tree_root.css({'margin-top':0});
				}

				function svgTxtPrepare(target){
					var origin = convertToRem(-390);
					target.css({'-webkit-transform':'translateY('+origin+')',
											'-moz-transform':'translateY('+origin+')',
											'-ms-transform':'translateY('+origin+')',
											'-o-transform':'translateY('+origin+')', 
											'transform':'translateY(-'+origin+')'});
				}

				var tree_root = $('#decision-tree'),
						bottle 	= $('path#baby-bottle'),
						c3 		= $('circle#point3'),
						c4 		= $('circle#point4'),
						c4b 	= $('circle#point4b'),
						c5 		= $('circle#point5'),
						p5co 	= $('path#point5-circle-outer'),
						c5ri 	= $('circle#point5-ring-inner'),
						c5ro 	= $('circle#point5-ring-outer'),
						c6 		= $('circle#point6'),
						c7 		= $('circle#point7'),
						p2l1 	= $('path#point2-line1'),
						p2ci 	= $('path#point2-curve-inner'),
						p2co 	= $('path#point2-curve-outer'),
						p3l1 	= $('path#point3-line'),
						p4l1 	= $('path#point4-line1'),
						p4l2 	= $('path#point4-line2'),
						p5l1 	= $('path#point5-line'),
						p6l1 	= $('path#point6-line'),
						p7l1 	= $('path#point7-line'),
						dgci 	= $('circle#decision-girl-circle-inner'),
						dgco 	= $('circle#decision-girl-circle-outer'),
						bb 		= $('path#bb-hm'),
						vn 		= $('path#vn-hm');
						dg 		= $('#decision-girl'),
						galaxy = $('#galaxy image');

				// prep paths
				pathPrepare(p2l1);
				pathPrepare(p2ci);
				pathPrepare(p2co);
				pathPrepare(p3l1);
				pathPrepare(p4l1);
				pathPrepare(p4l2);
				pathPrepare(p5l1);
				pathPrepare(p6l1);
				pathPrepare(p7l1);
				pathPrepare(bb);
				pathPrepare(vn);

				// prep circles
				scalePrepare(c3);
				scalePrepare(c4);
				scalePrepare(c4b);
				scalePrepare(dgci,0.5);
				scalePrepare(dgco,0.5);
				scalePrepare(c5ri,0.5);
				scalePrepare(c5ro,0.5);
				scalePrepare(c5);
				scalePrepare(c6);
				scalePrepare(c7);

				// prep fade-able elements
				fadePrepare(bottle);
				fadePrepare(dgci);
				fadePrepare(dgco);
				fadePrepare(c5ri);
				fadePrepare(c5ro);
				fadePrepare(p5co);
				fadePrepare(dg);

				//prep root
				rootPrepare();

				//prep SVG text
				svgTxtPrepare(galaxy);

				// init controller
				var controller = new ScrollMagic.Controller();

				// build tweens
				var tweenLine2 = new TimelineMax()
					.add(TweenMax.to(p2l1, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(c3, 0.025, {scale: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(p3l1, 0.1, {opacity:p3l1.attr('opacity'), strokeDashoffset: 1, ease:Linear.easeNone}));

				var tweenLine2_co = new TimelineMax()
					.add(TweenMax.to(p2co, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}));

				var tweenLine2_ci = new TimelineMax()
					.add(TweenMax.to(p2ci, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}));

				var tweenLine4 = new TimelineMax()
					.add(TweenMax.to(c4, 0.025, {scale: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(p4l1, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(c4b, 0.025, {scale: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(p4l2, 0.3, {strokeDashoffset: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(bottle, 0.1, {opacity: bottle.attr('opacity'), ease:Linear.easeNone}))
					.add(TweenMax.to(dgci, 0.75, {scale: 1, opacity:dgci.attr('opacity'), ease:Strong.easeOut}));

				var tweenGirl = new TimelineMax()
					.add(TweenMax.to(dg, 0.25, {opacity: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(dgco, 0.5, {scale: 1, opacity:dgco.attr('opacity'), ease:Strong.easeOut}));

				var tweenLine5 = new TimelineMax()
					.add(TweenMax.to(p6l1, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(c6, 0.025, {scale: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(p5l1, 0.25, {strokeDashoffset: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(c5ri, 0.25, {scale: 1, opacity:c5ri.attr('opacity'), ease:Linear.easeNone}))
					.add(TweenMax.to(c5ro, 0.5, {scale: 1, opacity:c5ro.attr('opacity'), ease:Linear.easeNone}))
					.add(TweenMax.to(p5co, 0.5, {opacity:p5co.attr('opacity'), ease:Linear.easeNone}))
					.add(TweenMax.to(c5, 0.025, {scale: 1, ease:Linear.easeNone}));

				var tweenLine7 = new TimelineMax()
					.add(TweenMax.to(p7l1, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}))
					.add(TweenMax.to(c7, 0.025, {scale: 1, ease:Linear.easeNone}));

				var tweenUnfix = new TimelineMax()
					.add(TweenMax.to(tree_root, 0.1, {marginTop:-1*$('#primary').height(), ease:Linear.easeNone, onComplete:unfixTree}));

				var tweenBB = new TimelineMax()
					.add(TweenMax.to(bb, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}));
				var tweenVN = new TimelineMax()
					.add(TweenMax.to(vn, 0.1, {strokeDashoffset: 1, ease:Linear.easeNone}));

				var tweenGalaxy = new TimelineMax()
					.add(TweenMax.to(galaxy, 0.1, {y: 0, ease:Linear.easeNone}));

				// build scene
				//.addIndicators() // add indicators (requires plugin)
				var p2_scene = new ScrollMagic.Scene({triggerElement: "#primary .site-excerpt", offset: header_offset, duration: 250, tweenChanges: true, reverse:reverse})
								.setTween(tweenLine2)
								.addTo(controller);

				var p2ci_scene = new ScrollMagic.Scene({triggerElement: "#primary .site-excerpt", offset: header_offset, duration: 200, tweenChanges: true, reverse:reverse})
								.setTween(tweenLine2_ci)
								.addTo(controller);

				var p2co_scene = new ScrollMagic.Scene({triggerElement: "#primary .site-excerpt", offset: header_offset, duration: 200, tweenChanges: true, reverse:reverse})
								.setTween(tweenLine2_co)
								.addTo(controller);
				
				var customer_padding_offset = $('#customers').css('padding-top').substr(0,$('#customers').css('padding-top').search('px'));
						customer_padding_offset = parseInt(customer_padding_offset);

				var p4_scene = new ScrollMagic.Scene({triggerElement: "#customers h3:first-of-type", offset: header_offset - customer_padding_offset, duration: 200, tweenChanges: true, reverse:reverse})
								.setTween(tweenLine4)
								.addTo(controller);

				var p5_scene = new ScrollMagic.Scene({triggerElement: "#customers h3:first-of-type + p", offset: header_offset, duration: 125, tweenChanges: true, reverse:reverse})
								.setTween(tweenLine5)
								.addTo(controller);

				var girl_scene = new ScrollMagic.Scene({triggerElement: "#customers h3:last-of-type", offset: header_offset, duration: 50, tweenChanges: true, reverse:reverse})
								.setTween(tweenGirl)
								.addTo(controller);

				var p7_scene = new ScrollMagic.Scene({triggerElement: "#customers h3:first-of-type + p", offset: header_offset, duration: 50, tweenChanges: true, reverse:reverse})
								.setTween(tweenLine7)
								.addTo(controller);

				var end_scene = new ScrollMagic.Scene({triggerElement: "#customers h3:last-of-type", offset: header_offset,  duration: 600, tweenChanges: true})
								.setTween(tweenUnfix)
								.addTo(controller);

				var bb_scene = new ScrollMagic.Scene({triggerElement: "#healthy-motivation h3", offset: header_offset,  duration: 600, tweenChanges: true, reverse:reverse})
								.setTween(tweenBB)
								.addTo(controller);
				var vm_scene = new ScrollMagic.Scene({triggerElement: "#healthy-motivation h3", offset: header_offset,  duration: 600, tweenChanges: true, reverse:reverse})
								.setTween(tweenVN)
								.addTo(controller);
				var galaxy_scene = new ScrollMagic.Scene({triggerElement: "#customers p:last-of-type", offset: header_offset, duration: 600, tweenChanges: true, reverse:true})
								//.setTween(tweenGalaxy)
								.on('progress', function(event){
									var multiplier 	= event.progress.toFixed(1),
											origin 			= 390 * multiplier - 390;

									if (origin) origin = convertToRem(origin);
				
									galaxy.css({'-webkit-transform':'translateY('+origin+')',
															'-moz-transform':'translateY('+origin+')',
															'-ms-transform':'translateY('+origin+')',
															'-o-transform':'translateY('+origin+')', 
															'transform':'translateY(-'+origin+')'});
								})
								.addTo(controller);

			});

		}else{
			$('#decision-tree').find('svg').removeClass('animate').removeClass('animated');
			$('#decision-tree').find('img').removeClass('animate').removeClass('animated');
		}
	}

	initiateTree(false);

	$(window).on('resize.alignTree', alignTree);

})( jQuery );