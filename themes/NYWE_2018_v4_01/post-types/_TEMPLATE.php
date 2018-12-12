<?php

/* DISPLAY ON TEMPLATE */
/*
    <?php
        $url_overide = get_post_custom_values('url_overide');
        if ( is_array($url_overide) && end($url_overide) != '' ) { 
          echo end($url_overide); 
        }
        else {
          the_permalink();
        }
    ?>">
*/
    
/* POST TYPE
============== */

// !! Change all TEMPLATE to a unique lower case name !!

function custom_post_TEMPLATE() { 
	// creating (registering) the custom type 
	register_post_type( 'TEMPLATE', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		array('labels' => array(
			'name' => __('TEMPLATE', 'post type general name'), /* This is the Title of the Group */
			'singular_name' => __('Item Post', 'post type singular name'), /* This is the individual type */
			'add_new' => __('Add New', 'custom post type item'), /* The add new menu item */
			'add_new_item' => __('Add New item'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit item'), /* Edit Display Title */
			'new_item' => __('New item'), /* New Display Title */
			'view_item' => __('View item'), /* View Display Title */
			'search_items' => __('Search items'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is a custom post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/post-types/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			/* 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky') */
			'supports' => array( 'title', 'editor', 'thumbnail' )
	 	) /* end of options */
	); /* end of register post type */
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_TEMPLATE');


/* METABOX 
============ */

add_action( 'add_meta_boxes', 'TEMPLATE_meta_box_add' );
function TEMPLATE_meta_box_add()
{
  add_meta_box( 'TEMPLATE-id', 'Configuration', 'TEMPLATE_meta_box_cb', 'TEMPLATE', 'normal', 'high' );
}

function TEMPLATE_meta_box_cb( $post )
{
  $values = get_post_custom( $post->ID );
  $text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
  $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'][0] ) : '';
  $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
  wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
  ?>
  <p>
    <label for="my_meta_box_text">Text Label</label>
    <input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $text; ?>" />
  </p>
  
  <p>
    <label for="my_meta_box_select">Color</label>
    <select name="my_meta_box_select" id="my_meta_box_select">
      <option value="red" <?php selected( $selected, 'red' ); ?>>Red</option>
      <option value="blue" <?php selected( $selected, 'blue' ); ?>>Blue</option>
    </select>
  </p>
  <p>
    <input type="checkbox" name="my_meta_box_check" id="my_meta_box_check" <?php checked( $check, 'on' ); ?> />
    <label for="my_meta_box_check">Don't Check This.</label>
  </p>
  <?php 
}


add_action( 'save_post', 'super_sponsor_meta_box_save' );
function super_sponsor_meta_box_save( $post_id )
{
  // Bail if we're doing an auto save
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  
  // if our nonce isn't there, or we can't verify it, bail
  if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
  
  // if our current user can't edit this post, bail
  if( !current_user_can( 'edit_post' ) ) return;
  
  // now we can actually save the data
  $allowed = array( 
    'a' => array( // on allow a tags
      'href' => array() // and those anchords can only have href attribute
    )
  );
  
  // Probably a good idea to make sure your data is set
  if( isset( $_POST['my_meta_box_text'] ) )
    update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
    
  if( isset( $_POST['my_meta_box_select'] ) )
    update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
    
  // This is purely my personal preference for saving checkboxes
  $chk = ( isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
  update_post_meta( $post_id, 'my_meta_box_check', $chk );
}
