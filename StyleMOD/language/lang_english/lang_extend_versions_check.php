<?php
/**
*
* @package version_check_mod [English]
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
$lang['mod_version_check_explain'] = 'Checks to see if the version of phpBB and other applications you are currently running are up to date.';

/**
* admin part
*/
if ( $lang_extend_admin )
{
	// versions check
	$lang['Versions'] = 'Versions';
	$lang['versions_check'] = 'Versions check';
	$lang['versions_check_explain'] = 'Checks to see if the version of phpBB and other applications you are currently running are up to date.';
	$lang['version_information'] = 'Version Information';
	$lang['version_check'] = 'Check for latest versions';
	$lang['version_current_info'] = 'Version currently installed';
	$lang['version_stable_info'] = 'Latest stable version';
	$lang['version_dev_info'] = 'Last dev. version';
	$lang['version_not_stable'] = 'The version you are currently using is not up to date : please upgrade this application to at least the latest stable release.';
	$lang['version_stable'] = 'The version you are currently using is up to date with the latest stable release.';
	$lang['version_announcement'] = 'Please read the <a href="http://%s" target="_new">release announcement</a> for the latest version before you continue your update process, it may contain useful information.';
	$lang['version_socket_error'] = 'Unable to open connection to the server, reported error is:<br />%s';
	$lang['version_socket_disabled'] = 'Unable to use socket functions.';
	$lang['click_check_versions'] = '<p>Click %sHere%s to check if the version of phpBB and other applications you are currently running are up to date.</p>';
}

?>
