<?php
/**************************************************


**************************************************/

define('IN_PHPBB', 1);

if( !empty($setmodules) )
{
	$file = basename(__FILE__);
	$module['AreaBB Extensions']['Podium'] = '../areabb/mods/medailles_champions/'.$file;
	return;
}
//
// Let's set the root dir for phpBB
//
define('ROOT_STYLE','admin');
$phpbb_root_path = '../../../';
require($phpbb_root_path . 'extension.inc');
require($phpbb_root_path . 'admin/pagestart.' . $phpEx);
include($phpbb_root_path . 'areabb/fonctions/preload.' . $phpEx);
load_lang('admin');
load_lang('medailles_champions');


// --------------------------------------------------------------------------------------------
// TRAITEMENT DES PARAMETRES
//
if (isset($HTTP_POST_VARS['action']) || isset($HTTP_GET_VARS['action']))
{
	if (isset($HTTP_POST_VARS['action'])) 
	{
		$action			= $HTTP_POST_VARS['action']; 
	}else{
		$action = $HTTP_GET_VARS['action'];
		$id_cat = intval($HTTP_GET_VARS['id_cat']);
	}

switch($action)
{
	case 'enregistrer':
				// Enregistrement des modifications effectuées sur la config générale	
			$sql = 'SELECT * FROM ' . AREABB;
			if(!$result = $db->sql_query($sql))
			{
				message_die(CRITICAL_ERROR, "Could not query config information", "", __LINE__, __FILE__, $sql);
			}
			while( $row = $db->sql_fetchrow($result) )
			{
				$nom = $row['nom'];
				$valeur = $row['valeur'];
				$defaut[$nom] = $valeur;
				
				$new[$nom] = ( isset($HTTP_POST_VARS[$nom]) ) ? $HTTP_POST_VARS[$nom] : $defaut[$nom];
		
				$sql = 'UPDATE ' . AREABB . ' 
					SET valeur = \'' . str_replace("\'", "''", $new[$nom]) . '\'
					WHERE nom = \''.$nom.'\'';
				if( !$db->sql_query($sql) )
				{
					message_die(GENERAL_ERROR, 'Failed to update areabb configuration for '.$nom, '', __LINE__, __FILE__, $sql);
				}
			}
			break;
	case 'purger':
			// On supprime le contenue de areabb/cache/medailles/
			$folder = $phpbb_root_path.'areabb/cache/medailles/';
			$dossier = @opendir($folder);
			while ($Fichier = @readdir($dossier))
			{
				if ($Fichier != "." && $Fichier != "..") {
					@unlink($folder.$Fichier);
				}
			}
			closedir($dossier);
			break;
}

	// On met à jour $areabb
	$sql = 'SELECT * FROM ' . AREABB;
	if(!$result = $db->sql_query($sql))
	{
		message_die(CRITICAL_ERROR, "Could not query config information in admin_arcade", "", __LINE__, __FILE__, $sql);
	}
	while( $row = $db->sql_fetchrow($result) )
	{
		$areabb[$row['nom']]= $row['valeur'];	
	}	
	

}
// --------------------------------------------------------------------------------------------
// AFFICHAGE
//
$template->set_filenames(array(
	'body' => 'areabb/mods/medailles_champions/tpl/admin_medailles.tpl'
));


// liste déroulante des tailles
$liste_taille = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,16,18,20,24,28,36);
$s_med_taille = '';
foreach ($liste_taille as $clef => $value )
{
	$select = ($areabb['medailles_champ_taille'] == $value)? ' selected':'';
	$s_med_taille .= '<br><option value="'.$value.'"'.$select.'>'.$value.'</option>';
}
// liste déroulante des fonts
$liste_fontes = array(
 'Arial'	=> 'arial.ttf',
 'Arial Black'	=> 'ariblk.ttf',
 'Book Antiqua'	=> 'BKANT.TTF',
 'Courier'	=> 'cour.ttf',
 'Georgia'	=> 'georgia.ttf',
 'Impact'	=> 'impact.ttf',
 'Symbol'	=> 'symbol.ttf',
 'Tahoma'	=> 'tahoma.ttf',
 'Verdana'	=> 'verdana.ttf'
);
$s_med_fontes = '';
foreach ($liste_fontes as $clef => $value )
{
	$select = ($areabb['medailles_champ_font'] == $value)? ' selected':'';
	$s_med_fontes .= '<br><option value="'.$value.'"'.$select.'>'.$clef.'</option>';
}
// liste déroulante des images du dossier images/
function extension_image($url_image)
{
	$url_image = strtolower($url_image);
	ereg("\.([^\.]*$)", $url_image, $elts);
	return $elts[1];
}
	
$s_med_image = '';
$folder = "images/";
$dossier = opendir($folder);
while ($Fichier = readdir($dossier))
{
	$ext = extension_image($Fichier);
	if ($Fichier != "." && $Fichier != ".." && ($ext == 'png' || $ext == 'gif' || $ext == 'jpeg' || $ext == 'jpg')) {
		$select = ($areabb['medailles_champ_image'] == $Fichier)? ' selected':'';
		$s_med_image .= '<br><option value="'.$Fichier.'"'.$select.'>'.$Fichier.'</option>';
	}
}
closedir($dossier);


$template->assign_vars(array(	
	'L_GENERAL_MEDAILLES_ADMIN'			=> $lang['L_GENERAL_MEDAILLES_ADMIN'],
	'L_GENERAL_MEDAILLES_ADMIN_EXP'		=> $lang['L_GENERAL_MEDAILLES_ADMIN_EXP'],
	'L_GENERAL_SETTINGS'				=> $lang['L_GENERAL_SETTINGS'],

	'L_SUBMIT'							=> $lang['Submit'],
	'L_RESET'							=> $lang['Reset'],
	'L_OUI'								=> $lang['L_OUI'],
	'L_NON'								=> $lang['L_NON'],
	'L_MED_FCT'							=> $lang['L_MED_FCT'],
	'L_MED_PSEUDOS'						=> $lang['L_MED_PSEUDOS'],
	'L_MED_PURGE'						=> $lang['L_MED_PURGE'],
	'L_MED_PSEUDOS'						=> $lang['L_MED_PSEUDOS'],
	'L_MED_COORD_XY1'					=> sprintf($lang['L_MED_COORD_XY'],1),
	'L_MED_COORD_XY2'					=> sprintf($lang['L_MED_COORD_XY'],2),
	'L_MED_COORD_XY3'					=> sprintf($lang['L_MED_COORD_XY'],3),
	'L_MED_COL_PDO'						=> $lang['L_MED_COL_PDO'],
	'L_MED_COL_OBE'						=> $lang['L_MED_COL_OBE'],
	'L_MED_OMBRE'						=> $lang['L_MED_OMBRE'],
	'L_MED_TTF'							=> $lang['L_MED_TTF'],
	'L_MED_FONT'						=> $lang['L_MED_FONT'],
	'L_MED_TAILLE'						=> $lang['L_MED_TAILLE'],
	'L_MED_FCT_MANUEL'					=> $lang['L_MED_FCT_MANUEL'],
	'L_MED_ADMIN_ACTIONS'				=> $lang['L_MED_ADMIN_ACTIONS'],
	'L_PURGER'							=> $lang['L_PURGER'],
	'L_MED_IMAGE'						=> $lang['L_MED_IMAGE'],
	'L_MED_QUALITE'						=> $lang['L_MED_QUALITE'],
	'L_FIND_USERNAME'					=> $lang['Find_username'],
	'U_SEARCH_USER' 					=> append_sid($phpbb_root_path.'search.'.$phpEx.'?mode=searchuser'), 
	
	'S_MED_TAILLE'						=> $s_med_taille,
	'S_MED_FONT'						=> $s_med_fontes,
	'S_MED_IMAGE'						=> $s_med_image,
	'IMAGE_ACTUELLE'					=> $areabb['medailles_champ_image'],
	'S_MED_COL_PDO'						=> $areabb['medailles_champ_cpseudo'],
	'S_MED_COL_OBE'						=> $areabb['medailles_champ_combre'],
	'S_MED_QUALITE'						=> $areabb['medailles_champ_qualite'],
	
	
	'S_MED_COORD_XY1'					=> $areabb['medailles_champ_crd1'],
	'S_MED_COORD_XY2'					=> $areabb['medailles_champ_crd2'],
	'S_MED_COORD_XY3'					=> $areabb['medailles_champ_crd3'],
	'S_MED_PSEUDOS'						=> $areabb['medailles_champ_pseudo'],
	
	'S_MED_FCT_OUI'						=> ($areabb['medailles_champ_fct']==1)?'checked':'',
	'S_MED_FCT_NON'						=> ($areabb['medailles_champ_fct']==0)?'checked':'',
	'S_MED_TTF_OUI'						=> ($areabb['medailles_champ_ttf']==1)?'checked':'',
	'S_MED_TTF_NON'						=> ($areabb['medailles_champ_ttf']==0)?'checked':'',
	'S_MED_OMBRE_OUI'					=> ($areabb['medailles_champ_ombre']==1)?'checked':'',
	'S_MED_OMBRE_NON'					=> ($areabb['medailles_champ_ombre']==0)?'checked':''

));

$template->pparse('body');
include($phpbb_root_path . 'admin/page_footer_admin.'.$phpEx);
?>