<?php
include_once('../includes/connect.php');
include_once('../includes/Time_Passed.php');
$pid	=	mysqli_real_escape_string($con,$_POST['pid']);
$last_post_id = $pid;
session_start();
$uid	=	$_SESSION['user']['uid'];
$result =	mysqli_query($con,"SELECT * FROM follower WHERE u_id = " . $uid ." AND hide = 0");

$query = $uid;
while($row = mysqli_fetch_array($result))
	{
	$query .= ','.$row['f_id'];
	}
if ($pid != 0)
$q = "AND post_id < ".$last_post_id;
else
$q = '';
$post_result = mysqli_query($con,"SELECT * FROM posts WHERE u_id IN (" . $query.") ".$q." ORDER BY time DESC LIMIT 10");
while($rows = mysqli_fetch_array($post_result))
	{
	$user_result = mysqli_query($con,"SELECT * FROM user WHERE u_id = " . $rows['u_id']);
	$u_row = mysqli_fetch_array($user_result);
	$post['id'] 			= $rows['post_id'];
	$last_post_id 			= $rows['post_id'];
	$post['post'] 			= $rows['post'];
	$post['time'] 			= $rows['time'];
	$post['privacy'] 		= $rows['privacy'];
	$users['id'] 			= $u_row['u_id'];
	$users['firstname'] 	= $u_row['firstname'];
	$users['lastname'] 		= $u_row['lastname'];
	$users['display_image'] = $u_row['display_image'];
	$userid	=	$_SESSION['user']['uid'];
	if (($userid != $users['id'] && $post['privacy'] == 1) || $userid == $users['id'])
	include('../template/post.php');
?>
	<!--
    <div class="tab" id="post_<?php echo $rows['post_id'];?>" data-last-comment-id="0">
    
    <table>
    <tr>
    <td rowspan="2" width="40"><span style="color:#00F;"><img src="<?php echo $u_row['display_image'];?>" width="40"></span></td>
	<td><a href="../profile.php?id=<?php echo $u_row['u_id'];?>"><?php echo ucfirst($u_row['firstname']) . ' ' . ucfirst($u_row['lastname']);?></span></a></td>
    </tr>
    <tr><td><span><?php echo humanTiming($rows['time']);?> Ago</span></td>
    </tr>
    <tr><td colspan="4"><div id="status" ><?php echo $rows['post']?></div></td></tr>
    <tr>
    	<td colspan="4"><hr></td>
    </tr>
    <tr>
    <td colspan="4" >
    <?php
    $likes_result = mysqli_query($con,"SELECT * FROM like_post WHERE post_id = ".$rows['post_id']);
	$my_likes_result = mysqli_query($con,"SELECT * FROM like_post WHERE post_id = ".$rows['post_id']." AND u_id = ".$_SESSION['user']['uid']);
	?>
    <div id="<?php echo $rows['post_id'].'_likes_div'; ?>" class="display_inline">
    	<span id="<?php echo $rows['post_id'].'likes'; ?>" class="likes_counts"><?php echo mysqli_num_rows($likes_result);?></span>
        <?php if (mysqli_num_rows($my_likes_result) != 1) {?>
        <span onclick="likethis('<?php echo $rows['post_id'];?>')" class="like_button">Like</span>
        <?php }
		else
			{
		?>
        <span onclick="unlikethis('<?php echo $rows['post_id'];?>')" class="unlike_button">Unlike</span>
        <?php
			}
		?>
    </div>
    <?php
    $comment_result = mysqli_query($con,"SELECT * FROM comments WHERE post_id = ".$rows['post_id']);
	$rows = mysqli_fetch_array($comment_result);
	?>
    <div id="<?php echo $rows['post_id'].'_comment_div'; ?>" class="comment_button_and_counts display_inline">
    	<span id="<?php echo $rows['post_id'].'comment'; ?>" class="comment_counts" onclick="show_comments('<?php echo $rows['post_id'];?>')">
			<?php echo mysqli_num_rows($comment_result);?>
        </span>
        <span onclick="add_new_comment_form('<?php echo $rows['post_id'];?>')" class="comment_button">Comment</span>
    </div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $rows['post_id'];?>_add_new_comment_form"></div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $rows['post_id'];?>_my_comments"></div>
    </td>
    </tr>
    <tr>
    <td colspan="4">
    <div id="<?php echo $rows['post_id'];?>_comments_box" class="comments_box">
    	
    </div>
    </td>
    </tr>
    </table>
	</div>
    -->
	<?php
	}
	?>
<div id="show_more_div">
<input type="hidden" id="last_post_id" value="<?php echo $last_post_id;?>">
<div onClick="show_more()">Show More</div>
</div>