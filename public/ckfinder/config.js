/*
 Copyright (c) 2007-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or https://ckeditor.com/sales/license/ckfinder
 */

var config = {};
config.filebrowserBrowseUrl = 'http://localhost/webnail/public/ckfinder/ckfinder.html';

config.filebrowserImageBrowseUrl = 'http://localhost/webnail/public/ckfinder/ckfinder.html?type=Images';

config.filebrowserFlashBrowseUrl = 'http://localhost/webnail/public/ckfinder/ckfinder.html?type=Flash';

config.filebrowserUploadUrl = 'http://localhost/webnail/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

config.filebrowserImageUploadUrl = 'http://localhost/webnail/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

config.filebrowserFlashUploadUrl = 'http://localhost/webnail/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
// Set your configuration options below.

// Examples:
// config.language = 'pl';
// config.skin = 'jquery-mobile';

CKFinder.define( config );

