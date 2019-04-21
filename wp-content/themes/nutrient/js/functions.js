/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

/*=======[ Global Vars ]==========*/
var trace_dir 			= '',
    ww              = window.innerWidth || jQuery(window).width(),
    wh 							= window.innerHeight || jQuery(window).height(),
    global_offset 	= jQuery(header).height(),
  	lastScrollTop   = global_offset;
		triangle 				= document.getElementById('widget-triangle');
		queryDict 			= {};


var	thumbnails 			= jQuery('[data-thumbnail]'),
		tooltips 				= jQuery('[role="tooltip"]'), 
		clickables 			= jQuery('[data-clickable]'),
		backgroundables	= jQuery('[data-background-img]'),
    trackables 			= jQuery('a[data-gaq-category][data-gaq-action][data-gaq-label]'),
    links 					= jQuery('button[data-href], .button[data-href], a[data-href]')

/*=======[ Flags ]================*/
var is_dev 				= true,
		use_smooth 		= false,
		use_trace 		= false;
		is_sent 			= false;

/*=======[ Breakpoints ]==========*/
var breakpoint        	= new Object();
    breakpoint.small  	= 640;
    breakpoint.medium 	= 768;
    breakpoint.large  	= 1024;
    breakpoint.xlarge 	= 1280;
    breakpoint.xxlarge 	= 1728;
    breakpoint.max			= 2560;

	/*=======[ Markup Shortcus ]======*/
var content 			= jQuery('main'),
		header 				= jQuery('body > header'),
		mh 						= header.height();

( function( $ ) {
      
	/*============[ Utils ]===========*/
	$.fn.fixHeader = function(event){
		$('#masthead').addClass('fixed');
	}

	$.fn.unfixHeader = function(event){
		$('#masthead').removeClass('fixed');
	}

	//Setup the variable 'ww' so we can reference it to decide what to show/hide
	function setWindowDimensions(event){
		ww = window.innerWidth || $(window).width();
		wh = window.innerHeight || $(window).height();
		if( ww > breakpoint.large ) $('#menu_btn[aria-expanded="true"]').click();
	}

	/*==================[ Links ]===================*/
	function bindButtons(event){
		links.each(function(){
			$(this).off('click.gotoHref').on('click.gotoHref', gotoHref);
		});
	}

	function gotoHref(event){
		var target = $(this).attr('data-target');
		if( target ) {
			window.open($(this).attr('data-href'), target);
		}else{
			window.location = $(this).attr('data-href');
		}
	}

	function trackClick(event) {
		_gaq.push(['_trackEvent',$(this).attr('data-gaq-category'),$(this).attr('data-gaq-action'),$(this).attr('data-gaq-label')]);
	}

  	/*===============[ Thumbnails ]================*/
	function thumbnailOv(event){
		$(this).find('> img').stop().animate({'opacity': 1}, 300);
	}

	function thumbnailOut(event){
		$(this).find('> img').stop().animate({'opacity': 0}, 200);
	}

	function clickThumbnail(event){

		var anchor = false;
		if($(event.target)[0].localName == 'span') {
			anchor = $(event.target).parent().parent();
		}else{
			anchor = $(event.target).parent();
		}

		$(thumbnails).each(function(){
			resetThumbnail($(this), $(this).next());
		});

		if(ww > breakpoint.large) $(anchor).unbind('hover');
		$(anchor).find('h2').addClass('hide');
		$(anchor).siblings().removeClass('hide');

		function showThumbContents(){
			$(anchor).siblings().addClass('animate');
		}

		var stagger = setTimeout(showThumbContents, 100);
	}

	function closeThumbnail(event){
		var anchor 			= $(event.target).parent(),
				figcaption 	= $(anchor).parent().parent(),
				target 			= $(figcaption).prev();

		resetThumbnail(target, figcaption);
	}

	function resetThumbnail(target, figcaption){
		$(figcaption).addClass('hide').removeClass('animate');

		$(target).find('h2').removeClass('hide');
		$(target).find('> img').removeAttr('style');
		$(target).hover(thumbnailOv, thumbnailOut);
	}

  	/*================[ Init ]==================*/
	$( document ).ready( initiate );

	function initiate(event) {

		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

		if(event) {
			//Resize Binding
		  $(window).on('resize.setWindowDimensions', setWindowDimensions);

			//Scroll Binding
			$(window).on('scroll.scrollHeader', scrollHeader);

			//Foundation init
			if( $('#contest_header') ) { 
				$('[data-magellan]').setMagellanOffset();
			}

			$(document).foundation();

			//Foundation mobile menu bindings
			/*Dev Note: adjust this so it has no loophole. Right now, one can click quickly and cause a loophole*/
			/*Dev Note: just created another loophole for mobile with rebind/bind of 'scrollHeader'. Double-check it when we can
			shoudl be a matter of assigning the binding to a variable and checking the existence*/
			$(document).on('opened.zf.offcanvas', function( event ) {
				$('#menu_btn [rel="closed"]').addClass('hide');
				$('#menu_btn [rel="open"]').removeClass('hide');
				$('#menu_btn').stop().animate({'width': '60%'}, 250);
				$(window).off('scroll.scrollHeader');
				$('#masthead').addClass('fixed');
			}).on('closed.zf.offcanvas', function( event ) {
				$('#masthead').removeClass('fixed');
				$(document).scrollTop(lastScrollTop);
				$(window).on('scroll.scrollHeader', scrollHeader);
				$('#menu_btn [rel="open"]').addClass('hide');
				$('#menu_btn [rel="closed"]').removeClass('hide');
				$('#menu_btn').stop().animate({'width': '100%'}, 200, function(){
					$(this).removeAttr('style');
				});
			});

			tooltips = jQuery('[role="tooltip"]'), 
			$(tooltips).click(closeTooltip);

			function closeTooltip(event){
				$(tooltips).hide(300);
			}

			$( window ).on( "orientationchange", function( event ) {
				/*Dev Note: Foundation 6 doesn't have a way to reflow content yet
				when we get one, we shoudl reflow here*/
			});

	    function inputCheck(event){
				var label = $(this).parent().siblings('label');
	    	label.removeClass('over');
			  $(this).off('keypress.inputCheck');
		  }

			$('body:not(.page-template-template-contest) input:not([type="submit"]), body:not(.page-template-template-contest) textarea').focus(function() {
					var label = $(this).parent().siblings('label');
			    if ($(this).val() == $(label).text()){
						label.addClass('over');
			    	$(this).val('');
			    }
			    $(this).on('keypress.inputCheck', inputCheck);
			}).blur(function(){
					var label = $(this).parent().siblings('label');
			    if ($(this).val() == "") $(this).val($(label).text());
					label.removeClass('over');
			    $(this).off('keypress.inputCheck');
			});

	    //Links
	  	trackables.on('click', trackClick);
	  	bindButtons();

	  	//Thumbnails
	  	thumbnails.each(function(){
	  		if(ww > breakpoint.large) {
	  			$(this).hover(thumbnailOv, thumbnailOut);
	  		}
	  		$(this).on('click', clickThumbnail);
	  		$(this).siblings().find('a[rel="close"]').on('click', closeThumbnail);
	  	});
		}

		$('.widget .wpcf7 .wpcf7-response-output').addClass('hide');

		//Deeplinking
		var hash = window.location.hash;
		if(hash){	
			deeplinkTo(hash);
		}

		//All set? Ok, let's go!
		setStage();
	}

} )( jQuery );

function clickThrough(event){
	var a = jQuery(this).find('a[href]:first-of-type');
	//Dev Notes: pulls from the GA code in the button
	ga('send', 'event', { eventCategory: 'Image Click', eventAction: 'Clicking through to an Obsession'});

	if( use_smooth == true && jQuery('body').hasClass('smoothstate') && jQuery('body').hasClass('single') && ww > breakpoint.large ){
		jQuery(this).addClass('active');
		var main = jQuery('#content').smoothState().data('smoothState');
		main.load(jQuery(a).attr('href'));
	}else{
		window.location = jQuery(a).attr('href');
	}
}

function setStage(){
	clickables 			= jQuery('[data-clickable]');
	backgroundables	= jQuery('[data-background-img]');

	//Clickable block elements
	clickables.each(function(){
		jQuery(this).addClass('pointer');
		var a = jQuery(this).find('a[href]:first-of-type');
		if( a.length > 0 ){
  		jQuery(this).off('click.clickThrough').on('click.clickThrough', clickThrough);
  	}
	});

	//Global Parallax
	var parallax;
	if(triangle) new Parallax(triangle);

	//Background Images
	backgroundables.each(function(index){
		var img = jQuery(this).find(' > img'),
				target = jQuery(this),
				waitforit;
		
		function resetFigureBg(target){
			jQuery(target).removeAttr('style').css('background-image','url("'+jQuery(img).attr('src')+'")');
		}

		function resetThumbBg(target){
			jQuery(target).removeAttr('style').css('background-image','url("'+jQuery(target).attr('data-thumbnail-hover')+'")');
		}

		jQuery(this).css('opacity',0);

		if( img.length > 0 ){
			if(!jQuery(this).attr('data-thumbnail-hover')){
					waitforit = setTimeout(function(){
					jQuery(target).css('background-image','url("'+jQuery(img).attr('src')+'")');
					if( jQuery(target).is(':visible') ) {
						jQuery(target).stepAnimate(index, resetFigureBg, jQuery(target));
					}else{
						resetFigureBg(jQuery(target));
					}
				}, 300);
			}else{
					waitforit = setTimeout(function(){
					jQuery(target).css('background-image','url("'+jQuery(target).attr('data-thumbnail-hover')+'")');
					jQuery(target).stepAnimate(index, resetThumbBg, jQuery(target));
				}, 300);
			}
		}
	});

	//Prevents users from entering non-numerics into phone field
	jQuery('input[type="tel"]').keypress(function(event) {
    if (event.which < 48 || event.which > 57){
        event.preventDefault();
    }
	});

	//CSS animations
	jQuery('*.animate').addClass('animated');
}

/*============[ Utils ]===========*/
//Got this from Foundation. It's so incredibly helpful in responsive..
function convertToRem(num) {
  var new_num = num / 16;
  return new_num.toString() + 'rem';
}

function getQueryStr() {
	location.search.substr(1).split("&").forEach(function(item) {
		queryDict[item.split("=")[0]] = item.split("=")[1];
	});	
}

jQuery.fn.setMagellanOffset = function(num){
	if (typeof num === 'undefined' || !num) num = jQuery('.site-header').height();
	/*Dev Note: these numbers are arbitrary. Would LOVE for there to be a more
	programmatic way...*/
	var gutter = ( ww > breakpoint.medium ? 22 : 24 );
	if( ww <= breakpoint.small) gutter = 26;

 	jQuery(this).attr('data-bar-offset',num - gutter);
}

function deeplinkTo(target,offset){
	if (typeof offset === 'undefined' || !offset) offset = 0;
	window.setTimeout(function(){
		jQuery(window).off('scroll.scrollHeader');
		jQuery(window).off('scroll.rebindHeader');
		jQuery('#masthead').removeClass('fixed');

		jQuery('body').stop().animate({scrollTop: jQuery(target).offset().top - offset}, 500, function(){
			jQuery(window).on('scroll.scrollHeader', scrollHeader);
		});
	}, 300);
}

/*============[ Header Methods ]===========*/
function scrollHeader(event) {

	if(!jQuery('.off-canvas-wrapper-inner').hasClass('is-off-canvas-open')){
  	var target = jQuery('#masthead'),
  		st 		 = jQuery(this).scrollTop(),
  		top 	 = Math.max(0, mh - target.height());

  	if(st < top){
    	target.removeClass('fixed');
  		jQuery(content).removeAttr('style');
  		jQuery(window).off('scroll.scrollHeader');
  		jQuery(window).on('scroll.rebindHeader', rebindHeader);
  	} else if(st <= lastScrollTop) {
  		if ( !target.hasClass('fixed') ){
	  		target.css('top', -1 * target.height());
	    	target.addClass('fixed').stop().animate({'top':0}, 300, function(){
	    		jQuery(this).removeAttr('style');
	    	});
	  		jQuery(content).css('padding-top', global_offset);
	  	}
  	} else {
    	target.removeClass('fixed');
  		jQuery(content).removeAttr('style');
  	}
  	lastScrollTop = st;
	}
}

function rebindHeader(event) {
	if(!jQuery('.off-canvas-wrapper-inner').hasClass('is-off-canvas-open')){
  	var target = jQuery('#masthead'),
  		st 		 = jQuery(this).scrollTop();

		if(st >= mh){
			jQuery(window).off('scroll.rebindHeader');
			jQuery(window).on('scroll.scrollHeader', scrollHeader);
		}

	}
}

/*============[ Form Methods ]===========*/
function modifyThanksMsg(){
	var response = jQuery('.wpcf7-response-output.wpcf7-mail-sent-ok');

	var waitforit = setTimeout( function(){
		jQuery(response).css('opacity',0).removeClass('hide');
		jQuery('.wpcf7-form.sent legend').addClass('hide');
		jQuery(response).wrapInner('<p>').prepend('<p class="big">Hey, thanks for your interest.</p>');
		jQuery(response).wrapInner('<blockquote>');
		jQuery(response).append('<blockquote><p>health &amp; wellness <br>decisions are diff&hellip;</p></blockquote>');
		jQuery(response).animate({'opacity':1}, 500);
	}, 300);
}

function checkSubmission(){
	var stagger = setTimeout(function(){
		var msg = jQuery('.wpcf7-response-output.wpcf7-spam-blocked').html();
		var invalids = jQuery('[aria-invalid="true"]');
		if( msg ) {
			jQuery('input[name="your-email"]').after('<span role="alert" class="wpcf7-not-valid-tip">'+msg+'</span>');
		}
	}, 200);
}

function silverPopIt(vars){
	var targets = jQuery('#sequence_form form > p, #sequence_form article > div > h2, #sequence_form article > div > p');
	if(targets) jQuery(targets).hide();

	var stagger = setTimeout(function(){
		jQuery(document).scrollTop(jQuery('#sequence_form').offset().top - 75);
	}, 200);
}

function jumpToError(){
	var form = jQuery('#sequence_form');
	if(form){
		var errors = jQuery(form).find('input[aria-invalid="true"]');
		if(errors.length > 0) jQuery(document).scrollTop(jQuery(errors).offset().top - 87 - 33);
	}
}

/*============[ Animation Methods ]===========*/
jQuery.fn.stepAnimate = function(index,callback,target){
	var wait = index * 100;
	jQuery(this).delay(wait).animate({'opacity':1}, 300, function(){
		if(callback) callback(target);
	});
}