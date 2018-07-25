<?php
//--------------------------------------------------------------------------------------------------------------------------------------
//                             class_squelette.php
//
//   Commenc� le   :  samedi 28 Mai 2006
//   Par  Saint-Pere
//
//--------------------------------------------------------------------------------------------------------------------------------------



class generation_squelette
{
	var $id_squelette;
	var $squelette;
	var $liste_blocs;
	var $liste_mods;
	var $liste_blocs_html;
	var $root;
	var $copyright;
	var $style;
		
	function generation_squelette($root='./')
	{
		global $areabb;
		$this->id_squelette = $areabb['default_squelet'];
		$this->root = $root;
		$this->style= '<link rel="stylesheet" id="cssRef" href="areabb/fonctions/js/floating_window_with_tabs-skin2.css" media="screen">
<script type="text/javascript" src="areabb/fonctions/js/floating_window_with_tabs.js"></script>
<div id="profile" style="overflow:hidden"></div>';
		$this->copyright =  '<br /><center><a href="http://www.areabb.com" target="_phpbb" class="copyright">Portail AreaBB</a></center>' ;
	}
	
	// 
	// Si vous souhaiter modifier la convention de nommage des fichiers cache c'est ici
	function definir_cache()
	{
		define ('CACHE', $this->root.'areabb/cache/squelette_'.$this->id_squelette.'.tpl');
		define ('BLOCS', $this->root.'areabb/cache/blocs_'.$this->id_squelette.'.txt');
	}
	
	//
	// Ajoute un modele dans la base
	//
	// Un mod�le est un squelete en (x)HTML/Javascript
	function ajouter_modele_base($modele,$details)
	{
		global $db;
		
		$sql = 'INSERT INTO '. AREABB_MODELE .' (modele, details) 
				VALUES (\''.$modele.'\',\''.$details.'\')';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Impossible d\'ajouter ce modele', '', __LINE__, __FILE__, $sql); 
		}
		return true;
	}
	
	//
	// Supprime un modele de la base
	//
	function supprimer_modele_base($id_modele)
	{
		// suppression de la table des modeles
		global $db;
	
		$sql = 'DELETE FROM '.AREABB_MODELE.'
				WHERE id_modele='.$id_modele;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer ce modele 1/3", '', __LINE__, __FILE__, $sql); 
		}
		
		// suppression des blocs qui l'utilisent
		$sql = 'DELETE FROM '. AREABB_BLOCS .' 
				WHERE id_feuille IN 
				( \'
					SELECT id_feuille 
					FROM '. AREABB_FEUILLE .' 
					WHERE id_modele='.$id_modele.'
				  \'
				)';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer ce modele 2/3", '', __LINE__, __FILE__, $sql); 
		}		
		// suppression  des feuilles qui l'utilisent
		$sql = 'DELETE FROM '. AREABB_FEUILLE .'
				WHERE id_modele='.$id_modele;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer ce modele 3/3", '', __LINE__, __FILE__, $sql); 
		}
		return true;		
	}
	
	//
	// Modification du modele
	// il est imp�ratif qu'il conserve le m�me nombre de %s
	// sinon on pourrait se retrouver dans l'�ventualit� de squelettes impossible � monter
	//
	function modifier_modele_base($id_modele,$modele,$details)
	{
		global $db;
		$sql =  'SELECT modele, details 
				FROM '. AREABB_MODELE .' 
				WHERE id_modele= '.$id_modele.' 
				LIMIT 1 ' ;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de r�cuperer les infos sur ce modele pour les modifier", '', __LINE__, __FILE__, $sql); 
		}				
		// on compte le nombre de bloc actuellement
		$row = $db->sql_fetchrow($result);
		$nbre_blocs = substr_count($row['modele'],'%s');
		
		// On compte le nouveau nombre de blocs
		// le nombre doit �tre le m�me
		$nbre_blocs_new = substr_count($modele,'%s');

		if ($nbre_blocs > $nbre_blocs_new)
		{
			// on rajoute � la fin autant de %s qu'il en faudra
			FOR ($i=0;$i<($nbre_blocs - $nbre_blocs_new);$i++)
			{
				$modele .= ' %s';
			}
		}elseif($nbre_blocs < $nbre_blocs_new)
		{
			// On enleve autant de %s qu'il le faudra
			$modele = preg_replace('/%s/', '', $modele,($nbre_blocs_new - $nbre_blocs));
		}
		
		// on enregistre les nouvelles donn�es du modele
		$sql= 'UPDATE '. AREABB_MODELE.' 
				SET modele=\''.$modele.'\', details=\''.$details.'\'
				WHERE id_modele='.$id_modele;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de modifier les infos sur ce modele", '', __LINE__, __FILE__, $sql); 
		}	
		return true;
	}
	
	//
	// Ajoute un squelette dans la base
	//
	// parfois je parle de squelette et parfois de salle. On est d'accord sur le fond c'est la m�me chose. 
	// toutefois le terme squelette est + appropri� pour une compr�hension d�veloppeur, et le terme salle 
	// pour l'utilisateur final qui lui n'y connait rien en dev.
	// Veuillez donc m'excuser si parfois j'utilise l'un et 2 lignes plus tard l'autre.
	function ajouter_squelette($titre,$pagephp)
	{
		global $db;
		// valeur maximale du squelette
		$sql = 'SELECT MAX(position) as max FROM '. AREABB_SQUELETTE; 
		$row = $db->sql_fetchrow($db->sql_query($sql));
		$max = ($row['max'] == '' || $row['max'] < 10)? 0: ($row['max']+1);
		
		$sql = 'INSERT INTO '. AREABB_SQUELETTE .' (titre, type, position) 
				VALUES (\''.$titre.'\','.$pagephp.', '.$max.')';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'ajouter ce squelette", '', __LINE__, __FILE__, $sql); 
		}	
		return true;
	}
	
	//
	// D�place un squelette en haut ou en bas
	// + = monter le squelette dans la liste des squelettes de meme type
	// - = descendre le squelette dans la liste
	
	function monter_squelette($id_squelette,$type,$sens='+')
	{
		global $db;
		$liste_squelette= array();
		
		$sql = 'SELECT id_squelette
				FROM '. AREABB_SQUELETTE .' 
				WHERE type='.$type;
		$sql .= ' ORDER BY position ASC';
		//die($sql);
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'obtenir des infos sur ce squelette", '', __LINE__, __FILE__, $sql); 
		}
		while ($row = $db->sql_fetchrow($result))
		{
			$liste_squelette[] = $row['id_squelette'];
		}
		if (in_array($id_squelette,$liste_squelette))
		{
			$clef = array_search($id_squelette,$liste_squelette);
			switch ($sens)
			{
				case '+':
					$tmp = $liste_squelette[$clef]; 
					$liste_squelette[$clef] = $liste_squelette[($clef-1)];
					$liste_squelette[($clef-1)] = $tmp;
					break;
				case '-':
					$tmp = $liste_squelette[$clef]; 
					$liste_squelette[$clef] = $liste_squelette[($clef+1)];
					$liste_squelette[($clef+1)] = $tmp;		
					break;		
			}
			$cmpt = count($liste_squelette);
			for ($i=0;$i<$cmpt;$i++)
			{
				$sql = 'UPDATE '. AREABB_SQUELETTE .' 
						SET position='.$i.' 
						WHERE id_squelette='.$liste_squelette[$i];
				$db->sql_query($sql);
			}
			return true;
		}else{
			return false;
		}
		
	}
	//
	// Editer un squelette dans la base pour y modifier son nom
	//
	function editer_squelette($titre,$id_squelette)
	{
		global $db;
		
		$sql = 'UPDATE '. AREABB_SQUELETTE .' 
				set titre= \''.$titre.'\'
				WHERE id_squelette='.$id_squelette;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'editer ce squelette", '', __LINE__, __FILE__, $sql); 
		}	
		return true;
	}	
	//
	// Supprime un squelette de la base
	//
	// NB: la suppression d'un squelette entraine ir�vocablement la suppression 
	// des feuilles et agencements de blocs qui y sont li�s.
	function supprimer_squelette($id_squelette)
	{
		global $db;
		
		$sql = 'DELETE FROM '. AREABB_SQUELETTE .' 
				WHERE id_squelette='.$id_squelette;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer ce squelette 1/3", '', __LINE__, __FILE__, $sql); 
		}	
		
		// suppression des blocs 
		$sql = 'DELETE FROM '. AREABB_BLOCS .' 
				WHERE id_feuille IN
				( \'
					SELECT id_feuille 
					FROM '. AREABB_FEUILLE .' 
					WHERE id_squelette='.$id_squelette.'
				 \'
				)';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer ce squelette 2/3", '', __LINE__, __FILE__, $sql); 
		}	
		// suppression  des feuilles de ce squelette
		$sql = 'DELETE FROM '. AREABB_FEUILLE .'
				WHERE id_squelette='.$id_squelette;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer ce squelette 3/3", '', __LINE__, __FILE__, $sql); 
		}
		return true;
	}
	
	//
	// Ajoute une feuille dans un squelette
	//
	function ajouter_feuille($id_modele)
	{
		global $db;
		
		// Position maximale 
		$sql = 'SELECT MAX(position) as PosMax  
				FROM '. AREABB_FEUILLE;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'ajouter cette feuille", '', __LINE__, __FILE__, $sql); 
		}
		$row = $db->sql_fetchrow($result);
		
		// Insertion des donn�es.
		$sql = 'INSERT INTO '. AREABB_FEUILLE .' (id_squelette,id_modele,position)
				VALUES ('.$this->id_squelette.','.$id_modele.','.($row['PosMax']+1).')';
				
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'ajouter cette feuille", '', __LINE__, __FILE__, $sql); 
		}
		
		// on cr�e la liste des blocs
		$this->definir_liste_blocs($id_modele);
		return true;
	}
	
	//
	// d�finis les valeurs par d�faut des blocs
	//
	
	function definir_liste_blocs($id_modele)
	{
		global $db;
			
		// il faut parser le contenu du modele pour trouver le nombre de blocs.
		$sql = 'SELECT modele FROM '. AREABB_MODELE .'
				WHERE id_modele='.$id_modele.'
				LIMIT 1';		
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'obtenir des infos sur ce modele", '', __LINE__, __FILE__, $sql); 
		}
		$row = $db->sql_fetchrow($result);
		$nbre_blocs = substr_count($row['modele'],'%s');	
		
		// Dans quelle feuille on travaille -> la derniere 
		$sql = 'SELECT id_feuille FROM '. AREABB_FEUILLE .'
				ORDER BY id_feuille DESC
				LIMIT 1';	
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'obtenir des infos sur ce modele", '', __LINE__, __FILE__, $sql); 
		}
		$row = $db->sql_fetchrow($result);
		$derniere_feuille = $row['id_feuille'];
		
		// remplissage de la base
		if ($nbre_blocs >0)
		{
			FOR ($i=0;$i<$nbre_blocs;$i++)
			{
				$sql = 'INSERT INTO '. AREABB_BLOCS. ' (id_feuille) 
						VALUES ('.$derniere_feuille.')';
				if( !($result = $db->sql_query($sql)) )
				{
					message_die(GENERAL_ERROR, "Impossible d'obtenir des infos sur ce modele", '', __LINE__, __FILE__, $sql); 
				}
			}
		}
		return true;
	}
	
	
	//
	// on supprime la feuille ainsi que les blocs la composant
	//
	function supprimer_feuille($id_feuille)
	{	
		global $db;
		
		// suppression des blocs qui l'utilisent
		$sql = 'DELETE FROM '. AREABB_BLOCS .' 
				WHERE id_feuille='.$id_feuille;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer cette feuille 1/2", '', __LINE__, __FILE__, $sql); 
		}		
		// suppression  des feuilles qui l'utilisent
		$sql = 'DELETE FROM '. AREABB_FEUILLE .'
				WHERE id_feuille='.$id_feuille;
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de supprimer cette feuille 2/2", '', __LINE__, __FILE__, $sql); 
		}
		return true;	
	}
	
	
	//
	// Modifie l'ordre d'affichage des feuilles en montant
	// $sens = '+'  monter
	// $sens = '-'  descendre
	//
	function monter_feuille($id_feuille,$sens='+')
	{
		global $db;
		$liste_feuille= array();
		
		$sql = 'SELECT id_feuille
				FROM '. AREABB_FEUILLE .' 
				WHERE id_squelette='.$this->id_squelette;
		$sql .= ' ORDER BY position ASC';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'obtenir des infos sur ces feuilles", '', __LINE__, __FILE__, $sql); 
		}
		while ($row = $db->sql_fetchrow($result))
		{
			$liste_feuille[] = $row['id_feuille'];
		}
		if (in_array($id_feuille,$liste_feuille))
		{
			
			$clef = array_search($id_feuille,$liste_feuille);
			switch ($sens)
			{
				case '+':
					$tmp = $liste_feuille[$clef]; 
					$liste_feuille[$clef] = $liste_feuille[($clef-1)];
					$liste_feuille[($clef-1)] = $tmp;
					break;
				case '-':
					$tmp = $liste_feuille[$clef]; 
					$liste_feuille[$clef] = $liste_feuille[($clef+1)];
					$liste_feuille[($clef+1)] = $tmp;		
					break;		
			}
			$cmpt = count($liste_feuille);
			for ($i=0;$i<$cmpt;$i++)
			{
				$sql = 'UPDATE '. AREABB_FEUILLE .' 
						SET position='.$i.' 
						WHERE id_feuille='.$liste_feuille[$i];
				$db->sql_query($sql);
			}
			return true;
		}else{
			return false;
		}
		
	}
	
	//
	// Charge les feuille de style des mods
	
	function charge_feuille_style()
	{
		global $phpEx;
		unset ($style);
		foreach($this->liste_mods as $v) 
		{
			if (file_exists('../' . $v . '/style.'.$phpEx))
			{
				include_once('../' . $v . '/style.'.$phpEx);
				$this->style .= $style;
			}
		}
	}
	
	
	
	//
	// Envoyer le squelette en cache
	//
	// deux fichiers sont enregistr�s 
	// 1 _ Le squelette global de la salle
	// 2 _ La liste des MODS � charger pour cette salle.
	function ecrire_cache_squelette()
	{
			$this->definir_cache();
			
			// squelette format�
			$this->assembler_squelette('cache');
			// on charge les feuilles de style des mods
			$this->charge_feuille_style();
			
			$rFile = @fopen(CACHE,"w+");
			if (!$rFile) {
				return "ERREUR: Impossible d'ecrire dans le dossier 1 " . dirname(realpath(CACHE)) ." (avez vous fait un CHMOD 777 ? )" ;
			}
			$this->squelette = $this->style.$this->squelette.$this->copyright; 
			fwrite($rFile,$this->squelette);
			fclose($rFile);
		
		// listes de blocs � appeler
			$rFile = @fopen(BLOCS,"w+");
			if (!$rFile) {
				return "ERREUR: Impossible d'ecrire dans le dossier 2 " . dirname(realpath(BLOCS)) ." (avez vous fait un CHMOD 777 ? )" ;
			}
			fwrite($rFile,implode("|",$this->liste_mods));
			fclose($rFile);
			return true;				
	}

	//
	// Lire le cache du squelette
	//
	function lire_cache_squelette()
	{
			$this->definir_cache();
		// squelette format�
			$rFile = @fopen(CACHE,"r");
			if (!$rFile) {
				return "ERREUR: Impossible de lire le fichier en cache 1 : " . dirname(realpath(CACHE)) ;
			}
			$this->squelette=  fread($rFile,filesize(CACHE));
			fclose($rFile);
		// liste des blocs � appeler
			$rFile = @fopen(BLOCS,"r");
			if (!$rFile) {
				return "ERREUR: Impossible de lire le fichier en cache 2 : " . dirname(realpath(BLOCS)) ;
			}
			$this->liste_mods= fread($rFile,filesize(BLOCS));
			fclose($rFile);			
			return true;
	}
	
	
	//
	// assemblage du squelette
	// 
	// On execute chaque mod o� on r�cupere l'affichage g�n�r�
	// ces donn�es r�cup�r�es sont ensuite plac�es dans le squelette.
	// Cette fonction ci pr�pare les donn�es pour cette action.
	function assembler_squelette($sortie='direct')
	{
		global $db;
		
		$squelette = '';
		$liste_feuille= array();
		
		$sql = 'SELECT modele, f.id_feuille, id_bloc,type_mod, b.id_mod , nom  
				FROM '. AREABB_FEUILLE .' as f LEFT JOIN '. AREABB_BLOCS .' as b 
				ON f.id_feuille=b.id_feuille 
				LEFT JOIN '. AREABB_MODELE .' as m 
				ON f.id_modele=m.id_modele 
				LEFT JOIN '.AREABB_MODS.' as a 
				ON b.id_mod=a.id_mod 
				WHERE id_squelette='.$this->id_squelette.' 
				ORDER BY position ASC
				';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible d'obtenir des infos sur les feuilles", '', __LINE__, __FILE__, $sql); 
		}
		while ($row = $db->sql_fetchrow($result))
		{
			// on verifie qu'une feuille n'a pas d�j� �t� charg�e
			if (!in_array($row['id_feuille'],$liste_feuille))
			{
				$liste_feuille[] = $row['id_feuille'];
				$squelette .= stripslashes($row['modele']);
			}
			// Si on envoit l'affichage vers le cache on s'assure de conserver les noms de mods
			// ainsi que de bien cr�er les variables de templates avec ce m�me nom
			// exemple : {VARIABLE}
			if ($sortie == 'cache')
			{
				// Nous travaillons sur un bloc HTML ? 
				// It's possible...
				if ($row['type_mod'] == 'HTML')
				{
					$this->liste_blocs[] = '{HTML_'. $row['id_mod'].'}';	
					$this->liste_mods[] = 'HTML_'. $row['id_mod'];
				}else{
					$this->liste_blocs[] = '{'.$row['nom'].'}';	
					// on rajoute ce nom � la liste des mods � charger. 
					// on ne le charge qu'une seule fois car cel� ne sert � rien 
					// de g�n�rer 2 fois la m�me chose m�me si on veut l'afficher 2 fois
					if ($row['nom'] != '') $this->liste_mods[] = $row['nom'];		
				}
				
		
			}else{
			// Dans ce cas de figure on n'a pas besoin de r�cup�rer le nom du bloc car il nous sera inutile
			// On recupere donc l'ID qui �tant unique nous permettra de le positionner
			// id_bloc = emplacement dans le damnier
			// id_mod  = mod pouvant s'encastrer dans ce damier
				$this->liste_blocs[] = '%'.$row['id_bloc'].'%';
				// HTML  ?
				if ($row['type_mod'] == 'HTML')
				{
					$this->liste_mods[] = 'HTML_'.$row['id_mod'];	
				}else{
					$this->liste_mods[] = $row['id_mod'];	
				}
			}			
		}
		
		// ICI un nettoyage des sigles PRE parsage
		$squelette = preg_replace("#%([^s])#","#$1", $squelette);
		$squelette  = vsprintf($squelette,$this->liste_blocs);
		// et POST parsage est indispensable. Si on ne nettoie pas le code de tous les sigles %
		// qui ne sont pas suivit du caract�re (s) on va cr�er une diff�rence dans le nombre d' 
		// emplacements et dans le nombre de blocs dispos. vsprintf() renverrait alors une erreur...
		$this->squelette = str_replace("#","%",$squelette);
		// L� je proc�de � un nettoyage globales des accolades inutiles. 
		// Il �tait pr�f�rable de le faire en fin de traitement pour �viter 1 test � chaque bloc
		if ($sortie == 'cache') $this->squelette = str_replace("{}","",$this->squelette);
		
	}
	
	//
	//  place les mods  dans le squelette
	//
	// Afin de pouvoir executer les bon mod dans la salle d'arcade on recupere la liste des 
	// mods � charger. Cette liste a �t� lue au pr�alable dans le cache.
	function fusionner_bloc_mod()
	{
		global $template,$db,$phpEx,$id_BLOC_HTML;
		
		// on charge tous les blocs HTML
		$this->listage_blocs_html();
		
		$this->liste_mods = explode('|',$this->liste_mods);
		$max_blocs = sizeof($this->liste_mods);
		for ($b=0;$b<$max_blocs;$b++)
		{
			// il arrive parfois au moment de l'extraction des donn�es qu'un �l�ment inexistant 
			// soit ajout� dans le tableau $this->liste_mods. On v�rifie donc qu'il n'est pas vide
			if ($this->liste_mods[$b] != '')
			{
				// Les mods affich�s peuvent �tre sous la forme d'un bloc HTML cr�� dans l'admin
				// On va cr�er une nouvelle convention de nommage qui est que tout bloc HTML 
				// portera comme nom : BLOC_HTML_XX , XX repr�sentant l'ID du bloc
				// Le mod qui gerera 
				
				if (preg_match("/HTML_/",$this->liste_mods[$b]))
				{
					
					$id_BLOC_HTML = intval(str_replace('HTML_','',$this->liste_mods[$b]));
					
					include ($this->root.'areabb/mods/bloc_html/affichage_bloc_html.'.$phpEx);
				}else{
					include_once ($this->root.'areabb/mods/'.$this->liste_mods[$b].'/mod_'.$this->liste_mods[$b].'.'.$phpEx);
				}
			}
		}
	}
	// 
	// G�n�ration du squelette mais dans la vue ADMIN
	// 
	// On affiche qu'un r�sum� du bloc PHP = icone + titre + description
	// M�me chose pour les blocs HTML
	
	function afficher_blocs($info_mods)
	{
		// on charge tous les blocs HTML
		$this->listage_blocs_html();
		$max_blocs = count($this->liste_blocs);
		FOR ($i=0;$i<$max_blocs;$i++)
		{
			$id_bloc = str_replace('%','',$this->liste_blocs[$i]);
			if ($this->liste_mods[$i] != '0')
			{	
				
				// Affichage du r�sum� du bloc HTML
				if (preg_match("/HTML_/",$this->liste_mods[$i]))
				{
					$id_BLOC_HTML = intval(str_replace('HTML_','',$this->liste_mods[$i]));
					$mod = '<ul id="box_'.$id_bloc.'"><li id="HTML_'.$this->liste_mods[$i].'"   style="background-image:url('.$this->root.'areabb/mods/bloc_html/logo.png);background-repeat:no-repeat;background-position:bottom center"><b>'.$this->liste_blocs_html[$id_BLOC_HTML]['titre'].'</b></li></ul>';	
					$this->squelette = str_replace($this->liste_blocs[$i], $mod, $this->squelette);
					
				}else{
				// Affichage des infos XML du bloc PHP
					$mod = '<ul id="box_'.$id_bloc.'"><li id="mod_'.$this->liste_mods[$i].'" style="background-image:url('.$this->root.'areabb/mods/'.$info_mods[$this->liste_mods[$i]]['nom'].'/logo.png);background-repeat:no-repeat;background-position:bottom center"><b>'.$info_mods[$this->liste_mods[$i]]['label'].'</b><br />';
					$mod .= '</li></ul>';	
					$this->squelette = str_replace($this->liste_blocs[$i], $mod, $this->squelette);
				}
			}else{
				// Affichage d'une zone vierge afin de pouvoir la remplir.
				$this->squelette = str_replace($this->liste_blocs[$i], '<ul id="box_'.$id_bloc.'"></ul>', $this->squelette);
			}
		}
	}
	
	// 
	// Fonction qui permet de r�cuperer toute les infos sur tous les blocs HTML
	// 
	// Je prefere r�cup�rer tout le contenu de tous les blocs, sacrifiant ainsi de l'espace m�moire au profit 
	// d'une plus grande vitesse d'execution du code.
	// si le chargement des pages HTML ralentit de mani�re notable le chargement de la page il faudrat r��crire cette partie.
	function listage_blocs_html()
	{
		global $db;
		$sql = 'SELECT id_bloc, titre, message 
			FROM '. AREABB_BLOCS_HTML.' 
			ORDER BY id_bloc ASC';
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, "Impossible de r�cuperer la liste des blocs HTML dispos", '', __LINE__, __FILE__, $sql); 
		}
		while ($row = $db->sql_fetchrow($result))
		{	
			$this->liste_blocs_html[$row['id_bloc']]['titre'] = $row['titre'];
			$this->liste_blocs_html[$row['id_bloc']]['message'] = $row['message'];
		}
		return true;
	}
}


?>