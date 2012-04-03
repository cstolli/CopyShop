
<? 



if (!file_exists("tools/".cs_table($table)."/index.php")) 
{ 
	
	if (file_exists("../".CS_PLUGINPATH."/".cs_table($table)."/tools/index.php")) 
	{ 
	
	
		
		include "../".CS_PLUGINPATH."/".cs_table($table)."/tools/index.php";
	}
	else
	{
		
		
		
		cs_tools_list_header($table);
		
		cs_edit_list($mysqli, $table, "", "", "", ""); 
	}
}
else 
{
	include "tools/".cs_table($table)."/index.php";
}
?>