<?php 
global $ainew_options; 
$class = $ainew_options['sections-map-class'];
$map = $ainew_options['contact-address'][0]['embeded_link'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_map', $page_details ); 
?>
<section id="section-map" class="<?php if(@$ainew_options['sections-map-background-type'] == 1) echo @$ainew_options['sections-map-background'] . ' ';?><?php if(@$ainew_options['sections-map-color-type'] == 1) echo @$ainew_options['sections-map-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
	<?php if (@$map) : ?>
		<div class="embed-responsive embed-responsive-700">
			<iframe class="embed-responsive-item" src="<?php echo $map ?>"></iframe>
		</div>
	<?php endif; ?>	
	</div>
</section>
<?php do_action( 'action_below_map', $page_details  ); ?>