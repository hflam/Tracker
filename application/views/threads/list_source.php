<div class='sub_content'>
	<table class='source_table'>
		<tr>
			<th>Source</th>
			<th>章數</th>
			<th>Creator</th>
			<th></th>
		</tr>
		<?php 
			foreach($sources as $source)
			{
				echo '<tr><td><div>'.$source->source.'<div></td><td>'.$source->chapter.'章</td>';
				echo '<td>'.$source->creator.'</td>';
				echo '<td><a href="../../threads/detail/'.$source->thread_id.'">detail</a>';
				if( $source->creator_id == $this->session->userdata('user_id'))
					echo ' | <a href="../../threads/edit/'.$source->thread_id.'">edit</a>';
				if($this->session->userdata('rank_id') == "1" || $source->creator_id == $this->session->userdata('user_id'))
					echo ' | <a href="../../threads/delete/'.$source->thread_id.'">delete</a>';
				echo '</td></tr>';
				echo '<tr class="hidden_row" id="source_content'.$source->thread_id.'"><td colspan="4">'.$source->content.'</td></tr>';
			}
		?>
	</table>
</div>