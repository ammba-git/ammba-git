<?php get_header(); ?>

<div class="hero-container row watermark-purple">
	<div class="layout-width small-block">
		<?php if (is_category()) { ?>
			<h1>
				<?php single_cat_title(); ?>
			</h1>

		<?php } elseif (is_tag()) { ?>
			<h1>
				<?php single_tag_title(); ?>
			</h1>

		<?php } elseif (is_author()) {
			global $post;
			$author_id = $post->post_author;
		?>
			<h1>
				<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
			</h1>
		<?php } elseif (is_day()) { ?>
			<h1>
				<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
			</h1>
		<?php } elseif (is_month()) { ?>
			<h1 class="archive-title h2">
				<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
			</h1>
		<?php } elseif (is_year()) { ?>
			<h1 class="archive-title h2">
				<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
			</h1>
		<?php } ?>
        <div class="rule white"></div>
	</div>
</div>
<div class="container">
	<div class="row layout-width">
		<div class="grid news-list">
			<div class="grid__item lap-and-up-one-fifth">
				<p class="show-sidebar align-center"><a class="more-link" href="javascript:;">Show News Menu<i class="fa fa-bars"></i></a></p>
				<div class="sidebar-wrapper">
					<?php get_sidebar(); ?>
				</div>
			</div><?php 
			?><div class="grid__item lap-and-up-four-fifths">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post">
					<div class="grid">
						<?php
						if ( has_post_thumbnail() ) { ?>
							<div class="grid__item lap-and-up-three-fifths space-right">
								<h2 class="blog-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div><?php 
							?><div class="grid__item lap-and-up-two-fifths list-img-wrapper">
								<a href="<?php echo get_the_permalink(); ?>"><?php the_post_thumbnail( 'large', array('class' => 'news-img-list') ); ?></a>
							</div>
						<?php }
						else { ?>
							<div class="grid__item one-whole">
								<h2 class="blog-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>
						<?php }
						?>
					</div>
				</div>
				<?php endwhile; endif; ?>
				<p><a class="more-link back" href="<?php echo get_site_url(); ?>/news"><i class="fa fa-angle-left"></i> Back to News</a></p>
			</div>
		</div>
	</div>
</div>


<?php get_footer();

