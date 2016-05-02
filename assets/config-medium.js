/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    config.skin = 'office2013';

    // The toolbar groups arrangement, optimized for a single toolbar row.
    config.toolbarGroups = [
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'forms' },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' },
        { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] }
    ];

    config.height = 300;

    // The default plugins included in the basic setup define some buttons that
    // are not needed in a basic editor. They are removed here.
    config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript,Indent,Outdent';

    config.plugins = 'basicstyles,clipboard,floatingspace,list,indentlist,enterkey,entities,link,toolbar,undo,wysiwygarea,blockquote,sourcearea';
    
    // Se the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';
    
    config.extraPlugins = 'wordcount,widget,lineutils,codesnippet,fakeobjects,pagebreak,oembed';

    config.scayt_autoStartup = false;
    config.disableNativeSpellChecker = false;
    
    config.wordcount = {
            showWordCount: true,
            showCharCount: true,
            showParagraphs: false
    };
	
    config.forcePasteAsPlainText = true;
	config.startupFocus = false;
	config.basicEntities = false;
	config.startupOutlineBlocks = true;
    
    // Dialog windows are also simplified.
    config.removeDialogTabs = 'link:advanced';
};