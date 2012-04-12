<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<div class='sub_content'>
	<div id='source_editor'>
		<p>Source Editor</p>
		<table>
			<tr>
				<td>Source Name</td>
				<td>English Name
				(The name displays on menu)</td>
			</tr>
			<?php if(count($sources) == 0) echo 'there is no source yet';
					else {
						foreach($sources as $source)
						{
							echo '<tr><td>'.$source->name.'</td><td>'.$source->eng_name.'</td></tr>';
						}
					}
					?>
		</table>
		<br/>
		Name of source&nbsp;&nbsp;&nbsp;:<input size='5' id='name' name='name' type='text'/><br/>
		English of source:<input id='eng_name' name='eng_name' type='text'/>
		<input id='create' value='create' type='submit'/>
		</form>
	</div>
	<div id='user_list'>
		<p>User List</p>
		<table>
			<tr>
				<td>UserName</td>
				<td>Rank</td>
			</tr>
			<?php if(count($users)==0) echo '<tr><td colspan="2">There is no users yet. But soon you will have : )</td></tr>';
					else{
						foreach($users as $user)
						{
							echo '<tr><td>'.$user->username.'</td><td>'.$user->rank.'</td></tr>';
						}
					}?>
			
		</table>
	</div>
</div>