<?
// -------------------------------------------------------------------------
//
//				fonctions_profile.php
//
//	Chargement du popup profile
// -------------------------------------------------------------------------

if (!defined('IN_PHPBB'))
{
	die('Hacking attempt');
}
global $onglets,$liste_mods,$securite,$liste_profiles;
// on va r�cup�rer le nom de chaque libell�
$max_onglets = sizeof($liste_mods);

$securite = 1;
$onglets = array();
$liste_profiles = array();
$tab = 1;
for($i=0;$i<$max_onglets;$i++)
{	
	//echo CHEMIN_MODS.$liste_mods[$i].'/profile.'.$phpEx;
	if (file_exists(CHEMIN_MODS.$liste_mods[$i].'/profile.'.$phpEx))
	{
		$liste_profiles[$tab] = $liste_mods[$i];
		// on va aller lire chaque profile � la recherche du nom du libell�
		// ce nom sera stock� dans $onglets[NomDossierMod] = Libell� Onglet
		include_once(CHEMIN_MODS . $liste_mods[$i]. '/profile.'.$phpEx);
		$tab ++;
	}		
}
//die(print_r($onglets));
unset($securite);

?>