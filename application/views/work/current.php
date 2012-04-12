			<?php 
			if(count($current_jobs)==0) echo 'There is no current jobs yet';
			else{
				foreach($current_jobs as $job):?>
					<div class="action">Edit | <a href="javascript:void(0)" onclick='finish("<?php echo site_url();?>", "<?php echo $job->id;?>")'>Finish</a></div>
					<div><a href="javascript:void(0)" onclick='redirect_id("<?php echo site_url('work/detail/'.$job->id);?>","objective_info")'><?php echo $job->title;?></a></div>

				<?php endforeach;
			}?>