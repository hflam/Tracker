			<?php 
			if(count($finished_jobs)==0) echo 'There is no finished jobs yet';
			else{
				foreach($finished_jobs as $job):?>
					<div><a href="javascript:void(0)" onclick='redirect_id("<?php echo site_url('work/detail/'.$job->id);?>","objective_info")'><?php echo $job->title;?></a></div>

				<?php endforeach;
			}?>