<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hasten
 */
global $post;

$post_format = get_post_format($post->ID);
$class = '';
if (is_sticky()) {
    // Sticky post content
    $class = ' sticky';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
    <?php
    hasten_lite_blog_post_format($post_format, $post->ID);
    ?>
    <div class="post-bg">

        <header class="entry-header">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;


            if ('post' === get_post_type()) : ?>
                <div class="metabar-wrap">
                    <span class="byline"><i class="fa fa-user" aria-hidden="true"></i> <span class="author vcard"><a
                                    href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a></span></span>
                    <span class="article-full-date"><i class="fa fa-calendar" aria-hidden="true"></i><a
                                href="<?php echo esc_url(hasten_lite_archive_link($post)); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
                    <span class="post-like-count"><i class="fa fa-comments" aria-hidden="true"></i><a
                                href="<?php echo esc_url(get_comments_link()); ?>"><?php echo esc_html(get_comments_number()) . esc_html__(' Comments', 'hasten-lite'); ?></a></span>
                </div>
                <?php
            endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php

            if (is_search()):

                echo wp_kses_post(hasten_lite_get_excerpt($post->ID, 400));
            else:
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'hasten-lite'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ));
            endif;
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'hasten-lite'),
                'after' => '</div>',
            ));

            ?>
        </div><!-- .entry-content -->
        <?php
        if (is_home()):
            echo '<a class="read-more btn btn-default" href="' . esc_url(get_the_permalink()) . '">' . esc_html__('Read More', 'hasten-lite') . '</a> ';
        endif;
        if (is_search()):
            echo '<a class="read-more" href="' . esc_url(get_the_permalink()) . '">' . esc_html__('Read More', 'hasten-lite') . '</a> ';
        endif;
        ?>
    </div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->