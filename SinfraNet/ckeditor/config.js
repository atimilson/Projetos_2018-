/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	
	config.extraPlugins = 'widget,html5video';

    config.disallowedContent = 'img{width,height}';
    var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    
    
//  config . filebrowserBrowseUrl = baseUrl+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
//   config . filebrowserImageBrowseUrl = baseUrl+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
//  config . filebrowserFlashBrowseUrl = baseUrl+'/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
//   config . filebrowserUploadUrl = baseUrl+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
 //  config . filebrowserImageUploadUrl = baseUrl+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
//  config . filebrowserFlashUploadUrl = baseUrl+'/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
 
	config.filebrowserBrowseUrl = baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=3&editor=ckeditor&fldr=',
	config.filebrowserUploadUrl = baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=3&editor=ckeditor&fldr=',
	config.filebrowserImageBrowseUrl = baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
	config.filebrowserImageUploadUrl = baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
	config.filebrowserFlashBrowseUrl = baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    config.filebrowserFlashUploadUrl = baseUrl+'/responsivefilemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr='
    
};
