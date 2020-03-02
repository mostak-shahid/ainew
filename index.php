<?php 
global $ainew_options;
if (is_home()) $page_id = get_option( 'page_for_posts' );
else $page_id = get_the_ID();

$from_theme_option = $ainew_options['archive-page-sections'];
$from_page_option = get_post_meta( $page_id, '_ainew_page_section_layout', true );
$sections = (@$from_page_option['Enabled'])?$from_page_option['Enabled']:$from_theme_option['Enabled'];
?><?php get_header() ?>
<section id="archive" class="page-content <?php if(@$ainew_options['sections-content-background-type'] == 1) echo @$ainew_options['sections-content-background'] . ' ';?><?php if(@$ainew_options['sections-content-color-type'] == 1) echo @$ainew_options['sections-content-color'];?>">
	<div class="content-wrap">
		<div class="container">
			<?php if ( have_posts() ) :?>
				<div id="blogs" class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-lg-4">							
							<?php // get_template_part( 'content', get_post_format() ) ?>

				    		<div class="blog-unit h-100 position-relative">
				    			<?php 
				    			$atts = 'class="post-feature"';
				    			echo do_shortcode( "[feature-image wrapper_atts='".$atts."' height='250' width='350']" ); 
				    			?>				        
				    			<div class="d-table w-100 post-meta">
				    				<div class="d-table-cell text-left post-author"><span>By <?php echo get_author_name()?></span></div>
				    				<div class="d-table-cell text-right post-date"><span><?php echo get_the_date('d M Y');?></span></div>
				    			</div>
				    			<h4 class="post-title smooth"><?php echo get_the_title(); ?></h4>
				    			<a href="<?php echo get_the_permalink(); ?>" class="hidden-link">Read More</a>
				    		</div>
						</div>
					<?php endwhile;?>						
				</div>
				<div class="pagination-wrapper">
				<?php
					the_posts_pagination( array(
						'show_all' => false,
						'screen_reader_text' => " ",
						'prev_text'          => 'Prev',
						'next_text'          => 'Next',
					) );
				?>
				</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif;?>			
		</div>	
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer() ?>