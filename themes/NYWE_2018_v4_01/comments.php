<!-- // COMMENTS MODULE // -->

<!-- SECURITY -->
<?php
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');
  if ( post_password_required() ) { ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
  <?php
    return;
  }
?>

<!-- COMMENT CONTENT -->
<div id="comments">

  <!-- Comment List -->
  <?php if ( have_comments() ) : ?>
      <h5><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h5>
      <ol class="comments_list">
          <?php wp_list_comments('avatar_size=60'); ?>
      </ol>
  <?php endif; ?>

      <!-- Comment Respond -->
      <!-- IF OPEN COMMENTS -->
      <?php if ( comments_open() ) : ?>
          
          <div id="comment_respond">
            
            <h5><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h5>
            
            <div class="cancel-comment-reply">
              <small><?php cancel_comment_reply_link(); ?></small>
            </div>

            <!-- NOT LOGGED IN 1 -->
            <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
                <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
  
            <!-- LOGGED IN -->
            <?php else : ?>

                <!-- FORM START -->
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                    <!-- Logged in -->
                    <?php if ( is_user_logged_in() ) : ?>

                        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

                    <!-- Not logged in 2 -->
                    <?php else : ?>

                            <!-- User Info -->
                            <div id="comments_respond_userInfo">
                                <p>
                                  <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
                                  <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                                </p>

                                <p>
                                  <label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>
                                  <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                                </p>

                                <p>
                                  <label for="url">Website</label>
                                  <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                                </p>
                            </div><!-- ..comment respond form -->

                    <?php endif; ?>

                    <!-- SUBMIT BOX -->
                    <div id="comments_respond_submit">
                          <p>
                            <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                          </p>
                          <p>
                            <input class="button" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                            <?php comment_id_fields(); ?>
                          </p>
                          <?php do_action('comment_form', $post->ID); ?>
                    </div><!-- ..comments_respond_submit -->
        
                <?php endif; // If registration required and not logged in ?>

            </form>

          </div><!-- ..comment_respond -->
      
      <?php endif; // 1.end ?>

</div><!-- ..comments -->