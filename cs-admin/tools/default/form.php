
<?	



if (!file_exists("../cs-content/plugins/".cs_table()."/tools/item.php")) {
	
	
	cs_item_tool($mysqli, $table, Q("id"), "", "", ""); }
			else { include "../cs-content/plugins/".cs_table()."/tools/item.php"; }
			
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