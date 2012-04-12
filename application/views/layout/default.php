<!DOCTYPE html> 
<html lang="en"> 
<head>
        <title><?php echo $title?></title>
        <meta charset="utf-8" />
		<script type="text/javascript" src="<?php echo site_url('public/js/jquery.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('public/js/users.js')?>"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url('public/css/style.css')?>"/>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo site_url('public/css/default.css')?>"/>

<!--[if IE 6]>
	<link href="../public/css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if gte IE 7]> 
        <link href="../public/css/ie9.css" rel="stylesheet" type="text/css" />  
<![endif]-->
<?php foreach($css as $url): ?>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $url?>"/>
<?php endforeach; ?>

        
<?php foreach($js as $url): ?>
        <script type="text/javascript" src="<?php echo $url ?>"></script>
<?php endforeach; ?>

</head>

<body>
	<div id="background">
		<div id="page">
			<div class="header">
				<div class="footer">
					<div class="body">
						<div id="sidebar">
						    <a href="index.html"><img id="logo" src="<?php echo site_url('public/images/logo.png')?>" with="154" height="74" alt="" title=""/></a>
							<ul class="navigation">
							    <li><a id='home' href="<?php if(($this->session->userdata('rank'))=='Admin') echo site_url('admin/index'); else echo site_url('users/index');?>">Home</a></li>
							    <?php if(($this->session->userdata('rank'))=='Admin'):?><li><a id='admin_tools' href="<?php echo site_url('admin/tools');?>" onclick='change_active_class("create_source")'>Admin Tools</a></li>
							    <?php endif;?>
								<li><a id='create_entry' href="<?php echo site_url('threads/create')?>" onclick='change_active_class("create_entry")'>Create Entry</a></li>
								<?php if(isset($sources)):?>
									<?php foreach($sources as $source):?>
										<li><a id='list_entry_<?php echo $source->id;?>' href="<?php echo site_url('threads/list_threads/'.$source->id)?>" onclick='change_active_class("list_entry")'><?php echo $source->eng_name;?></a></li>
									<?php endforeach;?>
								<?php endif;?>
								<li><a id='discussion' href="<?php echo site_url('discussions')?>" onclick='change_active_class("discussion")'>Discussion</a></li>
								<li class="last" ><a href='<?php echo site_url('accounts/logout')?>'>Logout</a></li>
							</ul>
							
							
							<div class="footenote">
							  <span>&copy; Copyright &copy; 2012.</span>
							  <span><a href="index.html">Alvin Lam</a> all rights reserved</span>
							</div>
							
						</div>
						<div id="right_panel" >
							<?php echo $output ?>
						</div>
					</div>
			 	</div>
				<div class="shadow">&nbsp;</div>
			</div>    
		</div>    
	</div>
		<script type="text/javascript">
			document.getElementById("<?php echo $active_menu;?>").style.color='#693';
		</script>
</body>
</html>
