<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<div class='sub_content'>
	<table border="0">
	  <tr>
	     <td>
	        <form id="login_form" name="login_form" method="post" action="<?php echo base_url();?>threads/create">
	           <label>
	           	<p align="center">New Entry.</p>
	           </label>
	           <div>
	           		<div class='source'>Source: <?php echo form_dropdown('source', $source); ?></div>
	           		<div>Chapter: <input type="text" name="chapter" id="chapter" /></div>
	           </div>
	           <table width="400" align="center" border="0">
	  				<tr>
	    				<td>新譯本:</td>
	    				<td><textarea rows="5" cols="50" name="cnv" id="cnv"></textarea></td>
	  				</tr>
	  				<tr>
	    				<td>和合本:</td>
	    				<td><textarea rows="5" cols="50" name="cuv" id="cuv"></textarea></td>
	  				</tr>
	  				<tr>
	    				<td>和合本修訂版:</td>
	    				<td><textarea rows="5" cols="50" name="rcuv" id="rcuv"></textarea></td>
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

