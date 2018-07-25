<?
define('ROOT_STYLE','admin');
define('IN_PHPBB', true);
$phpbb_root_path = '../../../';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'areabb/fonctions/preload.' . $phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_ARCADE);
init_userprefs($userdata);
//
// End session management
//

load_lang('arcade');

$start = 0;
$order = '';

if (isset($HTTP_GET_VARS['start']))
{
	$start = eregi_replace('[^0-9]','',$HTTP_GET_VARS['start']);
}
if (isset($HTTP_GET_VARS['order']))
{
	$order = eregi_replace('[^0-9]','',$HTTP_GET_VARS['order']);
}

// Variables serialisées
$squelette->id_squelette = ($HTTP_POST_VARS['salle'] != '')? eregi_replace('[^0-9]','',$HTTP_POST_VARS['salle']):message_die(GENERAL_ERROR, "Page Interdite");
$arcade_catid = ($HTTP_POST_VARS['cid'] != '')? eregi_replace('[^0-9]','',$HTTP_POST_VARS['cid']):NULL;
$start = ($HTTP_POST_VARS['start'] != '')? eregi_replace('[^0-9]','',$HTTP_POST_VARS['start']):NULL;
$order = ($HTTP_POST_VARS['order'] != '')? eregi_replace('[^0-9]','',$HTTP_POST_VARS['order']):NULL;

//-------------------------------------------------------------------------------------
//		AFFICHAGE des JEUX
//	
load_function('class_liste_jeux');
$jeux = new liste_jeux();

// on trie l'ordre d'affichage des jeux
if (isset($order) && ($order != '')) $jeux->order_by($order); else $jeux->order_by($areabb['game_order']);

// Si une catégorie a été séléctionnée on affiche uniquement ses jeux
if (isset($arcade_catid))$jeux->cat_id = $arcade_catid;

// Si on désire limiter le nombre de jeux, ou la paginer
if (isset($start) && ($start != '')) $jeux-> definir_limites($start);

// On initialise un titre lambda
$jeux->titre_page = htmlentities($lang['lib_arcade']);

$template->set_filenames(array(
      'body' => 'areabb/mods/liste_jeux_ajax/tpl/zone_liste_jeux.tpl'
));


// On récupere les données sur les jeux en question
$jeux-> recup_infos_jeux($squelette->id_squelette);
$liste_jeux = $jeux->liste;


$nbjeux = sizeof($liste_jeux);
if ($nbjeux == 0) 
{
	// aucun jeu dans cette catégorie
	$template->assign_block_vars('no_game',array());
}else{

	$template->assign_block_vars('game',array());

	for ($i=0 ; $i<$nbjeux ; $i++)
	{
		// intialisation
		$gamepic= ''; $gameset = '0';$norecord = '';$highuser =	'';$imgfirst = '';$yourhighscore = 'N\A';

		//  mise en forme des données
		$gamename =	htmlentities($liste_jeux[$i]['game_libelle']);
		$gamelink = $jeux->definir_lancement_jeu($liste_jeux[$i]['game_id'],$liste_jeux[$i]['game_width'],$liste_jeux[$i]['game_height']);
		$gamelink .=  $liste_jeux[$i]['game_libelle'] . '</a>';
		$icone_jeu = (file_exists($phpbb_root_path . 'areabb/games/'.$liste_jeux[$i]['game_name'] .'/'.$liste_jeux[$i]['game_pic_large']))? $liste_jeux[$i]['game_pic_large']:$liste_jeux[$i]['game_pic'];

		if ($liste_jeux[$i]['game_pic'] != '')
		{				
			$gamepic	= $jeux->definir_lancement_jeu($liste_jeux[$i]['game_id'],$liste_jeux[$i]['game_width'],$liste_jeux[$i]['game_height']);
			$gamepic	.= '<img src="areabb/games/'.$liste_jeux[$i]['game_name'] .'/'.$icone_jeu;
			$gamepic	.= '" align="absmiddle" border="0" height="130" vspace="2" hspace="2" alt="' ;
			$gamepic	.= $liste_jeux[$i]['game_libelle'] . '"></a>';
		}
		if  ( $liste_jeux[$i]['game_set'] != '0'  )
		{
			$gameset =  $liste_jeux[$i]['game_set'];
		}
		$highscore = $liste_jeux[$i]['game_highscore'];
		if ($liste_jeux[$i]['score_game'] != '')
		{
			$yourhighscore = $liste_jeux[$i]['score_game'];
		}		
		if ( $liste_jeux[$i]['game_highscore'] == 0 )
		{
			$norecord = $lang['no_record'];
			$highscore  = '';
			$datehigh = '';
		}
		if ( $liste_jeux[$i]['game_highuser'] != 0 )
		{
			$highuser = '(' . areabb_profile($liste_jeux[$i]['user_id'],htmlentities($liste_jeux[$i]['username'])) . ')';
		}
		$gameid = $liste_jeux[$i]['game_id'];
		if ($liste_jeux[$i]['game_highdate'] != 0 )
		{
			$datehigh = create_date( $board_config['default_dateformat'] , $liste_jeux[$i]['game_highdate'] , $userdata['user_timezone'] );	
		}
		if ($liste_jeux[$row['arcade_catid']][$i]['score_date'] != 0)
		{
			$yourdatehigh = create_date( $board_config['default_dateformat'] , $liste_jeux[$row['arcade_catid']][$i]['score_date'] , $userdata['user_timezone'] );	
		}
		if ( $liste_jeux[$i]['game_highuser'] == $userdata['user_id'] )
		{
			$imgfirst = '&nbsp;&nbsp;<img src="areabb/images/couronne.gif" align="absmiddle">';
		}
		$gamedesc = stripslashes($liste_jeux[$i]['game_desc']);
		$note = $liste_jeux[$i]['note'].'/5';
		$template->assign_block_vars('game.gamerow',array(
			'NOTE'			=>$note,
			'GAMENAME'		=>$gamename,
			'GAMELINK'		=>$gamelink,
			'GAMEPIC'		=>$gamepic,
			'GAMESET'		=>$gameset,
			'HIGHSCORE'		=>$highscore,
			'YOURHIGHSCORE'	=>$yourhighscore,
			'NORECORD'		=>$norecord,
			'HIGHUSER'		=>$highuser,
			'GAMEID'		=>$gameid,
			'DATEHIGH'		=>$datehigh,
			'YOURDATEHIGH'	=>$yourdatehigh,
			'IMGFIRST'		=>$imgfirst,
			'GAMEDESC'		=>htmlentities($gamedesc) 
		 ));

	}
}

function pagination_jeux($start)
{
	global $db,$squelette,$areabb,$phpEx,$jeux;
	
	// On détermine le nombre maximal de jeux
	$sql = 'SELECT count(g.game_id) as max 
		FROM '.AREABB_GAMES_TABLE.' as g 
		LEFT JOIN '.AREABB_CATEGORIES_TABLE.' as c 
		ON g.arcade_catid=c.arcade_catid WHERE ';
	if ($jeux->cat_id != '')
	{
		$sql .=	' g.arcade_catid='.$jeux->cat_id. ' AND ';
	}
	
	$sql .= ' salle='.$jeux->salle;
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, "Impossible d'accéder aux jeux", '', __LINE__, __FILE__, $sql); 
	}
	$row = $db->sql_fetchrow($result);
	$max_jeu = $row['max'];
	
	// nombre de pages maximal
	if ($max_jeu <= $areabb['games_par_page'])
	{
		$jeux->max_pages = 1;
	}else{
		$jeux->max_pages = ceil($max_jeu / $areabb['games_par_page']);
	}
			
	// la page où on se trouve
	$jeux->page_actuelle = round($start / $areabb['games_par_page']);
	
	// montage du lien
	for ($i=0;$i<=$jeux->max_pages;$i++)
	{
		$jeux->pagination[$i] = 'salle='.$squelette->id_squelette.'&cid='.$jeux->cat_id.'&start='.($i * $areabb['games_par_page']).'&order='.$jeux->order;
	}			
	return $true;
}
function pagination_ajax()
{
	global $jeux;
	$retour = '';
	for ($i=0;$i < $jeux->max_pages;$i++)
	{
		if ($i == $jeux->page_actuelle)
		{
			$retour .= ($i+1).'&nbsp;';
		}else{
			$retour .= '<a href="javascript:;" onClick="next_page_arcade(\''.$jeux->pagination[$i].'\')">'.($i+1).'</a>&nbsp;';
		}
	}
	return $retour;		
}
	
// On veut paginer nos pages ?
pagination_jeux($start);

//On choisit l'apparance de la pagination
//il faut choisir entre les 3
// je me suis éclaté sur ces petites fonctions.. lol
//$jeux->pagination_classique();
//$jeux->pagination_google();
//$jeux->pagination_phpbb();
$pages = pagination_ajax();
$template->assign_vars(array(
	'PAGINATION'	=> $pages,
	'NO_GAME'		=> htmlentities($lang['NO_GAME']),
	'CATTITLE'		=> htmlentities($jeux->titre_page),
	'L_GAME'		=> htmlentities($lang['games']),
	'L_HIGHSCORE'	=> htmlentities($lang['highscore']),
	'L_NOTE'		=> htmlentities($lang['L_NOTE']),
	'L_YOURSCORE'	=> htmlentities($lang['yourbestscore']),
	'L_DESC'		=> htmlentities($lang['desc_game']),
	'L_ARCADE'		=> htmlentities($lang['lib_arcade']),
	'L_ALLER_A'		=> htmlentities($lang['L_ALLER_A']),
	'L_PARTIES'		=> htmlentities($lang['game_actual_nbset'])
));


$page_title = $jeux->titre_page;

//
// Parse the page and print
//
$template->pparse('body');

?>