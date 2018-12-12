<?php
/*
Template Name: leandroarts-login
*/
?>

<?php get_header('global'); ?>

<div style="margin: 0px auto 20px; width: 100%; overflow: hidden; background: #fafafa; display: block; float: left; clear: both; padding: 2% 10%;">
    <div style="margin: 4% auto 8%; width: 100%; overflow: hidden; background: #fff; display: block; float: left; clear: both; padding: 2% 0%;">

        <!-- LOGGED IN -->
        <?php if ( is_user_logged_in() ) : ?>

            <?php
            if( current_user_can( 'member' ) ){
                $url = get_site_url() . '/member-dashboard'; 
                header('Location: ' . $url);
                exit();                    
            } 
            else {
                $url = get_site_url() . '/wp-admin'; 
                header('Location: ' . $url);
                exit();    
            }
            ?>

        <!-- NOT LOGGED IN -->
        <?php else : ?>
    
            <div id="leandroarts_login_form" style="margin: 10px auto 40px;">

                <h3>Login To Your LIWines.com account</h3>

                <?php 
                // ERROR MESSAGES:
                $login = $_GET['login'];
                if ( $login == 'failed' ){
                    echo '<h4 style="color: #d2a35d;">Your login failed. Please try again.</h4>';
                }
                ?>

                <?php   
                // WORDPRESS LOGIN FORM   
                $urlRedirect = home_url() . '/login';        
                wp_login_form( array('redirect' => $urlRedirect) );            
                ?>

            </div>

        <?php endif; ?>


        <!-- SUPPORT -->
        <div style="margin: 10px auto 40px;">
            <h4>Need Support?</h4>
            <p>You can contact us at info@liwines.com</p>

            <!-- LOGOUT -->
            <?php
            $redirect = get_site_url() . '/login';
            echo '<br/><a href="' . wp_logout_url( $redirect ) . '" style="background: #bbbbbb; border-radius: 6px; color: #fff; font-weight: bold; padding: 1em;">Log out</a>';
            ?>
        </div>

    </div><!-- form container -->
</div><!-- container -->

<div id="footer">
</div><!-- end Footer -->
<?php wp_footer(); ?>     
</body>
</html>


