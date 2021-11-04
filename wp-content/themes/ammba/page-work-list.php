<?php
/*
Template Name: Work List
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="hero-container row watermark-purple">
	<div class="layout-width">
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
	</div>
	<div class="rule white"></div>
</div>
<?php endwhile; endif; ?>
<div class="container">
	<div class="layout-width">
		<div class="row">
			<ul class="work-list grid">
				<?php query_posts('post_type=work'); ?>

				<?php $i = get_num(); if(have_posts()): while(have_posts()): the_post();
				?><li class="grid__item <?php echo $i; ?> <?php the_work_size($i, 'lap-and-up-two-thirds', 'lap-and-up-one-third'); ?>">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false ); ?>
					<div class="img-tile <?php the_work_size($i, 'wide', 'square'); ?>" style="background-image: url('<?php echo $image[0]; ?>')">
						<div class="overlay">
							<div class="inner-content">
								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>

								<?php if(get_field('intro_text')): ?>
									<p class="<?php the_work_size($i, 'slide-descr', 'descr'); ?>"><?php the_field('intro_text'); ?></p>
								<?php endif; ?>


								<div class="rule white"></div>
							</div>
							<a class="overlay-link" href="<?php echo the_permalink();?>"><?php the_title(); ?></a>
						</div>
					</div>
				</li><?php
				 $i = get_num(); endwhile; endif; ?>
			</ul>
			<!-- <ul class="page-links align-center nav">
				<li><strong>1</strong></li>
				<li><a href="javscript:;">2</a></li>
				<li><a href="javscript:;">3</a></li>
			</ul> -->
		</div>
	</div>
</div>





<?php get_footer(); ?>
