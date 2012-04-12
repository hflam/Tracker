var active_menu = "none";
var flag=false;

function set_active_menu(id)
{
	if(active_menu!='none')
		document.getElementById(active_menu+"_content").style.display='none';
	if(id!='none')
		document.getElementById(id+"_content").style.display='block';
	document.getElementById(active_menu+"_menu").style.color='#666';
	document.getElementById(id+"_menu").style.color='#669933';
	active_menu = id;
	
}

function display_related_discussion()
{
	if(!flag || document.getElementById("related_discussion_table").style.display=='none')
		document.getElementById("related_discussion_table").style.display='block';
	else
		document.getElementById("related_discussion_table").style.display='none';
	flag=true;
}

function openindex(type, id)
{ 
	window.open ('../show_quote/'+type+'/'+id, 'newwindow', height=100,
		width=400, toolbar='no', menubar='no', scrollbars='no', resizable='no',
		 directories='no', status='no');
}

function redirect(link){

	$.get(link, function(data) {
		  $('#right_panel').html(data);
		});
}