<?php
/*
Template Name: About Page
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
		<ul class="nav breadcrumb">

			<?php if(get_field('section')): while(has_sub_field('section')):?>
				<li data-breadcrumb="|"><a class="scrollto" href="#<?php the_sub_field('nav_descr'); ?>"><?php the_sub_field('title'); ?></a></li>
			<?php endwhile; endif; ?>

		</ul>
	</div>
</div>
<div class="container">
	<div class="border-bottom">
		<div class="row layout-width">
			<div class="align-center small-block"><?php the_content(); ?>
			</div>
		</div>
	</div>
	<div class="border-bottom">
		<?php if(get_field('section')): while(has_sub_field('section')):?>
			<div class="layout-width">
				<div id="<?php the_sub_field('nav_descr'); ?>" class="grid row">
					<div class="grid__item lap-and-up-one-third">
						<h2><?php the_sub_field('title');?></h2>
						<div class="rule purple"></div>
					</div><?php
					?><div class="grid__item lap-and-up-two-thirds">
						<?php the_sub_field('description');?>
					</div>
				</div>
			</div>
			<?php
			$attachment_id = get_sub_field('image');
			$image_attributes = wp_get_attachment_image_src($attachment_id, 'large');
			if($image_attributes) {
			?>
			<div class="img-panel align-with-grid" style="background-image:url('<?php echo $image_attributes[0]; ?>');"></div>
			<?php } ?>
		<?php endwhile; endif;?>
	</div>
	<div id="about" class="border-bottom row">
		<div class="layout-width">
			<h2 class="align-center title-rule purple"><?php the_field('partners_title'); ?></h2>
			<div class="align-center partner-list">
				<?php if(get_field('partner_logos')): while(has_sub_field('partner_logos')): 
				?><a rel="external" href="<?php the_sub_field('link'); ?>">
					<?php 
					$image = get_sub_field('image');
					afc_image($image);
					?>
					</a><?php
				endwhile; endif; ?>
			</div>
			<div class="align-center small-block">
				<?php the_field('partner_descr'); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="layout-width">
			<h2 class="align-center title-rule purple"><?php the_field('client_title'); ?></h2>
			<ul class="client-list">

				<?php if(get_field('clients')): while(has_sub_field('clients')):
				?><li>
						<a rel="external" href="<?php the_sub_field('link'); ?>">
							<?php 
							$image = get_sub_field('image');
							$size = 'full';
							if ($image) {
								echo wp_get_attachment_image($image, $size);
							} ?>
						</a>
					</li><?php
				endwhile; endif; ?>

			</ul>
		</div>
	</div>
</div>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
