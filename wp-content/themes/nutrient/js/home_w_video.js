/* home screenReaderText */
/**
 * Frontpage functions file.
 *
 */

( function( $ ) {
	/*=======[ Vars ]==========*/
	var header_offset 	= $('body > header').height();

	if ('ontouchstart' in document.documentElement) {
		$(".scroll-indicator, video").hide();
 	}

	$( "body" ).wrapInner( "<div id='body-wrapper'></div>");
	if ('ontouchstart' in document.documentElement) {
		$( "#body-wrapper" ).css("overflow","auto");
 	}

	$(".animate").removeClass("animate");

	function runStoryline() {

		// init controller
		var controller = new ScrollMagic.Controller();

		// build tweens
		var h1Top = ($(window).width() >= 1024) ? "-=84px" : "-=42px",
			h1Opacity = ($(window).width() <= 736 || $(window).height() <= 640) ? "0" : "1",
			m = ($(window).width() <= 736 || $(window).height() <= 640) ? 0.25 : 0.5;

		var tweenContent = new TimelineMax().add([
			TweenMax.to($("#primary h1"), 1*m, {css: {scaleX: 0.5, scaleY: 0.5, top: h1Top, autoAlpha: h1Opacity }, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($("#primary hr"), 0.5*m, {css: {autoAlpha: 0, top: "-=42px"}, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($("#primary .site-excerpt"), 0.5*m, {css: {autoAlpha: 0, top: "-=42px"}, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".site-header > div"), 1*m, { css: { paddingTop: "0.875rem", paddingBottom: "0.875rem" }, onUpdate: function() {
				$(window).trigger("resize");
			}, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($("#site-navigation"), 1*m, { css: { marginTop: "0" }, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($("#masthead figure figcaption"), 1*m, { css: { height: 0, autoAlpha: 0, margin: 0 }, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($("#logo-main"), 1*m, { css: { height: "32px", width:"138px" }, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true })
		]);

		var scaleOuter = ($(window).width() <= 640) ? 0.4 : 1;

		var tweenCircles = new TimelineMax().add([
			TweenMax.fromTo($(".circles"), 0.75*m, { scale: 0, rotation: 0 }, { scale: scaleOuter, autoAlpha: 1, rotation: 270, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".circles"), 0.25*m, { scale: scaleOuter, rotation: 270 }, { scale: scaleOuter*0.75, rotation: 360, ease: Linear.easeNone, delay: 0.75*m, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".circles"), 5*m, { rotation: 1800, ease: Linear.easeNone, delay: 1, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".circle-0"), 1*m, { scale: 0, autoAlpha: 0 }, { scale: 1.25, autoAlpha: 1, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".circle-0"), 1*m, { scale: 1, ease: Linear.easeNone, delay: 1*m, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".circle-0 .outer-circle"), 10*m, { rotation: -9000, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".circle-1"), 1*m, { scale: 0, autoAlpha: 0 }, { scale: 1.25, autoAlpha: 1, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".circle-1"), 1*m, { scale: 1, ease: Linear.easeNone, delay: 1*m, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".circle-2"), 1*m, { scale: 0, autoAlpha: 0 }, { scale: 1.25, autoAlpha: 1, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".circle-2"), 1*m, { scale: 1, ease: Linear.easeNone, delay: 1*m, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".circle-3"), 1*m, { scale: 0, autoAlpha: 0 }, { scale: 1.25, autoAlpha: 1, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".circle-3"), 1*m, { scale: 1, ease: Linear.easeNone, delay: 1*m, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true })
		]);

		var tweenReputationBranch = new TimelineMax().add([
			TweenMax.to($(".reputation"), 1*m, { autoAlpha: 1, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".reputation"), 6*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".reputation .text"), 6*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".reputation"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 5*m, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true })
		]);

		var tweenSafeBranch = new TimelineMax().add([
			TweenMax.to($(".safe"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".safe"), 6*m, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".safe .text"), 6*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".safe .circle"), 6*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".safe"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 5*m })
		]);

		var tweenEffectiveBranch = new TimelineMax().add([
			TweenMax.to($(".effective"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".effective"), 4*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".effective .text"), 4*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".effective .circle"), 4*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".effective"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 3*m })
		]);

		var tweenExpireBranch = new TimelineMax().add([
			TweenMax.to($(".expire"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".expire"), 4*m, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".expire .text"), 4*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".expire"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 3*m })
		]);

		var tweenIngredientsBranch = new TimelineMax().add([
			TweenMax.to($(".ingredients"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".ingredients"), 3*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".ingredients .text"), 3*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".ingredients .arc"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".ingredients .arc .top-text, .ingredients .arc .btm-text"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m }),
			TweenMax.fromTo($(".ingredients .arc .top-text"), 3*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".ingredients .arc .btm-text"), 3*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".ingredients .arc .top-text, .ingredients .arc .btm-text"), 0.25*m, { autoAlpha: 1 }, { autoAlpha: 0, delay: 2.5*m, ease: Linear.easeNone }),
			TweenMax.to($(".ingredients"), 0.5*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 2.5*m })
		]);

		var tweenChoicesBranch = new TimelineMax().add([
			TweenMax.to($(".choices"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".choices"), 3*m, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".choices .text"), 3*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".choices .arc"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".choices .arc .top-text, .choices .arc .btm-text"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m }),
			TweenMax.fromTo($(".choices .arc .top-text"), 3*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".choices .arc .btm-text"), 3*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".choices .arc .top-text, .choices .arc .btm-text"), 0.5*m, { autoAlpha: 1 }, { autoAlpha: 0, delay: 2*m, ease: Linear.easeNone }),
			TweenMax.to($(".choices"), 0.5*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 2.5*m })
		]);

		var tweenBurnBranch = new TimelineMax().add([
			TweenMax.to($(".burn"), 1, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".burn"), 2, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".burn .text"), 2, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".burn .circle"), 2, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".burn"), 1, { autoAlpha: 0, ease: Linear.easeNone, delay: 1 })
		]);

		var tweenTrustBranch = new TimelineMax().add([
			TweenMax.to($(".trust"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".trust"), 2*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".trust .text"), 2*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".trust .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".trust"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 1*m })
		]);

		var tweenEyesBranch = new TimelineMax().add([
			TweenMax.to($(".eyes"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".eyes"), 2*m, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".eyes .text"), 2*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".eyes .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".eyes"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 1*m })
		]);

		var tweenProtectBranch = new TimelineMax().add([
			TweenMax.to($(".protect"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".protect"), 2*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".protect .text"), 2*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".protect .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".protect"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 1*m })
		]);

		var tweenSPFBranch = new TimelineMax().add([
			TweenMax.to($(".spf"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".spf"), 2*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".spf .text"), 2*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".spf .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".spf"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 1*m })
		]);

		var tweenSkinBranch = new TimelineMax().add([
			TweenMax.to($(".skin"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".skin"), 3*m, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".skin .text"), 3*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".skin .arc"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".skin .arc .top-text, .skin .arc .btm-text"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m }),
			TweenMax.fromTo($(".skin .arc .top-text"), 3*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".skin .arc .btm-text"), 3*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".skin .arc .top-text, .skin .arc .btm-text"), 0.5*m, { autoAlpha: 1 }, { autoAlpha: 0, delay: 2*m, ease: Linear.easeNone }),
			TweenMax.to($(".skin"), 0.5*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 2.5*m })
		]);

		var tweenUsageBranch = new TimelineMax().add([
			TweenMax.to($(".usage"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".usage"), 3*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".usage .text"), 3*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".usage .arc"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".usage .arc .top-text, .usage .arc .btm-text"), 0.25*m, { autoAlpha: 0 }, { autoAlpha: 1, delay: 0.5*m }),
			TweenMax.fromTo($(".usage .arc .top-text"), 3*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".usage .arc .btm-text"), 3*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".usage .arc .top-text, .usage .arc .btm-text"), 0.5*m, { opacity: 1 }, { autoAlpha: 0, delay: 2*m, ease: Linear.easeNone }),
			TweenMax.to($(".usage"), 0.5*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 2.5*m })
		]);

		var tweenCompareBranch = new TimelineMax().add([
			TweenMax.to($(".compare"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".compare"), 2*m, { rotation: 60 }, { rotation: -60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".compare .text"), 2*m, { rotation: -60 }, { rotation: 60, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".compare .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".compare"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 1*m })
		]);

		var tweenApplyBranch = new TimelineMax().add([
			TweenMax.to($(".apply"), 1*m, { autoAlpha: 1, ease: Linear.easeNone }),
			TweenMax.fromTo($(".apply"), 2*m, { rotation: 120 }, { rotation: 240, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".apply .text"), 2*m, { rotation: 240 }, { rotation: 120, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".apply .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".apply"), 1*m, { autoAlpha: 0, ease: Linear.easeNone, delay: 1*m })
		]);

		var tweenOrganicBranch = new TimelineMax().add([
			TweenMax.to($(".organic"), 1*m, { autoAlpha: 1, ease: Power2.easeOut }),
			TweenMax.fromTo($(".organic"), 2*m, { rotation: 60 }, { rotation: 30, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.fromTo($(".organic .text"), 2*m, { rotation: -60 }, { rotation: -30, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true }),
			TweenMax.to($(".organic .circle"), 2*m, { rotation: 720, ease: Linear.easeNone, backfaceVisibility:"hidden", transformStyle: "preserve-3d", force3D:true })
		]);


		// build scenes
		var intro = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 3000*m, offset: 0 })
						.setPin("#body-wrapper")
						.addTo(controller);
		var header = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 500*m, offset: 0 })
						.setTween(tweenContent)
						.addTo(controller);
		var sceneCircles = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 7160*m, offset: 40*m})
						.setTween(tweenCircles)
						.addTo(controller);

		var sceneReputationBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 150*m }).setTween(tweenReputationBranch).addTo(controller);
		var sceneSafeBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 900*m, offset: 375*m }).setTween(tweenSafeBranch).addTo(controller);
		var sceneEffectiveBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 900*m, offset: 550*m }).setTween(tweenEffectiveBranch).addTo(controller);
		var sceneExpireBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 725*m }).setTween(tweenExpireBranch).addTo(controller);
		var sceneIngredientsBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 1200*m, offset: 900*m }).setTween(tweenIngredientsBranch).addTo(controller);
		var sceneChoicesBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 1050*m }).setTween(tweenChoicesBranch).addTo(controller);
		var sceneBurnBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 1200*m, offset: 1175*m }).setTween(tweenBurnBranch).addTo(controller);
		var sceneTrustBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 900*m, offset: 1300*m }).setTween(tweenTrustBranch).addTo(controller);
		var sceneEyesBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 1400*m }).setTween(tweenEyesBranch).addTo(controller);
		var sceneProtectBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 1500*m }).setTween(tweenProtectBranch).addTo(controller);
		var sceneSPFBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 900*m, offset: 1575*m }).setTween(tweenSPFBranch).addTo(controller);
		var sceneSkinBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 1650*m }).setTween(tweenSkinBranch).addTo(controller);
		var sceneUsageBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 900*m, offset: 1725*m }).setTween(tweenUsageBranch).addTo(controller);
		var sceneCompareBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 750*m, offset: 1800*m }).setTween(tweenCompareBranch).addTo(controller);
		var sceneApplyBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 1050*m, offset: 1900*m }).setTween(tweenApplyBranch).addTo(controller);
		var sceneOrganicBranch = new ScrollMagic.Scene({ triggerHook: "onLeave", triggerElement: "#top", duration: 600*m, offset: 1900*m }).setTween(tweenOrganicBranch).addTo(controller);

	}
	
	// scroll indicator (not tied to scrolling)
	function animateScrollIndicator() {
		TweenMax.fromTo($(".dot"), 0.5, { css: { top: "14px", autoAlpha: 0 }}, { css: { top: "28px", autoAlpha: 1 }, delay: 0.5, ease: Linear.easeNone, onComplete: function() {
			TweenMax.to($(".dot"), 0.5, { css: { top: "42px"}, delay: 1.25, ease: Linear.easeNone });
			TweenMax.to($(".dot"), 0.25, { css: { autoAlpha: 0 }, delay: 1.5, ease: Linear.easeNone });
		}});
	}
	window.setInterval(function() {
		animateScrollIndicator();
	}, 3000);

	// for the animation stuff
	function resizeVideo() {

		$("video")[0].pause();

		var primaryHeight = parseInt(Math.ceil($(window).height()));

		$("#primary").css("height", primaryHeight);

		$("#video-container").css("height", primaryHeight);
		$("#video-container").css("width", primaryHeight*16/9);
		$("#video-container").css("left", (parseInt($("#primary").css("width")) - parseInt($("#video-container").css("width"))) / 2);

		if ('ontouchstart' in document.documentElement) {
			
			$("#thoughts").hide();
		
		} else {

			if (parseInt($("#video-container").css("width")) < parseInt($("#primary").width())) {
				$("#video-container, .still").css("height","auto").css("width","100%").css("left","0");
				$("#thoughts").css("top", parseInt(ww*0.1875 - 350));
			} else {
				$("#thoughts").removeAttr("style");
			}

		}

	}

	function resetText() {

		$(".text").each(function() {
			$(this).css("top", $(this).height()*-0.5);
		});

	}

	if ('ontouchstart' in document.documentElement) {
		resizeVideo(); resetText();
	} else {
		resizeVideo(); resetText(); animateScrollIndicator(); runStoryline();
	}

	var resizeId;
	$(window).on("resize", function() {
		resizeVideo(); resetText();

		scaleOuter = ($(window).width() <= 720) ? 0.8 : 1.25;

		clearTimeout(resizeId);
    	resizeId = setTimeout(doneResizing, 500);

    	if ('ontouchstart' in document.documentElement) {
    		$("#body-wrapper").css("width","100%");
    	} else {
    		$(".scrollmagic-pin-spacer").css("min-height","0px");
    	}
	});
	$(window).on("orientationchange", function() {
    	$(".scrollmagic-pin-spacer").css("min-height","0px");
	});

	function doneResizing() {
		$("video")[0].play();
	}

	window.setTimeout(function() {
		$( "video" )[0].play();
	}, 100);


} )( jQuery );
