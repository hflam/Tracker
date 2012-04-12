$(document).ready(function(){
	$( "#finish_by" ).datepicker({ showOn: "both", dateFormat: "yy-mm-dd"  });
		$("#create_form").validate({
		debug: false,
		rules: {
		},
		messages: {

		},
		submitHandler: function(form) {
			// do other stuff for a valid form
			$.post('work/create', $("#create_form").serialize(), function(data) {
				$('#status').html("Create success!");
				show_content("status");
				$('#current').html(data);
			});
		}
	});


});