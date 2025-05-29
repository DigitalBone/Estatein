<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>
                    
                    <div class="entry-content">
                        <?php
                        the_content();
                        ?>
                    </div>
                </article>
                <?php
            endwhile;
        endif;
        ?>

        <div class="contact-form">
            <?php
            if (function_exists('ninja_forms_display_form')) {
                ninja_forms_display_form(1);
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
