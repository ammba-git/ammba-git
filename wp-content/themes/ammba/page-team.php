<?php
/*
Template Name: Team Page
*/
?>

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
<ul class="container team-list">
	<?php $i=0; if(get_field('team')): while(has_sub_field('team')): 
	?><li class="row border-bottom <?php echo $i % 2 === 0 ? '' : 'team-switch'; ?>">
		<div class="layout-width grid">
			<div class="grid__item lap-and-up-two-fifths margin-bottom">
				<?php 
				$image = get_sub_field('image');
				if( isset($image['sizes']['large']) ): ?>
					<div class="circle-img-wrapper profile" style="background-image: url('<?php echo $image['sizes']['large']; ?>');"></div>
				<?php endif; ?>
			</div><?php
			?><div class="grid__item lap-and-up-three-fifths soft--left">
				<h2 class="palm-center"><?php the_sub_field('name'); ?></h2>
				<div class="rule purple palm-center"></div>
				<?php the_sub_field('descr'); ?>
			</div>
		</div>
	</li><?php
	$i++; endwhile; endif; ?>
</ul>



<?php endwhile; endif; ?>

<?php get_footer(); ?>