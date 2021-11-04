<?php
/*
Template Name: Front
*/
?>

<?php get_header(); ?>

<div class="hero-container row watermark-purple">
	<div class="layout-width small-block">
		<?php if (get_field('header_title'))
		{
			echo '<h1>' . get_field('header_title') . '</h1>';
		}
		else
		{
			echo get_title();
		}
		?>
		<?php if(get_field('intro_text')) {echo '<p class="intro-upper">' . get_field('intro_text') . '</p>';} ?>
		<div class="rule white"></div>
		<ul class="breadcrumb">
			<li data-breadcrumb="|"><a href="<?php echo get_site_url(); ?>/about/#about1">Build</a></li>
			<li data-breadcrumb="|"><a href="<?php echo get_site_url(); ?>/about/#about2">Curate</a></li>
			<li data-breadcrumb="|"><a href="<?php echo get_site_url(); ?>/about/#about3">Train</a></li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="border-bottom">
		<div class="row layout-width">
			<div class="align-center small-block">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	<div class="layout-width large-padding">
		<div class="row">
			<?php $query = new WP_Query(array(
				'meta_key'   => 'featured',
				'meta_value' => true,
				'post_type'  => 'work',
				'posts_per_page' => 1
			));?>
			<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
			<h2 class="align-center title-rule purple">Featured</h2>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false ); ?>
			<div class="img-tile letterbox" style="background-image: url('<?php echo $image[0]; ?>')">
				<div class="overlay">
					<div class="inner-content">
						<h3><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
						<?php if (get_field('intro-text')): ?>
							<p class="slide-descr"><?php get_field('intro_text'); ?></p>
						<?php endif; ?>
						<div class="rule white"></div>
					</div>
					<a class="overlay-link" href="<?php echo the_permalink();?>"><?php the_title(); ?></a>
				</div>
			</div>
			<p class="align-right"><a class="more-link" href="<?php echo get_site_url(); ?>/work">View More <i class="fa fa-angle-right"></i></a></p>

			<?php endwhile; endif; ?>

			<h2 class="align-center title-rule purple">News</h2>
			<div class="grid">
				<?php query_posts( 'posts_per_page=2' ); ?>
				<?php while ( have_posts() ) : the_post();
				?><div class="grid__item one-half">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false ); ?>
						<div class="img-tile default" style="background-image:url('<?php echo $image[0]; ?>');">
							<div class="overlay">
								<div class="inner-content">
									<h3 class="smaller"><a href="<?php echo get_permalink() ?>"><?php the_title();?></a></h3>
									<?php if (get_field('intro-text')): ?>
										<p class="slide-descr"><?php get_field('intro_text'); ?></p>
									<?php endif; ?>
									<div class="rule white"></div>
								</div>
								<a class="overlay-link" href="<?php echo the_permalink();?>"><?php the_title(); ?></a>
							</div>
						</div>
					</div><?php
					endwhile; ?>
			</div>
			<p class="align-right"><a class="more-link" href="<?php echo get_site_url(); ?>/news">View More <i class="fa fa-angle-right"></i></a></p>
		</div>
	</div>
</div>




<?php get_footer(); ?>
