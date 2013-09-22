<?php get_header(); ?>

<!-- main content -->
<div id="main-content" role="main">
    <?php if (have_posts()) { ?>
        <?php while (have_posts()) { the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <header class="entry-header">
                    <h1 class="entry-title">
                        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h1>
                </header>

                <div class="entry-content">
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
                    <?php	the_content(); ?>
                </div>
            </article>
        <?php } ?>
    <?php } ?>
</div>
<!-- /main content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>