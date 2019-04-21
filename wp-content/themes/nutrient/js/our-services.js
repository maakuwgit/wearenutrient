(function($) {

	var servicesHeight = 0,
			section = $('section[rel="services"]'),
			article = $(section).find('article'),
			items 	= $(article).find('ul:not(.show-for-small-only) .accordion-item'),
			m_items = $(article).find('ul.show-for-small-only .accordion-item');

	$.fn.toggleAccordion = function(direction, content) {
		$(this).attr({'aria-expanded':direction,'aria-selected':direction});
		if(eval(direction) == true){
			$(this).removeClass('dimmed');
			$(items).removeClass('dimmed');
		}
		
		if(direction == true){
			$(this).parent().addClass('is-active');
			if(content) $(content).attr('aria-hidden',false).css('display','block');
		}else{
			$(this).parent().removeClass('is-active');
			if(content) $(content).attr('aria-hidden',true).removeAttr('style');
		}
	}
	
	$.fn.toggleActivation = function(direction){
		$(this).stop();
		if(direction == true){
			$(this).animate({ 'min-height': servicesHeight }, 'fast', function(){
				$(section).addClass('activated');
			});
		}else{
			$(this).animate({ 'min-height': 0 }, 'fast', function(){
				$(this).removeAttr('style');
				$(section).removeClass('activated');
			});
		}
	}

	$(".accordion-title").on('click.titleClick', titleClick);

	function titleClick(event) {
		var is_open, 
				target = this;

		window.setTimeout(function() {
			is_open 	= eval($(target).attr('aria-selected'));

			if (ww >= breakpoint.large) {
				//Desktop
 				var mobile_h = $(target).attr('href'),
						mobile_a = $(article).find('a[href="'+mobile_h+'_mobile"]'),
						mobile_c = $(mobile_a).next();

				$(mobile_a).toggleAccordion(is_open, mobile_c);

				if( is_open == false ||  ! $(items).hasClass('is-active') ){
					$(items).find('a').removeClass('dimmed');
				}else{
					$(items).each(function(){
						if( $(this).hasClass('is-active') == false ){
							$(this).find('a').addClass('dimmed');
						}else{
							$(this).find('a').removeClass('dimmed');
						}
					});

					$(m_items).each(function(){
						var anchor = $(this).find('a');
						if( $(anchor).attr('href') !== $(target).attr('href') + '_mobile' ){
							$(anchor).toggleAccordion(false, $(anchor).next());
						}
					});
				}

				window.setTimeout(function() {

					if( is_open == false) {
						servicesHeight = parseInt($(article).css("height"));

						$(article).toggleActivation(true);
					}else{
						$(article).toggleActivation()
					}
				}, 300);

			} else {
				//Mobile
				var desktop_h = $(target).attr('href').substr(0, $(target).attr('href').search('_mobile')),
						desktop_a = $(article).find('a[href="'+desktop_h+'"]'),
						desktop_c = $(desktop_a).next();

				//If this isn't a 'close' event, trigger the desktop elements to mirror
				if( is_open == true ) {

					$(items).attr('aria-hidden',true).removeAttr('style').removeClass('is-active');
					$(items).find('a').attr({'aria-expanded':false,'aria-selected':false});
					$(items).find('> div').attr('aria-hidden',true).removeAttr('style');
				
					$(items).find('a').addClass('dimmed');

					$(desktop_a).toggleAccordion(true, desktop_c);
				}else{
					$(desktop_a).toggleAccordion(false, desktop_c);
				}

				$(article).toggleActivation();
			}
		}, 5);
			
	}

	$(document).ready(function(){
		$(window).resize(function() {

			if (ww < breakpoint.large) {
				$(article).toggleActivation();
			} else if (ww >= breakpoint.large && !$(section).hasClass('activated')) {
				servicesHeight = parseInt($(article).css("height"));
				$(article).toggleActivation(true);
			}
		});
	});

})( jQuery );