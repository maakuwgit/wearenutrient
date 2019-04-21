/**
 * Theme admin functions file.
 * @todo plug this into the admin so that switching the template switches on the options. Possibly refer to Zyflo, which has this functionality
 */
( function( $ ) {
	$( document ).ready( function() {
		//Shortcuts
		vid_bg_select  = $('#page_template');
		vid_bg_metabox = $('#nutrient_home_options_meta_box.postbox');

		//Execute/Display changes
		function checkVidBg(event){ 
			vid_bg_select.val() !== 'true' ? vid_bg_metabox.hide() : vid_bg_metabox.show();
		}
		//Init
//		checkVidBg();

		//Check for changes
	//	vid_bg_select.change(checkVidBg);

	} );
} )( jQuery );
