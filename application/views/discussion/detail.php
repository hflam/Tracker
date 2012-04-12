
<div id='thread_detail' class='sub_content'>
	<div id='discussion_topic'>
		<div id='discussion_title'><?php echo $discussion->topic;?>
		</div>
		<div><?php echo $discussion->content;?></div>
	</div>
	<?php foreach($comments as $comment):?>
	<br/>
	<div class='comment_table'>
		"<?php echo $comment->content;?>" by <?php echo $comment->creator;?>
	</div>
		<br/>
	<?php endforeach;?>
	<div>
		<form method="post" id='form' name='form' action="<?php echo base_url();?>comments/create/<?php echo $discussion->id;?>">
           <label>
           	<p>Quick Reply </p>
           </label>
           <table width="400" border="0">
  				<tr>
    				<td>Content:</td>
    				<td><textarea rows="5" cols="50" name="content" id="content"></textarea></td>
  				</tr>
  				<tr>
    				<td align="center"><input type="submit" name="submit" id="submit" value="Sumbit"></td>
    			</tr>
            </table>
         </form>
	</div>
</div>