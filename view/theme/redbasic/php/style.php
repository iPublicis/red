<?php

if(! $a->install) {
	// Get the UID of the channel owner
	$uid = get_theme_uid();

	if($uid)
	    load_pconfig($uid,'redbasic');

// Load the owners pconfig
		$nav_bg = get_pconfig($uid, "redbasic", "nav_bg");
		$nav_gradient_top = get_pconfig($uid, "redbasic", "nav_gradient_top");
		$nav_gradient_bottom = get_pconfig($uid, "redbasic", "nav_gradient_bottom");
		$nav_active_gradient_top = get_pconfig($uid, "redbasic", "nav_active_gradient_top");
		$nav_active_gradient_bottom = get_pconfig($uid, "redbasic", "nav_active_gradient_bottom");
		$nav_bd = get_pconfig($uid, "redbasic", "nav_bd");
		$nav_icon_colour = get_pconfig($uid, "redbasic", "nav_icon_colour");
		$nav_active_icon_colour = get_pconfig($uid, "redbasic", "nav_active_icon_colour");
		$narrow_navbar = get_pconfig($uid,'redbasic','narrow_navbar');
		$banner_colour = get_pconfig($uid,'redbasic','banner_colour');
		$link_colour = get_pconfig($uid, "redbasic", "link_colour");	
		$schema = get_pconfig($uid,'redbasic','schema');
		$bgcolour = get_pconfig($uid, "redbasic", "background_colour");	
		$background_image = get_pconfig($uid, "redbasic", "background_image");	
		$toolicon_colour = get_pconfig($uid,'redbasic','toolicon_colour');
		$toolicon_activecolour = get_pconfig($uid,'redbasic','toolicon_activecolour');
		$item_colour = get_pconfig($uid, "redbasic", "item_colour");	
		$item_opacity = get_pconfig($uid, "redbasic", "item_opacity");	
		$body_font_size = get_pconfig($uid, "redbasic", "body_font_size");	
		$font_size = get_pconfig($uid, "redbasic", "font_size");	
		$font_colour = get_pconfig($uid, "redbasic", "font_colour");	
		$radius = get_pconfig($uid, "redbasic", "radius");	
		$shadow = get_pconfig($uid,"redbasic","photo_shadow");
		$converse_width=get_pconfig($uid,"redbasic","converse_width");
		$converse_center=get_pconfig($uid,"redbasic","converse_center");
		$nav_min_opacity=get_pconfig($uid,'redbasic','nav_min_opacity');
		$sloppy_photos=get_pconfig($uid,'redbasic','sloppy_photos');
		$top_photo=get_pconfig($uid,'redbasic','top_photo');
		$reply_photo=get_pconfig($uid,'redbasic','reply_photo');

}

	// Now load the scheme.  If a value is changed above, we'll keep the settings
	// If not, we'll keep those defined by the schema
	// Setting $schema to '' wasn't working for some reason, so we'll check it's
	// not --- like the mobile theme does instead.


	// Allow layouts to over-ride the schema

	if($_REQUEST['schema'])
		$schema = $_REQUEST['schema'];

	if (($schema) && ($schema != '---')) {
		// Check it exists, because this setting gets distributed to clones
		if(file_exists('view/theme/redbasic/schema/' . $schema . '.php')) {
			$schemefile = 'view/theme/redbasic/schema/' . $schema . '.php';
			require_once ($schemefile);
		}
	}
		// If we haven't got a schema, load the default.  We shouldn't touch this - we
		// should leave it for admins to define for themselves.
			if (! $schema) {
			      if(file_exists('view/theme/redbasic/schema/default.php')) {
				    $schemefile = 'view/theme/redbasic/schema/' . 'default.php';
				    require_once ($schemefile);
				    }
			}
		
		
//Set some defaults - we have to do this after pulling owner settings, and we have to check for each setting
//individually.  If we don't, we'll have problems if a user has set one, but not all options.

	if (! $nav_bg)
		$nav_bg = "#222";
	if (! $nav_gradient_top)
		$nav_gradient_top = "#3c3c3c";
	if (! $nav_gradient_bottom)
		$nav_gradient_bottom = "#222";
	if (! $nav_active_gradient_top)
		$nav_active_gradient_top = "#222";
	if (! $nav_active_gradient_bottom)
		$nav_active_gradient_bottom = "#282828";
	if (! $nav_bd)
		$nav_bd = "#222";
	if (! $nav_icon_colour)
		$nav_icon_colour = "#999";
	if (! $nav_active_icon_colour)
		$nav_active_icon_colour = "#fff";
	if (! $navmenu_bgchover)
		$navmenu_bgchover = "#f5f5f5";
	if (! $navmenu_bgimage)
		$navmenu_bgimage = "";
	if (! $navtabs_borderc)
		$navtabs_borderc = "#ddd";
	if (! $navtabs_fontcolour)
		$navtabs_fontcolour = "#555";
	if (! $navtabs_bgcolour)
		$navtabs_bgcolour = "#fff";
	if (! $navtabs_linkcolour)
		$navtabs_linkcolour = "";
	if (! $navtabs_linkchover)
		$navtabs_linkchover = "";
	if (! $navtabs_decohover)
		$navtabs_decohover = "none";
	if (! $navtabs_bgchover)
		$navtabs_bgchover = "#eee";
	if (! $link_colour)
		$link_colour = "#0080ff";
	if (! $banner_colour)
		$banner_colour = "#fff";
	if (! $search_background)
		$search_background = "#eee";
	if (! $bgcolour)
		$bgcolour = "#fdfdfd";
	if (! $background_image)
		$background_image ='';
	if (! $item_colour)
		$item_colour = "#fdfdfd";
	if (! $toolicon_colour)
		$toolicon_colour = '#777';
	if (! $toolicon_activecolour)
		$toolicon_activecolour = '#000';
	if (! $item_opacity)
		$item_opacity = "1";
	if (! $item_bordercolour)
		$item_bordercolour = "#f4f4f4";
	if (! $font_size)
		$font_size = "1.0em";
	if (! $body_font_size)
		$body_font_size = "11px";
	if (! $font_colour)
		$font_colour = "#4d4d4d";
	if (! $selected_active_colour)
		$selected_active_colour = "#444";
	if (! $selected_active_deco)
		$selected_active_deco = "none";
	if (! $blockquote_colour)
		$blockquote_colour = "#000";
	if (! $blockquote_bgcolour)
		$blockquote_bgcolour = "#f4f8f9";
	if (! $blockquote_bordercolour)
		$blockquote_bordercolour = "#dae4ee";
	if (! $code_borderc)
		$code_borderc = "#444";
	if (! $code_bgcolour)
		$code_bgcolour = "#EEE";
	if (! $code_txtcolour)
		$code_txtcolour = "#444";
	if (! $notif_itemcolour)
		$notif_itemcolour = "#000";
	if (! $notif_itemhovercolour)
		$notif_itemhovercolour = "#000";
	if (! $editbuttons_bgcolour)
		$editbuttons_bgcolour = "#fff";
	if (! $editbuttons_bordercolour)
		$editbuttons_bordercolour = "#ccc";
	if (! $editbuttons_bghover)
		$editbuttons_bghover = "#ebebeb";
	if (! $preview_backgroundimg)
		$preview_backgroundimg = "gray_and_white_diagonal_stripes_background_seamless.gif";
	if (! $acpopup_bgcolour)
		$acpopup_bgcolour = "#fff";
	if (! $acpopup_bordercolour)
		$acpopup_bordercolour = "#ccc";
	if (! $acpopup_tgbl_bgcolour)
		$acpopup_tgbl_bgcolour = "#ddddff";
	if (! $acpopup_hovercolour)
		$acpopup_hovercolour = "#000";
	if (! $notify_bgcolour)
		$notify_bgcolour = "#fff";
	if (! $notify_linkcolour)
		$notify_linkcolour = "#333";	
	if (! $notify_bghover)
		$notify_bghover = "#e7e7e7";
	if (! $notifyseen_bgcolour)
		$notifyseen_bgcolour = "#ddd";
	if (! $notifyseen_linkcolour)
		$notifyseen_linkcolour = "#333";
	if (! $notifyseen_bghover)
		$notifyseen_bghover = "#e7e7e7";
	if (! $notifyseen_linkhover)
		$notifyseen_linkhover = "#333";
	if (! $notify_topmargin)
		$notify_topmargin = "1px";
	if (! $input_bgsubmit)
		$input_bgsubmit = "#F0F0F0";
	if (! $input_linksubmit)
		$input_linksubmit = "#0080FF";
	if (! $input_border)
		$input_border = "#666";
	if (! $input_colourhover)
		$input_colourhover = "#333";
	if (! $input_decohover)
		$input_decohover = "none";
	if (! $radius)
		$radius = "0";
	if (! $shadow)
		$shadow = "0";
	if(! $active_colour)
		$active_colour = "#fff";
	if (! $converse_width) {
		$converse_width = "1024px";
	}
	if (! $acl_bgcolour)
		$acl_bgcolour = "#fff";
	if (! $acl_bordercolour)
		$acl_bordercolour = "#ccc";
	if (! $aclbutton_linkcolour)
		$aclbutton_linkcolour = "";
	if (! $abookself_bgcolour)
		$abookself_bgcolour = "#ffdddd";
	if(! $top_photo)
		$top_photo = '48px';
	$pmenu_top = intval($top_photo) - 16 . 'px';
	$wwtop = intval($top_photo) - 15 . 'px';
	$comment_indent = intval($top_photo) + 10 . 'px';

	if(! $reply_photo)
		$reply_photo = '32px';
	$pmenu_reply = intval($reply_photo) - 16 . 'px';
	
	if($nav_min_opacity === false || $nav_min_opacity === '') {
		$nav_float_min_opacity = 1.0;
		$nav_percent_min_opacity = 100;
	}
	else {
		$nav_float_min_opacity = (float) $nav_min_opacity;
		$nav_percent_min_opacity = (int) 100 * $nav_min_opacity;
	}

// Apply the settings
	if(file_exists('view/theme/redbasic/css/style.css')) {
		$x = file_get_contents('view/theme/redbasic/css/style.css');

$body_width = (231 + $converse_width) . 'px'; // aside is 231px + converse width; have to find a way for calculation with 'px', cannot handle '%'

$options = array (
'$nav_bg' => $nav_bg,
'$nav_gradient_top' => $nav_gradient_top,
'$nav_gradient_bottom' => $nav_gradient_bottom,
'$nav_active_gradient_top' => $nav_active_gradient_top,
'$nav_active_gradient_bottom' => $nav_active_gradient_bottom,
'$nav_bd' => $nav_bd,
'$nav_icon_colour' => $nav_icon_colour,
'$nav_active_icon_colour' => $nav_active_icon_colour,
'$navmenu_bgchover' => $navmenu_bgchover,
'$navmenu_bgimage' => $navmenu_bgimage,
'$navtabs_borderc' => $navtabs_borderc,
'$navtabs_fontcolour' => $navtabs_fontcolour,
'$navtabs_bgcolour' => $navtabs_bgcolour,
'$navtabs_linkcolour' => $navtabs_linkcolour,
'$navtabs_linkchover' => $navtabs_linkchover,
'$navtabs_bgchover' => $navtabs_bgchover,
'$navtabs_decohover' => $navtabs_decohover,
'$link_colour' => $link_colour,
'$banner_colour' => $banner_colour,
'$search_background' => $search_background,
'$bgcolour' => $bgcolour,
'$background_image' => $background_image,
'$item_colour' => $item_colour,
'$item_opacity' => $item_opacity,
'$item_bordercolour' => $item_bordercolour,
'$toolicon_colour' => $toolicon_colour,
'$toolicon_activecolour' => $toolicon_activecolour,
'$font_size' => $font_size,
'$font_colour' => $font_colour,
'$selected_active_colour' => $selected_active_colour,
'$selected_active_deco' => $selected_active_deco,
'$body_font_size' => $body_font_size,
'$blockquote_colour' => $blockquote_colour,
'$blockquote_bgcolour' => $blockquote_bgcolour,
'$blockquote_bordercolour' => $blockquote_bordercolour,
'$blockquote_bgcolourhover' => $blockquote_bgcolourhover,
'$code_borderc' => $code_borderc,
'$code_bgcolour' => $code_bgcolour,
'$code_txtcolour' => $code_txtcolour,
'$notif_itemcolour' => $notif_itemcolour,
'$notif_itemhovercolour' => $notif_itemhovercolour,
'$editbuttons_bgcolour' => $editbuttons_bgcolour,
'$editbuttons_bordercolour' => $editbuttons_bordercolour,
'$editbuttons_bghover' => $editbuttons_bghover,
'$preview_backgroundimg' => $preview_backgroundimg,
'$acpopup_bgcolour' => $acpopup_bgcolour,
'$acpopup_bordercolour' => $acpopup_bordercolour,
'$acpopup_tgbl_bgcolour' => $acpopup_tgbl_bgcolour,
'$acpopup_hovercolour' => $acpopup_hovercolour,
'$notify_bgcolour' => $notify_bgcolour,
'$notify_linkcolour' => $notify_linkcolour,
'$notify_bghover' => $notify_bghover,
'$notifyseen_bgcolour' => $notifyseen_bgcolour,
'$notifyseen_linkcolour' => $notifyseen_linkcolour,
'$notifyseen_bghover' => $notifyseen_bghover,
'$notifyseen_linkhover' => $notifyseen_linkhover,
'$notify_topmargin' => $notify_topmargin,
'$input_bgsubmit' => $input_bgsubmit,
'$input_linksubmit' => $input_linksubmit,
'$input_border' => $input_border,
'$input_colourhover' => $input_colourhover,
'$input_decohover' => $input_decohover,
'$radius' => $radius,
'$shadow' => $shadow,
'$active_colour' => $active_colour,
'$converse_width' => $converse_width,
'$acl_bgcolour' => $acl_bgcolour,
'$acl_bordercolour' => $acl_bordercolour,
'$aclbutton_linkcolour' => $aclbutton_linkcolour,
'$abookself_bgcolour' => $abookself_bgcolour,
'$nav_float_min_opacity' => $nav_float_min_opacity,
'$nav_percent_min_opacity' => $nav_percent_min_opacity,
'$top_photo' => $top_photo,
'$reply_photo' => $reply_photo,
'$pmenu_top' => $pmenu_top,
'$pmenu_reply' => $pmenu_reply,
'$wwtop' => $wwtop,
'$comment_indent' => $comment_indent,
'$body_width' => $body_width
);

echo str_replace(array_keys($options), array_values($options), $x);    
}

if($sloppy_photos && file_exists('view/theme/redbasic/css/sloppy_photos.css')) {
	echo file_get_contents('view/theme/redbasic/css/sloppy_photos.css');
} 
if($narrow_navbar && file_exists('view/theme/redbasic/css/narrow_navbar.css')) {
	echo file_get_contents('view/theme/redbasic/css/narrow_navbar.css');
} 
if($converse_center && file_exists('view/theme/redbasic/css/converse_center.css')) {
	$x = file_get_contents('view/theme/redbasic/css/converse_center.css');
	echo str_replace(array_keys($options), array_values($options), $x);
} 
