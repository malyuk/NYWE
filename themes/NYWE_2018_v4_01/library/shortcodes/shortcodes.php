<?php 

add_action('admin_head', 'leandroarts_add_shortcodes');

// TINYMCE CMS BUTTONS:
function leandroarts_add_shortcodes() {
    if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') ) {
         add_filter("mce_external_plugins", "leandroarts_shortcodes");
         add_filter('mce_buttons', 'leandroarts_register_buttons');
    }
}

function leandroarts_shortcodes($plugin_array) {
    $plugin_array['leandroarts_shortcode_button'] = get_template_directory_uri().'/library/shortcodes/shortcode_button.js';
    return $plugin_array;
}

function leandroarts_register_buttons($buttons) {
   array_push($buttons, "leandroarts_shortcode_button");
   return $buttons;
}


// SHORTCODE PROCESSING:

