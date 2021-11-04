<?php get_header(); ?>

<div class="hero-container row watermark-purple">
	<div class="layout-width small-block">
		<h1>News</h1>
        <p class="intro-upper">Keeping you updated with what we’ve been up to</p>
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
								<h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div><?php 
							?><div class="grid__item lap-and-up-two-fifths list-img-wrapper">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array('class' => 'news-img-list') ); ?></a>
							</div>
						<?php }
						else { ?>
							<div class="grid__item one-whole">
								<h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>
						<?php }
						?>
					</div>
				</div>
				<?php endwhile; endif; ?>
				<p class="article-nav margin-top">
					<?php next_posts_link('Older Posts <i class="fa fa-angle-right"></i>'); ?>
					<?php previous_posts_link('<i class="fa fa-angle-left"></i> Newer Posts'); ?>
				</p>
			</div>
		</div>
	</div>
</div>


<?php get_footer();
