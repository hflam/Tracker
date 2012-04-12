<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<div class='sub_content'>
	<table border="0">
	  <tr>
	     <td>
	        <form id="login_form" name="login_form" method="post" action="<?php echo base_url();?>discussions/edit/<?php echo $discussion->id;?>">
	           <label>
	           	<p align="center">Edit Discussion</p>
	           </label>

	           <table width="400" align="center" border="0">
					<tr>
						<td>Topic:</td>
						<td><input type="text" name="topic" id="topic" value="<?php echo $discussion->topic;?>"/></td>
					</tr>
	  				<tr>
	    				<td>Content:</td>
	    				<td><textarea rows="5" cols="50" name="content" id="content"><?php echo $discussion->content;?></textarea></td>
	  				</tr>
	  				<tr>
	    				<td align="center"><input type="submit" name="submit" id="submit" value="Sumbit"></td>
	    			</tr>
	            </table>
	         </form>
	      </td>
	    </tr>
	</table>
</div>