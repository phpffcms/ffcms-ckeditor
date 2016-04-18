CKEDITOR.dialog.add( 'widgetbootstrapAlert', function( editor ) {
    var clientHeight = document.documentElement.clientHeight,
    	alertTypes = CKEDITOR.config.widgetbootstrapAlert_alertTypes,
        alertTypesSelect = [],
        alertName;

    for ( alertName in alertTypes ) {
        alertTypesSelect.push( [ alertTypes[ alertName ], alertName ] );
    }

    return {
        title: 'Edit Alert Type',
        minWidth: 200,
        minHeight: 100,
        contents: [
            {
                id: 'info',
                elements: [
                    {
                        id: 'type',
                        type: 'select',
                        label: 'Alert Type',
                        items: alertTypesSelect,
                        required: true,
                        validate: CKEDITOR.dialog.validate.notEmpty('Alert type required'),
                        setup: function( widget ) {
                            this.setValue( widget.data.type != undefined ? widget.data.type : 'alert');
                        },
                        commit: function( widget ) {
                            widget.setData( 'type', this.getValue() );
                        }
                    }
                ]
            }
        ]
    };
} );