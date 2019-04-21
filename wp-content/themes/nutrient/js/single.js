
(function($) {
	//SmoothState (seamless AJAX loading)
	/*Dev Note: 
	@todo remove activation on mobile, which seems to be happening?!?
	@todo tie this into the admin so it can be flag toggled
	*/
	if(ww > breakpoint.large && use_smooth == true ){
		$('#content').smoothState({ 
			cacheLength: 3,
			prefetch: true,
			anchors: 'a[rel="bookmark"]',
			onReady : {
				duration: 0,
				render: function($container, $content) {
					var multiplier = 150; //Index * multiplier determines speed of animating in 'step'
					var content = $('[role="post-content"]'),
							caption = $('#primary figcaption'),
							figure 	= $('#primary figure'),
							format  = 'default',
							summary = $('#primary .entry-summary'),
							subnav 	= $('[rel="download-top"],[rel="download-bottom"]'),
							hero 		= $content.slice(0,1),
							post 		= $content.slice(1, $content.length - 3),
							markup  = Array();

					function hidePost(target,delay){
						if(!delay) delay = 0;
						$(target).css('overflow','hidden').delay(delay).animate({'height':0}, 300, function(){
							$(this).remove();
						});
					}

					function resetStage(delay){
						if(!delay) delay = 300;
						deeplinkTo('#top');

						$(content).css({'min-height':'initial','overflow':'hidden'}).delay(delay).animate({'height':0}, 300, function(){
							$(this).remove();
						});

						$(subnav).css('overflow','hidden').delay(delay).animate({'height':0}, 300, function(){
							$(this).remove();
						});
					}

					$.fn.setNewStage = function(index){
						$(this).attr({'id':'primary','role':'main'});

						var section = $(this).parent().parent(),
								anchor = $(hero).find('a.icon-link'),
								thumb = $(hero).find('.post-thumbnail');

						$(anchor).hide();
						$(section).replaceWith(hero);
						$(hero).after(post);

						$('main').animate({'height':'100vh'}, 300, function(){
							$(this).removeAttr('style');
						});

						if(format == 'video') $(thumb).animate({'opacity':0}, 300);

						//Setup the Single Video body tag
						if( index + 1 == $('figure[id^="post-"]').length ) {
							$('body').
								removeClass(function (index, css) {
								  return (css.match (/(^|\s)single-\S+/g) || []).join(' ');
								}).
								removeClass(function (index, css) {
								  return (css.match (/(^|\s)postid-(\d+)(\s|$)/) || []).join(' ');
								}).
								addClass('single').
								addClass('single-post');
							if( format == 'video' ) $('body').addClass('single-format-video');
						}					

						//Bring back the 'Back to Obsessions' link
						$(anchor).css('opacity',0).show().animate({'opacity':1}, 300);
					}

					if( $(hero).hasClass('format-video') ) format = 'video';

					$('figure[id^="post-"]').each( function(index){
						if ( $(this).hasClass('active') ){
							$(this).setNewStage(index);
						}else{
							hidePost($(this).parent().parent(), index * multiplier);
						}
					});

					resetStage();
					
					//Setup Caption
					if(format == 'video'){
						$(caption).find('h1').animate({'font-size':67});
					}

					$(caption).find('.icon-link').animate({'opacity':0}, 300, function(){
						$(this).hide(500);
					});

					//Set the global stage up, basically ensuring no bindings or backgrounds were lost
					setStage();
				}
		  },
			debug: false 
		});
	}
})( jQuery );