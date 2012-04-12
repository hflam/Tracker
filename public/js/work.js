var active_source ="";
var active_tag = "home";




function show_content(id)
{
	if(active_source == "")
	{
		document.getElementById(id).style.display='block';
		active_source = id;
	}
	else if(active_source == id)
	{
	}
	else if(active_source != "")
	{
		document.getElementById(active_source).style.display='none';
		if(active_source != id)
		{
			document.getElementById(id).style.display='block';
			active_source = id;
		}
	}
	
}

function change_active_class(id)
{
	change_class(active_tag, "");
	change_class(id, "active");
	active_tag = id;
}

function change_class(id, classname)
{
	document.getElementById(id).setAttribute("class", classname);
}

function component_hidden(id)
{
	document.getElementById(id).style.display='none';
}

function component_show(id)
{
	document.getElementById(id).style.display='block';
}

function finish(baselink, id){
	$.get(baselink+'/work/finish/'+id, function(data) {
		  if(data=='finish')
			  {
			  $.get(baselink+'/work/current/', function(data) {
				  $('#current').html(data);
				});
			  $.get(baselink+'/work/log/', function(data) {
				  $('#log').html(data);
				});
			  }
		});
	
}

function clear_form(id)
{
	document.getElementById(id).reset();
}

function redirect_id(link, id){

	$.get(link, function(data) {
		  $('#'+id).html(data);
		  show_content(id);
		});
}

function redirect(link){

	$.get(link, function(data) {
		  $('#content').html(data);
		  
		});
}