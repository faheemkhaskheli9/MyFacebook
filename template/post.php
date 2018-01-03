<?php
include('../includes/connect.php');
?>
    <div class="update_tab" id="post_<?php echo $post['id'];?>" data-last-comment-id="0">
    
    <table>
    <tr>
    <td rowspan="2" width="40"><span style="color:#00F;"><img src="<?php echo $users['display_image'];?>" width="40"></span></td>
	<td><a href="../profile.php?id=<?php echo $users['id'];?>"><?php echo ucfirst($users['firstname']) . ' ' . ucfirst($users['lastname']);?></span></a></td>
    </tr>
    <tr><td><span><?php echo humanTiming($post['time']);?> Ago</span></td>
    </tr>
    <tr><td colspan="4"><div id="status" ><?php echo $post['post']?></div></td></tr>
    <tr>
    	<td colspan="4"><hr></td>
    </tr>
    <tr>
    <td colspan="4" >
    <div id="privacy_<?php echo $post['id'];?>" style="display:inline-block;">
    	<?php
        if ($post['privacy'] == 0)
			{
		?>
    	<img src="../images/icons/lock24 (2).png" width="30" title="Private" onclick="change_privacy('post','public','<?php echo $post['id'];?>')">
        <?php
        	}
		else
			{
		?>
    	<img src="../images/icons/1438974520_icon-ios7-people.png"" width="30" title="Public" onclick="change_privacy('post','private','<?php echo $post['id'];?>')">
        <?php
        	}
		?>
    </div>
    <?php
    $likes_result = mysqli_query($con,"SELECT * FROM like_post WHERE post_id = ".$post['id']);
	$my_likes_result = mysqli_query($con,"SELECT * FROM like_post WHERE post_id = ".$post['id']." AND u_id = ".$_SESSION['user']['uid']);
	?>
    <div id="<?php echo $post['id'].'_likes_div'; ?>" class="display_inline">
    	<span id="<?php echo $post['id'].'likes'; ?>" class="likes_counts"><?php echo mysqli_num_rows($likes_result);?></span>
        <?php if (mysqli_num_rows($my_likes_result) != 1) {?>
        <span onclick="likethis('<?php echo $post['id'];?>','post')" class="like_button">Like</span>
        <?php }
		else
			{
		?>
        <span onclick="unlikethis('<?php echo $post['id'];?>','post')" class="unlike_button">Unlike</span>
        <?php
			}
		?>
    </div>
    <?php
    $comment_result = mysqli_query($con,"SELECT * FROM comments WHERE post_id = ".$post['id']);
	$rows = mysqli_fetch_array($comment_result);
	?>
    <div id="<?php echo $post['id'].'_comment_div'; ?>" class="comment_button_and_counts display_inline">
    	<span id="<?php echo $post['id'].'comment'; ?>" class="comment_counts" onclick="show_comments('<?php echo $post['id'];?>')">
			<?php echo mysqli_num_rows($comment_result);?>
        </span>
        <span onclick="add_new_comment_form('<?php echo $post['id'];?>')" class="comment_button">Comment</span>
    </div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $post['id'];?>_add_new_comment_form"></div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $post['id'];?>_my_comments"></div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $post['id'];?>_comments_box" class="comments_box">
    	
    </div>
    </td>
    </tr>
    </table>
	</div>