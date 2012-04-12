<script type="text/javascript" src="<?php echo site_url('public/js/jquery.js')?>"></script>
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>



<form id="create_form" name="create_form" method="post" action="../work/create">
	           <label>
	           	<p align="center">New Entry.</p>
	           </label>
	<table width="300" align="center" border="0">
  				<tr>
    				<td>Title:</td>
    				<td><textarea rows="5" cols="50" name="title" id="title"></textarea></td>
  				</tr>
  				<tr>
    				<td>Description:</td>
    				<td><textarea rows="5" cols="50" name="description" id="description"></textarea></td>
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
<div id="datepicker"></div>

<script>
$(jQuery(document)).ready(function(){
	$("#finish_by").datepicker({ showOn: "both" });
	
		$("#create_form").validate({
		debug: false,
		rules: {
		},
		messages: {

		},
		submitHandler: function(form) {
			// do other stuff for a valid form
			$.post('work/create', $("#create_form").serialize(), function(data) {
				$('#content').html(data);
			});
		}
	});


});
</script>