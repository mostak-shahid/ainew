<?php 
global $ainew_options; 
$class = $ainew_options['sections-counter-class'];
$title = $ainew_options['sections-counter-title'];
$content = $ainew_options['sections-counter-content'];
$slides = $ainew_options['sections-counter-slides'];
$media = $ainew_options['sections-counter-media'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_counter', $page_details ); 
?>
<section id="section-counter" class="<?php if(@$ainew_options['sections-counter-background-type'] == 1) echo @$ainew_options['sections-counter-background'] . ' ';?><?php if(@$ainew_options['sections-counter-color-type'] == 1) echo @$ainew_options['sections-counter-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_counter', $page_details ); ?>
			<div class="row">
				<div class="col-lg-6">
					<img class="img-fluid img-counter wow fadeInLeft" src="<?php echo wp_get_attachment_url( $media['id']); ?>" alt="<?php echo strip_tags(do_shortcode( $title )); ?>" width="<?php echo $media['width'] ?>" height="<?php echo $media['height'] ?>">
				</div>
				<div class="col-lg-6">					
					<?php if ($title) : ?>				
						<div class="title-wrapper wow fadeInDown">
							<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
						</div>
					<?php endif; ?>
					<?php if ($content) : ?>				
						<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>
					<?php if (@$slides) : ?>				
						<div class="row justify-content-center">
						<?php foreach($slides as $slide) : ?>
							<div class="col-lg-6 wrapper">
								<div class="unit text-center h-100 position-relative">
								<?php if ($slide['link_title']) : ?>
									<div class="counter-con"><div class="counter"><?php echo $slide['link_title'] ?></div></div>
								<?php endif; ?>
								<?php if ($slide['link_title']) : ?>
									<span class="heading"><?php echo $slide['title'] ?></span>
								<?php endif; ?>
								<?php if ($slide['link_url']) : ?>
									<a href="<?php echo esc_url(do_shortcode($slide['link_url'])); ?>" class="hidden-link">Read more</a>
								<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php do_action( 'action_after_counter', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_counter', $page_details  ); ?>
<script>
jQuery(document).ready(function($) {
	$('.counter').counterUp({
	    delay: 10,
	    time: 1000
	});
});			
</script>