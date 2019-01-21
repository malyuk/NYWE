<?php

// =================================================================
//   SHOP PAGE METABOXES
// =================================================================


// Config:  
add_action( 'add_meta_boxes', 'shop_meta_box_add' );
function shop_meta_box_add() {    
    // Template specific conditional:
        // NOTE: To echo values on template, you cant use the regular get_post_custom_values, instead use:
        // $x =  get_post_meta($post->ID); echo end( $x['about_zigzag_1_image'] );
    global $post;
    if( !empty($post) ){        
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if( $pageTemplate == 'page-shop.php' ){
            add_meta_box(
                'shop-id', // $id
                'Configuration', // $title
                'shop_meta_box_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}


// Panel:
function shop_meta_box_cb( $post ) {
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    // Values:
    $values = get_post_custom( $post->ID );

    $shop_product_1_image = isset( $values['shop_product_1_image'] ) ? esc_attr( $values['shop_product_1_image'][0] ) : '';
    $shop_product_1_link = isset( $values['shop_product_1_link'] ) ? esc_attr( $values['shop_product_1_link'][0] ) : '';
    $shop_product_2_image = isset( $values['shop_product_2_image'] ) ? esc_attr( $values['shop_product_2_image'][0] ) : '';
    $shop_product_2_link = isset( $values['shop_product_2_link'] ) ? esc_attr( $values['shop_product_2_link'][0] ) : '';
    $shop_product_3_image = isset( $values['shop_product_3_image'] ) ? esc_attr( $values['shop_product_3_image'][0] ) : '';
    $shop_product_3_link = isset( $values['shop_product_3_link'] ) ? esc_attr( $values['shop_product_3_link'][0] ) : '';
    $shop_product_4_image = isset( $values['shop_product_4_image'] ) ? esc_attr( $values['shop_product_4_image'][0] ) : '';
    $shop_product_4_link = isset( $values['shop_product_4_link'] ) ? esc_attr( $values['shop_product_4_link'][0] ) : '';
    $shop_product_5_image = isset( $values['shop_product_5_image'] ) ? esc_attr( $values['shop_product_5_image'][0] ) : '';
    $shop_product_5_link = isset( $values['shop_product_5_link'] ) ? esc_attr( $values['shop_product_5_link'][0] ) : '';
    $shop_product_6_image = isset( $values['shop_product_6_image'] ) ? esc_attr( $values['shop_product_6_image'][0] ) : '';
    $shop_product_6_link = isset( $values['shop_product_6_link'] ) ? esc_attr( $values['shop_product_6_link'][0] ) : '';
    $shop_product_7_image = isset( $values['shop_product_7_image'] ) ? esc_attr( $values['shop_product_7_image'][0] ) : '';
    $shop_product_7_link = isset( $values['shop_product_7_link'] ) ? esc_attr( $values['shop_product_7_link'][0] ) : '';
    $shop_product_8_image = isset( $values['shop_product_8_image'] ) ? esc_attr( $values['shop_product_8_image'][0] ) : '';
    $shop_product_8_link = isset( $values['shop_product_8_link'] ) ? esc_attr( $values['shop_product_8_link'][0] ) : '';

    // 1:    
    $shop_event_1_name = isset( $values['shop_event_1_name'] ) ? esc_attr( $values['shop_event_1_name'][0] ) : '';
    $shop_event_1_link = isset( $values['shop_event_1_link'] ) ? esc_attr( $values['shop_event_1_link'][0] ) : '';
    // - 1:
    $shop_event_1_item_1_name = isset( $values['shop_event_1_item_1_name'] ) ? esc_attr( $values['shop_event_1_item_1_name'][0] ) : '';
    $shop_event_1_item_1_table = isset( $values['shop_event_1_item_1_table'] ) ? esc_attr( $values['shop_event_1_item_1_table'][0] ) : '';
    $shop_event_1_item_1_spec = isset( $values['shop_event_1_item_1_spec'] ) ? esc_attr( $values['shop_event_1_item_1_spec'][0] ) : '';
    $shop_event_1_item_1_price = isset( $values['shop_event_1_item_1_price'] ) ? esc_attr( $values['shop_event_1_item_1_price'][0] ) : '';
    $shop_event_1_item_1_link = isset( $values['shop_event_1_item_1_link'] ) ? esc_attr( $values['shop_event_1_item_1_link'][0] ) : '';
    // - 2:
    $shop_event_1_item_2_name = isset( $values['shop_event_1_item_2_name'] ) ? esc_attr( $values['shop_event_1_item_2_name'][0] ) : '';
    $shop_event_1_item_2_table = isset( $values['shop_event_1_item_2_table'] ) ? esc_attr( $values['shop_event_1_item_2_table'][0] ) : '';
    $shop_event_1_item_2_spec = isset( $values['shop_event_1_item_2_spec'] ) ? esc_attr( $values['shop_event_1_item_2_spec'][0] ) : '';
    $shop_event_1_item_2_price = isset( $values['shop_event_1_item_2_price'] ) ? esc_attr( $values['shop_event_1_item_2_price'][0] ) : '';
    $shop_event_1_item_2_link = isset( $values['shop_event_1_item_2_link'] ) ? esc_attr( $values['shop_event_1_item_2_link'][0] ) : '';
    // - 3:
    $shop_event_1_item_3_name = isset( $values['shop_event_1_item_3_name'] ) ? esc_attr( $values['shop_event_1_item_3_name'][0] ) : '';
    $shop_event_1_item_3_table = isset( $values['shop_event_1_item_3_table'] ) ? esc_attr( $values['shop_event_1_item_3_table'][0] ) : '';
    $shop_event_1_item_3_spec = isset( $values['shop_event_1_item_3_spec'] ) ? esc_attr( $values['shop_event_1_item_3_spec'][0] ) : '';
    $shop_event_1_item_3_price = isset( $values['shop_event_1_item_3_price'] ) ? esc_attr( $values['shop_event_1_item_3_price'][0] ) : '';
    $shop_event_1_item_3_link = isset( $values['shop_event_1_item_3_link'] ) ? esc_attr( $values['shop_event_1_item_3_link'][0] ) : '';
    // - 4:
    $shop_event_1_item_4_name = isset( $values['shop_event_1_item_4_name'] ) ? esc_attr( $values['shop_event_1_item_4_name'][0] ) : '';
    $shop_event_1_item_4_table = isset( $values['shop_event_1_item_4_table'] ) ? esc_attr( $values['shop_event_1_item_4_table'][0] ) : '';
    $shop_event_1_item_4_spec = isset( $values['shop_event_1_item_4_spec'] ) ? esc_attr( $values['shop_event_1_item_4_spec'][0] ) : '';
    $shop_event_1_item_4_price = isset( $values['shop_event_1_item_4_price'] ) ? esc_attr( $values['shop_event_1_item_4_price'][0] ) : '';
    $shop_event_1_item_4_link = isset( $values['shop_event_1_item_4_link'] ) ? esc_attr( $values['shop_event_1_item_4_link'][0] ) : '';
    // - 5:
    $shop_event_1_item_5_name = isset( $values['shop_event_1_item_5_name'] ) ? esc_attr( $values['shop_event_1_item_5_name'][0] ) : '';
    $shop_event_1_item_5_table = isset( $values['shop_event_1_item_5_table'] ) ? esc_attr( $values['shop_event_1_item_5_table'][0] ) : '';
    $shop_event_1_item_5_spec = isset( $values['shop_event_1_item_5_spec'] ) ? esc_attr( $values['shop_event_1_item_5_spec'][0] ) : '';
    $shop_event_1_item_5_price = isset( $values['shop_event_1_item_5_price'] ) ? esc_attr( $values['shop_event_1_item_5_price'][0] ) : '';
    $shop_event_1_item_5_link = isset( $values['shop_event_1_item_5_link'] ) ? esc_attr( $values['shop_event_1_item_5_link'][0] ) : '';
    // - 6:
    $shop_event_1_item_6_name = isset( $values['shop_event_1_item_6_name'] ) ? esc_attr( $values['shop_event_1_item_6_name'][0] ) : '';
    $shop_event_1_item_6_table = isset( $values['shop_event_1_item_6_table'] ) ? esc_attr( $values['shop_event_1_item_6_table'][0] ) : '';
    $shop_event_1_item_6_spec = isset( $values['shop_event_1_item_6_spec'] ) ? esc_attr( $values['shop_event_1_item_6_spec'][0] ) : '';
    $shop_event_1_item_6_price = isset( $values['shop_event_1_item_6_price'] ) ? esc_attr( $values['shop_event_1_item_6_price'][0] ) : '';
    $shop_event_1_item_6_link = isset( $values['shop_event_1_item_6_link'] ) ? esc_attr( $values['shop_event_1_item_6_link'][0] ) : '';
    // - 7:
    $shop_event_1_item_7_name = isset( $values['shop_event_1_item_7_name'] ) ? esc_attr( $values['shop_event_1_item_7_name'][0] ) : '';
    $shop_event_1_item_7_table = isset( $values['shop_event_1_item_7_table'] ) ? esc_attr( $values['shop_event_1_item_7_table'][0] ) : '';
    $shop_event_1_item_7_spec = isset( $values['shop_event_1_item_7_spec'] ) ? esc_attr( $values['shop_event_1_item_7_spec'][0] ) : '';
    $shop_event_1_item_7_price = isset( $values['shop_event_1_item_7_price'] ) ? esc_attr( $values['shop_event_1_item_7_price'][0] ) : '';
    $shop_event_1_item_7_link = isset( $values['shop_event_1_item_7_link'] ) ? esc_attr( $values['shop_event_1_item_7_link'][0] ) : '';
    // - 8:
    $shop_event_1_item_8_name = isset( $values['shop_event_1_item_8_name'] ) ? esc_attr( $values['shop_event_1_item_8_name'][0] ) : '';
    $shop_event_1_item_8_table = isset( $values['shop_event_1_item_8_table'] ) ? esc_attr( $values['shop_event_1_item_8_table'][0] ) : '';
    $shop_event_1_item_8_spec = isset( $values['shop_event_1_item_8_spec'] ) ? esc_attr( $values['shop_event_1_item_8_spec'][0] ) : '';
    $shop_event_1_item_8_price = isset( $values['shop_event_1_item_8_price'] ) ? esc_attr( $values['shop_event_1_item_8_price'][0] ) : '';
    $shop_event_1_item_8_link = isset( $values['shop_event_1_item_8_link'] ) ? esc_attr( $values['shop_event_1_item_8_link'][0] ) : '';
    // - 9:
    $shop_event_1_item_9_name = isset( $values['shop_event_1_item_9_name'] ) ? esc_attr( $values['shop_event_1_item_9_name'][0] ) : '';
    $shop_event_1_item_9_table = isset( $values['shop_event_1_item_9_table'] ) ? esc_attr( $values['shop_event_1_item_9_table'][0] ) : '';
    $shop_event_1_item_9_spec = isset( $values['shop_event_1_item_9_spec'] ) ? esc_attr( $values['shop_event_1_item_9_spec'][0] ) : '';
    $shop_event_1_item_9_price = isset( $values['shop_event_1_item_9_price'] ) ? esc_attr( $values['shop_event_1_item_9_price'][0] ) : '';
    $shop_event_1_item_9_link = isset( $values['shop_event_1_item_9_link'] ) ? esc_attr( $values['shop_event_1_item_9_link'][0] ) : '';
    // - 10:
    $shop_event_1_item_10_name = isset( $values['shop_event_1_item_10_name'] ) ? esc_attr( $values['shop_event_1_item_10_name'][0] ) : '';
    $shop_event_1_item_10_table = isset( $values['shop_event_1_item_10_table'] ) ? esc_attr( $values['shop_event_1_item_10_table'][0] ) : '';
    $shop_event_1_item_10_spec = isset( $values['shop_event_1_item_10_spec'] ) ? esc_attr( $values['shop_event_1_item_10_spec'][0] ) : '';
    $shop_event_1_item_10_price = isset( $values['shop_event_1_item_10_price'] ) ? esc_attr( $values['shop_event_1_item_10_price'][0] ) : '';
    $shop_event_1_item_10_link = isset( $values['shop_event_1_item_10_link'] ) ? esc_attr( $values['shop_event_1_item_10_link'][0] ) : '';
    // - 11:
    $shop_event_1_item_11_name = isset( $values['shop_event_1_item_11_name'] ) ? esc_attr( $values['shop_event_1_item_11_name'][0] ) : '';
    $shop_event_1_item_11_table = isset( $values['shop_event_1_item_11_table'] ) ? esc_attr( $values['shop_event_1_item_11_table'][0] ) : '';
    $shop_event_1_item_11_spec = isset( $values['shop_event_1_item_11_spec'] ) ? esc_attr( $values['shop_event_1_item_11_spec'][0] ) : '';
    $shop_event_1_item_11_price = isset( $values['shop_event_1_item_11_price'] ) ? esc_attr( $values['shop_event_1_item_11_price'][0] ) : '';
    $shop_event_1_item_11_link = isset( $values['shop_event_1_item_11_link'] ) ? esc_attr( $values['shop_event_1_item_11_link'][0] ) : '';
    // - 12:
    $shop_event_1_item_12_name = isset( $values['shop_event_1_item_12_name'] ) ? esc_attr( $values['shop_event_1_item_12_name'][0] ) : '';
    $shop_event_1_item_12_table = isset( $values['shop_event_1_item_12_table'] ) ? esc_attr( $values['shop_event_1_item_12_table'][0] ) : '';
    $shop_event_1_item_12_spec = isset( $values['shop_event_1_item_12_spec'] ) ? esc_attr( $values['shop_event_1_item_12_spec'][0] ) : '';
    $shop_event_1_item_12_price = isset( $values['shop_event_1_item_12_price'] ) ? esc_attr( $values['shop_event_1_item_12_price'][0] ) : '';
    $shop_event_1_item_12_link = isset( $values['shop_event_1_item_12_link'] ) ? esc_attr( $values['shop_event_1_item_12_link'][0] ) : '';
    // - 13:
    $shop_event_1_item_13_name = isset( $values['shop_event_1_item_13_name'] ) ? esc_attr( $values['shop_event_1_item_13_name'][0] ) : '';
    $shop_event_1_item_13_table = isset( $values['shop_event_1_item_13_table'] ) ? esc_attr( $values['shop_event_1_item_13_table'][0] ) : '';
    $shop_event_1_item_13_spec = isset( $values['shop_event_1_item_13_spec'] ) ? esc_attr( $values['shop_event_1_item_13_spec'][0] ) : '';
    $shop_event_1_item_13_price = isset( $values['shop_event_1_item_13_price'] ) ? esc_attr( $values['shop_event_1_item_13_price'][0] ) : '';
    $shop_event_1_item_13_link = isset( $values['shop_event_1_item_13_link'] ) ? esc_attr( $values['shop_event_1_item_13_link'][0] ) : '';
    // - 14:
    $shop_event_1_item_14_name = isset( $values['shop_event_1_item_14_name'] ) ? esc_attr( $values['shop_event_1_item_14_name'][0] ) : '';
    $shop_event_1_item_14_table = isset( $values['shop_event_1_item_14_table'] ) ? esc_attr( $values['shop_event_1_item_14_table'][0] ) : '';
    $shop_event_1_item_14_spec = isset( $values['shop_event_1_item_14_spec'] ) ? esc_attr( $values['shop_event_1_item_14_spec'][0] ) : '';
    $shop_event_1_item_14_price = isset( $values['shop_event_1_item_14_price'] ) ? esc_attr( $values['shop_event_1_item_14_price'][0] ) : '';
    $shop_event_1_item_14_link = isset( $values['shop_event_1_item_14_link'] ) ? esc_attr( $values['shop_event_1_item_14_link'][0] ) : '';
    // - 15:
    $shop_event_1_item_15_name = isset( $values['shop_event_1_item_15_name'] ) ? esc_attr( $values['shop_event_1_item_15_name'][0] ) : '';
    $shop_event_1_item_15_table = isset( $values['shop_event_1_item_15_table'] ) ? esc_attr( $values['shop_event_1_item_15_table'][0] ) : '';
    $shop_event_1_item_15_spec = isset( $values['shop_event_1_item_15_spec'] ) ? esc_attr( $values['shop_event_1_item_15_spec'][0] ) : '';
    $shop_event_1_item_15_price = isset( $values['shop_event_1_item_15_price'] ) ? esc_attr( $values['shop_event_1_item_15_price'][0] ) : '';
    $shop_event_1_item_15_link = isset( $values['shop_event_1_item_15_link'] ) ? esc_attr( $values['shop_event_1_item_15_link'][0] ) : '';
    // - 16:
    $shop_event_1_item_16_name = isset( $values['shop_event_1_item_16_name'] ) ? esc_attr( $values['shop_event_1_item_16_name'][0] ) : '';
    $shop_event_1_item_16_table = isset( $values['shop_event_1_item_16_table'] ) ? esc_attr( $values['shop_event_1_item_16_table'][0] ) : '';
    $shop_event_1_item_16_spec = isset( $values['shop_event_1_item_16_spec'] ) ? esc_attr( $values['shop_event_1_item_16_spec'][0] ) : '';
    $shop_event_1_item_16_price = isset( $values['shop_event_1_item_16_price'] ) ? esc_attr( $values['shop_event_1_item_16_price'][0] ) : '';
    $shop_event_1_item_16_link = isset( $values['shop_event_1_item_16_link'] ) ? esc_attr( $values['shop_event_1_item_16_link'][0] ) : '';
    // - 17:
    $shop_event_1_item_17_name = isset( $values['shop_event_1_item_17_name'] ) ? esc_attr( $values['shop_event_1_item_17_name'][0] ) : '';
    $shop_event_1_item_17_table = isset( $values['shop_event_1_item_17_table'] ) ? esc_attr( $values['shop_event_1_item_17_table'][0] ) : '';
    $shop_event_1_item_17_spec = isset( $values['shop_event_1_item_17_spec'] ) ? esc_attr( $values['shop_event_1_item_17_spec'][0] ) : '';
    $shop_event_1_item_17_price = isset( $values['shop_event_1_item_17_price'] ) ? esc_attr( $values['shop_event_1_item_17_price'][0] ) : '';
    $shop_event_1_item_17_link = isset( $values['shop_event_1_item_17_link'] ) ? esc_attr( $values['shop_event_1_item_17_link'][0] ) : '';
    // - 18:
    $shop_event_1_item_18_name = isset( $values['shop_event_1_item_18_name'] ) ? esc_attr( $values['shop_event_1_item_18_name'][0] ) : '';
    $shop_event_1_item_18_table = isset( $values['shop_event_1_item_18_table'] ) ? esc_attr( $values['shop_event_1_item_18_table'][0] ) : '';
    $shop_event_1_item_18_spec = isset( $values['shop_event_1_item_18_spec'] ) ? esc_attr( $values['shop_event_1_item_18_spec'][0] ) : '';
    $shop_event_1_item_18_price = isset( $values['shop_event_1_item_18_price'] ) ? esc_attr( $values['shop_event_1_item_18_price'][0] ) : '';
    $shop_event_1_item_18_link = isset( $values['shop_event_1_item_18_link'] ) ? esc_attr( $values['shop_event_1_item_18_link'][0] ) : '';
    // - 19:
    $shop_event_1_item_19_name = isset( $values['shop_event_1_item_19_name'] ) ? esc_attr( $values['shop_event_1_item_19_name'][0] ) : '';
    $shop_event_1_item_19_table = isset( $values['shop_event_1_item_19_table'] ) ? esc_attr( $values['shop_event_1_item_19_table'][0] ) : '';
    $shop_event_1_item_19_spec = isset( $values['shop_event_1_item_19_spec'] ) ? esc_attr( $values['shop_event_1_item_19_spec'][0] ) : '';
    $shop_event_1_item_19_price = isset( $values['shop_event_1_item_19_price'] ) ? esc_attr( $values['shop_event_1_item_19_price'][0] ) : '';
    $shop_event_1_item_19_link = isset( $values['shop_event_1_item_19_link'] ) ? esc_attr( $values['shop_event_1_item_19_link'][0] ) : '';
    // - 20:
    $shop_event_1_item_20_name = isset( $values['shop_event_1_item_20_name'] ) ? esc_attr( $values['shop_event_1_item_20_name'][0] ) : '';
    $shop_event_1_item_20_table = isset( $values['shop_event_1_item_20_table'] ) ? esc_attr( $values['shop_event_1_item_20_table'][0] ) : '';
    $shop_event_1_item_20_spec = isset( $values['shop_event_1_item_20_spec'] ) ? esc_attr( $values['shop_event_1_item_20_spec'][0] ) : '';
    $shop_event_1_item_20_price = isset( $values['shop_event_1_item_20_price'] ) ? esc_attr( $values['shop_event_1_item_20_price'][0] ) : '';
    $shop_event_1_item_20_link = isset( $values['shop_event_1_item_20_link'] ) ? esc_attr( $values['shop_event_1_item_20_link'][0] ) : '';
    
    // 2:
    $shop_event_2_name = isset( $values['shop_event_2_name'] ) ? esc_attr( $values['shop_event_2_name'][0] ) : '';
    $shop_event_2_link = isset( $values['shop_event_2_link'] ) ? esc_attr( $values['shop_event_2_link'][0] ) : '';
    // - 1:
    $shop_event_2_item_1_name = isset( $values['shop_event_2_item_1_name'] ) ? esc_attr( $values['shop_event_2_item_1_name'][0] ) : '';
    $shop_event_2_item_1_table = isset( $values['shop_event_2_item_1_table'] ) ? esc_attr( $values['shop_event_2_item_1_table'][0] ) : '';
    $shop_event_2_item_1_spec = isset( $values['shop_event_2_item_1_spec'] ) ? esc_attr( $values['shop_event_2_item_1_spec'][0] ) : '';
    $shop_event_2_item_1_price = isset( $values['shop_event_2_item_1_price'] ) ? esc_attr( $values['shop_event_2_item_1_price'][0] ) : '';
    $shop_event_2_item_1_link = isset( $values['shop_event_2_item_1_link'] ) ? esc_attr( $values['shop_event_2_item_1_link'][0] ) : '';
    // - 2:
    $shop_event_2_item_2_name = isset( $values['shop_event_2_item_2_name'] ) ? esc_attr( $values['shop_event_2_item_2_name'][0] ) : '';
    $shop_event_2_item_2_table = isset( $values['shop_event_2_item_2_table'] ) ? esc_attr( $values['shop_event_2_item_2_table'][0] ) : '';
    $shop_event_2_item_2_spec = isset( $values['shop_event_2_item_2_spec'] ) ? esc_attr( $values['shop_event_2_item_2_spec'][0] ) : '';
    $shop_event_2_item_2_price = isset( $values['shop_event_2_item_2_price'] ) ? esc_attr( $values['shop_event_2_item_2_price'][0] ) : '';
    $shop_event_2_item_2_link = isset( $values['shop_event_2_item_2_link'] ) ? esc_attr( $values['shop_event_2_item_2_link'][0] ) : '';
    // - 3:
    $shop_event_2_item_3_name = isset( $values['shop_event_2_item_3_name'] ) ? esc_attr( $values['shop_event_2_item_3_name'][0] ) : '';
    $shop_event_2_item_3_table = isset( $values['shop_event_2_item_3_table'] ) ? esc_attr( $values['shop_event_2_item_3_table'][0] ) : '';
    $shop_event_2_item_3_spec = isset( $values['shop_event_2_item_3_spec'] ) ? esc_attr( $values['shop_event_2_item_3_spec'][0] ) : '';
    $shop_event_2_item_3_price = isset( $values['shop_event_2_item_3_price'] ) ? esc_attr( $values['shop_event_2_item_3_price'][0] ) : '';
    $shop_event_2_item_3_link = isset( $values['shop_event_2_item_3_link'] ) ? esc_attr( $values['shop_event_2_item_3_link'][0] ) : '';
    // - 4:
    $shop_event_2_item_4_name = isset( $values['shop_event_2_item_4_name'] ) ? esc_attr( $values['shop_event_2_item_4_name'][0] ) : '';
    $shop_event_2_item_4_table = isset( $values['shop_event_2_item_4_table'] ) ? esc_attr( $values['shop_event_2_item_4_table'][0] ) : '';
    $shop_event_2_item_4_spec = isset( $values['shop_event_2_item_4_spec'] ) ? esc_attr( $values['shop_event_2_item_4_spec'][0] ) : '';
    $shop_event_2_item_4_price = isset( $values['shop_event_2_item_4_price'] ) ? esc_attr( $values['shop_event_2_item_4_price'][0] ) : '';
    $shop_event_2_item_4_link = isset( $values['shop_event_2_item_4_link'] ) ? esc_attr( $values['shop_event_2_item_4_link'][0] ) : '';
    // - 5:
    $shop_event_2_item_5_name = isset( $values['shop_event_2_item_5_name'] ) ? esc_attr( $values['shop_event_2_item_5_name'][0] ) : '';
    $shop_event_2_item_5_table = isset( $values['shop_event_2_item_5_table'] ) ? esc_attr( $values['shop_event_2_item_5_table'][0] ) : '';
    $shop_event_2_item_5_spec = isset( $values['shop_event_2_item_5_spec'] ) ? esc_attr( $values['shop_event_2_item_5_spec'][0] ) : '';
    $shop_event_2_item_5_price = isset( $values['shop_event_2_item_5_price'] ) ? esc_attr( $values['shop_event_2_item_5_price'][0] ) : '';
    $shop_event_2_item_5_link = isset( $values['shop_event_2_item_5_link'] ) ? esc_attr( $values['shop_event_2_item_5_link'][0] ) : '';
    // - 6:
    $shop_event_2_item_6_name = isset( $values['shop_event_2_item_6_name'] ) ? esc_attr( $values['shop_event_2_item_6_name'][0] ) : '';
    $shop_event_2_item_6_table = isset( $values['shop_event_2_item_6_table'] ) ? esc_attr( $values['shop_event_2_item_6_table'][0] ) : '';
    $shop_event_2_item_6_spec = isset( $values['shop_event_2_item_6_spec'] ) ? esc_attr( $values['shop_event_2_item_6_spec'][0] ) : '';
    $shop_event_2_item_6_price = isset( $values['shop_event_2_item_6_price'] ) ? esc_attr( $values['shop_event_2_item_6_price'][0] ) : '';
    $shop_event_2_item_6_link = isset( $values['shop_event_2_item_6_link'] ) ? esc_attr( $values['shop_event_2_item_6_link'][0] ) : '';
    // - 7:
    $shop_event_2_item_7_name = isset( $values['shop_event_2_item_7_name'] ) ? esc_attr( $values['shop_event_2_item_7_name'][0] ) : '';
    $shop_event_2_item_7_table = isset( $values['shop_event_2_item_7_table'] ) ? esc_attr( $values['shop_event_2_item_7_table'][0] ) : '';
    $shop_event_2_item_7_spec = isset( $values['shop_event_2_item_7_spec'] ) ? esc_attr( $values['shop_event_2_item_7_spec'][0] ) : '';
    $shop_event_2_item_7_price = isset( $values['shop_event_2_item_7_price'] ) ? esc_attr( $values['shop_event_2_item_7_price'][0] ) : '';
    $shop_event_2_item_7_link = isset( $values['shop_event_2_item_7_link'] ) ? esc_attr( $values['shop_event_2_item_7_link'][0] ) : '';
    // - 8:
    $shop_event_2_item_8_name = isset( $values['shop_event_2_item_8_name'] ) ? esc_attr( $values['shop_event_2_item_8_name'][0] ) : '';
    $shop_event_2_item_8_table = isset( $values['shop_event_2_item_8_table'] ) ? esc_attr( $values['shop_event_2_item_8_table'][0] ) : '';
    $shop_event_2_item_8_spec = isset( $values['shop_event_2_item_8_spec'] ) ? esc_attr( $values['shop_event_2_item_8_spec'][0] ) : '';
    $shop_event_2_item_8_price = isset( $values['shop_event_2_item_8_price'] ) ? esc_attr( $values['shop_event_2_item_8_price'][0] ) : '';
    $shop_event_2_item_8_link = isset( $values['shop_event_2_item_8_link'] ) ? esc_attr( $values['shop_event_2_item_8_link'][0] ) : '';
    // - 9:
    $shop_event_2_item_9_name = isset( $values['shop_event_2_item_9_name'] ) ? esc_attr( $values['shop_event_2_item_9_name'][0] ) : '';
    $shop_event_2_item_9_table = isset( $values['shop_event_2_item_9_table'] ) ? esc_attr( $values['shop_event_2_item_9_table'][0] ) : '';
    $shop_event_2_item_9_spec = isset( $values['shop_event_2_item_9_spec'] ) ? esc_attr( $values['shop_event_2_item_9_spec'][0] ) : '';
    $shop_event_2_item_9_price = isset( $values['shop_event_2_item_9_price'] ) ? esc_attr( $values['shop_event_2_item_9_price'][0] ) : '';
    $shop_event_2_item_9_link = isset( $values['shop_event_2_item_9_link'] ) ? esc_attr( $values['shop_event_2_item_9_link'][0] ) : '';
    // - 10:
    $shop_event_2_item_10_name = isset( $values['shop_event_2_item_10_name'] ) ? esc_attr( $values['shop_event_2_item_10_name'][0] ) : '';
    $shop_event_2_item_10_table = isset( $values['shop_event_2_item_10_table'] ) ? esc_attr( $values['shop_event_2_item_10_table'][0] ) : '';
    $shop_event_2_item_10_spec = isset( $values['shop_event_2_item_10_spec'] ) ? esc_attr( $values['shop_event_2_item_10_spec'][0] ) : '';
    $shop_event_2_item_10_price = isset( $values['shop_event_2_item_10_price'] ) ? esc_attr( $values['shop_event_2_item_10_price'][0] ) : '';
    $shop_event_2_item_10_link = isset( $values['shop_event_2_item_10_link'] ) ? esc_attr( $values['shop_event_2_item_10_link'][0] ) : '';
    // - 11:
    $shop_event_2_item_11_name = isset( $values['shop_event_2_item_11_name'] ) ? esc_attr( $values['shop_event_2_item_11_name'][0] ) : '';
    $shop_event_2_item_11_table = isset( $values['shop_event_2_item_11_table'] ) ? esc_attr( $values['shop_event_2_item_11_table'][0] ) : '';
    $shop_event_2_item_11_spec = isset( $values['shop_event_2_item_11_spec'] ) ? esc_attr( $values['shop_event_2_item_11_spec'][0] ) : '';
    $shop_event_2_item_11_price = isset( $values['shop_event_2_item_11_price'] ) ? esc_attr( $values['shop_event_2_item_11_price'][0] ) : '';
    $shop_event_2_item_11_link = isset( $values['shop_event_2_item_11_link'] ) ? esc_attr( $values['shop_event_2_item_11_link'][0] ) : '';
    // - 12:
    $shop_event_2_item_12_name = isset( $values['shop_event_2_item_12_name'] ) ? esc_attr( $values['shop_event_2_item_12_name'][0] ) : '';
    $shop_event_2_item_12_table = isset( $values['shop_event_2_item_12_table'] ) ? esc_attr( $values['shop_event_2_item_12_table'][0] ) : '';
    $shop_event_2_item_12_spec = isset( $values['shop_event_2_item_12_spec'] ) ? esc_attr( $values['shop_event_2_item_12_spec'][0] ) : '';
    $shop_event_2_item_12_price = isset( $values['shop_event_2_item_12_price'] ) ? esc_attr( $values['shop_event_2_item_12_price'][0] ) : '';
    $shop_event_2_item_12_link = isset( $values['shop_event_2_item_12_link'] ) ? esc_attr( $values['shop_event_2_item_12_link'][0] ) : '';
    // - 13:
    $shop_event_2_item_13_name = isset( $values['shop_event_2_item_13_name'] ) ? esc_attr( $values['shop_event_2_item_13_name'][0] ) : '';
    $shop_event_2_item_13_table = isset( $values['shop_event_2_item_13_table'] ) ? esc_attr( $values['shop_event_2_item_13_table'][0] ) : '';
    $shop_event_2_item_13_spec = isset( $values['shop_event_2_item_13_spec'] ) ? esc_attr( $values['shop_event_2_item_13_spec'][0] ) : '';
    $shop_event_2_item_13_price = isset( $values['shop_event_2_item_13_price'] ) ? esc_attr( $values['shop_event_2_item_13_price'][0] ) : '';
    $shop_event_2_item_13_link = isset( $values['shop_event_2_item_13_link'] ) ? esc_attr( $values['shop_event_2_item_13_link'][0] ) : '';
    // - 14:
    $shop_event_2_item_14_name = isset( $values['shop_event_2_item_14_name'] ) ? esc_attr( $values['shop_event_2_item_14_name'][0] ) : '';
    $shop_event_2_item_14_table = isset( $values['shop_event_2_item_14_table'] ) ? esc_attr( $values['shop_event_2_item_14_table'][0] ) : '';
    $shop_event_2_item_14_spec = isset( $values['shop_event_2_item_14_spec'] ) ? esc_attr( $values['shop_event_2_item_14_spec'][0] ) : '';
    $shop_event_2_item_14_price = isset( $values['shop_event_2_item_14_price'] ) ? esc_attr( $values['shop_event_2_item_14_price'][0] ) : '';
    $shop_event_2_item_14_link = isset( $values['shop_event_2_item_14_link'] ) ? esc_attr( $values['shop_event_2_item_14_link'][0] ) : '';
    // - 15:
    $shop_event_2_item_15_name = isset( $values['shop_event_2_item_15_name'] ) ? esc_attr( $values['shop_event_2_item_15_name'][0] ) : '';
    $shop_event_2_item_15_table = isset( $values['shop_event_2_item_15_table'] ) ? esc_attr( $values['shop_event_2_item_15_table'][0] ) : '';
    $shop_event_2_item_15_spec = isset( $values['shop_event_2_item_15_spec'] ) ? esc_attr( $values['shop_event_2_item_15_spec'][0] ) : '';
    $shop_event_2_item_15_price = isset( $values['shop_event_2_item_15_price'] ) ? esc_attr( $values['shop_event_2_item_15_price'][0] ) : '';
    $shop_event_2_item_15_link = isset( $values['shop_event_2_item_15_link'] ) ? esc_attr( $values['shop_event_2_item_15_link'][0] ) : '';
    // - 16:
    $shop_event_2_item_16_name = isset( $values['shop_event_2_item_16_name'] ) ? esc_attr( $values['shop_event_2_item_16_name'][0] ) : '';
    $shop_event_2_item_16_table = isset( $values['shop_event_2_item_16_table'] ) ? esc_attr( $values['shop_event_2_item_16_table'][0] ) : '';
    $shop_event_2_item_16_spec = isset( $values['shop_event_2_item_16_spec'] ) ? esc_attr( $values['shop_event_2_item_16_spec'][0] ) : '';
    $shop_event_2_item_16_price = isset( $values['shop_event_2_item_16_price'] ) ? esc_attr( $values['shop_event_2_item_16_price'][0] ) : '';
    $shop_event_2_item_16_link = isset( $values['shop_event_2_item_16_link'] ) ? esc_attr( $values['shop_event_2_item_16_link'][0] ) : '';
    // - 17:
    $shop_event_2_item_17_name = isset( $values['shop_event_2_item_17_name'] ) ? esc_attr( $values['shop_event_2_item_17_name'][0] ) : '';
    $shop_event_2_item_17_table = isset( $values['shop_event_2_item_17_table'] ) ? esc_attr( $values['shop_event_2_item_17_table'][0] ) : '';
    $shop_event_2_item_17_spec = isset( $values['shop_event_2_item_17_spec'] ) ? esc_attr( $values['shop_event_2_item_17_spec'][0] ) : '';
    $shop_event_2_item_17_price = isset( $values['shop_event_2_item_17_price'] ) ? esc_attr( $values['shop_event_2_item_17_price'][0] ) : '';
    $shop_event_2_item_17_link = isset( $values['shop_event_2_item_17_link'] ) ? esc_attr( $values['shop_event_2_item_17_link'][0] ) : '';
    // - 18:
    $shop_event_2_item_18_name = isset( $values['shop_event_2_item_18_name'] ) ? esc_attr( $values['shop_event_2_item_18_name'][0] ) : '';
    $shop_event_2_item_18_table = isset( $values['shop_event_2_item_18_table'] ) ? esc_attr( $values['shop_event_2_item_18_table'][0] ) : '';
    $shop_event_2_item_18_spec = isset( $values['shop_event_2_item_18_spec'] ) ? esc_attr( $values['shop_event_2_item_18_spec'][0] ) : '';
    $shop_event_2_item_18_price = isset( $values['shop_event_2_item_18_price'] ) ? esc_attr( $values['shop_event_2_item_18_price'][0] ) : '';
    $shop_event_2_item_18_link = isset( $values['shop_event_2_item_18_link'] ) ? esc_attr( $values['shop_event_2_item_18_link'][0] ) : '';
    // - 19:
    $shop_event_2_item_19_name = isset( $values['shop_event_2_item_19_name'] ) ? esc_attr( $values['shop_event_2_item_19_name'][0] ) : '';
    $shop_event_2_item_19_table = isset( $values['shop_event_2_item_19_table'] ) ? esc_attr( $values['shop_event_2_item_19_table'][0] ) : '';
    $shop_event_2_item_19_spec = isset( $values['shop_event_2_item_19_spec'] ) ? esc_attr( $values['shop_event_2_item_19_spec'][0] ) : '';
    $shop_event_2_item_19_price = isset( $values['shop_event_2_item_19_price'] ) ? esc_attr( $values['shop_event_2_item_19_price'][0] ) : '';
    $shop_event_2_item_19_link = isset( $values['shop_event_2_item_19_link'] ) ? esc_attr( $values['shop_event_2_item_19_link'][0] ) : '';
    // - 20:
    $shop_event_2_item_20_name = isset( $values['shop_event_2_item_20_name'] ) ? esc_attr( $values['shop_event_2_item_20_name'][0] ) : '';
    $shop_event_2_item_20_table = isset( $values['shop_event_2_item_20_table'] ) ? esc_attr( $values['shop_event_2_item_20_table'][0] ) : '';
    $shop_event_2_item_20_spec = isset( $values['shop_event_2_item_20_spec'] ) ? esc_attr( $values['shop_event_2_item_20_spec'][0] ) : '';
    $shop_event_2_item_20_price = isset( $values['shop_event_2_item_20_price'] ) ? esc_attr( $values['shop_event_2_item_20_price'][0] ) : '';
    $shop_event_2_item_20_link = isset( $values['shop_event_2_item_20_link'] ) ? esc_attr( $values['shop_event_2_item_20_link'][0] ) : '';

?>
  <!--  PANEL CONTENT   -->
 
 <!-- PRODUCT -->
 <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3 style="color: #666;">PRODUCTS</h3>

    <!-- 1 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 1</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_1_image" type="text" size="36" style="max-width: 90%;" name="shop_product_1_image" value="<?php echo $shop_product_1_image; ?>" /> 
        <input id="upload_shop_product_1_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_1_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_1_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_1_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_1_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_1_link" id="shop_product_1_link" cols="65" rows="1"><?php echo $shop_product_1_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 2 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 2</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_2_image" type="text" size="36" style="max-width: 90%;" name="shop_product_2_image" value="<?php echo $shop_product_2_image; ?>" /> 
        <input id="upload_shop_product_2_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_2_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_2_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_2_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_2_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_2_link" id="shop_product_2_link" cols="65" rows="1"><?php echo $shop_product_2_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 3 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 3</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_3_image" type="text" size="36" style="max-width: 90%;" name="shop_product_3_image" value="<?php echo $shop_product_3_image; ?>" /> 
        <input id="upload_shop_product_3_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_3_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_3_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_3_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_3_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_3_link" id="shop_product_3_link" cols="65" rows="1"><?php echo $shop_product_3_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 4 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 4</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_4_image" type="text" size="36" style="max-width: 90%;" name="shop_product_4_image" value="<?php echo $shop_product_4_image; ?>" /> 
        <input id="upload_shop_product_4_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_4_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_4_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_4_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_4_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_4_link" id="shop_product_4_link" cols="65" rows="1"><?php echo $shop_product_4_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 5 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 5</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_5_image" type="text" size="36" style="max-width: 90%;" name="shop_product_5_image" value="<?php echo $shop_product_5_image; ?>" /> 
        <input id="upload_shop_product_5_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_5_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_5_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_5_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_5_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_5_link" id="shop_product_5_link" cols="65" rows="1"><?php echo $shop_product_5_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 6 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 6</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_6_image" type="text" size="36" style="max-width: 90%;" name="shop_product_6_image" value="<?php echo $shop_product_6_image; ?>" /> 
        <input id="upload_shop_product_6_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_6_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_6_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_6_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_6_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_6_link" id="shop_product_6_link" cols="65" rows="1"><?php echo $shop_product_6_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 7 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 7</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_7_image" type="text" size="36" style="max-width: 90%;" name="shop_product_7_image" value="<?php echo $shop_product_7_image; ?>" /> 
        <input id="upload_shop_product_7_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_7_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_7_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_7_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_7_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_7_link" id="shop_product_7_link" cols="65" rows="1"><?php echo $shop_product_7_link; ?></textarea>
    </div><!-- sub cell -->

    <!-- 8 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Product 8</h3>
        <h3>Image</h3>    
        <h4>Upload Image:</h4>
        <input id="shop_product_8_image" type="text" size="36" style="max-width: 90%;" name="shop_product_8_image" value="<?php echo $shop_product_8_image; ?>" /> 
        <input id="upload_shop_product_8_image" class="button" type="button" value="Upload Image" /> 
        <br /><em> - Recommended size of 330px x 330px. Save as JPG, and always save for web, with minimum 60% compression.</em>
        <?php // Preview:
        if ( $shop_product_8_image ) {
            echo '
                <img style="clear: both; display: block; max-width: 200px; height: auto; padding: 20px;" 
                src="' . (string)$shop_product_8_image . '" />
            ';
        }   
        ?>
        <!-- Logic: -->
        <script type="text/javascript">
            jQuery(document).ready(function(){
                var custom_uploader;
                jQuery('#upload_shop_product_8_image').click(function(e) {
                    e.preventDefault();
                    if (custom_uploader) {
                        custom_uploader.open();
                        return;
                    }
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false
                    });
                    custom_uploader.on('select', function() {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        jQuery('#shop_product_8_image').val(attachment.url);
                    });
                    custom_uploader.open();
                    custom_uploader.open();
                });
            });
        </script>           
        <hr />
        <h3>Product Link</h3>    
        <textarea name="shop_product_8_link" id="shop_product_8_link" cols="65" rows="1"><?php echo $shop_product_8_link; ?></textarea>
    </div><!-- sub cell -->                        

</div><!-- end products -->
 

 <!-- EVENT 1 -->
 <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3 style="color: #666;">EVENT 1</h3>
    <h3>EVENT 1 - Name</h3>    
    <textarea name="shop_event_1_name" id="shop_event_1_name" cols="65" rows="1"><?php echo $shop_event_1_name; ?></textarea>
    <h3>EVENT 1 - Link</h3>    
    <textarea name="shop_event_1_link" id="shop_event_1_link" cols="65" rows="1"><?php echo $shop_event_1_link; ?></textarea>  
    <!-- 1 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 1 - Name</h3>
        <textarea name="shop_event_1_item_1_name" id="shop_event_1_item_1_name" cols="65" rows="1"><?php echo $shop_event_1_item_1_name; ?></textarea>
        <h3>Item 1 - Table Number</h3>
        <textarea name="shop_event_1_item_1_table" id="shop_event_1_item_1_table" cols="65" rows="1"><?php echo $shop_event_1_item_1_table; ?></textarea>
        <h3>Item 1 - Spec</h3>
        <textarea name="shop_event_1_item_1_spec" id="shop_event_1_item_1_spec" cols="65" rows="1"><?php echo $shop_event_1_item_1_spec; ?></textarea>
        <h3>Item 1 - Price</h3>
        <textarea name="shop_event_1_item_1_price" id="shop_event_1_item_1_price" cols="65" rows="1"><?php echo $shop_event_1_item_1_price; ?></textarea>
        <h3>Item 1 - Link</h3>
        <textarea name="shop_event_1_item_1_link" id="shop_event_1_item_1_link" cols="65" rows="1"><?php echo $shop_event_1_item_1_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 2 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 2 - Name</h3>
        <textarea name="shop_event_1_item_2_name" id="shop_event_1_item_2_name" cols="65" rows="1"><?php echo $shop_event_1_item_2_name; ?></textarea>
        <h3>Item 2 - Table Number</h3>
        <textarea name="shop_event_1_item_2_table" id="shop_event_1_item_2_table" cols="65" rows="1"><?php echo $shop_event_1_item_2_table; ?></textarea>
        <h3>Item 2 - Spec</h3>
        <textarea name="shop_event_1_item_2_spec" id="shop_event_1_item_2_spec" cols="65" rows="1"><?php echo $shop_event_1_item_2_spec; ?></textarea>
        <h3>Item 2 - Price</h3>
        <textarea name="shop_event_1_item_2_price" id="shop_event_1_item_2_price" cols="65" rows="1"><?php echo $shop_event_1_item_2_price; ?></textarea>
        <h3>Item 2 - Link</h3>
        <textarea name="shop_event_1_item_2_link" id="shop_event_1_item_2_link" cols="65" rows="1"><?php echo $shop_event_1_item_2_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 3 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 3 - Name</h3>
        <textarea name="shop_event_1_item_3_name" id="shop_event_1_item_3_name" cols="65" rows="1"><?php echo $shop_event_1_item_3_name; ?></textarea>
        <h3>Item 3 - Table Number</h3>
        <textarea name="shop_event_1_item_3_table" id="shop_event_1_item_3_table" cols="65" rows="1"><?php echo $shop_event_1_item_3_table; ?></textarea>
        <h3>Item 3 - Spec</h3>
        <textarea name="shop_event_1_item_3_spec" id="shop_event_1_item_3_spec" cols="65" rows="1"><?php echo $shop_event_1_item_3_spec; ?></textarea>
        <h3>Item 3 - Price</h3>
        <textarea name="shop_event_1_item_3_price" id="shop_event_1_item_3_price" cols="65" rows="1"><?php echo $shop_event_1_item_3_price; ?></textarea>
        <h3>Item 3 - Link</h3>
        <textarea name="shop_event_1_item_3_link" id="shop_event_1_item_3_link" cols="65" rows="1"><?php echo $shop_event_1_item_3_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 4 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 4 - Name</h3>
        <textarea name="shop_event_1_item_4_name" id="shop_event_1_item_4_name" cols="65" rows="1"><?php echo $shop_event_1_item_4_name; ?></textarea>
        <h3>Item 4 - Table Number</h3>
        <textarea name="shop_event_1_item_4_table" id="shop_event_1_item_4_table" cols="65" rows="1"><?php echo $shop_event_1_item_4_table; ?></textarea>
        <h3>Item 4 - Spec</h3>
        <textarea name="shop_event_1_item_4_spec" id="shop_event_1_item_4_spec" cols="65" rows="1"><?php echo $shop_event_1_item_4_spec; ?></textarea>
        <h3>Item 4 - Price</h3>
        <textarea name="shop_event_1_item_4_price" id="shop_event_1_item_4_price" cols="65" rows="1"><?php echo $shop_event_1_item_4_price; ?></textarea>
        <h3>Item 4 - Link</h3>
        <textarea name="shop_event_1_item_4_link" id="shop_event_1_item_4_link" cols="65" rows="1"><?php echo $shop_event_1_item_4_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 5 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 5 - Name</h3>
        <textarea name="shop_event_1_item_5_name" id="shop_event_1_item_5_name" cols="65" rows="1"><?php echo $shop_event_1_item_5_name; ?></textarea>
        <h3>Item 5 - Table Number</h3>
        <textarea name="shop_event_1_item_5_table" id="shop_event_1_item_5_table" cols="65" rows="1"><?php echo $shop_event_1_item_5_table; ?></textarea>
        <h3>Item 5 - Spec</h3>
        <textarea name="shop_event_1_item_5_spec" id="shop_event_1_item_5_spec" cols="65" rows="1"><?php echo $shop_event_1_item_5_spec; ?></textarea>
        <h3>Item 5 - Price</h3>
        <textarea name="shop_event_1_item_5_price" id="shop_event_1_item_5_price" cols="65" rows="1"><?php echo $shop_event_1_item_5_price; ?></textarea>
        <h3>Item 5 - Link</h3>
        <textarea name="shop_event_1_item_5_link" id="shop_event_1_item_5_link" cols="65" rows="1"><?php echo $shop_event_1_item_5_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 6 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 6 - Name</h3>
        <textarea name="shop_event_1_item_6_name" id="shop_event_1_item_6_name" cols="65" rows="1"><?php echo $shop_event_1_item_6_name; ?></textarea>
        <h3>Item 6 - Table Number</h3>
        <textarea name="shop_event_1_item_6_table" id="shop_event_1_item_6_table" cols="65" rows="1"><?php echo $shop_event_1_item_6_table; ?></textarea>
        <h3>Item 6 - Spec</h3>
        <textarea name="shop_event_1_item_6_spec" id="shop_event_1_item_6_spec" cols="65" rows="1"><?php echo $shop_event_1_item_6_spec; ?></textarea>
        <h3>Item 6 - Price</h3>
        <textarea name="shop_event_1_item_6_price" id="shop_event_1_item_6_price" cols="65" rows="1"><?php echo $shop_event_1_item_6_price; ?></textarea>
        <h3>Item 6 - Link</h3>
        <textarea name="shop_event_1_item_6_link" id="shop_event_1_item_6_link" cols="65" rows="1"><?php echo $shop_event_1_item_6_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 7 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 7 - Name</h3>
        <textarea name="shop_event_1_item_7_name" id="shop_event_1_item_7_name" cols="65" rows="1"><?php echo $shop_event_1_item_7_name; ?></textarea>
        <h3>Item 7 - Table Number</h3>
        <textarea name="shop_event_1_item_7_table" id="shop_event_1_item_7_table" cols="65" rows="1"><?php echo $shop_event_1_item_7_table; ?></textarea>
        <h3>Item 7 - Spec</h3>
        <textarea name="shop_event_1_item_7_spec" id="shop_event_1_item_7_spec" cols="65" rows="1"><?php echo $shop_event_1_item_7_spec; ?></textarea>
        <h3>Item 7 - Price</h3>
        <textarea name="shop_event_1_item_7_price" id="shop_event_1_item_7_price" cols="65" rows="1"><?php echo $shop_event_1_item_7_price; ?></textarea>
        <h3>Item 7 - Link</h3>
        <textarea name="shop_event_1_item_7_link" id="shop_event_1_item_7_link" cols="65" rows="1"><?php echo $shop_event_1_item_7_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 8 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 8 - Name</h3>
        <textarea name="shop_event_1_item_8_name" id="shop_event_1_item_8_name" cols="65" rows="1"><?php echo $shop_event_1_item_8_name; ?></textarea>
        <h3>Item 8 - Table Number</h3>
        <textarea name="shop_event_1_item_8_table" id="shop_event_1_item_8_table" cols="65" rows="1"><?php echo $shop_event_1_item_8_table; ?></textarea>
        <h3>Item 8 - Spec</h3>
        <textarea name="shop_event_1_item_8_spec" id="shop_event_1_item_8_spec" cols="65" rows="1"><?php echo $shop_event_1_item_8_spec; ?></textarea>
        <h3>Item 8 - Price</h3>
        <textarea name="shop_event_1_item_8_price" id="shop_event_1_item_8_price" cols="65" rows="1"><?php echo $shop_event_1_item_8_price; ?></textarea>
        <h3>Item 8 - Link</h3>
        <textarea name="shop_event_1_item_8_link" id="shop_event_1_item_8_link" cols="65" rows="1"><?php echo $shop_event_1_item_8_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 9 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 9 - Name</h3>
        <textarea name="shop_event_1_item_9_name" id="shop_event_1_item_9_name" cols="65" rows="1"><?php echo $shop_event_1_item_9_name; ?></textarea>
        <h3>Item 9 - Table Number</h3>
        <textarea name="shop_event_1_item_9_table" id="shop_event_1_item_9_table" cols="65" rows="1"><?php echo $shop_event_1_item_9_table; ?></textarea>
        <h3>Item 9 - Spec</h3>
        <textarea name="shop_event_1_item_9_spec" id="shop_event_1_item_9_spec" cols="65" rows="1"><?php echo $shop_event_1_item_9_spec; ?></textarea>
        <h3>Item 9 - Price</h3>
        <textarea name="shop_event_1_item_9_price" id="shop_event_1_item_9_price" cols="65" rows="1"><?php echo $shop_event_1_item_9_price; ?></textarea>
        <h3>Item 9 - Link</h3>
        <textarea name="shop_event_1_item_9_link" id="shop_event_1_item_9_link" cols="65" rows="1"><?php echo $shop_event_1_item_9_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 10 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 10 - Name</h3>
        <textarea name="shop_event_1_item_10_name" id="shop_event_1_item_10_name" cols="65" rows="1"><?php echo $shop_event_1_item_10_name; ?></textarea>
        <h3>Item 10 - Table Number</h3>
        <textarea name="shop_event_1_item_10_table" id="shop_event_1_item_10_table" cols="65" rows="1"><?php echo $shop_event_1_item_10_table; ?></textarea>
        <h3>Item 10 - Spec</h3>
        <textarea name="shop_event_1_item_10_spec" id="shop_event_1_item_10_spec" cols="65" rows="1"><?php echo $shop_event_1_item_10_spec; ?></textarea>
        <h3>Item 10 - Price</h3>
        <textarea name="shop_event_1_item_10_price" id="shop_event_1_item_10_price" cols="65" rows="1"><?php echo $shop_event_1_item_10_price; ?></textarea>
        <h3>Item 10 - Link</h3>
        <textarea name="shop_event_1_item_10_link" id="shop_event_1_item_10_link" cols="65" rows="1"><?php echo $shop_event_1_item_10_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 11 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 11 - Name</h3>
        <textarea name="shop_event_1_item_11_name" id="shop_event_1_item_11_name" cols="65" rows="1"><?php echo $shop_event_1_item_11_name; ?></textarea>
        <h3>Item 11 - Table Number</h3>
        <textarea name="shop_event_1_item_11_table" id="shop_event_1_item_11_table" cols="65" rows="1"><?php echo $shop_event_1_item_11_table; ?></textarea>
        <h3>Item 11 - Spec</h3>
        <textarea name="shop_event_1_item_11_spec" id="shop_event_1_item_11_spec" cols="65" rows="1"><?php echo $shop_event_1_item_11_spec; ?></textarea>
        <h3>Item 11 - Price</h3>
        <textarea name="shop_event_1_item_11_price" id="shop_event_1_item_11_price" cols="65" rows="1"><?php echo $shop_event_1_item_11_price; ?></textarea>
        <h3>Item 11 - Link</h3>
        <textarea name="shop_event_1_item_11_link" id="shop_event_1_item_11_link" cols="65" rows="1"><?php echo $shop_event_1_item_11_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 12 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 12 - Name</h3>
        <textarea name="shop_event_1_item_12_name" id="shop_event_1_item_12_name" cols="65" rows="1"><?php echo $shop_event_1_item_12_name; ?></textarea>
        <h3>Item 12 - Table Number</h3>
        <textarea name="shop_event_1_item_12_table" id="shop_event_1_item_12_table" cols="65" rows="1"><?php echo $shop_event_1_item_12_table; ?></textarea>
        <h3>Item 12 - Spec</h3>
        <textarea name="shop_event_1_item_12_spec" id="shop_event_1_item_12_spec" cols="65" rows="1"><?php echo $shop_event_1_item_12_spec; ?></textarea>
        <h3>Item 12 - Price</h3>
        <textarea name="shop_event_1_item_12_price" id="shop_event_1_item_12_price" cols="65" rows="1"><?php echo $shop_event_1_item_12_price; ?></textarea>
        <h3>Item 12 - Link</h3>
        <textarea name="shop_event_1_item_12_link" id="shop_event_1_item_12_link" cols="65" rows="1"><?php echo $shop_event_1_item_12_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 13 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 13 - Name</h3>
        <textarea name="shop_event_1_item_13_name" id="shop_event_1_item_13_name" cols="65" rows="1"><?php echo $shop_event_1_item_13_name; ?></textarea>
        <h3>Item 13 - Table Number</h3>
        <textarea name="shop_event_1_item_13_table" id="shop_event_1_item_13_table" cols="65" rows="1"><?php echo $shop_event_1_item_13_table; ?></textarea>
        <h3>Item 13 - Spec</h3>
        <textarea name="shop_event_1_item_13_spec" id="shop_event_1_item_13_spec" cols="65" rows="1"><?php echo $shop_event_1_item_13_spec; ?></textarea>
        <h3>Item 13 - Price</h3>
        <textarea name="shop_event_1_item_13_price" id="shop_event_1_item_13_price" cols="65" rows="1"><?php echo $shop_event_1_item_13_price; ?></textarea>
        <h3>Item 13 - Link</h3>
        <textarea name="shop_event_1_item_13_link" id="shop_event_1_item_13_link" cols="65" rows="1"><?php echo $shop_event_1_item_13_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 14 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 14 - Name</h3>
        <textarea name="shop_event_1_item_14_name" id="shop_event_1_item_14_name" cols="65" rows="1"><?php echo $shop_event_1_item_14_name; ?></textarea>
        <h3>Item 14 - Table Number</h3>
        <textarea name="shop_event_1_item_14_table" id="shop_event_1_item_14_table" cols="65" rows="1"><?php echo $shop_event_1_item_14_table; ?></textarea>
        <h3>Item 14 - Spec</h3>
        <textarea name="shop_event_1_item_14_spec" id="shop_event_1_item_14_spec" cols="65" rows="1"><?php echo $shop_event_1_item_14_spec; ?></textarea>
        <h3>Item 14 - Price</h3>
        <textarea name="shop_event_1_item_14_price" id="shop_event_1_item_14_price" cols="65" rows="1"><?php echo $shop_event_1_item_14_price; ?></textarea>
        <h3>Item 14 - Link</h3>
        <textarea name="shop_event_1_item_14_link" id="shop_event_1_item_14_link" cols="65" rows="1"><?php echo $shop_event_1_item_14_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 15 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 15 - Name</h3>
        <textarea name="shop_event_1_item_15_name" id="shop_event_1_item_15_name" cols="65" rows="1"><?php echo $shop_event_1_item_15_name; ?></textarea>
        <h3>Item 15 - Table Number</h3>
        <textarea name="shop_event_1_item_15_table" id="shop_event_1_item_15_table" cols="65" rows="1"><?php echo $shop_event_1_item_15_table; ?></textarea>
        <h3>Item 15 - Spec</h3>
        <textarea name="shop_event_1_item_15_spec" id="shop_event_1_item_15_spec" cols="65" rows="1"><?php echo $shop_event_1_item_15_spec; ?></textarea>
        <h3>Item 15 - Price</h3>
        <textarea name="shop_event_1_item_15_price" id="shop_event_1_item_15_price" cols="65" rows="1"><?php echo $shop_event_1_item_15_price; ?></textarea>
        <h3>Item 15 - Link</h3>
        <textarea name="shop_event_1_item_15_link" id="shop_event_1_item_15_link" cols="65" rows="1"><?php echo $shop_event_1_item_15_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 16 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 16 - Name</h3>
        <textarea name="shop_event_1_item_16_name" id="shop_event_1_item_16_name" cols="65" rows="1"><?php echo $shop_event_1_item_16_name; ?></textarea>
        <h3>Item 16 - Table Number</h3>
        <textarea name="shop_event_1_item_16_table" id="shop_event_1_item_16_table" cols="65" rows="1"><?php echo $shop_event_1_item_16_table; ?></textarea>
        <h3>Item 16 - Spec</h3>
        <textarea name="shop_event_1_item_16_spec" id="shop_event_1_item_16_spec" cols="65" rows="1"><?php echo $shop_event_1_item_16_spec; ?></textarea>
        <h3>Item 16 - Price</h3>
        <textarea name="shop_event_1_item_16_price" id="shop_event_1_item_16_price" cols="65" rows="1"><?php echo $shop_event_1_item_16_price; ?></textarea>
        <h3>Item 16 - Link</h3>
        <textarea name="shop_event_1_item_16_link" id="shop_event_1_item_16_link" cols="65" rows="1"><?php echo $shop_event_1_item_16_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 17 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 17 - Name</h3>
        <textarea name="shop_event_1_item_17_name" id="shop_event_1_item_17_name" cols="65" rows="1"><?php echo $shop_event_1_item_17_name; ?></textarea>
        <h3>Item 17 - Table Number</h3>
        <textarea name="shop_event_1_item_17_table" id="shop_event_1_item_17_table" cols="65" rows="1"><?php echo $shop_event_1_item_17_table; ?></textarea>
        <h3>Item 17 - Spec</h3>
        <textarea name="shop_event_1_item_17_spec" id="shop_event_1_item_17_spec" cols="65" rows="1"><?php echo $shop_event_1_item_17_spec; ?></textarea>
        <h3>Item 17 - Price</h3>
        <textarea name="shop_event_1_item_17_price" id="shop_event_1_item_17_price" cols="65" rows="1"><?php echo $shop_event_1_item_17_price; ?></textarea>
        <h3>Item 17 - Link</h3>
        <textarea name="shop_event_1_item_17_link" id="shop_event_1_item_17_link" cols="65" rows="1"><?php echo $shop_event_1_item_17_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 18 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 18 - Name</h3>
        <textarea name="shop_event_1_item_18_name" id="shop_event_1_item_18_name" cols="65" rows="1"><?php echo $shop_event_1_item_18_name; ?></textarea>
        <h3>Item 18 - Table Number</h3>
        <textarea name="shop_event_1_item_18_table" id="shop_event_1_item_18_table" cols="65" rows="1"><?php echo $shop_event_1_item_18_table; ?></textarea>
        <h3>Item 18 - Spec</h3>
        <textarea name="shop_event_1_item_18_spec" id="shop_event_1_item_18_spec" cols="65" rows="1"><?php echo $shop_event_1_item_18_spec; ?></textarea>
        <h3>Item 18 - Price</h3>
        <textarea name="shop_event_1_item_18_price" id="shop_event_1_item_18_price" cols="65" rows="1"><?php echo $shop_event_1_item_18_price; ?></textarea>
        <h3>Item 18 - Link</h3>
        <textarea name="shop_event_1_item_18_link" id="shop_event_1_item_18_link" cols="65" rows="1"><?php echo $shop_event_1_item_18_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 19 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 19 - Name</h3>
        <textarea name="shop_event_1_item_19_name" id="shop_event_1_item_19_name" cols="65" rows="1"><?php echo $shop_event_1_item_19_name; ?></textarea>
        <h3>Item 19 - Table Number</h3>
        <textarea name="shop_event_1_item_19_table" id="shop_event_1_item_19_table" cols="65" rows="1"><?php echo $shop_event_1_item_19_table; ?></textarea>
        <h3>Item 19 - Spec</h3>
        <textarea name="shop_event_1_item_19_spec" id="shop_event_1_item_19_spec" cols="65" rows="1"><?php echo $shop_event_1_item_19_spec; ?></textarea>
        <h3>Item 19 - Price</h3>
        <textarea name="shop_event_1_item_19_price" id="shop_event_1_item_19_price" cols="65" rows="1"><?php echo $shop_event_1_item_19_price; ?></textarea>
        <h3>Item 19 - Link</h3>
        <textarea name="shop_event_1_item_19_link" id="shop_event_1_item_19_link" cols="65" rows="1"><?php echo $shop_event_1_item_19_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 20 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 20 - Name</h3>
        <textarea name="shop_event_1_item_20_name" id="shop_event_1_item_20_name" cols="65" rows="1"><?php echo $shop_event_1_item_20_name; ?></textarea>
        <h3>Item 20 - Table Number</h3>
        <textarea name="shop_event_1_item_20_table" id="shop_event_1_item_20_table" cols="65" rows="1"><?php echo $shop_event_1_item_20_table; ?></textarea>
        <h3>Item 20 - Spec</h3>
        <textarea name="shop_event_1_item_20_spec" id="shop_event_1_item_20_spec" cols="65" rows="1"><?php echo $shop_event_1_item_20_spec; ?></textarea>
        <h3>Item 20 - Price</h3>
        <textarea name="shop_event_1_item_20_price" id="shop_event_1_item_20_price" cols="65" rows="1"><?php echo $shop_event_1_item_20_price; ?></textarea>
        <h3>Item 20 - Link</h3>
        <textarea name="shop_event_1_item_20_link" id="shop_event_1_item_20_link" cols="65" rows="1"><?php echo $shop_event_1_item_20_link; ?></textarea>
    </div><!-- sub cell -->                        
</div><!-- end events -->



 <!-- EVENT 2 -->
 <div style="margin: 0px 0px 40px 0px; padding: 1em 2em 2em; background: #eff2f5;">
    <h3 style="color: #666;">EVENT 2</h3>
    <h3>EVENT 2 - Name</h3>    
    <textarea name="shop_event_2_name" id="shop_event_2_name" cols="65" rows="1"><?php echo $shop_event_2_name; ?></textarea>
    <h3>EVENT 2 - Link</h3>    
    <textarea name="shop_event_2_link" id="shop_event_2_link" cols="65" rows="1"><?php echo $shop_event_2_link; ?></textarea>  
    <!-- 1 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 1 - Name</h3>
        <textarea name="shop_event_2_item_1_name" id="shop_event_2_item_1_name" cols="65" rows="1"><?php echo $shop_event_2_item_1_name; ?></textarea>
        <h3>Item 1 - Table Number</h3>
        <textarea name="shop_event_2_item_1_table" id="shop_event_2_item_1_table" cols="65" rows="1"><?php echo $shop_event_2_item_1_table; ?></textarea>
        <h3>Item 1 - Spec</h3>
        <textarea name="shop_event_2_item_1_spec" id="shop_event_2_item_1_spec" cols="65" rows="1"><?php echo $shop_event_2_item_1_spec; ?></textarea>
        <h3>Item 1 - Price</h3>
        <textarea name="shop_event_2_item_1_price" id="shop_event_2_item_1_price" cols="65" rows="1"><?php echo $shop_event_2_item_1_price; ?></textarea>
        <h3>Item 1 - Link</h3>
        <textarea name="shop_event_2_item_1_link" id="shop_event_2_item_1_link" cols="65" rows="1"><?php echo $shop_event_2_item_1_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 2 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 2 - Name</h3>
        <textarea name="shop_event_2_item_2_name" id="shop_event_2_item_2_name" cols="65" rows="1"><?php echo $shop_event_2_item_2_name; ?></textarea>
        <h3>Item 2 - Table Number</h3>
        <textarea name="shop_event_2_item_2_table" id="shop_event_2_item_2_table" cols="65" rows="1"><?php echo $shop_event_2_item_2_table; ?></textarea>
        <h3>Item 2 - Spec</h3>
        <textarea name="shop_event_2_item_2_spec" id="shop_event_2_item_2_spec" cols="65" rows="1"><?php echo $shop_event_2_item_2_spec; ?></textarea>
        <h3>Item 2 - Price</h3>
        <textarea name="shop_event_2_item_2_price" id="shop_event_2_item_2_price" cols="65" rows="1"><?php echo $shop_event_2_item_2_price; ?></textarea>
        <h3>Item 2 - Link</h3>
        <textarea name="shop_event_2_item_2_link" id="shop_event_2_item_2_link" cols="65" rows="1"><?php echo $shop_event_2_item_2_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 3 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 3 - Name</h3>
        <textarea name="shop_event_2_item_3_name" id="shop_event_2_item_3_name" cols="65" rows="1"><?php echo $shop_event_2_item_3_name; ?></textarea>
        <h3>Item 3 - Table Number</h3>
        <textarea name="shop_event_2_item_3_table" id="shop_event_2_item_3_table" cols="65" rows="1"><?php echo $shop_event_2_item_3_table; ?></textarea>
        <h3>Item 3 - Spec</h3>
        <textarea name="shop_event_2_item_3_spec" id="shop_event_2_item_3_spec" cols="65" rows="1"><?php echo $shop_event_2_item_3_spec; ?></textarea>
        <h3>Item 3 - Price</h3>
        <textarea name="shop_event_2_item_3_price" id="shop_event_2_item_3_price" cols="65" rows="1"><?php echo $shop_event_2_item_3_price; ?></textarea>
        <h3>Item 3 - Link</h3>
        <textarea name="shop_event_2_item_3_link" id="shop_event_2_item_3_link" cols="65" rows="1"><?php echo $shop_event_2_item_3_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 4 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 4 - Name</h3>
        <textarea name="shop_event_2_item_4_name" id="shop_event_2_item_4_name" cols="65" rows="1"><?php echo $shop_event_2_item_4_name; ?></textarea>
        <h3>Item 4 - Table Number</h3>
        <textarea name="shop_event_2_item_4_table" id="shop_event_2_item_4_table" cols="65" rows="1"><?php echo $shop_event_2_item_4_table; ?></textarea>
        <h3>Item 4 - Spec</h3>
        <textarea name="shop_event_2_item_4_spec" id="shop_event_2_item_4_spec" cols="65" rows="1"><?php echo $shop_event_2_item_4_spec; ?></textarea>
        <h3>Item 4 - Price</h3>
        <textarea name="shop_event_2_item_4_price" id="shop_event_2_item_4_price" cols="65" rows="1"><?php echo $shop_event_2_item_4_price; ?></textarea>
        <h3>Item 4 - Link</h3>
        <textarea name="shop_event_2_item_4_link" id="shop_event_2_item_4_link" cols="65" rows="1"><?php echo $shop_event_2_item_4_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 5 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 5 - Name</h3>
        <textarea name="shop_event_2_item_5_name" id="shop_event_2_item_5_name" cols="65" rows="1"><?php echo $shop_event_2_item_5_name; ?></textarea>
        <h3>Item 5 - Table Number</h3>
        <textarea name="shop_event_2_item_5_table" id="shop_event_2_item_5_table" cols="65" rows="1"><?php echo $shop_event_2_item_5_table; ?></textarea>
        <h3>Item 5 - Spec</h3>
        <textarea name="shop_event_2_item_5_spec" id="shop_event_2_item_5_spec" cols="65" rows="1"><?php echo $shop_event_2_item_5_spec; ?></textarea>
        <h3>Item 5 - Price</h3>
        <textarea name="shop_event_2_item_5_price" id="shop_event_2_item_5_price" cols="65" rows="1"><?php echo $shop_event_2_item_5_price; ?></textarea>
        <h3>Item 5 - Link</h3>
        <textarea name="shop_event_2_item_5_link" id="shop_event_2_item_5_link" cols="65" rows="1"><?php echo $shop_event_2_item_5_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 6 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 6 - Name</h3>
        <textarea name="shop_event_2_item_6_name" id="shop_event_2_item_6_name" cols="65" rows="1"><?php echo $shop_event_2_item_6_name; ?></textarea>
        <h3>Item 6 - Table Number</h3>
        <textarea name="shop_event_2_item_6_table" id="shop_event_2_item_6_table" cols="65" rows="1"><?php echo $shop_event_2_item_6_table; ?></textarea>
        <h3>Item 6 - Spec</h3>
        <textarea name="shop_event_2_item_6_spec" id="shop_event_2_item_6_spec" cols="65" rows="1"><?php echo $shop_event_2_item_6_spec; ?></textarea>
        <h3>Item 6 - Price</h3>
        <textarea name="shop_event_2_item_6_price" id="shop_event_2_item_6_price" cols="65" rows="1"><?php echo $shop_event_2_item_6_price; ?></textarea>
        <h3>Item 6 - Link</h3>
        <textarea name="shop_event_2_item_6_link" id="shop_event_2_item_6_link" cols="65" rows="1"><?php echo $shop_event_2_item_6_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 7 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 7 - Name</h3>
        <textarea name="shop_event_2_item_7_name" id="shop_event_2_item_7_name" cols="65" rows="1"><?php echo $shop_event_2_item_7_name; ?></textarea>
        <h3>Item 7 - Table Number</h3>
        <textarea name="shop_event_2_item_7_table" id="shop_event_2_item_7_table" cols="65" rows="1"><?php echo $shop_event_2_item_7_table; ?></textarea>
        <h3>Item 7 - Spec</h3>
        <textarea name="shop_event_2_item_7_spec" id="shop_event_2_item_7_spec" cols="65" rows="1"><?php echo $shop_event_2_item_7_spec; ?></textarea>
        <h3>Item 7 - Price</h3>
        <textarea name="shop_event_2_item_7_price" id="shop_event_2_item_7_price" cols="65" rows="1"><?php echo $shop_event_2_item_7_price; ?></textarea>
        <h3>Item 7 - Link</h3>
        <textarea name="shop_event_2_item_7_link" id="shop_event_2_item_7_link" cols="65" rows="1"><?php echo $shop_event_2_item_7_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 8 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 8 - Name</h3>
        <textarea name="shop_event_2_item_8_name" id="shop_event_2_item_8_name" cols="65" rows="1"><?php echo $shop_event_2_item_8_name; ?></textarea>
        <h3>Item 8 - Table Number</h3>
        <textarea name="shop_event_2_item_8_table" id="shop_event_2_item_8_table" cols="65" rows="1"><?php echo $shop_event_2_item_8_table; ?></textarea>
        <h3>Item 8 - Spec</h3>
        <textarea name="shop_event_2_item_8_spec" id="shop_event_2_item_8_spec" cols="65" rows="1"><?php echo $shop_event_2_item_8_spec; ?></textarea>
        <h3>Item 8 - Price</h3>
        <textarea name="shop_event_2_item_8_price" id="shop_event_2_item_8_price" cols="65" rows="1"><?php echo $shop_event_2_item_8_price; ?></textarea>
        <h3>Item 8 - Link</h3>
        <textarea name="shop_event_2_item_8_link" id="shop_event_2_item_8_link" cols="65" rows="1"><?php echo $shop_event_2_item_8_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 9 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 9 - Name</h3>
        <textarea name="shop_event_2_item_9_name" id="shop_event_2_item_9_name" cols="65" rows="1"><?php echo $shop_event_2_item_9_name; ?></textarea>
        <h3>Item 9 - Table Number</h3>
        <textarea name="shop_event_2_item_9_table" id="shop_event_2_item_9_table" cols="65" rows="1"><?php echo $shop_event_2_item_9_table; ?></textarea>
        <h3>Item 9 - Spec</h3>
        <textarea name="shop_event_2_item_9_spec" id="shop_event_2_item_9_spec" cols="65" rows="1"><?php echo $shop_event_2_item_9_spec; ?></textarea>
        <h3>Item 9 - Price</h3>
        <textarea name="shop_event_2_item_9_price" id="shop_event_2_item_9_price" cols="65" rows="1"><?php echo $shop_event_2_item_9_price; ?></textarea>
        <h3>Item 9 - Link</h3>
        <textarea name="shop_event_2_item_9_link" id="shop_event_2_item_9_link" cols="65" rows="1"><?php echo $shop_event_2_item_9_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 10 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 10 - Name</h3>
        <textarea name="shop_event_2_item_10_name" id="shop_event_2_item_10_name" cols="65" rows="1"><?php echo $shop_event_2_item_10_name; ?></textarea>
        <h3>Item 10 - Table Number</h3>
        <textarea name="shop_event_2_item_10_table" id="shop_event_2_item_10_table" cols="65" rows="1"><?php echo $shop_event_2_item_10_table; ?></textarea>
        <h3>Item 10 - Spec</h3>
        <textarea name="shop_event_2_item_10_spec" id="shop_event_2_item_10_spec" cols="65" rows="1"><?php echo $shop_event_2_item_10_spec; ?></textarea>
        <h3>Item 10 - Price</h3>
        <textarea name="shop_event_2_item_10_price" id="shop_event_2_item_10_price" cols="65" rows="1"><?php echo $shop_event_2_item_10_price; ?></textarea>
        <h3>Item 10 - Link</h3>
        <textarea name="shop_event_2_item_10_link" id="shop_event_2_item_10_link" cols="65" rows="1"><?php echo $shop_event_2_item_10_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 11 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 11 - Name</h3>
        <textarea name="shop_event_2_item_11_name" id="shop_event_2_item_11_name" cols="65" rows="1"><?php echo $shop_event_2_item_11_name; ?></textarea>
        <h3>Item 11 - Table Number</h3>
        <textarea name="shop_event_2_item_11_table" id="shop_event_2_item_11_table" cols="65" rows="1"><?php echo $shop_event_2_item_11_table; ?></textarea>
        <h3>Item 11 - Spec</h3>
        <textarea name="shop_event_2_item_11_spec" id="shop_event_2_item_11_spec" cols="65" rows="1"><?php echo $shop_event_2_item_11_spec; ?></textarea>
        <h3>Item 11 - Price</h3>
        <textarea name="shop_event_2_item_11_price" id="shop_event_2_item_11_price" cols="65" rows="1"><?php echo $shop_event_2_item_11_price; ?></textarea>
        <h3>Item 11 - Link</h3>
        <textarea name="shop_event_2_item_11_link" id="shop_event_2_item_11_link" cols="65" rows="1"><?php echo $shop_event_2_item_11_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 12 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 12 - Name</h3>
        <textarea name="shop_event_2_item_12_name" id="shop_event_2_item_12_name" cols="65" rows="1"><?php echo $shop_event_2_item_12_name; ?></textarea>
        <h3>Item 12 - Table Number</h3>
        <textarea name="shop_event_2_item_12_table" id="shop_event_2_item_12_table" cols="65" rows="1"><?php echo $shop_event_2_item_12_table; ?></textarea>
        <h3>Item 12 - Spec</h3>
        <textarea name="shop_event_2_item_12_spec" id="shop_event_2_item_12_spec" cols="65" rows="1"><?php echo $shop_event_2_item_12_spec; ?></textarea>
        <h3>Item 12 - Price</h3>
        <textarea name="shop_event_2_item_12_price" id="shop_event_2_item_12_price" cols="65" rows="1"><?php echo $shop_event_2_item_12_price; ?></textarea>
        <h3>Item 12 - Link</h3>
        <textarea name="shop_event_2_item_12_link" id="shop_event_2_item_12_link" cols="65" rows="1"><?php echo $shop_event_2_item_12_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 13 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 13 - Name</h3>
        <textarea name="shop_event_2_item_13_name" id="shop_event_2_item_13_name" cols="65" rows="1"><?php echo $shop_event_2_item_13_name; ?></textarea>
        <h3>Item 13 - Table Number</h3>
        <textarea name="shop_event_2_item_13_table" id="shop_event_2_item_13_table" cols="65" rows="1"><?php echo $shop_event_2_item_13_table; ?></textarea>
        <h3>Item 13 - Spec</h3>
        <textarea name="shop_event_2_item_13_spec" id="shop_event_2_item_13_spec" cols="65" rows="1"><?php echo $shop_event_2_item_13_spec; ?></textarea>
        <h3>Item 13 - Price</h3>
        <textarea name="shop_event_2_item_13_price" id="shop_event_2_item_13_price" cols="65" rows="1"><?php echo $shop_event_2_item_13_price; ?></textarea>
        <h3>Item 13 - Link</h3>
        <textarea name="shop_event_2_item_13_link" id="shop_event_2_item_13_link" cols="65" rows="1"><?php echo $shop_event_2_item_13_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 14 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 14 - Name</h3>
        <textarea name="shop_event_2_item_14_name" id="shop_event_2_item_14_name" cols="65" rows="1"><?php echo $shop_event_2_item_14_name; ?></textarea>
        <h3>Item 14 - Table Number</h3>
        <textarea name="shop_event_2_item_14_table" id="shop_event_2_item_14_table" cols="65" rows="1"><?php echo $shop_event_2_item_14_table; ?></textarea>
        <h3>Item 14 - Spec</h3>
        <textarea name="shop_event_2_item_14_spec" id="shop_event_2_item_14_spec" cols="65" rows="1"><?php echo $shop_event_2_item_14_spec; ?></textarea>
        <h3>Item 14 - Price</h3>
        <textarea name="shop_event_2_item_14_price" id="shop_event_2_item_14_price" cols="65" rows="1"><?php echo $shop_event_2_item_14_price; ?></textarea>
        <h3>Item 14 - Link</h3>
        <textarea name="shop_event_2_item_14_link" id="shop_event_2_item_14_link" cols="65" rows="1"><?php echo $shop_event_2_item_14_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 15 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 15 - Name</h3>
        <textarea name="shop_event_2_item_15_name" id="shop_event_2_item_15_name" cols="65" rows="1"><?php echo $shop_event_2_item_15_name; ?></textarea>
        <h3>Item 15 - Table Number</h3>
        <textarea name="shop_event_2_item_15_table" id="shop_event_2_item_15_table" cols="65" rows="1"><?php echo $shop_event_2_item_15_table; ?></textarea>
        <h3>Item 15 - Spec</h3>
        <textarea name="shop_event_2_item_15_spec" id="shop_event_2_item_15_spec" cols="65" rows="1"><?php echo $shop_event_2_item_15_spec; ?></textarea>
        <h3>Item 15 - Price</h3>
        <textarea name="shop_event_2_item_15_price" id="shop_event_2_item_15_price" cols="65" rows="1"><?php echo $shop_event_2_item_15_price; ?></textarea>
        <h3>Item 15 - Link</h3>
        <textarea name="shop_event_2_item_15_link" id="shop_event_2_item_15_link" cols="65" rows="1"><?php echo $shop_event_2_item_15_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 16 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 16 - Name</h3>
        <textarea name="shop_event_2_item_16_name" id="shop_event_2_item_16_name" cols="65" rows="1"><?php echo $shop_event_2_item_16_name; ?></textarea>
        <h3>Item 16 - Table Number</h3>
        <textarea name="shop_event_2_item_16_table" id="shop_event_2_item_16_table" cols="65" rows="1"><?php echo $shop_event_2_item_16_table; ?></textarea>
        <h3>Item 16 - Spec</h3>
        <textarea name="shop_event_2_item_16_spec" id="shop_event_2_item_16_spec" cols="65" rows="1"><?php echo $shop_event_2_item_16_spec; ?></textarea>
        <h3>Item 16 - Price</h3>
        <textarea name="shop_event_2_item_16_price" id="shop_event_2_item_16_price" cols="65" rows="1"><?php echo $shop_event_2_item_16_price; ?></textarea>
        <h3>Item 16 - Link</h3>
        <textarea name="shop_event_2_item_16_link" id="shop_event_2_item_16_link" cols="65" rows="1"><?php echo $shop_event_2_item_16_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 17 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 17 - Name</h3>
        <textarea name="shop_event_2_item_17_name" id="shop_event_2_item_17_name" cols="65" rows="1"><?php echo $shop_event_2_item_17_name; ?></textarea>
        <h3>Item 17 - Table Number</h3>
        <textarea name="shop_event_2_item_17_table" id="shop_event_2_item_17_table" cols="65" rows="1"><?php echo $shop_event_2_item_17_table; ?></textarea>
        <h3>Item 17 - Spec</h3>
        <textarea name="shop_event_2_item_17_spec" id="shop_event_2_item_17_spec" cols="65" rows="1"><?php echo $shop_event_2_item_17_spec; ?></textarea>
        <h3>Item 17 - Price</h3>
        <textarea name="shop_event_2_item_17_price" id="shop_event_2_item_17_price" cols="65" rows="1"><?php echo $shop_event_2_item_17_price; ?></textarea>
        <h3>Item 17 - Link</h3>
        <textarea name="shop_event_2_item_17_link" id="shop_event_2_item_17_link" cols="65" rows="1"><?php echo $shop_event_2_item_17_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 18 -->
    <div style="padding: 2%; bor1der: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 18 - Name</h3>
        <textarea name="shop_event_2_item_18_name" id="shop_event_2_item_18_name" cols="65" rows="1"><?php echo $shop_event_2_item_18_name; ?></textarea>
        <h3>Item 18 - Table Number</h3>
        <textarea name="shop_event_2_item_18_table" id="shop_event_2_item_18_table" cols="65" rows="1"><?php echo $shop_event_2_item_18_table; ?></textarea>
        <h3>Item 18 - Spec</h3>
        <textarea name="shop_event_2_item_18_spec" id="shop_event_2_item_18_spec" cols="65" rows="1"><?php echo $shop_event_2_item_18_spec; ?></textarea>
        <h3>Item 18 - Price</h3>
        <textarea name="shop_event_2_item_18_price" id="shop_event_2_item_18_price" cols="65" rows="1"><?php echo $shop_event_2_item_18_price; ?></textarea>
        <h3>Item 18 - Link</h3>
        <textarea name="shop_event_2_item_18_link" id="shop_event_2_item_18_link" cols="65" rows="1"><?php echo $shop_event_2_item_18_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 19 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 19 - Name</h3>
        <textarea name="shop_event_2_item_19_name" id="shop_event_2_item_19_name" cols="65" rows="1"><?php echo $shop_event_2_item_19_name; ?></textarea>
        <h3>Item 19 - Table Number</h3>
        <textarea name="shop_event_2_item_19_table" id="shop_event_2_item_19_table" cols="65" rows="1"><?php echo $shop_event_2_item_19_table; ?></textarea>
        <h3>Item 19 - Spec</h3>
        <textarea name="shop_event_2_item_19_spec" id="shop_event_2_item_19_spec" cols="65" rows="1"><?php echo $shop_event_2_item_19_spec; ?></textarea>
        <h3>Item 19 - Price</h3>
        <textarea name="shop_event_2_item_19_price" id="shop_event_2_item_19_price" cols="65" rows="1"><?php echo $shop_event_2_item_19_price; ?></textarea>
        <h3>Item 19 - Link</h3>
        <textarea name="shop_event_2_item_19_link" id="shop_event_2_item_19_link" cols="65" rows="1"><?php echo $shop_event_2_item_19_link; ?></textarea>
    </div><!-- sub cell -->                        
    <!-- 20 -->
    <div style="padding: 2%; border: 2px solid #eee; background: #f9f9f9; margin: 15px 25px 20px;">
        <h3>Item 20 - Name</h3>
        <textarea name="shop_event_2_item_20_name" id="shop_event_2_item_20_name" cols="65" rows="1"><?php echo $shop_event_2_item_20_name; ?></textarea>
        <h3>Item 20 - Table Number</h3>
        <textarea name="shop_event_2_item_20_table" id="shop_event_2_item_20_table" cols="65" rows="1"><?php echo $shop_event_2_item_20_table; ?></textarea>
        <h3>Item 20 - Spec</h3>
        <textarea name="shop_event_2_item_20_spec" id="shop_event_2_item_20_spec" cols="65" rows="1"><?php echo $shop_event_2_item_20_spec; ?></textarea>
        <h3>Item 20 - Price</h3>
        <textarea name="shop_event_2_item_20_price" id="shop_event_2_item_20_price" cols="65" rows="1"><?php echo $shop_event_2_item_20_price; ?></textarea>
        <h3>Item 20 - Link</h3>
        <textarea name="shop_event_2_item_20_link" id="shop_event_2_item_20_link" cols="65" rows="1"><?php echo $shop_event_2_item_20_link; ?></textarea>
    </div><!-- sub cell -->                        
</div><!-- end events -->


  <?php     
}

// SAVE
add_action( 'save_post', 'shop_meta_box_save' );
function shop_meta_box_save( $post_id ) {
	return;
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    if( !current_user_can( 'edit_post' ) ) return;


    if ( isset($_POST['shop_product_1_image']) ) {
        update_post_meta( $post_id, 'shop_product_1_image', $_POST['shop_product_1_image'] );
    }
    
    if ( isset($_POST['shop_product_1_link']) ) {
        update_post_meta( $post_id, 'shop_product_1_link', $_POST['shop_product_1_link'] );
    }
    
    if ( isset($_POST['shop_product_2_image']) ) {
        update_post_meta( $post_id, 'shop_product_2_image', $_POST['shop_product_2_image'] );
    }
    
    if ( isset($_POST['shop_product_2_link']) ) {
        update_post_meta( $post_id, 'shop_product_2_link', $_POST['shop_product_2_link'] );
    }
    
    if ( isset($_POST['shop_product_3_image']) ) {
        update_post_meta( $post_id, 'shop_product_3_image', $_POST['shop_product_3_image'] );
    }
    
    if ( isset($_POST['shop_product_3_link']) ) {
        update_post_meta( $post_id, 'shop_product_3_link', $_POST['shop_product_3_link'] );
    }
    
    if ( isset($_POST['shop_product_4_image']) ) {
        update_post_meta( $post_id, 'shop_product_4_image', $_POST['shop_product_4_image'] );
    }
    
    if ( isset($_POST['shop_product_4_link']) ) {
        update_post_meta( $post_id, 'shop_product_4_link', $_POST['shop_product_4_link'] );
    }
    
    if ( isset($_POST['shop_product_5_image']) ) {
        update_post_meta( $post_id, 'shop_product_5_image', $_POST['shop_product_5_image'] );
    }
    
    if ( isset($_POST['shop_product_5_link']) ) {
        update_post_meta( $post_id, 'shop_product_5_link', $_POST['shop_product_5_link'] );
    }
    
    if ( isset($_POST['shop_product_6_image']) ) {
        update_post_meta( $post_id, 'shop_product_6_image', $_POST['shop_product_6_image'] );
    }
    
    if ( isset($_POST['shop_product_6_link']) ) {
        update_post_meta( $post_id, 'shop_product_6_link', $_POST['shop_product_6_link'] );
    }
    
    if ( isset($_POST['shop_product_7_image']) ) {
        update_post_meta( $post_id, 'shop_product_7_image', $_POST['shop_product_7_image'] );
    }
    
    if ( isset($_POST['shop_product_7_link']) ) {
        update_post_meta( $post_id, 'shop_product_7_link', $_POST['shop_product_7_link'] );
    }
    
    if ( isset($_POST['shop_product_8_image']) ) {
        update_post_meta( $post_id, 'shop_product_8_image', $_POST['shop_product_8_image'] );
    }
    
    if ( isset($_POST['shop_product_8_link']) ) {
        update_post_meta( $post_id, 'shop_product_8_link', $_POST['shop_product_8_link'] );
    }
    
    if ( isset($_POST['shop_event_1_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_name', $_POST['shop_event_1_name'] );
    }
    
    if ( isset($_POST['shop_event_1_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_link', $_POST['shop_event_1_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_1_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_1_name', $_POST['shop_event_1_item_1_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_1_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_1_table', $_POST['shop_event_1_item_1_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_1_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_1_spec', $_POST['shop_event_1_item_1_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_1_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_1_price', $_POST['shop_event_1_item_1_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_1_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_1_link', $_POST['shop_event_1_item_1_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_2_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_2_name', $_POST['shop_event_1_item_2_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_2_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_2_table', $_POST['shop_event_1_item_2_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_2_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_2_spec', $_POST['shop_event_1_item_2_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_2_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_2_price', $_POST['shop_event_1_item_2_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_2_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_2_link', $_POST['shop_event_1_item_2_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_3_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_3_name', $_POST['shop_event_1_item_3_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_3_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_3_table', $_POST['shop_event_1_item_3_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_3_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_3_spec', $_POST['shop_event_1_item_3_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_3_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_3_price', $_POST['shop_event_1_item_3_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_3_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_3_link', $_POST['shop_event_1_item_3_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_4_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_4_name', $_POST['shop_event_1_item_4_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_4_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_4_table', $_POST['shop_event_1_item_4_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_4_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_4_spec', $_POST['shop_event_1_item_4_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_4_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_4_price', $_POST['shop_event_1_item_4_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_4_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_4_link', $_POST['shop_event_1_item_4_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_5_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_5_name', $_POST['shop_event_1_item_5_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_5_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_5_table', $_POST['shop_event_1_item_5_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_5_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_5_spec', $_POST['shop_event_1_item_5_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_5_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_5_price', $_POST['shop_event_1_item_5_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_5_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_5_link', $_POST['shop_event_1_item_5_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_6_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_6_name', $_POST['shop_event_1_item_6_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_6_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_6_table', $_POST['shop_event_1_item_6_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_6_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_6_spec', $_POST['shop_event_1_item_6_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_6_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_6_price', $_POST['shop_event_1_item_6_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_6_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_6_link', $_POST['shop_event_1_item_6_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_7_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_7_name', $_POST['shop_event_1_item_7_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_7_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_7_table', $_POST['shop_event_1_item_7_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_7_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_7_spec', $_POST['shop_event_1_item_7_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_7_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_7_price', $_POST['shop_event_1_item_7_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_7_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_7_link', $_POST['shop_event_1_item_7_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_8_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_8_name', $_POST['shop_event_1_item_8_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_8_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_8_table', $_POST['shop_event_1_item_8_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_8_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_8_spec', $_POST['shop_event_1_item_8_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_8_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_8_price', $_POST['shop_event_1_item_8_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_8_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_8_link', $_POST['shop_event_1_item_8_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_9_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_9_name', $_POST['shop_event_1_item_9_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_9_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_9_table', $_POST['shop_event_1_item_9_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_9_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_9_spec', $_POST['shop_event_1_item_9_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_9_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_9_price', $_POST['shop_event_1_item_9_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_9_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_9_link', $_POST['shop_event_1_item_9_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_10_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_10_name', $_POST['shop_event_1_item_10_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_10_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_10_table', $_POST['shop_event_1_item_10_table'] );
    }

    if ( isset($_POST['shop_event_1_item_10_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_10_spec', $_POST['shop_event_1_item_10_spec'] );
    }    
    
    if ( isset($_POST['shop_event_1_item_10_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_10_price', $_POST['shop_event_1_item_10_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_10_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_10_link', $_POST['shop_event_1_item_10_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_11_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_11_name', $_POST['shop_event_1_item_11_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_11_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_11_table', $_POST['shop_event_1_item_11_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_11_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_11_spec', $_POST['shop_event_1_item_11_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_11_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_11_price', $_POST['shop_event_1_item_11_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_11_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_11_link', $_POST['shop_event_1_item_11_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_12_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_12_name', $_POST['shop_event_1_item_12_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_12_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_12_table', $_POST['shop_event_1_item_12_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_12_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_12_spec', $_POST['shop_event_1_item_12_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_12_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_12_price', $_POST['shop_event_1_item_12_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_12_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_12_link', $_POST['shop_event_1_item_12_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_13_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_13_name', $_POST['shop_event_1_item_13_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_13_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_13_table', $_POST['shop_event_1_item_13_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_13_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_13_spec', $_POST['shop_event_1_item_13_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_13_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_13_price', $_POST['shop_event_1_item_13_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_13_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_13_link', $_POST['shop_event_1_item_13_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_14_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_14_name', $_POST['shop_event_1_item_14_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_14_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_14_table', $_POST['shop_event_1_item_14_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_14_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_14_spec', $_POST['shop_event_1_item_14_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_14_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_14_price', $_POST['shop_event_1_item_14_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_14_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_14_link', $_POST['shop_event_1_item_14_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_15_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_15_name', $_POST['shop_event_1_item_15_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_15_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_15_table', $_POST['shop_event_1_item_15_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_15_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_15_spec', $_POST['shop_event_1_item_15_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_15_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_15_price', $_POST['shop_event_1_item_15_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_15_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_15_link', $_POST['shop_event_1_item_15_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_16_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_16_name', $_POST['shop_event_1_item_16_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_16_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_16_table', $_POST['shop_event_1_item_16_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_16_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_16_spec', $_POST['shop_event_1_item_16_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_16_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_16_price', $_POST['shop_event_1_item_16_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_16_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_16_link', $_POST['shop_event_1_item_16_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_17_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_17_name', $_POST['shop_event_1_item_17_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_17_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_17_table', $_POST['shop_event_1_item_17_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_17_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_17_spec', $_POST['shop_event_1_item_17_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_17_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_17_price', $_POST['shop_event_1_item_17_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_17_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_17_link', $_POST['shop_event_1_item_17_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_18_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_18_name', $_POST['shop_event_1_item_18_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_18_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_18_table', $_POST['shop_event_1_item_18_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_18_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_18_spec', $_POST['shop_event_1_item_18_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_18_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_18_price', $_POST['shop_event_1_item_18_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_18_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_18_link', $_POST['shop_event_1_item_18_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_19_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_19_name', $_POST['shop_event_1_item_19_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_19_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_19_table', $_POST['shop_event_1_item_19_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_19_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_19_spec', $_POST['shop_event_1_item_19_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_19_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_19_price', $_POST['shop_event_1_item_19_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_19_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_19_link', $_POST['shop_event_1_item_19_link'] );
    }
    
    if ( isset($_POST['shop_event_1_item_20_name']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_20_name', $_POST['shop_event_1_item_20_name'] );
    }
    
    if ( isset($_POST['shop_event_1_item_20_table']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_20_table', $_POST['shop_event_1_item_20_table'] );
    }
    
    if ( isset($_POST['shop_event_1_item_20_spec']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_20_spec', $_POST['shop_event_1_item_20_spec'] );
    }
    
    if ( isset($_POST['shop_event_1_item_20_price']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_20_price', $_POST['shop_event_1_item_20_price'] );
    }
    
    if ( isset($_POST['shop_event_1_item_20_link']) ) {
        update_post_meta( $post_id, 'shop_event_1_item_20_link', $_POST['shop_event_1_item_20_link'] );
    }
    
    if ( isset($_POST['shop_event_2_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_name', $_POST['shop_event_2_name'] );
    }
    
    if ( isset($_POST['shop_event_2_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_link', $_POST['shop_event_2_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_1_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_1_name', $_POST['shop_event_2_item_1_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_1_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_1_table', $_POST['shop_event_2_item_1_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_1_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_1_spec', $_POST['shop_event_2_item_1_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_1_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_1_price', $_POST['shop_event_2_item_1_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_1_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_1_link', $_POST['shop_event_2_item_1_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_2_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_2_name', $_POST['shop_event_2_item_2_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_2_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_2_table', $_POST['shop_event_2_item_2_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_2_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_2_spec', $_POST['shop_event_2_item_2_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_2_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_2_price', $_POST['shop_event_2_item_2_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_2_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_2_link', $_POST['shop_event_2_item_2_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_3_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_3_name', $_POST['shop_event_2_item_3_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_3_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_3_table', $_POST['shop_event_2_item_3_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_3_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_3_spec', $_POST['shop_event_2_item_3_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_3_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_3_price', $_POST['shop_event_2_item_3_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_3_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_3_link', $_POST['shop_event_2_item_3_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_4_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_4_name', $_POST['shop_event_2_item_4_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_4_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_4_table', $_POST['shop_event_2_item_4_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_4_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_4_spec', $_POST['shop_event_2_item_4_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_4_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_4_price', $_POST['shop_event_2_item_4_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_4_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_4_link', $_POST['shop_event_2_item_4_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_5_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_5_name', $_POST['shop_event_2_item_5_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_5_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_5_table', $_POST['shop_event_2_item_5_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_5_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_5_spec', $_POST['shop_event_2_item_5_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_5_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_5_price', $_POST['shop_event_2_item_5_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_5_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_5_link', $_POST['shop_event_2_item_5_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_6_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_6_name', $_POST['shop_event_2_item_6_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_6_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_6_table', $_POST['shop_event_2_item_6_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_6_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_6_spec', $_POST['shop_event_2_item_6_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_6_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_6_price', $_POST['shop_event_2_item_6_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_6_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_6_link', $_POST['shop_event_2_item_6_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_7_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_7_name', $_POST['shop_event_2_item_7_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_7_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_7_table', $_POST['shop_event_2_item_7_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_7_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_7_spec', $_POST['shop_event_2_item_7_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_7_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_7_price', $_POST['shop_event_2_item_7_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_7_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_7_link', $_POST['shop_event_2_item_7_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_8_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_8_name', $_POST['shop_event_2_item_8_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_8_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_8_table', $_POST['shop_event_2_item_8_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_8_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_8_spec', $_POST['shop_event_2_item_8_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_8_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_8_price', $_POST['shop_event_2_item_8_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_8_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_8_link', $_POST['shop_event_2_item_8_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_9_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_9_name', $_POST['shop_event_2_item_9_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_9_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_9_table', $_POST['shop_event_2_item_9_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_9_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_9_spec', $_POST['shop_event_2_item_9_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_9_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_9_price', $_POST['shop_event_2_item_9_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_9_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_9_link', $_POST['shop_event_2_item_9_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_10_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_10_name', $_POST['shop_event_2_item_10_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_10_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_10_table', $_POST['shop_event_2_item_10_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_10_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_10_spec', $_POST['shop_event_2_item_10_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_10_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_10_price', $_POST['shop_event_2_item_10_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_10_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_10_link', $_POST['shop_event_2_item_10_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_11_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_11_name', $_POST['shop_event_2_item_11_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_11_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_11_table', $_POST['shop_event_2_item_11_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_11_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_11_spec', $_POST['shop_event_2_item_11_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_11_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_11_price', $_POST['shop_event_2_item_11_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_11_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_11_link', $_POST['shop_event_2_item_11_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_12_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_12_name', $_POST['shop_event_2_item_12_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_12_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_12_table', $_POST['shop_event_2_item_12_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_12_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_12_spec', $_POST['shop_event_2_item_12_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_12_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_12_price', $_POST['shop_event_2_item_12_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_12_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_12_link', $_POST['shop_event_2_item_12_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_13_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_13_name', $_POST['shop_event_2_item_13_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_13_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_13_table', $_POST['shop_event_2_item_13_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_13_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_13_spec', $_POST['shop_event_2_item_13_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_13_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_13_price', $_POST['shop_event_2_item_13_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_13_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_13_link', $_POST['shop_event_2_item_13_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_14_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_14_name', $_POST['shop_event_2_item_14_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_14_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_14_table', $_POST['shop_event_2_item_14_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_14_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_14_spec', $_POST['shop_event_2_item_14_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_14_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_14_price', $_POST['shop_event_2_item_14_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_14_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_14_link', $_POST['shop_event_2_item_14_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_15_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_15_name', $_POST['shop_event_2_item_15_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_15_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_15_table', $_POST['shop_event_2_item_15_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_15_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_15_spec', $_POST['shop_event_2_item_15_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_15_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_15_price', $_POST['shop_event_2_item_15_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_15_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_15_link', $_POST['shop_event_2_item_15_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_16_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_16_name', $_POST['shop_event_2_item_16_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_16_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_16_table', $_POST['shop_event_2_item_16_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_16_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_16_spec', $_POST['shop_event_2_item_16_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_16_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_16_price', $_POST['shop_event_2_item_16_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_16_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_16_link', $_POST['shop_event_2_item_16_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_17_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_17_name', $_POST['shop_event_2_item_17_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_17_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_17_table', $_POST['shop_event_2_item_17_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_17_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_17_spec', $_POST['shop_event_2_item_17_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_17_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_17_price', $_POST['shop_event_2_item_17_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_17_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_17_link', $_POST['shop_event_2_item_17_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_18_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_18_name', $_POST['shop_event_2_item_18_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_18_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_18_table', $_POST['shop_event_2_item_18_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_18_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_18_spec', $_POST['shop_event_2_item_18_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_18_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_18_price', $_POST['shop_event_2_item_18_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_18_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_18_link', $_POST['shop_event_2_item_18_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_19_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_19_name', $_POST['shop_event_2_item_19_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_19_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_19_table', $_POST['shop_event_2_item_19_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_19_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_19_spec', $_POST['shop_event_2_item_19_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_19_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_19_price', $_POST['shop_event_2_item_19_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_19_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_19_link', $_POST['shop_event_2_item_19_link'] );
    }
    
    if ( isset($_POST['shop_event_2_item_20_name']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_20_name', $_POST['shop_event_2_item_20_name'] );
    }
    
    if ( isset($_POST['shop_event_2_item_20_table']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_20_table', $_POST['shop_event_2_item_20_table'] );
    }
    
    if ( isset($_POST['shop_event_2_item_20_spec']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_20_spec', $_POST['shop_event_2_item_20_spec'] );
    }
    
    if ( isset($_POST['shop_event_2_item_20_price']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_20_price', $_POST['shop_event_2_item_20_price'] );
    }
    
    if ( isset($_POST['shop_event_2_item_20_link']) ) {
        update_post_meta( $post_id, 'shop_event_2_item_20_link', $_POST['shop_event_2_item_20_link'] );
    }
    
}


