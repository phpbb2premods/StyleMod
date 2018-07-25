<?php

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}
global $userdata,$lang,$cas_score,$score,$datenow,$gid;
unset($sql);
	
// Si le user a battu le record on charge la liste des champions en cache.
if ($cas_score > 2)
{
	$sql = 'SELECT id_game, score 
		FROM ' . AREABB_ULTIMATE_SCORE. 
		' WHERE id_game='.$gid.'
		LIMIT 1';
	if (!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Could not query recent topics information', '', __LINE__, __FILE__, $sql);
	}
	$row = $db->sql_fetchrow($result);
	if (($db->sql_numrows($result) > 0) && ($score > $row['score']))
	{
		// On met à jour
		$sql = 'UPDATE '.AREABB_ULTIMATE_SCORE.' 
				SET score=\''.$score.'\',
					id_user=\''.$userdata['user_id'].'\',
					date=\''.$datenow.'\'
				WHERE id_game='.$gid.'';
		$db->sql_query($sql);
	}elseif($db->sql_numrows($result) == 0){
		// On ajoute
		$sql = 'INSERT INTO '.AREABB_ULTIMATE_SCORE.' (id_game,id_user,score,date) 
				VALUES (\''.$gid.'\',\''.$userdata['user_id'].'\',\''.$score.'\',\''.$datenow.'\')';
		$db->sql_query($sql);
	}
}
?>