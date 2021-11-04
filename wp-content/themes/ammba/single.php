<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="hero-container row watermark-purple">
		<div class="layout-width small-block">
			<h2>News</h2>
			<p class="intro-upper">Keeping you updated with what we’ve been up to</p>
			<div class="rule white"></div>
		</div> 
		<p class="hero-back layout-width static-font ref"><a href="<?php echo get_site_url(); ?>/news"><i class="fa fa-angle-left"></i> Back to News</a></p> 
	</div>
	<div class="container row">
		<?php if(has_post_thumbnail()) :?>
		<div class="align-with-grid">
			<div class="grid">
				<div class="grid__item desk-three-fifths desk-wide-one-half space-right">
					<div class="device-padding">
						<h1 class="title-rule purple blog-title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<hr/>
						<p class="article-nav">
							<span class="more-link back"><?php previous_post('<i class="fa fa-angle-left"></i> %', 'Previous: ', 'yes'); ?></span>
							<span class="more-link next"><?php next_post('% <i class="fa fa-angle-right"></i>', 'Next: ', 'yes'); ?></span>
						</p>
					</div>
				</div><?php
				?><div class="grid__item desk-two-fifths desk-wide-one-half">
					<?php echo get_the_post_thumbnail( $page->ID, 'full', array( 'class' => 'news-img-main' )); ?>
				</div>
			</div>
		</div>
		<?php else:?>
		<div class"site-layout">
			<div class="small-block align-center device-padding">
				<h1 class="blog-title"><?php the_title(); ?></h1>
				<div class="rule purple"></div>
				<?php the_content(); ?>
				<hr class="push-top"/>
				<p class="article-nav">
					<span class="more-link back"><?php previous_post('<i class="fa fa-angle-left"></i> %', 'Previous: ', 'yes'); ?></span>
					<span class="more-link next"><?php next_post('% <i class="fa fa-angle-right"></i>', 'Next: ', 'yes'); ?></span>
				</p>
			</div>
		</div>
		<?php endif;?>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>

