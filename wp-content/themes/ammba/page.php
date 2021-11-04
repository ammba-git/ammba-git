<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="hero-container row watermark-purple">
	<div class="layout-width small-block">
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
</div>
<div class="container">
	<div class="row layout-width">
		<?php the_content(); ?>
	</div>
</div>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
