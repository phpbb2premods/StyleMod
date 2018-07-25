#
# Basic DB data for phpBB2 devel
#
# $Id: mysql_basic.sql,v 1.29.2.27 2006/05/20 14:01:48 grahamje Exp $

# -- Config
INSERT INTO phpbb_config (config_name, config_value) VALUES ('config_id','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_disable','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sitename','votredomaine.com');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('site_desc','Description de votre forum');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_name','phpbb2mysql');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_path','/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_domain','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cookie_secure','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('session_length','3600');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_html','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_html_tags','b,i,u,pre');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_bbcode','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_smilies','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_sig','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_namechange','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_theme_create','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_local','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_remote','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_avatar_upload','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('override_user_style','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('posts_per_page','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('topics_per_page','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('hot_threshold','25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_poll_options','10');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sig_chars','255');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_inbox_privmsgs','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_sentbox_privmsgs','25');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_savebox_privmsgs','50');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_sig','Cordialement le Staff');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email','votreadresse@votredomaine.com');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('enable_confirm', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('allow_autologin','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_autologin_time','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_delivery','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_host','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_username','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smtp_password','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('sendmail_fix','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('require_activation','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('flood_interval','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_flood_interval','15');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('search_min_chars','3');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('max_login_attempts', '5');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('login_reset_time', '30');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_email_form','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_filesize','6144');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_width','80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_max_height','80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_path','images/avatars');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('avatar_gallery_path','images/avatars/gallery');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('smilies_path','images/smiles');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_style','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('default_dateformat','d M Y à G:i');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('board_timezone','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('prune_enable','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('privmsg_disable','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('gzip_compress','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_fax', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('coppa_mail', '');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('record_online_users', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('record_online_date', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_name', 'www.votredomaine.tld');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('server_port', '80');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('script_path', '/phpBB2/');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('version', '.0.23');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rand_seed', '0');


# -- Categories
INSERT INTO phpbb_categories (cat_id, cat_title, cat_order) VALUES (1, 'Catégorie de tests', 10);


# -- Forums
INSERT INTO phpbb_forums (forum_id, forum_name, forum_desc, cat_id, forum_order, forum_posts, forum_topics, forum_last_post_id, auth_view, auth_read, auth_post, auth_reply, auth_edit, auth_delete, auth_announce, auth_sticky, auth_pollcreate, auth_vote, auth_attachments) VALUES (1, 'Forum de tests 1', 'Ceci est juste un forum de tests.', 1, 10, 1, 1, 1, 0, 0, 1, 1, 1, 1, 3, 3, 1, 1, 3);


# -- Users
INSERT INTO phpbb_users (user_id, username, user_level, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_viewemail, user_style, user_aim, user_yim, user_msnm, user_posts, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_pm, user_notify_pm, user_allow_viewonline, user_rank, user_avatar, user_lang, user_timezone, user_dateformat, user_actkey, user_newpasswd, user_notify, user_active) VALUES ( -1, 'Anonymous', 0, 0, '', '', '', '', '', '', '', '', 0, NULL, '', '', '', 0, 0, 1, 1, 1, 0, 1, 1, NULL, '', '', 0, '', '', '', 0, 0);

# -- username: admin    password: admin (change this or remove it once everything is working!)
INSERT INTO phpbb_users (user_id, username, user_level, user_regdate, user_password, user_email, user_icq, user_website, user_occ, user_from, user_interests, user_sig, user_viewemail, user_style, user_aim, user_yim, user_msnm, user_posts, user_attachsig, user_allowsmile, user_allowhtml, user_allowbbcode, user_allow_pm, user_notify_pm, user_popup_pm, user_allow_viewonline, user_rank, user_avatar, user_lang, user_timezone, user_dateformat, user_actkey, user_newpasswd, user_notify, user_active) VALUES ( 2, 'Admin', 1, 0, '21232f297a57a5a743894a0e4a801fc3', 'admin@votredomaine.com', '', '', '', '', '', '', 1, 1, '', '', '', 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, '', 'french', 0, 'd M Y à G:i', '', '', 0, 1);


# -- Ranks
INSERT INTO phpbb_ranks (rank_id, rank_title, rank_min, rank_special, rank_image) VALUES ( 1, 'Administrateur', -1, 1, NULL);


# -- Groups
INSERT INTO phpbb_groups (group_id, group_name, group_description, group_single_user) VALUES (1, 'Anonymous', 'Personal User', 1);
INSERT INTO phpbb_groups (group_id, group_name, group_description, group_single_user) VALUES (2, 'Admin', 'Personal User', 1);


# -- User -> Group
INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES (1, -1, 0);
INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES (2, 2, 0);


# -- Demo Topic
INSERT INTO phpbb_topics (topic_id, topic_title, topic_poster, topic_time, topic_views, topic_replies, forum_id, topic_status, topic_type, topic_vote, topic_first_post_id, topic_last_post_id) VALUES (1, 'Bienvenue sur phpBB 2', 2, '972086460', 0, 0, 1, 0, 0, 0, 1, 1);


# -- Demo Post
INSERT INTO phpbb_posts (post_id, topic_id, forum_id, poster_id, post_time, post_username, poster_ip) VALUES (1, 1, 1, 2, 972086460, NULL, '7F000001');
INSERT INTO phpbb_posts_text (post_id, post_subject, post_text) VALUES (1, NULL, 'Ceci est un exemple de message (post) dû à votre installation de la PreMOD StyleMOD.  Vous pouvez supprimer ce message (post), ce sujet (topic) et même ce forum si vous le souhaitez, puisque tout semble fonctionner !');


# -- Themes
INSERT INTO phpbb_themes (themes_id, template_name, style_name, head_stylesheet, body_background, body_bgcolor, body_text, body_link, body_vlink, body_alink, body_hlink, tr_color1, tr_color2, tr_color3, tr_class1, tr_class2, tr_class3, th_color1, th_color2, th_color3, th_class1, th_class2, th_class3, td_color1, td_color2, td_color3, td_class1, td_class2, td_class3, fontface1, fontface2, fontface3, fontsize1, fontsize2, fontsize3, fontcolor1, fontcolor2, fontcolor3, span_class1, span_class2, span_class3, img_size_poll, img_size_privmsg) VALUES (1, 'pussycatblue', 'pussycatblue', 'pussycatblue.css', '', 'ECF0F6', '000000', '006699', '5493B4', '', '1994D1', 'E7E9F8', 'CACEF5', 'BDC2EC', '', '', '', '', '', '', '', '', '', '', '', '', 'row1', 'row2', '', '', '', '', 10, 11, 12, '444444', '006600', 'CC0000', '', '', '', 0, 0);
INSERT INTO phpbb_themes (themes_id, template_name, style_name, head_stylesheet, body_background, body_bgcolor, body_text, body_link, body_vlink, body_alink, body_hlink, tr_color1, tr_color2, tr_color3, tr_class1, tr_class2, tr_class3, th_color1, th_color2, th_color3, th_class1, th_class2, th_class3, td_color1, td_color2, td_color3, td_class1, td_class2, td_class3, fontface1, fontface2, fontface3, fontsize1, fontsize2, fontsize3, fontcolor1, fontcolor2, fontcolor3, span_class1, span_class2, span_class3, img_size_poll, img_size_privmsg) VALUES (2, 'subSilverPlus', 'subSilverPlus', 'subSilverPlus.css', '', 'E5E5E5', '000000', '006699', '5493B4', '', 'DD6900', 'EFEFEF', 'DEE3E7', 'D1D7DC', '', '', '', '98AAB1', '006699', 'FFFFFF', 'cellpic1.gif', 'cellpic3.gif', 'cellpic2.jpg', 'FAFAFA', 'FFFFFF', '', 'row1', 'row2', '', 'Verdana, Arial, Helvetica, sans-serif', 'Trebuchet MS', 'Courier, ''Courier New'', sans-serif', 10, 11, 12, '444444', '006600', 'FFA34F', '', '', '', 0, 0);

INSERT INTO phpbb_themes_name (themes_id, tr_color1_name, tr_color2_name, tr_color3_name, tr_class1_name, tr_class2_name, tr_class3_name, th_color1_name, th_color2_name, th_color3_name, th_class1_name, th_class2_name, th_class3_name, td_color1_name, td_color2_name, td_color3_name, td_class1_name, td_class2_name, td_class3_name, fontface1_name, fontface2_name, fontface3_name, fontsize1_name, fontsize2_name, fontsize3_name, fontcolor1_name, fontcolor2_name, fontcolor3_name, span_class1_name, span_class2_name, span_class3_name) VALUES (1, 'Couleur de la rangée la plus claire', 'Couleur de la rangée moyenne', 'Couleur de la rangée la plus foncée', '', '', '', 'Bordure entourant la page toute entière', 'Bordure externe à la table', 'Bordure interne à la table', 'Image argentée dégradée', 'Image bleutée dégradée', 'Image fondue dégradée', 'Arrière plan du cadre de citation', 'Toutes les zones blanches', '', 'Arrière plan des messages des sujets', '2nd arrière plan des messages des sujets', '', 'Police principale', 'Police additionnelle des titres des sujets', 'Polices de forme', 'Plus petite taille de police', 'Taille de police moyenne', 'Taille de police normale (corps du messages etc...)', 'Texte de citation et du copyright', 'Couleur du texte de code', 'Couleur principale des textes des en-têtes de table', '', '', '');


# -- Smilies
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 1, ':D', 'icon_biggrin.gif', 'Très heureux');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 2, ':-D', 'icon_biggrin.gif', 'Très heureux');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 3, ':grin:', 'icon_biggrin.gif', 'Très heureux');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 4, ':)', 'icon_smile.gif', 'Sourire');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 5, ':-)', 'icon_smile.gif', 'Sourire');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 6, ':smile:', 'icon_smile.gif', 'Sourire');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 7, ':(', 'icon_sad.gif', 'Triste');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 8, ':-(', 'icon_sad.gif', 'Triste');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 9, ':sad:', 'icon_sad.gif', 'Triste');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 10, ':o', 'icon_surprised.gif', 'Surpris');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 11, ':-o', 'icon_surprised.gif', 'Surpris');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 12, ':eek:', 'icon_surprised.gif', 'Surpris');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 13, ':shock:', 'icon_eek.gif', 'Choqué');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 14, ':?', 'icon_confused.gif', 'Confus');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 15, ':-?', 'icon_confused.gif', 'Confus');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 16, ':???:', 'icon_confused.gif', 'Confus');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 17, '8)', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 18, '8-)', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 19, ':cool:', 'icon_cool.gif', 'Cool');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 20, ':lol:', 'icon_lol.gif', 'Rigole');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 21, ':x', 'icon_mad.gif', 'En colère');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 22, ':-x', 'icon_mad.gif', 'En colère');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 23, ':mad:', 'icon_mad.gif', 'En colère');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 24, ':P', 'icon_razz.gif', 'Moqueur');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 25, ':-P', 'icon_razz.gif', 'Moqueur');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 26, ':razz:', 'icon_razz.gif', 'Moqueur');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 27, ':oops:', 'icon_redface.gif', 'Embarassé');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 28, ':cry:', 'icon_cry.gif', 'Pleure ou Très triste');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 29, ':evil:', 'icon_evil.gif', 'Démon ou Très en colère');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 30, ':twisted:', 'icon_twisted.gif', 'Démoniaque');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 31, ':roll:', 'icon_rolleyes.gif', 'Roulement des yeux');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 32, ':wink:', 'icon_wink.gif', 'Clin d"oeil');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 33, ';)', 'icon_wink.gif', 'Clin d"oeil');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 34, ';-)', 'icon_wink.gif', 'Clin d"oeil');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 35, ':!:', 'icon_exclaim.gif', 'Exclamation');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 36, ':?:', 'icon_question.gif', 'Question');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 37, ':idea:', 'icon_idea.gif', 'Idée');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 38, ':arrow:', 'icon_arrow.gif', 'Flêche');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 39, ':|', 'icon_neutral.gif', 'Neutre');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 40, ':-|', 'icon_neutral.gif', 'Neutre');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 41, ':neutral:', 'icon_neutral.gif', 'Neutre');
INSERT INTO phpbb_smilies (smilies_id, code, smile_url, emoticon) VALUES ( 42, ':mrgreen:', 'icon_mrgreen.gif', 'Mr. Green');


# -- wordlist
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 1, 'example', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 2, 'message', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 3, 'phpbb', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 4, 'installation', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 5, 'suppression', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 6, 'sujet', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 7, 'forum', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 8, 'depuis', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 9, 'tout', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 10, 'semble', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 11, 'au travail', 0 );
INSERT INTO phpbb_search_wordlist (word_id, word_text, word_common) VALUES ( 12, 'bienvenue', 0 );


# -- wordmatch
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 1, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 2, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 3, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 4, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 5, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 6, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 7, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 8, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 9, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 10, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 11, 1, 0 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 12, 1, 1 );
INSERT INTO phpbb_search_wordmatch (word_id, post_id, title_match) VALUES ( 3, 1, 1 );



# -- PREMOD


# -- -- -- Absent User Avatar
ALTER TABLE phpbb_users ADD user_absent tinyint(1) NULL DEFAULT 0;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('absent_avatar', 'images/absent_user_avatar.gif');

# -- -- -- Bbc box
INSERT INTO phpbb_bbc_box VALUES (1, 'strike', '1', '0', 's', 's', 'strike', 'strike', '0', '10');
INSERT INTO phpbb_bbc_box VALUES (2, 'spoiler', '1', '0', 'spoil', 'spoil', 'spoiler', 'spoiler', '0', '20');
INSERT INTO phpbb_bbc_box VALUES (3, 'fade', '0', '0', 'fade', 'fade', 'fade', 'fade', '0', '30');
INSERT INTO phpbb_bbc_box VALUES (4, 'rainbow', '1', '0', 'rainbow', 'rainbow', 'rainbow', 'rainbow', '1', '40');
INSERT INTO phpbb_bbc_box VALUES (5, 'justify', '1', '0', 'align=justify', 'align', 'justify', 'justify', '0', '50');
INSERT INTO phpbb_bbc_box VALUES (6, 'right', '1', '0', 'align=right', 'align', 'right', 'right', '0', '60');
INSERT INTO phpbb_bbc_box VALUES (7, 'center', '1', '0', 'align=center', 'align', 'center', 'center', '0', '70');
INSERT INTO phpbb_bbc_box VALUES (8, 'left', '1', '0', 'align=left', 'align', 'left', 'left', '1', '80');
INSERT INTO phpbb_bbc_box VALUES (9, 'link', '1', '0', 'link=', 'link', 'link', 'alink', '0', '90');
INSERT INTO phpbb_bbc_box VALUES (10, 'target', '1', '0', 'target=', 'target', 'target', 'atarget', '1', '100');
INSERT INTO phpbb_bbc_box VALUES (11, 'marqd', '1', '0', 'marq=down', 'marq', 'marqd', 'marqd', '0', '110');
INSERT INTO phpbb_bbc_box VALUES (12, 'marqu', '1', '0', 'marq=up', 'marq', 'marqu', 'marqu', '0', '120');
INSERT INTO phpbb_bbc_box VALUES (13, 'marql', '1', '0', 'marq=left', 'marq', 'marql', 'marql', '0', '130');
INSERT INTO phpbb_bbc_box VALUES (14, 'marqr', '1', '0', 'marq=right', 'marq', 'marqr', 'marqr', '1', '140');
INSERT INTO phpbb_bbc_box VALUES (15, 'email', '1', '0', 'email', 'email', 'email', 'email', '0', '150');
INSERT INTO phpbb_bbc_box VALUES (16, 'flash', '1', '0', 'flash width=250 height=250', 'flash', 'flash', 'flash', '0', '160');
INSERT INTO phpbb_bbc_box VALUES (17, 'video', '1', '0', 'video width=400 height=350', 'video', 'video', 'video', '0', '170');
INSERT INTO phpbb_bbc_box VALUES (18, 'stream', '1', '0', 'stream', 'stream', 'stream', 'stream', '0', '180');
INSERT INTO phpbb_bbc_box VALUES (19, 'real', '1', '0', 'ram width=220 height=140', 'ram', 'real', 'real', '0', '190');
INSERT INTO phpbb_bbc_box VALUES (20, 'quick', '1', '0', 'quick width=480 height=224', 'quick', 'quick', 'quick', '1', '200');
INSERT INTO phpbb_bbc_box VALUES (21, 'sup', '1', '0', 'sup', 'sup', 'sup', 'sup', '0', '210');
INSERT INTO phpbb_bbc_box VALUES (22, 'sub', '1', '0', 'sub', 'sub', 'sub', 'sub', '1', '220');

INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_box_on', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_advanced', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_per_row', '14');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_time_regen', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bbc_style_path', 'default');

# -- -- -- Birthday Event 
ALTER TABLE phpbb_users ADD user_birthday varchar(10) DEFAULT '' NOT NULL;
ALTER TABLE phpbb_users ADD user_zodiac TINYINT(2) NOT NULL DEFAULT 0 AFTER user_birthday;
ALTER TABLE phpbb_users ADD INDEX user_birthday (user_birthday);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_show',1);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_require',0);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_lock',0);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_lookahead',7);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_min',5);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_max',100);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_zodiac',0);
INSERT INTO phpbb_config (config_name,config_value) VALUES ('bday_wishes',1);

# -- -- -- Browsers List
ALTER TABLE phpbb_users ADD user_browser varchar(100) DEFAULT '' NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('browsers_path', 'images/browsers/');

# -- -- -- Corbeille
INSERT INTO phpbb_config (config_name, config_value) VALUES ('forum_corbeille', '0');

# -- -- -- Forum Icon
ALTER TABLE phpbb_forums ADD forum_icon VARCHAR( 255 ) default NULL;

# -- -- -- Forum Link
ALTER TABLE phpbb_forums ADD forum_link VARCHAR(255) NULL;
ALTER TABLE phpbb_forums ADD forum_link_count INT(11) NOT NULL DEFAULT '1';
ALTER TABLE phpbb_forums ADD forum_link_date INT(11) NOT NULL DEFAULT '0';

# -- -- -- Gender
ALTER TABLE phpbb_users ADD user_gender TINYINT NOT NULL DEFAULT '0';

# -- -- -- Online-Offline-Hidden
ALTER TABLE phpbb_themes ADD online_color varchar(6) DEFAULT '008500' NOT NULL;
ALTER TABLE phpbb_themes ADD offline_color varchar(6) DEFAULT 'DF0000' NOT NULL;
ALTER TABLE phpbb_themes ADD hidden_color varchar(6) DEFAULT 'EBD400' NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('online_time', '60');

# -- -- -- Post Description
ALTER TABLE phpbb_posts_text ADD post_description VARCHAR(100) NULL AFTER post_subject;
ALTER TABLE phpbb_topics ADD topic_description VARCHAR(150) NOT NULL AFTER topic_title;

# -- -- -- Pseudo sub-forums
ALTER TABLE phpbb_forums ADD attached_forum_id MEDIUMINT(8) DEFAULT '-1' NOT NULL;
ALTER TABLE phpbb_topics ADD INDEX topic_last_post_id(topic_last_post_id);

# -- -- -- Quick Post ES
INSERT INTO phpbb_config (config_name, config_value) VALUES ('users_qp_settings', '1-0-1-1-1-1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('anons_qp_settings', '1-0-1-1-1-1');
ALTER TABLE phpbb_forums ADD forum_qpes tinyint(1) DEFAULT '1' NOT NULL;
ALTER TABLE phpbb_users ADD user_qp_settings varchar(25) DEFAULT '0' NOT NULL;
UPDATE phpbb_users SET user_qp_settings = '1-0-1-1-1-1' WHERE user_qp_settings = '0';

# -- -- -- Reason
INSERT INTO phpbb_config (config_name, config_value) VALUES ('reason', 'Désolé, mais ce forum est actuellement indisponible. Veuillez réessayer ultérieurement.');

# -- -- -- Skype
ALTER TABLE phpbb_users ADD user_skype VARCHAR( 255 ) AFTER user_msnm;

# -- -- -- Text Visit Counter
INSERT INTO phpbb_config (config_name, config_value) VALUES ('visit_counter', '1');

# -- -- -- Today Userlist
INSERT INTO phpbb_config (config_name, config_value) VALUES ('today_day_selected', '0');

# -- -- -- Attachment
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('upload_dir','files');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('upload_img','images/icon_clip.gif');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('topic_icon','images/icon_clip.gif');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('display_order','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_filesize','262144');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attachment_quota','52428800');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_filesize_pm','262144');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_attachments','3');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('max_attachments_pm','1');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('disable_mod','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('allow_pm_attach','1');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attachment_topic_review','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('allow_ftp_upload','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('show_apcp','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('attach_version','2.4.3');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('default_upload_quota', '0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('default_pm_quota', '0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_server','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_path','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('download_path','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_user','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_pass','');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('ftp_pasv_mode','1');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_display_inlined','1');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_max_width','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_max_height','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_link_width','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_link_height','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_create_thumbnail','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_min_thumb_filesize','12000');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('img_imagick', '');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('use_gd2','0');

INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('wma_autoplay','0');
INSERT INTO phpbb_attachments_config (config_name, config_value) VALUES ('flash_autoplay','0');

INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (1,'php');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (2,'php3');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (3,'php4');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (4,'phtml');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (5,'pl');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (6,'asp');
INSERT INTO phpbb_forbidden_extensions (ext_id, extension) VALUES (7,'cgi');

INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (1,'Images',1,1,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (2,'Archives',0,1,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (3,'Plain Text',0,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (4,'Documents',0,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (5,'Real Media',0,0,2,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (6,'Streams',2,0,1,'',0,'');
INSERT INTO phpbb_extension_groups (group_id, group_name, cat_id, allow_group, download_mode, upload_icon, max_filesize, forum_permissions) VALUES (7,'Flash Files',3,0,1,'',0,'');

INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (1, 1,'gif', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (2, 1,'png', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (3, 1,'jpeg', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (4, 1,'jpg', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (5, 1,'tif', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (6, 1,'tga', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (7, 2,'gtar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (8, 2,'gz', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (9, 2,'tar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (10, 2,'zip', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (11, 2,'rar', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (12, 2,'ace', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (13, 3,'txt', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (14, 3,'c', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (15, 3,'h', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (16, 3,'cpp', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (17, 3,'hpp', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (18, 3,'diz', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (19, 4,'xls', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (20, 4,'doc', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (21, 4,'dot', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (22, 4,'pdf', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (23, 4,'ai', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (24, 4,'ps', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (25, 4,'ppt', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (26, 5,'rm', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (27, 6,'wma', '');
INSERT INTO phpbb_extensions (ext_id, group_id, extension, comment) VALUES (28, 7,'swf', '');

INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (1, 'Low', 262144);
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (2, 'Medium', 2097152);
INSERT INTO phpbb_quota_limits (quota_limit_id, quota_desc, quota_limit) VALUES (3, 'High', 5242880);

# -- -- -- Flag
ALTER TABLE phpbb_users ADD user_flag varchar(100) DEFAULT '' NOT NULL;
INSERT INTO phpbb_config (config_name, config_value) VALUES ('flags_path', 'images/flags/');

# -- -- -- Mini Last Visit
ALTER TABLE phpbb_users ADD user_lastlogin INT (11) DEFAULT '0' NOT NULL;
UPDATE phpbb_users SET user_lastlogin=user_lastvisit WHERE user_lastlogin='0';

# -- -- -- Rank Color System
INSERT INTO phpbb_rcs VALUES (1, 'Administrator', 'CC0000', 0, 1, 10);

ALTER TABLE phpbb_groups ADD group_color mediumint(8) DEFAULT '0' NOT NULL;

ALTER TABLE phpbb_users ADD user_color mediumint(8) DEFAULT '0' NOT NULL;
ALTER TABLE phpbb_users ADD user_group_id mediumint(8) DEFAULT '0' NOT NULL;

INSERT INTO phpbb_config (config_name, config_value) VALUES ('cache_rcs', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_enable', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_group_stats', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_group_admin', '0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('rcs_group_mod', '0');

ALTER TABLE phpbb_themes ADD rcs_admincolor varchar(6) DEFAULT '' NOT NULL;
ALTER TABLE phpbb_themes ADD rcs_modcolor varchar(6) DEFAULT '' NOT NULL;
ALTER TABLE phpbb_themes ADD rcs_usercolor varchar(6) DEFAULT '' NOT NULL;
UPDATE phpbb_themes SET rcs_admincolor = 'FFA34F';
UPDATE phpbb_themes SET rcs_modcolor = '006600';
UPDATE phpbb_themes SET rcs_usercolor = '006699';

UPDATE phpbb_config SET config_name = 'rcs_level_admin' WHERE config_name = 'rcs_group_admin' LIMIT 1;
UPDATE phpbb_config SET config_name = 'rcs_level_mod' WHERE config_name = 'rcs_group_mod' LIMIT 1;
UPDATE phpbb_config SET config_name = 'rcs_ranks_stats' WHERE config_name = 'rcs_group_stats' LIMIT 1;


# -- -- -- Annonce Globale
INSERT INTO phpbb_config (config_name, config_value) VALUES ('annonce_globale_index', '1');
ALTER TABLE phpbb_auth_access ADD auth_global_announce TINYINT(1) NOT NULL AFTER auth_announce;
ALTER TABLE phpbb_forums ADD auth_global_announce TINYINT(2) NOT NULL DEFAULT '5' AFTER auth_announce;

# -- -- -- MiniChat
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_bbcode','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_guest','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_guest_view','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_delete','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_delete_all','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_edit','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_edit_all','0');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_allow_smilies','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_banned_user_id','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_banned_user_id_view','');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_date_format','G:i');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_date_on','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_delete_days','30');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_height','170');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_links_names','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_make_links','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_messages_number_on_index', '20');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_on','1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_refresh_time', '120');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_text_lenght','500');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_width','100%');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('shoutbox_word_lenght','90');

# -- -- -- Simple Split Topic Type
INSERT INTO phpbb_config (config_name, config_value) VALUES ('simple_split_topic_type', '1');

# -- -- -- Bump Topic
ALTER TABLE phpbb_auth_access ADD auth_bump TINYINT(1) NOT NULL DEFAULT '0';
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bump_type', 'd');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('bump_interval', '1');
INSERT INTO phpbb_config (config_name, config_value) VALUES ('reply_flood_ctrl', '0');
ALTER TABLE phpbb_forums ADD auth_bump TINYINT(2) NOT NULL DEFAULT '0';
ALTER TABLE phpbb_topics ADD topic_last_post_time INTEGER(11) UNSIGNED NOT NULL DEFAULT '0';
ALTER TABLE phpbb_topics ADD topic_bumped TINYINT(1) UNSIGNED NOT NULL DEFAULT '0';
ALTER TABLE phpbb_topics ADD topic_bumper MEDIUMINT(8) NOT NULL DEFAULT '0';

# -- -- -- CNIL Website ID
INSERT INTO phpbb_config (config_name, config_value) VALUES ('cnil_id', '');

# -- -- -- Disable Registration
INSERT INTO `phpbb_config` VALUES ('registration_status', '0');
INSERT INTO `phpbb_config` VALUES ('registration_closed', '');

# -- -- -- Quick Title Edition
INSERT INTO phpbb_config (config_name, config_value) VALUES ('qte_version', '1.6.2a');
ALTER TABLE phpbb_topics ADD topic_attribute VARCHAR(25);

ALTER TABLE phpbb_attributes ADD attribute_type SMALLINT(1) NOT NULL DEFAULT '0' AFTER attribute_id;
ALTER TABLE phpbb_attributes ADD attribute_image VARCHAR(255) NOT NULL DEFAULT '' AFTER attribute;

# -- -- -- Presentation Required
INSERT INTO phpbb_config (config_name, config_value) VALUES ('presentation_required', '0'); 
INSERT INTO phpbb_config (config_name, config_value) VALUES ('presentation_forum', '0');

# -- -- -- Resize Image Posted
INSERT INTO phpbb_config (config_name, config_value) VALUES ('images_max_size', '400');

# -- -- -- Post Icons
ALTER TABLE phpbb_topics ADD topic_icon TINYINT(2);
ALTER TABLE phpbb_posts ADD post_icon TINYINT(2);
ALTER TABLE phpbb_posts ADD INDEX (post_icon);

## -- AreaBB
INSERT INTO `phpbb_areabb_blocs` VALUES (1, 1, 6, 'PHP');
INSERT INTO `phpbb_areabb_blocs` VALUES (2, 1, 2, 'PHP');
INSERT INTO `phpbb_areabb_blocs` VALUES (3, 1, 7, 'PHP');
INSERT INTO `phpbb_areabb_blocs` VALUES (4, 1, 5, 'PHP');
INSERT INTO `phpbb_areabb_blocs` VALUES (5, 1, 0, '');
INSERT INTO `phpbb_areabb_blocs` VALUES (6, 1, 3, 'PHP');
INSERT INTO `phpbb_areabb_blocs` VALUES (7, 1, 4, 'PHP');
INSERT INTO `phpbb_areabb_blocs` VALUES (8, 1, 0, '');
INSERT INTO `phpbb_areabb_blocs` VALUES (9, 1, 0, '');
INSERT INTO `phpbb_areabb_blocs` VALUES (10, 1, 0, '');
INSERT INTO `phpbb_areabb_blocs` VALUES (11, 1, 0, '');
INSERT INTO `phpbb_areabb_config` VALUES ('mod_point_system', '0');
INSERT INTO `phpbb_areabb_config` VALUES ('mod_gender', '0');
INSERT INTO `phpbb_areabb_config` VALUES ('mod_rcs', '0');
INSERT INTO `phpbb_areabb_config` VALUES ('news_par_defaut', '1');
INSERT INTO `phpbb_areabb_config` VALUES ('mod_profile', '1');
INSERT INTO `phpbb_areabb_config` VALUES ('nbre_topics_recents', '10');
INSERT INTO `phpbb_areabb_config` VALUES ('defiler_topics_recents', '1');
INSERT INTO `phpbb_areabb_config` VALUES ('news_forums', '1');
INSERT INTO `phpbb_areabb_config` VALUES ('news_nbre_mots', '500');
INSERT INTO `phpbb_areabb_config` VALUES ('news_nbre_coms', '20');
INSERT INTO `phpbb_areabb_config` VALUES ('news_nbre_news', '10');
INSERT INTO `phpbb_areabb_config` VALUES ('news_aff_icone', '0');
INSERT INTO `phpbb_areabb_config` VALUES ('news_aff_coms', '1');
INSERT INTO `phpbb_areabb_config` VALUES ('news_aff_asv', '1');
INSERT INTO `phpbb_areabb_feuille` VALUES (1, 1, 3, 1);
INSERT INTO `phpbb_areabb_modeles` VALUES (1, '<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center" valign="top">\r\n<tr>\r\n      <td width="28%" align="center" valign="top">%s</td>\r\n      <td width="44%" align="center" valign="top"><center>%s</center></td>\r\n      <td width="28%" align="center" valign="top">%s</td>\r\n</tr>\r\n</table>', '3 colonnes, le bloc central est 2 fois plus large que les autres');
INSERT INTO `phpbb_areabb_modeles` VALUES (2, '<table width="100%">\r\n   <tr>\r\n      <td class="row1">%s</td>\r\n   </tr>\r\n</table>', 'Bloc 100% de la largeur');
INSERT INTO `phpbb_areabb_modeles` VALUES (3, '<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center" valign="top">\r\n<tr>\r\n    <td width="22%" align="center" valign="top">\r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n      </td>\r\n      <td width="56%" align="center" valign="top">%s</td>\r\n      <td width="22%" align="center" valign="top">\r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n         %s \r\n       </td>\r\n</tr>\r\n</table>', 'Structure traditionnelle');
INSERT INTO `phpbb_areabb_mods` VALUES (1, 'config', 0, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_mods` VALUES (2, 'login', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_mods` VALUES (3, 'news', 1, '3');
INSERT INTO `phpbb_areabb_mods` VALUES (4, 'recent_topics', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_mods` VALUES (5, 'whoisonline', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_mods` VALUES (6, 'welcome', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_mods` VALUES (7, 'statistiques', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_mods` VALUES (8, 'profile', 0, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30');
INSERT INTO `phpbb_areabb_squelette` VALUES (1, 'Un concentré d''Actualité', NULL, 3,0);
INSERT INTO `phpbb_config` ( `config_name` , `config_value` ) VALUES ('AreaBB_version', '0.9.1');
ALTER TABLE `phpbb_sessions` ADD `areabb_tps_depart` INT( 11 ) , ADD `areabb_gid` INT( 11 ) ,ADD `areabb_variable` VARCHAR( 50 ) ;

INSERT INTO phpbb_config (config_name, config_value) VALUES ('premod_version', '1.2.2');