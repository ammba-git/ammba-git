<?php get_header(); ?>

<div class="hero-container row watermark-purple">
	<div class="layout-width small-block">
		<h1>News - <?php _e( 'Search Results for:', 'bonestheme' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>
        <p class="intro-upper">Showing results for <?php _e( 'Search Results for:', 'bonestheme' ); ?> <?php echo esc_attr(get_search_query()); ?></p>
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

