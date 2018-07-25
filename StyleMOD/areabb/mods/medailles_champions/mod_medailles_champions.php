<?php
if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}
global $lang, $board_config, $areabb,$_SERVER,$HTTP_GET_VARS;
load_lang('medailles_champions');

//chargement du template
$template->set_filenames(array(
   'medailles_champions' => 'areabb/mods/medailles_champions/tpl/mod_medailles_champions.tpl'
));

// Classement Manuel définit dans l'ACP
if ($areabb['medailles_champ_fct'] == 1)
{
	// on passe direct en parametres les infos sur les 3 users choisis
	$users = explode(',',$areabb['medailles_champ_pseudo']);
	$champions = 'user1='.$users[0].'&user2='.$users[1].'&user3='.$users[2];
}else{
// Classement automatique pour l'arcade	
	if (eregi(NOM_GAME,$_SERVER["PHP_SELF"]))
	{
		// Si on est dans une page de type games.php
		// on affiche le classement à ce jeu
		$sql = 'SELECT u.user_id
				FROM ' . AREABB_SCORES_TABLE . ' as s 
				LEFT JOIN ' . USERS_TABLE . ' as u 
				ON s.user_id = u.user_id 
				WHERE s.game_id = '.intval($HTTP_GET_VARS['gid']).' 
				ORDER BY s.score_game DESC, s.score_date ASC 
				LIMIT 3';
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain radio information', '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$champions = 'user1='.$row ['user_id'];
		$row = $db->sql_fetchrow($result);
		$champions .= '&user2='.$row ['user_id'];
		$row = $db->sql_fetchrow($result);
		$champions .= '&user3='.$row ['user_id'];
	}elseif(eregi(NOM_ARCADE,$_SERVER["PHP_SELF"])){
		// Si on est dans une page de type arcade.php
		// on affiche le classement général
		$sql = 'SELECT game_highuser , COUNT(game_highscore) as victoires 
				FROM ' . AREABB_GAMES_TABLE . ' 
				WHERE game_highscore != 0
				GROUP BY game_highuser 
				ORDER BY victoires DESC,game_highuser ASC 
				LIMIT 3';
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not obtain radio information', '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$champions = 'user1='.$row['game_highuser'];
		$row = $db->sql_fetchrow($result);
		$champions .= '&user2='.$row['game_highuser'];
		$row = $db->sql_fetchrow($result);
		$champions .= '&user3='.$row['game_highuser'];
	}else{
		// on passe direct en parametres les infos sur les 3 users choisis faute de mieux
		$users = explode(',',$areabb['medailles_champ_pseudo']);
		$champions = 'user1='.$users[0].'&user2='.$users[1].'&user3='.$users[2];
	}
}	

$template->assign_vars( array(
	'L_MEDAILLES_CHAMPIONS'	=> $lang['L_MEDAILLES_CHAMPIONS'],
	'URL_IMAGE'	=> 'http://'.$board_config['server_name'].$board_config['script_path'].'areabb/mods/medailles_champions/affichage_podium.'.$phpEx.'?'.$champions
));

$template->assign_var_from_handle('medailles_champions', 'medailles_champions');

?>