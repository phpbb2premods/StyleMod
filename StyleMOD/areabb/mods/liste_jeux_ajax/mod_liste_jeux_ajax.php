<?php
/*********************************************************************
		  mod_liste_jeux_SP2.php

  Commencé le lundi 28 Août 2006 par Saint-Pere - www.yep-yop.com

   Affichage de la liste des jeux sous la forme de minis blocs avec une grosse vignette
   du jeu. C'est l'affichage actuel du site www.yep-yop.com

**********************************************************************/
if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}
global $squelette,$arcade_catid,$areabb;

$template->set_filenames(array(
      'liste_jeux_ajax' => 'areabb/mods/liste_jeux_ajax/tpl/mod_liste_jeux_ajax.tpl'
));

$template->assign_vars(array(
	'VARS' => 	'salle='.$squelette->id_squelette.'&cid='.$arcade_catid.'&start=0&order='.$areabb['game_order']
));


$template->assign_var_from_handle('liste_jeux_ajax', 'liste_jeux_ajax');

?>