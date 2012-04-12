<?php 
function displaytime($time)
{
	$different = strtotime("now")-strtotime($time);
	if($different < 10)
		return "A few seconds ago";
	if($different < 60)
		return $different." seconds ago";
	if($different < 3600)
		return round($different/60,0)." minutes ago";
	else
		return date("M j g:i a",strtotime($time));
	
}
?>								
<img src="../public/images/cross.png" width="640" height="480" alt="" title="">
<div class="featured">
	<div id='header_img' class="header">
    	<ul>
			<li class="first">
				<img src="../public/images/hi.jpg" width="50" height="62" alt="" title="" >
			</li>
			<li class="last">
				<h2>Though he slay me, yet will I trust in him: but I will maintain mine own ways before him.</h2> 
				<h2>Job, 13. 15</h2>
			</li>
 		</ul>
  	</div>
	<div id='action_div' class="body">
    	<h3>
			<?php if(count($actions)==0)
					echo 'Latest news will be shown here';
				  else foreach($actions as $action)
				  {
				  	echo '<div>'.$action->message.'</div>';
				  	echo '<div class="action_date">'.displaytime($action->create_date).'</div>';
				  	echo '<br>';
				  }
					
					?>
		</h3>
  	</div>
  	<?php if(($this->session->userdata('rank'))=='Admin'):?>
  	<div id='input_div'>
  		Input Action
  		<form id="login_form" name="login_form" method="post" action="<?php echo base_url();?>actions/create">
  			<input type='text' id='message' name='message'/><input type="submit" name="submit" id="submit" value="Sumbit"/>
  		</form>	
  	</div>
  	<?php endif;?>
</div>
									