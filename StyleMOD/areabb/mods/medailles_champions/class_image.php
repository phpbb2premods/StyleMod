<?php


class generation_image
{
	var $Cl;	
	var $qualite;
	var $image;
	var $largeur_source;
	var $hauteur_source;
	var $avatar;
	var $extension;
	var $extension_source;
	var $fic_temp;
	var $x_final;
	var $y_final;
	var $ttf = 0;
	var $ombre = 0;
	
	// Initialisation des variables
	function generation_image($image_source)
	{
		// initialisations de l'image et des couleurs
		$this->image = imagecreatefrompng($image_source); 
		$this->extension_source = $this->extension_image($image_source);
		$this->largeur_source = imagesx($this->image);
		$this->hauteur_source = imagesy($this->image);
	}
	
	// fonction recevant en entrée un code hexadecimant et 
	// renvoyant la couleur à l'image
	function html2rgb($color)
	{
	  if (substr($color,0,1)=="#") $color=substr($color,1,6);

	  $tablo[0] = hexdec(substr($color, 0, 2));
	  $tablo[1] = hexdec(substr($color, 2, 2));
	  $tablo[2] = hexdec(substr($color, 4, 2));
	  return $tablo;
	}

	// permet d'allouer une couleur hexa à une variable
	function assigner_couleur($couleur,$hexa)
	{
		$rgb = $this->html2rgb($hexa);
		$this->Cl[$couleur] = ImageColorAllocate ($this->image, $rgb[0],$rgb[1],$rgb[2]);
	}

	// génération de l'image finale en la renvoyant vers l'écran
	function afficher_image()
	{
		switch ($this->extension_source)
		{
			case 'png' :	//header("Content-Type: image/png");
							Imagepng($this->image,$this->fic_temp,$this->qualite); break;
			case 'gif' : 	header("Content-Type: image/gif");
							Imagegif($this->image,$this->fic_temp,$this->qualite); break;
			case 'jpg' :	header("Content-Type: image/jpeg");
							Imagejpeg($this->image,$this->fic_temp,$this->qualite); break;
			case 'jpeg' :	header("Content-Type: image/jpeg");
							Imagejpeg($this->image,$this->fic_temp,$this->qualite); break;
		}
		ImageDestroy($this->image);
		return true; 
	}
	
	function placer_image($avatar,$x,$y)
	{
		// extension 
		$this->extension = $this->extension_image($avatar);
		// On déclare la nouvelle image
		$this->declaration_image($avatar);
		// On recupere les dimensions de l'avatar
		$largeur_avatar = imagesx($this->avatar);
		$hauteur_avatar = imagesy($this->avatar);
		// calcul de position
		$this->y_final = ($y - $hauteur_avatar - 5) ; // Je décolle l'avatar de 5 pixel par rapport au haut du podium
		$this->x_final = ($x - floor($largeur_avatar/2) - 2); // je le décalle légerement sur la gauche
		// Incrustation de l'image
		imagecopymerge($this->image, $this->avatar, $this->x_final, $this->y_final, 0, 0, $largeur_avatar, $hauteur_avatar, 100);
	}
	
	// on place un texte
	function  placer_username($username,$font,$cl_texte,$cl_ombre,$taille)
	{
		$x_texte = ($this->x_final+2);
		$y_texte = ($this->y_final-20);
		// Ajout d'ombres au texte
		if ($this->ttf == 1 && $this->ombre == 1) imagettftext($this->image, $taille, 0, ($x_texte+1), ($y_texte+1), $cl_ombre, $font, $username);
		if ($this->ttf == 0 && $this->ombre == 1) imagestring($this->image, $taille, ($x_texte+1), ($y_texte+1), $username, $cl_ombre);
		// Ajout du texte
		if ($this->ttf == 1) imagettftext($this->image, $taille, 0, $x_texte, $y_texte, $cl_texte, $font, $username);
		if ($this->ttf == 0) imagestring($this->image, $taille, $x_texte, $y_texte, $username, $cl_texte);
	}

	// On trouve l'extension
	function extension_image($url_image)
	{
		$url_image = strtolower($url_image);
		ereg("\.([^\.]*$)", $url_image, $elts);
		return $elts[1];
	}
	// on déclare l'avatar
	function declaration_image($url_image)
	{
		switch ($this->extension)
		{
			case 'png' : $this->avatar = imagecreatefrompng($url_image);  break;
			case 'gif' : $this->avatar = imagecreatefromgif($url_image);  break;
			case 'jpg' : $this->avatar = imagecreatefromjpeg($url_image);  break;
			case 'jpeg': $this->avatar = imagecreatefromjpeg($url_image);  break;
		}	
	}
}





?>