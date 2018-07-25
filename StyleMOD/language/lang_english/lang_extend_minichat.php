<?php
/**
*
* @package minichat
* @version $Id: lang_extend_minichat.php,v 1.0.0 2007/03/25 ABDev Exp $
* @copyright (c) 2007 ABDev, EzCom
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Original author : Malach, http://www.phantasia-fr.com/
*/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

/**
* admin part
*/
if ( $lang_extend_admin )
{
	$lang['Shoutbox_Settings'] = 'MiniChat';
	$lang['shoutbox_on'] = 'MiniChat On';
	$lang['date_on'] = 'Show date';
	$lang['sb_make_links'] = 'Make links';
	$lang['sb_links_names'] = 'Username link to profile';
	$lang['sb_allow_edit'] = 'Allow administrators and moderators to edit messages';
	$lang['sb_allow_edit_all'] = 'Allow to edit own messages';
	$lang['sb_allow_delete'] = 'Allow administrators and moderators to delete messages';
	$lang['sb_allow_delete_all'] = 'Allow to delete own messages';
	$lang['sb_allow_guest'] = 'Allow the guests to send messages in MiniChat';
	$lang['sb_allow_guest_view'] = 'Allow the guests to see MiniChat';
	$lang['delete_days'] = 'Amount of days after messages will be deleted';
	$lang['sb_text_lenght'] = 'Max messages letters';
	$lang['sb_word_lenght'] = 'Max word letters';
	$lang['shout_size'] = 'MiniChat size';
	$lang['sb_banned_user_send'] = 'Disallow send messages for user';
	$lang['sb_banned_user_send_e'] = 'User IDs of users who can\'t send messages to MiniChat. Separate multiple user IDs with commas, for example: <strong>18, 124</strong>';
	$lang['sb_banned_user_view'] = 'Disallow MiniChat for user';
	$lang['sb_banned_user_view_e'] = 'User IDs of users who can\'t view and use MiniChat. Separate multiple user IDs with commas, for example: <strong>18, 124</strong>';
	$lang['sb_refresh_time'] = 'MiniChat automatic refresh time (in seconds)';
	$lang['sb_messages_number_on_index'] = 'Displayed messages number in MiniChat on the forum index';

	$lang['MiniChat_Config'] = 'Configuration de MiniChat';
	$lang['MiniChat_explain'] = 'The form below will allow you to customize all the MiniChat options';
	$lang['Click_return_minichat_config'] = 'Click %sHere%s to return to MiniChat Configuration';
}

$lang['Shoutbox'] = 'MiniChat';
$lang['gg_mes'] = 'Message';
$lang['login_to_shoutcast'] = 'You must be logged in to use MiniChat';
$lang['sb_show'] = '<strong>Display</strong>';
$lang['sb_hide'] = '<strong>Hide</strong>';
$lang['sb_hide_done'] = 'Done';
$lang['too_long_word'] = 'Too long word';
$lang['sb_banned_send'] = 'You can\'t send messages';
$lang['shout_refresh'] = 'Refresh';
$lang['Censor'] = 'Censor';
$lang['Flood'] = 'You cannot make another post so soon after your last; please try again in a short while.';
$lang['title_minichat'] = 'MiniChat';

?>
