<?php 
header('Content-Type: text/html; charset=utf-8');
?>

<table width="750" border="0">
  <tr>
     <td>
        <form id="login_form" name="login_form" method="post" action="<?php echo base_url();?>threads/edit/<?php echo $thread_id;?>">
           <label>
           	<p align="center">Edit Entry</p>
           </label>
           <div>
           		<div id='edit_source'>Source: <?php echo form_dropdown('source', $source_list); ?></div>
           		<div>Chapter: <input type="text" name="chapter" id="chapter" value="<?php echo $threads->chapter;?>"" /></div>
           </div>
           <table width="400" align="center" border="0">
  				<tr>
    				<td>新譯本:</td>
    				<td><textarea rows="5" cols="50" name="cnv" id="cnv"><?php echo $threads->CNV;?></textarea></td>
  				</tr>
  				<tr>
    				<td>和合本:</td>
    				<td><textarea rows="5" cols="50" name="cuv" id="cuv"><?php echo $threads->CUV;?></textarea></td>
  				</tr>
  				<tr>
    				<td>和合本修訂版:</td>
    				<td><textarea rows="5" cols="50" name="rcuv" id="rcuv"><?php echo $threads->RCUV;?></textarea></td>
  				</tr>
  				<tr>
    				<td>Content:</td>
    				<td><textarea rows="5" cols="50" name="content" id="content"><?php echo $threads->content;?></textarea></td>
  				</tr>
  				<tr>
    				<td align="center"><input type="submit" name="submit" id="submit" value="Sumbit"></td>
    			</tr>
            </table>
         </form>
      </td>
    </tr>
</table>
