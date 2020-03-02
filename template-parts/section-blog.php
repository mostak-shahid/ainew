<?php 
global $ainew_options; 
$class = $ainew_options['sections-blog-class'];
$title = $ainew_options['sections-blog-title'];
$content = $ainew_options['sections-blog-content'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blog', $page_details ); 
?>
<section id="section-blog" class="<?php if(@$ainew_options['sections-blog-background-type'] == 1) echo @$ainew_options['sections-blog-background'] . ' ';?><?php if(@$ainew_options['sections-blog-color-type'] == 1) echo @$ainew_options['sections-blog-color'];?> <?php echo $class ?>">
	<div class="content-wrap">
		<div class="container">
		<?php do_action( 'action_before_blog', $page_details ); ?>
				<?php if ($title) : ?>				
					<div class="title-wrapper wow fadeInDown">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper wow fadeInUp"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
				);
				$the_query = new WP_Query( $args );?>
				<?php if ( $the_query->have_posts() ) :?>
				    <div class="row">
				    <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
				    	<div class="col-lg-4 mb30">	
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
				<?php endif; ?>
				<?php wp_reset_postdata();?>			
		<?php do_action( 'action_after_blog', $page_details ); ?>
		</div>	
	</div>
</section>
<?php do_action( 'action_below_blog', $page_details  ); ?>