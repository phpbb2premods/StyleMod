<?php
/***************************************************************************
 *                               db_update.php
 *                            -------------------
 *
 *   copyright            : ©2003 Freakin' Booty ;-P & Antony Bailey
 *   project              : http://sourceforge.net/projects/dbgenerator
 *   Website              : http://freakingbooty.no-ip.com/ & http://www.rapiddr3am.net
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

define('IN_PHPBB', true);
$phpbb_root_path = './';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);
//
// End session management
//


if( !$userdata['session_logged_in'] )
{
	$header_location = ( @preg_match('/Microsoft|WebSTAR|Xitami/', getenv('SERVER_SOFTWARE')) ) ? 'Refresh: 0; URL=' : 'Location: ';
	header($header_location . append_sid("login.$phpEx?redirect=db_update.$phpEx", true));
	exit;
}

if( $userdata['user_level'] != ADMIN )
{
	message_die(GENERAL_MESSAGE, 'You are not authorised to access this page');
}


$page_title = 'Updating the database';
include($phpbb_root_path . 'includes/page_header.'.$phpEx);

echo '<table width="100%" cellspacing="1" cellpadding="2" border="0" class="forumline">';
echo '<tr><th>Updating the database</th></tr><tr><td><span class="genmed"><ul type="circle">';


$sql = array();
$sql[] = "CREATE TABLE " . $table_prefix . "attributes (
	attribute_id INT(11) NOT NULL auto_increment,
	attribute VARCHAR(255) NOT NULL DEFAULT '',
	attribute_color VARCHAR(6) NOT NULL DEFAULT '',
	attribute_date_format VARCHAR(25) DEFAULT NULL,
	attribute_position TINYINT(1) NOT NULL DEFAULT '0',
	attribute_administrator TINYINT(1) DEFAULT '0',
	attribute_moderator TINYINT(1) DEFAULT '0',
	attribute_author TINYINT(1) DEFAULT '0',
	attribute_order INT(11) DEFAULT '0' NOT NULL,
	PRIMARY KEY (attribute_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "bbc_box (
	bbc_id smallint(5) unsigned NOT NULL auto_increment,
	bbc_name varchar(255) NOT NULL,
	bbc_value varchar(255) NOT NULL,
	bbc_auth varchar(255) NOT NULL,
	bbc_before varchar(255) NOT NULL,
	bbc_after varchar(255) NOT NULL,
	bbc_helpline varchar(255) NOT NULL,
	bbc_img varchar(255) NOT NULL,
	bbc_divider varchar(255) NOT NULL,
	bbc_order mediumint(8) DEFAULT '1' NOT NULL,
	PRIMARY KEY (bbc_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "rcs (
	rcs_id mediumint(8) UNSIGNED NOT NULL auto_increment,
	rcs_name varchar(50) DEFAULT '' NOT NULL,
	rcs_color varchar(6) DEFAULT '' NOT NULL,
	rcs_single tinyint(1) DEFAULT '0' NOT NULL,
	rcs_display tinyint(1) DEFAULT '0' NOT NULL,
	rcs_order mediumint(8) UNSIGNED NOT NULL,
	PRIMARY KEY (rcs_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "shoutbox (
	id int(11) NOT NULL auto_increment,
	sb_user_id int(11) NOT NULL default '0',
	msg varchar(255) NOT NULL default '',
	timestamp int(10) unsigned NOT NULL default '0',
	sb_username varchar(255) NOT NULL default '',
	shout_bbcode_uid varchar(10) NOT NULL default '',
	enable_bbcode tinyint(1) NOT NULL default '0',
	enable_html tinyint(1) NOT NULL default '0',
	enable_smilies tinyint(1) NOT NULL default '0',
	shout_ip varchar(8) NOT NULL default '',
	shout_group_id mediumint(8) NOT NULL default '0',
	PRIMARY KEY (id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "attachments_config (
  config_name varchar(255) NOT NULL,
  config_value varchar(255) NOT NULL,
  PRIMARY KEY (config_name)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "forbidden_extensions (
  ext_id mediumint(8) UNSIGNED NOT NULL auto_increment, 
  extension varchar(100) NOT NULL, 
  PRIMARY KEY (ext_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "extension_groups (
  group_id mediumint(8) NOT NULL auto_increment,
  group_name char(20) NOT NULL,
  cat_id tinyint(2) DEFAULT '0' NOT NULL, 
  allow_group tinyint(1) DEFAULT '0' NOT NULL,
  download_mode tinyint(1) UNSIGNED DEFAULT '1' NOT NULL,
  upload_icon varchar(100) DEFAULT '',
  max_filesize int(20) DEFAULT '0' NOT NULL,
  forum_permissions varchar(255) default '' NOT NULL,
  PRIMARY KEY group_id (group_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "extensions (
  ext_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  group_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  extension varchar(100) NOT NULL,
  comment varchar(100),
  PRIMARY KEY ext_id (ext_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "attachments_desc (
  attach_id mediumint(8) UNSIGNED NOT NULL auto_increment,
  physical_filename varchar(255) NOT NULL,
  real_filename varchar(255) NOT NULL,
  download_count mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  comment varchar(255),
  extension varchar(100),
  mimetype varchar(100),
  filesize int(20) NOT NULL,
  filetime int(11) DEFAULT '0' NOT NULL,
  thumbnail tinyint(1) DEFAULT '0' NOT NULL,
  PRIMARY KEY (attach_id),
  KEY filetime (filetime),
  KEY physical_filename (physical_filename(10)),
  KEY filesize (filesize)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "attachments (
  attach_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  post_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL, 
  privmsgs_id mediumint(8) UNSIGNED DEFAULT '0' NOT NULL,
  user_id_1 mediumint(8) NOT NULL,
  user_id_2 mediumint(8) NOT NULL,
  KEY attach_id_post_id (attach_id, post_id),
  KEY attach_id_privmsgs_id (attach_id, privmsgs_id),
  KEY post_id (post_id),
  KEY privmsgs_id (privmsgs_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "quota_limits (
  quota_limit_id mediumint(8) unsigned NOT NULL auto_increment,
  quota_desc varchar(20) NOT NULL default '',
  quota_limit bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (quota_limit_id)
)";
$sql[] = "CREATE TABLE " . $table_prefix . "attach_quota (
  user_id mediumint(8) unsigned NOT NULL default '0',
  group_id mediumint(8) unsigned NOT NULL default '0',
  quota_type smallint(2) NOT NULL default '0',
  quota_limit_id mediumint(8) unsigned NOT NULL default '0',
  KEY quota_type (quota_type)
)";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD auth_download TINYINT(2) DEFAULT '0' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "auth_access ADD auth_download TINYINT(1) DEFAULT '0' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "posts ADD post_attachment TINYINT(1) DEFAULT '0' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_attachment TINYINT(1) DEFAULT '0' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "privmsgs ADD privmsgs_attachment TINYINT(1) DEFAULT '0' NOT NULL";
$sql[] = "CREATE TABLE " . $table_prefix . "guests_visit (
   guest_time INT( 11 ) NOT NULL DEFAULT '0',
   guest_visit INT( 11 ) NOT NULL DEFAULT '0',
   PRIMARY KEY  ( guest_time )
)";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_blocs` (  
  `id_bloc` int(11) NOT NULL auto_increment,
  `id_feuille` int(11) NOT NULL default '0',
  `id_mod` int(11) default '0',
  `type_mod` varchar(5) default NULL,
  PRIMARY KEY  (`id_bloc`))";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_blocs_html` (
  `id_bloc` tinyint(4) NOT NULL auto_increment,
  `titre` varchar(250) default NULL,
  `message` text,
  PRIMARY KEY  (`id_bloc`))";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_config` (
  `nom` varchar(255) NOT NULL default '',
  `valeur` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`nom`))";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_feuille` (
  `id_feuille` int(11) NOT NULL auto_increment,
  `id_squelette` int(11) NOT NULL default '0',
  `id_modele` int(11) NOT NULL default '0', 
  `position` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id_feuille`))";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_modeles` (
  `id_modele` smallint(6) NOT NULL auto_increment,
  `modele` text NOT NULL,
  `details` varchar(200) default NULL,
  PRIMARY KEY  (`id_modele`))";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_mods` (
  `id_mod` int(11) NOT NULL auto_increment,
  `nom` varchar(150) NOT NULL default '',
  `affiche` tinyint(1) NOT NULL default '0',
  `page` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id_mod`))";
$sql[] = "CREATE TABLE `" . $table_prefix . "areabb_squelette` (
  `id_squelette` tinyint(4) NOT NULL auto_increment,
  `titre` varchar(250) default NULL,
  `groupes` varchar(250) default NULL,
  `type` smallint(6) NOT NULL default '0',
  `position` INT DEFAULT '0' NOT NULL,
  PRIMARY KEY  (`id_squelette`))";
$sql[] = "ALTER TABLE " . $table_prefix . "search_results CHANGE search_array search_array TEXT NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_absent tinyint(1) NULL DEFAULT 0";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('absent_avatar', 'images/absent_user_avatar.gif')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (1, 'strike', '1', '0', 's', 's', 'strike', 'strike', '0', '10')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (2, 'spoiler', '1', '0', 'spoil', 'spoil', 'spoiler', 'spoiler', '0', '20')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (3, 'fade', '0', '0', 'fade', 'fade', 'fade', 'fade', '0', '30')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (4, 'rainbow', '1', '0', 'rainbow', 'rainbow', 'rainbow', 'rainbow', '1', '40')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (5, 'justify', '1', '0', 'align=justify', 'align', 'justify', 'justify', '0', '50')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (6, 'right', '1', '0', 'align=right', 'align', 'right', 'right', '0', '60')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (7, 'center', '1', '0', 'align=center', 'align', 'center', 'center', '0', '70')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (8, 'left', '1', '0', 'align=left', 'align', 'left', 'left', '1', '80')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (9, 'link', '1', '0', 'link=', 'link', 'link', 'alink', '0', '90')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (10, 'target', '1', '0', 'target=', 'target', 'target', 'atarget', '1', '100')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (11, 'marqd', '1', '0', 'marq=down', 'marq', 'marqd', 'marqd', '0', '110')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (12, 'marqu', '1', '0', 'marq=up', 'marq', 'marqu', 'marqu', '0', '120')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (13, 'marql', '1', '0', 'marq=left', 'marq', 'marql', 'marql', '0', '130')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (14, 'marqr', '1', '0', 'marq=right', 'marq', 'marqr', 'marqr', '1', '140')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (15, 'email', '1', '0', 'email', 'email', 'email', 'email', '0', '150')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (16, 'flash', '1', '0', 'flash width=250 height=250', 'flash', 'flash', 'flash', '0', '160')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (17, 'video', '1', '0', 'video width=400 height=350', 'video', 'video', 'video', '0', '170')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (18, 'stream', '1', '0', 'stream', 'stream', 'stream', 'stream', '0', '180')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (19, 'real', '1', '0', 'ram width=220 height=140', 'ram', 'real', 'real', '0', '190')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (20, 'quick', '1', '0', 'quick width=480 height=224', 'quick', 'quick', 'quick', '1', '200')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (21, 'sup', '1', '0', 'sup', 'sup', 'sup', 'sup', '0', '210')";
$sql[] = "INSERT INTO " . $table_prefix . "bbc_box VALUES (22, 'sub', '1', '0', 'sub', 'sub', 'sub', 'sub', '1', '220')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bbc_box_on', '1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bbc_advanced', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bbc_per_row', '14')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bbc_time_regen', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bbc_style_path', 'default')";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_birthday varchar(10) DEFAULT '' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_zodiac TINYINT(2) NOT NULL DEFAULT 0 AFTER user_birthday";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD INDEX user_birthday (user_birthday)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_show',1)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_require',0)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_lock',0)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_lookahead',7)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_min',5)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_max',100)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_zodiac',0)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name,config_value) VALUES ('bday_wishes',1)";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_browser varchar(100) DEFAULT '' NOT NULL";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('browsers_path', 'images/browsers/')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('forum_corbeille', '0')";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD forum_icon VARCHAR( 255 ) default NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD forum_link VARCHAR(255) NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD forum_link_count INT(11) NOT NULL DEFAULT '1'";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD forum_link_date INT(11) NOT NULL DEFAULT '0'";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_gender TINYINT NOT NULL DEFAULT '0'";
$sql[] = "ALTER TABLE " . $table_prefix . "themes ADD online_color varchar(6) DEFAULT '008500' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "themes ADD offline_color varchar(6) DEFAULT 'DF0000' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "themes ADD hidden_color varchar(6) DEFAULT 'EBD400' NOT NULL";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('online_time', '60')";
$sql[] = "ALTER TABLE " . $table_prefix . "posts_text ADD post_description VARCHAR(100) NULL AFTER post_subject";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_description VARCHAR(150) NOT NULL AFTER topic_title";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD attached_forum_id MEDIUMINT(8) DEFAULT '-1' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD INDEX topic_last_post_id(topic_last_post_id)";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('users_qp_settings', '1-0-1-1-1-1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('anons_qp_settings', '1-0-1-1-1-1')";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD forum_qpes tinyint(1) DEFAULT '1' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_qp_settings varchar(25) DEFAULT '0' NOT NULL";
$sql[] = "UPDATE " . $table_prefix . "users SET user_qp_settings = '1-0-1-1-1-1' WHERE user_qp_settings = '0'";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('reason', 'Désolé, mais ce forum est actuellement indisponible. Veuillez réessayer ultérieurement.')";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_skype VARCHAR( 255 ) AFTER user_msnm";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('visit_counter', '1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('today_day_selected', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('upload_dir','files')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('upload_img','images/icon_clip.gif')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('topic_icon','images/icon_clip.gif')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('display_order','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('max_filesize','262144')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('attachment_quota','52428800')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('max_filesize_pm','262144')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('max_attachments','3')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('max_attachments_pm','1')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('disable_mod','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('allow_pm_attach','1')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('attachment_topic_review','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('allow_ftp_upload','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('show_apcp','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('attach_version','2.4.3')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('default_upload_quota', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('default_pm_quota', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('ftp_server','')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('ftp_path','')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('download_path','')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('ftp_user','')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('ftp_pass','')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('ftp_pasv_mode','1')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_display_inlined','1')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_max_width','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_max_height','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_link_width','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_link_height','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_create_thumbnail','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_min_thumb_filesize','12000')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('img_imagick', '')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('use_gd2','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('wma_autoplay','0')";
$sql[] = "INSERT INTO " . $table_prefix . "attachments_config (config_name, config_value) VALUES ('flash_autoplay','0')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (1,'php')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (2,'php3')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (3,'php4')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (4,'phtml')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (5,'pl')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (6,'asp')";
$sql[] = "INSERT INTO " . $table_prefix . "forbidden_extensions (ext_id, extension) VALUES (7,'cgi')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (1,'Images',1,1,1,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (2,'Archives',0,1,1,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (3,'Plain Text',0,0,1,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (4,'Documents',0,0,1,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (5,'Real Media',0,0,2,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (6,'Streams',2,0,1,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (7,'Flash Files',3,0,1,'',0,'')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (1, 1,'gif', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (2, 1,'png', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (3, 1,'jpeg', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (4, 1,'jpg', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (5, 1,'tif', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (6, 1,'tga', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (7, 2,'gtar', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (8, 2,'gz', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (9, 2,'tar', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (10, 2,'zip', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (11, 2,'rar', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (12, 2,'ace', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (13, 3,'txt', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (14, 3,'c', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (15, 3,'h', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (16, 3,'cpp', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (17, 3,'hpp', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (18, 3,'diz', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (19, 4,'xls', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (20, 4,'doc', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (21, 4,'dot', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (22, 4,'pdf', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (23, 4,'ai', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (24, 4,'ps', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (25, 4,'ppt', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (26, 5,'rm', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (27, 6,'wma', '')";
$sql[] = "INSERT INTO " . $table_prefix . "extensions (ext_id, group_id, extension, comment) VALUES (28, 7,'swf', '')";
$sql[] = "INSERT INTO " . $table_prefix . "quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (1, 'Low', 262144)";
$sql[] = "INSERT INTO " . $table_prefix . "quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (2, 'Medium', 2097152)";
$sql[] = "INSERT INTO " . $table_prefix . "quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (3, 'High', 5242880)";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_flag varchar(100) DEFAULT '' NOT NULL";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('flags_path', 'images/flags/')";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_lastlogin INT (11) DEFAULT '0' NOT NULL";
$sql[] = "UPDATE " . $table_prefix . "users SET user_lastlogin=user_lastvisit WHERE user_lastlogin='0'

INSERT INTO " . $table_prefix . "rcs VALUES (1, 'Administrator', 'CC0000', 0, 1, 10)";
$sql[] = "ALTER TABLE " . $table_prefix . "groups ADD group_color mediumint(8) DEFAULT '0' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_color mediumint(8) DEFAULT '0' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "users ADD user_group_id mediumint(8) DEFAULT '0' NOT NULL";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('cache_rcs', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('rcs_enable', '1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('rcs_group_stats', '1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('rcs_group_admin', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('rcs_group_mod', '0')";
$sql[] = "ALTER TABLE " . $table_prefix . "themes ADD rcs_admincolor varchar(6) DEFAULT '' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "themes ADD rcs_modcolor varchar(6) DEFAULT '' NOT NULL";
$sql[] = "ALTER TABLE " . $table_prefix . "themes ADD rcs_usercolor varchar(6) DEFAULT '' NOT NULL";
$sql[] = "UPDATE " . $table_prefix . "themes SET rcs_admincolor = 'FFA34F'";
$sql[] = "UPDATE " . $table_prefix . "themes SET rcs_modcolor = '006600'";
$sql[] = "UPDATE " . $table_prefix . "themes SET rcs_usercolor = '006699'";
$sql[] = "UPDATE " . $table_prefix . "config SET config_name = 'rcs_level_admin' WHERE config_name = 'rcs_group_admin' LIMIT 1";
$sql[] = "UPDATE " . $table_prefix . "config SET config_name = 'rcs_level_mod' WHERE config_name = 'rcs_group_mod' LIMIT 1";
$sql[] = "UPDATE " . $table_prefix . "config SET config_name = 'rcs_ranks_stats' WHERE config_name = 'rcs_group_stats' LIMIT 1";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('annonce_globale_index', '1')";
$sql[] = "ALTER TABLE " . $table_prefix . "auth_access ADD auth_global_announce TINYINT(1) NOT NULL AFTER auth_announce";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD auth_global_announce TINYINT(2) NOT NULL DEFAULT '5' AFTER auth_announce";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_bbcode','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_guest','0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_guest_view','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_delete','0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_delete_all','0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_edit','0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_edit_all','0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_allow_smilies','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_banned_user_id','')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_banned_user_id_view','')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_date_format','G:i')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_date_on','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_delete_days','30')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_height','170')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_links_names','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_make_links','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_messages_number_on_index', '20')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_on','1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_refresh_time', '120')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_text_lenght','500')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_width','100%')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('shoutbox_word_lenght','90')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('simple_split_topic_type', '1')";
$sql[] = "ALTER TABLE " . $table_prefix . "auth_access ADD auth_bump TINYINT(1) NOT NULL DEFAULT '0'";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bump_type', 'd')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('bump_interval', '1')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('reply_flood_ctrl', '0')";
$sql[] = "ALTER TABLE " . $table_prefix . "forums ADD auth_bump TINYINT(2) NOT NULL DEFAULT '0'";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_last_post_time INTEGER(11) UNSIGNED NOT NULL DEFAULT '0'";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_bumped TINYINT(1) UNSIGNED NOT NULL DEFAULT '0'";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_bumper MEDIUMINT(8) NOT NULL DEFAULT '0'";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('cnil_id', '')";
$sql[] = "INSERT INTO `" . $table_prefix . "config` VALUES ('registration_status', '0')";
$sql[] = "INSERT INTO `" . $table_prefix . "config` VALUES ('registration_closed', '')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('qte_version', '1.6.2a')";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_attribute VARCHAR(25)";
$sql[] = "ALTER TABLE " . $table_prefix . "attributes ADD attribute_type SMALLINT(1) NOT NULL DEFAULT '0' AFTER attribute_id";
$sql[] = "ALTER TABLE " . $table_prefix . "attributes ADD attribute_image VARCHAR(255) NOT NULL DEFAULT '' AFTER attribute";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('presentation_required', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('presentation_forum', '0')";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('images_max_size', '400')";
$sql[] = "ALTER TABLE " . $table_prefix . "topics ADD topic_icon TINYINT(2)";
$sql[] = "ALTER TABLE " . $table_prefix . "posts ADD post_icon TINYINT(2)";
$sql[] = "ALTER TABLE " . $table_prefix . "posts ADD INDEX (post_icon)";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (1, 1, 6, 'PHP')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (2, 1, 2, 'PHP')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (3, 1, 7, 'PHP')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (4, 1, 5, 'PHP')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (5, 1, 0, '')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (6, 1, 3, 'PHP')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (7, 1, 4, 'PHP')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (8, 1, 0, '')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (9, 1, 0, '')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (10, 1, 0, '')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_blocs` VALUES (11, 1, 0, '')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('mod_point_system', '0')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('mod_gender', '0')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('mod_rcs', '0')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_par_defaut', '1')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('mod_profile', '1')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('nbre_topics_recents', '10')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('defiler_topics_recents', '1')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_forums', '1')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_nbre_mots', '500')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_nbre_coms', '20')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_nbre_news', '10')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_aff_icone', '0')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_aff_coms', '1')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_config` VALUES ('news_aff_asv', '1')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_feuille` VALUES (1, 1, 3, 1)";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_modeles` VALUES (1, '<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center" valign="top">\r\n<tr>\r\n      <td width="28%" align="center" valign="top">%s</td>\r\n      <td width="44%" align="center" valign="top"><center>%s</center></td>\r\n      <td width="28%" align="center" valign="top">%s</td>\r\n</tr>\r\n</table>', '3 colonnes, le bloc central est 2 fois plus large que les autres')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_modeles` VALUES (2, '<table width="100%">\r\n   <tr>\r\n      <td class="row1">%s</td>\r\n   </tr>\r\n</table>', 'Bloc 100% de la largeur')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_modeles` VALUES (3, '<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center" valign="top">\r\n<tr>\r\n    <td width="22%" align="center" valign="top">\r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n      </td>\r\n      <td width="56%" align="center" valign="top">%s</td>\r\n      <td width="22%" align="center" valign="top">\r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n       </td>\r\n</tr>\r\n</table>', 'Structure traditionnelle')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (1, 'config', 0, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (2, 'login', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (3, 'news', 1, '3')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (4, 'recent_topics', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (5, 'whoisonline', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (6, 'welcome', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (7, 'statistiques', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_mods` VALUES (8, 'profile', 0, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30')";
$sql[] = "INSERT INTO `" . $table_prefix . "areabb_squelette` VALUES (1, 'Un concentré d''Actualité', NULL, 3,0)";
$sql[] = "INSERT INTO `" . $table_prefix . "config` ( `config_name` , `config_value` ) VALUES ('AreaBB_version', '0.9.1')";
$sql[] = "ALTER TABLE `" . $table_prefix . "sessions` ADD `areabb_tps_depart` INT( 11 ) , ADD `areabb_gid` INT( 11 ) ,ADD `areabb_variable` VARCHAR( 50 )";
$sql[] = "INSERT INTO " . $table_prefix . "config (config_name, config_value) VALUES ('premod_version', '1.2.2')";

for( $i = 0; $i < count($sql); $i++ )
{
	if( !$result = $db->sql_query ($sql[$i]) )
	{
		$error = $db->sql_error();

		echo '<li>' . $sql[$i] . '<br /> +++ <font color="#FF0000"><b>Error:</b></font> ' . $error['message'] . '</li><br />';
	}
	else
	{
		echo '<li>' . $sql[$i] . '<br /> +++ <font color="#00AA00"><b>Successfull</b></font></li><br />';
	}
}


echo '</ul></span></td></tr><tr><td class="catBottom" height="28">&nbsp;</td></tr>';

echo '<tr><th>End</th></tr><tr><td><span class="genmed">Installation is now finished. Please be sure to delete this file now.<br />If you have run into any errors, please visit the <a href="http://www.phpbbsupport.co.uk" target="_phpbbsupport">phpBBSupport.co.uk</a> and ask someone for help.</span></td></tr>';
echo '<tr><td class="catBottom" height="28" align="center"><span class="genmed"><a href="' . append_sid("index.$phpEx") . '">Have a nice day</a></span></td></table>';

include($phpbb_root_path . 'includes/page_tail.'.$phpEx);

?>