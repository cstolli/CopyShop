	/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

//CKEDITOR.editorConfig = function( config )
//{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
//};

CKEDITOR.editorConfig = function(config) {
   config.filebrowserBrowseUrl = '../cs-includes/scripts/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '../cs-includes/scripts/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '../cs-includes/scripts/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '../cs-includes/scripts/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '../cs-includes/scripts/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '../cs-includes/scripts/kcfinder/upload.php?type=flash';
   config.filebrowserWindowWidth = '50%';
   config.filebrowserWindowHeight = '50%';
    config.filebrowserImageWindowWidth = '50%';
   config.filebrowserImageWindowHeight = '50%';
   //config.stylesheetParser_skipSelectors = "/(^body\.)/i";
   config.extraPlugins = 'stylesheetparser';
   config.contentsCss = '../cs-content/sites/'+CS_SITE+'/themes/default/styles_editor.css';
   config.enterMode = CKEDITOR.ENTER_P;
   config.shiftEnterMode = CKEDITOR.ENTER_BR;
   //config.autoParagraph = false;
   config.width="700px";
   config.height="600px";
 
 
   config.toolbar_Full =
	[
	
		//standard copyshop HTML area toolbar set
		/*{ name: 'document',    items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },*/
		
		

		{ name: 'tools',       items : [ 'Source','Maximize', 'ShowBlocks'] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo', '-', 'Find','Replace' ] },
		{ name: 'forms',       items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField', 'file' ] },
		'/',
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
		'/',
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'] }
		
		
		
	];
};