<?php
/***************************************************************************
 *                              page_tail.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: page_tail.php,v 1.27.2.4 2005/09/14 18:14:30 acydburn Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

global $do_gzip_compress;

//
// Show the overall footer.
//
$admin_link = ( $userdata['user_level'] == ADMIN ) ? '<a href="admin/index.' . $phpEx . '?sid=' . $userdata['session_id'] . '">' . $lang['Admin_panel'] . '</a><br /><br />' : '';

$template->set_filenames(array(
	'overall_footer' => ( empty($gen_simple_header) ) ? 'overall_footer.tpl' : 'simple_footer.tpl')
);

$template->assign_vars(array(
	'PREMOD_VERSION' => $board_config['premod_version'],
	'TRANSLATION_INFO' => (isset($lang['TRANSLATION_INFO'])) ? $lang['TRANSLATION_INFO'] : ((isset($lang['TRANSLATION'])) ? $lang['TRANSLATION'] : ''),
	'ADMIN_LINK' => $admin_link)
);

//-- mod : cnil website id -----------------------------------------------------
//-- add
if ($board_config['cnil_id'])
{
	$template->assign_block_vars('switch_cnil_id', array());
	$template->assign_vars(array(
		'CNIL_ID' => sprintf($lang['CNIL_ID_display'], $board_config['cnil_id']),
	));
}
//-- fin mod : cnil website id -------------------------------------------------

//
// Close our DB connection.
//
$db->sql_close();

//
// Compress buffered output if required and send to browser
//
if ( $do_gzip_compress )
{
	//
	// Borrowed from php.net!
	//
	$gzip_contents = ob_get_contents();
	ob_end_clean();

	$gzip_size = strlen($gzip_contents);
	$gzip_crc = crc32($gzip_contents);

	$gzip_contents = gzcompress($gzip_contents, 9);
	$gzip_contents = substr($gzip_contents, 0, strlen($gzip_contents) - 4);

	echo "\x1f\x8b\x08\x00\x00\x00\x00\x00";
	echo $gzip_contents;
	echo pack('V', $gzip_crc);
	echo pack('V', $gzip_size);
}

//-- mod : board generation time info ------------------------------------------
//-- add
$endtime = microtime();
$endtime = explode(' ', microtime());
$endtime = $endtime[1] + $endtime[0];
$gentime = round(($endtime - $starttime), 5);

$gzip_status = ($board_config['gzip_compress']) ? $lang['Gzip_on'] : '';
$debug_status = (DEBUG) ? $lang['Debug_on'] : $lang['Debug_off'];
$queries_display = sprintf($lang['Queries'], $db->num_queries);
$generation_time = sprintf($lang['Generation_time'], $gentime);

$template->assign_vars(array(
	'STATISTICS' => '[ ' . $generation_time . ' ][ ' . $queries_display . ' ][ ' . $gzip_status . $debug_status . ' ]')
);
$template->pparse('overall_footer');
//-- fin mod : board generation time info --------------------------------------

exit;

?>