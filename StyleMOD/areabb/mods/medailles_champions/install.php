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

$requetes = array (
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_taille', '5');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_font', 'verdana.ttf');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_image', 'podium_damierfonce.png');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_cpseudo', '#66CC00');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_combre', '#669933');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_crd1', '211:177');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_crd2', '99:234');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_crd3', '322:234');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_pseudo', '2,3,4');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_fct', '0');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_qualite', '60');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_ombre', '1');",
"INSERT INTO `".$table_prefix."areabb_config` (`nom`, `valeur`) VALUES ('medailles_champ_ttf', '0');"
);

$nbre_requetes = sizeof($requetes);

for ($i=0;$i < $nbre_requetes; $i++)
{
	if( !($result = $db->sql_query($requetes[$i])) )
	{
		message_die(GENERAL_ERROR, "Impossible de lancer cette requete d\'installation", '', __LINE__, __FILE__, $requetes[$i]);
	}	
}

?>