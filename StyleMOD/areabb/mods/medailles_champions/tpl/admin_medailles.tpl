<link rel="stylesheet" href="tpl/style.css" type="text/css" />
<script language="Javascript" type="text/javascript" src="js/picker.js" /></script>
<script language="Javascript" type="text/javascript" src="js/mousexy.js" /></script>
<div class="maintitle">{L_GENERAL_MEDAILLES_ADMIN}</div>
<br />
<p>{L_GENERAL_MEDAILLES_ADMIN_EXP}</p>
<form action="" method="post">
<table width="99%" cellpadding="3" cellspacing="1" border="0" align="center" class="forumline">
<tr> 
<th colspan="2">{L_GENERAL_SETTINGS}</th>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_COL_PDO}</span></td>
	<td class="row2" width="62%"> 
	<input type="text" size="10" maxlength="7" name="medailles_champ_cpseudo" value="{S_MED_COL_PDO}">&nbsp;<img src="tpl/images/icon_colorpicker.gif" onclick="showColorPicker(this,document.forms[0].medailles_champ_cpseudo)">	
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_OMBRE}</span></td>
	<td class="row2" width="62%"> 
	<input type="radio" name="medailles_champ_ombre" value="1" {S_MED_OMBRE_OUI}>{L_OUI}
	<input type="radio" name="medailles_champ_ombre" value="0" {S_MED_OMBRE_NON}>{L_NON}
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_COL_OBE}</span></td>
	<td class="row2" width="62%"> 
	<input type="text" size="10" maxlength="7" name="medailles_champ_combre" value="{S_MED_COL_OBE}">&nbsp;<img src="tpl/images/icon_colorpicker.gif" onclick="showColorPicker(this,document.forms[0].medailles_champ_combre)">	
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_QUALITE}</span></td>
	<td class="row2" width="62%"> 
	<input type="text" size="10" maxlength="3" name="medailles_champ_qualite" value="{S_MED_QUALITE}">
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_TTF}</span></td>
	<td class="row2" width="62%"> 
	<input type="radio" name="medailles_champ_ttf" value="1" {S_MED_TTF_OUI}>{L_OUI}
	<input type="radio" name="medailles_champ_ttf" value="0" {S_MED_TTF_NON}>{L_NON}
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_FONT}</span></td>
	<td class="row2" width="62%"> 
	<select name="medailles_champ_font">{S_MED_FONT}</select>
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_TAILLE}</span></td>
	<td class="row2" width="62%"> 
	<select name="medailles_champ_taille">{S_MED_TAILLE}</select>
	</td>
</tr>
<tr> 
	<td class="row1" width="38%" valign="top"><span class="gensmall">{L_MED_IMAGE}</span></td>
	<td class="row2" width="62%"> 
	<select name="medailles_champ_image" onChange="Update_image(this.value);">{S_MED_IMAGE}</select><br />
	<img src="images/{IMAGE_ACTUELLE}" border="0" id="podium" onClick="Afficher_Position(this);" style="cursor: crosshair;"></td>
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_COORD_XY1}</span></td>
	<td class="row2" width="62%" valign="middle"> 
	<input type="text" size="10" id="crd1" name="medailles_champ_crd1" value="{S_MED_COORD_XY1}"><img src="tpl/images/cible.gif" border="0" onClick="define_input('crd1');">	
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_COORD_XY2}</span></td>
	<td class="row2" width="62%" valign="middle"> 
	<input type="text" size="10" id="crd2" name="medailles_champ_crd2" value="{S_MED_COORD_XY2}"><img src="tpl/images/cible.gif" border="0" onClick="define_input('crd2');">	
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_COORD_XY3}</span></td>
	<td class="row2" width="62%" valign="middle"> 
	<input type="text" size="10" id="crd3" name="medailles_champ_crd3" value="{S_MED_COORD_XY3}"><img src="tpl/images/cible.gif" border="0" onClick="define_input('crd3');">
	</td>
</tr>
<tr> 
<td class="cat" colspan="2" align="center">
<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
<input type="hidden" name="action" value="enregistrer" />
</td>
</tr>
</form>
<tr> 
<th colspan="2">{L_MED_FCT_MANUEL}</th>
</tr>
<!-- Fonctionnement Manuel -->
<form action="" name="post" method="post">
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_FCT}</span></td>
	<td class="row2" width="62%"> 
	<input type="radio" name="medailles_champ_fct" value="1" {S_MED_FCT_OUI}>{L_OUI}
	<input type="radio" name="medailles_champ_fct" value="0" {S_MED_FCT_NON}>{L_NON}
	</td>
</tr>
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_PSEUDOS}</span></td>
	<td class="row2" width="62%"> 
	<input type="text" size="20" name="medailles_champ_pseudo" value="{S_MED_PSEUDOS}">
	</td>
</tr>

<tr> 
<td class="cat" colspan="2" align="center">
<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />
<input type="hidden" name="action" value="enregistrer" />
</td>
</tr>
</form>
<tr> 
<th colspan="2">{L_MED_ADMIN_ACTIONS}</th>
</tr>
<form action="" method="post">
<tr> 
	<td class="row1" width="38%"><span class="gensmall">{L_MED_PURGE}</span></td>
	<td class="row2" width="62%"> 
	<input type="submit" name="submit" value="{L_PURGER}" class="mainoption" />
	<input type="hidden" name="action" value="purger" />
	</td>
</tr>
</form>
</table>
<br />