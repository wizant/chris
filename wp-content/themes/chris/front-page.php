<?php get_header(); ?>

<h1 class="hero text-center"><?php echo bloginfo('description'); ?></h1>

<?php if (have_posts()) { ?>
    <?php while (have_posts()) { the_post(); ?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <header class="entry-header hidden">
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
                <?php the_content(); ?>
            </div>
        </article>
    <?php } ?>
<?php } ?>

<ul class="row">
    <li class="col-md-4">
        <div class="thumbnail">
            <div class="text-center">
                <h3>
                    <a href="<?php ?>">Get noticed</a>
                </h3>
                <a href="" class="glyphicon glyphicon-bullhorn"></a>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="col-md-4">
        <div class="thumbnail">
            <div class="text-center">
                <h3>
                    <a href="<?php ?>">Improve yourself</a>
                </h3>
                <a href="" class="glyphicon glyphicon-user"></a>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="col-md-4">
        <div class="thumbnail">
            <div class="text-center">
                <h3>
                    <a href="<?php ?>">Prepare for interview</a>
                </h3>
                <a href="" class="glyphicon glyphicon-folder-open"></a>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
                <li>
                    <a href="">Lorem ipsum dolor</a>
                </li>
            </ul>
        </div>
    </li>
</ul>

<?php
    $temp = $wp_query;
    $wp_query= null;

    $wp_query = new WP_Query(array(
        'post_type' => 'expert',
        'posts_per_page' => 3
    ));

    if($wp_query->have_posts()){
        echo '<ul class="row listing">';
        while($wp_query->have_posts()){
            $wp_query->the_post();

            echo '<li class="col-md-4">';

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
            echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a> </h3>';

            echo '<p>' . substr(strip_tags(get_the_excerpt()), 0, 100) . '...</p>';

            echo '</li>';
        }
        echo '</ul>';
    }

    $wp_query = null;
    $wp_query = $temp;
?>

<?php get_footer(); ?>