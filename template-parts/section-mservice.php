<?php 
global $ainew_options; 
$class = $ainew_options['sections-mservice-class'];
$title = $ainew_options['sections-mservice-title'];
$content = $ainew_options['sections-mservice-content'];
$slides = $ainew_options['sections-mservice-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_mservice', $page_details ); 
?>
<section id="section-mservice" class="<?php if(@$ainew_options['sections-mservice-background-type'] == 1) echo @$ainew_options['sections-mservice-background'] . ' ';?><?php if(@$ainew_options['sections-mservice-color-type'] == 1) echo @$ainew_options['sections-mservice-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_mservice', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (@$slides) : ?>				
					<div class="row main-services">
					<?php foreach( $slides as $slide) : ?>
						<div class="col-lg-4 mb-4">
							<div class="unit smooth h-100 position-relative text-center">
							<?php if ($slide['attachment_id']) : ?>
								<img src="<?php echo aq_resize(wp_get_attachment_url( $slide['attachment_id'] ),110,110,true); ?>" alt="<?php echo strip_tags(do_shortcode($slide['title'])); ?>" class="img-fluid img-main-service" width="110" height="110">
							<?php endif;?>
							<?php if ($slide['title']) : ?>
								<h3 class="unit-title"><?php echo do_shortcode($slide['title']); ?></h3>
							<?php endif;?>
							<?php if ($slide['description']) : ?>
								<div class="unit-desc"><?php echo do_shortcode($slide['description']); ?></div>
							<?php endif;?>
							<?php if ($slide['link_title']) : ?>
								<span class="unit-link-title"><?php echo do_shortcode($slide['link_title']); ?></span>
							<?php endif; ?>
							<?php if ($slide['link_url']) : ?>
								<a href="<?php echo esc_url(do_shortcode($slide['link_url'])); ?>" class="hidden-link">Read More</a>
							<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>						
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_mservice', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_mservice', $page_details  ); ?>