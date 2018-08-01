<?php
/**
 *
 * Template Name: Page with no sidebar
 *
 * @package Hasten
 */

get_header();
?>
    <div class="section-content section">
        <div class="container">
            <div class="row">
                <main id="main" class="site-main" role="main">

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->
                    <?php
                    if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }
                    while ( have_posts() ) : the_post();

                        the_content();

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div>
        </div>
    </div>
<?php
get_footer();
