<?php
//--------------------------------------------------------------------------------------------------------------------------------------
//                             mod_lecteur_mp3.php
//
//    par Saint-Pere
//--------------------------------------------------------------------------------------------------------------------------------------

if ( !defined('IN_PHPBB') )
{
	die("Hacking attempt");
}
global $lang;
define('CHEMIN_MP3','areabb/mods/lecteur_mp3/mp3/');

//chargement du template
$template->set_filenames(array(
   'lecteur_mp3' => 'areabb/mods/lecteur_mp3/tpl/mod_lecteur_mp3.tpl'
));

$dir_mp3 = @opendir(CHEMIN_MP3);
$liste_mp3 = array();
while( $file_mp3 = @readdir($dir_mp3) )
{
	if( preg_match("/.*?\.mp3$/", $file_mp3) )
	{
		$class = ($class == 'row1') ? 'row2':'row1';
		$template->assign_block_vars('liste_mp3',array(
			'FILE'	=> CHEMIN_MP3.$file_mp3,
			'TITRE'	=> eregi_replace("[^A-Z0-9]", " ", ereg_replace('.mp3','',$file_mp3)),
			'CLASS'	=> $class
		));
		$liste_mp3[] = CHEMIN_MP3.$file_mp3;
	}
}
shuffle($liste_mp3);


$template->assign_vars( array(
	'L_LECTEUR_MP3'	=> $lang['L_LECTEUR_MP3'],
	'DEFAULT'		=> $liste_mp3[0]
));

$template->assign_var_from_handle('lecteur_mp3', 'lecteur_mp3');

?>