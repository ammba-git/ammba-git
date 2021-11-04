<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

	<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="hero-container row feature-image" style="background-image: url('<?php echo $image[0]; ?>')">
			<div class="overlay purple"></div>
			<div class="feature-text layout-width">
				<?php if (get_field('header_title'))
				{
					echo '<h1>' . get_field('header_title') . '</h1>';
				}
				else 
				{
					echo '<h1>' . get_the_title() . '</h1>' ;
				}
				?>
				<?php if(get_field('intro_text')) {echo '<p class="intro-upper">' . get_field('intro_text') . '</p>';} ?>
				<div class="rule white"></div>
			</div>
			<p class="hero-back layout-width static-font"><a href="<?php echo get_site_url(); ?>/work"><i class="fa fa-angle-left"></i> Back to Work</a></p> 
		</div>
	<?php endif; ?>

	<div class="container work-page-container">
		<div class="left-space-container">
			<article class="align-with-grid">
				<?php if(get_field('section')): while(has_sub_field('section')):?>
					<div class="row push-left main-content">
						<h2><?php the_sub_field('title');?></h2>
						<div class="rule purple"></div>
						<?php the_sub_field('description');?>
					</div>

					<?php $images = get_sub_field('images');
						$imageCount = count($images);
						if( $images ):?>
					
						<?php if($imageCount == 1): ?>
			        		<?php foreach( $images as $image ): ?>
						        <div class="gallery-row">
					                <img src="<?php echo $image['sizes']['landscape']; ?>" alt="<?php echo $image['alt']; ?>" />
					            </div>
					        <?php endforeach; ?>
						<?php elseif($imageCount == 2): ?>
							<ul class="grid gallery-row">
			        			<?php foreach( $images as $image ):
			        				?><li class="grid__item one-half">
		                				<img src="<?php echo $image['sizes']['portrait']; ?>" alt="<?php echo $image['alt']; ?>" />
		                			</li><?php 
		                		endforeach; ?>
			    			</ul>
						<?php else: ?>
							<ul class="grid gallery-row">
								<?php foreach( $images as $image ):
									?><li class="grid__item lap-and-up-one-half">
		                				<img src="<?php echo $image['sizes']['landscape']; ?>" alt="<?php echo $image['alt']; ?>" />
		                			</li><?php 
		                		endforeach; ?>
			        		</ul>
						<?php endif; ?>
					<?php endif; ?>

				<?php endwhile; endif;?>
				<div class="row push-left">
					<p class="article-nav">
						<span class="more-link back"><?php previous_post('<i class="fa fa-angle-left"></i> %', 'Previous: ', 'yes'); ?></span>
						<span class="more-link next"><?php next_post('% <i class="fa fa-angle-right"></i>', 'Next: ', 'yes'); ?></span>
					</p>
				</div>		
			</article><aside class="article-ref-box align-with-grid">
					<div class="ref-wrapper">
						<?php if(get_field('extra_info')): while(has_sub_field('extra_info')): ?>
							<p class="info-ref static-font"><span><?php the_sub_field('title');?></span> <em><?php the_sub_field('description');?></em></p>
						<?php endwhile; endif;?>
					</div><?php
				?><div class="ref-wrapper">
					<div class="quote-container margin-top">
						<blockquote class="static-font"><?php the_field('quote');?></blockquote>
					</div>
					<p class="credit"><?php the_field('quote_credit');?></p>
				</div>
				<!-- <p class="info-ref static-font"><span>Test</span> This is a test</p> -->
			</aside>
		</div>
	</div>

<?php endwhile; endif; ?>


<?php get_footer(); ?>