<?php get_header(); ?>
<?php get_sidebar('sidebar'); ?>
<div class="center clearfix">
			<style type="text/css">
				

			</style>
						<div class="post-main clearfix">
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
						
						<div class="post">
							<div class="post-title">
								<!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
							</div>
								<div class="post-thumbinal"><?php the_post_thumbnail(); ?>								
								</div>
								<div class="post-content">
								<?php the_content(); ?>
								</div>		
						</div>	
					<br clear="all" />
					<hr>
					
						<?php endwhile; ?>
						<br clear="all" />
						<div class="nav">

							 <?php /* posts_nav_link(); */ ?> 
							 <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
						</div>

						<?php endif; ?>
						
					</div>
</div>
<?php get_footer(); ?>
