CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

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

    config.height = 120;

    // The default plugins included in the basic setup define some buttons that
    // are not needed in a basic editor. They are removed here.
    config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript,Indent,Outdent';

    config.plugins = 'basicstyles,list,indentlist,enterkey,entities,link,toolbar,wysiwygarea,blockquote,sourcearea,codesnippet,smiley';
    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    config.scayt_autoStartup = false;
    config.disableNativeSpellChecker = false;

    config.extraPlugins = 'wordcount';

    config.wordcount = {
        showWordCount: true,
        showCharCount: true,
        showParagraphs: false
    };

    config.forcePasteAsPlainText = true;
    config.startupFocus = false;
    config.basicEntities = false;
    config.startupOutlineBlocks = true;

    config.protectedSource.push(/<i[^>]*><\/i>/g);
};