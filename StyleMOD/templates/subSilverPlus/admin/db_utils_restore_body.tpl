<h1>{L_DATABASE_RESTORE}</h1>

<P>{L_RESTORE_EXPLAIN}</p>

<form enctype="multipart/form-data" method="post" action="{S_DBUTILS_ACTION}">
  <table class="forumline" cellspacing="1" cellpadding="4" border="0" align="center">
	<tr>
	  <th class="thHead">{L_SELECT_FILE}</th>
	</tr>
	<tr>
	  <td class="row1" align="center">
		<input class="post" type="file" name="backup_file">
		{S_HIDDEN_FIELDS}
		<input type="submit" name="restore_start" value="{L_START_RESTORE}" class="mainoption" />
	  </td>
	</tr>
  </table>
</form>