/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */



CKEDITOR.editorConfig = FUNCTION(config) {
    config.filebrowserBrowseUrl = '/ckeditor/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/ckeditor/browse.php?opener=ckeditor&type=images';
 
  
    config.filebrowserFlashBrowseUrl = '/ckeditor/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/ckeditor/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/ckeditor/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/ckeditor/upload.php?opener=ckeditor&type=flash';
};