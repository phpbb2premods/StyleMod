<?php
// -------------------------------------------------------------------------
//
//				news.php
//
//	Portail de news pour AreaBB
//	 Commenc� le   :  18 Ao�t 2006
//   	Par  Saint-Pere
// -------------------------------------------------------------------------

define('IN_PHPBB', true);
define('ROOT_STYLE','page');
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'areabb/fonctions/preload.' . $phpEx);
load_lang('main');
load_lang('news');

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_NEWS);
init_userprefs($userdata);
//
// End session management

//-------------------------------------------------------------------------------------
//		CONFIGURATION
//
$id_squelette =(isset($HTTP_GET_VARS['salle'])) ? eregi_replace('[^0-9]','',$HTTP_GET_VARS['salle']): $areabb['news_par_defaut'];

//
// V�rification des groupes d'acc�s autoris�s � acc�der � cette salle

if (!verification_acces_page($id_squelette))
{
	$message = $lang['salle_interdite'] . '<br /><br />' ;
	$message .=	sprintf($lang['Click_return_areabb'], '<a href="' . append_sid(NOM_NEWS.'.'.$phpEx) . '">', '</a>') ;
	message_die(GENERAL_MESSAGE,$message);
	exit;
}


//-------------------------------------------------------------------------------------
//		AFFICHAGE du SQUELETTE
//
define('SHOW_ONLINE', true);
include($phpbb_root_path . 'includes/page_header.'.$phpEx);	

load_function('class_squelette');
$squelette = new generation_squelette($phpbb_root_path);

// d�finit notre squelette de travail.
$squelette->id_squelette = $id_squelette;

// On r�cupere dans le cache les infos � afficher
$squelette->lire_cache_squelette();


// on teste la pr�sence ou non du template demand�
if (!file_exists($phpbb_root_path . 'areabb/cache/squelette_'.$squelette->id_squelette.'.tpl'))
{
	message_die(GENERAL_ERROR, "Vous devez aller dans l'ACP cr�er une salle afin de visualiser votre portail");
}

$template->set_filenames(array(
   	'body' =>   'areabb/cache/squelette_'.$squelette->id_squelette.'.tpl'
));

// on assemble les mods dans le squelette			
$squelette->fusionner_bloc_mod();

$template->assign_vars(array(
	'SQUELETTE'		=> $squelette->squelette
));


$template->pparse('body');
include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>