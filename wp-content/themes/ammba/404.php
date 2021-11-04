<?php get_header(); ?>
	
	<div class="page-header">
		<div class="layout-width">
			<div class="grid">
				<div class="grid__item one-whole">
					<h1>Error 404</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="page-container  page-section">
		<div class="layout-width">
			<div class="grid">
				<div class="grid__item text--center">
					<h1 class="orange"><?php _e( 'Page Not Found', 'bonestheme' ); ?></h1>
					
					<div class="content  push--bottom">Either the page you were linked to was incorrect, or the page was deleted or moved from here.</div>
					<p>We'd suggest starting again from the <a href="/" title="Go to the home page">home page.</a></p>
					
				</div>
			</div>
		</div>
	</div>
		
<?php get_footer(); ?>
