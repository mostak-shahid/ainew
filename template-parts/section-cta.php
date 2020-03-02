<?php 
global $ainew_options; 
$class = $ainew_options['sections-cta-class'];
$title = $ainew_options['sections-cta-title'];
$content = $ainew_options['sections-cta-content'];
$media = $ainew_options['sections-cta-media'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_cta', $page_details ); 
?>
<section id="section-cta" class="<?php if(@$ainew_options['sections-cta-background-type'] == 1) echo @$ainew_options['sections-cta-background'] . ' ';?><?php if(@$ainew_options['sections-cta-color-type'] == 1) echo @$ainew_options['sections-cta-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_cta', $page_details ); ?>
			<div class="row align-items-end">
				<div class="col-lg-6">
					<img class="img-fluid img-cta wow fadeInLeft" src="<?php echo wp_get_attachment_url( $media['id']); ?>" alt="<?php echo strip_tags(do_shortcode( $title )); ?>" width="<?php echo $media['width'] ?>" height="<?php echo $media['height'] ?>">
				</div>
				<div class="col-lg-6">	
					<div class="wrap">			
						<?php if ($title) : ?>				
							<div class="title-wrapper wow fadeInRight mb-4">
								<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
							</div>
						<?php endif; ?>
						<?php if ($content) : ?>				
							<div class="content-wrapper wow fadeInRight mb-3"><?php echo do_shortcode( $content ) ?></div>
						<?php endif; ?>
							<div class="link-wrapper wow fadeInRight"><?php echo do_shortcode( '[phone index=1]' ); ?></div>
					</div>
				</div>
			</div>
		<?php do_action( 'action_after_cta', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_cta', $page_details  ); ?>