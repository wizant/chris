<?php
    /* Template Name: Services */
    get_header();
?>

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

<?php
    $temp = $wp_query;
    $wp_query= null;

    $wp_query = new WP_Query(array(
        'post_type' => 'service',
        'posts_per_page' => -1
    ));

    if($wp_query->have_posts()){
        echo '<ul class="row services">';
        while($wp_query->have_posts()){
            $wp_query->the_post();

            echo '<li class="col-md-6">';

            if(has_post_thumbnail()){
                echo '<a href="' . get_permalink() . '" class="post-thumbnail">';
                the_post_thumbnail(
                    'thumbnail',
                    array(
                        'alt' => get_the_title(),
                        'title' => get_the_title()
                    )
                );
                echo '</a>';
            }
            echo '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a> </h4>';

            echo '<p>' . substr(strip_tags(get_the_excerpt()), 0, 100) . '...</p>';

            echo '</li>';
        }
        echo '</ul>';
    }

    $wp_query = null;
    $wp_query = $temp;
    ?>

<?php get_footer(); ?>