<?php
/**
*
* @package version_check_mod [French]
* @version $Id: lang_extend_version_check.php,v 0.1 08/11/2007 18:07 Dragons Exp $
* @copyright (c) 2007 Dragons - http://www.ezcom-fr.com/
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

/**
* description
*/
$lang['mod_version_check_title'] = 'Versions Check';
$lang['mod_version_check_explain'] = 'Permet de v&eacute;rifier les versions de phpBB et celle de vos MODs et/ou preMODS.';

/**
* admin part
*/
if ( $lang_extend_admin )
{
	// versions check
	$lang['Versions'] = 'Versions';
	$lang['versions_check'] = 'V&eacute;rification de versions';
	$lang['versions_check_explain'] = 'Permet de v&eacute;rifier si la version de phpBB et celles d\'autres applications que vous utilisez actuellement sont &agrave; jour.';
	$lang['version_information'] = 'Informations de version';
	$lang['version_check'] = 'V&eacute;rifier les derni&egrave;res versions';
	$lang['version_current_info'] = 'Version actuellement install&eacute;e';
	$lang['version_stable_info'] = 'Derni&egrave;re version stable';
	$lang['version_dev_info'] = 'Derni&egrave;re version en d&eacute;veloppement';
	$lang['version_not_stable'] = 'La version que vous utilisez actuellement n\'est pas &agrave; jour : veuillez mettre cette application &agrave; jour au moins jusqu\'&agrave; la derni&egrave;re version stable propos&eacute;e.';
	$lang['version_stable'] = 'La version que vous utilisez actuellement est &agrave; jour avec la derni&egrave;re version stable connue.';
	$lang['version_announcement'] = 'Veuillez lire l\'<a href="http://%s" target="_new">annonce</a> publi&eacute;e pour cette derni&egrave;re version avant de continuer la mise &agrave; jour, celle-ci peut contenir des informations utiles.';
	$lang['version_socket_error'] = 'Impossible d\'&eacute;tablir la connexion avec le serveur, l\'erreur rapport&eacute;e est :<br />%s.';
	$lang['version_socket_disabled'] = 'Impossible d\'utiliser les fonctions socket.';
	$lang['click_check_versions'] = '<p>Cliquez %sici%s pour v&eacute;rifier si la version de phpBB et celles d\'autres applications que vous utilisez actuellement sont &agrave; jour.</p>';
}

?>
