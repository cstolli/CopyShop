<script>

var $$ = YAHOO.util.Selector.query;
YAHOO.util.Event.onDOMReady(function () { 
		//alert('hello');
uiLayer = YAHOO.util.Dom.getRegion('selectLink');
overlay = YAHOO.util.Dom.get('uploaderOverlay');
YAHOO.util.Dom.setStyle(overlay, 'width', uiLayer.right-uiLayer.left + "px");
YAHOO.util.Dom.setStyle(overlay, 'height', uiLayer.bottom-uiLayer.top + "px");
});
	
var uploaddir;
var x;
var child;
var uilayer;
var overlay;
var ff;
var curel;
function moveOL(element)
{
	
	
	//alert('hello');
	
	 x = element.id.replace("uploader_", "");
	 child = document.getElementById("selectLink_"+x)
	
	//var thing = $$('.selectFilesLink.'+x+' a');
	//alert(thing.id);
	//var sfa = sfl.firstChild;
uiLayer = YAHOO.util.Dom.getRegion(child);
overlay = YAHOO.util.Dom.get('uploaderOverlay');

dom.setStyle(overlay, 'left', uiLayer.left + 'px');
dom.setStyle(overlay, 'top', uiLayer.top + 'px');




//alert(overlay.style.left);
YAHOO.util.Dom.setStyle(overlay, 'width', uiLayer.right-uiLayer.left + "px");
YAHOO.util.Dom.setStyle(overlay, 'height', uiLayer.bottom-uiLayer.top + "px");

	cat = child.className;
	//alert(cat);
	qty = document.getElementById('upload_qty_'+cat).value;
	//alert(qty);
	
	
	if(window.location.pathname.search('cs-admin') !== -1) {
		uploaddir = window.location.pathname.replace('index.php', '');
	}else {
		uploaddir = window.location.pathname.replace('index.php', '') + 'cs-admin/';
	}
	
	if (!qty){qty = 1}
	//YAHOO.util.Dom.setStyle($$('#selectLink.'+cat), 'color', '#CD853F');
	//replace if with select
	
	switch(cat){
	
		case 'images':
		case 'photos':
		case 'flyers':
		default:
			ff = new Array({description:"Images", extensions:"*.jpg;*.jpeg;*.png;*.gif;"});
			uploadPath = uploaddir + 'upload_images_gd.php';
			break;
		case 'audio':
		case 'mp3':
			ff = new Array({description:"Audio", extensions:"*.mp3;*.wmv;*.wav;*.aiff"});
			uploadPath = uploaddir + 'upload_audio.php';
			break;
		case 'wpd':
		case 'doc':
		case 'docx':
		case 'pdf':
		case 'pdfs':
			ff = new Array({description:"Documents", extensions:"*.pdf;*.zip;*.doc;*.txt;*.docx"});
			uploadPath = uploaddir + 'upload_docs_v5.php';
		
	}
	/*if (cat == 'images' || cat == 'photos' || cat == 'flyers') {
		//alert(cat);
			
		}
		else
		{
			
		}*/
		
		uploader.setFileFilters(ff);
	
		if(qty==''||qty=='1'){uploader.setAllowMultipleFiles(false);}else{uploader.setAllowMultipleFiles(true);}
			YAHOO.util.Event.addListener(YAHOO.util.Selector.query("#uploadLink_"+x), "click", upload);
	//YAHOO.util.Event.addListener("cancelAllLink", "click", cancelAll);
	//alert(qty);
}

	// Custom URL for the uploader swf file (same folder).
	if(window.location.pathname.search('cs-admin') !== -1) {
	YAHOO.widget.Uploader.SWFURL = "../cs-includes/YUI/2.6.0/build/uploader/assets/uploader.swf";
	} else { 
	YAHOO.widget.Uploader.SWFURL = "cs-includes/YUI/2.6.0/build/uploader/assets/uploader.swf";
	}
	

    // Instantiate the uploader and write it to its placeholder div.
	var uploader = new YAHOO.widget.Uploader( "uploaderOverlay" );
	var cat = new Querystring().get("tbl_cat");
	var table = '<?=$table?>';
	var id = '<?=$id?>';
	var qty = '';
	
	if (!cat) { cat = 0; }
	if (!table) { table = ''; }
	if (!id) { id = 0; }
	if (!qty) {qty = 1};
	
	//add event listeners for ui elements

	
	// Add event listeners to various events on the uploader.
	// Methods on the uploader should only be called once the 
	// contentReady event has fired.
	uploader.addListener('contentReady', handleContentReady);
	uploader.addListener('fileSelect', onFileSelect)
	uploader.addListener('uploadStart', onUploadStart);
	uploader.addListener('uploadProgress', onUploadProgress);
	uploader.addListener('uploadCancel', onUploadCancel);
	uploader.addListener('uploadComplete', onUploadComplete);
	uploader.addListener('uploadCompleteData', onUploadResponse);
	uploader.addListener('uploadError', onUploadError);
    uploader.addListener('rollOver', handleRollOver);
    uploader.addListener('rollOut', handleRollOut);
    uploader.addListener('click', handleClick);
    	
		
    // Variable for holding the filelist.
	var files;
	
	// When the mouse rolls over the uploader, this function
	// is called in response to the rollOver event.
	// It changes the appearance of the UI element below the Flash overlay.
	function handleRollOver () {
		
		//YAHOO.util.Dom.setStyle($$('#selectLink.'+cat), 'color', '#CD853F');
		//YAHOO.util.Dom.setStyle(YAHOO.util.Dom.get('selectLink'), 'background-color', '#ffffff');
	//	YAHOO.util.Dom.setStyle(YAHOO.util.Dom.get('selectLink'), 'opacity', "30");
	}
	
	// On rollOut event, this function is called, which changes the appearance of the
	// UI element below the Flash layer back to its original state.
	function handleRollOut () {
		//YAHOO.util.Dom.setStyle($$('#selectLink.'+cat), 'color', "#1A6F7B");
	//	YAHOO.util.Dom.setStyle(YAHOO.util.Dom.get('selectLink'), 'background-color', "#FFFFFF");
	}
	
	// When the Flash layer is clicked, the "Browse" dialog is invoked.
	// The click event handler allows you to do something else if you need to.
	function handleClick () {
		//uploader.clearFileList();	
	
		
		         
//		alert(uploadPath);
	}
	
	// When contentReady event is fired, you can call methods on the uploader.
	function handleContentReady () {
	    // Allows the uploader to send log messages to trace, as well as to YAHOO.log
		//uploader.setAllowLogging(true);
		
		// for now, if they are uplaoding an image for a thing, it's only one image.
		
		
		// New set of file filters.
		          
		// Apply new set of file filters to the uploader.
		
		
		
	}
	var uppath;
	
	// Actually uploads the files. In this case,
	// uploadAll() is used for automated queueing and upload 
	// of all files on the list.
	// You can manage the queue on your own and use "upload" instead,
	// if you need to modify the properties of the request for each
	// individual file.
	function upload() {
		//alert(dataArr.length);
		if (files != null) {
			
			//alert(window.location.pathname.replace('index.php', '') +uploadPath);
			for (var j = 0; j < dataArr.length; j++) {
				//qty = dataArr.length;
				//alert(dataArr[j].upload + " " + dataArr[j].id + " " + table + " " + id + " " + cat);
				if (dataArr[j].size <= uploadSizeLimit && dataArr[j].upload == 1){
					
					//alert("cs-admin/upload_images_gd.php");	
					
					uploader.upload(dataArr[j].id, uploadPath, "POST", {category: cat, ftable: table, fid:id, quantity:qty, name:dataArr[j].name}, "Filedata");
				}
				else
				{
					cancelCount = cancelCount + 1;
				}
			}
			return false;
		}	
		
	}
	
	// you may want to put some PHP in your include file that overrides
	// the upload limit with a value equal to how ever many free images they have left.
	
	var completeCounter = 0;
	var completedCounter = 0;
	
	var cancelCount = 0;
	
	var responseMessage;
	var recordCount = 0;
	var uploadSizeLimit = 30000000;
	
	// Fired when the user selects files in the "Browse" dialog
	// and clicks "Ok".
	function onFileSelect(event) {
		files = event.fileList;
		//alert(fileList);
		
		createDataTable(files);
		//alert(event.fileList);
		//document.getElementById("uploadLink_"+cat).style.display="block";
		//document.getElementById("cancelAllLink").style.display="block";	
		return false;
	}

	function createDataTable(entries) {
		
		//alert('hello');
	  rowCounter = 0;
	  this.fileIdHash = {};
	  this.dataArr = [];
	  
	  //build the data array, checking for file size and upload count limit
	  for(var i in entries) {
		 if (rowCounter + completedCounter < qty ) {
			 
			 var entry = entries[i];
			// alert(entry["size"]);
			//alerT(entry["name"]
			 if (entry["size"] > uploadSizeLimit)
			 {
				entry["progress"] = "<div class='yui-ul-complete-liner'>File size exceeds 1MB limit.</div>";
			 }
			 
			 else
			 {
			 	entry["progress"] = "<div class='yui-ul-prog-liner'></div>";
			 	entry["cancel"] = "<div class='yui-ul-cancel-link'></div>";
			 }
			 entry["image"] = "";
			 entry["upload"] = 1;
			 
			 dataArr.unshift(entry);
			 var x = dataArr[0].name;
			 //x.replace("'", "");
			 
			 //document.write(x);
			 rowCounter = rowCounter + 1;
			 responseMessage =  rowCounter + " file(s) selected.";
			// alert('#selectFilesLink.'+cat);
			// dom.setStyle($$('.selectFilesLink.'+cat), 'display', "none");
			
			
			 
			
		 }
		 
		// alert(rowCounter);
//		// else
//		// {
		 document.getElementById("selectFilesLink_"+cat).style.display="none";
		 //document.getElementById("selectFilesLink_"+cat).style.zIndex="-99";
		 overlay.style.zIndex="-99";
		 document.getElementById("uploadLink_"+cat).style.display="block";
		 document.getElementById("uploadLink_"+cat).style.zindex="99";
//			//responseMessage = "Sorry, there is an upload limit of " + qty + " images.";
//		//	 break;
//		//  }
//			 
	 	 recordCount = rowCounter;		 
	  }
	  

	  //create file id hashe
	  for (var j = 0; j < dataArr.length; j++) {
	    this.fileIdHash[dataArr[j].id] = j;
		//alert(j);
		//alert(dataArr[j].id);
		//alert(this.fileIdHash[dataArr[j].id]);
	  }
	
		//define the columns for the datatable
	 //   var myColumnDefs = [
	//		{key:"image", label: " ", sortable:false}, 	 	
	//        {key:"name", label: "Name", sortable:false},
	//     	{key:"size", label: "Size", sortable:false},
	//     	{key:"progress", label: "Progress", sortable:false},
	//		{key:'cancel', label:' ', sortable:false}
	//    ];

	  //create the datasource and schema from the dataArr
	  //this.myDataSource = new YAHOO.util.DataSource(dataArr);
	//  this.myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
     // this.myDataSource.responseSchema = {
        //  fields: ["id","image", "name","created","modified","type", "size", "progress", "cancel"]
    //  };

	  //create the datatable from the datasource
	//  this.singleSelectDataTable = new YAHOO.widget.DataTable("dataTableContainer",
	       //    myColumnDefs, this.myDataSource, {
	        //       caption:"Selected Files:",
	        //       selectionMode:"single"
	      //     });
	  
	  //create click event that cancels individual uploads
	 // this.singleSelectDataTable.subscribe('cellClickEvent', cancelUpload);
	  
	  //update ui
		document.getElementById("responseMessage_"+cat).innerHTML= responseMessage;
		document.getElementById("responseMessage_"+cat).style.display="block";
	}
	
	
	
function cancelUpload(oArgs) {
																 
    	var target = oArgs.target;
    	var column = this.getColumn(target);
		var row = this.getRow(target);
		var record = this.getRecord(row);
		var id = record.getData("id");
				
   	 if (column.key == 'cancel') {
		
		//check if user is cancelling the last file, if so, reset ui
		if (cancelCount == recordCount)
		{
			cancelAll();
			return;
		}
		
		//try to cancel an upload, it might not be running yet.
		try{
           uploader.cancel(id);
		  // uploader.removeFile(id);
		}
		catch(err)
		{
			//uploader.removeFile(id);
	    } 
		  
		// mark the file as cancelled so it gets skipped and update ui
		//alert(id);
		//alert(fileIdHash[id]);
		dataArr[fileIdHash[id]].upload = 0;
		progbar = "<span class=\"yui-ul-cancelled\">Cancelled</div>";
		//singleSelectDataTable.updateCell(record, 3, progbar);
		//singleSelectDataTable.updateCell(record, 4, ' ');
		
			
	    // if cancelling the only remaining file, do some stuff, update ui, etc
		if (cancelCount == recordCount - completeCounter){
			
			document.getElementById("responseMessage_"+cat).innerHTML="Complete. " + completeCounter + " images uploaded. " + cancelCount + " cancelled.";
			$$('.cs_tools_a2 ' + cat).style.display="block";
			document.getElementById("uploadLink_"+cat).style.display="none";
			//uploader.clearFileList();
			
		
		}		
	 }
	 return false;
}	

// cancel all uploads, clear the list, and reset the ui
function cancelAll(event) {
	uploader.clearFileList();
	files="";
	//createDataTable(fileList);
	//document.getElementById("responseMessage_"+cat).innerHTML="";
	//document.getElementById("selectLink").style.display="block";
	//document.getElementById("uploadLink_"+cat).style.display="none";
	//document.getElementById("cancelAllLink").style.display="none";
	
}

// remove file select dialog while files are uploading.
function onUploadStart(event) {
	//alert('hello');
	rowNum = fileIdHash[event["id"]];
	document.getElementById("uploadLink_"+cat).disabled=true;
	//document.getElementById("selectLink").style.display="none";
	//document.getElementById("cancelAllLink").style.display="none";
	document.getElementById("responseMessage_"+cat).innerHTML="Uploading...";
	
}
	
// on progress update the ui
function onUploadProgress(event) {
	
	
	//rowNum = fileIdHash[event["id"]];
	//prog = Math.round(100*(event["bytesLoaded"]/event["bytesTotal"]));
	//progbar = "<div class='yui-ul-prog-liner'><div class='yui-ul-prog-bar' style='width:" + prog + "px;'></div></div>";
	
}
	
// when upload is complete, update the ui, checking if its the last one, do some math, give a status report.
function onUploadComplete(event) {
	
	
//	rowNum = fileIdHash[event["id"]];
//	prog = Math.round(100*(event["bytesLoaded"]/event["bytesTotal"]));
//	progbar = "<div class='yui-ul-complete-liner'>Complete</div>";
//	
completeCounter = completeCounter + 1;
	
	
	
	
	
	
}



	
// Do something if a file upload throws an error.
// (When uploadAll() is used, the Uploader will
// attempt to continue uploading.
function onUploadError(event) {
	
	//alert(event.err);
}

// Do something if an upload is cancelled.
function onUploadCancel(event) {
	
}

// Do something when data is received back from the server.
function onUploadResponse(event) {
	
	//alert(event.data);

	var imagediv = document.getElementById('cs_uploader_'+cat);
	
	
	//alert(imagediv.id);
	
	//if (imagediv.innerHTML == "There are no images in this category"){
		
		//if (event.data !== '') {
		///}
	//}
	//else
	//{
	
	if (event.data !== '') {
		
		//alert(event.data);
		if (qty == 1){
		imagediv.innerHTML = event.data;
		}
		else
		{
		imagediv.innerHTML = imagediv.innerHTML + event.data;
		}
		//}
		
	}
		//YAHOO.example.DDApp.init();
		
	
	
	if (completeCounter == recordCount - cancelCount || completeCounter == qty - cancelCount)
	{
		//try to clear the filelist
		try 
		{
			uploader.clearFileList();
			//files='';
		}
		catch(err){}
		
		// if the user has available uploads left, show the select link
//		if (completeCounter < qty)
			 dom.setStyle($$('#overlay_container_'+cat), 'display', "block");
			 document.getElementById("uploadLink_"+cat).disabled=false;
			 //document.getElementById("uploadLink_"+cat).style.display="-99";
			 document.getElementById("uploadLink_"+cat).style.display="none";
			overlay.style.zIndex="99"
			 document.getElementById("selectFilesLink_"+cat).style.display="block";
			// dom.setStyle($$('#uploadLink.'+cat), 'display', "none");
		
		
		
		var message = completeCounter + " file(s) uploaded. ";
		if (cancelCount > 0){
			message = message + cancelCount + " images cancelled or skipped.";
		}
		document.getElementById("responseMessage_"+cat).innerHTML= message;
	
		
		//set the total uploaded in this instance counter, reset the batch counter
		//completedCounter = completedCounter + completeCounter;
		completeCounter = 0;
		recordCount = 0;
		
		
	}

}

</script>