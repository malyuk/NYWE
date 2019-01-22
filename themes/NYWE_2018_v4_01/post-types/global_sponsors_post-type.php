<?php

/* POST TYPE
============== */

function custom_post_global_sponsor() { 
	// creating (registering) the custom type 
	register_post_type( 'sponsors', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		array('labels' => array(
			'name' => __('Global Sponsor', 'post type general name'), /* This is the Title of the Group */
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
			'hierarchical' => false,
			'has_archive' => true,
			'capability_type' => array('admin' , 'admins' ), // 'capability_type' => 'post',
			'map_meta_cap' => true,			
			/* 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky') */
			'supports' => array( 'title', 'editor', 'thumbnail' )
	 	) /* end of options */
	); /* end of register post type */
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_global_sponsor');


/* METABOX 
============ */

/* REGISTER */
add_action( 'add_meta_boxes', 'global_sponsor_meta_box_add' );

function global_sponsor_meta_box_add() {
  add_meta_box( 'global_sponsor-id', 'Configuration', 'global_sponsor_meta_box_cb', 'sponsors', 'normal', 'high' );
}

/* CREATE */
function global_sponsor_meta_box_cb( $post ) {
  $values = get_post_custom( $post->ID );
  $url_overide2 = isset( $values['url_overide2'] ) ? esc_attr( $values['url_overide2'][0] ) : '';
  wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
  ?>
  <p>
    <label for="my_meta_box_text">URL Overide</label>
    <input type="text" name="url_overide2" id="url_overide2" value="<?php echo $url_overide2; ?>" size="100" />
    <em> - Example: http://leandroarts.com</em>
  </p>
  <?php 
}


/* SAVE */
//add_action( 'save_post', 'global_sponsor_meta_box_save' );
function global_sponsor_meta_box_save( $post_id )
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
  if( isset( $_POST['url_overide2'] ) )
    update_post_meta( $post_id, 'url_overide2', wp_kses( $_POST['url_overide2'], $allowed ) );

}
