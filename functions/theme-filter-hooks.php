<?php
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) AND $post->post_type == 'page' ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    } else {
        $classes[] = $post->post_type . '-archive';
    }
    return $classes;
}
// add_filter( 'body_class', 'add_slug_body_class' );

add_action( 'action_below_footer', 'back_to_top_fnc', 10, 1 );
function back_to_top_fnc () {
    global $ainew_options;
    if ($ainew_options['misc-back-top']) :
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img width="40" height="40" src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" alt="Back To Top"></a>
    <?php 
    endif;
}
function custom_admin_script(){
    $frontpage_id = get_option( 'page_on_front' );
    if ($_GET['post'] == $frontpage_id){ 
        ?>
        <script>
        jQuery(document).ready(function($){
            $('#_ainew_banner_details').hide();
        });
        </script>
        <?php 
    }
        
}
// add_action('admin_head', 'custom_admin_script');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});
add_action( 'action_after_content', 'contact_page_content');
function contact_page_content ($page_details) {
    if ($page_details['id'] == 33){
        global $ainew_options;
        ?>
        <div class="contact-info">            
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center mb-4 mb-lg-0">
                <?php echo do_shortcode("[address index=1]"); ?>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4 mb-lg-0">
                <?php echo do_shortcode("[phone index=1]"); ?>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4 mb-lg-0">
                <?php echo do_shortcode("[email index=1]"); ?>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-4 mb-lg-0">
                <?php echo do_shortcode("[business-hour]"); ?>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <div class="form-wrap"><?php echo do_shortcode('[contact-form-7 id="155" title="Contact Page Form" html_id="contact-form-155" html_class="widget-form needs-validation"]'); ?></div>
        </div> 
        <div class="contact-feature">
            <?php 
            $atts = 'class="feature-image"';
            echo do_shortcode("[feature-image wrapper_atts='".$atts."']"); 
            ?>            
        </div> 
        <?php
    }
}