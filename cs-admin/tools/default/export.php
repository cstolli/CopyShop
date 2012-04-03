
<?	



if (!file_exists("../cs-content/plugins/".cs_table()."/tools/export.php")) {
	
	//cs_tools_form_header($mysqli, Q("tbl"), Q("id"));
	//cs_field_list($mysqli, $table, Q("id"), "", "", ""); 
	}
			else { 
			
			include "../cs-content/plugins/".cs_table()."/tools/export.php"; }
			
			switch (Q("tbl"))
			{
				case "cs_copy":
				case "cs_pages":
					//cs_image_browse_sidebar($mysqli);
					break;
				default:
					break;
			}
            
            ?>