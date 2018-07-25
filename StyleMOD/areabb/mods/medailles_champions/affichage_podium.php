<?php 
define('IN_PHPBB', true); 
$phpbb_root_path = '../../../'; 
include($phpbb_root_path . 'extension.inc'); 
include($phpbb_root_path . 'common.'.$phpEx); 
include($phpbb_root_path . 'areabb/fonctions/preload.' . $phpEx);
load_lang('main');
load_lang('medailles_champions');

// les 3 users séléctionnés
$user1 = intval($HTTP_GET_VARS['user1']);
$user2 = intval($HTTP_GET_VARS['user2']);
$user3 = intval($HTTP_GET_VARS['user3']);

// intialisation de la class d'imagerie
include($phpbb_root_path . 'areabb/mods/medailles_champions/class_image.' . $phpEx);
$im = new generation_image('images/'.$areabb['medailles_champ_image']);

// qualité de l'image finale
$im->qualite = intval($areabb['medailles_champ_qualite']);
// la librairie TTF est dispo sur le serveur ?
if ($areabb['medailles_champ_ttf'] == 1) $im->ttf = 1;
// Le user souhaite-t-il utiliser des ombres ?
if ($areabb['medailles_champ_ombre'] == 1) $im->ombre = 1;

// coordonnées des zones d'affichage de l'avatar
// Premier
$crd = explode(':',$areabb['medailles_champ_crd1']);
$x1 = intval($crd[0]); // Zone centrale parfaite
$y1 = intval($crd[1]); // extremité haute de la marche
// Second
$crd = explode(':',$areabb['medailles_champ_crd2']);
$x2 = intval($crd[0]); // Zone centrale parfaite
$y2 = intval($crd[1]); // extremité haute de la marche
// Troisieme
$crd = explode(':',$areabb['medailles_champ_crd3']);
$x3 = intval($crd[0]); // Zone centrale parfaite
$y3 = intval($crd[1]); // extremité haute de la marche


// Définition des couleurs
$im->assigner_couleur('Texte',$areabb['medailles_champ_cpseudo']);
$im->assigner_couleur('ombre',$areabb['medailles_champ_combre']);
$im->assigner_couleur('Erreur','#ff0303');

// Fichier temporaire de destination
$im->fic_temp = $phpbb_root_path.'areabb/cache/medailles/podium_'.$user1.'_'.$user2.'_'.$user3.'.'.$im->extension_source;
	

if (file_exists($im->fic_temp))
{
	header('location: '.$im->fic_temp);
	exit;
}


// Fonction renvoyant le chemin vers l'avatar

function url_avatar($user_avatar_type,$user_allowavatar,$user_avatar)
{
	global $board_config,$phpbb_root_path;
	$avatar_img = $phpbb_root_path .'areabb/images/guest_avatar.gif';
	if ( $user_avatar_type && $user_allowavatar )
	{
		switch($user_avatar_type )
		{
			case USER_AVATAR_UPLOAD:
				$avatar_img = ( $board_config['allow_avatar_upload'] ) ? $phpbb_root_path .$board_config['avatar_path'] . '/' . $user_avatar : '';
				break;
			case USER_AVATAR_REMOTE:
				$avatar_img = ( $board_config['allow_avatar_remote'] ) ? $user_avatar : '';
				break;
			case USER_AVATAR_GALLERY:
				$avatar_img = ( $board_config['allow_avatar_local'] ) ? $phpbb_root_path . $board_config['avatar_gallery_path'] . '/' . $user_avatar : '';
				break;
		}
	}
	return  $avatar_img;
}

//Récupération des données 
$sql = 'SELECT username,user_id,user_avatar_type,user_avatar, user_allowavatar
		FROM '. USERS_TABLE .' as u 
		WHERE user_id IN ('.$user1.','.$user2.','.$user3.')
		LIMIT 3';
if( !($result = $db->sql_query($sql)) )
{
	message_die(GENERAL_ERROR, 'Could not query recent classification information', '', __LINE__, __FILE__, $sql);
}
if ($db->sql_numrows($result) < 1 )
{
	ImageString($im->image, 3, 105, 3, $lang['L_MED_ERREUR_PERSONNE'] , $im->Cl['Erreur']);
}else{
	// les personnes choisies existent
	while( $row = $db->sql_fetchrow($result) )
	{
		if ($user3 == $row['user_id'])
		{
			$avatar = url_avatar($row['user_avatar_type'],$row['user_allowavatar'],$row['user_avatar']);
			$im->placer_image($avatar,$x3,$y3);	
			// texte, police d'ecriture,  couleur du texte, couleur de l'ombre du texte, taille du texte			
			$im->placer_username($row['username'],$areabb['medailles_champ_font'],$im->Cl['Texte'],$im->Cl['ombre'],$areabb['medailles_champ_taille']);		
		} elseif($user2 == $row['user_id']){
			$avatar = url_avatar($row['user_avatar_type'],$row['user_allowavatar'],$row['user_avatar']);
			$im->placer_image($avatar,$x2,$y2);
			$im->placer_username($row['username'],$areabb['medailles_champ_font'],$im->Cl['Texte'],$im->Cl['ombre'],$areabb['medailles_champ_taille']);		
		} elseif($user1 == $row['user_id']){
			$avatar = url_avatar($row['user_avatar_type'],$row['user_allowavatar'],$row['user_avatar']);
			$im->placer_image($avatar,$x1,$y1);
			$im->placer_username($row['username'],$areabb['medailles_champ_font'],$im->Cl['Texte'],$im->Cl['ombre'],$areabb['medailles_champ_taille']);			
		}
	}
}
$im->afficher_image();
header('location: '.$im->fic_temp);
?>