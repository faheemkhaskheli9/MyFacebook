<?php
echo '
<div class="comment">
	<table>
		<tr>
			<td width="40" style="vertical-align:top;">
				<a href="../profile.php?id='.$comment_user_id.'">
				<img src="'.$comment_user_dp.'" width="40">
				</a>
			</td>
			<td><div class="display_inline"><a href="../profile.php?id='.$comment_user_id.'">'.$comment_user_first_name. ' ' . $comment_user_last_name.'</span></a></div>
			<div class="display_inline" >'.$comment.'</div>
			</td>
		</tr>
		<tr><td></td><td><span>'.$comment_time.' Ago</span></td></tr>
	</table>
</div>';
?>