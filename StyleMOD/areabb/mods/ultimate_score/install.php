<?php
/*********************************************************
		install.php

  Créé le 08/08/2006 par Saint-Pere

  Si votre mod requiert l'éxecution de requêtes 
  servez-vous de ce script


*********************************************************/

if (!defined('IN_PHPBB'))
{
	die("Hacking attempt");
}

global $lang,$userdata,$db,$table_prefix;

// 2 précautions valent mieux qu'une
if ($userdata['user_level'] != ADMIN)
{
	message_die(GENERAL_MESSAGE, $lang['Not_admin']);
}
/*


*/
$requetes = array (
"CREATE TABLE `".$table_prefix."areabb_ultimate_score` (
`id_game` INT( 6 ) NOT NULL ,
`id_user` INT( 6 ) NOT NULL ,
`score` INT( 10 ) NOT NULL ,
`date` INT( 11 ) NOT NULL ,
PRIMARY KEY ( `id_game` )
);");

$nbre_requetes = sizeof($requetes);

for ($i=0;$i < $nbre_requetes; $i++)
{
	if( !($result = $db->sql_query($requetes[$i])) )
	{
		message_die(GENERAL_ERROR, "Impossible de lancer cette requete d\'installation", '', __LINE__, __FILE__, $requetes[$i]);
	}	
}


// Mise à jour des hight scores déjà réalisés.
$sql = 'SELECT game_id , game_highscore , game_highdate  , game_highuser  
		FROM '.AREABB_GAMES_TABLE.' 
		WHERE game_highscore > 0
		AND game_highuser > 0
		AND game_highdate != \'\'';
if( !($result = $db->sql_query($sql)) )
{
	message_die(CRITICAL_ERROR, "Could not query games information", "", __LINE__, __FILE__, $sql);
}
while ($row = $db->sql_fetchrow($result))
{
	$sql_maj = 'INSERT INTO `'.$table_prefix.'areabb_ultimate_score` (id_game,id_user,score,date) 
				VALUES (\''.$row['game_id'].'\',\''.$row['game_highuser'].'\',\''.$row['game_highscore'].'\',\''.$row['game_highdate'].'\')';

	$db->sql_query($sql_maj);
}


?>