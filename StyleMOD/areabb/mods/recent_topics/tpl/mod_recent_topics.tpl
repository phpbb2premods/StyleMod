<!-- BEGIN scrolling_row -->
		  <table width="100%" height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
		   <tr>
			<th>{L_RECENT_TOPICS}</th>
		   </tr>
		   <tr>
			<td class="row1" align="left"><span class="gensmall">
			<marquee id="recent_topics" behavior="scroll" direction="up" scrolldelay="0" scrollamount="1" onMouseOver="this.stop()" onMouseOut="this.start()">
			<!-- BEGIN recent_topic_row -->
			<img src="areabb/images/small_arrow.gif" border="0" align="left"><a href="{scrolling_row.recent_topic_row.U_TITLE}" >{scrolling_row.recent_topic_row.L_TITLE}</a><br />
			{BY} {scrolling_row.recent_topic_row.U_POSTER} {ON} {scrolling_row.recent_topic_row.S_POSTTIME}<br /><br />
			<!-- END recent_topic_row -->
			</marquee>
			</span></td>
		   </tr>
		  </table>
<!-- END scrolling_row -->		  
<!-- BEGIN classical_row -->
		 <table width="100%" height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
		   <tr>
			<th>{L_RECENT_TOPICS}</th>
		   </tr>
		   <tr>
			<td class="row1" align="left"><span class="gensmall">
			<!-- BEGIN recent_topic_row -->
			<img src="areabb/images/small_arrow.gif" border="0" align="left"><a href="{classical_row.recent_topic_row.U_TITLE}" >{classical_row.recent_topic_row.L_TITLE}</a><br />
			{BY} {classical_row.recent_topic_row.U_POSTER} {ON} {classical_row.recent_topic_row.S_POSTTIME}<br /><br />
			<!-- END recent_topic_row -->
			</span></td>
		   </tr>
		  </table>
<!-- END classical_row -->