<?php
/***************************************************************************
 *                                constants.php
 *                         
 ***************************************************************************/
 
// L'Arcade n'est plus seulement un espace o� jouer
// mais aussi un portail. il serait donc sympa de pouvoir modifier facilement le nom de la page
//
// Si vous souhaitez que la page d'arcade ne soit plus arcade.php mais console_de_jeux.php
// REMPLACEZ arcade par console_de_jeux. N'oublier pas de renommer le fichier comme il se doit ;o)
// Le num�ro en comentaire sera celui utilis� dans la base de donn�e pour identifier le type de la salle
// !!! Ce num�ro est NON modifiable !!!

define('NOM_ARCADE','arcade');		// 1 
define('NOM_GAME','games');		// 2 
define('NOM_NEWS','news');		// 3  news / calendrier / ... 
define('NOM_DWLD','downloads');		// 4  gestionnaire de fichiers / attach mod
define('NOM_ALBUM','album');		// 5  album smartor ? / autres
define('NOM_TUTO','tutoriels');		// 6  
define('NOM_FAQ','faq');		// 7  
define('NOM_BLOG','blog');		// 8  The blog mod? 
define('NOM_VENTE','vente');		// 9  en pr�vision
define('NOM_LIVRES','livres');		// 10 livresBB ?
define('NOM_JEUX','jeux');		// 11 Poker ? Pendu ? 
define('NOM_MONOPOLY','monopoly');	// 12 Monopoly? 
define('NOM_SUDOKU','sudoku');		// 13 Sudoku ?
define('NOM_ANNUAIRE','annuaire');	// 14 un annuaire de sites par exemple
define('NOM_VIDEOS','videos');	// 15 un gestionnaires de vid�os
define('NOM_PORTAIL','portail');	// 16 portail 
define('NOM_DEMOS','demos');	// 17 des d�mos..
define('NOM_BIBLIO','bibiliographie');	// 18 classement de livres
define('NOM_RPG','rpg');	// 19 un RPG? 
define('NOM_CUISINE','cuisine');	// 20
define('NOM_RECETTE','recette');	// 21
define('NOM_FICHE','fiche');	// 22 
define('NOM_BULLETIN','bulletin');	// 23
define('NOM_NEWSLETTER','newsletter');	// 24 
define('NOM_ACCUEIL','accueil');	// 25
define('NOM_CHAT','chat');	// 26



// Chemin d'acc�s aux jeux
define('CHEMIN_JEU',$phpbb_root_path.'areabb/games/');
// chemin d'acc�s aux mods
define('CHEMIN_MODS',$phpbb_root_path.'areabb/mods/');
// chemin d'acc�s aux videos
define('CHEMIN_VIDEOS',$phpbb_root_path.'areabb/mods/videoflash/videos/');
// chemin d'acc�s au cache du mod lien
define('CHEMIN_LIENS',$phpbb_root_path.'areabb/cache/mod_lien.html');


// ID des pages
define('PAGE_ADMIN_AREABB', 1000);
define('PAGE_ARCADES', 1001);
define('PAGE_GAME', 1002);
define('PAGE_NEWS', 1003);
define('PAGE_DWLD', 1004);
define('PAGE_ALBUM', 1005);
define('PAGE_TUTO', 1006);
define('PAGE_FAQ', 1007);
define('PAGE_BLOG', 1008);
define('PAGE_VENTE', 1009);
define('PAGE_LIVRES', 1010);
define('PAGE_JEUX', 1011);
define('PAGE_MONOPOLY', 1012);
define('PAGE_SUDOKU', 1013);
define('PAGE_ANNUAIRE', 1014);
define('PAGE_VIDEOS', 1015);
define('PAGE_PORTAIL', 1016);
define('PAGE_DEMOS', 1017);
define('PAGE_BIBLIO', 1018);
define('PAGE_RPG', 1019);
define('PAGE_ACCUEIL', 1020);
define('PAGE_CHAT', 1021);


// Liste des constantes de tables SQL
define('AREABB_GAMES_TABLE', $table_prefix.'areabb_games');
define('AREABB_SCORES_TABLE', $table_prefix.'areabb_scores');
define('AREABB_HACKGAME_TABLE', $table_prefix.'areabb_hackgame');
define('AREABB_CATEGORIES_TABLE', $table_prefix.'areabb_categories');
define('AREABB_NOTE',$table_prefix.'areabb_note');
define('AREABB', $table_prefix.'areabb_config');
define('AREABB_MODELE',$table_prefix.'areabb_modeles');
define('AREABB_FEUILLE',$table_prefix.'areabb_feuille');
define('AREABB_SQUELETTE',$table_prefix.'areabb_squelette');
define('AREABB_BLOCS',$table_prefix.'areabb_blocs');
define('AREABB_MODS',$table_prefix.'areabb_mods');
define('AREABB_BLOCS_HTML',$table_prefix.'areabb_blocs_html');
define('AREABB_CHAMPIONNAT',$table_prefix.'areabb_championnat');
define('AREABB_SCORES_CHAMP',$table_prefix.'areabb_scores_champ');
define('AREABB_FLUX_RSS',$table_prefix.'areabb_fluxrss');
define('AREABB_LIENS',$table_prefix.'areabb_liens');
define('AREABB_VIDEOFLASH',$table_prefix.'areabb_videoflash');
define('AREABB_VIDEOFLASH_CAT',$table_prefix.'areabb_videoflash_cat');
define('AREABB_ULTIMATE_SCORE',$table_prefix.'areabb_ultimate_score');

?>