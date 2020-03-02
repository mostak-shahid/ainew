<?php 
global $ainew_options;
$class = $ainew_options['sections-footer-class'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
  <?php get_template_part( 'template-parts/section', 'widgets' ); ?>
  <footer id="footer" class="<?php if(@$ainew_options['sections-footer-background-type'] == 1) echo @$ainew_options['sections-footer-background'] . ' ';?><?php if(@$ainew_options['sections-footer-color-type'] == 1) echo @$ainew_options['sections-footer-color'];?> <?php echo $class ?>">
    <div class="content-wrap">
      <div class="container">
        <div class="form-area">
          <div class="row no-gutters">
            <div class="col-lg-4 bg-theme">
              <div class="info-part">
                <h3 class="info-title">Information</h3>
                <?php echo do_shortcode("[address index=1]"); ?>
                <?php echo do_shortcode("[phone index=1]"); ?>
                <?php echo do_shortcode("[email index=1]"); ?>
                <?php echo do_shortcode("[business-hour]"); ?>
              </div>
            </div>
            <div class="col-lg-8 bg-white">
              <div class="form-part">
                <h3 class="form-title text-dark">Send us a Message</h3>
                <?php echo do_shortcode( '[contact-form-7 id="146" title="Contact Form" html_id="contact-form-146" html_class="widget-form needs-validation"]' ); ?>
                
              </div>
            </div>
          </div>
        </div>
        <div class="menu-area">
          <?php
          wp_nav_menu([
            'menu'            => 'footermenu',
            'theme_location'  => 'footermenu',
            'container'       => false,
            'menu_id'         => false,
            'menu_class'      => 'footer-menu',
            'depth'           => 1,
            'fallback_cb'     => 'bs4navwalker::fallback',
            //'walker'          => new bs4navwalker()
            ]);
          ?>          
        </div>
        <div class="copyright-area">
          <?php echo do_shortcode("[copyright-symbol]"." "."[this-year]"." "."[site-name link=1]"); ?>, All Rights Reserved. Digital Transformation by <?php echo do_shortcode("[site-name link=1]"); ?>
        </div>
        <div class="social-area">
          <?php echo do_shortcode("[social-menu display='inline' title=0]"); ?>
        </div>
        <?php echo do_shortcode( $ainew_options['sections-footer-content'] ); ?>
      </div>
    </div>
  </footer>
<?php
if ($ainew_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
?>
<?php wp_footer(); ?> 
<?php if ($ainew_options['misc-settings-css']) : ?>
<style>
<?php echo $ainew_options['misc-settings-css'] ?>    
</style>
<?php endif; ?>
<?php if ($ainew_options['misc-settings-js']) : ?>
<script>
<?php echo $ainew_options['misc-settings-js'] ?> 
</script>
<?php endif; ?>
</body>
</html>