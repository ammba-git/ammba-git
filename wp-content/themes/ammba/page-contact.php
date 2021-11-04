<?php
/*
Template Name: Contact Page
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
<div class="container layout-width">
	<div class="row small-block">
		<?php the_content(); ?>
		<div class="align-center">
			<p><span class="large-contact"><a class="mailto">hello__AT__ammba__DOT__co.uk</a></p>
			<div class="rule purple"></div>
			<p class="social-links large-icons">
				<a class="linkedin" rel="external" href="https://www.linkedin.com/company/ammba-digital"><i class="fa fa-linkedin"></i></a>
				<a class="instagram" rel="external" href="https://instagram.com/ammbadigital/"><i class="fa fa-instagram"></i></a>
			</p>
		</div>
	</div>
</div>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
