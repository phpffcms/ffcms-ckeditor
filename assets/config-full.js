/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    config.skin = 'office2013';

    config.toolbarGroups = [
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
        '/',
        { name: 'clipboard',   groups: [ 'clipboard' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'others' },
        { name: 'styles' }
    ];

    // Remove some buttons, provided by the standard plugins, which we don't
    // need to have in the Standard(s) toolbar.
    config.removeButtons = 'Replace,Save,Print,NewPage,DocProps,Preview,document,Templates,Find,SelectAll,Language';

    config.allowedContent = true;

    // Se the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    config.filebrowserBrowseUrl = script_url+'/api/ckbrowser/browse/files?lang='+script_lang;
    config.filebrowserUploadUrl = script_url+'/api/ckbrowser/upload/files?lang='+script_lang;

    config.filebrowserImageBrowseUrl = script_url+'/api/ckbrowser/browse/images?lang='+script_lang;
    config.filebrowserImageUploadUrl = script_url+'/api/ckbrowser/upload/images?lang='+script_lang;

    config.filebrowserFlashBrowseUrl = script_url+'/api/ckbrowser/browse/flash?lang='+script_lang;
    config.filebrowserFlashUploadUrl = script_url+'/api/ckbrowser/upload/flash?lang='+script_lang;

    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    config.scayt_autoStartup = false;
    config.disableNativeSpellChecker = false;

    //config.extraPlugins = 'videodetector,widget,lineutils,codesnippet,leaflet,wordcount';
    config.extraPlugins = 'notification,wordcount,widget,lineutils,codesnippet,leaflet,fakeobjects,pagebreak,oembed';

    config.wordcount = {
        showWordCount: true,
        showCharCount: true,
        showParagraphs: false
    };

    config.forcePasteAsPlainText = true;
    config.height = '320';
    config.startupFocus = false;
    config.basicEntities = false;
    config.startupOutlineBlocks = true;
};
