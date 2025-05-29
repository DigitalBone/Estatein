<?php
/**
 * Template for displaying single property posts
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="property-details">
                    <div class="property-price">
                        <span class="price-label"><?php esc_html_e('Price:', 'estatein'); ?></span>
                        <span class="price-value"><?php echo get_post_meta(get_the_ID(), '_estatein_property_price', true); ?></span>
                    </div>

                    <div class="property-features">
                        <div class="feature">
                            <span class="feature-label"><?php esc_html_e('Bedrooms:', 'estatein'); ?></span>
                            <span class="feature-value"><?php echo get_post_meta(get_the_ID(), '_estatein_property_bedrooms', true); ?></span>
                        </div>
                        <div class="feature">
                            <span class="feature-label"><?php esc_html_e('Bathrooms:', 'estatein'); ?></span>
                            <span class="feature-value"><?php echo get_post_meta(get_the_ID(), '_estatein_property_bathrooms', true); ?></span>
                        </div>
                    </div>
                </div>

                <div class="property-gallery">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    ?>
                </div>

                <div class="entry-content">
                    <?php
                    the_content();
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
