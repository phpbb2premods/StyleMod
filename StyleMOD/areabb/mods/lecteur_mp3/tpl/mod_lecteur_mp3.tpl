<script language="Javascript" type="text/javascript">
function charge_mp3(file)
{
	resultat = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="200" height="20" id="dewplayer" align="middle"><param name="allowScriptAccess" value="sameDomain" />	<param name="movie" value="areabb/mods/lecteur_mp3/swf/dewplayer.swf?son='+file+'&amp;autostart=1" />	<param name="quality" value="high" /><param name="bgcolor" value="" />	<embed src="areabb/mods/lecteur_mp3/swf/dewplayer.swf?son='+file+'&amp;autostart=1" quality="high" bgcolor="" width="200" height="20" name="dewplayer" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed></object>';
	document.getElementById('lecteur').innerHTML = resultat;
}
</script>
<table width="100%" height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
	<tr>
		<th colspan="2">{L_LECTEUR_MP3}</th>
	</tr>
	<tr>
		<td class="catLeft" align="left">
			<span class="genmed">
			<div id="lecteur">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="200" height="20" id="dewplayer" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="movie" value="areabb/mods/lecteur_mp3/swf/dewplayer.swf?son={DEFAULT}" />
					<param name="quality" value="high" /><param name="bgcolor" value="" />
					<embed src="areabb/mods/lecteur_mp3/swf/dewplayer.swf?son={DEFAULT}" quality="high" bgcolor="" width="200" height="20" name="dewplayer" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
				</object>
			</div>
			</span>
		</td>
	</tr>
<!-- BEGIN liste_mp3 -->
	<tr>
		<td class="{liste_mp3.CLASS}" align="left">
			<span class="gensmall"><img src="areabb/images/small_arrow.gif" border="0" /> <a href="javascript:;" onClick="charge_mp3('{liste_mp3.FILE}')" />{liste_mp3.TITRE}</a></span>
		</td>
	</tr>
<!-- END liste_mp3 -->
</table>