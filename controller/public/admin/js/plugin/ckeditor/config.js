/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'public/admin/js/plugin/ckfinder/ckfinder.html';

config.filebrowserImageBrowseUrl = 'public/admin/js/plugin/ckfinder/ckfinder.html?type=Images';

config.filebrowserFlashBrowseUrl = 'public/admin/js/plugin/ckfinder/ckfinder.html?type=Flash';

config.filebrowserUploadUrl = 'public/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

config.filebrowserImageUploadUrl = 'public/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

config.filebrowserFlashUploadUrl = 'public/admin/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
