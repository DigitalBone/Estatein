<?php
/**
 * The template for displaying the property archive page
 *
 * @package Estatein
 */
get_header();
?>
<div class="container property-archive">
    <h1 class="archive-title">All Properties</h1>
    <?php if (function_exists('estatein_breadcrumbs')) estatein_breadcrumbs(); ?>
    <div class="row properties-grid">
        <?php
        $args = array(
            'post_type' => 'property',
            'posts_per_page' => 12,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        $properties = new WP_Query($args);
        if ($properties->have_posts()) :
            while ($properties->have_posts()) : $properties->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="property-card">
                        <div class="property-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large', ['class' => 'property-img']);
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/images/property-placeholder.png" alt="Property">';
                                } ?>
                            </a>
                        </div>
                        <div class="property-details">
                            <h3 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="property-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></div>
                            <div class="property-meta">
                                <span class="meta-item"><strong>Price:</strong> $<?php echo number_format(get_post_meta(get_the_ID(), '_estatein_property_price', true)); ?></span>
                                <span class="meta-item"><strong>Bedrooms:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_estatein_property_bedrooms', true)); ?></span>
                                <span class="meta-item"><strong>Bathrooms:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_estatein_property_bathrooms', true)); ?></span>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="button">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            // Pagination
            $big = 999999999;
            $paginate_links = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $properties->max_num_pages,
                'type'  => 'list',
            ));
            if ($paginate_links) {
                echo '<div class="properties-pagination">' . $paginate_links . '</div>';
            }
            wp_reset_postdata();
        else : ?>
            <div class="col-12"><p><?php esc_html_e('No properties found.', 'estatein'); ?></p></div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
