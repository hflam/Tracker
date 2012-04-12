<script type="text/javascript" src="<?php echo site_url('public/js/threads.js')?>"></script>


<div id='thread_detail' class='sub_content'>
	<div id='source_title'><?php echo $source." ".$thread->chapter."章";?></div>
	<div id='discussion_div'><?php echo anchor('discussions/create/'.$thread->thread_id, 'New Discussion');?> | <?php if(count($related_discussions))echo'<a href="javascript:void(0)" onclick="display_related_discussion()">';?>Related Discussion (<?php echo count($related_discussions)?>)<?php if(count($related_discussions))echo'</a>';?></div>
	<br/>
	<br/>
	<?php if(count($related_discussions)):?>

		<table id='related_discussion_table'>
			<tr>
				<th>Related Discussion</th>
			</tr>
			<?php 
					foreach($related_discussions as $topic)
					{
						echo '<tr><td><div>'.anchor('discussions/detail/'.$topic->id, $topic->topic).'<div></td>';
						echo '</tr>';
					}
			?>
		</table>
		<br/>
	<?php endif;?>

	<div class="thread_neg_bar">
		<div id='cnv_menu' class="thread_menu" onclick='openindex("CNV",<?php echo '"'.$thread->thread_id.'"';?>)'>CNV (新譯本)</div>
		<div id='cuv_menu' class="thread_menu" onclick='openindex("CUV",<?php echo '"'.$thread->thread_id.'"';?>)'>CUV (和合本)</div>
		<div id='rcuv_menu' class="thread_menu_last" onclick='openindex("RCUV",<?php echo '"'.$thread->thread_id.'"';?>)'>RCUV (和合本修訂版)</div>
	</div>
	<br/>
	<div id='cnv_content'><?php echo $thread->CNV;?></div>
	<div id='cuv_content'><?php echo $thread->CUV;?></div>
	<div id='rcuv_content'><?php echo $thread->RCUV;?></div>
	<?php 
	echo $thread->content;?>
</div>