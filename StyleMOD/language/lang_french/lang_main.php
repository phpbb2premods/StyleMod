<?php
/***************************************************************************
 *                            lang_main.php [French]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php 6772 2006-12-16 13:11:28Z acydburn $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/***************************************************************************
 *                         Translation: Informations
 *
 *   Version: 1.0.2
 *   Date: 08/03/2008 16:30:46
 *   Author: Xaphos (Ma�l Soucaze)
 *   Website: http://www.phpbb.fr/
 *
 ***************************************************************************/

//
// CONTRIBUTORS:
//	 Add your details here if wanted, e.g. Name, username, email address, website
// 2002-08-27  Philip M. White        - fixed many grammar problems
//

//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//

$lang['ENCODING'] = 'iso-8859-1';
$lang['DIRECTION'] = 'ltr';
$lang['LEFT'] = 'gauche';
$lang['RIGHT'] = 'droite';
$lang['DATE_FORMAT'] =  'D j M Y'; // This should be changed to the default date format for your language, php date() format


// This is optional, if you would like a _SHORT_ message output
// along with our copyright message indicating you are the translator
// please add it here.
$lang['TRANSLATION_INFO'] = 'Traduction par <a href="http://www.phpbb.fr/" class="copyright">phpBB.fr</a> &copy; 2007, 2008';	// You can delete this line to remove the visible copyright of the translation, but the copyright localised in the files MUST BE preserved, according the General Public License!


// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'Forum';
$lang['Category'] = 'Cat�gorie';
$lang['Topic'] = 'Sujet';
$lang['Topics'] = 'Sujets';
$lang['Replies'] = 'R�ponses';
$lang['Views'] = 'Vus';
$lang['Post'] = 'Message';
$lang['Posts'] = 'Messages';
$lang['Posted'] = 'Publi� le';
$lang['Username'] = 'Nom d�utilisateur';
$lang['Password'] = 'Mot de passe';
$lang['Email'] = 'E-mail';
$lang['Poster'] = 'R�dacteur';
$lang['Author'] = 'Auteur';
$lang['Time'] = 'Temps';
$lang['Hours'] = 'Heures';
$lang['Message'] = 'Message';

$lang['1_Day'] = '1 jour';
$lang['7_Days'] = '7 jours';
$lang['2_Weeks'] = '2 semaines';
$lang['1_Month'] = '1 mois';
$lang['3_Months'] = '3 mois';
$lang['6_Months'] = '6 mois';
$lang['1_Year'] = '1 an';
$lang['Go'] = 'Aller';
$lang['Jump_to'] = 'Sauter vers';

$lang['Submit'] = 'Envoyer';
$lang['Reset'] = 'R�initialiser';
$lang['Cancel'] = 'Annuler';
$lang['Preview'] = 'Aper�u';
$lang['Confirm'] = 'Confirmer';
$lang['Spellcheck'] = 'V�rification orthographique';
$lang['Yes'] = 'Oui';
$lang['No'] = 'Non';
$lang['Enabled'] = 'Activ�';
$lang['Disabled'] = 'D�sactiv�';
$lang['Error'] = 'Erreur';
$lang['Next'] = 'Suivant';
$lang['Previous'] = 'Pr�c�dent';
$lang['Goto_page'] = 'Aller � la page';
$lang['Joined'] = 'Inscrit le';
$lang['IP_Address'] = 'Adresse IP';

$lang['Select_forum'] = 'S�lectionner un forum';
$lang['View_latest_post'] = 'Voir le dernier message';
$lang['View_newest_post'] = 'Voir le message le plus r�cent';
$lang['Page_of'] = 'Page <b>%d</b> sur <b>%d</b>'; // Replaces with: Page 1 of 2 for example

$lang['ICQ'] = 'Num�ro ICQ';
$lang['AIM'] = 'Adresse AIM';
$lang['MSNM'] = 'MSN Messenger';
$lang['YIM'] = 'Yahoo Messenger';

$lang['Forum_Index'] = '%s Index du forum';  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = 'Publier un nouveau sujet';
$lang['Reply_to_topic'] = 'R�pondre au sujet';
$lang['Reply_with_quote'] = 'R�pondre en citant';

$lang['Click_return_topic'] = 'Cliquez %sici%s afin de retourner au sujet'; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = 'Cliquez %sici%s afin de recommencer';
$lang['Click_return_forum'] = 'Cliquez %sici%s afin de retourner au forum';
$lang['Click_view_message'] = 'Cliquez %sici%s afin de voir le message que vous avez publi�';
$lang['Click_return_modcp'] = 'Cliquez %sici%s afin de retourner au panneau de contr�le du mod�rateur';
$lang['Click_return_group'] = 'Cliquez %sici%s afin de retourner aux informations du groupe';

$lang['Admin_panel'] = 'Aller au panneau de contr�le de l�administrateur';

$lang['Board_disable'] = 'D�sol� mais ce forum est actuellement indisponible, veuillez r�essayer ult�rieurement.';

// BEGIN Disable Registration MOD
$lang['registration_status'] = 'D�sol�, mais les inscriptions � ce forum sont actuellement ferm�es. Veuillez r�essayer ult�rieurement.';
// END Disable Registration MOD 

//
// Global Header strings
//
$lang['Registered_users'] = 'Utilisateurs connect�s :';
$lang['Browsing_forum'] = 'Utilisateurs parcourant actuellement ce forum :';
$lang['Online_users_zero_total'] = 'Il n\'y a <b>aucun</b> utilisateur en ligne : ';
$lang['Online_users_total'] = 'Il y a <b>%d</b> utilisateurs en ligne : ';
$lang['Online_user_total'] = 'Il y a <b>%d</b> utilisateur en ligne : ';
$lang['Reg_users_zero_total'] = '0 Enregistr�, ';
$lang['Reg_users_total'] = '%d Enregistr�s, ';
$lang['Reg_user_total'] = '%d Enregistr�, ';
$lang['Hidden_users_zero_total'] = '0 Invisible et ';
$lang['Hidden_user_total'] = '%d Invisible et ';
$lang['Hidden_users_total'] = '%d Invisibles et ';
$lang['Guest_users_zero_total'] = '0 Invit�';
$lang['Guest_users_total'] = '%d Invit�s';
$lang['Guest_user_total'] = '%d Invit�';
$lang['Record_online_users'] = 'Le plus grand nombre d\'utilisateurs en ligne est de <b>%s</b> le %s'; // first %s = number of users, second %s is the date.
$lang['Legend'] = 'L�gende ';
$lang['Admin_online_color'] = '%sAdministrateur%s';
$lang['Mod_online_color'] = '%sMod�rateur%s';
$lang['User_online_color'] = '%sUtilisateur%s';
$lang['You_last_visit'] = 'Votre derni�re visite : %s'; // %s replaced by date/time
$lang['Current_time'] = 'Page g�n�r�e le : %s'; // %s replaced by date/time
$lang['Search_new'] = 'Les messages depuis votre derni�re visite';
$lang['Search_your_posts'] = 'Vos messages';
$lang['Search_unanswered'] = 'Les messages sans r�ponse';
$lang['Register'] = 'Inscription';
$lang['Profile'] = 'Profil';
$lang['Edit_profile'] = 'Editer votre profil';
$lang['Search'] = 'Recherche';
$lang['Memberlist'] = 'Membres';
$lang['FAQ'] = 'FAQ';
$lang['BBCode_guide'] = 'Guide du BBCode';
$lang['Usergroups'] = 'Groupes';
$lang['Last_Post'] = 'Derniers messages';
$lang['rmw_image_title'] = 'Cliquer pour voir cette image en taille r�elle'; // mod : Resize Posted Images Based on Max Width
$lang['Moderator'] = 'Mod�rateur ';
$lang['Moderators'] = 'Mod�rateurs ';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'Nos utilisateurs ont publi�s un total de <b>0</b> message'; // Number of posts
$lang['Posted_articles_total'] = 'Nos utilisateurs ont publi�s un total de <b>%d</b> messages'; // Number of posts
$lang['Posted_article_total'] = 'Nos utilisateurs ont publi�s un total de <b>%d</b> message'; // Number of posts
$lang['Registered_users_zero_total'] = 'Nous avons <b>0</b> utilisateur inscrit'; // # registered users
$lang['Registered_users_total'] = 'Nous avons <b>%d</b> utilisateurs inscrits'; // # registered users
$lang['Registered_user_total'] = 'Nous avons <b>%d</b> utilisateur inscrit'; // # registered users
$lang['Newest_user'] = 'Le membre le plus r�cent est <b>%s%s%s</b>'; // a href, username, /a 

$lang['No_new_posts_last_visit'] = 'Il n�y a eu aucun nouveau message depuis votre derni�re visite';
$lang['No_new_posts'] = 'Aucun nouveau message';
$lang['New_posts'] = 'Nouveaux messages';
$lang['New_post'] = 'Nouveau message';
$lang['No_new_posts_hot'] = 'Aucun nouveau message [ Populaire ]';
$lang['New_posts_hot'] = 'Nouveaux messages [ Populaire ]';
$lang['No_new_posts_locked'] = 'Aucun nouveau message [ Verrouill� ]';
$lang['New_posts_locked'] = 'Nouveaux messages [ Verrouill�s ]';
$lang['Forum_is_locked'] = 'Le forum est verrouill�';


//
// Login
//
$lang['Enter_password'] = 'Veuillez saisir votre nom d�utilisateur et votre mot de passe afin de vous connecter.';
$lang['Login'] = 'Connexion';
$lang['Logout'] = 'D�connexion';

$lang['Forgotten_password'] = 'J�ai perdu mon mot de passe';
$lang['Log_me_in'] = 'Me connecter automatiquement lors de chaque visite';
$lang['Error_login'] = 'Le nom d�utilisateur ou le mot de passe que vous avez sp�cifi� est incorrect ou inactif.';


//
// Index page
//
$lang['Index'] = 'Index';
$lang['No_Posts'] = 'Aucun message';
$lang['No_forums'] = 'Aucun forum';

$lang['Private_Message'] = 'Message priv�';
$lang['Private_Messages'] = 'Messages priv�s';
$lang['Who_is_Online'] = 'Qui est en ligne ?';

$lang['Mark_all_forums'] = 'Marquer tous les forums comme lus';
$lang['Forums_marked_read'] = 'Tous les forums sont � pr�sent marqu�s comme lus';


//
// Viewforum
//
$lang['View_forum'] = 'Voir le forum';

$lang['Forum_not_exist'] = 'Le forum que vous avez s�lectionn� n�existe pas.';
$lang['Reached_on_error'] = 'Vous avez atteint cette page par erreur.';

$lang['Display_topics'] = 'Afficher les sujets depuis';
$lang['All_Topics'] = 'Tous les sujets';

$lang['Topic_Announcement'] = '<b>Annonce :</b>';
$lang['Topic_Sticky'] = '<b>Note :</b>';
$lang['Topic_Moved'] = '<b>D�plac� :</b>';
$lang['Topic_Poll'] = '<b>[ Sondage ]</b>';

$lang['Mark_all_topics'] = 'Marquer tous les sujets comme lus';
$lang['Topics_marked_read'] = 'Tous les sujets de ce forum sont � pr�sent marqu�s comme lus';

$lang['Rules_post_can'] = 'Vous <b>pouvez</b> publier de nouveaux messages dans ce forum';
$lang['Rules_post_cannot'] = 'Vous <b>ne pouvez pas</b> publier de nouveaux messages dans ce forum';
$lang['Rules_reply_can'] = 'Vous <b>pouvez</b> r�pondre aux sujets dans ce forum';
$lang['Rules_reply_cannot'] = 'Vous <b>ne pouvez pas</b> r�pondre aux sujets dans ce forum';
$lang['Rules_edit_can'] = 'Vous <b>pouvez</b> �diter vos messages dans ce forum';
$lang['Rules_edit_cannot'] = 'Vous <b>ne pouvez pas</b> �diter vos messages dans ce forum';
$lang['Rules_delete_can'] = 'Vous <b>pouvez</b> supprimer vos messages dans ce forum';
$lang['Rules_delete_cannot'] = 'Vous <b>ne pouvez pas</b> supprimer vos messages dans ce forum';
$lang['Rules_vote_can'] = 'Vous <b>pouvez</b> voter dans les sondages de ce forum';
$lang['Rules_vote_cannot'] = 'Vous <b>ne pouvez pas</b> voter dans les sondages de ce forum';
$lang['Rules_moderate'] = 'Vous <b>pouvez</b> %smod�rer ce forum%s'; // %s replaced by a href links, do not remove! 

$lang['No_topics_post_one'] = 'Il n�y a aucun message dans ce forum.<br />Cliquez sur le bouton <b>Publier un nouveau sujet</b> afin d�en publier un.';


//
// Viewtopic
//
$lang['View_topic'] = 'Voir le sujet';

$lang['Guest'] = 'Invit�';
$lang['Post_subject'] = 'Titre du sujet';
$lang['View_next_topic'] = 'Voir le sujet suivant';
$lang['View_previous_topic'] = 'Voir le sujet pr�c�dent';
$lang['Submit_vote'] = 'Envoyer le vote';
$lang['View_results'] = 'Voir les r�sultats';

$lang['No_newer_topics'] = 'Il n�y a aucun nouveau sujet dans ce forum';
$lang['No_older_topics'] = 'Il n�y a aucun ancien sujet dans ce forum';
$lang['Topic_post_not_exist'] = 'Le sujet ou le message que vous recherchez n�existe pas';
$lang['No_posts_topic'] = 'Il n�y a aucun message dans ce sujet';

$lang['Display_posts'] = 'Afficher les messages depuis';
$lang['All_Posts'] = 'Tous les messages';
$lang['Newest_First'] = 'Le plus r�cent d�abord';
$lang['Oldest_First'] = 'Le plus r�cent d�abord';

$lang['Back_to_top'] = 'Revenir en haut';

$lang['Read_profile'] = 'Voir le profil de l�utilisateur'; 
$lang['Visit_website'] = 'Visiter le site Internet du r�dacteur';
$lang['ICQ_status'] = 'Statut ICQ';
$lang['Edit_delete_post'] = '�diter/Supprimer ce message';
$lang['View_IP'] = 'Voir l�adresse IP du r�dacteur';
$lang['Delete_post'] = 'Supprimer ce message';

$lang['wrote'] = 'a �crit'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = 'Citer'; // comes before bbcode quote output.
$lang['Code'] = 'Code'; // comes before bbcode code output.

$lang['Edited_time_total'] = 'Derni�re �dition par %s le %s ; �dit� %d fois au total'; // Last edited by me on 12 Oct 2001; edited 1 time in total
$lang['Edited_times_total'] = 'Derni�re �dition par %s le %s ; �dit� %d fois au total'; // Last edited by me on 12 Oct 2001; edited 2 times in total

$lang['Lock_topic'] = 'Verrouiller ce sujet';
$lang['Unlock_topic'] = 'D�verrouiller ce sujet';
$lang['Move_topic'] = 'D�placer ce sujet';
$lang['Delete_topic'] = 'Supprimer ce sujet';
$lang['Split_topic'] = 'Diviser ce sujet';

$lang['Stop_watching_topic'] = 'Ne plus surveiller ce sujet';
$lang['Start_watching_topic'] = 'Surveiller les r�ponses de ce sujet';
$lang['No_longer_watching'] = 'Vous ne surveillez plus ce sujet';
$lang['You_are_watching'] = 'Vous surveillez � pr�sent ce sujet';

$lang['Total_votes'] = 'Total des votes';


//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Message ';
$lang['Topic_review'] = 'Liste des derniers messages';
$lang['No_post_mode'] = 'Mode du sujet non sp�cifi�'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)
$lang['Post_a_new_topic'] = 'Poster un nouveau sujet';
$lang['Post_a_reply'] = 'Poster une r�ponse';
$lang['Post_topic_as'] = 'Poster le sujet en tant que';
$lang['Edit_Post'] = 'Editer le sujet';
$lang['Options'] = 'Options';
$lang['Post_Announcement'] = 'Annonce';
$lang['Post_Sticky'] = 'Note';
$lang['Post_Normal'] = 'Normal';
$lang['Confirm_delete'] = 'Etes-vous s�r de vouloir supprimer ce message ?';
$lang['Confirm_delete_poll'] = 'Etes-vous s�r de vouloir supprimer ce sondage ?';
$lang['Flood_Error'] = 'Vous ne pouvez pas poster un autre sujet si peu de temps apr�s le dernier, veuillez r�essayer dans un court moment.';
$lang['Double_Post_Error'] = 'Vous ne pouvez pas poster deux fois le m�me message.';
$lang['Empty_subject'] = 'Vous devez pr�ciser le nom du sujet avant de pouvoir en poster un nouveau.';
$lang['Empty_message'] = 'Vous devez entrer un message avant de poster.';
$lang['Forum_locked'] = 'Ce forum est verrouill�, vous ne pouvez pas poster, ni r�pondre, ni �diter les sujets.';
$lang['Topic_locked'] = 'Ce sujet est verrouill�, vous ne pouvez pas �diter les messages ou faire de r�ponses.';
$lang['No_post_id'] = 'Vous devez s�lectionner un message � �diter';
$lang['No_topic_id'] = 'Vous devez s�lectionner le sujet auquel r�pondre';
$lang['No_valid_mode'] = 'Vous pouvez seulement poster, r�pondre, �diter ou citer des messages, veuillez revenir en arri�re et r�essayer.';
$lang['No_such_post'] = 'Il n\'y a pas de message de ce type, veuillez revenir en arri�re et r�essayer.';
$lang['Edit_own_posts'] = 'D�sol�, mais vous pouvez seulement �diter vos propres messages.';
$lang['Delete_own_posts'] = 'D�sol�, mais vous pouvez uniquement supprimer vos propres messages.';
$lang['Cannot_delete_replied'] = 'D�sol�, mais vous ne pouvez pas supprimer un message ayant eu des r�ponses.';
$lang['Cannot_delete_poll'] = 'D�sol�, mais vous ne pouvez pas supprimer un sondage actif.';
$lang['Empty_poll_title'] = 'Vous devez entrer un titre pour le sondage.';
$lang['To_few_poll_options'] = 'Vous devez au moins entrer deux options pour le sondage.';
$lang['To_many_poll_options'] = 'Vous avez entr� trop d\'options pour le sondage.';
$lang['Post_has_no_poll'] = 'Ce sujet n\'a pas de sondage.';
$lang['Already_voted'] = 'Vous avez d�j� particip� � ce sondage.'; 
$lang['No_vote_option'] = 'Vous devez choisir une option avant de r�pondre.';
$lang['Add_poll'] = 'Ajouter un sondage';
$lang['Add_poll_explain'] = 'Si vous souhaitez envoyer le sujet sans y ins�rer de sondage, laissez ces champs vides.';
$lang['Poll_question'] = 'Question du sondage';
$lang['Poll_option'] = 'Choix du sondage';
$lang['Add_option'] = 'Ajouter le choix';
$lang['Update'] = 'Mettre � jour';
$lang['Delete'] = 'Supprimer';
$lang['Poll_for'] = 'Sondage pendant';
$lang['Days'] = 'Jours'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[ Entrez 0 ou laissez vide pour un sondage sans fin ]';
$lang['Delete_poll'] = 'Supprimer le sondage';
$lang['Disable_HTML_post'] = 'D�sactiver l\'HTML dans ce message';
$lang['Disable_BBCode_post'] = 'D�sactiver le BBCode dans ce message';
$lang['Disable_Smilies_post'] = 'D�sactiver les �motic�nes dans ce message';
$lang['HTML_is_ON'] = 'Le HTML est <u>activ�</u>';
$lang['HTML_is_OFF'] = 'Le HTML est <u>d�sactiv�</u>';
$lang['BBCode_is_ON'] = 'Le %sBBCode%s est <u>activ�</u>'; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = 'Le %sBBCode%s est <u>d�sactiv�</u>';
$lang['Smilies_are_ON'] = 'Les �motic�nes sont <u>activ�es</u>';
$lang['Smilies_are_OFF'] = 'Les �motic�nes sont <u>d�sactiv�es</u>';
$lang['Attach_signature'] = 'Attacher sa signature (les signatures peuvent �tre modifi�es dans le profil)';
$lang['Notify'] = 'Etre averti lorsqu\'une r�ponse est post�e';
$lang['Stored'] = 'Votre message a bien �t� enregistr�.';
$lang['Deleted'] = 'Votre message a bien �t� supprim�.';
$lang['Poll_delete'] = 'Votre sondage a bien �t� supprim�.';
$lang['Vote_cast'] = 'Votre vote a �t� pris en compte.';
$lang['Topic_reply_notification'] = 'Notification de r�ponse au sujet';
$lang['bbcode_b_help'] = 'Texte gras : [b]texte[/b] (alt+b)';
$lang['bbcode_i_help'] = 'Texte italique : [i]texte[/i] (alt+i)';
$lang['bbcode_u_help'] = 'Texte soulign� : [u]texte[/u] (alt+u)';
$lang['bbcode_q_help'] = 'Citation : [quote]texte cit�[/quote] (alt+q)';
$lang['bbcode_c_help'] = 'Afficher du code : [code]code[/code] (alt+c)';
$lang['bbcode_l_help'] = 'Liste : [list]texte[/list] (alt+l)';
$lang['bbcode_o_help'] = 'Liste ordonn�e : [list=]texte[/list] (alt+o)';
$lang['bbcode_p_help'] = 'Ins�rer une image : [img]http://image_url/[/img] (alt+p)';
$lang['bbcode_w_help'] = 'Ins�rer un lien : [url]http://url/[/url] ou [url=http://url/]Nom[/url] (alt+w)';
$lang['bbcode_a_help'] = 'Fermer toutes les balises BBCode ouvertes';
$lang['bbcode_s_help'] = 'Couleur du texte : [color=red]texte[/color] Astuce: #FF0000 fonctionne aussi';
$lang['bbcode_f_help'] = 'Taille du texte : [size=x-small]texte en petit[/size]';
$lang['Emoticons'] = 'Emotic�nes';
$lang['More_emoticons'] = 'Voir plus d\'�motic�nes';
$lang['Font_color'] = 'Couleur ';
$lang['color_default'] = 'D�faut';
$lang['color_dark_red'] = 'Rouge fonc�';
$lang['color_red'] = 'Rouge';
$lang['color_orange'] = 'Orange';
$lang['color_brown'] = 'Marron';
$lang['color_yellow'] = 'Jaune';
$lang['color_green'] = 'Vert';
$lang['color_olive'] = 'Olive';
$lang['color_cyan'] = 'Cyan';
$lang['color_blue'] = 'Bleu';
$lang['color_dark_blue'] = 'Bleu fonc�';
$lang['color_indigo'] = 'Indigo';
$lang['color_violet'] = 'Violet';
$lang['color_white'] = 'Blanc';
$lang['color_black'] = 'Noir';
$lang['Font_size'] = 'Taille ';
$lang['font_tiny'] = 'Tr�s petit';
$lang['font_small'] = 'Petit';
$lang['font_normal'] = 'Normal';
$lang['font_large'] = 'Grand';
$lang['font_huge'] = 'Tr�s grand';
$lang['Close_Tags'] = 'Fermer les balises';
$lang['Styles_tip'] = 'Astuce : une mise en forme peut �tre appliqu�e au texte s�lectionn�.';


//
// Private Messaging
//
$lang['Private_Messaging'] = 'Messagerie priv�e';

$lang['Login_check_pm'] = 'Se connecter afin de v�rifier vos messages priv�s';
$lang['New_pms'] = 'Vous avez %d nouveaux messages'; // You have 2 new messages
$lang['New_pm'] = 'Vous avez %d nouveau message'; // You have 1 new message
$lang['No_new_pm'] = 'Vous n�avez aucun nouveau message';
$lang['Unread_pms'] = 'Vous avez %d messages non-lus';
$lang['Unread_pm'] = 'Vous avez %d message non-lu';
$lang['No_unread_pm'] = 'Vous n�avez aucun message non-lu';
$lang['You_new_pm'] = 'Un nouveau message vous attend dans votre bo�te de r�ception';
$lang['You_new_pms'] = 'De nouveaux messages vous attendent dans votre bo�te de r�ception';
$lang['You_no_new_pm'] = 'Aucun nouveau message ne vous attend dans votre bo�te de r�ception';

$lang['Unread_message'] = 'Message non-lu';
$lang['Read_message'] = 'Message lu';

$lang['Read_pm'] = 'Lire le message';
$lang['Post_new_pm'] = 'Publier le message';
$lang['Post_reply_pm'] = 'R�pondre au message';
$lang['Post_quote_pm'] = 'Citer le message';
$lang['Edit_pm'] = '�diter le message';

$lang['Inbox'] = 'Bo�te de r�ception';
$lang['Outbox'] = 'Bo�te d�envoi';
$lang['Savebox'] = 'Archives';
$lang['Sentbox'] = 'Messages envoy�s';
$lang['Flag'] = 'Drapeau';
$lang['Subject'] = 'Sujet';
$lang['From'] = 'De';
$lang['To'] = '�';
$lang['Date'] = 'Date';
$lang['Mark'] = 'S�lectionner';
$lang['Sent'] = 'Envoyer';
$lang['Saved'] = 'Archiv�';
$lang['Delete_marked'] = 'Supprimer la s�lection';
$lang['Delete_all'] = 'Tout supprimer';
$lang['Save_marked'] = 'Archiver la s�lection'; 
$lang['Save_message'] = 'Archiver le message';
$lang['Delete_message'] = 'Supprimer le message';

$lang['Display_messages'] = 'Afficher les messages depuis'; // Followed by number of days/weeks/months
$lang['All_Messages'] = 'Tous les messages';

$lang['No_messages_folder'] = 'Vous n�avez aucun message dans ce dossier';

$lang['PM_disabled'] = 'La messagerie priv�e a �t� d�sactiv�e sur ce forum.';
$lang['Cannot_send_privmsg'] = 'D�sol� mais l�administrateur vous emp�che d�envoyer des messages priv�s.';
$lang['No_to_user'] = 'Vous devez sp�cifier un nom d�utilisateur � qui envoyer le message.';
$lang['No_such_user'] = 'D�sol� mais cet utilisateur n�existe pas.';

$lang['Disable_HTML_pm'] = 'D�sactiver l�HTML dans ce message';
$lang['Disable_BBCode_pm'] = 'D�sactiver le BBCode dans ce message';
$lang['Disable_Smilies_pm'] = 'D�sactiver les �motic�nes dans ce message';

$lang['Message_sent'] = 'Votre message a �t� envoy� avec succ�s.';

$lang['Click_return_inbox'] = 'Cliquez %sici%s afin de retourner � votre bo�te de r�ception';
$lang['Click_return_index'] = 'Cliquez %sici%s afin de retourner � l�index';

$lang['Send_a_new_message'] = 'Envoyer un nouveau message priv�';
$lang['Send_a_reply'] = 'R�pondre au message priv�';
$lang['Edit_message'] = '�diter le message priv�';

$lang['Notification_subject'] = 'Un nouveau message priv� est arriv� !';

$lang['Find_username'] = 'Trouver un nom d�utilisateur';
$lang['Find'] = 'Trouver';
$lang['No_match'] = 'Aucun r�sultat n�a �t� trouv�.';

$lang['No_post_id'] = 'L�identification du message n�a pas �t� sp�cifi�e';
$lang['No_such_folder'] = 'Le dossier n�existe pas';
$lang['No_folder'] = 'Aucun dossier n�a �t� sp�cifi�';

$lang['Mark_all'] = 'Tout s�lectionner';
$lang['Unmark_all'] = 'Tout d�s�lectionner';

$lang['Confirm_delete_pm'] = '�tes-vous s�r de vouloir ce message ?';
$lang['Confirm_delete_pms'] = '�tes-vous s�r de supprimer ces messages ?';

$lang['Inbox_size'] = 'Votre bo�te de r�ception est pleine � %d%%'; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = 'Votre bo�te d�envoi est pleine � %d% %'; 
$lang['Savebox_size'] = 'Vos archives sont pleines � %d% %'; 

$lang['Click_view_privmsg'] = 'Cliquez %sici%s afin d�atteindre votre bo�te de r�ception';


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = 'Consulte le profil :: %s'; // %s is username 
$lang['About_user'] = 'Tout � propos de %s'; // %s is username

$lang['Preferences'] = 'Pr�f�rences';
$lang['Items_required'] = 'Les champs marqu�s par * sont obligatoires.';
$lang['Registration_info'] = 'Inscription';
$lang['Profile_info'] = 'Profil';
$lang['Profile_info_warn'] = 'Ces informations seront visibles publiquement';
$lang['Avatar_panel'] = 'Panneau de contr�le des avatars';
$lang['Avatar_gallery'] = 'Galerie d�avatars';

$lang['Website'] = 'Site Internet';
$lang['Location'] = 'Localisation';
$lang['Contact'] = 'Contact';
$lang['Email_address'] = 'Adresse e-mail';
$lang['Send_private_message'] = 'Envoyer un message priv�';
$lang['Hidden_email'] = '[ Invisible ]';
$lang['Interests'] = 'Loisirs';
$lang['Occupation'] = 'Emploi'; 
$lang['Poster_rank'] = 'Rang du r�dacteur';

$lang['Total_posts'] = 'Messages au total';
$lang['User_post_pct_stats'] = '%.2f% % du total'; // 1.25% of total
$lang['User_post_day_stats'] = '%.2f messages par jour'; // 1.5 posts per day
$lang['Search_user_posts'] = 'Trouver tous les messages de %s'; // Find all posts by username

$lang['No_user_id_specified'] = 'D�sol� mais cet utilisateur n�existe pas.';
$lang['Wrong_Profile'] = 'Vous ne pouvez pas modifier un profil qui n�est pas le v�tre.';

$lang['Only_one_avatar'] = 'Seul un type d�avatar peut �tre sp�cifi�';
$lang['File_no_data'] = 'Le fichier du lien que vous avez sp�cifi� ne contient aucune donn�e';
$lang['No_connection_URL'] = 'Une connexion ne peut �tre �tablie avec le lien que vous avez sp�cifi�';
$lang['Incomplete_URL'] = 'Le lien que vous avez sp�cifi� est incomplet';
$lang['Wrong_remote_avatar_format'] = 'Le lien de l�avatar � distance que vous avez sp�cifi� est incorrect';
$lang['No_send_account_inactive'] = 'D�sol� mais votre mot de passe ne peut �tre renouvel� car votre compte est actuellement inactif. Pour plus d�informations, veuillez contacter l�administrateur du forum.';

$lang['Always_smile'] = 'Toujours activer les �motic�nes';
$lang['Always_html'] = 'Toujours activer l�HTML';
$lang['Always_bbcode'] = 'Toujours activer le BBCode';
$lang['Always_add_sig'] = 'Toujours ins�rer ma signature';
$lang['Always_notify'] = 'Toujours m�avertir toujours des r�ponses';
$lang['Always_notify_explain'] = 'Envoie un e-mail lorsque quelqu�un r�pond � un sujet que vous avez publi�. Cela peut �tre modifi� � chaque fois que vous publiez un message.';

$lang['Board_style'] = 'Style du forum';
$lang['Board_lang'] = 'Langue du forum';
$lang['No_themes'] = 'Aucun th�me n�est pr�sent dans la base de donn�es';
$lang['Timezone'] = 'Fuseau horaire';
$lang['Date_format'] = 'Format de la date';
$lang['Date_format_explain'] = 'La syntaxe utilis�e est identique � la fonction PHP <a href=\'http://www.php.net/date\' target=\'_other\'>date()</a>.';
$lang['Signature'] = 'Signature';
$lang['Signature_explain'] = 'Ceci est un bloc de texte qui peut �tre ajout� aux messages que vous publiez. Il est limit� � %d caract�res';
$lang['Public_view_email'] = 'Toujours afficher mon adresse e-mail';

$lang['Current_password'] = 'Mot de passe actuel';
$lang['New_password'] = 'Nouveau mot de passe';
$lang['Confirm_password'] = 'Confirmer le mot de passe';
$lang['Confirm_password_explain'] = 'Vous devez confirmer votre mot de passe actuel si vous souhaitez modifiez votre adresse e-mail ou votre mot de passe';
$lang['password_if_changed'] = 'Vous ne devez fournir un mot de passe que si vous souhaitez le modifier';
$lang['password_confirm_if_changed'] = 'Vous ne devez confirmer le mot de passe que si vous l�avez modifi� ci-dessus';

$lang['Avatar'] = 'Avatar';
$lang['Avatar_explain'] = 'Affiche une petite image sous les informations relatives aux messages. Seule une image peut �tre affich�e. Sa largeur ne doit pas d�passer %d pixels, sa hauteur ne soit pas d�passer %d pixels et la taille du fichier ne doit pas d�passer %d Ko.';
$lang['Upload_Avatar_file'] = 'Transf�rer un avatar � partir de votre ordinateur';
$lang['Upload_Avatar_URL'] = 'Transf�rer un avatar � partir d�un lien';
$lang['Upload_Avatar_URL_explain'] = 'Saisissez le lien de l�endroit contenant l�image. Elle sera copi�e sur ce site.';
$lang['Pick_local_Avatar'] = 'S�lectionner un avatar � partir de la galerie';
$lang['Link_remote_Avatar'] = 'Lien vers l�image � distance';
$lang['Link_remote_Avatar_explain'] = 'Saisissez le lien de l�endroit contenant l�image que vous souhaitez utiliser.';
$lang['Avatar_URL'] = 'Lien de l�image';
$lang['Select_from_gallery'] = 'S�lectionner un avatar � partir de la galerie';
$lang['View_avatar_gallery'] = 'Afficher la galerie';

$lang['Select_avatar'] = 'S�lectionner l�avatar';
$lang['Return_profile'] = 'Annuler l�avatar';
$lang['Select_category'] = 'S�lectionner la cat�gorie';

$lang['Delete_Image'] = 'Supprimer l�image';
$lang['Current_Image'] = 'Image actuelle';

$lang['Notify_on_privmsg'] = 'M�avertir des nouveaux messages priv�s';
$lang['Popup_on_privmsg'] = 'Afficher une fen�tre pop-up lors de nouveaux messages priv�s'; 
$lang['Popup_on_privmsg_explain'] = 'Certains templates peuvent ouvrir une nouvelle fen�tre afin de vous informer de l�arriv�e d�un nouveau message priv�.';
$lang['Hide_user'] = 'Masquer mon statut en ligne';

$lang['Profile_updated'] = 'Votre profil a �t� mis � jour avec succ�s';
$lang['Profile_see'] = 'Cliquez %sici%s pour retourner � votre profil';
$lang['Profile_updated_inactive'] = 'Votre profil a �t� mis � jour avec succ�s. Cependant, vous avez modifi� des informations importantes. Par cons�quence, votre compte est � pr�sent inactif. V�rifiez vos e-mail et r�activez votre compte. Si une activation par l�administrateur est exig�e, veuillez patienter le temps qu�il le r�active.';

$lang['Password_mismatch'] = 'Les mots de passe que vous avez sp�cifi�s ne concordent pas.';
$lang['Current_password_mismatch'] = 'Le mot de passe actuel que vous avez sp�cifi� ne correspond pas � celui qui est stock� dans la base de donn�es.';
$lang['Password_long'] = 'Votre mot de passe ne doit pas d�passer 32 caract�res.';
$lang['Username_taken'] = 'D�sol� mais ce nom d�utilisateur est d�j� utilis�.';
$lang['Username_invalid'] = 'D�sol� mais ce nom d�utilisateur contient un ou des caract�res incorrects.';
$lang['Username_disallowed'] = 'D�sol� mais ce nom d�utilisateur a �t� interdit.';
$lang['Email_taken'] = 'D�sol� mais cette adresse e-mail est d�j� utilis�e par un autre utilisateur.';
$lang['Email_banned'] = 'D�sol� mais cette adresse e-mail a �t� bannie.';
$lang['Email_invalid'] = 'D�sol� mais cette adresse e-mail est incorrecte.';
$lang['Signature_too_long'] = 'Votre signature est trop longue.';
$lang['Fields_empty'] = 'Vous devez remplir les champs obligatoires.';
$lang['Avatar_filetype'] = 'Le type de fichier de l�avatar doit �tre JPEG, GIF ou PNG';
$lang['Avatar_filesize'] = 'La taille de l�avatar ne doit pas d�passer %d Ko'; // The avatar image file size must be less than 6 KB
$lang['Avatar_imagesize'] = 'Les dimensions de l�avatar ne doivent pas d�passer %d pixels de large et %d pixels de haut'; 

$lang['Welcome_subject'] = 'Bienvenue sur les forums de %s'; // Welcome to my.com forums
$lang['New_account_subject'] = 'Nouveau compte utilisateur';
$lang['Account_activated_subject'] = 'Compte activ�';

$lang['Account_added'] = 'Nous vous remercions de votre inscription. Votre compte a �t� cr�� avec succ�s. Vous pouvez d�s � pr�sent vous connecter en utilisant votre nom d�utilisateur et votre mot de passe';
$lang['Account_inactive'] = 'Votre compte a �t� cr�� avec succ�s. Cependant, vous devez activer votre compte. Une cl� d�activation a �t� envoy�e � l�adresse e-mail que vous avez fournie. Pour plus d�informations, veuillez v�rifier vos e-mail';
$lang['Account_inactive_admin'] = 'Votre compte a �t� cr�� avec succ�s. Cependant, l�administrateur du forum doit activer votre compte. Un e-mail vous sera envoy� lorsque l�activation de votre compte sera effective';
$lang['Account_active'] = 'Votre compte est � pr�sent activ�. Nous vous remercions de votre inscription';
$lang['Account_active_admin'] = 'Le compte est � pr�sent activ�';
$lang['Reactivate'] = 'R�activez votre compte !';
$lang['Already_activated'] = 'Vous avez d�j� activ� votre compte';
$lang['COPPA'] = 'Votre compte a �t� cr�� avec succ�s mais il n�cessite d��tre approuv�. Pour plus d�informations, veuillez v�rifier vos e-mail.';

$lang['Registration'] = 'Conditions d�inscription';

//-- mod : vAgreement Terms ----------------------------------------------------
//-- delete
//	$lang['Reg_agreement'] = 'While the administrators and moderators of this forum will attempt to remove or edit any generally objectionable material as quickly as possible, it is impossible to review every message. Therefore you acknowledge that all posts made to these forums express the views and opinions of the author and not the administrators, moderators or webmaster (except for posts by these people) and hence will not be held liable.<br /><br />You agree not to post any abusive, obscene, vulgar, slanderous, hateful, threatening, sexually-oriented or any other material that may violate any applicable laws. Doing so may lead to you being immediately and permanently banned (and your service provider being informed). The IP address of all posts is recorded to aid in enforcing these conditions. You agree that the webmaster, administrator and moderators of this forum have the right to remove, edit, move or close any topic at any time should they see fit. As a user you agree to any information you have entered above being stored in a database. While this information will not be disclosed to any third party without your consent the webmaster, administrator and moderators cannot be held responsible for any hacking attempt that may lead to the data being compromised.<br /><br />This forum system uses cookies to store information on your local computer. These cookies do not contain any of the information you have entered above; they serve only to improve your viewing pleasure. The e-mail address is used only for confirming your registration details and password (and for sending new passwords should you forget your current one).<br /><br />By clicking Register below you agree to be bound by these conditions.';
//-- add
$lang['Reg_agreement'] = '<font class="gen"><b>Messages</b></font><br />Les administrateurs et mod�rateurs de ce forum s\'efforceront de supprimer ou �diter tous les messages � caract�re r�pr�hensible aussi rapidement que possible. Toutefois, il leur est impossible de passer en revue tous les messages. Vous admettez donc que tous les messages post�s sur ces forums expriment la vue et opinion de leurs auteurs respectifs, et non pas des administrateurs, ou mod�rateurs, ou webmestres (except� les messages post�s par eux-m�me) et par cons�quent ne peuvent pas �tre tenus pour responsables.<br /><br /><font class="gen"><b>Contenu de vos messages</b></font><br />Vous consentez � ne pas poster de messages injurieux, obsc�nes, vulgaires, diffamatoires, mena�ants, sexuels ou tout autre message qui violeraient les lois applicables. Le faire peut vous conduire � �tre banni imm�diatement de fa�on permanente (et votre fournisseur d\'acc�s � internet en sera inform�). L\'adresse IP de chaque message est enregistr�e afin d\'aider � faire respecter ces conditions. Vous �tes d\'accord sur le fait que le webmestre, l\'administrateur et les mod�rateurs de ce forum ont le droit de supprimer, �diter, d�placer ou verrouiller n\'importe quel sujet de discussion � tout moment. En tant qu\'utilisateur, vous �tes d\'accord sur le fait que toutes les informations que vous donnerez ci-apr�s seront stock�es dans une base de donn�es. Cependant, ces informations ne seront divulgu�es � aucune tierce personne ou soci�t� sans votre accord. Le webmestre, l\'administrateur, et les mod�rateurs ne peuvent pas �tre tenus pour responsables si une tentative de piratage informatique conduit � l\'acc�s de ces donn�es.<br /><br /><font class="gen"><b>Informations collect�es et Cookies</b></font><br />Ce forum utilise les cookies pour stocker des informations sur votre ordinateur. Ces cookies ne contiendront aucune information que vous aurez entr� ci-apr�s; ils servent uniquement � am�liorer le confort d\'utilisation. L\'adresse e-mail est uniquement utilis�e afin de confirmer les d�tails de votre enregistrement ainsi que votre mot de passe (et aussi pour vous envoyer un nouveau mot de passe dans le cas o� vous l\'oublieriez).<br /><br /><font class="gen"><b>Vous acceptez...</b></font><br />En vous enregistrant, vous vous portez garant du fait d\'�tre en accord avec le r�glement ci-dessus.';
$lang['To_Join'] = 'Pour rejoindre, vous devez avor lu et accept� ces termes:';
$lang['Forum_Rules'] = 'R�gles du Forum';
$lang['Agree_checkbox'] = 'J\'ai lu ce r�glement et je consens � observer les r�gles de %s Forum.';
//-- fin mod : vAgreement Terms ------------------------------------------------

$lang['Registration'] = 'Conditions d�inscription';
$lang['Reg_agreement'] = 'Lorsque les administrateurs et les mod�rateurs de ce forum essaieront de supprimer ou d��diter des messages r�pr�hensibles aussi rapidement que possible, il faut �tre conscient qu�il sera impossible de v�rifier tous les messages. Vous devez accepter alors le fait que l�administrateur et les mod�rateurs de ce forum ne peuvent �tre tenus comme responsables, mis � part de leurs propres messages.<br /><br />Vous consentez au fait de ne publier aucun contenu � caract�re abusif, obsc�ne, vulgaire, scandaleux, diffamatoire, mena�ant, pornographique ou tout autre message qui violeraient les lois appliqu�es � votre pays. Si cela n�est pas respect�, vous serez alors banni imm�diatement et d�finitivement. Votre Fournisseur d�Acc�s � Internet en sera �galement inform�. Les adresses IP de tous les messages publi�s sont enregistr�es afin de lutter contre ce genre d�abus. Vous consentez au fait que l�administrateur et les mod�rateurs du forum puissent supprimer, �diter, d�placer ou verrouiller chaque sujet et message en toute libert�. En tant qu�utilisateur vous acceptez le fait que toutes les informations saisies ci-dessus sont stock�es dans une base de donn�es. Cependant, ces informations sont strictement r�serv�es � ce site et elles ne seront pas d�voil�es � un site de tierce-partie sans votre consentement. L�administrateur et les mod�rateurs du forum ne peuvent �tre tenus comme responsables si une tentative ou un acte de piratage a lieu sur votre compte, ce qui rendra les informations compromises.<br /><br />Ce syst�me de forum utilise des cookies afin de stocker des informations sur votre ordinateur. Ces cookies ne contiennent pas les informations que vous avez saisies ci-dessus ; ils ne servent qu�� am�liorer votre navigation. L�adresse e-mail n�est utilis�e que pour confirmer les informations de votre inscription et pour votre mot de passe (l�envoi d�un nouveau mot de passe, par exemple).<br /><br />En vous inscrivant, vous acceptez de respecter toutes ces conditions.';

$lang['Agree_under_13'] = 'J�accepte ces conditions et j�ai <b>moins</b> de 13 ans';
$lang['Agree_over_13'] = 'J�accepte ces conditions et j�ai <b>plus</b> de 13 ans';
$lang['Agree_not'] = 'Je refuse ces conditions';

$lang['Wrong_activation'] = 'La cl� d�activation que vous avez fournie n�existe pas dans la base de donn�es.';
$lang['Send_password'] = 'M�envoyer un nouveau mot de passe'; 
$lang['Password_updated'] = 'Un nouveau mot de passe a �t� cr�� avec succ�s. Pour plus d�informations, veuillez consulter vos e-mail.';
$lang['No_email_match'] = 'L�adresse e-mail que vous avez fournie ne correspond pas � ce nom d�utilisateur.';
$lang['New_password_activation'] = 'Activation du nouveau mot de passe';
$lang['Password_activated'] = 'Votre compte a �t� r�activ� avec succ�s. Pour vous connecter, veuillez utiliser le mot de passe fourni dans l�e-mail que vous avez re�u.';
$lang['Send_email_msg'] = 'Envoyer un e-mail';
$lang['No_user_specified'] = 'Aucun utilisateur sp�cifi�';
$lang['User_prevent_email'] = 'Cet utilisateur ne souhaite pas recevoir d\'e-mail. Essayez de lui envoyer un message priv�.';
$lang['User_not_exist'] = 'Cet utilisateur n\'existe pas';
$lang['CC_email'] = 'Recevoir une copie de cet e-mail';
$lang['Email_message_desc'] = 'Ce message sera envoy� en texte plein, n\'ins�rez aucun code HTML ou BBCode. L\'adresse de r�ponse pour ce message sera celle de votre e-mail.';
$lang['Flood_email_limit'] = 'Vous ne pouvez pas envoyer un autre e-mail pour le moment, essayez plus tard';
$lang['Recipient'] = 'Destinataire';
$lang['Email_sent'] = 'L\'e-mail a �t� envoy�.';
$lang['Send_email'] = 'Envoyer l\'e-mail';
$lang['Empty_subject_email'] = 'Vous devez sp�cifier le sujet pour l\'e-mail.';
$lang['Empty_message_email'] = 'Vous devez entrer un message pour qu\'il soit exp�di�.';


//
// Visual confirmation system strings
//
$lang['Confirm_code_wrong'] = 'Le code de confirmation que vous avez saisi est incorrect';
$lang['Too_many_registers'] = 'Vous avez d�pass� le nombre de tentative d�inscription pour cette session. Veuillez r�essayer ult�rieurement.';
$lang['Confirm_code_impaired'] = 'Veuillez contacter l�%sadministrateur du forum%s si vous �tes visuellement d�ficient ou que vous �prouvez des difficult�s � lire ce code correctement.';
$lang['Confirm_code'] = 'Code de confirmation';
$lang['Confirm_code_explain'] = 'Veuillez saisir le code exactement comme il appara�t. Celui-ci n�est pas sensible � la casse et le z�ro comporte une barre diagonale.';


//
// Memberslist
//
$lang['Select_sort_method'] = 'S�lectionner une m�thode de tri';
$lang['Sort'] = 'Tri';
$lang['Sort_Top_Ten'] = 'Dix meilleurs r�dacteurs';
$lang['Sort_Joined'] = 'Date d�inscription';
$lang['Sort_Username'] = 'Nom d�utilisateur';
$lang['Sort_Location'] = 'Localisation';
$lang['Sort_Posts'] = 'Messages au total';
$lang['Sort_Email'] = 'E-mail';
$lang['Sort_Website'] = 'Site Internet';
$lang['Sort_Ascending'] = 'Croissant';
$lang['Sort_Descending'] = 'D�croissant';
$lang['Order'] = 'Ordre';


//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Panneau de contr�le des groupes';
$lang['Group_member_details'] = 'Informations sur les adh�rents du groupe';
$lang['Group_member_join'] = 'Adh�rer � un groupe';

$lang['Group_Information'] = 'Informations sur le groupe';
$lang['Group_name'] = 'Nom du groupe';
$lang['Group_description'] = 'Description du groupe';
$lang['Group_membership'] = 'Adh�rer au groupe';
$lang['Group_Members'] = 'Membres du groupe';
$lang['Group_Moderator'] = 'Responsable du groupe';
$lang['Pending_members'] = 'Membres en attente';

$lang['Group_type'] = 'Type du groupe';
$lang['Group_open'] = 'Groupe ouvert';
$lang['Group_closed'] = 'Groupe ferm�';
$lang['Group_hidden'] = 'Groupe invisible';

$lang['Current_memberships'] = 'Adh�rents actuels';
$lang['Non_member_groups'] = 'Non-membre du groupe';
$lang['Memberships_pending'] = 'Adh�rents en attente';

$lang['No_groups_exist'] = 'Aucun groupe n�existe';
$lang['Group_not_exist'] = 'Ce groupe d�utilisateurs n�existe pas';

$lang['Join_group'] = 'Adh�rer au groupe';
$lang['No_group_members'] = 'Ce groupe d�utilisateurs n�a aucun membre';
$lang['Group_hidden_members'] = 'Ceci est un groupe invisible ; vous ne pouvez pas voir ses adh�rents';
$lang['No_pending_group_members'] = 'Ce groupe d�utilisateurs n�a aucun membre en attente';
$lang['Group_joined'] = 'Votre demande � adh�rer ce groupe d�utilisateurs a bien �t� prise en compte.<br />Vous serez averti lorsque votre adh�sion sera approuv�e par le responsable du groupe.';
$lang['Group_request'] = 'Votre demande � adh�rer ce groupe d�utilisateurs a bien �t� prise en compte.';
$lang['Group_approved'] = 'Votre demande a �t� approuv�e.';
$lang['Group_added'] = 'Vous avez �t� ajout� � ce groupe d�utilisateurs avec succ�s.'; 
$lang['Already_member_group'] = 'Vous �tes d�j� un membre de ce groupe d�utilisateurs';
$lang['User_is_member_group'] = 'L�utilisateur est d�j� un membre de ce groupe d�utilisateurs';
$lang['Group_type_updated'] = 'Le type du groupe d�utilisateurs a �t� mis � jour avec succ�s.';

$lang['Could_not_add_user'] = 'L�utilisateur que vous avez s�lectionn� n�existe pas.';
$lang['Could_not_anon_user'] = 'Un utilisateur anonyme ne peut pas adh�rer � un groupe d�utilisateurs.';

$lang['Confirm_unsub'] = '�tes-vous s�r de vouloir vous d�sinscrire de ce groupe d�utilisateurs ?';
$lang['Confirm_unsub_pending'] = 'Votre inscription � ce groupe d�utilisateurs n�a pas encore �t� approuv�e. �tes-vous s�r de vouloir vous d�sinscrire ?';

$lang['Unsub_success'] = 'Vous avez �t� d�sinscrit de ce groupe d�utilisateurs avec succ�s.';

$lang['Approve_selected'] = 'Approuver la s�lection';
$lang['Deny_selected'] = 'D�sapprouver la s�lection';
$lang['Not_logged_in'] = 'Vous devez �tre inscrit afin d�adh�rer � ce groupe d�utilisateurs.';
$lang['Remove_selected'] = 'Supprimer la s�lection';
$lang['Add_member'] = 'Ajouter le membre';
$lang['Not_group_moderator'] = 'Vous n��tes pas le responsable de ce groupe d�utilisateurs. Par cons�quence, vous ne pouvez pas r�aliser cette action.';

$lang['Login_to_join'] = 'Vous connecter afin d�adh�rer ou de g�rer ce groupe d�utilisateurs';
$lang['This_open_group'] = 'Ceci est un groupe ouvert ; cliquez afin de r�aliser une demande d�adh�sion';
$lang['This_closed_group'] = 'Ceci est un groupe ferm� ; aucun utilisateur ne peut le rejoindre';
$lang['This_hidden_group'] = 'Ceci est un groupe invisible ; seul le responsable du groupe peut ajouter des membres';
$lang['Member_this_group'] = 'Vous n��tes pas un membre de ce groupe';
$lang['Pending_this_group'] = 'Votre adh�sion � ce groupe d�utilisateurs est en attente';
$lang['Are_group_moderator'] = 'Vous �tes le responsable de ce groupe d�utilisateurs';
$lang['None'] = 'Aucun';

$lang['Subscribe'] = 'Inscription';
$lang['Unsubscribe'] = 'D�sinscription';
$lang['View_Information'] = 'Voir les informations';


//
// Search
//
$lang['Search_query'] = 'Rechercher';
$lang['Search_options'] = 'Options de la recherche';

$lang['Search_keywords'] = 'Rechercher par mot-cl�';
$lang['Search_keywords_explain'] = 'Vous pouvez utiliser <u>AND</u> afin de d�terminer les mots qui doivent appara�tre dans les r�sultats, <u>OR</u> afin de d�terminer les mots qui peuvent appara�tre dans les r�sultats et <u>NOT</u> afin de d�terminer les mots qui ne doivent pas appara�tre dans les r�sultats. Utilisez * comme joker pour des recherches partielles';
$lang['Search_author'] = 'Rechercher par auteur';
$lang['Search_author_explain'] = 'Utilisez * comme joker pour des recherches partielles';

$lang['Search_for_any'] = 'Rechercher n�importe quels de ces termes ou utiliser une question comme entr�e';
$lang['Search_for_all'] = 'Rechercher pour tous les termes';
$lang['Search_title_msg'] = 'Rechercher dans les titres des sujets et les messages';
$lang['Search_msg_only'] = 'Rechercher dans les messages uniquement';

$lang['Return_first'] = 'Retourner les'; // followed by xxx characters in a select box
$lang['characters_posts'] = 'caract�res de messages';

$lang['Search_previous'] = 'Rechercher depuis'; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = 'Trier par';
$lang['Sort_Time'] = 'Heure du message';
$lang['Sort_Post_Subject'] = 'Sujet du message';
$lang['Sort_Topic_Title'] = 'Titre du sujet';
$lang['Sort_Author'] = 'Auteur';
$lang['Sort_Forum'] = 'Forum';

$lang['Display_results'] = 'Afficher les r�sultats sous forme de';
$lang['All_available'] = 'Tous disponibles';
$lang['No_searchable_forums'] = 'Vous ne pouvez pas rechercher un forum sur ce site.';

$lang['No_search_match'] = 'Aucun sujet ou message ne correspond � votre crit�re de recherche';
$lang['Found_search_match'] = 'La recherche a retourn� %d r�sultat'; // eg. Search found 1 match
$lang['Found_search_matches'] = 'La recherche a retourn� %d r�sultats'; // eg. Search found 24 matches
$lang['Search_Flood_Error'] = 'Vous ne pouvez pas effectuer une recherche aussit�t apr�s en avoir effectu� une. Veuillez r�essayer ult�rieurement.';

$lang['Close_window'] = 'Fermer la fen�tre';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = 'D�sol� mais seul %s peut publier des annonces dans ce forum.';
$lang['Sorry_auth_sticky'] = 'D�sol� mais seul %s peut publier des notes dans ce forum.'; 
$lang['Sorry_auth_read'] = 'D�sol� mais seul %s peut lire les sujets de ce forum.'; 
$lang['Sorry_auth_post'] = 'D�sol� mais seul %s peut publier des sujets dans ce forum.'; 
$lang['Sorry_auth_reply'] = 'D�sol� mais seul %s peut r�pondre aux messages de ce forum.';
$lang['Sorry_auth_edit'] = 'D�sol� mais seul %s peut �diter des messages de ce forum.'; 
$lang['Sorry_auth_delete'] = 'D�sol� mais seul %s peut supprimer des messages de ce forum.';
$lang['Sorry_auth_vote'] = 'D�sol� mais seul %s peut voter aux sondages de ce forum.';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>utilisateurs anonymes</b>';
$lang['Auth_Registered_Users'] = '<b>utilisateurs inscrits</b>';
$lang['Auth_Users_granted_access'] = '<b>utilisateurs ayant un acc�s sp�cial</b>';
$lang['Auth_Moderators'] = '<b>mod�rateurs</b>';
$lang['Auth_Administrators'] = '<b>administrateurs</b>';

$lang['Not_Moderator'] = 'Vous n��tes pas un mod�rateur de ce forum.';
$lang['Not_Authorised'] = 'Acc�s interdit';

$lang['You_been_banned'] = 'Vous avez �t� banni de ce forum.<br />Pour plus d�informations, veuillez contacter l�administrateur du forum.';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'Il y a 0 utilisateur inscrit et '; // There are 5 Registered and
$lang['Reg_users_online'] = 'Il y a %d utilisateurs inscrits et '; // There are 5 Registered and
$lang['Reg_user_online'] = 'Il y a %d utilisateur inscrit et '; // There is 1 Registered and
$lang['Hidden_users_zero_online'] = '0 utilisateur invisible en ligne'; // 6 Hidden users online
$lang['Hidden_users_online'] = '%d utilisateurs invisibles en ligne'; // 6 Hidden users online
$lang['Hidden_user_online'] = '%d utilisateur invisible en ligne'; // 6 Hidden users online
$lang['Guest_users_online'] = 'Il y a %d invit�s en ligne'; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = 'Il y a 0 invit� en ligne'; // There are 10 Guest users online
$lang['Guest_user_online'] = 'Il y a %d invit� en ligne'; // There is 1 Guest user online
$lang['No_users_browsing'] = 'Il n�y a aucun utilisateur parcourant actuellement le forum';

$lang['Online_explain'] = 'Ces donn�es sont bas�es sur les utilisateurs actifs des cinq derni�res minutes';

$lang['Forum_Location'] = 'Localisation du forum';
$lang['Last_updated'] = 'Derni�re mise � jour';

$lang['Forum_index'] = 'Index du forum';
$lang['Logging_on'] = 'Se connecter';
$lang['Posting_message'] = 'Publie un message';
$lang['Searching_forums'] = 'Effectue une recherche';
$lang['Viewing_profile'] = 'Consulte un profil';
$lang['Viewing_online'] = 'Consulte qui est en ligne';
$lang['Viewing_member_list'] = 'Consulte la liste des membres';
$lang['Viewing_priv_msgs'] = 'Consulter ses messages priv�s';
$lang['Viewing_FAQ'] = 'Consulte la FAQ';


//
// Moderator Control Panel
//
$lang['Mod_CP'] = 'Panneau de contr�le du mod�rateur';
$lang['Mod_CP_explain'] = 'En utilisant ce formulaire, vous pouvez r�aliser de nombreuses op�rations de mod�ration sur ce forum. Vous pouvez verrouiller, d�verrouiller, d�placer ou supprimer les sujets et les messages.';

$lang['Select'] = 'S�lectionner';
$lang['Delete'] = 'Supprimer';
$lang['Move'] = 'D�placer';
$lang['Lock'] = 'Verrouiller';
$lang['Unlock'] = 'D�verrouiller';

$lang['Topics_Removed'] = 'Les sujets que vous avez s�lectionn�s ont �t� supprim�s de la base de donn�es avec succ�s.';
$lang['Topics_Locked'] = 'Les sujets que vous avez s�lectionn�s ont �t� verrouill�s avec succ�s.';
$lang['Topics_Moved'] = 'Les sujets que vous avez s�lectionn�s ont �t� d�plac�s avec succ�s.';
$lang['Topics_Unlocked'] = 'Les sujets que vous avez s�lectionn�s ont �t� d�verrouill�s avec succ�s.';
$lang['No_Topics_Moved'] = 'Aucun sujet n�a �t� d�plac�.';

$lang['Confirm_delete_topic'] = '�tes-vous s�r de vouloir supprimer le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_lock_topic'] = '�tes-vous s�r de vouloir verrouiller le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_unlock_topic'] = '�tes-vous s�r de vouloir d�verrouiller le(s) sujet(s) s�lectionn�(s) ?';
$lang['Confirm_move_topic'] = '�tes-vous s�r de vouloir d�placer le(s) sujet(s) s�lectionn�(s) ?';

$lang['Move_to_forum'] = 'D�placer dans le forum';
$lang['Leave_shadow_topic'] = 'Laisser un clone sur place.';

$lang['Split_Topic'] = 'Panneau de contr�le de division de sujets';
$lang['Split_Topic_explain'] = 'En utilisant le formulaire ci-dessous, vous pouvez diviser un sujet en deux en s�lectionnant individuellement les messages � diviser ou en divisant � partir d�un message s�lectionn�';
$lang['Split_title'] = 'Titre du nouveau sujet';
$lang['Split_forum'] = 'Forum du nouveau sujet';
$lang['Split_posts'] = 'Diviser les messages s�lectionn�s';
$lang['Split_after'] = 'Diviser � partir d�un message s�lectionn�';
$lang['Topic_split'] = 'Le sujet que vous avez s�lectionn� a �t� divis� avec succ�s';

$lang['Too_many_error'] = 'Vous avez s�lectionn� un trop grand nombre de sujets. Vous ne pouvez s�lectionner qu�un seul message de ce sujet � diviser !';

$lang['None_selected'] = 'Vous n�avez s�lectionn� aucun message � diviser. Veuillez en s�lectionner au moins un.';
$lang['New_forum'] = 'Nouveau forum';

$lang['This_posts_IP'] = 'Adresse IP de ce message';
$lang['Other_IP_this_user'] = 'Autres adresses IP utilis�es par le r�dacteur';
$lang['Users_this_IP'] = 'Utilisateurs ayant publi�s � partir de cette adresse IP';
$lang['IP_info'] = 'Informations sur l�IP';
$lang['Lookup_IP'] = 'Rechercher une adresse IP';


//
// Timezones ... for display on each page
//
$lang['All_times'] = 'Heures au format %s'; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = 'GMT - 12 heures';
$lang['-11'] = 'GMT - 11 heures';
$lang['-10'] = 'GMT - 10 heures';
$lang['-9'] = 'GMT - 9 heures';
$lang['-8'] = 'GMT - 8 heures';
$lang['-7'] = 'GMT - 7 heures';
$lang['-6'] = 'GMT - 6 heures';
$lang['-5'] = 'GMT - 5 heures';
$lang['-4'] = 'GMT - 4 heures';
$lang['-3.5'] = 'GMT - 3.5 heures';
$lang['-3'] = 'GMT - 3 heures';
$lang['-2'] = 'GMT - 2 heures';
$lang['-1'] = 'GMT - 1 heure';
$lang['0'] = 'GMT';
$lang['1'] = 'GMT + 1 heure';
$lang['2'] = 'GMT + 2 heures';
$lang['3'] = 'GMT + 3 heures';
$lang['3.5'] = 'GMT + 3.5 heures';
$lang['4'] = 'GMT + 4 heures';
$lang['4.5'] = 'GMT + 4.5 heures';
$lang['5'] = 'GMT + 5 heures';
$lang['5.5'] = 'GMT + 5.5 heures';
$lang['6'] = 'GMT + 6 heures';
$lang['6.5'] = 'GMT + 6.5 heures';
$lang['7'] = 'GMT + 7 heures';
$lang['8'] = 'GMT + 8 heures';
$lang['9'] = 'GMT + 9 heures';
$lang['9.5'] = 'GMT + 9.5 heures';
$lang['10'] = 'GMT + 10 heures';
$lang['11'] = 'GMT + 11 heures';
$lang['12'] = 'GMT + 12 heures';
$lang['13'] = 'GMT + 13 heures';

// These are displayed in the timezone select box
$lang['tz']['-12'] = 'GMT - 12 heures';
$lang['tz']['-11'] = 'GMT - 11 heures';
$lang['tz']['-10'] = 'GMT - 10 heures';
$lang['tz']['-9'] = 'GMT - 9 heures';
$lang['tz']['-8'] = 'GMT - 8 heures';
$lang['tz']['-7'] = 'GMT - 7 heures';
$lang['tz']['-6'] = 'GMT - 6 heures';
$lang['tz']['-5'] = 'GMT - 5 heures';
$lang['tz']['-4'] = 'GMT - 4 heures';
$lang['tz']['-3.5'] = 'GMT - 3.5 heures';
$lang['tz']['-3'] = 'GMT - 3 heures';
$lang['tz']['-2'] = 'GMT - 2 heures';
$lang['tz']['-1'] = 'GMT - 1 heure';
$lang['tz']['0'] = 'GMT';
$lang['tz']['1'] = 'GMT + 1 heure';
$lang['tz']['2'] = 'GMT + 2 heures';
$lang['tz']['3'] = 'GMT + 3 heures';
$lang['tz']['3.5'] = 'GMT + 3.5 heures';
$lang['tz']['4'] = 'GMT + 4 heures';
$lang['tz']['4.5'] = 'GMT + 4.5 heures';
$lang['tz']['5'] = 'GMT + 5 heures';
$lang['tz']['5.5'] = 'GMT + 5.5 heures';
$lang['tz']['6'] = 'GMT + 6 heures';
$lang['tz']['6.5'] = 'GMT + 6.5 heures';
$lang['tz']['7'] = 'GMT + 7 heures';
$lang['tz']['8'] = 'GMT + 8 heures';
$lang['tz']['9'] = 'GMT + 9 heures';
$lang['tz']['9.5'] = 'GMT + 9.5 heures';
$lang['tz']['10'] = 'GMT + 10 heures';
$lang['tz']['11'] = 'GMT + 11 heures';
$lang['tz']['12'] = 'GMT + 12 heures';
$lang['tz']['13'] = 'GMT + 13 heures';

$lang['datetime']['Sunday'] = 'Dimanche';
$lang['datetime']['Monday'] = 'Lundi';
$lang['datetime']['Tuesday'] = 'Mardi';
$lang['datetime']['Wednesday'] = 'Mercredi';
$lang['datetime']['Thursday'] = 'Jeudi';
$lang['datetime']['Friday'] = 'Vendredi';
$lang['datetime']['Saturday'] = 'Samedi';
$lang['datetime']['Sun'] = 'Dim';
$lang['datetime']['Mon'] = 'Lun';
$lang['datetime']['Tue'] = 'Mar';
$lang['datetime']['Wed'] = 'Mer';
$lang['datetime']['Thu'] = 'Jeu';
$lang['datetime']['Fri'] = 'Ven';
$lang['datetime']['Sat'] = 'Sam';
$lang['datetime']['January'] = 'Janvier';
$lang['datetime']['February'] = 'F�vrier';
$lang['datetime']['March'] = 'Mars';
$lang['datetime']['April'] = 'Avril';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['June'] = 'Juin';
$lang['datetime']['July'] = 'Juillet';
$lang['datetime']['August'] = 'Ao�t';
$lang['datetime']['September'] = 'Septembre';
$lang['datetime']['October'] = 'Octobre';
$lang['datetime']['November'] = 'Novembre';
$lang['datetime']['December'] = 'D�cembre';
$lang['datetime']['Jan'] = 'Jan';
$lang['datetime']['Feb'] = 'Fev';
$lang['datetime']['Mar'] = 'Mar';
$lang['datetime']['Apr'] = 'Avr';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['Jun'] = 'Juin';
$lang['datetime']['Jul'] = 'Juil';
$lang['datetime']['Aug'] = 'Ao�';
$lang['datetime']['Sep'] = 'Sep';
$lang['datetime']['Oct'] = 'Oct';
$lang['datetime']['Nov'] = 'Nov';
$lang['datetime']['Dec'] = 'D�c';


//
// Errors (not related to a specific failure on a page)
//
$lang['Information'] = 'Informations';
$lang['Critical_Information'] = 'Informations critiques';

$lang['General_Error'] = 'Erreur g�n�rale';
$lang['Critical_Error'] = 'Erreur critique';
$lang['An_error_occured'] = 'Une erreur est survenue';
$lang['A_critical_error'] = 'Une erreur critique est survenue';
$lang['Admin_reauthenticate'] = 'Pour administrer ce forum vous devez vous identifier � nouveau.';
$lang['Login_attempts_exceeded'] = 'Vous avez d�pass� le nombre maximal de tentatives de connexions (%s). Vous ne pourrez ainsi plus vous connecter pendant %s minutes.';
$lang['Please_remove_install_contrib'] = 'Afin de terminer l\'installation, veuillez supprimer le dossier <span style="text-weight: bold;">install/</span> pr�sent � la racine de votre forum.'; 
$lang['Session_invalid'] = 'D�sol�, mais votre session est invalide; veuillez resoumettre le formulaire.';


//
// PREMOD
//


// Absent User Avatar
$lang['Absent_user_avatar'] = 'Mettre votre status en "Absent"';
$lang['Absent_user_avatar_Explain'] = 'Ceci pr�viendra les autres membres de votre absence par un simple avatar (d�fini par un <b>Administrateur</b>).';
$lang['Absent_user_avatar_status'] = '<b>- Absent -</b>';


// Annonce Globale
$lang['Topic_Global_Announcement'] = '<b>Annonce Globale : </b>';
$lang['Post_Global_Announcement'] = 'Annonce Globale';
$lang['Post_Global_Announcements'] = 'Annonces Globales';
$lang['Post_Announcement'] = 'Annonce';


// Attached Forums
$lang['Attached_forum'] = 'Sous-forum';
$lang['Attached_forums'] = 'Sous-forums';
$lang['Attached_forum_choose'] = 'Choisissez votre forum de rattachement';
$lang['Attached_forum_not_attached'] = 'Attach� � aucun forum';


// BBCode Box Reloaded
// acp
$lang['BBcode_Box'] = 'BBcode Box';
$lang['bbc_box_a_settings'] = 'Configuration';
$lang['bbc_box_b_list'] = 'Liste des bbcodes';
$lang['bbc_box_c_manage'] = 'Gestion';
// spoiler
$lang['bbcbxr_spoil'] = 'Spoiler';
$lang['bbcbxr_show'] = 'voir';
$lang['bbcbxr_hide'] = 'cacher';
// code expand
$lang['bbcbxr_expand'] = 'Agrandir';
$lang['bbcbxr_expand_more'] = 'Agrandir encore';
$lang['bbcbxr_contract'] = 'R�duire';
$lang['bbcbxr_select'] = 'Tout s�lectionner';
// hide add-on
$lang['Hide'] = 'Message prot�g�';
$lang['Hide_text'] = '--- Seul les *membres* ayant post� dans ce sujet peuvent voir le message ---';
$lang['Hide_in_quote'] = '--- phpBB : Le message prot�g� n\'est pas recopi� dans cette citation ---';
// thumbnail add-on
$lang['Thumbnails_alt'] = 'Image post�e, r�duite en taille. Si aucune image n\'est visible le serveur est mort ou non liable � distance';
$lang['Thumbnails_title'] = 'Cliquez pour agrandir';


// Corbeille
$lang['Envoyer_Corbeille'] = "Envoyer le sujet � la corbeille"; 


// DHTML Collapsible FAQ
// Please note: %sHERE%s is used to dynamically building the A HREF tag, do not remove the percent signs (%) around HERE!
$lang['dhtml_faq_noscript'] = "Il appara�t que votre navigateur ne supporte pas le javascript ou qu'il a �t� d�sactiv� dans les options de votre navigateur.<br /><br />Svp, cliquez %sici%s pour voir une version standard de la FAQ.";


// DHTML Collapsible Forum Index
$lang['CFI_options'] = "Options";
$lang['CFI_options_ex'] = "Collapsible Forum Index Options";
$lang['CFI_close'] = "Fermer";
$lang['CFI_delete'] = "Supprimer la sauvegarde";
$lang['CFI_restore'] = "Restaurer la sauvegarde";
$lang['CFI_save'] = "Sauvegarder";
$lang['CFI_Expand_all'] = "Tout �tendre";
$lang['CFI_Collapse_all'] = "Tout r�duire";


// Empty Name
$lang['Empty_name'] = 'Vous devez pr�ciser un nom d\'utilisateur pour pouvoir poster un nouveau sujet/message.';


// Forum Link
$lang['Forum_link_count'] = 'Ce lien a �t� visit� %d fois<br/>Depuis le %s';
$lang['Forum_link'] = 'Lien';


// Gender
$lang['Gender'] = 'Sexe';
$lang['Male'] = 'Masculin';
$lang['Female'] = 'F�minin';
$lang['No_gender_specify'] = 'Non sp�cifi�';


// Online/Offline/Hidden
$lang['Online'] = 'En ligne';
$lang['Offline'] = 'Absent';
$lang['Hidden'] = 'Invisible';
$lang['is_online'] = '%s est actuellement en ligne';
$lang['is_offline'] = '%s est absent';
$lang['is_hidden'] = '%s est invisible';
$lang['Online_status'] = 'Statut';


// Post Description
$lang['Topic_description'] = 'Description du sujet';


// Select Expand BBcodes
$lang['Expand'] = "�tendre";
$lang['Contract'] = "Contracter";


// Skype Messenger
$lang['SKYPE'] = 'Skype Messenger';


// Topics Nav Buttons
$lang['View_previous_post'] = 'Voir le message pr�c�dent';
$lang['View_next_post'] = 'Voir le message suivant';
$lang['Go_to_bottom'] = 'Aller en bas';


// Visit Counter
$lang['Visit_counter'] = 'Ce forum a eu <b>%d</b> visiteurs au total depuis le %s';


//-- mod : board generation time info ------------------------------------------
//-- add
$lang['Gzip_on'] = 'GZIP actif - ';
$lang['Debug_on'] = 'D�bogage actif';
$lang['Debug_off'] = 'D�bogage inactif';
$lang['Queries'] = 'Requ�tes: %s';
$lang['Generation_time'] = 'Temps: %s secondes';
//-- fin mod : board generation time info --------------------------------------


//-- mod : cnil website id -----------------------------------------------------
//-- add
$lang['CNIL_ID'] = 'Saisissez ici votre num�ro de d�claration aupr�s de la CNIL';
$lang['CNIL_ID_explain'] = 'Laissez ce champ vide, si vous souhaitez qu\'aucune information n\'apparaisse au bas du forum';
$lang['CNIL_ID_display'] = 'Ce site est d�clar� � la <a href="http://www.cnil.fr/" target="_blank" class="copyright">CNIL</a> sous le num�ro : <b>%s</b>';
//-- fin mod : cnil website id -------------------------------------------------


//-- mod : attach mod ----------------------------------------------------------
//-- add
$lang['Attached_Files'] = 'Fichiers joints';
//-- fin mod : attach mod ------------------------------------------------------

//
// That's all Folks!
// -------------------------------------------------

?>