<?php
/**
 * Template Name: Properties Archive
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="properties-filter">
            <div class="row">
                <div class="col-md-3">
                    <div class="price-range-filter">
                        <h3><?php esc_html_e('Price Range', 'estatein'); ?></h3>
                        <div id="price-range"></div>
                        <div class="price-inputs">
                            <input type="number" id="price-min" class="price-input">
                            <span><?php esc_html_e('to', 'estatein'); ?></span>
                            <input type="number" id="price-max" class="price-input">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="bedroom-filter">
                        <h3><?php esc_html_e('Bedrooms', 'estatein'); ?></h3>
                        <?php
                        $bedrooms = array(1, 2, 3, 4, 5);
                        foreach ($bedrooms as $bedroom) {
                            echo '<label><input type="checkbox" name="bedroom" value="' . $bedroom . '">' . $bedroom . ' ' . esc_html__('bedrooms', 'estatein') . '</label><br>';
                        }
                        ?>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="bathroom-filter">
                        <h3><?php esc_html_e('Bathrooms', 'estatein'); ?></h3>
                        <?php
                        $bathrooms = array(1, 2, 3, 4);
                        foreach ($bathrooms as $bathroom) {
                            echo '<label><input type="checkbox" name="bathroom" value="' . $bathroom . '">' . $bathroom . ' ' . esc_html__('bathrooms', 'estatein') . '</label><br>';
                        }
                        ?>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="property-type-filter">
                        <h3><?php esc_html_e('Property Type', 'estatein'); ?></h3>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'property_type',
                            'hide_empty' => false,
                        ));
                        foreach ($terms as $term) {
                            echo '<label><input type="checkbox" name="property_type" value="' . $term->slug . '">' . $term->name . '</label><br>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="properties-grid">
            <?php
            $args = array(
                'post_type' => 'property',
                'posts_per_page' => 12,
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    get_template_part('template-parts/content', 'property');
                endwhile;

                wp_reset_postdata();
            endif;
            ?>
        </div>

        <?php
        the_posts_pagination(array(
            'prev_text' => esc_html__('Previous', 'estatein'),
            'next_text' => esc_html__('Next', 'estatein'),
        ));
        ?>
    </div>
</main>

<?php get_footer(); ?>
