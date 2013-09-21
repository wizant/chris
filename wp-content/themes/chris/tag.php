<?php
/**
 * The template for displaying Tag pages.
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
?>

<?php get_header(); ?>

<!-- main content -->
<div id="main-content" role="main">
	<header class="archive-header">
		<h1 class="archive-title"><?php single_tag_title( '' ); ?></h1>

		<?php if ( tag_description() ) { ?>
		<div class="archive-meta"><?php echo tag_description(); ?></div>
		<?php } ?>
	</header>
	
	<?php if (have_posts()) { ?>
		<!--posts-->
		<div id="posts">
		<?php while (have_posts()) { the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
				</header>
				
				<div class="entry-summary">
				  <?php if(has_post_thumbnail()) { ?>
				  <a href="<?php the_permalink(); ?>" class="post-thumbnail">
				  <?php the_post_thumbnail(
		            array(80,80),
		            array(
		              'alt' => get_the_title(),
		              'title' => get_the_title()
		              )
		          );?>
		          </a>
		          <?php } ?>
				  <?php	the_excerpt(); ?>
				</div>
				
				<footer class="entry-meta">
					<ul>
						<li class="entry-tags">
							<?php the_tags('Tags: ', ', ', '<br />'); ?>
						</li>
						<li class="entry-categories">
							Posted in <?php the_category(', '); ?>
						</li>
						<li class="entry-actions">
							<?php edit_post_link('Edit', '', ' | '); ?>
						</li>
						<li class="entry-comments">
							<?php comments_popup_link('No comments &#187;', '1 comment &#187;', '% comments &#187;'); ?>
						</li>
					</ul>
				</footer>
			</article>
		<?php } ?>
		</div>
		<!--/posts-->
	<?php } ?>
</div>
<!-- /main content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>