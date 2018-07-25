<?php
/***************************************************************************
 *                            lang_admin.php [French]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php 6981 2007-02-10 12:14:24Z acydburn $
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
 *   Date: 07/03/2008 19:04:16
 *   Author: Xaphos (Ma�l Soucaze)
 *   Website: http://www.phpbb.fr/
 *
 ***************************************************************************/

/* CONTRIBUTORS
	2002-12-15	Philip M. White (pwhite@mailhaven.com)
		Fixed many minor grammatical mistakes
*/

//
// Format is same as lang_main
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = 'Administration g�n�rale';
$lang['Users'] = 'Administration des utilisateurs';
$lang['Groups'] = 'Administration des groupes';
$lang['Forums'] = 'Administration des forums';
$lang['Styles'] = 'Administration des styles';

$lang['Configuration'] = 'Configuration';
$lang['Permissions'] = 'Permissions';
$lang['Manage'] = 'Gestion';
$lang['Disallow'] = 'Interdire des noms';
$lang['Prune'] = 'D�lestage';
$lang['Mass_Email'] = 'E-mail de masse';
$lang['Ranks'] = 'Rangs';
$lang['Smilies'] = '�motic�nes';
$lang['Ban_Management'] = 'Contr�le des bannissements';
$lang['Word_Censor'] = 'Censure de mots';
$lang['Export'] = 'Exporter';
$lang['Create_new'] = 'Cr�er';
$lang['Add_new'] = 'Ajouter';
$lang['Backup_DB'] = 'Sauvegarder la base de donn�es';
$lang['Restore_DB'] = 'Restaurer la base de donn�es';


//
// Index
//
$lang['Admin'] = 'Administration';
$lang['Not_admin'] = 'Vous n��tes pas autoris� � administrer ce forum';
$lang['Welcome_phpBB'] = 'Bienvenue sur phpBB';
$lang['Admin_intro'] = 'Nous vous remercions d�avoir s�lectionn� phpBB comme solution pour votre forum. Cet �cran vous donne un aper�u rapide des diverses statistiques de votre forum. Vous pouvez retourner sur cette page en cliquant sur le lien <u>Index de l�administration</u> dans le panneau de gauche. Pour retourner � l�index de votre forum, cliquez sur le logo phpBB qui est �galement situ� dans le panneau de gauche. Les autres liens situ�s sur le volet � gauche de cet �cran vous permettront de contr�ler tous les aspects de votre forum. Chaque page contiendra des instructions sur l�utilisation des outils disponibles.';
$lang['Main_index'] = 'Index du forum';
$lang['Forum_stats'] = 'Statistiques du forum';
$lang['Admin_Index'] = 'Index de l�administration';
$lang['Preview_forum'] = 'Aper�u du forum';

$lang['Click_return_admin_index'] = 'Cliquez %sici%s afin de retourner � l�index de l�administration';

$lang['Statistic'] = 'Statistique';
$lang['Value'] = 'Valeur';
$lang['Number_posts'] = 'Nombre de messages';
$lang['Posts_per_day'] = 'Messages par jour';
$lang['Number_topics'] = 'Nombre de sujets';
$lang['Topics_per_day'] = 'Sujets par jour';
$lang['Number_users'] = 'Nombre d�utilisateurs';
$lang['Users_per_day'] = 'Utilisateurs par jour';
$lang['Board_started'] = 'Date d�ouverture du forum';
$lang['Avatar_dir_size'] = 'Taille du r�pertoire des avatars';
$lang['Database_size'] = 'Taille de la base de donn�es';
$lang['Gzip_compression'] ='Compression GZip';
$lang['Not_available'] = 'Indisponible';

$lang['ON'] = 'Activ�e'; // This is for GZip compression
$lang['OFF'] = 'D�sactiv�e'; 


//
// DB Utils
//
$lang['Database_Utilities'] = 'Utilitaires de la base de donn�es';

$lang['Restore'] = 'Restaurer';
$lang['Backup'] = 'Sauvegarder';
$lang['Restore_explain'] = 'Cela ex�cutera une restauration compl�te de toutes les tables de phpBB � partir d�un fichier de sauvegarde. Si votre serveur le supporte, vous pouvez utiliser un fichier texte compress� en GZip qui sera automatiquement d�compress�. <b>ATTENTION :</b> cela �crasera toutes les donn�es existantes. La restauration est un processus pouvant prendre beaucoup de temps, veuillez ne pas vous d�placer de la page avant que l�op�ration soit termin�e.';
$lang['Backup_explain'] = 'Vous pouvez sauvegarder ici toutes les donn�es relatives � votre forum phpBB. Si vous avez cr�� des tables additionnelles personnalis�es dans la m�me base de donn�es et que vous souhaitez les sauvegarder, veuillez saisir leurs noms, s�par�s par une virgule, dans la bo�te de texte <u>Tables additionnelles</u> ci-dessous. Si votre serveur le supporte, vous pouvez �galement compresser votre fichier au format GZip afin de r�duire sa taille avant de le t�l�charger.';

$lang['Backup_options'] = 'Options de la sauvegarde';
$lang['Start_backup'] = 'D�marrer la sauvegarde';
$lang['Full_backup'] = 'Sauvegarde compl�te';
$lang['Structure_backup'] = 'Sauvegarde de la structure uniquement';
$lang['Data_backup'] = 'Sauvegarde des donn�es uniquement';
$lang['Additional_tables'] = 'Tables additionnelles';
$lang['Gzip_compress'] = 'Fichier compress� GZip';
$lang['Select_file'] = 'S�lectionner un fichier';
$lang['Start_Restore'] = 'D�marrer la restauration';

$lang['Restore_success'] = 'La base de donn�es a �t� restaur�e avec succ�s.<br /><br />Votre forum devrait �tre tel qu�il l��tait lorsque la sauvegarde a �t� faite.';
$lang['Backup_download'] = 'Votre t�l�chargement va d�marrer sous peu ; veuillez patienter jusqu�� ce qu�il d�marre.';
$lang['Backups_not_supported'] = 'D�sol�, mais les sauvegardes ne sont actuellement pas support�es par votre syst�me de base de donn�es.';

$lang['Restore_Error_uploading'] = 'Erreur lors du transfert du fichier de sauvegarde';
$lang['Restore_Error_filename'] = 'Probl�me avec le nom du fichier ; veuillez essayer avec un autre fichier';
$lang['Restore_Error_decompress'] = 'Impossible de d�compresser le fichier GZip ; veuillez transf�rer un fichier texte';
$lang['Restore_Error_no_file'] = 'Aucun fichier n�a �t� transf�r�';


//
// Auth pages
//
$lang['Select_a_User'] = 'S�lectionner un utilisateur';
$lang['Select_a_Group'] = 'S�lectionner un groupe';
$lang['Select_a_Forum'] = 'S�lectionner un forum';
$lang['Auth_Control_User'] = 'Contr�le des permissions des utilisateurs'; 
$lang['Auth_Control_Group'] = 'Contr�le des permissions des groupes'; 
$lang['Auth_Control_Forum'] = 'Contr�le des permissions des forums'; 
$lang['Look_up_User'] = 'Rechercher un utilisateur'; 
$lang['Look_up_Group'] = 'Rechercher un groupe'; 
$lang['Look_up_Forum'] = 'Rechercher un forum'; 

$lang['Group_auth_explain'] = 'Vous pouvez modifier ici les permissions et le statut de mod�rateur assign�s � chaque groupe d�utilisateurs. N�oubliez pas qu�en modifiant les permissions des groupes, certaines permissions individuelles peuvent toutefois permettre � un utilisateur d�acc�der � un forum, etc. Vous serez averti si tel �tait le cas.';
$lang['User_auth_explain'] = 'Vous pouvez modifier ici les permissions et le statut de mod�rateur assign�s � chaque utilisateur individuel. N�oubliez pas qu�en modifiant les permissions des groupes, certaines permissions individuelles peuvent toutefois permettre � un utilisateur d�acc�der � un forum, etc. Vous serez averti si tel �tait le cas.';
$lang['Forum_auth_explain'] = 'Vous pouvez modifier ici les niveaux de permissions de chaque forum. Vous disposerez du mode simple et avanc� pour r�aliser cela, o� le mode avanc� offre un plus grand contr�le de chaque op�ration du forum. Rappelez-vous qu�en modifiant le niveau de permissions des forums, chaque utilisateur sera affect� des diverses op�rations faites dans celui-ci.';

$lang['Simple_mode'] = 'Mode simple';
$lang['Advanced_mode'] = 'Mode avanc�';
$lang['Moderator_status'] = 'Statut de mod�rateur';

$lang['Allowed_Access'] = 'Acc�s autoris�';
$lang['Disallowed_Access'] = 'Acc�s interdit';
$lang['Is_Moderator'] = 'est mod�rateur';
$lang['Not_Moderator'] = 'n�est pas mod�rateur';

$lang['Conflict_warning'] = 'Avertissement de conflit d�autorisations';
$lang['Conflict_access_userauth'] = 'Cet utilisateur disposera toujours des droits d�acc�s sur ce forum � cause de son appartenance � un groupe. Vous devriez modifier les permissions du groupe ou supprimer cet utilisateur du groupe afin de l�emp�cher compl�tement de disposer des droits d�acc�s. Les groupes (et les forums impliqu�s) accordant des droits sont indiqu�s ci-dessous.';
$lang['Conflict_mod_userauth'] = 'Cet utilisateur disposera toujours des droits de mod�rateur sur ce forum � cause de son appartenance � un groupe. Vous devriez modifier les permissions du groupe ou supprimer cet utilisateur du groupe afin de l�emp�cher compl�tement de disposer des droits de mod�rateur. Les groupes (et les forums impliqu�s) accordant des droits sont indiqu�s ci-dessous.';

$lang['Conflict_access_groupauth'] = 'L�utilisateur (ou les utilisateurs) suivant dispose toujours des droits d�acc�s sur ce forum � cause des r�glages des permissions de l�utilisateur. Vous devriez modifier les permissions de l�utilisateur afin de l�emp�cher compl�tement de disposer des droits d�acc�s. Les utilisateurs (et les forums impliqu�s) accordant des droits sont indiqu�s ci-dessous.';
$lang['Conflict_mod_groupauth'] = 'L�utilisateur (ou les utilisateurs) suivant dispose toujours des droits de mod�rateur sur ce forum � cause des r�glages des permissions de l�utilisateur. Vous devriez modifier les permissions de l�utilisateur afin de l�emp�cher compl�tement de disposer des droits de mod�rateur. Les utilisateurs (et les forums impliqu�s) accordant des droits sont indiqu�s ci-dessous.';

$lang['Public'] = 'Public';
$lang['Private'] = 'Priv�';
$lang['Registered'] = 'Inscrit';
$lang['Administrators'] = 'Administrateurs';
$lang['Hidden'] = 'Invisible';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'TOUS';
$lang['Forum_REG'] = 'INSCRITS';
$lang['Forum_PRIVATE'] = 'PRIV�';
$lang['Forum_MOD'] = 'MOD�RATEURS';
$lang['Forum_ADMIN'] = 'ADMINISTRATEURS';

$lang['View'] = 'Voir';
$lang['Read'] = 'Lire';
$lang['Post'] = 'Publier';
$lang['Reply'] = 'R�pondre';
$lang['Edit'] = '�diter';
$lang['Delete'] = 'Supprimer';
$lang['Sticky'] = 'Note';
$lang['Announce'] = 'Annonce'; 
$lang['Vote'] = 'Voter';
$lang['Pollcreate'] = 'Cr�er un sondage';

$lang['Permissions'] = 'Permissions';
$lang['Simple_Permission'] = 'Permissions simples';

$lang['User_Level'] = 'Niveau de l�utilisateur'; 
$lang['Auth_User'] = 'Utilisateur';
$lang['Auth_Admin'] = 'Administrateur';
$lang['Group_memberships'] = 'Adh�rents du groupe d�utilisateurs';
$lang['Usergroup_members'] = 'Ce groupe est compos� des membres suivants';

$lang['Forum_auth_updated'] = 'Les permissions des forums ont �t� mises � jour avec succ�s';
$lang['User_auth_updated'] = 'Les permissions des utilisateurs ont �t� mises � jour avec succ�s';
$lang['Group_auth_updated'] = 'Les permissions des groupes ont �t� mises � jour avec succ�s';

$lang['Auth_updated'] = 'Les permissions ont �t� mises � jour avec succ�s';
$lang['Click_return_userauth'] = 'Cliquez %sici%s pour retourner aux permissions des utilisateurs';
$lang['Click_return_groupauth'] = 'Cliquez %sici%s pour retourner aux permissions des groupes';
$lang['Click_return_forumauth'] = 'Cliquez %sici%s pour retourner aux permissions des forums';


//
// Banning
//
$lang['Ban_control'] = 'Contr�le des bannissements';
$lang['Ban_explain'] = 'Vous pouvez contr�ler ici le bannissement d�utilisateurs. Vous pouvez faire cela en bannissant un ou des utilisateurs sp�cifiques ou un ou des intervalles d�adresses IP ou de noms d�h�tes. Ces m�thodes emp�cheront un utilisateur d�atteindre les pages votre forum. Afin d�emp�cher un utilisateur de s�inscrire sous un nom d�utilisateur diff�rent, vous pouvez �galement bannir les adresses e-mail. Veuillez noter que bannir uniquement une adresse e-mail n�emp�chera pas l�utilisateur concern� de se connecter ou de publier des messages sur votre forum. Vous devrez utiliser une des deux premi�res m�thodes cit�es afin de r�aliser cela.';
$lang['Ban_explain_warn'] = 'Veuillez noter que la saisie d�un intervalle d�adresses IP ne prendra en compte que les adresses situ�es entre la premi�re et la derni�re adresse IP. Des essais seront effectu�s afin de r�duire le nombre d�adresses ajout�es � la base de donn�es en ajoutant automatiquement des jokers o� cela est appropri�. Si vous souhaitez tout de m�me saisir un intervalle, essayez de le rendre court ou au mieux, saisissez des adresses sp�cifiques.';

$lang['Select_username'] = 'S�lectionner un nom d�utilisateur';
$lang['Select_ip'] = 'S�lectionner une adresse IP';
$lang['Select_email'] = 'S�lectionner une adresse e-mail';

$lang['Ban_username'] = 'Bannir un ou plusieurs utilisateurs sp�cifiques';
$lang['Ban_username_explain'] = 'Vous pouvez bannir plusieurs utilisateurs en une fois en utilisant la combinaison appropri�e de la souris et du clavier de votre ordinateur et de votre navigateur Internet';

$lang['Ban_IP'] = 'Bannir une ou plusieurs adresses IP ou noms d�h�tes';
$lang['IP_hostname'] = 'Adresses IP ou noms d�h�tes';
$lang['Ban_IP_explain'] = 'Afin de sp�cifier plusieurs adresses IP ou plusieurs noms d�h�tes diff�rents, veuillez les s�parer par une virgule. Afin de sp�cifier un intervalle d�adresses IP, veuillez s�parer le d�but et la fin par un tiret (-). Afin de sp�cifier un joker, veuillez utiliser un ast�risque (*).';

$lang['Ban_email'] = 'Bannir une ou plusieurs adresses e-mail';
$lang['Ban_email_explain'] = 'Afin de sp�cifier plusieurs adresses e-mail, veuillez les s�parer par une virgule. Afin de sp�cifier un nom d�utilisateur joker, veuillez utiliser un ast�risque (*), comme *@hotmail.com';

$lang['Unban_username'] = 'D�bannir un ou plusieurs utilisateurs sp�cifiques';
$lang['Unban_username_explain'] = 'Vous pouvez d�bannir plusieurs utilisateurs en une fois en utilisant la combinaison appropri�e de la souris et du clavier de votre ordinateur et de votre navigateur Internet';

$lang['Unban_IP'] = 'D�bannir une ou plusieurs adresses IP ou noms d�h�tes';
$lang['Unban_IP_explain'] = 'Vous pouvez d�bannir plusieurs adresses IP ou plusieurs noms d�h�tes en une fois en utilisant la combinaison appropri�e de la souris et du clavier de votre ordinateur et de votre navigateur Internet';

$lang['Unban_email'] = 'D�bannir une ou plusieurs adresses e-mail';
$lang['Unban_email_explain'] = 'Vous pouvez d�bannir plusieurs adresses e-mail en une fois en utilisant la combinaison appropri�e de la souris et du clavier de votre ordinateur et de votre navigateur Internet';

$lang['No_banned_users'] = 'Aucun nom d�utilisateur n�a �t� banni';
$lang['No_banned_ip'] = 'Aucune adresse IP n�a �t� bannie';
$lang['No_banned_email'] = 'Aucune adresse e-mail n�a �t� bannie';

$lang['Ban_update_sucessful'] = 'La lise des bannissements a �t� mise � jour avec succ�s';
$lang['Click_return_banadmin'] = 'Cliquez %sici%s afin de retourner au contr�le des bannissements';


//
// Configuration
//
$lang['General_Config'] = 'Configuration g�n�rale';
$lang['Config_explain'] = 'Le formulaire ci-dessous vous permet de personnaliser toutes les options g�n�rales de votre forum. Pour les configurations des utilisateurs et des forums, veuillez utiliser les liens appropri�s situ�s sur le volet de gauche.';

$lang['Click_return_config'] = 'Cliquez %sici%s afin de retourner � la configuration g�n�rale';

$lang['General_settings'] = 'R�glages g�n�raux du forum';
$lang['Server_name'] = 'Nom de domaine';
$lang['Server_name_explain'] = 'Le nom de domaine � partir duquel ce forum fonctionne';
$lang['Script_path'] = 'Chemin du script';
$lang['Script_path_explain'] = 'Le chemin o� phpBB2 est install� par rapport au nom de domaine';
$lang['Server_port'] = 'Port du serveur';
$lang['Server_port_explain'] = 'Le port sous lequel fonctionne votre serveur, souvent 80. Ne le modifiez que s�il est diff�rent';
$lang['Site_name'] = 'Nom du site';
$lang['Site_desc'] = 'Description du site';
$lang['Board_disable'] = 'D�sactiver le forum';
$lang['Board_disable_explain'] = 'Cela rendra le forum indisponible aux utilisateurs. Les administrateurs pourront toutefois acc�der au panneau de contr�le de l�administrateur.';
$lang['Acct_activation'] = 'Activation du compte';
$lang['Acc_None'] = 'Aucune'; // These three entries are the type of activation
$lang['Acc_User'] = 'Utilisateur';
$lang['Acc_Admin'] = 'Administrateur';

$lang['Abilities_settings'] = 'R�glages de base des utilisateurs et des forums';
$lang['Max_poll_options'] = 'Nombre maximal d�options des sondages';
$lang['Flood_Interval'] = 'Intervalle de flood';
$lang['Flood_Interval_explain'] = 'Nombre de secondes durant lequel un utilisateur doit patienter avant de pouvoir publier de nouveau'; 
$lang['Board_email_form'] = 'Envoi d�e-mail par le forum';
$lang['Board_email_form_explain'] = 'Les utilisateurs pourront envoyer des e-mail aux autres utilisateurs par ce forum';
$lang['Topics_per_page'] = 'Sujets par page';
$lang['Posts_per_page'] = 'Messages par page';
$lang['Hot_threshold'] = 'Seuil de popularit� des messages';
$lang['Default_style'] = 'Style par d�faut';
$lang['Override_style'] = 'Remplacer le style des utilisateurs';
$lang['Override_style_explain'] = 'Remplace le style des utilisateurs avec celui par d�faut';
$lang['Default_language'] = 'Langue par d�faut';
$lang['Date_format'] = 'Format de la date';
$lang['System_timezone'] = 'Fuseau horaire';
$lang['Enable_gzip'] = 'Activer la compression GZip';
$lang['Enable_prune'] = 'Activer le d�lestage du forum';
$lang['Allow_HTML'] = 'Autoriser l�HTML';
$lang['Allow_BBCode'] = 'Autoriser le BBCode';
$lang['Allowed_tags'] = 'Balises HTML autoris�es';
$lang['Allowed_tags_explain'] = 'S�parez les balises par une virgule';
$lang['Allow_smilies'] = 'Autoriser les �motic�nes';
$lang['Smilies_path'] = 'Chemin de stockage des �motic�nes';
$lang['Smilies_path_explain'] = 'Le chemin depuis la racine de votre r�pertoire phpBB, ex : images/smiles';
$lang['Allow_sig'] = 'Autoriser les signatures';
$lang['Max_sig_length'] = 'Longueur maximale de la signature';
$lang['Max_sig_length_explain'] = 'Nombre de caract�res maximum dans les signatures des utilisateurs';
$lang['Allow_name_change'] = 'Autoriser la modification du nom d�utilisateur';

$lang['Avatar_settings'] = 'R�glages des avatars';
$lang['Allow_local'] = 'Activer la galerie des avatars';
$lang['Allow_remote'] = 'Activer les avatars � distance';
$lang['Allow_remote_explain'] = 'Les avatars situ�s sur un autre site Internet';
$lang['Allow_upload'] = 'Activer le transfert des avatars';
$lang['Max_filesize'] = 'Taille maximale de l�avatar';
$lang['Max_filesize_explain'] = 'Valable pour les avatars transf�r�s';
$lang['Max_avatar_size'] = 'Dimensions maximales de l�avatar';
$lang['Max_avatar_size_explain'] = '(hauteur x largeur en pixels)';
$lang['Avatar_storage_path'] = 'Chemin de stockage des avatars';
$lang['Avatar_storage_path_explain'] = 'Le chemin depuis la racine de votre r�pertoire phpBB, ex : images/avatars';
$lang['Avatar_gallery_path'] = 'Chemin de la galerie des avatars';
$lang['Avatar_gallery_path_explain'] = 'Le chemin depuis la racine de votre r�pertoire phpBB, ex : images/avatars/gallery';

$lang['COPPA_settings'] = 'R�glages de la COPPA';
$lang['COPPA_fax'] = 'Num�ro de fax de la COPPA';
$lang['COPPA_mail'] = 'Adresse postale de la COPPA';
$lang['COPPA_mail_explain'] = 'Ceci est l�adresse postale o� les parents doivent envoyer le formulaire d�inscription de la COPPA';

$lang['Email_settings'] = 'R�glages des e-mail';
$lang['Admin_email'] = 'Adresse e-mail de l�administrateur';
$lang['Email_sig'] = 'Signature de l�e-mail';
$lang['Email_sig_explain'] = 'Ce texte sera ins�r� dans tous les e-mail que le forum enverra';
$lang['Use_SMTP'] = 'Utiliser un serveur SMTP pour l�envoi d�e-mail';
$lang['Use_SMTP_explain'] = 'Envoi les e-mail par l�interm�diaire de ce serveur au lieu d�utiliser la fonction e-mail locale';
$lang['SMTP_server'] = 'Adresse du serveur SMTP';
$lang['SMTP_username'] = 'Nom d�utilisateur SMTP';
$lang['SMTP_username_explain'] = 'Ne saisir le nom d�utilisateur que si votre serveur SMTP le demande';
$lang['SMTP_password'] = 'Mot de passe SMTP';
$lang['SMTP_password_explain'] = 'Ne saisir le mot de passe que si votre serveur SMTP le demande';

$lang['Disable_privmsg'] = 'Messagerie priv�e';
$lang['Inbox_limits'] = 'Messages maximum dans la bo�te de r�ception';
$lang['Sentbox_limits'] = 'Messages maximum dans la bo�te d�envoi';
$lang['Savebox_limits'] = 'Messages maximum dans les archives';

$lang['Cookie_settings'] = 'R�glages du cookie'; 
$lang['Cookie_settings_explain'] = 'Ces informations d�finissent la m�thode d�envoi aux navigateurs des utilisateurs. Dans la plupart des cas, les valeurs par d�faut sont suffisantes, mais il se peut que vous ayez besoin de les modifier. Des r�glages incorrects pourraient provoquer des d�connexions chez vos utilisateurs';
$lang['Cookie_domain'] = 'Domaine du cookie';
$lang['Cookie_name'] = 'Nom du cookie';
$lang['Cookie_path'] = 'Chemin du cookie';
$lang['Cookie_secure'] = 'Cookie s�curis�';
$lang['Cookie_secure_explain'] = 'Si votre serveur fonctionne par l�interm�diaire d�SSL, activez cette fonctionnalit�';
$lang['Session_length'] = 'Dur�e de la session [ secondes ]';

// Visual Confirmation
$lang['Visual_confirm'] = 'Activer la confirmation visuelle';
$lang['Visual_confirm_explain'] = 'Les utilisateurs devront saisir un code situ� dans une image lors de leur inscription.';

// Autologin Keys - added 2.0.18
$lang['Allow_autologin'] = 'Autoriser les connexions automatiques';
$lang['Allow_autologin_explain'] = 'Autorise les utilisateurs � se connecter automatiquement lorsqu�ils visitent le forum';
$lang['Autologin_time'] = 'Expiration de la cl� de la connexion automatique';
$lang['Autologin_time_explain'] = 'Dur�e en jours de validit� de la cl� de la connexion automatique si les utilisateurs ne visitent pas le forum. Si cela est r�gl� sur z�ro, elle n�expirera jamais.';

// Search Flood Control - added 2.0.20
$lang['Search_Flood_Interval'] = 'Intervalle de flood de la recherche';
$lang['Search_Flood_Interval_explain'] = 'Nombre de secondes durant lequel un utilisateur devra patienter entre chaque recherche'; 

//
// Forum Management
//
$lang['Forum_admin'] = 'Administration des forums';
$lang['Forum_admin_explain'] = 'De ce panneau, vous pouvez ajouter, supprimer, �diter, r�organiser et resynchroniser les cat�gories et les forums.';
$lang['Edit_forum'] = '�diter le forum';
$lang['Create_forum'] = 'Cr�er un nouveau forum';
$lang['Create_category'] = 'Cr�er une nouvelle cat�gorie';
$lang['Remove'] = 'Supprimer';
$lang['Action'] = 'Action';
$lang['Update_order'] = 'Mettre � jour l�ordre';
$lang['Config_updated'] = 'La configuration du forum a �t� mise � jour avec succ�s';
$lang['Edit'] = '�diter';
$lang['Delete'] = 'Supprimer';
$lang['Move_up'] = 'Monter';
$lang['Move_down'] = 'Descendre';
$lang['Resync'] = 'Resynchroniser';
$lang['No_mode'] = 'Aucun mode n�a �t� r�gl�';
$lang['Forum_edit_delete_explain'] = 'Le formulaire ci-dessous vous permettra de personnaliser toutes les options g�n�rales du forum. Pour ce qui concerne les configurations des utilisateurs ou des forums, veuillez utiliser les liens situ�s sur le volet de gauche.';

$lang['Move_contents'] = 'D�placer tout le contenu';
$lang['Forum_delete'] = 'Supprimer un forum';
$lang['Forum_delete_explain'] = 'Le formulaire ci-dessous vous permettra de supprimer un forum ou une cat�gorie et de d�placer tous les sujets ou les forums qu�il contient o� vous souhaitez.';

$lang['Status_locked'] = 'Verrouill�';
$lang['Status_unlocked'] = 'D�verrouill�';
$lang['Forum_settings'] = 'R�glages g�n�raux des forums';
$lang['Forum_name'] = 'Nom du forum';
$lang['Forum_desc'] = 'Description';
$lang['Forum_status'] = 'Statut du forum';
$lang['Forum_icon'] = 'Ic�ne du forum<br /><span class="gensmall">Par exemple, si v�tre image est situ�e ci-contre : <b>phpBBRoot/images/forum_icon/test.gif</b><br /> alors il faudra indiquer comme ceci : <b>images/forum_icon/test.gif</b></span>';
// Forum Icon MOD
$lang['Forum_pruning'] = 'D�lestage automatique';
$lang['prune_freq'] = 'V�rifier l��ge des sujets tous les';
$lang['prune_days'] = 'Supprimer les sujet n�ayant obtenus aucune r�ponse depuis';
$lang['Set_prune_data'] = 'Vous souhaitez activer le d�lestage automatique dans ce forum mais nous n�avez pas r�gl� sa fr�quence ou son nombre de jours. Veuillez apporter ces r�glages.';
$lang['Move_and_Delete'] = 'D�placer et supprimer';
$lang['Delete_all_posts'] = 'Supprimer tous les messages';
$lang['Nowhere_to_move'] = 'Nulle part o� d�placer';
$lang['Edit_Category'] = '�diter une cat�gorie';
$lang['Edit_Category_explain'] = 'Utilisez ce formulaire pour modifer le nom d\'une cat�gorie.';
$lang['Forums_updated'] = 'Les informations sur le forum ou sur la cat�gorie ont �t� mises � jours avec succ�s';

$lang['Must_delete_forums'] = 'Vous devez supprimer tous les forums de cette cat�gorie avant de pouvoir la supprimer';
$lang['Click_return_forumadmin'] = 'Cliquez %sici%s afin de retourner � l�administration des forums';


//
// Smiley Management
//
$lang['smiley_title'] = 'Utilitaire d��dition des �motic�nes';
$lang['smile_desc'] = 'De cette page vous pouvez ajouter, supprimer et �diter les �motic�nes que vous utilisateurs utilisent dans leurs messages et messages priv�s.';

$lang['smiley_config'] = 'Configuration des �motic�nes';
$lang['smiley_code'] = 'Code de l��motic�ne';
$lang['smiley_url'] = 'Image de l��motic�ne';
$lang['smiley_emot'] = '�motion';
$lang['smile_add'] = 'Ajouter une nouvelle �motic�ne';
$lang['Smile'] = '�motic�ne';
$lang['Emotion'] = '�motion';

$lang['Select_pak'] = 'S�lectionner une archive d��motic�nes .pak';
$lang['replace_existing'] = 'Remplacer l��motic�ne existante';
$lang['keep_existing'] = 'Pr�server l��motic�ne existante';
$lang['smiley_import_inst'] = 'Vous devez extraire l�archive d��motic�nes et transf�rer tous les fichiers dans le r�pertoire propre aux �motic�nes pour votre installation. Cela s�lectionnera l�information correcte dans ce formulaire afin d�importer l�archive d��motic�nes.';
$lang['smiley_import'] = 'Importer l�archive d��motic�nes';
$lang['choose_smile_pak'] = 'S�lectionner une archive d��motic�nes .pak';
$lang['import'] = 'Importer les �motic�nes';
$lang['smile_conflicts'] = 'Que doit-il �tre fait en cas de conflits ?';
$lang['del_existing_smileys'] = 'Supprimer les �motic�nes existantes avant l�importation';
$lang['import_smile_pack'] = 'Importer l�archive d��motic�nes';
$lang['export_smile_pack'] = 'Cr�er une archive d��motic�nes';
$lang['export_smiles'] = 'Pour cr�er une archive d��motic�nes de vos �motic�nes install�es existantes, veuillez cliquer %sici%s afin de t�l�charger le fichier smiles.pak. Renommez le fichier correctement en pr�servant l�extension .pak. Cela cr�era un fichier .zip qui contiendra toutes les images et les configurations de vos �motic�nes.';
$lang['smiley_add_success'] = 'L��motic�ne a �t� ajout�e avec succ�s';
$lang['smiley_edit_success'] = 'L��motic�ne a �t� mise � jour avec succ�s';
$lang['smiley_import_success'] = 'L�archive d��motic�nes a �t� import�e avec succ�s !';
$lang['smiley_del_success'] = 'L��motic�ne a �t� supprim�e avec succ�s';
$lang['Click_return_smileadmin'] = 'Cliquez %sici%s afin de retourner � la configuration des �motic�nes';
$lang['Confirm_delete_smiley'] = '�tes-vous s�r de vouloir supprimer cette �motic�ne ?';


//
// User Management
//
$lang['User_admin'] = 'Administration des utilisateurs';
$lang['User_admin_explain'] = 'Vous pouvez modifier ici les informations et certaines options de vos utilisateurs. Pour modifier les permissions des utilisateurs, veuillez utiliser le syst�me de permissions des utilisateurs et des groupes d�utilisateurs.';
$lang['Look_up_user'] = 'Rechercher un utilisateur';
$lang['Admin_user_fail'] = 'Il n�a pas �t� possible de mettre � jour le profil de l�utilisateur.';
$lang['Admin_user_updated'] = 'Le profil de l�utilisateur a �t� mis � jour avec succ�s.';
$lang['Click_return_useradmin'] = 'Cliquez %sici%s afin de retourner � l�administration des utilisateurs';
$lang['User_delete'] = 'Supprimer cet utilisateur';
$lang['User_delete_explain'] = 'Cliquez ici afin de supprimer cet utilisateur. Cette op�ration est irr�versible.';
$lang['User_deleted'] = 'L�utilisateur a �t� supprim� avec succ�s.';
$lang['User_status'] = 'L�utilisateur est actif';
$lang['User_allowpm'] = 'Peut envoyer des messages priv�s';
$lang['User_allowavatar'] = 'Peut afficher un avatar';
$lang['Admin_avatar_explain'] = 'Vous pouvez consulter et supprimer ici l�avatar actuel de l�utilisateur.';
$lang['User_special'] = 'Champs sp�ciaux r�serv�s � l�administrateur';
$lang['User_special_explain'] = 'Ces champs ne peuvent pas �tre modifi�s par les utilisateurs. Vous pouvez r�gler ici leurs statuts et les autres options qui ne sont pas fournies aux utilisateurs.';


//
// Group Management
//
$lang['Group_administration'] = 'Administration des groupes';
$lang['Group_admin_explain'] = 'De ce panneau vous pouvez administrer tous les groupes d�utilisateurs. Vous pouvez supprimer, cr�er et �diter les groupes d�utilisateurs existants. Vous pouvez choisir des responsables, ouvrir ou fermer le statut d�un groupe d�utilisateurs et modifier son nom et sa description';
$lang['Error_updating_groups'] = 'Une erreur est survenue lors de la mise � jour des groupes d�utilisateurs';
$lang['Updated_group'] = 'Le groupe d�utilisateurs a �t� mis � jour avec succ�s';
$lang['Added_new_group'] = 'Le nouveau groupe d�utilisateurs a �t� cr�e avec succ�s';
$lang['Deleted_group'] = 'Le groupe d�utilisateurs a �t� supprim� avec succ�s';
$lang['New_group'] = 'Cr�er un nouveau groupe';
$lang['Edit_group'] = '�diter le groupe';
$lang['group_name'] = 'Nom du groupe';
$lang['group_description'] = 'Description du groupe';
$lang['group_moderator'] = 'Responsable du groupe';
$lang['group_status'] = 'Statut du groupe';
$lang['group_open'] = 'Groupe ouvert';
$lang['group_closed'] = 'Groupe ferm�';
$lang['group_hidden'] = 'Groupe invisible';
$lang['group_delete'] = 'Supprimer un groupe';
$lang['group_delete_check'] = 'Supprimer ce groupe';
$lang['submit_group_changes'] = 'Envoyer les modifications';
$lang['reset_group_changes'] = 'Remise � z�ro des modifications';
$lang['No_group_name'] = 'Vous devez saisir le nom de ce groupe';
$lang['No_group_moderator'] = 'Vous devez sp�cifier le responsable du groupe';
$lang['No_group_mode'] = 'Vous devez sp�cifier le statut du groupe, ouvert ou ferm�';
$lang['No_group_action'] = 'Aucune action n�a �t� sp�cifi�e';
$lang['delete_group_moderator'] = 'Supprimer l�ancien responsable du groupe ?';
$lang['delete_moderator_explain'] = 'Si vous souhaitez modifier le responsable du groupe, cochez cette case afin de supprimer l�ancien responsable du groupe. Dans le cas contraire, ne la cochez pas et l�utilisateur deviendra simplement un membre du groupe.';
$lang['Click_return_groupsadmin'] = 'Cliquez %sici%s afin de retourner � l�administration des groupes.';
$lang['Select_group'] = 'S�lectionner un groupe';
$lang['Look_up_group'] = 'Rechercher un groupe';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'D�lester un forum';
$lang['Forum_Prune_explain'] = 'Cela supprimera tous les sujets qui n�ont pas �t� publi�s dans le nombre de jours que vous avez s�lectionn�. Si vous ne souhaitez pas saisir un nombre, tous les sujets seront alors supprim�s. Cela ne supprimera ni sujets dans lesquels un sondage est en cours, ni les annonces. Vous devrez supprimer ces sujets manuellement.';
$lang['Do_Prune'] = 'R�aliser le d�lestage';
$lang['All_Forums'] = 'Tous les forums';
$lang['Prune_topics_not_posted'] = 'D�lester les sujets sans r�ponse � partir de ce nombre de jours';
$lang['Topics_pruned'] = 'Sujets d�lest�s';
$lang['Posts_pruned'] = 'Messages d�lest�s';
$lang['Prune_success'] = 'Les forums ont �t� d�lest�s avec succ�s';


//
// Word censor
//
$lang['Words_title'] = 'Censure de mots';
$lang['Words_explain'] = 'De ce panneau de contr�le vous pouvez ajouter, �diter et supprimer les mots qui seront automatiquement censur�s sur votre forum. De plus, il ne sera plus possible de s�inscrire avec un nom d�utilisateur contenant un de ces mots. Les jokers (*) sont accept�s dans le champ du mot. Par exemple, *test* censurera d�testable, test* censurera testament, *test censurera contest.';
$lang['Word'] = 'Mot';
$lang['Edit_word_censor'] = '�diter la censure du mot';
$lang['Replacement'] = 'Remplacement';
$lang['Add_new_word'] = 'Ajouter un nouveau mot';
$lang['Update_word'] = 'Mettre � jour la censure du mot';

$lang['Must_enter_word'] = 'Vous devez saisir un mot et son remplacement';
$lang['No_word_selected'] = 'Aucun mot n�a �t� s�lectionn� pour l��dition';

$lang['Word_updated'] = 'La censure du mot que vous avez s�lectionn�e a �t� mise � jour avec succ�s';
$lang['Word_added'] = 'La censure du mot a �t� ajout�e avec succ�s';
$lang['Word_removed'] = 'La censure du mot que vous avez s�lectionn�e a �t� supprim�e avec succ�s';

$lang['Click_return_wordadmin'] = 'Cliquez %sici%s afin de retourner � la censure de mots';
$lang['Confirm_delete_word'] = '�tes-vous s�r de vouloir supprimer la censure du mot s�lectionn�e ?';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'Vous pouvez envoyer ici des messages e-mail � tous les utilisateurs ou groupes d�utilisateurs de votre forum. Pour r�aliser cela, un e-mail sera envoy� � partir de l�adresse e-mail que vous avez sp�cifi�e avec une copie envoy�e � tous les destinataires. Si vous envoyez un e-mail de masse � de nombreux utilisateurs, merci de patienter et de ne pas quitter la page le temps de l�envoi. Il est normal qu�un e-mail un masse prenne un certain temps, vous serez averti lorsque le script aura termin�';
$lang['Compose'] = 'Composer'; 
$lang['Recipients'] = 'Destinataires'; 
$lang['All_users'] = 'Tous les utilisateurs';
$lang['Email_successfull'] = 'Votre message a �t� envoy� avec succ�s';
$lang['Click_return_massemail'] = 'Cliquez %sici%s afin de retourner au formulaire de l�e-mail de masse';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Administration des rangs';
$lang['Ranks_explain'] = 'En utilisant ce formulaire vous pouvez ajouter, �diter, consulter et supprimer des rangs. Vous pouvez �galement cr�er des rangs personnalis�s qui seront mis en place � des utilisateurs sp�cifiques par l�interm�diaire de l�outil de gestion des utilisateurs';
$lang['Add_new_rank'] = 'Ajouter un nouveau rang';

$lang['Rank_title'] = 'Titre du rang';
$lang['Rank_special'] = 'D�finir comme rang sp�cial';
$lang['Rank_minimum'] = 'Messages minimum';
$lang['Rank_maximum'] = 'Messages maximum';
$lang['Rank_image'] = 'Image du rang';
$lang['Rank_image_explain'] = 'Utilisez cela afin de d�finir une petite image associ�e avec le rang. Elle est relative au chemin � la racine de phpBB';

$lang['Must_select_rank'] = 'Vous devez s�lectionner un rang';
$lang['No_assigned_rank'] = 'Aucun rang sp�cial n�a �t� d�fini';

$lang['Rank_updated'] = 'Le rang a �t� mis � jour avec succ�s';
$lang['Rank_added'] = 'Le rang a �t� ajout� avec succ�s';
$lang['Rank_removed'] = 'Le rang a �t� supprim� avec succ�s';
$lang['No_update_ranks'] = 'Le rang a �t� supprim� avec succ�s. Cependant, les comptes des utilisateurs utilisant ce rang n�ont pas �t� mis � jour. Vous devez r�initialiser manuellement le rang sur ces comptes';

$lang['Click_return_rankadmin'] = 'Cliquez %sici%s afin de retourner � l�administration des rangs';
$lang['Confirm_delete_rank'] = '�tes-vous s�r de vouloir supprimer ce rang ?';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Panneau de restriction des noms d\'utilisateurs';
$lang['Disallow_explain'] = 'Cette page vous permet de g�rer les noms d\'utilisateurs interdit � l\'usage. Les noms d\'utilisateurs interdits peuvent contenir des jokers (*). Veuillez noter qu\'il est impossible d\'interdire le nom d\'un utilisateur d�j� enregistr�. Vous devrez pr�alablement supprimer le compte de cet utilisateur avant d\'en interdire le nom.';
$lang['Delete_disallow'] = 'Supprimer';
$lang['Delete_disallow_title'] = 'Supprimer un nom d\'utilisateur interdit';
$lang['Delete_disallow_explain'] = 'Vous pouvez supprimer un nom d\'utilisateur interdit en le s�lectionnant dans la liste puis en cliquant sur \'Supprimer\'';
$lang['Add_disallow'] = 'Ajouter';
$lang['Add_disallow_title'] = 'Ajouter un nom d\'utilisateur interdit';
$lang['Add_disallow_explain'] = 'Vous pouvez interdire un nom d\'utilisateur en utilisant des jokers (*) pour remplacer n\'importe quel caract�re';
$lang['No_disallowed'] = 'Aucun nom d\'utilisateur interdit';
$lang['Disallowed_deleted'] = 'Le nom d\'utilisateur interdit a �t� correctement supprim�';
$lang['Disallow_successful'] = 'Le nom d\'utilisateur interdit a bien �t� ajout�';
$lang['Disallowed_already'] = 'Le nom que vous avez entr� ne peut �tre interdit. Soit il existe d�j� dans la liste des noms d\'utilisateurs interdit, soit il figure dans la liste des mots censur�s, soit il est actuellement utilis� par un utilisateur enregistr�.';
$lang['Click_return_disallowadmin'] = 'Cliquez %sici%s pour revenir au panneau de restriction des noms d\'utilisateurs';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Administration des th�mes';
$lang['Styles_explain'] = 'Cette page vous permet d\'ajouter, supprimer et g�rer les styles (mod�les de documents et th�mes) disponibles aupr�s des utilisateurs';
$lang['Styles_addnew_explain'] = 'La liste suivante contient tous les th�mes qui sont disponibles dans votre dossier /templates, et non install�s. Pour installer un th�me, cliquez simplement sur le lien installer � c�t� du nom du th�me.';
$lang['Select_template'] = 'S�lectionner un mod�le de document';
$lang['Style'] = 'Th�me';
$lang['Template'] = 'Mod�le de document';
$lang['Install'] = 'Installer';
$lang['Download'] = 'T�l�charger';
$lang['Edit_theme'] = 'Editer un th�me';
$lang['Edit_theme_explain'] = 'Vous pouvez modifier les r�glages du th�me s�lectionn� dans le formulaire suivant';
$lang['Create_theme'] = 'Cr�er un th�me';
$lang['Create_theme_explain'] = 'Utilisez le formulaire ci-dessous pour cr�er un nouveau th�me pour le mod�le de document s�lectionn�. Lorsque vous entrez une couleur (le code hexad�cimal est imp�ratif) vous ne devrez pas inclure le # initial. Autrement dit : CCCCCC est valide, #CCCCCC ne l\'est pas';
$lang['Export_themes'] = 'Exporter des th�mes';
$lang['Export_explain'] = 'Cette page vous permet d\'exporter les informations d\'un th�me pour le mod�le de document s�lectionn�. Selectionnez un mod�le de document depuis la liste ci-dessous et un fichier de configuration du th�me sera cr�� et sauvegard� dans le dossier du mod�le de document. Si le fichier de configuration ne peut �tre sauvegard�, il vous sera propos� de le t�l�charger. Pour permettre la sauvegarde du fichier, vous devez donner les droits d\'�criture sur le r�pertoire du th�me (chmod 666 minimum). Pour plus de renseignements, consultez le guide des utilisateurs de phpBB 2.';
$lang['Theme_installed'] = 'Le th�me s�lectionn� a �t� correctement install�';
$lang['Style_removed'] = 'Le th�me s�lectionn� a bien �t� supprim� de la base de donn�es. Pour le supprimer totalement vous devez effacer les fichiers contenus dans le r�pertoire du mod�le de document.';
$lang['Theme_info_saved'] = 'Les informations du th�me pour le mod�le de document s�lectionn� ont �t� correctement sauvegard�es. Vous devriez d�s � pr�sent remettre les permissions du fichier theme_info.cfg (et si possible celle du r�pertoire du mod�le de document selectionn�) en lecture seule';
$lang['Theme_updated'] = 'Le th�me s�lectionn� a �t� correctement mis � jour. Vous devriez d�s � pr�sent exporter les nouveaux param�tres du th�me';
$lang['Theme_created'] = 'Le th�me a bien �t� cr�e. Vous devriez d�s � pr�sent exporter le th�me vers un fichier de configuration de th�me afin de le conserver en lieu sur ou de le r�utiliser plus tard.';
$lang['Confirm_delete_style'] = 'Voulez-vous vraiment supprimer ce th�me ?';
$lang['Download_theme_cfg'] = 'Le script d\'exportation ne peut pas �crire le fichier d\'information du th�me. Cliquez sur le bouton ci-dessous pour t�l�charger le fichier avec votre navigateur. Une fois t�l�charg�, vous pouvez le transf�rer dans le r�pertoire contenant les fichiers du th�me. Vous pouvez ensuite cr�er un pack de ces fichiers pour le distribuer ou l\'utiliser autrement si vous le souhaitez';
$lang['No_themes'] = 'Le mod�le de document que vous avez s�lectionn� ne poss�de pas de th�me associ�. Pour cr�er un nouveau th�me cliquez sur le lien cr�er un th�me dans le volet de gauche';
$lang['No_template_dir'] = 'Impossible d\'ouvrir le r�pertoire du mod�le de document. Il est peut-�tre illisible par le serveur ou n\'existe pas';
$lang['Cannot_remove_style'] = 'Vous ne pouvez pas supprimer le th�me tant qu\'il est d�finit comme �tant le th�me par d�faut du forum. Veuillez changer le th�me par d�faut et essayer � nouveau.';
$lang['Style_exists'] = 'Le nom du th�me choisi existe d�j�, veuillez revenir en arri�re et choisir un nom diff�rent.';
$lang['Click_return_styleadmin'] = 'Cliquez %sici%s pour revenir � l\'administration des th�mes';

$lang['Theme_settings'] = 'Options du th�me';
$lang['Theme_element'] = 'Element du th�me';
$lang['Simple_name'] = 'Nom Simple';
$lang['Value'] = 'Valeur';
$lang['Save_Settings'] = 'Sauvegarder les param�tres';

$lang['Stylesheet'] = 'Feuille de style CSS';
$lang['Stylesheet_explain'] = 'Nom du fichier de la feuille de style CSS � utiliser pour ce th�me.';
$lang['Background_image'] = 'Image de fond';
$lang['Background_color'] = 'Couleur de fond';
$lang['Theme_name'] = 'Nom du th�me';
$lang['Link_color'] = 'Couleur du lien';
$lang['Text_color'] = 'Couleur du texte';
$lang['VLink_color'] = 'Couleur du lien visit�';
$lang['ALink_color'] = 'Couleur du lien actif';
$lang['HLink_color'] = 'Couleur du lien survol�';
$lang['Tr_color1'] = 'Couleur 1 des lignes';
$lang['Tr_color2'] = 'Couleur 2 des lignes';
$lang['Tr_color3'] = 'Couleur 3 des lignes';
$lang['Tr_class1'] = 'Classe 1 des lignes';
$lang['Tr_class2'] = 'Classe 2 des lignes';
$lang['Tr_class3'] = 'Classe 3 des lignes';
$lang['Th_color1'] = 'Couleur 1 des cellules en-t�te';
$lang['Th_color2'] = 'Couleur 2 des cellules en-t�te';
$lang['Th_color3'] = 'Couleur 3 des cellules en-t�te';
$lang['Th_class1'] = 'Classe 1 des cellules en-t�te';
$lang['Th_class2'] = 'Classe 2 des cellules en-t�te';
$lang['Th_class3'] = 'Classe 3 des cellules en-t�te';
$lang['Td_color1'] = 'Couleur 1 des cellules';
$lang['Td_color2'] = 'Couleur 2 des cellules';
$lang['Td_color3'] = 'Couleur 3 des cellules';
$lang['Td_class1'] = 'Classe 1 des cellules';
$lang['Td_class2'] = 'Classe 2 des cellules';
$lang['Td_class3'] = 'Classe 3 des cellules';
$lang['fontface1'] = 'Nom de la police 1';
$lang['fontface2'] = 'Nom de la police 2';
$lang['fontface3'] = 'Nom de la police 3';
$lang['fontsize1'] = 'Taille de la police 1';
$lang['fontsize2'] = 'Taille de la police 2';
$lang['fontsize3'] = 'Taille de la police 3';
$lang['fontcolor1'] = 'Couleur de la police 1';
$lang['fontcolor2'] = 'Couleur de la police 2';
$lang['fontcolor3'] = 'Couleur de la police 3';
$lang['span_class1'] = 'Span Classe 1';
$lang['span_class2'] = 'Span Classe 2';
$lang['span_class3'] = 'Span Classe 3';
$lang['img_poll_size'] = 'Taille des barres de sondage [px]';
$lang['img_pm_size'] = 'Taille des barres de la messagerie priv�e [px]';


//
// Install Process
//
$lang['Welcome_install'] = 'Bienvenue � l\'installation de StyleMOD 1.2.x';
$lang['Initial_config'] = 'Configuration de base';
$lang['DB_config'] = 'Configuration de la base de donn�es';
$lang['Admin_config'] = 'Configuration du compte administrateur';
$lang['continue_upgrade'] = 'Une fois le fichier de configuration t�l�charg� sur votre ordinateur, vous pouvez cliquer sur le bouton \'Continuer la mise � jour\' ci-dessous afin de continuer le processus de mise � jour. Veuillez patienter jusqu\'� la fin de la mise � jour avant d\'uploader le fichier de configuration (config.php).';
$lang['upgrade_submit'] = 'Continuer la mise � jour';

$lang['Installer_Error'] = 'Une erreur s\'est produite au cours de l\'installation';
$lang['Previous_Install'] = 'Une installation ant�rieure de phpBB a �t� d�tect�e';
$lang['Install_db_error'] = 'Une erreur s\'est produite lors de la tentative de mise � jour de la base de donn�es';

$lang['Re_install'] = 'Votre installation ant�rieure est toujours active.<br /><br />Si vous souhaitez r�-installer phpBB 2, cliquez sur le bouton \'Oui\' ci-dessous. Veuillez noter que ceci va supprimer toutes les informations et qu\'aucune sauvegarde ne sera faite ! Le nom et le mot de passe de l\'administrateur vont �tre recr��s apr�s la r�-installation, rien d\'autre ne sera conserv�.<br /><br />R�fl�chissez � deux fois avant de cliquer sur \'Oui\' !';

$lang['Inst_Step_0'] = 'Merci d\'avoir choisi phpBB 2. Afin de poursuivre l\'installation, veuillez compl�ter soigneusement le formulaire ci-dessous. Veuillez noter que la base de donn�es dans laquelle vous allez installer devrait d�j� exister. Si vous �tes en train d\'installer sur une base de donn�es qui utilise ODBC, MS Access par exemple, vous devez d\'abord lui cr�er un SGBD avant de continuer.';

$lang['Start_Install'] = 'Commencer l\'installation';
$lang['Finish_Install'] = 'Terminer l\'installation';

$lang['Default_lang'] = 'Langue utilis�e par d�faut sur le forum';
$lang['DB_Host'] = 'Nom du serveur de base de donn�es / SGBD';
$lang['DB_Name'] = 'Nom de votre base de donn�es';
$lang['DB_Username'] = 'Nom d\'utilisateur de la base de donn�es';
$lang['DB_Password'] = 'Mot de passe de la base de donn�es';
$lang['Database'] = 'Votre base de donn�es';
$lang['Install_lang'] = 'Choisissez la langue pour l\'installation';
$lang['dbms'] = 'Type de la base de donn�es';
$lang['Table_Prefix'] = 'Pr�fixe des tables';
$lang['Admin_Username'] = 'Nom d\'utilisateur de l\'administrateur';
$lang['Admin_Password'] = 'Mot de passe de l\'administrateur';
$lang['Admin_Password_confirm'] = 'Confirmez le mot de passe de l\'administrateur';

$lang['Inst_Step_2'] = 'Votre nom d\'utilisateur (administrateur) a �t� cr��. � ce point, l\'installation basique du forum est termin�e. Vous allez maintenant �tre redirig� vers une page qui vous permettra d\'administrer votre nouvelle installation. Veuillez vous assurer de v�rifier les d�tails de la configuration g�n�rale et d\'op�rer les changements qui s\'imposent. Merci d\'avoir choisi phpBB 2.';

$lang['Unwriteable_config'] = 'Votre fichier de configuration est en lecture seule actuellement. Une copie du fichier va vous �tre proposer en t�l�chargement d�s que vous aurez cliqu� sur le bouton ci-dessous. Vous devrez uploader ce fichier � la racine de votre forum. Une fois r�alis�, vous pourrez vous connecter en tant qu\'administrateur avec le nom et le mot de passe donn�s dans le formulaire pr�c�dent. Vous pourrez visiter le panneau d\'administration (un lien apparra�tra en bas de chaque page une fois connect�) pour v�rifier la configuration g�n�rale. Merci d\'avoir choisi phpBB 2.';
$lang['Download_config'] = 'T�l�charger le fichier de configuration';

$lang['ftp_choose'] = 'Choisir la m�thode de t�l�chargement';
$lang['ftp_option'] = '<br />Tant que les extensions FTP seront activ�es dans cette version de PHP, l\'option d\'essayer d\'envoyer automatiquement le fichier config sur un ftp peut vous �tre donn�e.';
$lang['ftp_instructs'] = 'Vous avez choisi de transferer automatiquement le fichier vers le r�pertoire contenant phpBB 2 par FTP. Veuillez compl�ter les informations ci-dessous afin de faciliter le processus. Notez que le chemin du FTP doit �tre exactement celui du r�pertoire o� est install� votre forum, comme si vous �tiez en train d\'envoyer le fichier avec n\'importe quel client FTP.';
$lang['ftp_info'] = 'Entrez vos informations FTP';
$lang['Attempt_ftp'] = 'Essayer de transf�rer le fichier de configuration vers un serveur FTP';
$lang['Send_file'] = 'Juste m\'envoyer le fichier et je l\'enverrai manuellement sur le serveur FTP';
$lang['ftp_path'] = 'Chemin de phpBB2 sur le FTP';
$lang['ftp_username'] = 'Votre nom d\'utilisateur sur le FTP';
$lang['ftp_password'] = 'Votre mot de passe sur le FTP';
$lang['Transfer_config'] = 'D�marrer le transfert';
$lang['NoFTP_config'] = 'La tentative d\'envois du fichier de configuration par FTP a �chou�. Veuillez t�l�charger le fichier et le mettre en ligne manuellement.';

$lang['Install'] = 'Installation';
$lang['Upgrade'] = 'mise � jour';
$lang['Install_Method'] = 'Choix du type d\'installation';
$lang['Install_No_Ext'] = 'La configuration de PHP sur votre serveur ne supporte pas le type de base de donn�es que vous avez choisi';
$lang['Install_No_PCRE'] = 'phpBB 2 requiert le support des expressions r�guli�res Perl pour PHP. Il semblerait que votre configuration de PHP ne le supporte pas !';


//
// Version Check
//
$lang['Version_up_to_date'] = 'Votre installation est � jour, aucune mise � jour n�est disponible pour votre version de phpBB.';
$lang['Version_not_up_to_date'] = 'Votre installation ne semble <b>pas</b> � jour. Des mises � jour sont disponibles, veuillez vous rendre sur <a href="http://www.phpbb.com/downloads.php" target="_new">http://www.phpbb.com/downloads.php</a> ou sur <a href="http://www.phpbb.fr/" target="_new">http://www.phpbb.fr/</a> afin d�obtenir la derni�re version de phpBB.';
$lang['Latest_version_info'] = 'La derni�re version disponible est <b>phpBB %s</b>.';
$lang['Current_version_info'] = 'Vous utilisez actuellement <b>phpBB %s</b>.';
$lang['Connect_socket_error'] = 'Impossible d�ouvrir une connexion au serveur de phpBB. L�erreur rapport�e est :<br />%s';
$lang['Socket_functions_disabled'] = 'Impossible d�utiliser les fonctions du port.';
$lang['Mailing_list_subscribe_reminder'] = 'Pour obtenir les derni�res informations � propos des mises � jour de phpBB, pourquoi ne pas vous <a href="http://www.phpbb.com/support/" target="_new">inscrire sur notre liste de diffusion</a> ?';
$lang['Version_information'] = 'Information sur la version';


//
// Login attempts configuration
//
$lang['Max_login_attempts'] = 'Tentatives de connexions autoris�es';
$lang['Max_login_attempts_explain'] = 'Le nombre de tentatives de connexions autoris�es sur le forum.';
$lang['Login_reset_time'] = 'Dur�e de verrouillage de la connexion';
$lang['Login_reset_time_explain'] = 'Dur�e en minutes que l�utilisateur devra patienter le temps de pouvoir de nouveau se connecter apr�s avoir d�pass� le nombre de tentatives de connexions autoris�es.';



//
// PREMOD
//


// Absent User Avatar
$lang['Absent_avatar'] = 'Avatar d\'un membre "Absent"';
$lang['Absent_avatar_explain'] = 'Indiquez ici l\'Avatar qui remplacera celui d\'un membre dont son status sera "Absent"';


// AdminUsers Extend
$lang['AdminUsers_extend_choose'] = 'Afficher les utilisateurs : <a href="%s">actifs</a>, <a href="%s">inactifs</a>, ou <a href="%s">tous</a>.';
$lang['AdminUsers_extend_list'] = 'Liste des utilisateurs';
$lang['AdminUsers_extend_all'] = 'Tous';
$lang['AdminUsers_extend_active'] = 'Membres Actifs';
$lang['AdminUsers_extend_inactive'] = 'Membres Inactifs';
$lang['Activate'] = 'Activer';


//Advance Admin Index
$lang['Board_statistic'] = 'Statistiques du forum';
$lang['Database_statistic'] = 'Statistiques de la Base De Donn�es';
$lang['Version_info'] = 'Informations de Version';
$lang['Thereof_deactivated_users'] = 'Nombre de Membres Inactifs';
$lang['Thereof_Moderators'] = 'Nombres de Mod�rateurs';
$lang['Thereof_Administrators'] = 'Nombres d\'Administrateurs';
$lang['Deactivated_Users'] = 'Membres en attente d\'Activation';
$lang['Users_with_Admin_Privileges'] = 'Membres ayant les droits d\'Administrateur';
$lang['Users_with_Mod_Privileges'] = 'Membres ayant les droits de Mod�rateur';
$lang['DB_size'] = 'Taille de la Base De Donn�es';
$lang['Version_of_board'] = 'Version de <a href="http://www.phpbb.com">phpbb</a>';
$lang['Version_of_PHP'] = 'Version de <a href="http://www.php.net/">PHP</a>';
$lang['Version_of_MySQL'] = 'Version de <a href="http://www.mysql.com/">MySQL</a>';


// Annonce Globale
$lang['Global_Announce'] = 'Annonce Globale';
$lang['Annonce_Globale_Index'] = 'Afficher les Annonces Globales sur l\'Index ?';


// Attached Forums
$lang['Attached_Field_Title'] = 'Sous-forums';
$lang['Attached_Description'] = 'Ce champs a �t� ajout� par le MOD sub-forums. Cela montrera tous les forums attachables (si disponible) dans cette cat�gorie';
$lang['Detach_Description'] = 'D�tacher tous les forums';
$lang['Has_attachments'] = 'Ce forum a d\'autres forums qui lui sont attach�s. Si vous assignez une nouvelle cat�gorie � ce forum cela fera bouger tous ces sous-forums vers la nouvelle cat�gorie sauf si vous cochez la case "D�tacher"';
$lang['No_attach_forums'] = 'Pas de forum attachable dans cette cat�gorie';


// Attachments
$lang['Attach_Attachments'] = 'Fichiers joints';
$lang['Attach_Extensions'] = 'Extensions';


// Corbeille
$lang['Corbeille_forum'] = 'Forum Corbeille';
$lang['Corbeille_forum_explain'] = 'Entrez ici l\'ID du forum qui va agir en tant que Corbeille.<br />Pour trouver l\'ID du forum voulu, cliquez sur ce forum en question et retenez sur la barre d\'adresse le num�ro se trouvant apr�s : <b>viewforum.php?f=</b><br />L\'ID correspond � ce chiffre.';


// Forum Link
$lang['Forum_link'] = 'Lien externe';
$lang['Forum_link_explain'] = 'Laissez ce champs vide si vous voulez que ce forum se comporte normalement.<br>Pour le transformer en lien externe, entrez tout simplement l\'URL du lien.';


// Online/Offline/Hidden
$lang['Online_time'] = 'Dur&eacute;e du statut en ligne';
$lang['Online_time_explain'] = 'Nombre de secondes durant lequel un membre doit &ecirc;tre affich&eacute; en ligne (ne pas utiliser une valeur inf&eacute;rieur � 60).';
$lang['Online_setting'] = 'Menu du Satut';
$lang['Online_color'] = 'Couleur du texte En ligne';
$lang['Offline_color'] = 'Couleur du texte Absent';
$lang['Hidden_color'] = 'Couleur du texte Invisible';


// Reason
$lang['reason'] = 'Raison de la fermeture';


// crewstyle's mod : Simple Split Topic Type
$lang['Simple_split_topic_type'] = 'S�parer les diff�rents types de sujets sur le viewforum ?';
// crewstyle's mod : Simple Split Topic Type


//-- mod : resize posted images based on max width -----------------------------
//-- add
$lang['Images_max_size'] = 'Veuillez saisir la taille maximale en pixels';
$lang['Images_max_size_explain'] = 'Toute image d�passant cette valeur sera r�duite automatiquement.';
//-- fin mod : resize posted images based on max width -------------------------


// BEGIN Disable Registration MOD
$lang['registration_status'] = 'D�sactiver les inscriptions';
$lang['registration_status_explain'] = 'Ceci permet de d�sactiver momentan�ment les inscriptions � votre forum.';
$lang['registration_closed'] = 'Raison de la clot�re des inscriptions';
$lang['registration_closed_explain'] = 'Texte expliquant la raison de la fermeture des inscriptions, qui s\'affichera lorsqu\'un utilisateur voudra s\'inscrire. Laisser blanc pour afficher le texte par d�faut.';
// END Disable Registration MOD 

//
// That's all Folks!
// -------------------------------------------------

?>