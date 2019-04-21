<?php
/**
 * The template used for displaying contest page content
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1.2
 */

	$contest_title 	= get_post_meta( get_the_ID(), '_nutrient_header_copy', true );

?>
<section data-magellan-target="primary" id="primary" class="content-area white" role="main">
	<article class="row text-center">
		<figure>
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('medium'); ?>
			<?php nutrient_post_thumbnail('thumbnail'); ?>
			<figcaption data-magellan>
				<h1 class="animate"><?php echo html_entity_decode($contest_title); ?></h1>
				<?php nutrient_excerpt(); ?>
				<a href="#welcome" class="block"><em class="fa fa-chevron-down"></em></a>
			</figcaption>
		</figure>
	</article>
</section>
<section data-magellan-target="welcome" id="welcome" rel="the_content" class="content-area pink post" role="post-content">
	<article class="row">
		<div class="entry-content columns small-12 medium-10 medium-offset-1 text-center">
			<figure class="row" id="vc_logo">
				<img alt="the Vulnerability Challenge" src="<?php echo get_template_directory_uri() . '/img/logo-vulnerability_challenge.png'?>">
			</figure>
			<h2>Welcome to the Vulnerability Challenge</h2>
			<p>The Vulnerability Challenge is your exclusive opportunity to partner with <a href="<?php echo bloginfo('url'); ?>" target="_blank">Nutrient</a> and discover a new way to think about your brand and consumers. We are obsessed with researching health and wellness decision making; specifically, how and why moms choose specific products for their precious little ones.</p>
			<p>Right now, we're looking for a brand to get a sneak peek at our process and the true value of vulnerabilities. We admire the value of what you're selling and would love to partner and work with you—at no cost to you. Yep, you read that correctly. No. Cost. To. You.</p>
			<p>Hey Nutrient (you might ask), why are you giving away your proprietary process that digs deep into consumers’ vulnerabilities to uncover what really drives buying decisions? It's simple. We want to show you the value in exposing vulnerabilities and how you can use them to motivate consumers. All we ask in return is that you allow us to use our work together to enlighten the health and wellness world to the power of vulnerabilities.</p>
			<h2>Turning Vulnerabilities into <br>Healthy Motivation<sup>&reg;</sup></h2>
			<p>At <a href="<?php echo bloginfo('url'); ?>" target="_blank">Nutrient</a>, we've proven health and wellness decisions make people feel vulnerable. The Vulnerability Challenge will introduce you to our <a href="<?php echo bloginfo('url') . '/approach/#healthy-motivation'; ?>" target="_blank">Healthy Motivation<sup>&reg;</sup></sup></a> process and turn these learnings into an actionable strategic platform and boundary-pushing creative ideas that can help your brand reach a whole new level of success.</p>
		</div>
	</article>
</section>
<section data-magellan-target="rules" id="rules" rel="the_content" class="content-area white post" role="post-content">
	<article class="row">
		<div class="columns small-12">
			<h2>Let's get vulnerable together</h2>
		</div>
		<div class="columns medium-6">
			<ol>
				<li><span class="num">1</span><b>Enter your information and answer a few questions</b> about your brand. We're not looking for the obvious answers. Nutrient wants a partner who is honest about their brand&mdash;warts, bald spots, and all-and who wants to push the brand, team, and thinking forward.</li>
				<li><span class="num">2</span><strong>Submissions must be received by 12.02.16.</strong> Nutrient will review all entries received based on <div data-tooltip aria-haspopup="true" class="has-tip right" data-disable-hover="false" tabindex="1" title="Each entry will be judged on the clarity of your challenge, honesty about your brand, your willingness to embrace change, and your willingness to actively participate in the process">specific criteria<em class="fa-info"></em></div>.</li>
			</ol>
		</div>
		<div class="columns medium-6">
			<ol>
				<li><span class="num">3</span>You agree to succumb to a grueling <b>interview process</b>. Not really. We just want to chat and get over any first-date type awkwardness.</li>
				<li><span class="num">4</span>Our Vulnerability Challenge brand partner will be <b>selected on 12.15.16.</b></li>
				<li><span class="num">5</span>We rock this Vulnerability Challenge and your brand comes out with a fresh perspective, a redefined strategy, and some killer creative.</li>
			</ol>
		</div>
	</article>
</section>
<section data-magellan-target="sequence_form" id="sequence_form" class="content-area gold">
	<article class="row">
		<div class="columns small-12">
			<h2>Let's get started</h2>
			<p>Just complete this form by 12.02.16. It'll probably be the easiest thing you do all day.<br> If we think there's a match, we'll be in touch to talk more.</p>
			<?php echo do_shortcode('[contact-form-7 id="308" title="Contest"]'); ?>
		</div>
	</article>
</section>