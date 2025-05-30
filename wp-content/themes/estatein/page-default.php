<?php
/**
 * Template Name: Default Styled Page
 * Description: A default template with Estatein's header, footer, and styling.
 * @package Estatein
 */
get_header();
?>
<div class="container default-page-content">
    <div class="row">
        <div class="col-12">
            <h1 class="default-page-title"><?php the_title(); ?></h1>
            <div class="default-page-body">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
