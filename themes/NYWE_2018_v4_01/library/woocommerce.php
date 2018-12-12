<?php get_header(); ?>
   
<?php include(TEMPLATEPATH . '/DFP-advert_banner.php'); ?>

<!-- CONTAINER -->
<div class="center_responsive" style="margin-top: 0px; max-width: 970px;">

    <div id="main" role="main">

      <!-- CONTENT -->
      <div class="content" style="width: auto;">

          <script type="text/javascript">
            $(function(){
                $('#header').css('border-top', '8px solid #A83264');
            });
          </script>

          <!-- WOOCOMMERCE HOOK -->
          <?php woocommerce_content(); ?>

      </div><!-- ..content -->

    </div><!-- ..main -->


</div><!-- ..container -->

<?php get_footer(); ?>