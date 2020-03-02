<?php 
global $ainew_options; 
$class = $ainew_options['sections-gservice-class'];
$title = $ainew_options['sections-gservice-title'];
$content = $ainew_options['sections-gservice-content'];
$slides = $ainew_options['sections-gservice-slides'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_gservice', $page_details ); 
?>
<section id="section-gservice" class="<?php if(@$ainew_options['sections-gservice-background-type'] == 1) echo @$ainew_options['sections-gservice-background'] . ' ';?><?php if(@$ainew_options['sections-gservice-color-type'] == 1) echo @$ainew_options['sections-gservice-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_gservice', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($slides) : ?>				
					<div class="row gservices">
					<?php foreach($slides as $slide) : ?>	
						<div class="col-lg-3 col-md-6 mb-4">
							<div class="unit h-100 position-relative text-center">
								<?php if ($slide["title"]) : ?>
									<h4 class="unit-title smooth"><?php echo do_shortcode($slide["title"]); ?></h4>
								<?php endif; ?>
								<?php if ($slide["attachment_id"] AND $slide["photo_attachment_id"]) : ?>
									<div class="unit-img-wrap position-relative">
										<img src="<?php echo aq_resize(wp_get_attachment_url( $slide["attachment_id"] ),95,95,true); ?>" alt="<?php echo strip_tags(do_shortcode($slide["title"])); ?>" class="img-fluid img-gservices-one">
										<img src="<?php echo aq_resize(wp_get_attachment_url( $slide["photo_attachment_id"] ),95,95,true); ?>" alt="<?php echo strip_tags(do_shortcode($slide["title"])); ?>" class="img-fluid img-gservices-two smooth">
									</div>
								<?php endif; ?>
								<?php if ($slide["description"]) : ?>
									<div class="unit-description"><?php echo do_shortcode($slide["description"]); ?></div>
								<?php endif; ?>
								<?php if ($slide["link_url"]) : ?>
									<a href="<?php echo esc_url(do_shortcode($slide["link_url"])); ?>" class="hidden-link">Read More</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>					
					</div>
				<?php endif; ?>
		<?php do_action( 'action_after_gservice', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_gservice', $page_details  ); ?>