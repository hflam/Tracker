<script type="text/javascript" src="<?php echo site_url('public/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('public/js/work.js')?>"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo site_url('public/js/create.js')?>"></script>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url('public/css/default.css')?>"/>
<div class="work_div">
	<div class="left_panel">
		<div class="note_div">
			<div class="title_bar">
				Current Task
			</div>
			<div id='current' class="content note_bg">
			<?php 
			$now = date("Y-m-d H:i:s");
			if(count($current_jobs)==0) echo 'There is no current jobs yet';
			else{
				foreach($current_jobs as $job):?>
				<div class='job'  onclick='redirect_id("<?php echo site_url('work/detail/'.$job->id);?>","objective_info")'>
					<div><?php echo $job->title;?></div>
					<span style='color:
					<?php 
					$diff = strtotime($job->finish_by) - strtotime($now);
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					if($diff <= 0){ echo "red"; $remain = "Expired!";}
					else if($days <= 0){echo "red"; $remain ="Due Today!";}
					else if($days <= 3){echo "orange"; $remain = $days." days left";}
					else {echo "green"; $reamin = $days." days left";}
					?>'><?php echo $remain;?></span>
					<div class="action">Edit | <a href="javascript:void(0)" onclick='finish("<?php echo site_url();?>", "<?php echo $job->id;?>")'>Finish</a></div>
				</div>
				<?php endforeach;
			}?>
			
			
			</div>
			<div class="bar_end">
			
			</div>
		</div>
		<br/>
		<div class="note_div">
			<div class="title_bar">
				Log
			</div>
			<div id='log' class="content note_bg">
				<?php 
				if(count($finished_jobs)==0) echo 'There is no finished jobs yet';
				else{
					foreach($finished_jobs as $job):?>
						<div><a href="javascript:void(0)" onclick='redirect_id("<?php echo site_url('work/detail/'.$job->id);?>","objective_info")'><?php echo $job->title;?></a></div>
	
					<?php endforeach;
				}?>
			</div>
			<div class="bar_end">
			
			</div>
		</div>
	</div>
	<div class="center_panel">
		<div id="statistic" class="note_div">
			<div class="title_bar">
				Statistic
			</div>
			<div class="note_bg">
			
			</div>
			<div class="bar_end">
			
			</div>
		</div>
		<div class="note_div">
			<div class="title_bar">
				Display
			</div>
			<div id="content" class="display note_bg">
				<div id="objective_info" style="display:none">
				</div>
				<div id="status" style="display:none"></div>
				<div id="create_div" style="display:none">
					<form id="create_form" name="create_form" method="post" action="../work/create">
			           <label>
			           		<p align="center">New Entry.</p>
			           </label>
						<table width="300" align="center" border="0">
					  				<tr>
					    				<td>Title:</td>
					    				<td><input type='text' name="title" id="title" ></td>
					  				</tr>
					  				<tr>
					    				<td>Description:</td>
					    				<td><textarea rows="7" cols="20" name="description" id="description"></textarea></td>
					  				</tr>
					  				<tr>
					    				<td>Finish by:</td>
					    				<td><input type='text' name="finish_by" id="finish_by" ></td>
					  				</tr>
					
					  				<tr>
					    				<td align="center"><input type="submit" name="submit" id="submit" value="Sumbit"></td>
					    			</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="bar_end">
			
			</div>
		</div>
	</div>
	<div class="center_panel">
		<div class="">
			<OBJECT ID="Player"
			  CLASSID="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" type="application/x-oleobject" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701">
			  	<param name="fileName" value="<?php echo site_url("public/playlist")?>/pure.wpl">
			    <PARAM name="autoStart" value="false">
			    <param name="showControls" value="true">
			    <embed  type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" 
			    name="MediaPlayer" 
			    src="<?php echo site_url("public/playlist")?>/pure.wpl" name="MediaPlayer1" width="280" height="76" autostart="0" showcontrols="1" ></embed>
			</OBJECT>
		</div>
		<br/>
		<div class="button_panel">
			<a href="javascript:void(0)" onclick='clear_form("create_form");show_content("create_div")' class="button">Create</a>
		</div>
		<br/>
		<div class="note_div">
			<div class="title_bar">
				Note
			</div>
			<div class="note_bg">
				Neopets
			</div>
			<div class="bar_end">
			
			</div>
		</div>
	</div>

</div>