<?php
//-- mod : language settings -----------------------------------------------------------------------
//-- mod : mods settings ---------------------------------------------------------------------------
//-- mod : post icon -------------------------------------------------------------------------------
/***************************************************************************
 *                               functions.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: functions.php,v 1.133.2.47 2006/06/08 21:11:04 grahamje Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *
 ***************************************************************************/

// Added by Attached Forums MOD
function check_unread($forum_id)
{
	global $new_topic_data, $tracking_topics, $tracking_forums, $HTTP_COOKIE_VARS, $board_config;
	if ( !empty($new_topic_data[$forum_id]) )
	{
		$forum_last_post_time = 0;

		while( list($check_topic_id, $check_post_time) = @each($new_topic_data[$forum_id]) )
		{
			if ( empty($tracking_topics[$check_topic_id]) )
			{
				$unread_topics = true;
				$forum_last_post_time = max($check_post_time, $forum_last_post_time);
			}
			else
			{
				if ( $tracking_topics[$check_topic_id] < $check_post_time )
				{
					$unread_topics = true;
					$forum_last_post_time = max($check_post_time, $forum_last_post_time);
				}
			}
		}

		if ( !empty($tracking_forums[$forum_id]) )
		{
			if ( $tracking_forums[$forum_id] > $forum_last_post_time )
			{
				$unread_topics = false;
			}
		}

		if ( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) )
		{
			if ( $HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all'] > $forum_last_post_time )
			{
				$unread_topics = false;
			}
		}
	}
	return $unread_topics;
}
// END Added by Attached Forums MOD

//-- mod : post icon -------------------------------------------------------------------------------
//-- add
function get_icon_title($icon, $empty=0, $topic_type=-1, $admin=false)
{
	global $lang, $images, $phpEx, $phpbb_root_path;

	// get icons parameters
	include($phpbb_root_path . './includes/def_icons.' . $phpEx);

	// admin path
	$admin_path = ($admin) ? '../' : './';

	// alignment
	switch ($empty)
	{
		case 1:
			$align= 'middle';
			break;
		case 2:
			$align= 'bottom';
			break;
		default:
			$align = 'absbottom';
			break;
	}

	// find the icon
	$found = false;
	$icon_map = -1;
	for ($i=0; ($i < count($icones)) && !$found; $i++)
	{
		if ($icones[$i]['ind'] == $icon)
		{
			$found = true;
			$icon_map = $i;
		}
	}

	// icon not found : try a default value
	if (!$found || ($found && empty($icones[$icon_map]['img'])))
	{
		$change = true;
		switch($topic_type)
		{
			case POST_NORMAL:
				$icon = $icon_defined_special['POST_NORMAL']['icon'];
				break;
			case POST_STICKY:
				$icon = $icon_defined_special['POST_STICKY']['icon'];
				break;
			case POST_ANNOUNCE:
				$icon = $icon_defined_special['POST_ANNOUNCE']['icon'];
				break;
			case POST_GLOBAL_ANNOUNCE:
				$icon = $icon_defined_special['POST_GLOBAL_ANNOUNCE']['icon'];
				break;
			case POST_BIRTHDAY:
				$icon = $icon_defined_special['POST_BIRTHDAY']['icon'];
				break;
			case POST_CALENDAR:
				$icon = $icon_defined_special['POST_CALENDAR']['icon'];
				break;
			case POST_PICTURE:
				$icon = $icon_defined_special['POST_PICTURE']['icon'];
				break;
			case POST_ATTACHMENT:
				$icon = $icon_defined_special['POST_ATTACHEMENT']['icon'];
				break;
			default:
				$change=false;
				break;
		}

		// a default icon has been sat
		if ($change)
		{
			// find the icon
			$found = false;
			$icon_map = -1;
			for ($i=0; ($i < count($icones)) && !$found; $i++)
			{
				if ($icones[$i]['ind'] == $icon)
				{
					$found = true;
					$icon_map = $i;
				}
			}
		}
	}

	// build the icon image
	if (!$found || ($found && empty($icones[$icon_map]['img'])))
	{
		switch ($empty)
		{
			case 0:
				$res = '';
				break;
			case 1:
				$res = '<img width="20" align="' . $align . '" src="' . $admin_path . $images['spacer'] . '" alt="" border="0">';
				break;
			case 2:
				$res = isset($lang[ $icones[$icon_map]['alt'] ]) ? $lang[ $icones[$icon_map]['alt'] ] : $icones[$icon_map]['alt'];
				break;
		}
	}
	else
	{
		$res = '<img align="' . $align . '" src="' . ( isset($images[ $icones[$icon_map]['img'] ]) ? $admin_path . $images[ $icones[$icon_map]['img'] ] : $admin_path . $icones[$icon_map]['img'] ) . '" alt="' . ( isset($lang[ $icones[$icon_map]['alt'] ]) ? $lang[ $icones[$icon_map]['alt'] ] : $icones[$icon_map]['alt'] ) . '" border="0">';
	}

	return $res;
}
//-- fin mod : post icon ---------------------------------------------------------------------------

function get_db_stat($mode)
{
	global $db;

	switch( $mode )
	{
		case 'usercount':
			$sql = "SELECT COUNT(user_id) AS total
				FROM " . USERS_TABLE . "
				WHERE user_id <> " . ANONYMOUS;
			break;

		case 'newestuser':
			$sql = "SELECT user_id, username
				FROM " . USERS_TABLE . "
				WHERE user_id <> " . ANONYMOUS . "
				ORDER BY user_id DESC
				LIMIT 1";
//-- mod : rank color system ---------------------------------------------------
//-- add
			$sql = str_replace('SELECT ', 'SELECT user_level, user_color, user_group_id, ', $sql);
//-- fin mod : rank color system -----------------------------------------------
			break;

		case 'postcount':
		case 'topiccount':
			$sql = "SELECT SUM(forum_topics) AS topic_total, SUM(forum_posts) AS post_total
				FROM " . FORUMS_TABLE;
			break;
	}

	if ( !($result = $db->sql_query($sql)) )
	{
		return false;
	}

	$row = $db->sql_fetchrow($result);

	switch ( $mode ) 	{
		case 'usercount':
			return $row['total'];
			break;
		case 'newestuser':
			return $row;
			break;
		case 'postcount':
			return $row['post_total'];
			break;
		case 'topiccount':
			return $row['topic_total'];
			break;
	}

	return false;
} 
// added at phpBB 2.0.11 to properly format the username
function phpbb_clean_username($username)
{
	$username = substr(htmlspecialchars(str_replace("\'", "'", trim($username))), 0, 25);
	$username = phpbb_rtrim($username, "\\");
	$username = str_replace("'", "\'", $username);

	return $username;
}

/**
* This function is a wrapper for ltrim, as charlist is only supported in php >= 4.1.0
* Added in phpBB 2.0.18
*/
function phpbb_ltrim($str, $charlist = false)
{
	if ($charlist === false)
	{
		return ltrim($str);
	}
	
	$php_version = explode('.', PHP_VERSION);

	// php version < 4.1.0
	if ((int) $php_version[0] < 4 || ((int) $php_version[0] == 4 && (int) $php_version[1] < 1))
	{
		while ($str{0} == $charlist)
		{
			$str = substr($str, 1);
		}
	}
	else
	{
		$str = ltrim($str, $charlist);
	}

	return $str;
}

// added at phpBB 2.0.12 to fix a bug in PHP 4.3.10 (only supporting charlist in php >= 4.1.0)
function phpbb_rtrim($str, $charlist = false)
{
	if ($charlist === false)
	{
		return rtrim($str);
	}
	
	$php_version = explode('.', PHP_VERSION);

	// php version < 4.1.0
	if ((int) $php_version[0] < 4 || ((int) $php_version[0] == 4 && (int) $php_version[1] < 1))
	{
		while ($str{strlen($str)-1} == $charlist)
		{
			$str = substr($str, 0, strlen($str)-1);
		}
	}
	else
	{
		$str = rtrim($str, $charlist);
	}

	return $str;
}

/**
* Our own generator of random values
* This uses a constantly changing value as the base for generating the values
* The board wide setting is updated once per page if this code is called
* With thanks to Anthrax101 for the inspiration on this one
* Added in phpBB 2.0.20
*/
function dss_rand()
{
	global $db, $board_config, $dss_seeded;

	$val = $board_config['rand_seed'] . microtime();
	$val = md5($val);
	$board_config['rand_seed'] = md5($board_config['rand_seed'] . $val . 'a');
   
	if($dss_seeded !== true)
	{
		$sql = "UPDATE " . CONFIG_TABLE . " SET
			config_value = '" . $board_config['rand_seed'] . "'
			WHERE config_name = 'rand_seed'";
		
		if( !$db->sql_query($sql) )
		{
			message_die(GENERAL_ERROR, "Unable to reseed PRNG", "", __LINE__, __FILE__, $sql);
		}

		$dss_seeded = true;
	}

	return substr($val, 4, 16);
}


//
// Get Userdata, $user can be username or user_id. If force_str is true, the username will be forced.
//
function get_userdata($user, $force_str = false)
{
	global $db;

	if (!is_numeric($user) || $force_str)
	{
		$user = phpbb_clean_username($user);
	}
	else
	{
		$user = intval($user);
	}

	$sql = "SELECT *
		FROM " . USERS_TABLE . " 
		WHERE ";
	$sql .= ( ( is_integer($user) ) ? "user_id = $user" : "username = '" .  str_replace("\'", "''", $user) . "'" ) . " AND user_id <> " . ANONYMOUS;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Tried obtaining data for a non-existent user', '', __LINE__, __FILE__, $sql);
	}

	return ( $row = $db->sql_fetchrow($result) ) ? $row : false;
}


function make_jumpbox($action, $match_forum_id = 0)
{
	global $template, $userdata, $lang, $db, $nav_links, $phpEx, $SID;
	global $parent_lookup;

//	$is_auth = auth(AUTH_VIEW, AUTH_LIST_ALL, $userdata);

	$sql = "SELECT c.cat_id, c.cat_title, c.cat_order
		FROM " . CATEGORIES_TABLE . " c, " . FORUMS_TABLE . " f
		WHERE f.cat_id = c.cat_id
		GROUP BY c.cat_id, c.cat_title, c.cat_order
		ORDER BY c.cat_order";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Couldn't obtain category list.", "", __LINE__, __FILE__, $sql);
	}
	
	$category_rows = array();
	while ( $row = $db->sql_fetchrow($result) )
	{
		$category_rows[] = $row;
	}

	if ( $total_categories = count($category_rows) )
	{
		$sql = "SELECT *
			FROM " . FORUMS_TABLE . "
			ORDER BY cat_id, forum_order";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain forums information', '', __LINE__, __FILE__, $sql);
		}

		$boxstring = '<select name="' . POST_FORUM_URL . '" onchange="if(this.options[this.selectedIndex].value != -1){ forms[\'jumpbox\'].submit() }"><option value="-1">' . $lang['Select_forum'] . '</option>';

		$forum_rows = array();
		while ( $row = $db->sql_fetchrow($result) )
		{
			if( empty($row['forum_link']) )
			{
				$forum_rows[] = $row;
			}
		}

		if ( $total_forums = count($forum_rows) )
		{
			for($i = 0; $i < $total_categories; $i++)
			{
				$boxstring_forums = '';
				for($j = 0; $j < $total_forums; $j++)
				{				
					if ($parent_lookup==$forum_rows[$j]['forum_id'] && !$assigned)
					{
						$template->assign_block_vars('switch_parent_link', array() );

						$template->assign_vars(array(
							'PARENT_NAME' => $forum_rows[$j]['forum_name'],
							'PARENT_URL'=>append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $forum_rows[$j]['forum_id'])
							));
						$assigned=TRUE;
					}
					if ( $forum_rows[$j]['cat_id'] == $category_rows[$i]['cat_id'] && $forum_rows[$j]['auth_view'] <= AUTH_REG )
					{

//					if ( $forum_rows[$j]['cat_id'] == $category_rows[$i]['cat_id'] && $is_auth[$forum_rows[$j]['forum_id']]['auth_view'] )
//					{
						$selected = ( $forum_rows[$j]['forum_id'] == $match_forum_id ) ? 'selected="selected"' : '';
						$box_forum_name = ( $forum_rows[$j]['attached_forum_id'] != -1 ) ? '|------' . $forum_rows[$j]['forum_name'] : '|---' . $forum_rows[$j]['forum_name'];
						$boxstring_forums .=  '<option value="' . $forum_rows[$j]['forum_id'] . '"' . $selected . '>' . $box_forum_name . '</option>';

						//
						// Add an array to $nav_links for the Mozilla navigation bar.
						// 'chapter' and 'forum' can create multiple items, therefore we are using a nested array.
						//
						$nav_links['chapter forum'][$forum_rows[$j]['forum_id']] = array (
							'url' => append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $forum_rows[$j]['forum_id']),
							'title' => $forum_rows[$j]['forum_name']
						);
								
					}
				}

				if ( $boxstring_forums != '' )
				{
					$boxstring .= '<option value="-1">|</option>';
					$boxstring .= '<option value="-1">|-' . $category_rows[$i]['cat_title'] . '</option>';
					$boxstring .= '<option value="-1">|----------------</option>';
					$boxstring .= $boxstring_forums;
				}
			}
		}

		$boxstring .= '</select>';
	}
	else
	{
		$boxstring .= '<select name="' . POST_FORUM_URL . '" onchange="if(this.options[this.selectedIndex].value != -1){ forms[\'jumpbox\'].submit() }"></select>';
	}

	// Let the jumpbox work again in sites having additional session id checks.
//	if ( !empty($SID) )
//	{
		$boxstring .= '<input type="hidden" name="sid" value="' . $userdata['session_id'] . '" />';
//	}

	$template->set_filenames(array(
		'jumpbox' => 'jumpbox.tpl')
	);
	$template->assign_vars(array(
		'L_GO' => $lang['Go'],
		'L_JUMP_TO' => $lang['Jump_to'],
		'L_SELECT_FORUM' => $lang['Select_forum'],

		'S_JUMPBOX_SELECT' => $boxstring,
		'S_JUMPBOX_ACTION' => append_sid($action))
	);
	$template->assign_var_from_handle('JUMPBOX', 'jumpbox');

	return;
}

//
// Initialise user settings on page load
function init_userprefs($userdata)
{
	global $board_config, $theme, $images;
	global $template, $lang, $phpEx, $phpbb_root_path, $db;
	global $nav_links;

//-- mod : mods settings ---------------------------------------------------------------------------
//-- add
	global $db, $mods, $list_yes_no, $userdata;

	//	get all the mods settings
	$dir = @opendir($phpbb_root_path . 'includes/mods_settings');
	while( $file = @readdir($dir) )
	{
		if( preg_match("/^mod_.*?\." . $phpEx . "$/", $file) )
		{
			include_once($phpbb_root_path . 'includes/mods_settings/' . $file);
		}
	}
	@closedir($dir);
//-- fin mod : mods settings -----------------------------------------------------------------------

	if ( $userdata['user_id'] != ANONYMOUS )
	{
		if ( !empty($userdata['user_lang']))
		{
			$default_lang = phpbb_ltrim(basename(phpbb_rtrim($userdata['user_lang'])), "'");
		}

		if ( !empty($userdata['user_dateformat']) )
		{
			$board_config['default_dateformat'] = $userdata['user_dateformat'];
		}

		if ( isset($userdata['user_timezone']) )
		{
			$board_config['board_timezone'] = $userdata['user_timezone'];
		}
	}
	else
	{
		$default_lang = phpbb_ltrim(basename(phpbb_rtrim($board_config['default_lang'])), "'");
	}

	if ( !file_exists(@phpbb_realpath($phpbb_root_path . 'language/lang_' . $default_lang . '/lang_main.'.$phpEx)) )
	{
		if ( $userdata['user_id'] != ANONYMOUS )
		{
			// For logged in users, try the board default language next
			$default_lang = phpbb_ltrim(basename(phpbb_rtrim($board_config['default_lang'])), "'");
		}
		else
		{
			// For guests it means the default language is not present, try english
			// This is a long shot since it means serious errors in the setup to reach here,
			// but english is part of a new install so it's worth us trying
			$default_lang = 'english';
		}

		if ( !file_exists(@phpbb_realpath($phpbb_root_path . 'language/lang_' . $default_lang . '/lang_main.'.$phpEx)) )
		{
			message_die(CRITICAL_ERROR, 'Could not locate valid language pack');
		}
	}

	// If we've had to change the value in any way then let's write it back to the database
	// before we go any further since it means there is something wrong with it
	if ( $userdata['user_id'] != ANONYMOUS && $userdata['user_lang'] !== $default_lang )
	{
		$sql = 'UPDATE ' . USERS_TABLE . "
			SET user_lang = '" . $default_lang . "'
			WHERE user_lang = '" . $userdata['user_lang'] . "'";

		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(CRITICAL_ERROR, 'Could not update user language info');
		}

		$userdata['user_lang'] = $default_lang;
	}
	elseif ( $userdata['user_id'] == ANONYMOUS && $board_config['default_lang'] !== $default_lang )
	{
		$sql = 'UPDATE ' . CONFIG_TABLE . "
			SET config_value = '" . $default_lang . "'
			WHERE config_name = 'default_lang'";

		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(CRITICAL_ERROR, 'Could not update user language info');
		}
	}

	$board_config['default_lang'] = $default_lang;

	include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_main.' . $phpEx);

	if ( defined('IN_ADMIN') )
	{
		if( !file_exists(@phpbb_realpath($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_admin.'.$phpEx)) )
		{
			$board_config['default_lang'] = 'english';
		}

		include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_admin.' . $phpEx);
	}

//-- mod : language settings ---------------------------------------------------
//-- add
	include($phpbb_root_path . 'includes/lang_extend_mac.' . $phpEx);
//-- fin mod : language settings -----------------------------------------------

	include_attach_lang();

	//
	// Set up style
	//
	if ( !$board_config['override_user_style'] )
	{
		if ( $userdata['user_id'] != ANONYMOUS && $userdata['user_style'] > 0 )
		{
			if ( $theme = setup_style($userdata['user_style']) )
			{
				return;
			}
		}
	}

	$theme = setup_style($board_config['default_style']);

	//
	// Mozilla navigation bar
	// Default items that should be valid on all pages.
	// Defined here to correctly assign the Language Variables
	// and be able to change the variables within code.
	//
	$nav_links['top'] = array ( 
		'url' => append_sid($phpbb_root_path . 'index.' . $phpEx),
		'title' => sprintf($lang['Forum_Index'], $board_config['sitename'])
	);
	$nav_links['search'] = array ( 
		'url' => append_sid($phpbb_root_path . 'search.' . $phpEx),
		'title' => $lang['Search']
	);
	$nav_links['help'] = array (  		'url' => append_sid($phpbb_root_path . 'faq.' . $phpEx),
		'title' => $lang['FAQ']
	);
	$nav_links['author'] = array ( 
		'url' => append_sid($phpbb_root_path . 'memberlist.' . $phpEx),
		'title' => $lang['Memberlist']
	);

	return;
}

function setup_style($style)
{
	global $db, $board_config, $template, $images, $phpbb_root_path;

	$sql = 'SELECT *
		FROM ' . THEMES_TABLE . '
		WHERE themes_id = ' . (int) $style;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, 'Could not query database for theme info');
	}

	if ( !($row = $db->sql_fetchrow($result)) )
	{
		// We are trying to setup a style which does not exist in the database
		// Try to fallback to the board default (if the user had a custom style)
		// and then any users using this style to the default if it succeeds
		if ( $style != $board_config['default_style'])
		{
			$sql = 'SELECT *
				FROM ' . THEMES_TABLE . '
				WHERE themes_id = ' . (int) $board_config['default_style'];
			if ( !($result = $db->sql_query($sql)) )
			{
				message_die(CRITICAL_ERROR, 'Could not query database for theme info');
			}

			if ( $row = $db->sql_fetchrow($result) )
			{
				$db->sql_freeresult($result);

				$sql = 'UPDATE ' . USERS_TABLE . '
					SET user_style = ' . (int) $board_config['default_style'] . "
					WHERE user_style = $style";
				if ( !($result = $db->sql_query($sql)) )
				{
					message_die(CRITICAL_ERROR, 'Could not update user theme info');
				}
			}
			else
			{
				message_die(CRITICAL_ERROR, "Could not get theme data for themes_id [$style]");
			}
		}
		else
		{
			message_die(CRITICAL_ERROR, "Could not get theme data for themes_id [$style]");
		}
	}

	$template_path = 'templates/' ;
	$template_name = $row['template_name'] ;

	$template = new Template($phpbb_root_path . $template_path . $template_name);

	if ( $template )
	{
		$current_template_path = $template_path . $template_name;
		@include($phpbb_root_path . $template_path . $template_name . '/' . $template_name . '.cfg');

//-- mod : bbcode box reloaded -------------------------------------------------
//-- add
		$style = $board_config['bbc_style_path'];
		@include($phpbb_root_path . $template_path . $template_name . '/bbc_box.cfg');
//-- fin mod : bbcode box reloaded ---------------------------------------------

		if ( !defined('TEMPLATE_CONFIG') )
		{
			message_die(CRITICAL_ERROR, "Could not open $template_name template config file", '', __LINE__, __FILE__);
		}

		$img_lang = ( file_exists(@phpbb_realpath($phpbb_root_path . $current_template_path . '/images/lang_' . $board_config['default_lang'])) ) ? $board_config['default_lang'] : 'english';

		while( list($key, $value) = @each($images) )
		{
			if ( !is_array($value) )
			{
				$images[$key] = str_replace('{LANG}', 'lang_' . $img_lang, $value);
			}
		}
	}

	return $row;
}

function encode_ip($dotquad_ip)
{
	$ip_sep = explode('.', $dotquad_ip);
	return sprintf('%02x%02x%02x%02x', $ip_sep[0], $ip_sep[1], $ip_sep[2], $ip_sep[3]);
}

function decode_ip($int_ip)
{
	$hexipbang = explode('.', chunk_split($int_ip, 2, '.'));
	return hexdec($hexipbang[0]). '.' . hexdec($hexipbang[1]) . '.' . hexdec($hexipbang[2]) . '.' . hexdec($hexipbang[3]);
}

//
// Create date/time from format and timezone
//
function create_date($format, $gmepoch, $tz)
{
//-- mod : date format evolved -------------------------------------------------
//-- delete
/*-MOD
	global $board_config, $lang;
	static $translate;

	if ( empty($translate) && $board_config['default_lang'] != 'english' )
	{
		@reset($lang['datetime']);
		while ( list($match, $replace) = @each($lang['datetime']) )
		{
			$translate[$match] = $replace;
		}
	}

	return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz)), $translate) : @gmdate($format, $gmepoch + (3600 * $tz));
	MOD-*/
//-- add
	return format_date($gmepoch, $format);
//-- fin mod : date format evolved ---------------------------------------------
}

//-- mod : date format evolved -------------------------------------------------
//-- add
/**
* format_date
*
* This function is inspired by format_date() function from phpBB3 (aka Olympus)
* and by Ptirhiik's date() function from Categories Hierarchy 2.1.x
* Used to create date/time from user/board preferences
*/
function format_date($time=0, $fmt='', $forcedate=false)
{
	global $board_config, $lang;

	// fix parms with default
	$fmt = empty($fmt) ? $board_config['default_dateformat'] : $fmt;
	$time = empty($time) ? time() : $time;

	// get user timezone
	$time_zone = intval(doubleval($board_config['board_timezone']) * 3600);

	// get date standard format
	$d_day = $time + $time_zone;
	$t_fmt = str_replace('|', '', $fmt);
	$res = @gmdate($t_fmt, $d_day);

	// is format combined with relative days (today or yesterday)?
	if ( strpos($fmt, '|') !== false && !$forcedate )
	{
		// get user current day
		$now = time() + $time_zone;
		$today = @gmmktime(0, 0, 0, @gmdate('m', $now), @gmdate('d', $now), @gmdate('Y', $now));

		// is the d day between user's yesterday and today?
		if ( ($d_day >= $today - 86400) && ($d_day < $today + 86400) )
		{
			$fmt = substr($fmt, 0, strpos($fmt, '|')) . '||' . substr(strrchr($fmt, '|'), 1);
			$res = str_replace('||', $lang['datetime'][($d_day >= $today) ? 'today' : 'yesterday'], @gmdate($fmt, $d_day));
		}
	}

	return strtr($res, $lang['datetime']);
}
//-- fin mod : date format evolved ---------------------------------------------

//
// Pagination routine, generates
// page number sequence
//
function generate_pagination($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE)
{
	global $lang;

	$total_pages = ceil($num_items/$per_page);

	if ( $total_pages == 1 )
	{
		return '';
	}

	$on_page = floor($start_item / $per_page) + 1;

	$page_string = '';
	if ( $total_pages > 10 )
	{
		$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;

		for($i = 1; $i < $init_page_max + 1; $i++)
		{
			$page_string .= ( $i == $on_page ) ? '<b>' . $i . '</b>' : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">' . $i . '</a>';
			if ( $i <  $init_page_max )
			{
				$page_string .= ", ";
			}
		}

		if ( $total_pages > 3 )
		{
			if ( $on_page > 1  && $on_page < $total_pages )
			{
				$page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';

				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<b>' . $i . '</b>' : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">' . $i . '</a>';
					if ( $i <  $init_page_max + 1 )
					{
						$page_string .= ', ';
					}
				}

				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
			}
			else
			{
				$page_string .= ' ... ';
			}

			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<b>' . $i . '</b>'  : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">' . $i . '</a>';
				if( $i <  $total_pages )
				{
					$page_string .= ", ";
				}
			}
		}
	}
	else
	{
		for($i = 1; $i < $total_pages + 1; $i++)
		{
			$page_string .= ( $i == $on_page ) ? '<b>' . $i . '</b>' : '<a href="' . append_sid($base_url . "&amp;start=" . ( ( $i - 1 ) * $per_page ) ) . '">' . $i . '</a>';
			if ( $i <  $total_pages )
			{
				$page_string .= ', ';
			}
		}
	}

	if ( $add_prevnext_text )
	{
		if ( $on_page > 1 )
		{
			$page_string = ' <a href="' . append_sid($base_url . "&amp;start=" . ( ( $on_page - 2 ) * $per_page ) ) . '">' . $lang['Previous'] . '</a>&nbsp;&nbsp;' . $page_string;
		}

		if ( $on_page < $total_pages )
		{
			$page_string .= '&nbsp;&nbsp;<a href="' . append_sid($base_url . "&amp;start=" . ( $on_page * $per_page ) ) . '">' . $lang['Next'] . '</a>';
		}

	}

	$page_string = $lang['Goto_page'] . ' ' . $page_string;

	return $page_string;
}

//
// This does exactly what preg_quote() does in PHP 4-ish
// If you just need the 1-parameter preg_quote call, then don't bother using this.
//
function phpbb_preg_quote($str, $delimiter)
{
	$text = preg_quote($str);
	$text = str_replace($delimiter, '\\' . $delimiter, $text);
	
	return $text;
}

//
// Obtain list of naughty words and build preg style replacement arrays for use by the
// calling script, note that the vars are passed as references this just makes it easier
// to return both sets of arrays
//
function obtain_word_list(&$orig_word, &$replacement_word)
{
	global $db;

	//
	// Define censored word matches
	//
	$sql = "SELECT word, replacement
		FROM  " . WORDS_TABLE;
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not get censored words from database', '', __LINE__, __FILE__, $sql);
	}

	if ( $row = $db->sql_fetchrow($result) )
	{
		do 
		{
			$orig_word[] = '#\b(' . str_replace('\*', '\w*?', preg_quote($row['word'], '#')) . ')\b#i';
			$replacement_word[] = $row['replacement'];
		}
		while ( $row = $db->sql_fetchrow($result) );
	}

	return true;
}

//
// This is general replacement for die(), allows templated
// output in users (or default) language, etc.
//
// $msg_code can be one of these constants:
//
// GENERAL_MESSAGE : Use for any simple text message, eg. results 
// of an operation, authorisation failures, etc.
//
// GENERAL ERROR : Use for any error which occurs _AFTER_ the 
// common.php include and session code, ie. most errors in 
// pages/functions
//
// CRITICAL_MESSAGE : Used when basic config data is available but 
// a session may not exist, eg. banned users
//
// CRITICAL_ERROR : Used when config data cannot be obtained, eg
// no database connection. Should _not_ be used in 99.5% of cases
//
function message_die($msg_code, $msg_text = '', $msg_title = '', $err_line = '', $err_file = '', $sql = '')
{
	global $db, $template, $board_config, $theme, $lang, $phpEx, $phpbb_root_path, $nav_links, $gen_simple_header, $images;
	global $userdata, $user_ip, $session_length;
	global $starttime;

//+MOD: Fix message_die for multiple errors MOD
	static $msg_history;
	if( !isset($msg_history) )
	{
		$msg_history = array();
	}
	$msg_history[] = array(
		'msg_code'	=> $msg_code,
		'msg_text'	=> $msg_text,
		'msg_title'	=> $msg_title,
		'err_line'	=> $err_line,
		'err_file'	=> $err_file,
		'sql'		=> $sql
	);
//-MOD: Fix message_die for multiple errors MOD
	
//-- mod : rank color system ---------------------------------------------------
//-- add
	global $get;
//-- fin mod : rank color system -----------------------------------------------	

	if(defined('HAS_DIED'))
	{
//+MOD: Fix message_die for multiple errors MOD

		//
		// This message is printed at the end of the report.
		// Of course, you can change it to suit your own needs. ;-)
		//
		$custom_error_message = 'Please, contact the %swebmaster%s. Thank you.';
		if ( !empty($board_config) && !empty($board_config['board_email']) )
		{
			$custom_error_message = sprintf($custom_error_message, '<a href="mailto:' . $board_config['board_email'] . '">', '</a>');
		}
		else
		{
			$custom_error_message = sprintf($custom_error_message, '', '');
		}
		echo "<html>\n<body>\n<b>Critical Error!</b><br />\nmessage_die() was called multiple times.<br />&nbsp;<hr />";
		for( $i = 0; $i < count($msg_history); $i++ )
		{
			echo '<b>Error #' . ($i+1) . "</b>\n<br />\n";
			if( !empty($msg_history[$i]['msg_title']) )
			{
				echo '<b>' . $msg_history[$i]['msg_title'] . "</b>\n<br />\n";
			}
			echo $msg_history[$i]['msg_text'] . "\n<br /><br />\n";
			if( !empty($msg_history[$i]['err_line']) )
			{
				echo '<b>Line :</b> ' . $msg_history[$i]['err_line'] . '<br /><b>File :</b> ' . $msg_history[$i]['err_file'] . "</b>\n<br />\n";
			}
			if( !empty($msg_history[$i]['sql']) )
			{
				echo '<b>SQL :</b> ' . $msg_history[$i]['sql'] . "\n<br />\n";
			}
			echo "&nbsp;<hr />\n";
		}
		echo $custom_error_message . '<hr /><br clear="all">';
		die("</body>\n</html>");
//-MOD: Fix message_die for multiple errors MOD
	}
	
	define('HAS_DIED', 1);
	

	$sql_store = $sql;
	
	//
	// Get SQL error if we are debugging. Do this as soon as possible to prevent 
	// subsequent queries from overwriting the status of sql_error()
	//
	if ( DEBUG && ( $msg_code == GENERAL_ERROR || $msg_code == CRITICAL_ERROR ) )
	{
		$sql_error = $db->sql_error();

		$debug_text = '';

		if ( $sql_error['message'] != '' )
		{
			$debug_text .= '<br /><br />SQL Error : ' . $sql_error['code'] . ' ' . $sql_error['message'];
		}

		if ( $sql_store != '' )
		{
			$debug_text .= "<br /><br />$sql_store";
		}

		if ( $err_line != '' && $err_file != '' )
		{
			$debug_text .= '<br /><br />Line : ' . $err_line . '<br />File : ' . basename($err_file);
		}
	}

	if( empty($userdata) && ( $msg_code == GENERAL_MESSAGE || $msg_code == GENERAL_ERROR ) )
	{
		$userdata = session_pagestart($user_ip, PAGE_INDEX);
		init_userprefs($userdata);
	}

	//
	// If the header hasn't been output then do it
	//
	if ( !defined('HEADER_INC') && $msg_code != CRITICAL_ERROR )
	{
		if ( empty($lang) )
		{
			if ( !empty($board_config['default_lang']) )
			{
				include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_main.'.$phpEx);
			}
			else
			{
				include($phpbb_root_path . 'language/lang_english/lang_main.'.$phpEx);
			}
			
//-- mod : language settings ---------------------------------------------------
//-- add
			include($phpbb_root_path . 'includes/lang_extend_mac.' . $phpEx);
//-- fin mod : language settings -----------------------------------------------

		}

		if ( empty($template) || empty($theme) )
		{
			$theme = setup_style($board_config['default_style']);
		}

		//
		// Load the Page Header
		//
		if ( !defined('IN_ADMIN') )
		{
			include($phpbb_root_path . 'includes/page_header.'.$phpEx);
		}
		else
		{
			include($phpbb_root_path . 'admin/page_header_admin.'.$phpEx);
		}
	}

	switch($msg_code)
	{
		case GENERAL_MESSAGE:
			if ( $msg_title == '' )
			{
				$msg_title = $lang['Information'];
			}
			break;

		case CRITICAL_MESSAGE:
			if ( $msg_title == '' )
			{
				$msg_title = $lang['Critical_Information'];
			}
			break;

		case GENERAL_ERROR:
			if ( $msg_text == '' )
			{
				$msg_text = $lang['An_error_occured'];
			}

			if ( $msg_title == '' )
			{
				$msg_title = $lang['General_Error'];
			}
			break; 
		case CRITICAL_ERROR:
			//
			// Critical errors mean we cannot rely on _ANY_ DB information being
			// available so we're going to dump out a simple echo'd statement
			//
			include($phpbb_root_path . 'language/lang_english/lang_main.'.$phpEx);

			if ( $msg_text == '' )
			{
				$msg_text = $lang['A_critical_error'];
			}

			if ( $msg_title == '' )
			{
				$msg_title = 'phpBB : <b>' . $lang['Critical_Error'] . '</b>';
			}
			break;
	}

	//
	// Add on DEBUG info if we've enabled debug mode and this is an error. This
	// prevents debug info being output for general messages should DEBUG be
	// set TRUE by accident (preventing confusion for the end user!)
	//
	if ( DEBUG && ( $msg_code == GENERAL_ERROR || $msg_code == CRITICAL_ERROR ) )
	{
		if ( $debug_text != '' )
		{
			$msg_text = $msg_text . '<br /><br /><b><u>DEBUG MODE</u></b>' . $debug_text;
		}
	}

	if ( $msg_code != CRITICAL_ERROR )
	{
		if ( !empty($lang[$msg_text]) )
		{
			$msg_text = $lang[$msg_text];
		}

		if ( !defined('IN_ADMIN') )
		{
			$template->set_filenames(array(
				'message_body' => 'message_body.tpl')
			);
		}
		else
		{
			$template->set_filenames(array(
				'message_body' => 'admin/admin_message_body.tpl')
			);
		}

		$template->assign_vars(array(
			'MESSAGE_TITLE' => $msg_title,
			'MESSAGE_TEXT' => $msg_text)
		);
		$template->pparse('message_body');

		if ( !defined('IN_ADMIN') )
		{
			include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
		}
		else
		{
			include($phpbb_root_path . 'admin/page_footer_admin.'.$phpEx);
		}
	}
	else
	{
		echo "<html>\n<body>\n" . $msg_title . "\n<br /><br />\n" . $msg_text . "</body>\n</html>";
	}

	exit;
}

//
// This function is for compatibility with PHP 4.x's realpath()
// function.  In later versions of PHP, it needs to be called
// to do checks with some functions.  Older versions of PHP don't
// seem to need this, so we'll just return the original value.
// dougk_ff7 <October 5, 2002>
function phpbb_realpath($path)
{
	global $phpbb_root_path, $phpEx;

	return (!@function_exists('realpath') || !@realpath($phpbb_root_path . 'includes/functions.'.$phpEx)) ? $path : @realpath($path);
}

function redirect($url)
{
	global $db, $board_config;

	if (!empty($db))
	{
		$db->sql_close();
	}

//-- mod : rank color system ---------------------------------------------------
//-- add
	// Make sure no &amp;'s are in, this will break the redirect
	$url = str_replace('&amp;', '&', $url);
//-- fin mod : rank color system -----------------------------------------------

	if (strstr(urldecode($url), "\n") || strstr(urldecode($url), "\r") || strstr(urldecode($url), ';url'))
	{
		message_die(GENERAL_ERROR, 'Tried to redirect to potentially insecure url.');
	}

	$server_protocol = ($board_config['cookie_secure']) ? 'https://' : 'http://';
	$server_name = preg_replace('#^\/?(.*?)\/?$#', '\1', trim($board_config['server_name']));
	$server_port = ($board_config['server_port'] <> 80) ? ':' . trim($board_config['server_port']) : '';
	$script_name = preg_replace('#^\/?(.*?)\/?$#', '\1', trim($board_config['script_path']));
	$script_name = ($script_name == '') ? $script_name : '/' . $script_name;
	$url = preg_replace('#^\/?(.*?)\/?$#', '/\1', trim($url));

	// Redirect via an HTML form for PITA webservers
	if (@preg_match('/Microsoft|WebSTAR|Xitami/', getenv('SERVER_SOFTWARE')))
	{
		header('Refresh: 0; URL=' . $server_protocol . $server_name . $server_port . $script_name . $url);
		echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><meta http-equiv="refresh" content="0; url=' . $server_protocol . $server_name . $server_port . $script_name . $url . '"><title>Redirect</title></head><body><div align="center">If your browser does not support meta redirection please click <a href="' . $server_protocol . $server_name . $server_port . $script_name . $url . '">HERE</a> to be redirected</div></body></html>';
		exit;
	}

	// Behave as per HTTP/1.1 spec for others
	header('Location: ' . $server_protocol . $server_name . $server_port . $script_name . $url);
	exit;
}

//-- mod : browsers list -------------------------------------------------------
//-- add
function display_browser($browser, $force=false, $tpl_level='')
{
	global $phpbb_root_path, $board_config, $template, $lang;

	$data_browser = array();
	$tpl_data = array();
	if ( !empty($browser) )
	{
		$browsers_path = $phpbb_root_path . ( empty($board_config['browsers_path']) ? 'images/browsers' : trim(preg_replace('#(.*)?\/?$#', '\1', trim($board_config['browsers_path']))) );
		if ( $browsers_path[ (strlen($browsers_path)-1) ] != '/' )
		{
			$browsers_path .= '/';
		}

		$browser_tmp = str_replace('_', ' ', substr($browser, 0, 0 - strlen(strrchr($browser, '.'))));
		$data_browser = array(
			'name' => lang_item($browser_tmp),
			'img' => $browsers_path . $browser,
		);
		unset($browser_tmp);

		$tpl_data = !empty($force) ? array(): array(
			'BROWSER_NAME' => $data_browser['name'],
			'BROWSER_IMG' => $data_browser['img'],
		);
	}

	if ( !empty($force) )
	{
		return $data_browser;
	}

	// send to template
	$template->assign_vars(array(
		'L_BROWSER' => $lang['browser'],
		'L_BROWSER_NONE' => $lang['browser_none'],
	));

	if ( !empty($browser) )
	{
		$template->assign_block_vars((empty($tpl_level) ? '' : $tpl_level . '.') . 'browser', $tpl_data);
	}
	else
	{
		$template->assign_block_vars((empty($tpl_level) ? '' : $tpl_level . '.') . 'browser_ELSE', array());
	}

	return;
}

function get_browsers_list($browser)
{
	global $phpbb_root_path, $board_config, $template, $lang, $images, $get;

	$browsers_path = $phpbb_root_path . ( empty($board_config['browsers_path']) ? 'images/browsers' : trim(preg_replace('#(.*)?\/?$#', '\1', trim($board_config['browsers_path']))) );
	if ( $browsers_path[ (strlen($browsers_path)-1) ] != '/' )
	{
		$browsers_path .= '/';
	}

	// get available browsers icons
	$browsers_icons = array();
	$dir = @opendir(phpbb_realpath($browsers_path));
	while ( $file = @readdir($dir) )
	{
		if ( preg_match('/(\.gif$|\.png$|\.jpg|\.jpeg)$/is', $file) )
		{
			$browsers_icons[ $file ] = str_replace('_', ' ', substr($file, 0, 0 - strlen(strrchr($file, '.'))));
		}
	}
	@closedir($dir);

	// build form
	$browsers_list = '';
	if ( !empty($browsers_icons) )
	{
		asort($browsers_icons);

		// html for browser_name field
		$html = ' onchange="if (this.options[selectedIndex].value != \'\') {document.post.browser_img.src = \'' . $browsers_path . '\' + this.options[selectedIndex].value} else {document.post.browser_img.src=\'' . $phpbb_root_path . $images['spacer'] . '\'}"';

		$data['options'] = array('' => 'no_browser') + $browsers_icons;

		$browsers_list = '<select name="browser"' . $html . '>';
		foreach ( $data['options'] as $val => $desc )
		{
			$selected = ( $val == $browser ) ? ' selected="selected"' : '';
			$browsers_list .= '<option value="' . $val . '"' . $selected . '>' . lang_item($desc) . '</option>';
		}
		$browsers_list .= '</select>';
	}

	// send to template
	$template->assign_vars(array(
		'I_BROWSER' => !empty($browser) ? $browsers_path . $browser : $phpbb_root_path . $images['spacer'],

		'L_BROWSER' => $lang['browser'],
		'L_BROWSER_TITLE' => $lang['browser_icon'],

		'S_BROWSERS_LIST' => $browsers_list,
	));
	$get->assign_switch('browsers', !empty($browsers_icons));
}
//-- fin mod : browsers list ---------------------------------------------------

//-- mod : flags ---------------------------------------------------------------
//-- add
function display_flag($flag, $force=false, $tpl_level='')
{
	global $phpbb_root_path, $board_config, $template, $lang;

	$data_flag = array();
	$tpl_data = array();
	if ( !empty($flag) )
	{
		$flags_path = $phpbb_root_path . ( empty($board_config['flags_path']) ? 'images/flags' : trim(preg_replace('#(.*)?\/?$#', '\1', trim($board_config['flags_path']))) );
		if ( $flags_path[ (strlen($flags_path)-1) ] != '/' )
		{
			$flags_path .= '/';
		}

		$flag_tmp = str_replace('_', ' ', substr($flag, 0, 0 - strlen(strrchr($flag, '.'))));
		$data_flag = array(
			'name' => lang_item($flag_tmp),
			'img' => $flags_path . $flag,
		);
		unset($flag_tmp);

		$tpl_data = !empty($force) ? array(): array(
			'FLAG_NAME' => $data_flag['name'],
			'FLAG_IMG' => $data_flag['img'],
		);
	}

	if ( !empty($force) )
	{
		return $data_flag;
	}

	// send to template
	$template->assign_vars(array(
		'L_FLAG' => $lang['flag_country'],
		'L_FLAG_NONE' => $lang['flag_none'],
	));

	if ( !empty($flag) )
	{
		$template->assign_block_vars((empty($tpl_level) ? '' : $tpl_level . '.') . 'flag', $tpl_data);
	}
	else
	{
		$template->assign_block_vars((empty($tpl_level) ? '' : $tpl_level . '.') . 'flag_ELSE', array());
	}

	return;
}

function get_flags_list($flag)
{
	global $phpbb_root_path, $board_config, $template, $lang, $images, $get;

	$flags_path = $phpbb_root_path . ( empty($board_config['flags_path']) ? 'images/flags' : trim(preg_replace('#(.*)?\/?$#', '\1', trim($board_config['flags_path']))) );
	if ( $flags_path[ (strlen($flags_path)-1) ] != '/' )
	{
		$flags_path .= '/';
	}

	// get available flags icons
	$flags_icons = array();
	$dir = @opendir(phpbb_realpath($flags_path));
	while ( $file = @readdir($dir) )
	{
		if ( preg_match('/(\.gif$|\.png$|\.jpg|\.jpeg)$/is', $file) )
		{
			$flags_icons[ $file ] = str_replace('_', ' ', substr($file, 0, 0 - strlen(strrchr($file, '.'))));
		}
	}
	@closedir($dir);

	// build form
	$flags_list = '';
	if ( !empty($flags_icons) )
	{
		asort($flags_icons);

		// html for flag_name field
		$html = ' onchange="if (this.options[selectedIndex].value != \'\') {document.post.flag_img.src = \'' . $flags_path . '\' + this.options[selectedIndex].value} else {document.post.flag_img.src=\'' . $phpbb_root_path . $images['spacer'] . '\'}"';

		$data['options'] = array('' => 'no_flag') + $flags_icons;

		$flags_list = '<select name="flag"' . $html . '>';
		foreach ( $data['options'] as $val => $desc )
		{
			$selected = ( $val == $flag ) ? ' selected="selected"' : '';
			$flags_list .= '<option value="' . $val . '"' . $selected . '>' . lang_item($desc) . '</option>';
		}
		$flags_list .= '</select>';
	}

	// send to template
	$template->assign_vars(array(
		'I_FLAG' => !empty($flag) ? $flags_path . $flag : $phpbb_root_path . $images['spacer'],

		'L_FLAG' => $lang['flag_country'],
		'L_FLAG_TITLE' => $lang['flag_icon'],

		'S_FLAGS_LIST' => $flags_list,
	));
	$get->assign_switch('flags', !empty($flags_icons));
}
//-- fin mod : flags -----------------------------------------------------------

//-- mod : quick post es -------------------------------------------------------
//-- add
function display_qpes_data($qp_acp=false)
{
	global $board_config, $userdata, $lang, $template;

	// reset data
	$user_qp = $user_qp_show = $user_qp_subject = $user_qp_bbcode = $user_qp_smilies = $user_qp_more = 0;

	// is admin
	$qp_admin = $userdata['session_logged_in'] && ($userdata['user_level'] == ADMIN);

	// config data
	if (!empty($board_config['users_qp_settings']))
	{
		list($board_config['user_qp'], $board_config['user_qp_show'], $board_config['user_qp_subject'], $board_config['user_qp_bbcode'], $board_config['user_qp_smilies'], $board_config['user_qp_more']) = explode('-', $board_config['users_qp_settings']);
	}

	// user data
	if (!empty($userdata['user_qp_settings']))
	{
		list($user_qp, $user_qp_show, $user_qp_subject, $user_qp_bbcode, $user_qp_smilies, $user_qp_more) = explode('-', $userdata['user_qp_settings']);
	}

	// check if quick reply is enabled
	$qp_on = intval($board_config['user_qp']);

	// options list
	$options = array(
		array('title' => 'qp_enable', 'desc' => 'qp_enable_explain', 'var' => 'user_qp'),
		array('title' => 'qp_show', 'desc' => 'qp_show_explain', 'var' => 'user_qp_show'),
		array('title' => 'qp_subject', 'desc' => 'qp_subject_explain', 'var' => 'user_qp_subject'),
		array('title' => 'qp_bbcode', 'desc' => 'qp_bbcode_explain', 'var' => 'user_qp_bbcode'),
		array('title' => 'qp_smilies', 'desc' => 'qp_smilies_explain', 'var' => 'user_qp_smilies'),
		array('title' => 'qp_more', 'desc' => 'qp_more_explain', 'var' => 'user_qp_more'),
	);

	// build options form
	foreach ($options as $option => $result)
	{
		$qp_var = $result['var'];
		$qp_cfg = $board_config[$qp_var];

		if (!empty($qp_acp))
		{
			$tpl_data = array(
				'QP_YES' => ($$qp_var) ? ' checked="checked"' : '',
				'QP_NO' => (!$$qp_var) ? ' checked="checked"' : '',
			);
		}
		else
		{
			$tpl_data = array(
				'QP_YES' => ((($qp_var == 'user_qp') ? !$qp_on : (!$qp_cfg || !$qp_on)) && !$qp_admin) ? ' disabled="disabled"' : (($$qp_var) ? ' checked="checked"' : ''),
				'QP_NO' => ((($qp_var == 'user_qp') ? !$qp_on : (!$qp_cfg || !$qp_on)) && !$qp_admin) ?  ' disabled="disabled"' : ((!$$qp_var) ? ' checked="checked"' : ''),
			);
		}

		// options constants
		$template->assign_block_vars('qpes', $tpl_data + array(
			'L_QP_TITLE' => $lang[$result['title']],
			'L_QP_DESC' => $lang[$result['desc']],
			'QP_VAR' => $qp_var,
		));
	}
}
//-- fin mod : quick post es ---------------------------------------------------

//+MOD: DHTML Collapsible Forum Index MOD
function get_cfi_cookie_name()
{
	global $board_config, $HTTP_GET_VARS;

	$k = $board_config['cookie_name'].'_CFI_cats';
	if( isset($board_config['sub_forum']) )
	{
		$k .= '_'.isset($board_config['sub_forum']);
		if( isset($HTTP_GET_VARS['c']) )
		{
			$k .= '_'.$HTTP_GET_VARS['c'];
		}
	}
	return $k;
}
function is_category_collapsed($cat_id)
{
	global $board_config, $HTTP_COOKIE_VARS;
	static $collapsed_cats = false;

	if( intval($board_config['sub_forum']) == 2 )
	{
		return false;
	}
	if( !is_array($collapsed_cats) )
	{
		if( isset($HTTP_COOKIE_VARS[get_cfi_cookie_name()]) )
		{
			$collapsed_cats = explode(':', $HTTP_COOKIE_VARS[get_cfi_cookie_name()]);
		}
		else
		{
			$collapsed_cats = array();
		}
	}
	return in_array($cat_id, $collapsed_cats) ? true : false;
}

//-MOD: DHTML Collapsible Forum Index MOD

// crewstyle's mod : Annonce Globale
function get_annonce_list()
{
	global $phpbb_root_path, $template, $userdata, $lang, $db, $phpEx, $SID;
	global $board_config, $images, $HTTP_COOKIE_VARS, $tracking_topics, $tracking_forums;
	global $rcs;

	//
	// All global announcement data
	//
	$sql_global = "SELECT t.*, u.username, u.user_id, u2.username as user2, u2.user_id as id2, p.post_time, p.post_username, f.forum_name, f.forum_id, f.attached_forum_id
		FROM " . TOPICS_TABLE . " t, " . USERS_TABLE . " u, " . POSTS_TABLE . " p, " . USERS_TABLE . " u2, " . FORUMS_TABLE . " f
		WHERE t.topic_type = " . POST_GLOBAL_ANNOUNCE . "
			AND t.topic_poster = u.user_id
			AND p.post_id = t.topic_last_post_id
			AND p.poster_id = u2.user_id
			AND f.forum_id = t.forum_id
		ORDER BY t.topic_type DESC, t.topic_last_post_id DESC";
//-- mod : rank color system ---------------------------------------------------
//-- add
	$sql_global = str_replace(', u.user_id', ', u.user_id, u.user_level, u.user_color, u.user_group_id', $sql_global);
	$sql_global = str_replace(', u2.user_id as id2', ', u2.user_id as id2, u2.user_level as level2, u2.user_color as color2, u2.user_group_id as group_id2', $sql_global);
//-- fin mod : rank color system -----------------------------------------------
	if ( !($result_global = $db->sql_query($sql_global)) )
	{
		message_die(GENERAL_ERROR, 'Could not obtain global announcement information', '', __LINE__, __FILE__, $sql_global);
	}


	$global_annonce = 0;
	while( $row = $db->sql_fetchrow($result_global) )
	{
		$is_auth = auth(AUTH_READ, $row['forum_id'], $userdata, $forum_topic_data);

		if( $is_auth['auth_read'] )
		{
			$topic_rowset[] = $row;
			$global_annonce++;
		}
	}
	$db->sql_freeresult($result_global);


	if( $global_annonce )
	{
		$template->assign_block_vars('annonce_globale', array(
			'L_TOPICS' => $lang['Post_Global_Announcements'],
			'L_REPLIES' => $lang['Replies'],
			'L_AUTHOR' => $lang['Author'],
			'L_VIEWS' => $lang['Views'],
			'L_LASTPOST' => $lang['Last_Post']
		));

		$annonce_global=1;
		for($i = 0; $i < $global_annonce; $i++)
		{
			$topic_id = $topic_rowset[$i]['topic_id'];


			//
			// Information
			//
			$topic_title = ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $topic_rowset[$i]['topic_title']) : $topic_rowset[$i]['topic_title'];

			if ( $topic_rowset[$i]['title_pos'] )
			{
				$topic_title = (empty($topic_rowset[$i]['title_compl_infos'])) ? $topic_title : $topic_title.' '.'<span style="color:#' . $topic_rowset[$i]['title_compl_color'] . '">' . $topic_rowset[$i]['title_compl_infos'] . '</span>';
			}
			else
			{
				$topic_title = (empty($topic_rowset[$i]['title_compl_infos'])) ? $topic_title : '<span style="color:#' . $topic_rowset[$i]['title_compl_color'] . '">' . $topic_rowset[$i]['title_compl_infos'] . '</span>' .' '.$topic_title;
			}

			$topic_description = ( count($orig_word) ) ? preg_replace($orig_word, $replacement_word, $topic_rowset[$i]['topic_description']) : $topic_rowset[$i]['topic_description'];
			$topic_description = ( $topic_description=='' ) ? $topic_description : '<br />' . $topic_description;

			$replies = $topic_rowset[$i]['topic_replies'];
			$views = $topic_rowset[$i]['topic_views'];


			//
			// Annonce Globale ?
			//
			$topic_type = $lang['Topic_Global_Announcement'] . ' ';

			$global_link = '[ ';
			if ( $topic_rowset[$i]['attached_forum_id'] != '-1' )
			{
				$attach = $topic_rowset[$i]['attached_forum_id'];

				//
				// Get name and id of target forum
				//
				$sql_forum = "SELECT forum_name FROM " . FORUMS_TABLE . "
					WHERE forum_id = $attach";
				if ( !($result_forum = $db->sql_query($sql_forum)) )
				{
					message_die(GENERAL_ERROR, 'Could not obtain topic information', '', __LINE__, __FILE__, $sql_forum);
				}
				$row_forum = $db->sql_fetchrow($result_forum);

				$global_link .= '<a href="' . append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $attach) . '">' . $row_forum['forum_name'] . '</a> &raquo; ';
			}
			$global_link .= '<a href="' . append_sid("viewforum.$phpEx?" . POST_FORUM_URL . "=" . $topic_rowset[$i]['forum_id']) . '">' . $topic_rowset[$i]['forum_name'] . '</a> ]';


			//
			// New post ?
			//
			$folder = $images['folder_global_announce'];
			$folder_new = $images['folder_global_announce_new'];

			$newest_post_img = '';
			if( $userdata['session_logged_in'] )
			{
				if( $topic_rowset[$i]['post_time'] > $userdata['user_lastvisit'] ) 
				{
					if( !empty($tracking_topics) || !empty($tracking_forums) || isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) )
					{
						$unread_topics = true;

						if( !empty($tracking_topics[$topic_id]) )
						{
							if( $tracking_topics[$topic_id] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}

						if( !empty($tracking_forums[$forum_id]) )
						{
							if( $tracking_forums[$forum_id] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}

						if( isset($HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all']) )
						{
							if( $HTTP_COOKIE_VARS[$board_config['cookie_name'] . '_f_all'] >= $topic_rowset[$i]['post_time'] )
							{
								$unread_topics = false;
							}
						}

						if( $unread_topics )
						{
							$folder_image = $folder_new;
							$folder_alt = $lang['New_posts'];

							$newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
						}
						else
						{
							$folder_image = $folder;
							$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

							$newest_post_img = '';
						}
					}
					else
					{
						$folder_image = $folder_new;
						$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['New_posts'];

						$newest_post_img = '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id&amp;view=newest") . '"><img src="' . $images['icon_newest_reply'] . '" alt="' . $lang['View_newest_post'] . '" title="' . $lang['View_newest_post'] . '" border="0" /></a> ';
					}
				}
				else 
				{
					$folder_image = $folder;
					$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

					$newest_post_img = '';
				}
			}
			else
			{
				$folder_image = $folder;
				$folder_alt = ( $topic_rowset[$i]['topic_status'] == TOPIC_LOCKED ) ? $lang['Topic_locked'] : $lang['No_new_posts'];

				$newest_post_img = '';
			}


			//
			// Goto Page
			//
			if( ( $replies + 1 ) > $board_config['posts_per_page'] )
			{
				$total_pages = ceil( ( $replies + 1 ) / $board_config['posts_per_page'] );
				$goto_page = '<br />[ <img src="' . $images['icon_gotopost'] . '" alt="' . $lang['Goto_page'] . '" title="' . $lang['Goto_page'] . '" />' . $lang['Goto_page'] . ' ';

				$times = 1;
				for($j = 0; $j < $replies + 1; $j += $board_config['posts_per_page'])
				{
					$goto_page .= '<a href="' . append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=" . $topic_id . "&amp;start=$j") . '">' . $times . '</a>';
					if( $times == 1 && $total_pages > 4 )
					{
						$goto_page .= ' ... ';
						$times = $total_pages - 3;
						$j += ( $total_pages - 4 ) * $board_config['posts_per_page'];
					}
					else if ( $times < $total_pages )
					{
						$goto_page .= ', ';
					}
					$times++;
				}
				$goto_page .= ' ] ';
			}
			else
			{
				$goto_page = '';
			}


			//
			// Information
			//
			$view_topic_url = append_sid("viewtopic.$phpEx?" . POST_TOPIC_URL . "=$topic_id");

//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
			$topic_author = ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '=' . $topic_rowset[$i]['user_id']) . '">' : '';
MOD-*/
//-- add
			$topic_author_color = $rcs->get_colors($topic_rowset[$i]);
			$topic_author = ($topic_rowset[$i]['user_id'] != ANONYMOUS) ? '<a href="' . append_sid('profile.' . $phpEx . '?mode=viewprofile&amp;' . POST_USERS_URL . '=' . $topic_rowset[$i]['user_id']) . '"' . $topic_author_color . '>' : '';
//-- fin mod : rank color system -----------------------------------------------


			$topic_author .= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? $topic_rowset[$i]['username'] : ( ( $topic_rowset[$i]['post_username'] != '' ) ? $topic_rowset[$i]['post_username'] : $lang['Guest'] );
			$topic_author .= ( $topic_rowset[$i]['user_id'] != ANONYMOUS ) ? '</a>' : '';



			$first_post_time = create_date($board_config['default_dateformat'], $topic_rowset[$i]['topic_time'], $board_config['board_timezone']);

			$last_post_time = create_date($board_config['default_dateformat'], $topic_rowset[$i]['post_time'], $board_config['board_timezone']);

//-- mod : rank color system ---------------------------------------------------
//-- delete
/*-MOD
			$last_post_author = ( $topic_rowset[$i]['id2'] == ANONYMOUS ) ? ( ($topic_rowset[$i]['post_username2'] != '' ) ? $topic_rowset[$i]['post_username2'] . ' ' : $lang['Guest'] . ' ' ) : '<a href="' . append_sid("profile.$phpEx?mode=viewprofile&amp;" . POST_USERS_URL . '='  . $topic_rowset[$i]['id2']) . '">' . $topic_rowset[$i]['user2'] . '</a>';
MOD-*/
//-- add
			$last_post_author_color = $rcs->get_colors($topic_rowset[$i], '', false, 'group_id2', 'color2', 'level2');
			$last_post_author = ($topic_rowset[$i]['id2'] == ANONYMOUS) ? (($topic_rowset[$i]['post_username2'] != '') ? $topic_rowset[$i]['post_username2'] : $lang['Guest']) : '<a href="' . append_sid('profile.' . $phpEx . '?mode=viewprofile&amp;' . POST_USERS_URL . '='  . $topic_rowset[$i]['id2']) . '"' . $last_post_author_color . '>' . $topic_rowset[$i]['user2'] . '</a>';
//-- fin mod : rank color system -----------------------------------------------

			$last_post_url = '<a href="' . append_sid("viewtopic.$phpEx?"  . POST_POST_URL . '=' . $topic_rowset[$i]['topic_last_post_id']) . '#' . $topic_rowset[$i]['topic_last_post_id'] . '"><img src="' . $images['icon_latest_reply'] . '" alt="' . $lang['View_latest_post'] . '" title="' . $lang['View_latest_post'] . '" border="0" /></a>';


			$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

			$template->assign_block_vars('annonce_globale.row', array(
				'ROW_COLOR' => $row_color,
				'ROW_CLASS' => $row_class,
				'FORUM_ID' => $forum_id,
				'TOPIC_ID' => $topic_id,
				'TOPIC_FOLDER_IMG' => $folder_image, 
				'TOPIC_AUTHOR' => $topic_author,
				'REPLIES' => $replies,
				'NEWEST_POST_IMG' => $newest_post_img, 
				'TOPIC_TITLE' => $topic_title,
				'TOPIC_ATTACHMENT_IMG' => topic_attachment_image($topic_rowset[$i]['topic_attachment']),

				'GLOBAL_LINK' => $global_link,
				'GOTO_PAGE' => $goto_page,

				'TOPIC_DESCRIPTION' => $topic_description,

				'TOPIC_TYPE' => $topic_type,
				'VIEWS' => $views,
				'FIRST_POST_TIME' => $first_post_time, 
				'LAST_POST_TIME' => $last_post_time, 
				'LAST_POST_AUTHOR' => $last_post_author, 
				'LAST_POST_IMG' => $last_post_url, 

				'L_TOPIC_FOLDER_ALT' => $folder_alt, 

				'U_VIEW_TOPIC' => $view_topic_url)
			);

			$split_type = '';
			if( $annonce_global==1 )
			{
				$split_type = $lang['Topic_Global_Announcement'];
				$annonce_global=0;

				$template->assign_block_vars('annonce_globale.row.switch_post', array(
					'SPLIT_TYPE' => $split_type
				));
			}
		}

		$template->set_filenames(array('annonce_globale' => 'annonce_globale_body.tpl'));
		$template->assign_var_from_handle('ANNONCE_GLOBALE', 'annonce_globale');
	}
}
// crewstyle's mod : Annonce Globale

// crewstyle's mod : AdminUsers Extend
function get_memberlist($mode='')
{
	global $phpbb_root_path, $phpEx, $board_config, $SID, $db, $userdata, $lang;
	global $board_config, $template, $theme, $images;
	global $HTTP_POST_VARS, $HTTP_GET_VARS;

	//
	// AdminUsers Deleting
	//
	if( empty($mode) )
	{
		$delete = ( isset($HTTP_POST_VARS['delete']) ) ? TRUE : FALSE;
		$activate = ( isset($HTTP_POST_VARS['activate']) ) ? TRUE : FALSE;
		$userlist = $HTTP_POST_VARS['user_id_list'];

		if( $userlist != '' )
		{
			for($i = 0; $i < count($userlist); $i++)
			{
				$userlist_sql .= ( ( $userlist_sql != "") ? ', ' : '' ) . intval($userlist[$i]);
			}

			if( $delete )
			{
				$sql = "DELETE FROM " . USERS_TABLE . " 
					WHERE user_id IN ($userlist_sql)";
				if ( !$db->sql_query($sql, BEGIN_TRANSACTION) )
				{
					message_die(GENERAL_ERROR, 'Could not delete topics', '', __LINE__, __FILE__, $sql);
				}
			}
			else if( $activate )
			{
				$sql = "UPDATE " . USERS_TABLE . " 
					SET user_active = 1 WHERE user_id IN ($userlist_sql)";
				if( !$db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, 'Could not update users', '', __LINE__, __FILE__, $sql);
				}
			}
		}
	}

	//
	// AdminUsers Option
	//
	$start = ( isset($HTTP_GET_VARS['start']) ) ? intval($HTTP_GET_VARS['start']) : 0;

	if ( isset($HTTP_GET_VARS['type']) || isset($HTTP_POST_VARS['type']) )
	{
		$type = ( isset($HTTP_POST_VARS['type']) ) ? htmlspecialchars($HTTP_POST_VARS['type']) : htmlspecialchars($HTTP_GET_VARS['type']);
	}
	else
	{
		$type = 'joined';
	}

	if(isset($HTTP_POST_VARS['order']))
	{
		$sort_order = ($HTTP_POST_VARS['order'] == 'ASC') ? 'ASC' : 'DESC';
	}
	else if(isset($HTTP_GET_VARS['order']))
	{
		$sort_order = ($HTTP_GET_VARS['order'] == 'ASC') ? 'ASC' : 'DESC';
	}
	else
	{
		$sort_order = 'ASC';
	}

	if ( empty($mode) && (isset($HTTP_GET_VARS['state']) || isset($HTTP_POST_VARS['state'])) )
	{
		$state = ( isset($HTTP_POST_VARS['state']) ) ? htmlspecialchars($HTTP_POST_VARS['state']) : htmlspecialchars($HTTP_GET_VARS['state']);
	}
	else
	{
		$state = '';
	}

	$state_sql = ($state!='') ? " AND user_active=" . $state : '';
	$state_pag = ($state!='') ? "&amp;state=" . $state : '';
	$state_user = ($mode == 'user') ? '' : (($state=='') ? $lang['AdminUsers_extend_all'] : ( ($state==1) ? $lang['AdminUsers_extend_active'] : $lang['AdminUsers_extend_inactive']));

	$input_active = ($state!='' && $state==0) ? '&nbsp;<input type="submit" name="activate" class="liteoption" value="' . $lang['Activate'] . '" />' : '';

	//
	// AdminUsers list sorting
	//
	$mode_types_text = array($lang['Sort_Joined'], $lang['Sort_Username'], $lang['Sort_Location'], $lang['Sort_Posts'], $lang['Sort_Email'],  $lang['Sort_Website'], $lang['Sort_Top_Ten']);
	$mode_types = array('joined', 'username', 'location', 'posts', 'email', 'website', 'topten');

	$select_sort_mode = '<select name="type">';
	for($i = 0; $i < count($mode_types_text); $i++)
	{
		$selected = ( $type == $mode_types[$i] ) ? 'selected="selected"' : '';
		$select_sort_mode .= '<option value="' . $mode_types[$i] . '" ' . $selected . '>' . $mode_types_text[$i] . '</option>';
	}
	$select_sort_mode .= '</select>';

	$select_sort_order = '<select name="order">';
	if($sort_order == 'ASC')
	{
		$select_sort_order .= '<option value="ASC" selected="selected">' . $lang['Sort_Ascending'] . '</option><option value="DESC">' . $lang['Sort_Descending'] . '</option>';
	}
	else
	{
		$select_sort_order .= '<option value="ASC">' . $lang['Sort_Ascending'] . '</option><option value="DESC" selected="selected">' . $lang['Sort_Descending'] . '</option>';
	}
	$select_sort_order .= '</select>';

	switch( $type )
	{
		case 'joined':
			$order_by = "user_regdate $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'username':
			$order_by = "username $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'location':
			$order_by = "user_from $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'posts':
			$order_by = "user_posts $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'email':
			$order_by = "user_email $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'website':
			$order_by = "user_website $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
		case 'topten':
			$order_by = "user_posts $sort_order LIMIT 10";
			break;
		default:
			$order_by = "user_regdate $sort_order LIMIT $start, " . $board_config['topics_per_page'];
			break;
	}


	$sql = "SELECT * FROM " . USERS_TABLE . "
		WHERE user_id <> " . ANONYMOUS . "
		$state_sql
		ORDER BY $order_by";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query users', '', __LINE__, __FILE__, $sql);
	}


	if ( $row = $db->sql_fetchrow($result) )
	{
		$i = 0;
		do
		{
			$username = $row['username'];
			$user_id = $row['user_id'];

			$from = ( !empty($row['user_from']) ) ? $row['user_from'] : '';
			$joined = create_date($lang['DATE_FORMAT'], $row['user_regdate'], $board_config['board_timezone']);
			$posts = ( $row['user_posts'] ) ? $row['user_posts'] : 0;

			if ( !empty($row['user_viewemail']) || $userdata['user_level'] == ADMIN )
			{
				$email_uri = ( $board_config['board_email_form'] ) ? append_sid($phpbb_root_path . "profile.$phpEx?mode=email&amp;" . POST_USERS_URL .'=' . $user_id) : 'mailto:' . $row['user_email'];

				$email_img = '<a href="' . $email_uri . '"><img src="' . $phpbb_root_path . $images['icon_email'] . '" alt="' . $lang['Send_email'] . '" title="' . $lang['Send_email'] . '" border="0" /></a>';
				$email = '<a href="' . $email_uri . '">' . $lang['Send_email'] . '</a>';
			}
			else
			{
				$email_img = '';
				$email = '';
			}

			$temp_url = append_sid($phpbb_root_path . "privmsg.$phpEx?mode=post&amp;" . POST_USERS_URL . "=$user_id");
			$pm_img = '<a href="' . $temp_url . '" target="_userwww"><img src="' . $phpbb_root_path . $images['icon_pm'] . '" alt="' . $lang['Send_private_message'] . '" title="' . $lang['Send_private_message'] . '" border="0" /></a>';
			$pm = '<a href="' . $temp_url . '" target="_userwww">' . $lang['Send_private_message'] . '</a>';

			$www_img = ( $row['user_website'] ) ? '<a href="' . $row['user_website'] . '" target="_userwww"><img src="' . $phpbb_root_path . $images['icon_www'] . '" alt="' . $lang['Visit_website'] . '" title="' . $lang['Visit_website'] . '" border="0" /></a>' : '';
			$www = ( $row['user_website'] ) ? '<a href="' . $row['user_website'] . '" target="_userwww">' . $lang['Visit_website'] . '</a>' : '';

			$row_color = ( !($i % 2) ) ? $theme['td_color1'] : $theme['td_color2'];
			$row_class = ( !($i % 2) ) ? $theme['td_class1'] : $theme['td_class2'];

			$template->assign_block_vars('adminusers_row', array(
				'ROW_NUMBER' => $i + ( $start + 1 ),
				'ROW_COLOR' => '#' . $row_color,
				'ROW_CLASS' => $row_class,
				'USERNAME' => $username,
				'USER_ID' => $user_id,
				'FROM' => $from,
				'JOINED' => $joined,
				'VISITED' => ( $row['user_lastlogin'] ) ? create_date( $board_config['default_dateformat'], $row['user_lastlogin'], $board_config['board_timezone'] ) : $lang['Never_Visited'],
				'POSTS' => $posts,
				'PM_IMG' => $pm_img,
				'PM' => $pm,
				'EMAIL_IMG' => $email_img,
				'EMAIL' => $email,
				'WWW_IMG' => $www_img,
				'WWW' => $www,

				'U_VIEWPROFILE' => ($mode == 'user') ? append_sid("admin_ug_auth.$phpEx?mode=$mode&amp;" . POST_USERS_URL . "=$user_id") : append_sid("admin_users.$phpEx?mode=edit&amp;" . POST_USERS_URL . "=$user_id")
			));

			if( $mode == '' )
			{
				$template->assign_block_vars ("adminusers_row.mode",array());
			}

			$i++;
		}
		while ( $row = $db->sql_fetchrow($result) );
		$db->sql_freeresult($result);
	}


	if ( $type != 'topten' || $board_config['topics_per_page'] < 10 )
	{
		$sql = "SELECT count(*) AS total
			FROM " . USERS_TABLE . "
			WHERE user_id <> " . ANONYMOUS . "
			$state_sql";
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Error getting total users', '', __LINE__, __FILE__, $sql);
		}

		if ( $total = $db->sql_fetchrow($result) )
		{
			$total_members = $total['total'];

			$pagination = ($mode == 'user') ? generate_pagination("admin_ug_auth.$phpEx?mode=$mode&amp;type=$type&amp;order=$sort_order$state_pag", $total_members, $board_config['topics_per_page'], $start) : generate_pagination("admin_users.$phpEx?type=$type&amp;order=$sort_order$state_pag", $total_members, $board_config['topics_per_page'], $start);
		}
		$db->sql_freeresult($result);
	}
	else
	{
		$pagination = '';
		$total_members = 10;
	}

	$template->assign_vars(array(
		'L_CHOOSE_USER' => ($mode == 'user') ? $lang['AdminUsers_extend_list'] : sprintf($lang['AdminUsers_extend_choose'], append_sid("admin_users.$phpEx?state=1"), append_sid("admin_users.$phpEx?state=0"), append_sid("admin_users.$phpEx")),

		'L_STATUS_USER' => $state_user,
		'L_USER_TITLE' => $lang['User_admin'],
		'L_USER_EXPLAIN' => $lang['User_admin_explain'],
		'L_USER_SELECT' => $lang['Select_a_User'],
		'L_LOOK_UP' => $lang['Look_up_user'],
		'L_FIND_USERNAME' => $lang['Find_username'],
		'L_PM' => $lang['Private_Message'],

		'U_SEARCH_USER' => append_sid("./../search.$phpEx?mode=searchuser"),

		'S_USER_ACTION' => ($mode == 'user') ? append_sid("admin_ug_auth.$phpEx?mode=$mode") : append_sid("admin_users.$phpEx"),
		'S_USER_SELECT' => $select_list,
		'S_MODE_SELECT' => $select_sort_mode,
		'S_ORDER_SELECT' => $select_sort_order,

		'S_ORDER_ACTION' => ($mode == 'user') ? append_sid("admin_ug_auth.$phpEx?mode=$mode") : append_sid("admin_users.$phpEx"),

		'INPUT_ACTIVE' => $input_active,

		'PAGINATION' => $pagination,
		'PAGE_NUMBER' => sprintf($lang['Page_of'], ( floor( $start / $board_config['topics_per_page'] ) + 1 ), ceil( $total_members / $board_config['topics_per_page'] )), 
		'L_GOTO_PAGE' => $lang['Goto_page'])
	);

	if( $mode == '' )
	{
		$template->assign_block_vars ("mode",array());
	}
}
// crewstyle's mod : AdminUsers Extend

//-- mod : mini last visit -----------------------------------------------------
//-- add
function display_last_visit($u_id, $u_lastlogin, $u_allow_viewonline)
{
	global $board_config, $userdata, $lang;

	$has_visited = !empty($u_lastlogin);
	$view_allowed = $u_allow_viewonline || ( ($userdata['user_level'] == ADMIN) || ($userdata['user_id'] == intval($u_id)) );

	return $has_visited ? ( $view_allowed ? create_date($board_config['default_dateformat'], intval($u_lastlogin), $board_config['board_timezone']) : $lang['Hidden_last_visit'] ) : $lang['Never_last_visit'];
}
//-- fin mod : mini last visit -------------------------------------------------

//-- mod : toolbar -------------------------------------------------------------
//-- add
function build_toolbar($mode, $l_privmsgs_text='', $s_privmsg_new=0, $forum_id=0, $tlbr_more='')
{
	global $userdata, $template, $lang, $images, $phpEx;

	// restrict mode input to valid options
	$mode = ( in_array($mode, array('default', 'index', 'viewforum', 'viewtopic')) ) ? $mode : '';

	if ( !empty($mode) && $userdata['session_logged_in'] )
	{
		// init vars
		$s_toolbar = '';

		// toolbar actions details display
		$toolbar_actions = array(
			'inbox' => array('link_pgm' => 'privmsg', 'link_parms' => array('folder' => 'inbox'), 'txt' => $l_privmsgs_text, 'img' => !$s_privmsg_new ? 'tlbr_no_new_pm' : 'tlbr_new_pm'),
			'unanswered' => array('link_pgm' => 'search', 'link_parms' => array('search_id' => 'unanswered'), 'txt' => 'Search_unanswered', 'img' => 'tlbr_unanswered'),
			'newposts' => array('link_pgm' => 'search', 'link_parms' => array('search_id' => 'newposts'), 'txt' => 'Search_new', 'img' => 'tlbr_new'),
			'egosearch' => array('link_pgm' => 'search', 'link_parms' => array('search_id' => 'egosearch'), 'txt' => 'Search_your_posts', 'img' => 'tlbr_self'),
			'forums' => array('link_pgm' => 'index', 'link_parms' => array(POST_FORUM_URL => intval($forum_id), 'mark' => 'forums'), 'txt' => 'Mark_all_forums', 'img' => 'tlbr_markall', 'cond' => $mode == 'index'),
			'topics' => array('link_pgm' => 'viewforum', 'link_parms' => array(POST_FORUM_URL => intval($forum_id), 'mark' => 'topics'), 'txt' => 'Mark_all_topics', 'img' => 'tlbr_markall', 'cond' => !empty($forum_id) && ($mode == 'viewforum' || $mode == 'viewtopic')),
			'viewonline' => array('link_pgm' => 'viewonline', 'link_parms' => '', 'txt' => 'Who_is_Online', 'img' => 'tlbr_viewonline', 'cond' => $mode != 'viewtopic'),
		);

		// add additional actions in toolbar so existing
		if ( !empty($tlbr_more) && is_array($tlbr_more) )
		{
			$toolbar_actions = array_merge($toolbar_actions, $tlbr_more);
		}

		// let's go
		foreach ( $toolbar_actions as $action => $data )
		{
			if ( !isset($data['cond']) || $data['cond'] )
			{
				// build url parms
				$url_parms = '';
				if ( !empty($data['link_parms']) )
				{
					foreach ( $data['link_parms'] as $key => $val )
					{
						if ( !empty($key) && !empty($val) )
						{
							$url_parms .= (empty($url_parms) ? '?' : '&amp;') . $key . '=' . $val;
						}
					}
				}

				// build toolbar
				$s_toolbar .= '<a href="' . append_sid($data['link_pgm']. '.' . $phpEx . $url_parms) . '"><img src="' . $images[ $data['img'] ] . '" alt="' . ( $action == 'inbox' ? $data['txt'] : $lang[ $data['txt'] ] ) . '" title="' . ( $action == 'inbox' ? $data['txt'] : $lang[ $data['txt'] ] ) . '" border="0" /></a>';
			}
		}

		// send to template
		if ( !empty($s_toolbar) )
		{
			// constants
			$template->assign_block_vars('toolbar', array(
				'S_TOOLBAR' => $s_toolbar,
			));
		}
	}
}
//-- fin mod : toolbar ---------------------------------------------------------

//-- mod : bump topic ----------------------------------------------------------
//-- add
function bump_interval($bump_interval, $bump_type)
{
	global $board_config, $lang;

	$s_bump_type = $s_bump_interval = '';
	$types = array('m' => 'bt_minutes', 'h' => 'bt_hours', 'd' => 'bt_days');
	foreach ( $types as $type => $desc )
	{
		$selected = ($bump_type == $type) ? ' selected="selected"' : '';
		$s_bump_type .= '<option value="' . $type . '"' . $selected . '>' . $lang[$desc] . '</option>';
	}

	$s_bump_interval = '<input class="post" type="text" size="3" maxlength="4" name="bump_interval" value="' . $bump_interval . '" />&nbsp;<select name="bump_type">' . $s_bump_type . '</select>';

	return $s_bump_interval;
}

function bump_topic_allowed($topic_bumped, $last_post_time, $topic_poster, $last_topic_poster)
{
	global $board_config, $is_auth, $userdata;

	// admin check
	$is_admin = $userdata['session_logged_in'] && ($userdata['user_level'] == ADMIN);

	// check permission and make sure the last post was not already bumped
	if ( !$is_auth['auth_bump'] || $topic_bumped )
	{
		return false;
	}

	// check bump time range, is the user really allowed to bump the topic at this time?
	$bump_time = ($board_config['bump_type'] == 'm') ? $board_config['bump_interval'] * 60 : ( ($board_config['bump_type'] == 'h') ? $board_config['bump_interval'] * 3600 : $board_config['bump_interval'] * 86400 );

	// check bump time
	if ( $last_post_time + $bump_time > time() )
	{
		return false;
	}

	// check bumper, only topic poster and last poster are allowed to bump
	if ( $topic_poster != $userdata['user_id'] && $last_topic_poster != $userdata['user_id'] && !$is_admin )
	{
		return false;
	}

	return $bump_time;
}

function get_bumper_stats($forum_id, $topic_id)
{
	global $db;

	$forum_id = !empty($forum_id) ? $forum_id : false;
	$topic_id = !empty($topic_id) ? $topic_id : false;

	if ( $forum_id === false || $topic_id === false )
	{
		return false;
	}

	$sql = 'SELECT p.post_username, p2.poster_id, u.user_id, u.username
		FROM ' . TOPICS_TABLE . ' t, ' . FORUMS_TABLE . ' f, ' . POSTS_TABLE . ' p, ' . POSTS_TABLE . ' p2, ' . USERS_TABLE . ' u
		WHERE p.topic_id = ' . $topic_id . '
			AND p2.topic_id = ' . $topic_id . '
			AND p2.post_id = t.topic_last_post_id
			AND u.user_id = p.poster_id
			AND (f.forum_id = t.forum_id
				OR f.forum_id = ' . $forum_id . ')';
	if ( !($result = $db->sql_query($sql)) )
	{
		return false;
	}

	$row = $db->sql_fetchrow($result);

	return $row;
}
//-- fin mod : bump topic ------------------------------------------------------

//-- mod : presentation required -----------------------------------------------
//-- add
// function based on a code part of "Yellow Cards" MOD
function forum_combo($forum_id)
{
	global $db, $lang, $board_config;

	$sql = 'SELECT f.forum_id, f.forum_name
		FROM ' . FORUMS_TABLE . ' f, ' . CATEGORIES_TABLE . ' c
		WHERE c.cat_id = f.cat_id ORDER BY c.cat_order ASC, f.forum_order ASC';
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Couldn\'t obtain forum list', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrowset($result);
	$db->sql_freeresult($result);

	$forums_list = '<select name="' . $forum_id . '"><option value="0">' . $lang['Select_forum'] . '</option>';
	for ( $i = 0; $i < count($row); $i++ )
	{
		$selected = ( $row[$i]['forum_id'] == $board_config[ $forum_id ] ) ? ' selected="selected"' : '';
		$forums_list .= '<option value="' . $row[$i]['forum_id'] . '" ' . $selected . '>' . lang_item($row[$i]['forum_name']) . '</option>';
	}
	$forums_list .= '</select>';
	return $forums_list;
}
//-- fin mod : presentation required -------------------------------------------

?>