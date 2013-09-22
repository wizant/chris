<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
?>

<?php get_header(); ?>

<!-- main content -->
<div id="main-content" role="main">
	<header class="archive-header">
		<h1 class="archive-title"><?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s' ), '<span>' . get_the_date() . '</span>' );
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) ) . '</span>' );
			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );
			else :
				_e( 'Archives' );
			endif;
		?></h1>
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

		<!--navigation-->
		<div class="navigation">
			<?php
				global $wp_query;
				$limit = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $limit, '%#%', get_pagenum_link( $limit ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
				) );
			?>
		</div>
		<!--/navigation-->

	<?php } else { ?>
		<article id="post-0" class="post hentry error404 no-results not-found">
			<header class="entry-header">
				<h2 class="entry-title">Nothing found</h2>
			</header>

			<div class="entry-content">
				<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
			</div>

			<?php get_search_form(); ?>
		</article>
	<?php } ?>
</div>
<!-- /main content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>