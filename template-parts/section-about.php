<?php 
global $ainew_options; 
$class = $ainew_options['sections-about-class'];
$title = $ainew_options['sections-about-title'];
$content = $ainew_options['sections-about-content'];
$media = $ainew_options['sections-about-media'];
$link = $ainew_options['sections-about-link'];

$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_about', $page_details ); 
?>
<section id="section-about" class="<?php if(@$ainew_options['sections-about-background-type'] == 1) echo @$ainew_options['sections-about-background'] . ' ';?><?php if(@$ainew_options['sections-about-color-type'] == 1) echo @$ainew_options['sections-about-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
			<?php do_action( 'action_before_about', $page_details ); ?>
			<div class="row no-gutters">
				<div class="col-lg-5" style="background-image: url(<?php echo wp_get_attachment_url( $media['id'] ); ?>);"></div>
				<div class="col-lg-7 bg-theme">
					<div class="con-wrap">
					<?php if ($title) : ?>				
						<div class="title-wrapper wow fadeInDown">
							<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
						</div>
					<?php endif; ?>
					<?php if ($content) : ?>				
						<div class="content-wrapper wow fadeInUp mb-4"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>
					<?php if ($link['text_field_1'] AND $link['text_field_2']) : ?>	
					<div class="content-wrapper wow fadeInUp">			
						<a href="<?php echo esc_url(do_shortcode($link['text_field_2'])); ?>" class="btn bg-white rounded-pill btn-about"><?php echo do_shortcode( $link['text_field_1'] ) ?></a>
					</div>
					<?php endif; ?>
					</div>
				</div>
			</div>

			<?php do_action( 'action_after_about', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>