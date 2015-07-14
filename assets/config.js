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

    config.filebrowserBrowseUrl = '/api.php?iface=back&object=ckbrowser&type=0';
    config.filebrowserUploadUrl = '/api.php?iface=back&object=ckloader&type=0';

    config.filebrowserImageBrowseUrl = '/api.php?iface=back&object=ckbrowser&type=1';
    config.filebrowserImageUploadUrl = '/api.php?iface=back&object=ckloader&type=1';

    config.filebrowserFlashBrowseUrl = '/api.php?iface=back&object=ckbrowser&type=2';
    config.filebrowserFlashUploadUrl = '/api.php?iface=back&object=ckloader&type=2';

    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    config.scayt_autoStartup = false;
    config.disableNativeSpellChecker = false;

    //config.extraPlugins = 'videodetector,widget,lineutils,codesnippet,leaflet,wordcount';
    config.extraPlugins = 'notification,wordcount,widget,lineutils,codesnippet,leaflet,fakeobjects,pagebreak';

    config.wordcount = {
        showWordCount: true,
        showCharCount: true,
        showParagraphs: false
    };

    config.forcePasteAsPlainText = true;

    config.height = '320';

    config.startupFocus = false;

    config.basicEntities = false;
};
