<?php
if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}
global $lang,$board_config,$HTTP_GET_VARS;
load_lang('arcade');

// id du jeu..
$gid = intval($HTTP_GET_VARS['gid']);

$template->set_filenames(array(
      'ultimate_score' => 'areabb/mods/ultimate_score/tpl/mod_ultimate_score.tpl'
));

$sql = 'SELECT id_user, score, date, id_game, u.username,u.user_avatar_type,u.user_allowavatar,u.user_avatar
	FROM '.AREABB_ULTIMATE_SCORE.' as s 
	LEFT JOIN '.USERS_TABLE.' as u
	ON (s.id_user=u.user_id)
	 WHERE id_game='.$gid.'	LIMIT 1';
if ( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not obtain forum information', '', __LINE__, __FILE__, $sql);
}
$row = $db->sql_fetchrow($result);

// Avatar
$avatar_img = '';
if ( $row['user_avatar_type'] && $row['user_allowavatar'] )
{
	switch( $row['user_avatar_type'] )
	{
		case USER_AVATAR_UPLOAD:
			$avatar_img = ( $board_config['allow_avatar_upload'] ) ? '<img src="' . $board_config['avatar_path'] . '/' . $row['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_REMOTE:
			$avatar_img = ( $board_config['allow_avatar_remote'] ) ? '<img src="' . $row['user_avatar'] . '" alt="" border="0" />' : '';
			break;
		case USER_AVATAR_GALLERY:
			$avatar_img = ( $board_config['allow_avatar_local'] ) ? '<img src="' . $board_config['avatar_gallery_path'] . '/' . $row['user_avatar'] . '" alt="" border="0" />' : '';
			break;
	}
}

$template->assign_vars(array(	
	'L_ULTIMATE_SCORE'	=> $lang['L_ULTIMATE_SCORE'],
	'USER'				=> areabb_profile($row['id_user'],$row['username']),
	'AVATAR'			=> $avatar_img,
	'L_SCORE'			=> $lang['L_SCORE'],
	'SCORE'				=> $row['score'],
	'DATE'				=> create_date($board_config['default_dateformat'], $row['date'], $board_config['board_timezone'])
));


$template->assign_var_from_handle('ultimate_score', 'ultimate_score');
?>