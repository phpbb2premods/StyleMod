<?php
/*********************************************************
		desinstall.php

  Cr�� le 08/08/2006 par Saint-Pere

  Si votre mod requiert l'�xecution de requ�tes 
  servez-vous de ce script


*********************************************************/

if (!defined('IN_PHPBB'))
{
	die("Hacking attempt");
}

global $lang,$userdata,$db,$table_prefix;

// 2 pr�cautions valent mieux qu'une
if ($userdata['user_level'] != ADMIN)
{
	message_die(GENERAL_MESSAGE, $lang['Not_admin']);
}

$requetes = array (
	"delete from `".$table_prefix."areabb_config` WHERE nom LIKE 'medailles_champ%'"
);

$nbre_requetes = sizeof($requetes);

for ($i=0;$i < $nbre_requetes; $i++)
{
	if( !($result = $db->sql_query($requetes[$i])) )
	{
		message_die(GENERAL_ERROR, "Impossible de lancer cette requete de d�sinstallation", '', __LINE__, __FILE__, $requetes[$i]);
	}	
}

?>