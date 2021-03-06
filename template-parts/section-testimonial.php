<?php 
global $ainew_options; 
$class = $ainew_options['sections-testimonial-class'];
$title = $ainew_options['sections-testimonial-title'];
$content = $ainew_options['sections-testimonial-content'];
$shortcode = $ainew_options['sections-testimonial-shortcode'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial', $page_details ); 
?>
<section id="section-testimonial" class="<?php if(@$ainew_options['sections-testimonial-background-type'] == 1) echo @$ainew_options['sections-testimonial-background'] . ' ';?><?php if(@$ainew_options['sections-testimonial-color-type'] == 1) echo @$ainew_options['sections-testimonial-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_testimonial', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($shortcode) : ?>				
					<div class="shortcode-wrapper"><?php echo do_shortcode( $shortcode ) ?></div>
				<?php endif; ?>
		<?php do_action( 'action_after_testimonial', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_testimonial', $page_details  ); ?>