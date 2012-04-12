<div class='sub_content'>

	<?php if(!isset($topics) || count($topics)==0)
				echo '<br/>There is no discussion yet. Why not "<a href="../discussions/create">create</a>" a new one?';
		  else {?>
	<div id='create_discussion_div'><a href="../discussions/create">Create Discussion</a></div>
	<br/>
	<table class='source_table'>
		<tr>
			<th>Topic</th>
			<th>Creator</th>
			<th>Create Date</th>
			<th></th>
		</tr>
		<?php 
				foreach($topics as $topic)
				{
					echo '<tr><td><div>'.$topic->topic.'<div></td><td>'.$topic->creator.'</td>';
					echo '<td>'.$topic->create_date.'</td>';
					echo '<td><a href="../discussions/detail/'.$topic->id.'">detail</a>';
					if( $topic->creator_id == $this->session->userdata('user_id'))
						echo ' | <a href="../discussions/edit/'.$topic->id.'">edit</a>';
					if($this->session->userdata('rank_id') == "1" || $topic->creator_id == $this->session->userdata('user_id'))
						echo ' | <a href="../discussions/delete/'.$topic->id.'">delete</a>';
					echo '</td></tr>';
					
				}
		  }
		?>
	</table>
</div>