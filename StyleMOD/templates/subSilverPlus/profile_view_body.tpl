<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr>
	<td class="nav">&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a></td>
  </tr>
</table>

<table width="100%" cellspacing="1" cellpadding="3" border="0">
  <tr> 
	<td width="40%" valign="top"><table width="100%" cellspacing="1" cellpadding="2" border="0">
	  <tr>
		<td><table class="forumline" width="100%" cellspacing="1" cellpadding="4" border="0">
		  <tr>
			<td class="catLeft" height="28" align="center"><b class="gen">{L_AVATAR}</b></td>
		  </tr>
		  <tr>
			<td class="row1" height="6" valign="top" align="center">
				<span class="genmed">{POSTER_RANK}<br />{RANK_IMAGE}</span>
				{AVATAR_IMG}
			</td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td><table class="forumline" width="100%" cellspacing="1" cellpadding="4" border="0">
		  <tr>
			<td class="catLeft" align="center" height="28" colspan="2"><b class="gen">{L_CONTACT} {USERNAME}</b></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_EMAIL_ADDRESS}:</span></td>
			<td class="row1" valign="middle" width="100%"><span class="gen">{EMAIL_IMG}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_PM}:</span></td>
			<td class="row1" valign="middle"><span class="gen">{PM_IMG}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_MESSENGER}:</span></td>
			<td class="row1" valign="middle"><span class="gen">{MSN}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_SKYPE} :</span></td>
			<td class="row1" valign="middle"><span class="gen">{SKYPE_IMG}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_YAHOO}:</span></td>
			<td class="row1" valign="middle"><span class="gen">{YIM_IMG}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_AIM}:</span></td>
			<td class="row1" valign="middle"><span class="gen">{AIM_IMG}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_ICQ_NUMBER}:</span></td>
			<td class="row1" valign="middle"><span class="gen">{ICQ_IMG}</span></td>
		  </tr>
		  <tr> 
			<td class="row1" valign="middle" nowrap="nowrap" align="right"><span class="gen">{L_ONLINE_STATUS} :</span></td>
			<td class="row1" valign="middle"><span class="gen">{ONLINE_STATUS_IMG}</span></td>
		</tr>
		</table></td>
	  </tr>
	</table></td>
	<td width="60%" valign="top"><table width="100%" cellspacing="1" cellpadding="2" border="0">
	  <tr>
		<td><table class="forumline" width="100%" cellspacing="1" cellpadding="4" border="0">
		  <tr>
			<td class="catRight" height="28" align="center" colspan="2"><b class="gen">{L_ABOUT_USER}</b></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_JOINED}:</span></td>
			<td class="row1" width="100%"><b class="gen">{JOINED}</b></td>
		  </tr>
		<tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_VISITED} :</span></td>
			<td class="row1" width="100%"><b><span class="gen">{VISITED}</span></b></td>
		</tr>
		  <tr>
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_TOTAL_POSTS}:</span></td>
			<td class="row1" valign="top"><b class="gen">{POSTS}</b><br /><span class="genmed">[{POST_PERCENT_STATS} / {POST_DAY_STATS}]<br /><a href="{U_SEARCH_USER}" class="genmed">{L_SEARCH_USER_POSTS}</a></span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_LOCATION}:</span></td>
			<td class="row1"><b class="gen">{LOCATION}</b></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_WEBSITE}:</span></td>
			<td class="row1"><span class="gen">{WWW_IMG}</span></td>
		  </tr>
		  <tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_OCCUPATION}:</span></td>
			<td class="row1"><b class="gen">{OCCUPATION}</b></td>
		  </tr>
		  <tr>
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_INTERESTS}:</span></td>
			<td class="row1"><b class="gen">{INTERESTS}</b></td>
		  </tr>
		<!-- Start add - Gender MOD --> 
		  <tr> 
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_GENDER} :</span></td>
			<td class="row1"><b><span class="gen">{GENDER}</span></b></td>
		  </tr>
		<!-- End add - Gender MOD -->	
		<!-- BEGIN birthday -->
		  <tr>
			<td class="row1" valign="middle" align="right" nowrap="nowrap"><span class="gen">{L_BIRTHDATE}:</span></td>
			<td class="row1" valign="middle"><span class="gen"><b>{birthday.BIRTHDATE}</b>&nbsp;({birthday.AGE})<!-- BEGIN zodiac --><img src="{birthday.I_ZODIAC}" alt="{birthday.L_ZODIAC}" title="{birthday.L_ZODIAC}" style="vertical-align:text-bottom;" /><!-- END zodiac --><!-- BEGIN birthcake -->&nbsp;<img class="gensmall" src="{I_BIRTHCAKE}" alt="{L_BIRTHCAKE}" title="{L_BIRTHCAKE}" style="vertical-align:text-bottom;" /><!-- END birthcake --></span></td>
		  </tr>
		<!-- END birthday -->		
		<!-- BEGIN flag -->
		<tr>
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_FLAG} :</span></td>
			<td class="row1"><b class="gen">
				<strong>{flag.FLAG_NAME}</strong>
				<img class="gensmall" src="{flag.FLAG_IMG}" alt="{flag.FLAG_NAME}" title="{flag.FLAG_NAME}" style="vertical-align:middle;" border="0" />
			</b></td>
		</tr>
		<!-- END flag -->
		<!-- BEGIN browser -->
		<tr>
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_BROWSER} :</span></td>
			<td class="row1"><b class="gen">
				<strong>{browser.BROWSER_NAME}</strong>
				<img class="gensmall" src="{browser.BROWSER_IMG}" alt="{browser.BROWSER_NAME}" title="{browser.BROWSER_NAME}" style="vertical-align:text-bottom;" border="0" />
			</b></td>
		</tr>
		<!-- END browser -->
		<!-- BEGIN switch_upload_limits -->
		<tr> 
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_UPLOAD_QUOTA} :</span></td>
			<td class="row1"> 
				<table width="175" cellspacing="1" cellpadding="2" border="0" class="bodyline">
				<tr> 
					<td colspan="3" width="100%" class="row2">
						<table cellspacing="0" cellpadding="1" border="0">
						<tr>
							<td bgcolor="{T_TD_COLOR2}"><img src="templates/subSilverPlus/images/spacer.gif" width="{UPLOAD_LIMIT_IMG_WIDTH}" height="8" alt="" title="{UPLOAD_LIMIT_PERCENT}%" /></td>
						</tr>
						</table>
					</td>
				</tr>
				<tr> 
					<td width="33%" class="row1"><span class="gensmall">0%</span></td>
					<td width="34%" align="center" class="row1"><span class="gensmall">50%</span></td>
					<td width="33%" align="right" class="row1"><span class="gensmall">100%</span></td>
				</tr>
				</table>
				<b><span class="genmed">[{UPLOADED} / {QUOTA} / {PERCENT_FULL}]</span> </b><br />
				<span class="genmed"><a href="{U_UACP}" class="genmed">{L_UACP}</a></span></td>
			</td>
		</tr>
		<!-- END switch_upload_limits -->
		<!-- BEGIN switch_user_sig_block -->
		<tr>
			<td class="row1" valign="top" align="right" nowrap="nowrap"><span class="gen">{L_SIGNATURE}:</span></td>
			<td class="row1"><span class="postbody">{USER_SIG}</span></td>
		</tr>
		<!-- END switch_user_sig_block -->
		</table>
		</td>
	  </tr>
	  <tr>
		<td align="right"><span class="nav"><br />{JUMPBOX}</span></td>
	  </tr>
	</table></td>
  </tr>
</table>