/* SHORTCODE BUTTON */

(function() {
    tinymce.PluginManager.add('leandroarts_shortcode_button', function( editor, url ) {
        editor.addButton( 'leandroarts_shortcode_button', {
            title: 'Button Maker',
            icon: 'wp_code',
            
            onclick: function() {
                editor.windowManager.open( {
                    title: 'Create your button',
                    body: [{
                        type: 'textbox',
                        name: 'text',
                        label: 'Button Text'
                    },
                    {
                        type: 'textbox',
                        name: 'url',
                        label: 'Button URL'
                    }],
                    onsubmit: function( e ) {
                        editor.insertContent( '<a class="button" href="' + e.data.url + '">' + e.data.text + '</a>');
                    }
                });
            }

        });
    });
})();