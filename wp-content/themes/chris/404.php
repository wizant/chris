<?php get_header(); ?>

<!-- main content -->
<div id="main-content" role="main">
	<article id="post-0" class="post hentry error404 no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php wp_title('-'); ?></h1>
		</header>
		
		<div class="entry-content">
			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
		</div>
		
		<?php get_search_form(); ?>
	</article>
</div>
<!-- /main content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>