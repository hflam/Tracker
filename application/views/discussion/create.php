<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<div class='sub_content'>
	<table border="0">
	  <tr>
	     <td>
	        <form id="login_form" name="login_form" method="post" action="<?php echo base_url();?>discussions/create/<?php echo isset($thread)?$thread->thread_id:"";?>">
	        <br/>
	           <label>
	           	<p align="center">New Discussion</p>
	           </label>

	           <table align="center" border="0">
	           		<?php if(isset($thread)):?>
	           		<tr>
	           			<td>Related Entry:</td>
	           			<td><?php echo $source.' '.$thread->chapter.'章'?></td>
	           		</tr>
	           		<?php endif;?>
					<tr>
						<td>Topic:</td>
						<td><input type="text" name="topic" id="topic" /></td>
					</tr>
	  				<tr>
	    				<td>Content:</td>
	    				<td><textarea rows="5" cols="50" name="content" id="content"></textarea></td>
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