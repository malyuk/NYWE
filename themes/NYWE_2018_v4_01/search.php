<?php get_header(); ?>

<div id="search_bar">
  <form id="search_bar_form" method="get" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="Search for.." onblur="if(this.value == '') {this.value = 'Search for..';}" onfocus="if(this.value == 'Search for..') {this.value = '';}" name="s" id="s" size="25" />
    <?php /* <input type="submit" id="head_tools_search_submit" value="Search" class="submit" name="header_search_submit"/> */ ?>
  </form>
</div><!-- search -->

<!-- CONTAINER -->
<div id="search_results" class="center" style="margin-top: 0px; max-width: 1920px;">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="loop_cell">
        <a class="loop_cell_image" href="<?php the_permalink(); ?>" title="Read the full Article."><?php the_post_thumbnail( array(200,200) ); ?></a>
        <div class="loop_cell_details">
          <h3><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h3>
          <h6><?php the_time('d M Y h:i a'); ?></h6>
          <p><?php the_excerpt(); ?></p>
          <div>
            <?php the_tags('Tags: ', ', ', '<br />'); ?> 
            Posted in <?php the_category(', ') ?>
            | <?php edit_post_link('Edit', '', ' | '); ?>
            <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>              
          </div>
          <a class="loop_cell_more button" href="<?php the_permalink(); ?>" title="Read more">Read More</a>
        </div><!-- ..details -->
      </div><!-- ..cell -->

      <?php endwhile; endif; ?>
</div><!-- ..container -->

<script type="text/javascript">
  jQuery(function(){
    jQuery('#footer').hide();
  });
</script>

<!-- FOOTER -->
<?php get_footer(); ?>